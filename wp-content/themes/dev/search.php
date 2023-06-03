<?php
get_header(); ?>
<?php get_template_part( 'navbar' ) ; ?>

<div id="primary" class="content-area p-5">
  <main id="main" class="site-main">

    <h1>Resultados da busca</h1>

    <!-- Barra de Busca -->
    <div class="blog-search">
      <?php get_search_form(); ?>
    </div>

    <?php
    if ( have_posts() ) :
        /* Start the Loop */
        while ( have_posts() ) :
            the_post();
            if ( 'post' === get_post_type() ) : // Ignora o tipo 'page'
                /*
                * Include the Post-Type-specific template for the content.
                * If you want to override this in a child theme, then include a file
                * called content-___.php (where ___ is the Post Type name) and that will be used instead.
                */
                get_template_part( 'template-parts/content', get_post_type() );
            endif;
        endwhile;

        the_posts_navigation();

    else :
        get_template_part( 'template-parts/content', 'none' );
    endif;
    ?>

    <!-- Exibe os widgets -->
    <?php if ( is_active_sidebar( 'blog-1' ) ) : ?>
    <div id="blog-widget-area" class="blog-widget-area widget-area" role="complementary">
      <?php dynamic_sidebar( 'blog-1' ); ?>
    </div>
    <?php endif; ?>

  </main><!-- .site-main -->
</div><!-- .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
