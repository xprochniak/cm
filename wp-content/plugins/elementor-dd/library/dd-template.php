<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Elementor_DD_Template extends \Elementor\Widget_Base {

	public function get_name() {
		return 'dd_template';
	}

	public function get_title() {
		return __( 'DD Template', 'elementor-dd' );
	}

	public function get_icon() {
		return 'eicon-code';
	}

	public function get_categories() {
		return [ 'basic' ];
	}

	protected function _register_controls() {
		$this->start_controls_section(
			'content',
			[
				'label' => __( 'Content', 'elementor-dd' ),
			]
		);

		$this->add_control(
			'identifier',
			[
				'label'       => __( 'Identifier', 'elementor-dd' ),
				'type'        => \Elementor\Controls_Manager::SELECT2,
				'options'     => $this->get_template_options(),
				'label_block' => true,
			]
		);

		$this->end_controls_section();
	}

	private function get_template_options() {
		$templates = [];

		$args = [
			'post_type'      => 'elementor_library',
			'post_status'    => 'publish',
			'posts_per_page' => -1,
			'fields'         => 'ids',
			'orderby'        => 'title',
			'order'          => 'ASC',
		];

		$query = new WP_Query( $args );

		if ( $query->have_posts() ) {
			foreach ( $query->posts as $post_id ) {
				$template_title = get_the_title( $post_id );
				if ( ! empty( $template_title ) && $template_title !== 'Default' && $template_title !== 'Zestaw domyślny' ) {
					$templates[ $post_id ] = $template_title;
				}
			}
		} else {
			$templates = [ 'no_templates' => __( 'No templates available', 'elementor-dd' ) ];
		}

		return $templates;
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		$identifier = isset( $settings['identifier'] ) ? $settings['identifier'] : '';

		if ( empty( $identifier ) ) {
			echo __( 'No template selected', 'elementor-dd' );
			return;
		}

		$content = wp_kses_post( get_post_field( 'post_content', $identifier ) );
		$post = get_post( $identifier );

		if ( $post && ! empty( $content ) ) {
			if ( ! current_user_can( 'edit_posts' ) ) {
				echo __( 'You do not have permission to view this template', 'elementor-dd' );
				return;
			}

			echo \Elementor\Plugin::$instance->frontend->get_builder_content_for_display( $post->ID );
		} else {
			echo __( 'No content found for the selected template', 'elementor-dd' );
		}
	}
}
