<?php
/*
Template Name: Blog Page
*/

get_header(); ?>
<?php get_template_part( 'navbar' ) ; ?>

<div id="primary" class="content-area p-5">
    <main id="main" class="site-main">
    
        <!-- Loop básico para exibir os posts -->
        <?php
        $args = array(
            'post_type' => 'post',
            'post_status' => 'publish',
        );

        $blog_posts = new WP_Query( $args );

        if ( $blog_posts->have_posts() ) : 
            while ( $blog_posts->have_posts() ) : $blog_posts->the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <header class="entry-header">
                        <?php
                        if ( is_singular() ) :
                            the_title( '<h1 class="entry-title">', '</h1>' );
                        else :
                            the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
                        endif;
                        ?>
                    </header><!-- .entry-header -->

                    <div class="entry-content">
                        <?php
                        the_content( sprintf(
                            wp_kses(
                                /* translators: %s: Nome do post atual. Somente visível para leitores de tela */
                                __( 'Continue lendo<span class="screen-reader-text"> "%s"</span>', 'dev' ),
                                array(
                                    'span' => array(
                                        'class' => array(),
                                    ),
                                )
                            ),
                            get_the_title()
                        ) );
                        ?>
                    </div><!-- .entry-content -->
                </article>
            <?php 
            endwhile; 
            wp_reset_postdata(); 
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
