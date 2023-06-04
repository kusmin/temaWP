<?php
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
