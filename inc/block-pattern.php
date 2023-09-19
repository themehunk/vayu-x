<?php
/**
 * Vayu: Block Patterns
 *
 * @since Vayu X 1.0
 */

/**
 * Registers block patterns and categories.
 *
 * @since Vayu X 1.0
 *
 * @return void
 */
  function vayu_x_register_block_patterns() {
	$block_pattern_categories = array(
		'featured' => array( 'label' => __( 'Featured', 'vayu-x' ) ),
		'footer'   => array( 'label' => __( 'Footers', 'vayu-x' ) ),
		'header'   => array( 'label' => __( 'Headers', 'vayu-x' ) ),
		'query'    => array( 'label' => __( 'Query', 'vayu-x' ) ),
		'pages'    => array( 'label' => __( 'Pages', 'vayu-x' ) ),
		'vayu-x'   => array( 'label' => __( 'Vayu X', 'vayu-x' ) ),
	);

	/**
	 * Filters the theme block pattern categories.
	 *
	 * @since Vayu X 1.0
	 *
	 * @param array[] $block_pattern_categories {
	 *     An associative array of block pattern categories, keyed by category name.
	 *
	 *     @type array[] $properties {
	 *         An array of block category properties.
	 *
	 *         @type string $label A human-readable label for the pattern category.
	 *     }
	 * }
	 */
	$block_pattern_categories = apply_filters( 'vayu_x_block_pattern_categories', $block_pattern_categories );

	foreach ( $block_pattern_categories as $name => $properties ) {
		if ( ! WP_Block_Pattern_Categories_Registry::get_instance()->is_registered( $name ) ) {
			register_block_pattern_category( $name, $properties );
		}
	}

	$block_patterns = array(
		'header',
		'hero',
		'service',
		'brands',
		'about',
		'pricing',
		'testimonial',
		'ribbon',
		'blog',
		'footer',
		'primary-sidebar',
		'404'
	);

	/**
	 * Filters the theme block patterns.
	 *
	 * @since Vayu X 1.0
	 *
	 * @param array $block_patterns List of block patterns by name.
	 */
	$block_patterns = apply_filters( 'vayu_x_block_patterns', $block_patterns );

	foreach ( $block_patterns as $block_pattern ) {
		$pattern_file = get_theme_file_path( '/patterns/' . $block_pattern . '.php' );

		register_block_pattern(
			'vayu-x/' . $block_pattern,
			require $pattern_file
		);
	}
}
add_action( 'init', 'vayu_x_register_block_patterns', 9 );