<?php
/**
 * @package  SsbCodeBlockTheme
 */

namespace Inc\Base;

use Inc\Base\CustomBlock;
use Inc\Base\StaticBlock;

class RegisterBlocks{  
    
    public function register(){

        new CustomBlock('banner', true);
        new CustomBlock('header');
        new CustomBlock('buttom');
        
        new StaticBlock('ssbhero');
        new StaticBlock('topmenu');
        new StaticBlock('aboutme');
        new StaticBlock('myprojects');
        new StaticBlock('contact');
        new StaticBlock('timeline');
        new StaticBlock('skills');
        new StaticBlock('posts');
        new StaticBlock('footer');

    }

}