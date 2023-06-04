<?php
function theme_settings_init() {
  register_setting( 'theme_settings', 'theme_settings' );

  add_settings_section(
      'theme_settings_section',
      'Configurações do tema',
      null,
      'theme_settings'
  );

  $pages = array(
      'home' => 'Home',
      'contato' => 'Contato',
      'sobre' => 'Sobre',
      'servicos' => 'Serviços',
      'blog' => 'Blog',
  );

  foreach ($pages as $slug => $title) {
      add_settings_field(
          $slug . '_url',
          'URL da página ' . $title,
          'theme_settings_field_html',
          'theme_settings',
          'theme_settings_section',
          array('slug' => $slug)
      );
  }
}

add_action( 'admin_init', 'theme_settings_init' );

function theme_settings_field_html( $args ) {
  $options = get_option( 'theme_settings' );
  ?>
  <input type='text' name='theme_settings[<?php echo esc_attr( $args['slug'] ); ?>_url]' value='<?php echo esc_attr( $options[$args['slug'] . '_url'] ); ?>'>
  <?php
}

function theme_settings_options_page() {
  add_menu_page(
      'Configurações do Tema',
      'Configurações do Tema',
      'manage_options',
      'theme_settings',
      'theme_settings_options_page_html'
  );
}

add_action( 'admin_menu', 'theme_settings_options_page' );

function theme_settings_options_page_html() {
  if (!current_user_can('manage_options')) {
      return;
  }

  if (isset($_GET['settings-updated'])) {
      add_settings_error( 'theme_settings_messages', 'theme_settings_message', __( 'Configurações Salvas', 'textdomain' ), 'updated' );
  }

  settings_errors( 'theme_settings_messages' );

  ?>
  <div class="wrap">
      <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
      <form action="options.php" method="post">
      <?php
      settings_fields( 'theme_settings' );
      do_settings_sections( 'theme_settings' );
      submit_button( 'Salvar Configurações' );
      ?>
      </form>
  </div>
  <?php
}
