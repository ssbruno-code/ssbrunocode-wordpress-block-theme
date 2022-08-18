<?php
/**
 * @package  SsbCodeBlockTheme
 */

namespace Inc\Base;

class CustomBlock{  
    
    public function __construct($name){
        $this->name = $name;
        add_action( 'init',  [ $this, 'registerBlock' ] );
    }

    public function registerBlock($name){

        wp_register_script( $this->name, get_stylesheet_directory_uri() . "/build/{$this->name}.js", [ 'wp-blocks', 'wp-editor' ] );    
        register_block_type( "ssbcodeblocks/{$this->name}", [
        'editor_script' => $this->name
        ] );       
            
    }

}