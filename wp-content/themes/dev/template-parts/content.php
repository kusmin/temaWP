<article id="post-<?php the_ID(); ?>" <?php post_class('row justify-content-center'); ?>>
    <div class="col-sm-12 col-md-8"> <!-- Controla a largura da coluna do conteúdo. Ajuste os números conforme necessário. -->
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
				/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue lendo<span class="screen-reader-text"> "%s"</span>', 'text-domain' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Páginas:', 'text-domain' ),
				'after'  => '</div>',
			) );
			?>
        </div><!-- .entry-content -->

        <footer class="entry-footer">
			<?php edit_post_link( __( 'Editar', 'text-domain' ), '<span class="edit-link">', '</span>' ); ?>
        </footer><!-- .entry-footer -->
    </div>
</article><!-- #post-<?php the_ID(); ?> -->
