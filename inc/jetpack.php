<?php
/**
 * Jetpack Compatibility File
 * See: https://jetpack.me/
 *
 * @package Save Me the Waltz
 */

function savemethewaltz_jetpack_setup() {
	// Add theme support for Infinite Scroll.
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'wrapper'   => false,
		'render'    => 'savemethewaltz_infinite_scroll_render',
		'footer'    => 'tertiary',
	) );

	// Add theme support for Responsive Videos.
	add_theme_support( 'jetpack-responsive-videos' );

	// Add theme support for Site Logo.
	add_image_size( 'savemethewaltz-logo', 2000, 200 );
	add_theme_support( 'site-logo', array( 'size' => 'savemethewaltz-logo' ) );

	// Add theme support for Testimonial CPT.
	add_theme_support( 'jetpack-testimonial' );

	// Add theme support for Content Options.
	add_theme_support( 'jetpack-content-options', array(
		'blog-display' => array(
			'content',
			'excerpt',
		),
		'author-bio'   => false,
		'post-details' => array(
			'stylesheet' => 'savemethewaltz-style',
			'date'       => '.posted-on',
			'categories' => '.cat-links',
			'tags'       => '.tags-links',
		),
	) );
} // end function savemethewaltz_jetpack_setup
add_action( 'after_setup_theme', 'savemethewaltz_jetpack_setup' );

/**
 * Custom render function for Infinite Scroll.
 */
function savemethewaltz_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'components/content', get_post_format() );
	}
} // end function savemethewaltz_infinite_scroll_render

/**
 * Return early if Site Logo is not available.
 *
 * @since Save Me the Waltz 1.0
 */
function savemethewaltz_the_site_logo() {
	if ( ! function_exists( 'jetpack_the_site_logo' ) ) {
		return;
	} else {
		jetpack_the_site_logo();
	}
}
