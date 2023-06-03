<?php
/*
 * Functions for the 'dev' theme
 */

// After setup theme hook
add_action( 'after_setup_theme', 'dev_setup' );

// Widgets initialization
add_action( 'widgets_init', 'dev_widgets_init' );

// Enqueue styles and scripts
add_action( 'wp_enqueue_scripts', 'dev_scripts' );

// Custom favicon
add_action('wp_head', 'dev_custom_favicon');

// Custom logo setup
add_action( 'after_setup_theme', 'dev_custom_logo_setup' );

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

    dev_create_custom_pages();
}

/**
 * Register widget areas for the dev theme.
 */
function dev_widgets_init() {
    $areas = array(
        'sidebar' => __( 'Sidebar', 'dev' ),
        'contact' => __( 'Contato Widgets', 'dev' ),
        'about' => __( 'Sidebar About', 'dev' ),
        'blog' => __( 'Blog Widgets', 'dev' ),
    );

    foreach ($areas as $id => $name) {
        register_sidebar( array(
            'name'          => $name,
            'id'            => $id . '-1',
            'description'   => sprintf( __( 'Adicione widgets aqui para aparecer em sua página de %s.', 'dev' ), strtolower($name) ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        ) );
    }
}

/**
 * Enqueue styles and scripts for the dev theme.
 */
function dev_scripts() {
    // Bootstrap
    wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/assets/css/bootstrap.min.css' );
    wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), null, true );
    
    // Font Awesome
    wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css', array(), '5.15.3' );
    
    // Custom Styles
    wp_enqueue_style( 'custom-style', get_template_directory_uri() . '/assets/css/custom.css' );
}

/**
 * Add custom favicon for the dev theme.
 */
function dev_custom_favicon() {
    // Array of favicon types
    $favicons = array(
        'favicon.ico',
        'favicon-32x32.png',
        'favicon-96x96.png',
        'apple-touch-icon.png',
        'ms-icon-144x144.png'
    );

    // Favicon tags
    foreach ($favicons as $favicon) {
        $type = pathinfo($favicon, PATHINFO_EXTENSION);
        $size = rtrim($favicon, '.' . $type);
        $type = $type == 'ico' ? 'image/x-icon' : 'image/png';
$rel  = $type == 'image/x-icon' ? 'shortcut icon' : ($type == 'image/png' ? 'apple-touch-icon' : 'icon');
            printf('<link rel="%s" type="%s" href="%s/%s">', $rel, $type, get_stylesheet_directory_uri(), $favicon);

    if ($favicon == 'ms-icon-144x144.png') {
        echo '<meta name="msapplication-TileColor" content="#ffffff">';
        echo '<meta name="msapplication-TileImage" content="' . get_stylesheet_directory_uri() . '/' . $favicon . '">';
    }
}
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
function dev_create_custom_pages() {
$custom_pages = array(
'Contato' => array(
'content' => 'Este é o conteúdo da página Contato.',
'template' => 'page-templates/page-contato.php'
),
'Sobre' => array(
'content' => 'Este é o conteúdo da página Sobre.',
'template' => 'page-templates/page-sobre.php'
),
'Serviços' => array(
'content' => 'Este é o conteúdo da página Serviços.',
'template' => 'page-templates/page-servicos.php'
),
'Blog' => array(
'content' => 'Este é o conteúdo da página Blog.',
'template' => 'page-templates/page-blog.php'
),
);

foreach ($custom_pages as $page_title => $page_data) {
$page = array(
'post_title' => $page_title,
'post_content' => $page_data['content'],
'post_status' => 'publish',
'post_author' => 1,
'post_type' => 'page',
'post_name' => sanitize_title($page_title),
);
 $existing_page = get_page_by_title( $page_title );

 if ( ! $existing_page ) {
     $page_id = wp_insert_post( $page );
     update_option( sanitize_title($page_title) . '_page_id', $page_id );

     // Use update_post_meta() para definir o template da página
     update_post_meta( $page_id, '_wp_page_template', $page_data['template'] );
 }

}
}

/**
 * Create custom options for Google Analytics and Umami.
 */
function my_custom_options() {
    add_option('google_analytics_id', 'UA-XXXXX-Y');
    add_option('umami_id', 'UMAMI_ID');
    add_option('umami_url', 'URL_UMAMI');
}
add_action('after_setup_theme', 'my_custom_options');

function add_social_links_to_admin() {
    add_settings_field('linkedin_url', 'URL do LinkedIn', 'display_linkedin_element', 'general');
    register_setting('general', 'linkedin_url');
    
    add_settings_field('youtube_url', 'URL do YouTube', 'display_youtube_element', 'general');
    register_setting('general', 'youtube_url');
}

function display_linkedin_element() {
    echo '<input type="text" name="linkedin_url" id="linkedin_url" value="' . get_option('linkedin_url') . '" />';
}

function display_youtube_element() {
    echo '<input type="text" name="youtube_url" id="youtube_url" value="' . get_option('youtube_url') . '" />';
}

add_action('admin_init', 'add_social_links_to_admin');


function updev_widgets_init() {

    register_sidebar( array(
        'name'          => __( 'Front Page Widgets', 'updev' ),
        'id'            => 'front-page-widgets',
        'description'   => __( 'Add widgets here to appear in your sidebar.', 'updev' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );

}
add_action( 'widgets_init', 'updev_widgets_init' );

function my_custom_sidebar() {
    register_sidebar(
        array (
            'name' => __( 'Custom', 'your-theme-domain' ),
            'id' => 'custom-side-bar',
            'description' => __( 'Custom Sidebar', 'your-theme-domain' ),
            'before_widget' => '<div class="widget-content">',
            'after_widget' => "</div>",
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        )
    );
}
add_action( 'widgets_init', 'my_custom_sidebar' );

function comments_widgets_init() {
    register_sidebar( array(
      'name'          => 'Comentários',
      'id'            => 'comments_sidebar',
      'before_widget' => '<div>',
      'after_widget'  => '</div>',
      'before_title'  => '<h2 class="widgettitle">',
      'after_title'   => '</h2>',
    ) );
  }
  add_action( 'widgets_init', 'comments_widgets_init' );



// Bootstrap navwalker
require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';




?>