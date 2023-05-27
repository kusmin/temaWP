<?php get_header(); ?>

<div id="main-content">
<?php
while ( have_posts() ) : the_post();
    get_template_part( 'template-parts/content', 'single' );
endwhile;
?>
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
