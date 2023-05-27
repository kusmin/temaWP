<?php get_header(); ?>
<?php get_sidebar(); ?>

<main id="main-content">
    <section class="intro">
        <h1>Bem-vindo ao Meu Site!</h1>
        <p>Este é um parágrafo de introdução para o meu site. Sinta-se à vontade para explorar e aprender mais sobre o que eu faço.</p>

        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
            <img src="https://via.placeholder.com/800x400.png?text=Serviço+1" class="d-block w-100" alt="Serviço 1">
            <div class="carousel-caption d-none d-md-block">
                <h5>Serviço 1</h5>
                <p>Descrição breve do serviço 1.</p>
            </div>
            </div>
            <div class="carousel-item">
            <img src="https://via.placeholder.com/800x400.png?text=Serviço+2" class="d-block w-100" alt="Serviço 2">
            <div class="carousel-caption d-none d-md-block">
                <h5>Serviço 2</h5>
                <p>Descrição breve do serviço 2.</p>
            </div>
            </div>
            <div class="carousel-item">
            <img src="https://via.placeholder.com/800x400.png?text=Serviço+3" class="d-block w-100" alt="Serviço 3">
            <div class="carousel-caption d-none d-md-block">
                <h5>Serviço 3</h5>
                <p>Descrição breve do serviço 3.</p>
            </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
        </div>


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
</main>


<?php get_footer(); ?>
