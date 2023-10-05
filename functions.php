<?php
/**
 * Vayu X functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Vayu X
 * @since Vayu X 1.0
 */


if ( ! function_exists( 'vayu_x_support' ) ) :

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * @since Vayu X 1.0
	 *
	 * @return void
	 */
	function vayu_x_support() {
		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		// Add support for block styles.
		add_theme_support( 'wp-block-styles' );

		add_theme_support( 'align-wide' );

		// Enqueue editor styles.
		add_editor_style( 'style.css' );

		add_theme_support( 'responsive-embeds' );
		

		// Add support for experimental link color control.
		add_theme_support( 'experimental-link-color' );

		//define
		define( 'VAYU_X_VERSION', '1.0.0' );
	    define( 'VAYU_X_DEBUG', defined( 'WP_DEBUG' ) && WP_DEBUG === true );
	    define( 'VAYU_X_DIR', trailingslashit( get_template_directory() ) );
	    define( 'VAYU_X_URL', trailingslashit( get_template_directory_uri() ) );

	}

endif;

add_action( 'after_setup_theme', 'vayu_x_support' );

if ( ! function_exists( 'vayu_x_styles' ) ) :

	/**
	 * Enqueue styles.
	 *
	 * @since Vayu X 1.0
	 *
	 * @return void
	 */
	function vayu_x_styles() {

		// Register theme stylesheet.
		wp_register_style(
			'vayu-style',
			get_template_directory_uri() . '/style.css',
			array(),
			wp_get_theme()->get( 'Version' )
		);

		// Enqueue theme stylesheet.
		wp_enqueue_style( 'vayu-style' );
		

	}

endif;

add_action( 'wp_enqueue_scripts', 'vayu_x_styles' );


// testing

// Add block patterns
require get_template_directory() . '/inc/block-pattern.php';

// Add block Style
require get_template_directory() . '/inc/block-style.php';

function vayu_x_custom_menu(){
		     register_nav_menus(array(
			'vayu-x-main-menu'        => esc_html__( 'Main', 'vayu-x' )
		) );
	  }
add_action( 'after_setup_theme', 'vayu_x_custom_menu' );


// this is commented line
// require get_template_directory() . '/inc/admin_menu/index.php';








function vayu_x_enqueue_editor_scripts(){

	$asset_file = require_once VAYU_X_DIR .'build/registerEditorSettings.asset.php';


	// wp_enqueue_script(
	// 	'vayu-editor-settings',
	// 	VAYU_X_URL . 'build/registerEditorSettings.js',
	// 	array_merge(
	// 		$asset_file['dependencies']
	// 	),
	// 	'1.0.0',
	// 	true
	// );

	wp_enqueue_style('vayu-x-editor-style', VAYU_X_URL . 'block-editor.css', array(), '');
   

}

add_action( 'enqueue_block_editor_assets','vayu_x_enqueue_editor_scripts' );