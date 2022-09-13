<section id="ssb-section-id-7">
    <div class="container">
    <h2 class="text-center">
        <b>Last Works</b>
    </h2>

    <?php 
        $today = date('Ymd');
        $homepageEvents = new WP_Query(array(
        'posts_per_page' => 3,
        'post_type' => 'works',
        'order' => 'DESC',            
        ));

        while($homepageEvents->have_posts()) {
        $homepageEvents->the_post();

        ?>

        <div class="bg-light me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
            <div >
            <h2 class="display-5"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <p><?php if (has_excerpt()) {
                echo get_the_excerpt();
                } else {
                echo wp_trim_words(get_the_content(), 10);
                } ?> <a href="<?php the_permalink(); ?>">Read more &raquo;</a>
            </p>
            </div>
            <div class="bg-body shadow-sm mx-auto" style="width: 80%; border-radius:12px 12px 0 0;">
            <?php 
            $image = get_field('portfolio_image');
            if( !empty( $image ) ): ?>
                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" style="border-radius:12px 12px 0 0;"/>
            <?php endif; ?>
            </div>
        </div>

    <?php
        
        }

    ?>


</section>