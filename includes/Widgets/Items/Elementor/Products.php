<?php

namespace robo\Widgets\Items\Elementor;
use Elementor\Controls_Manager as Controls;
use Elementor\Widget_Base as Base;

class Products extends Base {

    public function get_name() {
        return 'robo_products';
    }

    public function get_title() {
        return __( 'Products', 'robo' );
    }

    public function get_icon() {
        return 'eicon-button';
    }

    public function get_categories() {
        return ['robo'];
    }

    public function get_keywords() {
        return ['robo', 'products', 'robo products'];
    }

    /**
     * Registers controls for
     *
     * @return void
     */
    protected function _register_controls() {
        $args = array(
            'post_type'      => 'product',
            'posts_per_page' => 10,
        );

        $loop = new \WP_Query( $args );

        $el = '<div class="robo-product-list">';
        while ( $loop->have_posts() ): $loop->the_post();
            // Products section started
            global $product;
            $pro = wc_get_product( get_the_ID() );

            $img              = sprintf( '<img src="%s" />', get_the_post_thumbnail_url( get_the_ID() ) );
            $title            = sprintf( '<h3>%s</h3>', get_the_title() );
            $description      = sprintf( '<p>%s</p>', $pro->get_description() );
            $price            = sprintf( '<span class="robo-product-price">%s %s</span>', get_woocommerce_currency_symbol(), $pro->get_price() );
            $buy_button       = sprintf( '<a class="robo-add-to-cart" href="%s"><i class="fas fa-shopping-cart"></i>Buy now</a>', $pro->add_to_cart_url() );
            $more_info_button = sprintf( '<a class="robo-more-info" href="%s"><i class="fas fa-chevron-right"></i>More info</a>', get_permalink( get_the_ID() ) );

            $parent = sprintf( '<div class="robo-product-row">
			                        <div class="robo-col-1">%s</div>
			                        <div class="robo-col-2">%s %s</div>
			                        <div class="robo-col-3">%s <div class="robo-products-list-action-button">%s %s</div></div>
			                        </div>',
                $img,  
                $title,
                $description,
                $price,
                $buy_button,
                $more_info_button
            );
            $el .= $parent;
        endwhile;

        wp_reset_query();

        echo sprintf( '%s </div>', $el );
    }

    /**
     * Renders the element to the frontend
     *
     * @return void
     */
    protected function render() {

    }

    protected function _content_template() {

    }
}