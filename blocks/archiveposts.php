<section class="container" >
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
</section>