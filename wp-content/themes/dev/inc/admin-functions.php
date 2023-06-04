<?php
function add_social_links_to_admin() {
  add_settings_field('facebook_url', 'URL do Facebook', 'display_facebook_element', 'general');
  register_setting('general', 'facebook_url');
  
  add_settings_field('instagram_url', 'URL do Instagram', 'display_instagram_element', 'general');
  register_setting('general', 'instagram_url');
  
  add_settings_field('linkedin_url', 'URL do LinkedIn', 'display_linkedin_element', 'general');
  register_setting('general', 'linkedin_url');
  
  add_settings_field('twitter_url', 'URL do Twitter', 'display_twitter_element', 'general');
  register_setting('general', 'twitter_url');
  
  add_settings_field('github_url', 'URL do GitHub', 'display_github_element', 'general');
  register_setting('general', 'github_url');
  
  add_settings_field('youtube_url', 'URL do YouTube', 'display_youtube_element', 'general');
  register_setting('general', 'youtube_url');
}

function display_facebook_element() {
  echo '<input type="text" name="facebook_url" id="facebook_url" value="' . get_option('facebook_url') . '" />';
}

function display_instagram_element() {
  echo '<input type="text" name="instagram_url" id="instagram_url" value="' . get_option('instagram_url') . '" />';
}

function display_linkedin_element() {
  echo '<input type="text" name="linkedin_url" id="linkedin_url" value="' . get_option('linkedin_url') . '" />';
}

function display_twitter_element() {
  echo '<input type="text" name="twitter_url" id="twitter_url" value="' . get_option('twitter_url') . '" />';
}

function display_github_element() {
  echo '<input type="text" name="github_url" id="github_url" value="' . get_option('github_url') . '" />';
}

function display_youtube_element() {
  echo '<input type="text" name="youtube_url" id="youtube_url" value="' . get_option('youtube_url') . '" />';
}

add_action('admin_init', 'add_social_links_to_admin');

// Adiciona os campos de configuração da CSP
function csp_settings_init() {
  // Adiciona a seção de configuração da CSP
  add_settings_section(
      'csp_settings_section',
      'Configurações da Política de Segurança de Conteúdo',
      'csp_settings_section_cb',
      'reading'
  );

  // Registra o campo da CSP
  register_setting('reading', 'csp_setting', 'csp_setting_validate');

  // Adiciona o campo da CSP
  add_settings_field(
      'csp_setting',
      'Política de Segurança de Conteúdo',
      'csp_setting_field_cb',
      'reading',
      'csp_settings_section'
  );

  // Registra o campo para desabilitar a CSP
  register_setting('reading', 'csp_disable');
  // Adiciona o campo para desabilitar a CSP
  add_settings_field(
      'csp_disable',
      'Desabilitar Política de Segurança de Conteúdo',
      'csp_disable_field_cb',
      'reading',
      'csp_settings_section'
  );
  
  // Registra o campo para mostrar o cabeçalho completo
  register_setting('reading', 'csp_show_header');
  // Adiciona o campo para mostrar o cabeçalho completo
  add_settings_field(
      'csp_show_header',
      'Cabeçalho Completo',
      'csp_show_header_field_cb',
      'reading',
      'csp_settings_section'
  );
}

// Validação para o campo da CSP
function csp_setting_validate($input) {
  // Verifique se o valor parece ser uma CSP válida
  // Por exemplo, deve conter pelo menos um ponto e um espaço
  if (preg_match('/.+ .+/', $input)) {
      return $input;
  } else {
      // Adiciona uma mensagem de erro para ser exibida
      add_settings_error(
          'csp_setting',
          'csp_setting_error',
          'A Política de Segurança de Conteúdo não parece ser válida.',
          'error'
      );
      // Retorna o valor antigo em caso de entrada inválida
      return get_option('csp_setting');
  }
}
add_action('admin_init', 'csp_settings_init');

// Callback para a descrição da seção de configuração da CSP
function csp_settings_section_cb() {
  echo '<p>Insira a Política de Segurança de Conteúdo para o cabeçalho HTTP abaixo:</p>';
}

// Callback para o campo da CSP
function csp_setting_field_cb() {
  // Obtém o valor da CSP das configurações
  $setting = get_option('csp_setting');

  // Se o valor da CSP estiver vazio, obtenha o domínio do site e adicione-o à CSP por padrão
  if (empty($setting)) {
    $site_url = get_site_url();
    $parsed_url = parse_url($site_url);
    $domain = $parsed_url['host'];

    // Definindo fontes padrão
    $default_sources = ["'self'", $domain];
    $font_sources = ["'self'", $domain, "data:", "https://use.typekit.net"];
    $script_sources = ["'self'", $domain, "'unsafe-inline'", "https://ajax.googleapis.com", "https://www.googletagmanager.com", "https://www.google-analytics.com"];
    $img_sources = ["'self'", $domain, "https://www.google-analytics.com", "data:", "http://*.gravatar.com;"];

    // Juntando as fontes com espaço
    $default_src = join(" ", $default_sources);
    $font_src = join(" ", $font_sources);
    $script_src = join(" ", $script_sources);
    $img_src = join(" ", $img_sources);

    // Criando a política
    $setting = "default-src {$default_src}; font-src {$font_src}; script-src {$script_src}; img-src {$img_src};";
  }

  echo "<input type='text' name='csp_setting' value='" . esc_attr($setting) . "' size='100'>";
}

// Callback para o campo de desabilitar a CSP
function csp_disable_field_cb() {
  // Obtém o valor da opção
  $disable = get_option('csp_disable');
  // Cria o campo de checkbox
  echo "<input type='checkbox' name='csp_disable' value='1'" . checked(1, $disable, false) . "/>";
}

// Callback para o campo de mostrar o cabeçalho completo
function csp_show_header_field_cb() {
  // Obtém o valor da CSP das configurações
  $csp = get_option('csp_setting');
  // Cria o campo de texto somente leitura
  echo "<input type='text' readonly name='csp_show_header' value='Content-Security-Policy: " . esc_attr($csp) . "' size='100'>";
}


// Adiciona a CSP ao cabeçalho HTTP
function add_csp_header() {
  if (!is_admin()) {
      // Verifica se a CSP está desabilitada
      $disable = get_option('csp_disable');
      if (!$disable) {
          // Obtém o valor da CSP das configurações
          $csp = get_option('csp_setting');
          if ($csp) {
              header("Content-Security-Policy: " . $csp);
              
              // Verifica se o cabeçalho completo deve ser mostrado
              $show = get_option('csp_show_header');
              if ($show) {
                  echo "<pre>Cabeçalho CSP: " . $csp . "</pre>";
              }
          }
      }
  }
}
add_action('after_setup_theme', 'add_csp_header');
