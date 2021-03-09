<?php
/**
 * Robo
 *
 *
 * @wordpress-plugin
 * Plugin Name:       Robo
 * Plugin URI:        https://rafalotech.com/plugins/wp/robo
 * Description:       Handles robo functions
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Rafalo tech
 * Author URI:        https://rafalotech.com
 * Text Domain:       robo
 * License:           GPL v2 or later
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 *
 * @package           PluginPackage
 *
 * @author            Rafalo tech
 * @copyright         2021 Rafalo tech
 * @license           GPL-2.0-or-later
 */

namespace robo;

use robo\Widgets\Manager;

require_once "vendor/autoload.php";

/**
 * Handles the Robo plugin
 *
 * @author Rafalo tech <admin@rafalotech.com>
 */

class robo {

    const info = [
        'name'        => 'Robo',
        'text-domain' => 'robo',
        'version'     => '1.0',
    ];

    function __construct() {
        $this->define_constants();

        add_action( 'plugins_loaded', [$this, 'init'] );
    }


    /**
     * Initializes the robo sub classes and others
     *
     * @return void
     */
    public function init() {
        $assets      = new Assets();
        $widgets     = new Manager();
        $woocommerce = new Woocommerce();
        $crud = new CRUD();

        // Initialization
        $woocommerce->init();
    }

    /**
     * Initialzies default wordpress categories
     *
     * @return void
     */
    public function init_wordpress_widgets() {

    }

    /**
     * Creates the instance of the class
     *
     * @return void
     */
    public static function create() {
        $created = false;

        if ( ! $created ) {
            $created = new self();
        }
    }

    /**
     * Defines necessery constants
     *
     * @return void
     */
    public function define_constants() {
        define( 'ROBO', __FILE__ );

        define( 'ROBO_URL', plugins_url( '', ROBO ) );
        define( 'ROBO_PATH', __DIR__ );

        define( 'ROBO_ASSETS_PATH', ROBO_PATH . "//assets/" );
        define( 'ROBO_CSS_PATH', ROBO_ASSETS_PATH . "//css" );
        define( 'ROBO_JS_PATH', ROBO_ASSETS_PATH . "//js" );
        define( 'ROBO_IMG_PATH', ROBO_ASSETS_PATH . "//img" );

        define( 'ROBO_ASSETS_URL', ROBO_URL . "//assets/" );
        define( 'ROBO_CSS_URL', ROBO_ASSETS_URL . "//css" );
        define( 'ROBO_JS_URL', ROBO_ASSETS_URL . "//js" );
        define( 'ROBO_IMG_URL', ROBO_ASSETS_URL . "//img" );

        define( 'ROBO_TEMPLATES_PATH', ROBO_PATH . "//templates/" );
    }
}

// Create instance
function instance() {
    robo::create();
}

instance();
