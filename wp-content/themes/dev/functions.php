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

// Include setup functions
require_once get_template_directory() . '/inc/setup-functions.php';

// Include widget functions
require_once get_template_directory() . '/inc/widget-functions.php';

// Include enqueue scripts
require_once get_template_directory() . '/inc/enqueue-scripts.php';

// Include favicon functions
require_once get_template_directory() . '/inc/favicon-functions.php';

// Include admin functions
require_once get_template_directory() . '/inc/admin-functions.php';

// Include Pwa functions

require_once get_template_directory() . '/inc/filter-functions.php';

require_once get_template_directory() . '/inc/pwa-functions.php';

require_once get_template_directory() . '/inc/options-functions.php';

require_once get_template_directory() . '/inc/newsleater-functions.php';
require_once get_template_directory() . '/inc/terms-functions.php';

require_once get_template_directory() . '/inc/carrosel-blog-functions.php';


// Bootstrap navwalker
require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';

?>
