<?php

function blog_carousel_shortcode($atts) {
	ob_start();
	?>

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

	<?php
	$output = ob_get_clean();
	return $output;
}
add_shortcode('blog_carousel', 'blog_carousel_shortcode');

function chrome_extension_ad_shortcode() {
	ob_start();
	?>
    <section class="extension-ad p-5 widget">
        <h2>Experimente a nossa Extensão para Chrome!</h2>
        <p>Quer ter acesso fácil e rápido às nossas últimas postagens? Instale a nossa extensão para Chrome. Com ela, você pode ver nossas postagens recentes diretamente do seu navegador, sem precisar visitar o site.</p>
        <a href="https://extensao.updev.dev.br/" target="_blank" rel="noopener noreferrer" class="btn btn-primary">Obter a extensão</a>
    </section>
	<?php
	return ob_get_clean();
}
add_shortcode('extension_ad', 'chrome_extension_ad_shortcode');
