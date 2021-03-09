<?php

namespace robo;

/**
 * Registers essential assets
 */
class Assets {
    /**
     * Construct assets class
     */
    function __construct() {
        add_action( 'wp_head', [$this, 'svg_bg'] );

        add_action( 'wp_enqueue_scripts', [$this, 'register'] );
        add_action( 'admin_enqueue_scripts', [$this, 'register'] );
        add_action( 'wp_enqueue_scripts', [$this, 'load'] );
        add_action( 'admin_enqueue_scripts', [$this, 'load'] );
    }

    /**
     * Initializes the class
     *
     * @return void
     */
    public function init() {

    }

    /**
     * Return scripts from array
     *
     * @return array
     */
    public function get_scripts() {
        return [
            'robo-admin-script'    => robo_jsfile( 'admin', ['jquery'] ),
            'robo-frontend-script' => robo_jsfile( 'frontend', ['jquery'] ),
            'robo-widgets-script'  => robo_jsfile( 'widgets', ['jquery'] ),
        ];
    }

    /**
     * Return styles from array
     *
     * @return array
     */
    public function get_styles() {
        return [
            'robo-admin-styles'    => robo_cssfile( 'admin' ),
            'robo-frontend-styles' => robo_cssfile( 'frontend' ),
            'robo-widgets-styles'  => robo_cssfile( 'widgets' ),
            'robo-header2-styles'   => robo_cssfile( 'header2' ),
            'robo-fontawesome'     => [
                'src'     => 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css',
                'version' => '5.15.2',
            ],
        ];
    }

    /**
     * Return localize variable from array
     *
     * @return array
     */
    public function get_localize() {
        return [
            'robo-admin-script' => [
                'ajax_url' => admin_url( 'admin-ajax.php' ),
            ],
        ];
    }

    /**
     * Registers scripts, styles and localize variables
     *
     * @return void
     */
    public function register() {
        // Scripts
        $scripts = $this->get_scripts();

        foreach ( $scripts as $handle => $script ) {
            $deps = isset( $script['deps'] ) ? $script['deps'] : false;

            wp_register_script( $handle, $script['src'], $deps, ! empty( $script['version'] ) ? $script['version'] : false, true );

        }

        // Styles
        $styles = $this->get_styles();

        foreach ( $styles as $handle => $style ) {
            $deps = isset( $style['deps'] ) ? $style['deps'] : false;

            wp_register_style( $handle, $style['src'], $deps, ! empty( $style['version'] ) ? $style['version'] : false );
        }

        // Localization
        $localize = $this->get_localize();

        foreach ( $localize as $handle => $vars ) {
            wp_localize_script( $handle, 'robo', $vars );
        }
    }

    /**
     * Loads the scripts to frontend
     *
     * @return void
     */
    public function load() {
        wp_enqueue_style( 'robo-fontawesome' );
        wp_enqueue_style( 'robo-widgets-styles' );

        if ( is_admin() ) {
            wp_enqueue_style( 'robo-admin-styles' );
            wp_enqueue_script( 'robo-admin-script' );
        } else {
            wp_enqueue_style( 'robo-frontend-styles' );
            wp_enqueue_script( 'robo-frontend-script' );
        }

        global $wp;
        if ( home_url( $wp->request ) == site_url() ) {

        } else {
            wp_enqueue_style( 'robo-header2-styles' );
        }
    }

    /**
     * Inserts the background svg for home page
     *
     * @return void
     */
    public function svg_bg() {
        global $wp;
        if ( home_url( $wp->request ) == site_url() ) {
            echo '<svg class="svg-intro-bottom" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none">
            <defs> <linearGradient id="linear" x1="0" y1="0%" x2="100%" y2="20%" spreadMethod="pad"> <stop offset="0%" stop-color="#030D70"></stop> <stop offset="100%" stop-color="#193BDB"></stop> </linearGradient> </defs>
                <path d="M30,0 L56,80 Q57.5,84.4 60,82 L100,40 100,0 Z" fill="url(#linear)" fill-opacity="0.9"></path>
            </svg>';
        }
    }
}