<?php
/*
Template Name: Home
*/
get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main">

            <section class="intro">
                <h1>Bem-vindo ao Meu Site!</h1>
                <p>Este é um parágrafo de introdução para o meu site. Sinta-se à vontade para explorar e aprender mais sobre o que eu faço.</p>
            </section>

            <section class="latest-posts">
                <h2>Últimas postagens do blog</h2>

                <?php
                // Mostra os últimos 3 posts
                $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => 3,
                );

                $query = new WP_Query( $args );

                while ( $query->have_posts() ) : $query->the_post();
                    get_template_part( 'template-parts/content', get_post_format() );
                endwhile;
                wp_reset_postdata();
                ?>
            </section>

        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_sidebar();
get_footer();
