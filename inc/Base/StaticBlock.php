<?php
/**
 * @package  SsbCodeBlockTheme
 */

namespace Inc\Base;

class StaticBlock{  

    public $name;

    public function __construct($name){
        $this->name = $name;
        add_action( 'init',  [ $this, 'registerBlock' ] );
    }

    public function renderCallback($attributes, $content) {

        ob_start();
        
            require get_theme_file_path( "/blocks/{$this->name}.php" );

        return ob_get_clean();

    }

    public function registerBlock($name){

        wp_register_script( $this->name, get_stylesheet_directory_uri() . "/blocks/{$this->name}.js", [ 'wp-blocks', 'wp-editor' ] );  
        
        register_block_type( "ssbcodeblocks/{$this->name}", [
            'editor_script' => $this->name,
            'render_callback' => [$this, 'renderCallback']
        ] );       
            
    }

}