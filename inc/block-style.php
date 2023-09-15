<?php
/**
 * Block Styles
 *
 * @link https://developer.wordpress.org/reference/functions/register_block_style/
 *
 * @package WordPress
 * @subpackage Vayu X
 * @since Vayu X 1.0
 */

if ( function_exists( 'register_block_style' ) ) {
	/**
	 * Register block styles.
	 *
	 * @since Vayu X 1.0
	 *
	 * @return void
	 */
	function vayu_x_register_block_styles() {
		

		// Image: Borders.
		register_block_style(
			'core/image',
			array(
				'name'  => 'vayu-border',
				'label' => esc_html__( 'Borders', 'vayu-x' ),
			)
		);

		
	}
	add_action( 'init', 'vayu_x_register_block_styles' );
}