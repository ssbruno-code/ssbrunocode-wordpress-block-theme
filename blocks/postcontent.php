<?php
while(have_posts()) {
    the_post();
?>

<section id="ssb-single-work">


  <?php 
    $image = get_field('portfolio_image');
  ?>

  <div class="container">

    <div class="jumbotron text-white bg-dark overlay"
      style="background-image: url(<?php echo esc_url($image['url']); ?>) ;">
      <div class="col my-auto text-center">
        <div class="overlay">
          <h1 class="featurette-title"><b> <?php the_title(); ?> </b></h1>
        </div>

      </div>

    </div>

  </div>


  <div class="container">
    <div class="row px-2 px-md-3 py-2 ">

      <div class="col-md-6 ssb-meta">
        <p><a href="<?php echo site_url('/works'); ?>"><i class="fa fa-home" aria-hidden="true"></i> All Projects</a>
        </p>
      </div>

      <div class="col-md-6 text-md-end ssb-meta">
        <span class="ssb-category">
          Category: <?php echo get_the_category_list(', '); ?>
        </span>
      </div>

    </div>
    <div class="row bg-light mx-0 mx-md-4 p-0 p-md-3 rounded">

      <div class="col">
        <?php the_content(); ?>
      </div>

    </div>
  </div>
</section>
<?php 

}
?>