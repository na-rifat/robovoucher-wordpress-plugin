<?php

namespace robo;

class Shortcodes {

    function __construct() {

    }
    
    function register() {
        add_shortcode( 'robo-header', [$this->templates, 'header'] );
        add_shortcode( 'robo-footer', [$this->templates, 'footer'] );        
    }

    function init(){
        $this->register();
    }
}