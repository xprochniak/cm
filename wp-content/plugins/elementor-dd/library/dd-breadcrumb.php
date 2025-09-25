<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

use Elementor\Widget_Base;

class Elementor_DD_Breadcrumb extends Widget_Base {

    public function get_name() {
        return 'dd_breadcrumb';
    }

    public function get_title() {
        return __( 'DD Breadcrumb', 'elementor-dd' );
    }

    public function get_icon() {
        return 'eicon-code';
    }

    public function get_categories() {
        return [ 'general' ];
    }

    protected function _register_controls() {
        $this->start_controls_section(
            'content',
            [
                'label' => __( 'Content', 'elementor-dd' )
            ]
        );

        $this->add_control(
            'mode',
            [
                'label' => __( 'Mode', 'elementor-dd' ),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __( 'Left', 'elementor-dd' ),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => __( 'Center', 'elementor-dd' ),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => __( 'Right', 'elementor-dd' ),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'left',
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}}' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'code',
            [
                'label' => __( 'Code', 'elementor-dd' ),
                'type' => \Elementor\Controls_Manager::CODE,
                'language' => 'css',
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        if ( ! empty( $settings['code'] ) ) {
            echo '<style>' . $settings['code'] . '</style>';
        }

        $home_url  = home_url('/');
        $site_name = get_bloginfo('name');

        echo '<nav aria-label="DD Breadcrumb">';
            echo '<ul class="dd-breadcrumb">';

            if ( is_front_page() ) {
                echo '<li class="dd-breadcrumb-i" aria-current="page">' . esc_html($site_name) . '</li>';
            } else {
                echo '<li class="dd-breadcrumb-i"><a class="dd-breadcrumb-h" href="' . esc_url($home_url) . '">' . esc_html($site_name) . '</a></li>';

                $parent = function($page_id) use (&$parent) {
                    $page = get_post($page_id);

                    if ( $page && $page->post_parent ) {
                        $parent($page->post_parent);

                        echo '<li class="dd-breadcrumb-i"><a class="dd-breadcrumb-h" href="' . esc_url(get_permalink($page->post_parent)) . '">' . esc_html(get_the_title($page->post_parent)) . '</a></li>';
                    }
                };

                $parent(get_the_ID());

                echo '<li class="dd-breadcrumb-i" aria-current="page">' . esc_html(get_the_title()) . '</li>';
            }

            echo '</ul>';
        echo '</nav>';
    }
}
