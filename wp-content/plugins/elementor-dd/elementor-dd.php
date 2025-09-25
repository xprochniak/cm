<?php
/**
 * Plugin Name: Elementor DD
 * Description: N/A
 * Version: 1.10
 * Author: J. Próchniak
 * Text Domain: elementor-dd
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_action( 'plugins_loaded', function() {

	add_action( 'elementor/widgets/register', function( $manager ) {
		require_once( __DIR__ . '/library/dd-image.php' );
		$manager->register( new \Elementor_DD_Image() );
	} );

	add_action( 'elementor/widgets/register', function( $manager ) {
		require_once( __DIR__ . '/library/dd-template.php' );
		$manager->register( new \Elementor_DD_Template() );
	} );

	add_action( 'elementor/widgets/register', function( $manager ) {
		require_once( __DIR__ . '/library/dd-breadcrumb.php' );
		$manager->register( new \Elementor_DD_Breadcrumb() );
	} );

} );
