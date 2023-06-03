<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />

    <meta http-equiv="Strict-Transport-Security" content="max-age=31536000; includeSubDomains; preload">
    <meta http-equiv="X-Content-Type-Options" content="nosniff">
    <meta http-equiv="X-Frame-Options" content="SAMEORIGIN">

    <title><?php wp_title(' | ', true, 'right'); bloginfo('name'); ?></title>


    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="author" content="<?php echo get_post_meta(get_the_ID(), 'author', true) ?: 'Renan Ribeiro Lage'; ?>">
    <meta name="description" content="<?php echo get_post_meta(get_the_ID(), 'description', true) ?: 'Desenvolvedor freelance especializado em web e mobile. Compartilho minhas experiências e conhecimentos em programação, incluindo as últimas tendências e tecnologias.'; ?>">
    <meta name="keywords" content="<?php echo get_post_meta(get_the_ID(), 'keywords', true) ?: 'Desenvolvedor Freelance, Programação Web, Programação Mobile, JavaScript, Python, HTML, CSS, Node.js, React, Angular, Tutoriais de Programação, Dicas de Desenvolvimento, Blogs de Programação'; ?>">

    <link rel="canonical" href="<?php echo esc_url( home_url( '/' ) ); ?>" />
    <link rel="dns-prefetch" href="//fonts.googleapis.com">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <?php
        $theme = 'light'; // valor padrão
        if (isset($_COOKIE['theme'])) {
            $theme = $_COOKIE['theme']; // atualizar o tema com a preferência do usuário, se disponível
        }
        wp_enqueue_style('theme-style', get_template_directory_uri() . '/' . $theme . '.css', array(), '1.0', 'all');
        ?>
     <?php 
    $google_analytics_id = get_option('google_analytics_id'); 
    $umami_url = get_option('umami_url'); 
    $umami_id = get_option('umami_id'); 
      
    if (!empty($google_analytics_id)): ?>
        <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo $google_analytics_id; ?>"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());
          gtag('config', '<?php echo $google_analytics_id; ?>');
        </script>
    <?php endif; ?>

    <?php if (!empty($umami_url) && !empty($umami_id)): ?>
        <script async defer src="<?php echo $umami_url; ?>/umami.js" data-website-id="<?php echo $umami_id; ?>"></script>
    <?php endif; ?>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
   
    <header class="p-5 text-center text-white bg-dark">
        <h1 ><?php bloginfo( 'name' ); ?></h1>
    </header>
