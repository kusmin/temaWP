<?php get_header(); ?>

<div id="main-content">
<?php
if ( have_posts() ) :
    while ( have_posts() ) : the_post();
        get_template_part( 'template-parts/content' );
    endwhile;
else :
    get_template_part( 'template-parts/content', 'none' );
endif;
?>
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
