<?php
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
