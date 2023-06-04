<?php

function pwa_settings_init() {
  // Registra as configurações
  register_setting('reading', 'pwa_setting');
  register_setting('reading', 'pwa_manifest');

  // Adiciona a configuração de habilitação do PWA
  add_settings_field(
      'pwa_setting',
      'Habilitar PWA',
      'pwa_setting_cb',
      'reading',
      'default',
      ['label_for' => 'pwa_setting']
  );

  // Adiciona a configuração do manifesto do PWA
  add_settings_field(
      'pwa_manifest',
      'Manifesto PWA',
      'pwa_manifest_cb',
      'reading',
      'default',
      ['label_for' => 'pwa_manifest']
  );
}
add_action('admin_init', 'pwa_settings_init');

function pwa_setting_cb($args) {
  // Obtém a configuração atual
  $setting = get_option('pwa_setting');
  // Exibe a caixa de seleção
  echo '<input type="checkbox" id="' . $args['label_for'] . '" name="pwa_setting" ' . checked('1', $setting, false) . ' value="1">';
}

function pwa_manifest_cb() {
  // Obtém a configuração atual
  $setting = get_option('pwa_manifest');
  // Exibe o campo de texto
  echo '<textarea id="pwa_manifest" name="pwa_manifest">' . esc_textarea($setting) . '</textarea>';
}

// Função que será chamada quando os scripts forem enfileirados
function meu_pwa() {
  // Verifica se a opção está habilitada
  if(get_option('pwa_setting')) {
      // Adiciona o manifesto
      wp_enqueue_script('meu-pwa-manifesto', home_url() . '/wp-admin/admin-ajax.php?action=manifest');
      
      // Registra o service worker
      $swUrl = get_template_directory_uri().'/sw.js';
      wp_register_script('meu-pwa-sw', '', [], '', true);
      wp_localize_script('meu-pwa-sw', 'swUrl', $swUrl);
      wp_enqueue_script('meu-pwa-sw');
  }
}
add_action('wp_enqueue_scripts', 'meu_pwa');

function serve_manifest() {
  // Obter o manifesto da opção
  $manifest = json_decode(get_option('pwa_manifest'), true);
  
  // Obter o caminho dos ícones
  $icon_path = get_option('pwa_icon_path', 'assets/favicons');
  
  // Adicionar os ícones ao manifest
  $manifest['icons'] = [
    [
      'src' => get_template_directory_uri() . '/' . $icon_path . '/icon-192x192.png',
      'sizes' => '192x192',
      'type' => 'image/png',
    ],
    [
      'src' => get_template_directory_uri() . '/' . $icon_path . '/icon-512x512.png',
      'sizes' => '512x512',
      'type' => 'image/png',
    ],
    [
      'src' => get_template_directory_uri() . '/' . $icon_path . '/ms-icon-70x70.png',
      'sizes' => '70x70',
      'type' => 'image/png',
    ],
    [
      'src' => get_template_directory_uri() . '/' . $icon_path . '/ms-icon-144x144.png',
      'sizes' => '144x144',
      'type' => 'image/png',
    ],
    [
      'src' => get_template_directory_uri() . '/' . $icon_path . '/ms-icon-150x150.png',
      'sizes' => '150x150',
      'type' => 'image/png',
    ],
    [
      'src' => get_template_directory_uri() . '/' . $icon_path . '/ms-icon-310x310.png',
      'sizes' => '310x310',
      'type' => 'image/png',
    ],
    


    [
      'src' => get_template_directory_uri() . '/' . $icon_path . '/android-icon-36x36.png',
      'sizes' => '36x36',
      'type' => 'image/png',
    ],
    [
      'src' => get_template_directory_uri() . '/' . $icon_path . '/android-icon-48x48.png',
      'sizes' => '48x48',
      'type' => 'image/png',
    ],
    [
      'src' => get_template_directory_uri() . '/' . $icon_path . '/android-icon-72x72.png',
      'sizes' => '72x72',
      'type' => 'image/png',
    ],
    [
      'src' => get_template_directory_uri() . '/' . $icon_path . '/android-icon-144x144.png',
      'sizes' => '144x144',
      'type' => 'image/png',
    ],
    [
      'src' => get_template_directory_uri() . '/' . $icon_path . '/android-icon-192x192.png',
      'sizes' => '192x192',
      'type' => 'image/png',
      'purpose'=> 'any maskable'
    ],
    [
      'src' => get_template_directory_uri() . '/' . $icon_path . '/apple-icon-180x180.png',
      'sizes' => '180x180',
      'type' => 'image/png',
      'purpose'=> 'any maskable'
    ],

  ];

  // Definir o cabeçalho como json
  header('Content-Type: application/json');

  // Imprimir o manifesto
  echo json_encode($manifest);

  // Sair para evitar qualquer conteúdo extra
  exit;
}

add_action('wp_ajax_nopriv_manifest', 'serve_manifest');
add_action('wp_ajax_manifest', 'serve_manifest');

function add_manifest() {
  // Verifica se a opção está habilitada
  if (get_option('pwa_setting')) {
      // Adiciona a tag do manifesto
      echo '<link rel="manifest" href="' . admin_url('admin-ajax.php?action=manifest') . '">';
  }
}
add_action('wp_head', 'add_manifest');

function register_service_worker() {
  // Verifica se a opção está habilitada
  if (get_option('pwa_setting')) {
      // Registra o service worker
      echo "
      <script>
      if ('serviceWorker' in navigator) {
        window.addEventListener('load', function() {
          navigator.serviceWorker.register('/sw.js').then(function(registration) {
            console.log('ServiceWorker registration successful with scope: ', registration.scope);
          }, function(err) {
            console.log('ServiceWorker registration failed: ', err);
          });
        });
      }
      </script>
      ";
  }
}
add_action('wp_footer', 'register_service_worker');

function pwa_icon_path_init() {
  // Registra a configuração
  register_setting('reading', 'pwa_icon_path');

  // Adiciona a configuração
  add_settings_field(
      'pwa_icon_path',
      'Caminho dos Ícones do PWA',
      'pwa_icon_path_cb',
      'reading',
      'default',
      ['label_for' => 'pwa_icon_path']
  );
}
add_action('admin_init', 'pwa_icon_path_init');

function pwa_icon_path_cb($args) {
  // Obtém a configuração atual
  $setting = get_option('pwa_icon_path', 'assets/favicons');
  // Exibe o campo de texto
  echo '<input type="text" id="' . $args['label_for'] . '" name="pwa_icon_path" value="' . esc_attr($setting) . '">';
}
