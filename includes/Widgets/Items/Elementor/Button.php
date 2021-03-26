<?php

namespace robo\Widgets\Items\Elementor;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

use Elementor\Controls_Manager as Controls;
use Elementor\Widget_Base as Base;

class Button extends Base {

    public function get_name() {
        return 'robo_button';
    }

    public function get_title() {
        return __( 'Robo button', 'robo' );
    }

    public function get_icon() {
        return 'eicon-button';
    }

    public function get_categories() {
        return ['robo'];
    }

    /**
     * Registers controls for
     *
     * @return void
     */
    protected function _register_controls() {

        $this->start_controls_section(
            'settings_section',
            [
                'label' => __( 'Settings', 'robo' ),
                'tab'   => Controls::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'caption',
            [
                'label'       => __( 'Caption', 'robo' ),
                'type'        => Controls::TEXT,
                'default'     => __( 'robo button', 'robo' ),
                'input_type'  => 'text',
                'placeholder' => __( 'Caption of the button', 'robo' ),
            ]
        );

        $this->add_control(
            'url',
            [
                'label'       => __( 'URL to navigate', 'robo' ),
                'type'        => Controls::URL,
                'input_type'  => 'url',
                'Description' => __( 'Address of the URL to navigate on click action', 'robo' ),
                'Placeholder' => __( '{site-url}/about-us', 'robo' ),
                'default'     => [
                    'url'         => '#',
                    'is_external' => false,
                ],
            ]
        );

        $this->add_control(
            'text_color',
            [
                'label'     => __( 'Text color', 'robo' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} a' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'text_hover_color',
            [
                'label'     => __( 'Text hover color', 'robo' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'default'   => '#000',
                'selectors' => [
                    '{{WRAPPER}} a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'bg_color',
            [
                'type'      => Controls::COLOR,
                'label'     => __( 'Background color', 'robo' ),
                'default'   => '#0092E3',
                'selectors' => [
                    '{{WRAPPER}} a' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'bg_hover_color',
            [
                'type'      => Controls::COLOR,
                'label'     => __( 'Background hover color', 'robo' ),
                'default'   => '#0092E3',
                'selectors' => [
                    '{{WRAPPER}} a:hover' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'=>'typhograpy',
                'label'=>__('Typography', 'robo'),
                'selector'=>'{{WRAPPER}} a'
            ]
            );

        $this->add_responsive_control(
            'width',
            [
                'label'           => __( 'Width', 'robo' ),
                'type'            => Controls::SLIDER,
                'size_units'      => ['px', 'rem', 'em', '%'],
                'range'           => [
                    'px'  => [
                        'min' => 0,
                        'max' => 300,
                    ],
                    '%'   => [
                        'min' => 0,
                        'max' => 100,
                    ],
                    'em'  => [
                        'min' => 0,
                        'max' => 5,
                    ],
                    'rem' => [
                        'min' => 0,
                        'max' => 5,
                    ],
                ],
                'devices'         => ['desktop', 'tablet', 'mobile'],
                'desktop_default' => [
                    'unit' => 'px',
                    'size' => 300,
                ],
                'tablet_default'  => [
                    'unit' => 'px',
                    'size' => 300,
                ],
                'mobile_default'  => [
                    'unit' => '%',
                    'size' => 100,
                ],
                'selectors'       => [
                    '{{WRAPPER}} a' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'alignment',
            [
                'label'           => __( 'Alignment', 'robo' ),
                'type'            => Controls::CHOOSE,
                'devices'         => ['desktop', 'tablet', 'mobile'],
                'options'         => [
                    'left'   => [
                        'title' => __( 'Left', 'robo' ),
                        'icon'  => 'eicon-h-align-left',
                    ],
                    'center' => [
                        'title' => __( 'Center', 'robo' ),
                        'icon'  => 'eicon-h-align-center',
                    ],
                    'right'  => [
                        'title' => __( 'Right', 'robo' ),
                        'icon'  => 'eicon-h-align-right',
                    ],
                ],
                'desktop_default' => 'left',
                'tablet_default'  => 'left',
                'mobile_default'  => 'center',
                'selectors'       => [
                    '{{WRAPPER}}' => 'text-align: {{VALUE}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'padding',
            [
                'type'               => Controls::DIMENSIONS,
                'label'              => __( 'Padding', 'robo' ),
                'devices'            => ['mobile', 'tablet', 'desktop'],
                'size_units'         => ['px', 'em', 'rem'],
                'selectors'          => [
                    '{{WRAPPER}} a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
                ],
                'mobile_default'     => [
                    'top'      => 12,
                    'right'    => 40,
                    'bottom'   => 12,
                    'left'     => 40,
                    'unit'     => 'px',
                    'isLinked' => false,
                ],
                'tablet_default'     => [
                    'top'      => 12,
                    'right'    => 40,
                    'bottom'   => 12,
                    'left'     => 40,
                    'unit'     => 'px',
                    'isLinked' => false,
                ],
                'desktop_default'    => [
                    'top'      => 12,
                    'right'    => 40,
                    'bottom'   => 12,
                    'left'     => 40,
                    'unit'     => 'px',
                    'isLinked' => false,
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
                    'unit' => 'px',
                    'size' => 25,
                ],
                'tablet_default'  => [
                    'unit' => 'px',
                    'size' => 25,
                ],
                'desktop_default' => [
                    'unit' => 'px',
                    'size' => 25,
                ],
                'selectors'       => [
                    '{{WRAPPER}} a' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    /**
     * Renders the element to the frontend
     *
     * @return void
     */
    protected function render() {
        $s = $this->get_settings_for_display();
        $c = __( $s['caption'], 'robo' );

        $this->add_inline_editing_attributes( 'caption', 'basic' );

        $this->add_render_attribute(
            'caption',
            [
                'class'  => 'robo-widgets robo-button',
                'target' => $s['url']['is_external'] == 'on' ? '_blank' : '_self',
            ]
        );
        $attr = $this->get_render_attribute_string( 'caption' );

        echo "<a href='{$s['url']['url']}' {$attr}>{$c}</a>";
    }

    protected function _content_template() {

    }

    public function get_style_depends() {
        return ['robo-widgets-script'];
    }
}