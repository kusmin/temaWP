<aside id="sidebar" class="col-md-4">
    <nav class="navbar">
        <ul class="nav justify-content-end">
            <li class="nav-item"><a class="nav-link" href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a></li>
            <?php
            $args = array(
                'exclude'      => '', // IDs de páginas para excluir
                'title_li'     => '', // Deixar vazio para remover o título
                'sort_column'  => 'post_title', // Ordenar páginas por título
                'post_type'    => 'page', // Tipo de post
                'post_status'  => 'publish', // Somente páginas publicadas
                'echo'         => 0
            );
            $pages = wp_list_pages($args);
            $pages = str_replace('<li class="page_item', '<li class="nav-item', $pages);
            $pages = str_replace('<a', '<a class="nav-link"', $pages);
            echo $pages;
            ?>
        </ul>

        <div class="theme-selector">
            <button class="theme-button light" aria-label="Mudar para tema claro"><i class="far fa-sun"></i></button>
            <button class="theme-button dark" aria-label="Mudar para tema escuro"><i class="far fa-moon"></i></button>
        </div>

    </nav>

    <?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
        <div id="secondary" class="widget-area" role="complementary">
            <?php dynamic_sidebar( 'sidebar-1' ); ?>
        </div>
    <?php endif; ?>
</aside>
