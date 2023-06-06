<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <meta name="theme-color" content="#fff">

  <meta http-equiv="Strict-Transport-Security" content="max-age=31536000; includeSubDomains; preload">
  <meta http-equiv="X-Content-Type-Options" content="nosniff">

  <title><?php wp_title(' | ', true, 'right'); bloginfo('name'); ?></title>


  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="author" content="<?php echo get_post_meta(get_the_ID(), 'author', true) ?: 'Renan Ribeiro Lage'; ?>">
  <meta name="description"
    content="<?php echo get_post_meta(get_the_ID(), 'description', true) ?: 'Desenvolvedor freelance especializado em web e mobile. Compartilho minhas experiências e conhecimentos em programação, incluindo as últimas tendências e tecnologias.'; ?>">
  <meta name="keywords"
    content="<?php echo get_post_meta(get_the_ID(), 'keywords', true) ?: 'Desenvolvedor Freelance, Programação Web, Programação Mobile, JavaScript, Python, HTML, CSS, Node.js, React, Angular, Tutoriais de Programação, Dicas de Desenvolvimento, Blogs de Programação'; ?>">

  <link rel="canonical" href="<?php echo esc_url( home_url( '/' ) ); ?>" />
  <link rel="dns-prefetch" href="//fonts.googleapis.com">

  <!-- Código do Pix do Facebook -->
  <script>
  ! function(f, b, e, v, n, t, s) {
    if (f.fbq) return;
    n = f.fbq = function() {
      n.callMethod ?
        n.callMethod.apply(n, arguments) : n.queue.push(arguments)
    };
    if (!f._fbq) f._fbq = n;
    n.push = n;
    n.loaded = !0;
    n.version = '2.0';
    n.queue = [];
    t = b.createElement(e);
    t.async = !0;
    t.src = v;
    s = b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t, s)
  }(window, document, 'script',
    'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '788190016125238');
  fbq('track', 'PageView');
  </script>
  <noscript>
    <img height="1" width="1" style="display:none"
      src="https://www.facebook.com/tr?id=SEU_ID_DO_PIX_AQUI&ev=PageView&noscript=1" />
  </noscript>


  <?php
        
     
    $google_analytics_id = get_option('google_analytics_id'); 
    $umami_url = get_option('umami_url'); 
    $umami_id = get_option('umami_id'); 
      
    if (!empty($google_analytics_id)): ?>
  <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo $google_analytics_id; ?>"></script>
  <script>
  window.dataLayer = window.dataLayer || [];

  function gtag() {
    dataLayer.push(arguments);
  }
  gtag('js', new Date());
  gtag('config', '<?php echo $google_analytics_id; ?>');
  </script>
  <?php endif; ?>

  <?php if (!empty($umami_url) && !empty($umami_id)): ?>
  <script async defer src="<?php echo $umami_url; ?>umami.js" data-website-id="<?php echo $umami_id; ?>"></script>
  <?php endif; ?>
  <?php if (get_option('pwa_setting')): ?>
  <link rel="manifest" href="<?php echo home_url('/manifest.json'); ?>">
  <?php endif; ?>
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

  <header class="p-5 text-center text-white bg-dark">
    <h1><?php bloginfo( 'name' ); ?></h1>
  </header>