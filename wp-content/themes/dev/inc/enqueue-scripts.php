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
  wp_enqueue_style( 'custom-style', get_template_directory_uri() . '/assets/css/custom.min.css' );
  
// Adicione isso ao seu functions.php ou em outro lugar antes de o script ser chamado
wp_enqueue_script('main', get_template_directory_uri() . '/assets/js/main.min.js', array('jquery'), '1.0', true); // Altere o caminho para apontar para o seu arquivo JS
wp_localize_script('main', 'php_vars', array(
    'theme_directory' => get_template_directory_uri(),
));

  // Theme Styles
  if (isset($_COOKIE['theme'])) {
    $theme = $_COOKIE['theme']; // atualizar o tema com a preferência do usuário, se disponível
    if($theme){
      wp_enqueue_style('theme-style', get_template_directory_uri() . '/assets/css/' . $theme . 'min.css', array(), '1.0', 'all');

    }else{
      wp_enqueue_style('theme-style', get_template_directory_uri() . '/assets/css/ligth.min.css', array(), '1.0', 'all');

    }
}
}