<?php 
/**
 * @package  SsbCodeBlockTheme
 */
namespace Inc\Base;

use Inc\Base\BaseController;

/**
* 
*/
class Enqueue extends BaseController
{		

	public function register() {
		
		add_action( 'wp_enqueue_scripts', array( $this, 'publicEnqueue' ) );
	
	}

	/**
	 * Register the JavaScript and css for the public area.
	 *
	 */
	function publicEnqueue() {
		wp_enqueue_script('main-ssbcodeblocks-js', get_theme_file_uri('/build/index.js'), array('jquery'), '1.0', true);
		wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js', array('jquery'), '1.0', true);
		
		wp_localize_script('main-ssbcodeblocks-js', 'ssbcodeData', array(
			'root_url' => get_site_url(),
			'nonce' => wp_create_nonce('wp_rest')
		));

		wp_enqueue_style( 'bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' );
		wp_enqueue_style('custom-google-fonts', '//fonts.googleapis.com/css2?family=Montserrat:wght@200;300;500;600;800');
		wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
		wp_enqueue_style('ssbcode_main_styles', get_theme_file_uri('/build/style-index.css'));
		wp_enqueue_style( 'dashicons' );  
	}


}