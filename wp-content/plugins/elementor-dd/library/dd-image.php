<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Elementor_DD_Image extends \Elementor\Widget_Base {

	public function get_name() {
		return 'dd_image';
	}

	public function get_title() {
		return 'DD Image';
	}

	public function get_icon() {
		return 'eicon-code';
	}

	public function get_categories() {
		return [ 'basic' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'content',
			[
				'label' => __( 'Content', 'elementor-dd' ),
			]
		);

		$this->add_control(
			'picture_80',
			[
				'label' => __( 'Picture (min. 80rem)', 'elementor-dd' ),
				'type' => \Elementor\Controls_Manager::MEDIA
			]
		);

		$this->add_control(
			'picture_32',
			[
				'label' => __( 'Picture (min. 32rem)', 'elementor-dd' ),
				'type' => \Elementor\Controls_Manager::MEDIA
			]
		);

		$this->add_control(
			'picture_0',
			[
				'label' => __( 'Picture (min. 0rem)', 'elementor-dd' ),
				'type' => \Elementor\Controls_Manager::MEDIA
			]
		);

		$this->add_control(
			'alternative',
			[
				'label' => __( 'Alternative', 'elementor-dd' ),
				'type' => \Elementor\Controls_Manager::TEXT
			]
		);

		$this->add_control(
			'priority',
			[
				'label' => __( 'Priority', 'elementor-dd' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'low',
				'options' => [
					'high' => __( 'High', 'elementor-dd' ),
					'low'  => __( 'Low', 'elementor-dd' ),
				],
			]
		);

		$this->add_control(
			'lazy',
			[
				'label' => __( 'Lazy', 'elementor-dd' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'none',
				'options' => [
					'lazy' => __( 'Lazy', 'elementor-dd' ),
					'eager' => __( 'Eager', 'elementor-dd' ),
					'auto' => __( 'Auto', 'elementor-dd' ),
					'none' => __( 'None', 'elementor-dd' ),
				],
			]
		);

		$this->add_control(
           	'width',
           	[
          		'label' => __( 'Width', 'elementor-dd' ),
          		'type' => \Elementor\Controls_Manager::NUMBER
           	]
        );

        $this->add_control(
           	'height',
           	[
          		'label' => __( 'Height', 'elementor-dd' ),
          		'type' => \Elementor\Controls_Manager::NUMBER
           	]
        );

		$this->end_controls_section();
	}

	protected function render() {
		$content = $this->get_settings_for_display();
		?>

		<picture>
			<?php if ( ! empty( $content['picture_0']['url'] ) ) : ?>
				<source media="(max-width: 512px)" srcset="<?php echo esc_url( $content['picture_0']['url'] ); ?>">
			<?php endif; ?>

			<?php if ( ! empty( $content['picture_32']['url'] ) ) : ?>
				<source media="(max-width: 1280px)" srcset="<?php echo esc_url( $content['picture_32']['url'] ); ?>">
			<?php endif; ?>

			<?php if ( ! empty( $content['picture_80']['url'] ) ) : ?>
			    <img
                   	class="dd-image"
                   	<?php if ( ! empty( $content['priority'] ) ) : ?>
                  		fetchpriority="<?php echo esc_attr( $content['priority'] ); ?>"
                   	<?php endif; ?>
                   	<?php if ( ! empty( $content['lazy'] ) && $content['lazy'] !== 'none' ) : ?>
                  		loading="<?php echo esc_attr( $content['lazy'] ); ?>"
                   	<?php endif; ?>
                   	<?php if ( ! empty( $content['width'] ) ) : ?>
                  		width="<?php echo esc_attr( $content['width'] ); ?>"
                   	<?php endif; ?>
                   	<?php if ( ! empty( $content['height'] ) ) : ?>
                  		height="<?php echo esc_attr( $content['height'] ); ?>"
                   	<?php endif; ?>
                   	src="<?php echo esc_url( $content['picture_80']['url'] ); ?>"
                   	alt="<?php echo esc_attr( $content['alternative'] ); ?>"
                >
			<?php endif; ?>
		</picture>

		<?php
	}
}
