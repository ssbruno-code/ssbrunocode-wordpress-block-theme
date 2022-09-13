<?php
/**
 * @package  SsbCodeBlockTheme
 */

namespace Inc\Base;

class CustomBlock{  

    private $name;
    private $renderCallback;

    public function __construct($name, $renderCallback = null){
        $this->name = $name;
        $this->renderCallback = $renderCallback;
        add_action( 'init',  [ $this, 'registerBlock' ] );
    }

    public function renderCallback($attributes, $content) {

        ob_start();
        
            require get_theme_file_path( "/blocks/{$this->name}.php" );

        return ob_get_clean();

    }

    public function registerBlock($name){

        wp_register_script( $this->name, get_stylesheet_directory_uri() . "/build/{$this->name}.js", [ 'wp-blocks', 'wp-editor' ] );  
        
        $args = [
            'editor_script' => $this->name
        ];

        if ($this->renderCallback) {
            $args['render_callback'] = [$this, 'renderCallback'];
        }
        
        register_block_type( "ssbcodeblocks/{$this->name}", $args );       
            
    }

}