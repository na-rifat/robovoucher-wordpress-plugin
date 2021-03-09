<?php

namespace robo\Widgets;


/**
 * Manages Widgets
 */
class Manager {

    function __construct() {
        add_action( 'elementor/widgets/widgets_registered', [$this, 'register_elementor_widgets'], 99 );
        add_action( 'elementor/elements/categories_registered', [$this, 'register_elementor_categories'] );
    }

    
    public function register(){

    }

    /**
     * Registers elementor widgets
     *
     * @return void
     */
    public function register_elementor_widgets() {
        /**
         * Geomify button
         */
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Items\Elementor\Button() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Items\Elementor\Recommendation() );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Items\Elementor\Products() );
    }

    /**
     * Registers robo category for elements section
     *
     * @return void
     */
    public function register_elementor_categories( $element_manager ) {
        $element_manager->add_category(
            'robo',
            [
                'title' => __( 'Robo', 'robo' ),
                'icon'  => 'fab fa-google',
            ]
        );
        return $element_manager;
    }
}