<?php
/*
Template Name: Blog Page
*/

get_header(); ?>
<?php get_template_part( 'navbar' ) ; ?>

<div id="primary" class="content-area p-5">
  <main id="main" class="site-main">

    <div class="blog-introduction">
      <h2>Bem-vindo ao nosso blog!</h2>
      <p>Aqui na UpDev, estamos apaixonados por programação e tecnologia. Temos o prazer de compartilhar nossos
        conhecimentos, ideias e experiências através deste blog. Os tópicos variam de dicas e truques de programação,
        últimas tendências em tecnologia, análise aprofundada de linguagens e frameworks, até tutoriais detalhados e
        explicações de conceitos complexos de maneira fácil de entender.</p>
      <p>Esperamos que você se sinta inspirado, informado e desafiado. Se você está apenas começando sua jornada na
        programação ou já é um desenvolvedor experiente, temos certeza de que encontrará algo de valor aqui. Então, por
        que não dar uma olhada e ver o que temos para oferecer?</p>
      <p>Explore nossos posts</p>
    </div>

      <!-- Barra de Busca -->
      <div class="blog-search mb-4">
		  <?php get_search_form(); ?>
      </div>

      <!-- Loop básico para exibir os posts -->
      <div class="row row-cols-1 row-cols-md-3 g-4">
		  <?php
		  $args = array(
			  'post_type' => 'post',
			  'post_status' => 'publish',
		  );

		  $blog_posts = new WP_Query( $args );

		  if ( $blog_posts->have_posts() ) :
			  while ( $blog_posts->have_posts() ) : $blog_posts->the_post(); ?>
                  <div class="col">
                      <div class="card h-100 d-flex flex-column justify-content-between card-custom" style="min-height:400px;"> <!-- Adicione a classe justify-content-between aqui -->
                          <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php post_class('article-custom'); ?> style="display: flex; flex-direction: column; height: 100%;">
                              <header class="card-header">
								  <?php
								  if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
									  the_post_thumbnail('full', array('class' => 'card-img-top'));
								  }
								  the_title( '<h2 class="card-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
								  ?>
                                  <div class="card-meta text-muted small mb-2">
                                      Postado por <?php the_author(); ?>
                                  </div>
                              </header><!-- .entry-header -->

                              <div class="card-body d-flex flex-grow-1">
                                  <div class="card-text">
									  <?php the_excerpt(); ?>
                                  </div>
                              </div><!-- .entry-summary -->

                              <footer class="card-footer">
                                  <a href="<?php the_permalink(); ?>" class="btn btn-primary">Leia mais</a>
                              </footer><!-- .entry-footer -->
                          </article>
                      </div>
                  </div>
			  <?php
			  endwhile;
			  wp_reset_postdata();
		  endif;
		  ?>
      </div>

      <!-- Exibe os widgets -->
    <?php if ( is_active_sidebar( 'blog-1' ) ) : ?>
      <div id="blog-widget-area" class="blog-widget-area widget-area" role="complementary">
        <?php dynamic_sidebar( 'blog-1' ); ?>
    </div>
    <?php endif; ?>
    <!-- Exibe os widgets -->
    <?php if ( is_active_sidebar( 'blog-2' ) ) : ?>
    <div id="blog-widget-area" class="blog-widget-area widget-area" role="complementary">
        <?php dynamic_sidebar( 'blog-2' ); ?>
    </div>
    <?php endif; ?>

  </main><!-- .site-main -->
</div><!-- .content-area -->

<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip();
    })
</script>

<?php get_sidebar(); ?>
<?php get_footer(); ?>

