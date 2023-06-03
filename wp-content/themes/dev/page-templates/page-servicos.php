<?php
/*
Template Name: Services Page
*/

get_header(); ?>
<?php get_template_part( 'navbar' ) ; ?>
<?php get_sidebar(); ?>

<main id="main-content" class="p-5">

    <section class="services">
        <h2>Meus Serviços</h2>

        <?php
        // Mostra todos os serviços
        $args = array(
            'post_type' => 'service', // Supondo que você tenha um tipo de postagem personalizado chamado 'service'
        );

        $query = new WP_Query( $args );

        while ( $query->have_posts() ) : $query->the_post();
            get_template_part( 'template-parts/content', 'service' );
        endwhile;
        wp_reset_postdata();
        ?>
    </section>

</main>

<?php get_footer(); ?>
