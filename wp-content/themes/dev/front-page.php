<?php get_header(); ?>
<?php get_template_part( 'navbar' ) ; ?>
<?php get_sidebar(); ?>

<main id="main-content">
  <section class="intro p-5 widget">
    <h2 class="mb-4">Seja bem-vindo(a) ao UpDev, o Universo da Tecnologia!</h2>
    <p class="mb-5 welcome-message" id="welcomeMessage">Seja bem-vindo ao UpDev, onde a inovação e a paixão se fundem para criar soluções de software notáveis. Este espaço não é apenas um portfólio, é o reflexo da minha incessante dedicação para superar desafios por meio da tecnologia e impulsionar a evolução digital. Navegue, explore o meu trabalho e descubra como as minhas soluções personalizadas podem ajudá-lo a transformar seus objetivos em realidades concretas. Juntos, podemos moldar o futuro da tecnologia.</p>
    <section class="mission mb-5 widget">
      <h3>Minha Missão</h3>
      <div class="row">
        <div class="col-12 col-md-6">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/mission.webp" alt="Minha Missão"
            class="img-fluid mb-3">
        </div>
        <div class="col-12 col-md-6">
          <p>A missão da UpDev vai além de criar software de qualidade - é proporcionar experiências digitais significativas que impulsionem a eficiência e o crescimento. Eu, como o rosto por trás da UpDev, valorizo a transparência, a inovação e a paixão pela tecnologia. Não se trata apenas de construir soluções, mas sim de transformar ideias em realidade, proporcionando ferramentas eficientes e eficazes que resolvam desafios cotidianos e promovam a evolução contínua.</p>
          <p>A minha visão é colocar a tecnologia a serviço do crescimento sustentável. Assim, comprometo-me a desenvolver soluções alinhadas com os objetivos dos meus clientes, garantindo que a tecnologia não seja apenas uma ferramenta, mas um diferencial competitivo decisivo para seus negócios.</p>
          <p>Orgulho-me de ter a versatilidade como um dos meus principais atributos - a capacidade de adaptar meus conhecimentos e habilidades às necessidades específicas de cada projeto, ao mesmo tempo que mantenho a qualidade e a consistência.</p>
          <p>Na UpDev, acredito que o sucesso do meu cliente é o meu sucesso. Por isso, faço parcerias com eles, estabelecendo um relacionamento baseado na confiança e no respeito mútuos. Juntos, navegamos pela paisagem digital em constante mudança, explorando novas oportunidades e superando obstáculos com soluções inovadoras. Estou empenhado em ajudar cada cliente a alcançar seus objetivos, e é essa determinação que impulsiona cada projeto que assumo.</p>
        </div>
      </div>
    </section>

    <section class="about mb-5 widget">
      <h3>Sobre Mim</h3>
      <p>UpDev é mais do que uma marca - é a materialização da minha dedicação e paixão pela construção de software de excelência e inovação. Surgi da necessidade de fazer a diferença num mundo cada vez mais impulsionado pela tecnologia, e minha filosofia baseia-se em três pilares: qualidade indiscutível, inovação constante e a satisfação plena dos meus clientes.</p>
      <p>Além de possuir uma sólida formação técnica, orgulho-me de minha abordagem centrada no cliente e de um forte compromisso com o profissionalismo. Com cada desafio que enfrento, trago um olhar único para a mesa, sempre buscando as soluções mais eficientes e eficazes para os problemas apresentados pelo mercado.</p>
      <p>Eu vejo a UpDev como uma jornada contínua de aprendizado e adaptação. Estou sempre explorando novos horizontes, aprendendo novas tecnologias e adaptando-me às mudanças do mercado. Isso me permite oferecer aos meus clientes não apenas soluções para os desafios de hoje, mas também uma visão e uma estratégia para os desafios do futuro.</p>
      <p>Na UpDev, cada projeto é uma nova oportunidade para demonstrar a capacidade da tecnologia de transformar ideias em realidade e de superar expectativas. Estou empenhado em ajudar cada cliente a atingir os seus objetivos, e é essa determinação que me impulsiona a ir sempre além.</p>
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

        <div id="blogCarousel" class="carousel slide" data-bs-interval="false">
            <div class="carousel-inner">

				<?php
				// Get the 10 latest posts
				$args = array(
					'post_type' => 'post',
					'posts_per_page' => 10,
				);

				$query = new WP_Query( $args );
				$count = 0;

				while ( $query->have_posts() ) : $query->the_post();
					// Create a new row for every 3 posts
					if ($count % 3 == 0): ?>
                        <div class="carousel-item <?php echo ($count == 0) ? 'active' : ''; ?>">
                        <div class="row">
					<?php endif; ?>
                    <div class="col-md-4">
                        <div class="card h-100">
							<?php if(has_post_thumbnail()): ?>
                                <img class="card-img-top" src="<?php the_post_thumbnail_url(); ?>" alt="Card image cap">
							<?php endif; ?>
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                                <p class="card-text flex-grow-1"><?php the_excerpt(); ?></p>
                                <p class="card-text">Escrito por: <?php the_author(); ?></p>
                                <a href="<?php the_permalink(); ?>" class="btn btn-primary mt-auto">Leia Mais</a>
                            </div>
                        </div>
                    </div>
					<?php
					$count++;
					// Close the row div and open a new one every 3 posts
					if ($count % 3 == 0 || $count == $query->post_count): ?>
                        </div>
                        </div>
					<?php endif;
				endwhile;
				wp_reset_postdata();
				?>

            </div>

            <!-- Controls -->
            <a class="carousel-control-prev" href="#blogCarousel" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Anterior</span>
            </a>
            <a class="carousel-control-next" href="#blogCarousel" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Próximo</span>
            </a>
        </div>
    </section>





</main>


<?php
get_sidebar();
get_footer(); ?>