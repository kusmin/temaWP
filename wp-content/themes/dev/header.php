<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <?php
        $theme = 'light'; // valor padrão
        if (isset($_COOKIE['theme'])) {
            $theme = $_COOKIE['theme']; // atualizar o tema com a preferência do usuário, se disponível
        }
        wp_enqueue_style('theme-style', get_template_directory_uri() . '/' . $theme . '.css', array(), '1.0', 'all');
        ?>

    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
            <?php bloginfo( 'name' ); ?>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <?php
            wp_nav_menu( array(
                'theme_location' => 'primary',
                'container'      => false,
                'menu_class'     => 'navbar-nav ml-auto',
                'walker'         => new WP_Bootstrap_Navwalker(),
                'depth'          => 2
            ) );
            ?>
        </div>
    </nav>

    <header class="mb-5">
        <h1 class="p-5 text-center text-white bg-dark"><?php bloginfo( 'name' ); ?></h1>
    </header>
