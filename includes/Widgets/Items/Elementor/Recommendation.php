<?php

namespace robo\Widgets\Items\Elementor;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

use \Elementor\Controls_Manager as Controls;
use \Elementor\Widget_Base as Base;

class Recommendation extends Base {
    public function get_name() {
        return 'robo-recommendation';
    }

    public function get_title() {
        return __( 'Robo recommendation', 'robo' );
    }

    public function get_icon() {
        return 'eicon-accordion';
    }

    public function get_categories() {
        return ['robo'];
    }

    protected function _register_controls() {
        $this->start_controls_section(
            'general',
            [
                'label' => __( 'General', 'robo' ),
                'tab'   => Controls::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'caption_image',
            [
                'type'    => Controls::MEDIA,
                'label'   => __( 'Caption image', 'robo' ),
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_responsive_control(
            'caption_size',
            [
                'type'            => Controls::SLIDER,
                'label'           => __( 'Caption size', 'robo' ),
                'devices'         => ['mobile', 'tablet', 'desktop'],
                'size_units'      => ['px', '%'],
                'range'           => [
                    'px' => [
                        'min' => 0,
                        'max' => 800,
                    ],
                    '%'  => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'mobile_default'  => [
                    'unit' => 'px',
                    'size' => 100,
                ],
                'tablet_default'  => [
                    'unit' => 'px',
                    'size' => 100,
                ],
                'desktop_default' => [
                    'unit' => 'px',
                    'size' => 100,
                ],
                'selectors'       => [
                    '{{WRAPPER}} .robo-recommendation' => 'height: {{SIZE}}{{UNIT}}; width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'caption_shadow',
            [
                'type'            => Controls::SLIDER,
                'label'           => __( 'Caption shadow', 'robo' ),
                'devices'         => ['mobile', 'tablet', 'desktop'],
                'size_units'      => ['px', '%'],
                'range'           => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                    '%'  => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'mobile_default'  => [
                    'unit' => 'px',
                    'size' => 4,
                ],
                'tablet_default'  => [
                    'unit' => 'px',
                    'size' => 4,
                ],
                'desktop_default' => [
                    'unit' => 'px',
                    'size' => 4,
                ],
                'selectors'       => [
                    '{{WRAPPER}} .caption-img' => 'box-shadow: 0 0 {{SIZE}}{{UNIT}} 1px #ccc',
                ],
            ]
        );

        $this->add_responsive_control(
            'border_radius',
            [
                'type'            => Controls::SLIDER,
                'label'           => __( 'Border radius', 'robo' ),
                'devices'         => ['mobile', 'tablet', 'desktop'],
                'size_units'      => ['px', '%', 'em', 'rem'],
                'range'           => [
                    'px'  => [
                        'min' => 0,
                        'max' => 200,
                    ],
                    '%'   => [
                        'min' => 0,
                        'max' => 100,
                    ],
                    'em'  => [
                        'min' => 0,
                        'max' => 10,
                    ],
                    'rem' => [
                        'min' => 0,
                        'max' => 10,
                    ],
                ],
                'mobile_default'  => [
                    'unit' => '%',
                    'size' => 50,
                ],
                'tablet_default'  => [
                    'unit' => '%',
                    'size' => 50,
                ],
                'desktop_default' => [
                    'unit' => '%',
                    'size' => 50,
                ],
                'selectors'       => [
                    '{{WRAPPER}} .caption-img' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'border_width',
            [
                'type'            => Controls::SLIDER,
                'label'           => __( 'Border width', 'robo' ),
                'devices'         => ['mobile', 'tablet', 'desktop'],
                'size_units'      => ['px', '%', 'em', 'rem'],
                'range'           => [
                    'px'  => [
                        'min' => 0,
                        'max' => 200,
                    ],
                    '%'   => [
                        'min' => 0,
                        'max' => 100,
                    ],
                    'em'  => [
                        'min' => 0,
                        'max' => 10,
                    ],
                    'rem' => [
                        'min' => 0,
                        'max' => 10,
                    ],
                ],
                'mobile_default'  => [
                    'unit' => 'px',
                    'size' => 5,
                ],
                'tablet_default'  => [
                    'unit' => 'px',
                    'size' => 5,
                ],
                'desktop_default' => [
                    'unit' => 'px',
                    'size' => 5,
                ],
                'selectors'       => [
                    '{{WRAPPER}} .caption-img' => 'border-width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'border_color',
            [
                'type'      => Controls::COLOR,
                'label'     => __( 'Border color', 'robo' ),
                'default'   => 'white',
                'selectors' => [
                    '{{WRAPPER}} .caption-img' => 'border-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'recommender',
            [
                'type'    => Controls::TEXT,
                'label'   => __( 'Heading', 'robo' ),
                'default' => 'Recommender',
            ]
        );
        $this->add_control(
            'recommender_url',
            [
                'type'    => Controls::URL,
                'label'   => __( 'Recommender url', 'robo' ),
                'default' => [
                    'url'         => '#',
                    'is_external' => true,
                ],
            ]
        );

        $this->add_control(
            'recommendation',
            [
                'type'    => Controls::TEXTAREA,
                'label'   => __( 'Recommendation', 'robo' ),
                'default' => __( 'I\'m recommending this widget from Rafalo tech.' ),
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {

        $s = $this->get_settings_for_display();

        $this->add_render_attribute(
            'caption_image',
            [
                'src'   => $s['caption_image']['url'],
                'class' => 'caption-img',
            ]
        );
        $this->add_render_attribute(
            'recommender_url',
            [
                'href'   => $s['recommender_url']['url'],
                'target' => $s['recommender_url']['is_external'] == 'on' ? '_blank' : '_self',
            ]
        );

        $img_attr = $this->get_render_attribute_string( 'caption_image' );
        $url_attr = $this->get_render_attribute_string( 'recommender_url' );

        echo "<div class='robo-recommendation'>
        <img {$img_attr} />
        <div class='recommendation'>
            <h3>{$s['recommender']}</h3>
            <a {$url_attr} >{$s['recommender_url']['url']}</a>
            <p>{$s['recommendation']}</p>
        </div>
        </div>";
    }
}
