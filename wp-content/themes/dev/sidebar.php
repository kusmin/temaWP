<aside id="sidebar" class="col-12 p-3">
    <nav class="navbar">
        <div class="d-flex align-items-center justify-content-between">
           <div class="logo-container mr-5">
            <?php 
            if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) {
                the_custom_logo();
            } else { ?>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="Logo do site" />
                </a>
            <?php } ?>
        </div>


            <div class="d-flex align-items-center">
                <ul class="nav flex-row">
                    <?php
                    $pages = array(
                        'home' => array('title' => 'Home', 'icon' => 'fas fa-home'),
                        'contato' => array('title' => 'Contato', 'icon' => 'fas fa-envelope'),
                        'sobre' => array('title' => 'Sobre', 'icon' => 'fas fa-info-circle'),
                        'servicos' => array('title' => 'Serviços', 'icon' => 'fas fa-briefcase'),
                        'blog' => array('title' => 'Blog', 'icon' => 'fas fa-blog'),
                    );

                    foreach ($pages as $page_slug => $page_data) {
                        if ($page_slug == 'home') {
                            $url = esc_url(home_url('/'));
                        } else {
                            $url = get_permalink(get_option($page_slug . '_page_id'));
                        }
                        echo '<li class="nav-item mr-3"><a class="nav-link" href="' . $url . '"><i class="' . $page_data['icon'] . ' mr-2"></i>' . $page_data['title'] . '</a></li>';
                    }
                    ?>
                </ul>

                <div class="theme-selector ml-3">
                    <button class="theme-button light" aria-label="Mudar para tema claro"><i class="far fa-sun"></i></button>
                    <button class="theme-button dark" aria-label="Mudar para tema escuro"><i class="far fa-moon"></i></button>
                </div>
            </div>
        </div>
    </nav>

    <?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
        <div id="secondary" class="widget-area mt-5" role="complementary">
            <?php dynamic_sidebar( 'sidebar-1' ); ?>
        </div>
    <?php endif; ?>
</aside>
