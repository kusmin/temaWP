<aside class="col-lg-4 mt-5">
    <?php if ( is_active_sidebar( 'custom-side-bar' ) ) : ?>
        <div id="secondary" class="widget-area" role="complementary">
            <?php dynamic_sidebar( 'custom-side-bar' ); ?>
        </div>
    <?php endif; ?>
</aside>
