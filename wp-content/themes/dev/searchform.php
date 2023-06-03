<form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <div class="input-group">
        <input type="text" value="<?php echo get_search_query(); ?>" name="s" id="s" class="form-control" placeholder="Digite sua busca..." />
        <div class="input-group-append">
        <button type="submit" id="searchsubmit" class="btn btn-primary search-btn">
          <i class="fas fa-search"></i>
      </button>

        </div>
    </div>
</form>
