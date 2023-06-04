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
    <div class="blog-search">
      <?php get_search_form(); ?>
    </div>

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
            if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
                the_post_thumbnail('full', array('class' => 'rounded mb-4'));
            } 
            the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
            ?>
            <div class="entry-meta">
                <span class="meta-info">
                    <span class="author-name"><?php the_author(); ?></span>
                </span>
            </div>
        </header><!-- .entry-header -->

        <div class="entry-summary mb-3">
            <?php the_excerpt(); ?>
        </div><!-- .entry-summary -->

        <footer class="entry-footer">
            <a href="<?php the_permalink(); ?>" class="btn btn-primary">Leia mais</a>
        </footer><!-- .entry-footer -->
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
    <!-- Exibe os widgets -->
    <?php if ( is_active_sidebar( 'blog-2' ) ) : ?>
    <div id="blog-widget-area" class="blog-widget-area widget-area" role="complementary">
        <?php dynamic_sidebar( 'blog-2' ); ?>
    </div>
    <?php endif; ?>

  </main><!-- .site-main -->
</div><!-- .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>

