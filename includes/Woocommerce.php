<?php

namespace robo;

/**
 * Integration between woocommerce and robo voucher
 */
class Woocommerce {

    function __construct() {

    }

    public function init() {
        if ( in_array( 'woocommerce/woocommerce.php', get_option( 'active_plugins', [] ) ) ) {
            add_action( 'woocommerce_product_options_general_product_data', [$this, 'product_fields'] );
        }
    }

    public function product_fields() {
        global $post;

        $product = wc_get_product( $post->ID );        
        woocommerce_form_field(
            'expire-date',
            [
                'type'        => 'date',
                'label'       => __( 'Expires at', 'robo' ),
                'description' => __( 'Enter a date to be expired', 'robo' ),
                'class'       => ['robo-wc-input-field'],
            ],
            $product->get_meta( 'expire-date' )
        );

        woocommerce_wp_textarea_input(
            [
                'id'          => 'location',
                'label'       => __( 'Location', 'robo' ),
                'value'       => $product->get_meta( 'robo-location' ),
                'description' => __( 'Location details to display', 'robo' ),
                'desc_tip'    => true,
                'rows'        => 10,
                'cols'        => 30,
                'style'       => 'height: auto',
            ]
        );

        woocommerce_wp_text_input(
            [
                'id'          => 'robo-condition',
                'label'       => __( 'Conditions', 'robo' ),
                'value'       => $product->get_meta( 'robo-conditions' ),
                'description' => __( 'Conditions to display', 'robo' ),
                'desc_tip'    => true,
            ]
        );        
    }

    public function save_meta($post_id){
        $product = wc_get_product($post_id);
        

        // $product->update_meta_data('');
    }
}
