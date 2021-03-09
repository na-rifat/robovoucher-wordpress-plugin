<?php
    // namespace robo;
    /**
     * This files contains all important functions for robo wp plugin
     */

    /**
     * Return a css files url
     *
     * @param  [type] $filename
     * @return void
     */
    if ( ! function_exists( 'robo_cssfile' ) ) {
        function robo_cssfile( $filename, $deps = [] ) {
            return ['src' => ROBO_CSS_URL . "/{$filename}.css", 'version' => robo_cssversion( $filename ), 'deps' => $deps];
        }
    }

    /**
     * Return a js files url
     *
     * @param  [type] $filename
     * @return void
     */
    if ( ! function_exists( 'robo_jsfile' ) ) {
        function robo_jsfile( $filename, $deps = [] ) {
            return ['src' => ROBO_JS_URL . "/{$filename}.js", 'version' => robo_jsversion( $filename ), 'deps' => $deps];
        }
    }

    /**
     * Return a image files url
     *
     * @param  [type] $filename
     * @return void
     */
    if ( ! function_exists( 'robo_imgfile' ) ) {
        function robo_imgfile( $filename ) {
            return ROBO_IMG_URL . "/$filename";
        }
    }
    /**
     * Return a image files url
     *
     * @param  [type] $filename
     * @return void
     */
    if ( ! function_exists( 'robo_icofile' ) ) {
        function robo_icofile( $filename ) {
            return ROBO_IMG_URL . "/icons/$filename";
        }
    }

    /**
     * Get js files version based on date modified
     *
     * @param  [type] $filename
     * @return void
     */
    if ( ! function_exists( 'robo_jsversion' ) ) {
        function robo_jsversion( $filename ) {
            return filemtime( convert_path_slash( ROBO_PATH . "/assets/js/{$filename}.js" ) );
        }
    }
    /**
     * Get css files version based on date modified
     *
     * @param  [type] $filename
     * @return void
     */
    if ( ! function_exists( 'robo_cssversion' ) ) {
        function robo_cssversion( $filename ) {
            return filemtime( convert_path_slash( ROBO_PATH . "/assets/css/{$filename}.css" ) );
        }
    }

    /**
     * Replaces back slashes with slashes from a files path
     *
     * @param  [type] $path
     * @return void
     */
    if ( ! function_exists( 'convert_path_slash' ) ) {
        function convert_path_slash( $path ) {
            return str_replace( "\\", "/", $path );
        }
    }

    /**
     * Pulls a template from views folder
     *
     * @param  [type] $dir
     * @param  [type] $filename
     * @return void
     */
    if ( ! function_exists( 'robo_template' ) ) {
        function robo_template( $dir, $filename ) {
            ob_start();
            include convert_path_slash( "{$dir}/views/{$filename}.php" );
            return ob_get_clean();
        }
    }

    if ( ! function_exists( 'robo_admin_template' ) ) {
        /**
         * Returns a template for admin panel
         *
         * @param  [type] $dir
         * @param  [type] $filename
         * @return void
         */
        function robo_admin_template( $dir, $filename ) {
            ob_start();
            include convert_path_slash( "{$dir}/views/{$filename}.php" );
            echo ob_get_clean();
            return;
        }
    }

    /**
     * Creates a action field for forms
     *
     * @param  [type] $action
     * @return void
     */
    if ( ! function_exists( 'robo_form_action' ) ) {
        function robo_form_action( $action ) {
            ob_start();
        ?>
<input type="hidden" name="action" value="<?php echo $action ?>" />
<?php
    echo ob_get_clean();
        }
    }

    /**
     * get's google recaptcha response
     *
     * @param  [type] $recaptcha
     * @return void
     */
    if ( ! function_exists( 'reCaptcha' ) ) {
        function reCaptcha( $recaptcha ) {
            $secret = get_option( 'robo_captcha_secret' ) ? get_option( 'robo_captcha_secret' ) : '';
            $ip     = $_SERVER['REMOTE_ADDR'];

            $postvars = array(
                "secret"   => $secret,
                "response" => $recaptcha,
                "remoteip" => $ip,
            );
            $url = "https://www.google.com/recaptcha/api/siteverify";
            $ch  = curl_init();
            curl_setopt( $ch, CURLOPT_URL, $url );
            curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
            curl_setopt( $ch, CURLOPT_TIMEOUT, 10 );
            curl_setopt( $ch, CURLOPT_POSTFIELDS, $postvars );
            $data = curl_exec( $ch );
            curl_close( $ch );

            return json_decode( $data, true );
        }
    }

    /**
     * Verifies if a function is okay or not
     *
     * @return void
     */
    if ( ! function_exists( 'verify_robo_captcha' ) ) {
        function verify_robo_captcha() {
            $recaptcha = $_POST['g-recaptcha-response'];
            $res       = reCaptcha( $recaptcha );
            if ( ! $res['success'] ) {
                return true;
            } else {
                return false;
            }
        }
    }

    if ( ! function_exists( 'robo_ajax' ) ) {
        /**
         * Registers an ajax hook
         *
         * @param  [type] $action
         * @param  array  $func
         * @return void
         */
        function robo_ajax( $action, $func = [] ) {
            add_action( "wp_ajax_$action", $func );
            add_action( "wp_ajax_nopriv_$action", $func );
        }
    }

    if ( ! function_exists( 'robo_var' ) ) {
        /**
         * Returns formatted variable
         *
         * @param  [type]                        $var
         * @return void|string|int|array|mixed
         */
        function robo_var( $var ) {
            return isset( $_POST[$var] ) && ! empty( $_POST[$var] ) ? $_POST[$var] : '';
        }

        if ( ! function_exists( 'robo_get_option' ) ) {
            function robo_get_option( $key ) {
                return stripslashes( get_option( $key ) );
            }
        }
    }

    if ( ! function_exists( 'array2options' ) ) {
        function array2options( $array ) {
            $result = '';
            foreach ( $array as $item ) {
                $caption = ucwords( $item );
                $result .= "<option value='{$item}'>{$caption}</option";
            }
            return $result;
        }
    }

    if ( ! function_exists( 'std2array' ) ) {
        function std2array( $std ) {
            return json_decode( json_encode( $std ), true );
        }
    }
    if ( ! function_exists( 'robo_toggle' ) ) {
        function robo_toggle( $atts ) {
            $curernt_val = get_option( $atts['key'] );
            $val1        = $atts['val1'];
            $val2        = $atts['val2'];
            $title1      = $atts['title1'];
            $title2      = $atts['title2'];

            ob_start();
            if ( $curernt_val == $val2 ) {
            ?>
<div id="<?php echo $atts['id'] ?>" class="cp-toggle shad" data-key="<?php echo $atts['key'] ?>"
    data-value="<?php echo $curernt_val ?>">
    <div class="toggle-item" data-value="<?php echo $val1 ?>"><?php _e( $title1, 'robo' )?></div>
    <div class="toggle-item active-toggle" data-value="<?php echo $val2 ?>"><?php _e( $title2, 'robo' )?></div>
</div>
<?php
    } else {
            ?>
<div id="<?php echo $atts['id'] ?>" class="cp-toggle shad" data-key="<?php echo $atts['key'] ?>"
    data-value="<?php echo $curernt_val ?>">
    <div class="toggle-item active-toggle" data-value="<?php echo $val1 ?>"><?php _e( $title1, 'robo' )?></div>
    <div class="toggle-item" data-value="<?php echo $val2 ?>"><?php _e( $title2, 'robo' )?></div>
</div>
<?php
    }

    }
}


if(!function_exists('current_url')){
    function current_url(){
        // return $_SERVER['HTTP_HOST'] 
    }
}