<?php
/*
Template Name: About Page
*/

get_header(); ?>
<?php get_template_part( 'navbar' ) ; ?>

<div id="primary" class="content-area p-5">
    <main id="main" class="site-main" role="main">
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <header class="entry-header">
                <h1 class="entry-title"><?php the_title(); ?></h1>
            </header>
            
            <div class="entry-content">
                <?php the_content(); ?>
            </div>
            
            <?php if ( is_active_sidebar( 'about-1' ) ) : ?>
                <div id="about-widget-area" class="about-widget-area widget-area" role="complementary">
                    <?php dynamic_sidebar( 'about-1' ); ?>
                </div>
            <?php endif; ?>
        </article>
    </main>
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
