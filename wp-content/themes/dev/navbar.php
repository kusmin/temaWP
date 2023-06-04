<nav id="navbar" class="navbar navbar-expand-lg px-2" role="navigation">
  <div class="container-fluid">
    <div class="row justify-content-between align-items-center w-100 d-lg-flex">
      <div class="col-lg-4 d-flex justify-content-start justify-content-lg-center">
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
      </div>

      <div class="col-lg-4 d-flex justify-content-end justify-content-lg-center flex-column flex-lg-row align-items-end align-items-lg-center">
      <button class="navbar-toggler mb-2 mb-lg-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
          <ul class="navbar-nav" role="menubar">
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
                    echo '<li class="nav-item mr-3" role="presentation"><a class="nav-link" href="' . $url . '" role="menuitem" aria-label="'. $page_data['title'] .'"><i class="' . $page_data['icon'] . ' mr-2" aria-hidden="true"></i>' . $page_data['title'] . '</a></li>';
                  }
                ?>
          </ul>
          <div class="mobile-settings d-lg-none">
            <div class="theme-selector ml-3">
              <button class="theme-button light" aria-label="Mudar para tema claro"><i class="far fa-sun"></i></button>
              <button class="theme-button dark" aria-label="Mudar para tema escuro"><i               class="far fa-moon"></i></button>
              <button type="button" aria-label="Alterar tamanho da fonte" class="btn btn-outline-primary font-change-button" data-bs-toggle="modal" data-bs-target="#fontSizeModal">
                <i class="fas fa-font"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 d-lg-flex justify-content-end d-none">
        <div class="theme-selector ml-3">
          <button class="theme-button light" aria-label="Mudar para tema claro"><i class="far fa-sun"></i></button>
          <button class="theme-button dark" aria-label="Mudar para tema escuro"><i class="far fa-moon"></i></button>
        </div>

        <div class="font-size-selector ml-3">
          <button type="button" aria-label="Alterar tamanho da fonte" class="btn btn-outline-primary font-change-button" data-bs-toggle="modal" data-bs-target="#fontSizeModal">
            <i class="fas fa-font"></i>
          </button>
        </div>
      </div>
    </div>
  </div>
</nav>

