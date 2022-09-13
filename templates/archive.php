<?php

get_header();

 ?>
<body >
  <section class="p-5" id="ssb-archive-section-1">
      <div class="container">

        <div class="row p-bottom">          

          <div class="col-12 text-center">
            <h1>
              <span class="ssbc-gradient-text "><?php echo get_the_archive_title(); ?></span>
            </h1>
            <br>
            <a href="/works">
              <button type="button" class="btn btn-primary btn-lg px-4 me-md-2">All Projects</button>
            </a>
            <a href="/category/landing-page">
              <button type="button" class="btn btn-primary btn-lg px-4 me-md-2">Landing Pages</button>
            </a>
            <a href="/category/plugin">
              <button type="button" class="btn btn-primary btn-lg px-4 me-md-2">Plugins</button>
            </a>
            <a href="/category/web-app">
              <button type="button" class="btn btn-primary btn-lg px-4 me-md-2">Web Apps</button>
            </a>
            <span class="search-trigger js-search-trigger float-right btn btn-primary btn-lg px-4 me-md-2">
              <i class="fa fa-search" aria-hidden="true"></i>Pesquisar
            </span>

          </div>
        </div>
        <hr>
      </div>
    </section>

  <div class="container" >
    <div class="row">
      <?php
      while(have_posts()) {
        the_post(); ?>
      

        
        
        <div class="col-sm-6">
          <div class="card card-space">
            <?php 
              $image = get_field('portfolio_image');
              
              if( !empty( $image ) ): ?>
              <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>"
                class="card-img-top" />
            <?php endif; ?>          
            <div class="card-body">          
              <h5 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
              <p class="card-text"><?php if (has_excerpt()) {
                      echo get_the_excerpt();
                    } else {
                      echo wp_trim_words(get_the_content(), 18);
                      } ?></p>
              <a href="<?php the_permalink();  ?>" class="btn btn-primary">View project &raquo;</a>
            </div>
          </div>
        </div>


    
      <?php }
      echo paginate_links();
    ?>
    </div>
  </div>
</body>
<?php get_footer();

?>