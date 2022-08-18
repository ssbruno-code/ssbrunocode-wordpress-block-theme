<?php
/**
 * @package  SsbCodeBlockTheme
 */

namespace Inc\Base;

use Inc\Base\CustomBlock;

class RegisterBlocks{  
    
    public function register(){
        new CustomBlock('banner');
        new CustomBlock('header');
        new CustomBlock('button');
    }

}