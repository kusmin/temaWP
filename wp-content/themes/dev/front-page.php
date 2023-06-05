<?php get_header(); ?>
<?php get_template_part( 'navbar' ) ; ?>
<?php get_sidebar(); ?>

<main id="main-content">
  <section class="intro p-5 widget">
    <h2 class="mb-4">Seja bem-vindo(a) ao UpDev, o Universo da Tecnologia!</h2>
    <p class="mb-5 welcome-message" id="welcomeMessage">O UpDev é mais do que apenas um portfólio de desenvolvimento de
      software. É a manifestação da minha paixão pela criação de soluções que impulsionam o futuro e superam os
      desafios. Aqui, você pode explorar meu trabalho e descobrir como posso ajudá-lo a alcançar seus objetivos com
      soluções digitais inovadoras.</p>
    <section class="mission mb-5 widget">
      <h3>Minha Missão</h3>
      <div class="row">
        <div class="col-12 col-md-6">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/mission.webp" alt="Minha Missão"
            class="img-fluid mb-3">
        </div>
        <div class="col-12 col-md-6">
          <p>A missão da UpDev é criar software de qualidade que faça a diferença. Valorizo a transparência, a inovação
            e a paixão pela tecnologia. Trabalho com o objetivo de transformar ideias em soluções digitais,
            proporcionando aos meus clientes ferramentas eficientes e eficazes para auxiliar em seus desafios
            cotidianos.</p>
          <p>Meu compromisso é desenvolver soluções que estejam alinhadas com os objetivos dos meus clientes, garantindo
            que a tecnologia se torne um diferencial competitivo para seus negócios. Tenho orgulho da minha habilidade
            em adaptar meus conhecimentos e habilidades às necessidades específicas de cada projeto.</p>
        </div>
      </div>
    </section>

    <section class="about mb-5 widget">
      <h3>Sobre Mim</h3>
      <p>UpDev é a expressão do meu compromisso com o desenvolvimento de software de alta qualidade e inovador. Nasci da
        vontade de fazer a diferença através da tecnologia. Meu compromisso é com a qualidade, a inovação e a satisfação
        dos meus clientes. Com profissionalismo e alta qualificação, estou sempre em busca das melhores soluções para os
        desafios apresentados pelo mercado.</p>
    </section>
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
          aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
          aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
          aria-label="Slide 3"></button>
      </div>
      <section class="carousel p-5 widget">
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">

        <?php
        $args = array(
            'post_type' => 'slide',
            'posts_per_page' => -1
        );
        $slide_query = new WP_Query( $args );

        if ( $slide_query->have_posts() ) : 
            $slide_count = 0;
            while ( $slide_query->have_posts() ) : $slide_query->the_post(); ?>

            <div class="carousel-item <?php echo ($slide_count == 0) ? 'active' : ''; ?>">
                <img src="<?php the_field('image'); ?>" class="d-block w-100 img-fluid" alt="<?php the_field('title'); ?>">            
                <div class="carousel-caption d-none d-md-block">
                    <h5><?php the_field('title'); ?></h5>
                    <p><?php the_field('text'); ?></p>
                </div>
            </div>

            <?php 
            $slide_count++;
            endwhile;
        else: ?>

            <!-- Início do carrossel fallback -->
            <div class="carousel-item active">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/quality-code.webp" class="d-block w-100 img-fluid" alt="Código de qualidade" loading="lazy">            
                <div class="carousel-caption d-none d-md-block">
                    <h4>Código de qualidade</h4>
                    <p>Entregamos códigos altamente otimizados, escritos de forma clara e eficiente, que são facilmente escaláveis e sustentáveis. Nosso foco está na qualidade, na manutenibilidade e na elegância do código, garantindo um desempenho superior e um código de fácil leitura.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/consultancy.webp" class="d-block w-100 img-fluid" alt="Consultoria" loading="lazy">            
                <div class="carousel-caption d-none d-md-block">
                    <h4>Consultoria</h4>
                    <p>Especialistas em oferecer consultoria estratégica personalizada para ajudar a sua empresa a superar desafios técnicos complexos. Avaliamos as suas necessidades tecnológicas e fornecemos orientação especializada para ajudar a transformar suas ideias em soluções práticas e eficientes.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/support.webp" class="d-block w-100 img-fluid" alt="Suporte" loading="lazy">            
                <div class="carousel-caption d-none d-md-block">
                    <h4>Suporte</h4>
                    <p>Oferecemos suporte técnico abrangente para garantir que a sua operação nunca seja interrompida. Nosso time de profissionais experientes está disponível para fornecer assistência oportuna e eficaz, seja resolvendo problemas técnicos ou fornecendo orientação sobre questões não técnicas.</p>
                </div>
            </div>
            <!-- Fim do carrossel fallback -->

        <?php endif; 
                    ?>
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







  </section>

  <?php if ( is_active_sidebar( 'front-page-widgets' ) ) : ?>
        <div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
            <?php dynamic_sidebar( 'front-page-widgets' ); ?>
        </div><!-- #primary-sidebar -->
    <?php endif; ?>

    <section class="latest-posts p-5 widget">
  <h2>Últimas postagens do blog</h2>

  <?php
    // Mostra os últimos 10 posts
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => 10,
    );

    $query = new WP_Query( $args );

    while ( $query->have_posts() ) : $query->the_post(); ?>
      <div class="post-preview">
        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
        <p><?php the_excerpt(); ?></p>
        <p>Escrito por: <?php the_author(); ?></p>
        <p><a href="<?php the_permalink(); ?>">Leia Mais</a></p>
      </div>
    <?php
    endwhile;
    wp_reset_postdata();
    ?>
</section>

</main>


<?php get_footer(); ?>