<?php
/**
 * Setup function for dev theme.
 */
function dev_setup() {
    // Add support for navigation menus.
    register_nav_menus( array(
        'primary' => __( 'Menu Principal', 'dev' ),
    ) );

    // Add support for post thumbnails.
    add_theme_support( 'post-thumbnails' );

    // Add support for widgets.
    add_theme_support( 'widgets' );

    // dev_create_custom_pages();
}

/**
*Setup custom logo for the dev theme.
*/
function dev_custom_logo_setup() {
$defaults = array(
'height' => 100,
'width' => 400,
'flex-height' => true,
'flex-width' => true,
'header-text' => array( 'site-title', 'site-description' ),
);
add_theme_support( 'custom-logo', $defaults );
}

/**
*Create custom pages for the dev theme.
*/
// function dev_create_custom_pages() {
//   $custom_pages = array(
//   'Contato' => array(
//   'content' => 'Este é o conteúdo da página Contato.',
//   'template' => 'page-templates/page-contato.php'
//   ),
//   'Sobre' => array(
//   'content' => 'Este é o conteúdo da página Sobre.',
//   'template' => 'page-templates/page-sobre.php'
//   ),
//   'Serviços' => array(
//   'content' => 'Este é o conteúdo da página Serviços.',
//   'template' => 'page-templates/page-servicos.php'
//   ),
//   'Blog' => array(
//   'content' => 'Este é o conteúdo da página Blog.',
//   'template' => 'page-templates/page-blog.php'
//   ),
//   );
  
//   foreach ($custom_pages as $page_title => $page_data) {
//   $page = array(
//   'post_title' => $page_title,
//   'post_content' => $page_data['content'],
//   'post_status' => 'publish',
//   'post_author' => 1,
//   'post_type' => 'page',
//   'post_name' => sanitize_title($page_title),
//   );
//    $existing_page = get_page_by_title( $page_title );
  
//    if ( ! $existing_page ) {
//        $page_id = wp_insert_post( $page );
//        update_option( sanitize_title($page_title) . '_page_id', $page_id );
  
//        // Use update_post_meta() para definir o template da página
//        update_post_meta( $page_id, '_wp_page_template', $page_data['template'] );
//    }
  
//   }
//   }

/**
 * Create custom options for Google Analytics and Umami.
 */
function dev_custom_options() {
  // Register a new section in the "reading" page
  add_settings_section(
      'dev_custom_options_section',
      'Custom Options',
      'dev_custom_options_section_description',
      'general'
  );

  // Register new fields in the "dev_custom_options_section" section, inside the "reading" page
  add_settings_field(
      'google_analytics_id',
      'Google Analytics ID',
      'dev_custom_option_field_ga',
      'general',
      'dev_custom_options_section'
  );
  register_setting('general', 'google_analytics_id');

  add_settings_field(
      'umami_id',
      'Umami ID',
      'dev_custom_option_field_umami_id',
      'general',
      'dev_custom_options_section'
  );
  register_setting('general', 'umami_id');

  add_settings_field(
      'umami_url',
      'Umami URL',
      'dev_custom_option_field_umami_url',
      'general',
      'dev_custom_options_section'
  );
  register_setting('general', 'umami_url');
}

add_action('admin_init', 'dev_custom_options');

// Description for the section
function dev_custom_options_section_description() {
  echo '<p>These options allow you to configure custom settings for your theme.</p>';
}

// Fields callback functions
function dev_custom_option_field_ga() {
  // get the value of the setting we've registered with register_setting()
  $setting = get_option('google_analytics_id');
  // output the field
  echo "<input type='text' name='google_analytics_id' value='" . esc_attr($setting) . "'>";
}

function dev_custom_option_field_umami_id() {
  $setting = get_option('umami_id');
  echo "<input type='text' name='umami_id' value='" . esc_attr($setting) . "'>";
}

function dev_custom_option_field_umami_url() {
  $setting = get_option('umami_url');
  echo "<input type='text' name='umami_url' value='" . esc_attr($setting) . "'>";
}

