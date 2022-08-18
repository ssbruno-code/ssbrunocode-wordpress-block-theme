<?php
/**
 * @package  SsbCodeBlockTheme
 */

namespace Inc\Settings;

class SearchRoute{
    
    private $ssbruno_code_options;

	public function register() {
        add_action( 'rest_api_init',  [ $this, 'ssbcodeCustomSearch' ] );
    }

    public function ssbcodeCustomSearch() {
        register_rest_route('ssbcode/v1', 'search', array(
            'methods' => \WP_REST_SERVER::READABLE,
            'callback' => 'ssbcodeSearchResults'
        ));
    }

    
    public function ssbcodeSearchResults( $args ){
        $query = new WP_Query(array(
            'post_type' => array('works'),
            's' => sanitize_text_field($args['term'])
        ));

        $results = array(        
            'works' => array(),        
        );  

        while($query->have_posts()) {
            $query->the_post();       
            
            $postImage = get_field('portfolio_image');
            
            if(get_post_type() == 'works'){
                array_push($results['works'], array(
                    'title' => get_the_title(),
                    'permalink' => get_the_permalink(),
                    'image' => $postImage['url']
                ));
            }     
        }     

        return $results;

    }
}
