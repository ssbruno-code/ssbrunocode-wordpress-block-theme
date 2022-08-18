<?php 
/**
 * @package  SsbCodeBlockTheme
 */
namespace Inc\Base;

/**
* Custom post type logic
*/
class Cpts
{		

	public function register() {
		
		add_action( 'init', [ $this, 'mypluginFlushRewrites' ]);					
		register_deactivation_hook( __FILE__, 'flush_rewrite_rules' );
		register_activation_hook( __FILE__, [ $this, 'mypluginFlushRewrites' ] );	

		
	}
	
	/**
	 * Update permalinks when activating and deactivating plugin 
	 *
	 */ 
	public function mypluginFlushRewrites() {
		$this->createCPTs();
		flush_rewrite_rules();
	}		
		
	

	/**
	 * Register custom post type author
	 *
	 */	
	public function createCPTs() {	
			
		register_post_type('works', array(
            'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail'),
            'taxonomies'  => array( 'category' ),
            'rewrite' => array('slug' => 'works'),
            'has_archive' => true,
            'public' => true,
            'show_in_rest' => true, // Add new editor to the custom post type
            'labels' => array(
                'name' => 'Works',
                'add_new_item' => 'Add Work',
                'edit_item' => 'Edit Work',
                'all_items' => 'All Work',
                'singular_name' => 'Work'
            ),
            'menu_icon' => 'dashicons-welcome-write-blog'
		));

		register_post_type('messages', array(
			'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail'),
			'rewrite' => array('slug' => 'messages'),
			'public' => true,
			'show_in_rest' => true, // Add new editor to the custom post type
			'labels' => array(
				'name' => 'Messages',
				'add_new_item' => 'Add Message',
				'edit_item' => 'Edit Message',
				'all_items' => 'All Message',
				'singular_name' => 'Message'
			),
			'menu_icon' => 'dashicons-format-aside'
		));
	
	}
	
	


}