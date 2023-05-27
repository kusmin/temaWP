<?php
function meu_tema_setup() {
    // Adiciona suporte para menus de navegação
    register_nav_menus( array(
        'primary' => __( 'Menu Principal', 'meu-tema' ),
    ) );

    // Adiciona suporte para widgets
    add_theme_support( 'widgets' );
}
add_action( 'after_setup_theme', 'meu_tema_setup' );

function dev_widgets_init() {
    register_sidebar( array(
                'name'          => __( 'Sidebar', 'meu-tema' ),
        'id'            => 'sidebar-1',
        'description'   => __( 'Adicione widgets aqui para aparecer na sua barra lateral.', 'meu-tema' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'dev_widgets_init' );

function create_custom_pages() {
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
            'post_title'    => $page_title,
            'post_content'  => $page_data['content'],
            'post_status'   => 'publish',
            'post_author'   => 1,
            'post_type'     => 'page',
            'post_name'     => sanitize_title($page_title),
            'page_template' => $page_data['template'],  // Atribui o template à página
        );

        // Checa se a página já existe
        $existing_page = get_page_by_title( $page_title );

        if ( ! $existing_page ) {
            // Se a página não existir, cria uma nova
            wp_insert_post( $page );
        }
    }
}
add_action( 'after_setup_theme', 'create_custom_pages' );

function enqueue_bootstrap() {
    wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/assets/css/bootstrap.min.css' );

    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), null, true );
}
add_action( 'wp_enqueue_scripts', 'enqueue_bootstrap' );

function meu_tema_scripts() {
   
    wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css', array(), '5.15.3' );
}
add_action( 'wp_enqueue_scripts', 'meu_tema_scripts' );

// function load_font_awesome() {
//     wp_enqueue_style( 'font-awesome-free', '//use.fontawesome.com/releases/v5.15.3/css/all.css' );
// }
// add_action( 'wp_enqueue_scripts', 'load_font_awesome' );

function my_theme_enqueue_styles() {
    wp_enqueue_style( 'custom-style', get_template_directory_uri() . '/assets/css/custom.css' );
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );


require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';
