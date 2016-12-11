<?php
/**
 * Implementation of the Custom Header feature
 * http://codex.wordpress.org/Custom_Headers
 *
 *
 * @package Save Me the Waltz
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses savemethewaltz_header_style()
 * @uses savemethewaltz_admin_header_style()
 * @uses savemethewaltz_admin_header_image()
 */
function savemethewaltz_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'savemethewaltz_custom_header_args', array(
		'default-image'          => '',
		'default-text-color'     => '#FCFBF9',
		'width'                  => 1400,
		'height'                 => 400,
		'flex-height'            => true,
		'wp-head-callback'       => 'savemethewaltz_header_style',
		'admin-head-callback'    => 'savemethewaltz_admin_header_style',
		'admin-preview-callback' => 'savemethewaltz_admin_header_image',
	) ) );
}
add_action( 'after_setup_theme', 'savemethewaltz_custom_header_setup' );

if ( ! function_exists( 'savemethewaltz_header_style' ) ) :
	/**
	 * Styles the header image and text displayed on the blog
	 *
	 * @see savemethewaltz_custom_header_setup().
	 */
	function savemethewaltz_header_style() {
		$header_text_color = get_header_textcolor();

		// If no custom options for text are set, let's bail
		// get_header_textcolor() options: HEADER_TEXTCOLOR is default, hide text (returns 'blank') or any hex value.
		if ( HEADER_TEXTCOLOR === $header_text_color ) {
			return;
		}

		// If we get this far, we have custom styles. Let's do this.
		?>
		<style type="text/css">
		<?php
		// Has the text been hidden?
		if ( 'blank' === $header_text_color ) :
		?>
			#masthead .site-branding .site-title a,
			#masthead .site-branding .site-description  {
				position: absolute;
				clip: rect(1px, 1px, 1px, 1px);
			}
		<?php
			// If the user has set a custom color for the text use that.
			else :
		?>
			#masthead .site-branding .site-title a,
			#masthead .site-branding .site-description {
				color: #<?php echo esc_attr( $header_text_color ); ?>;
			}
		<?php endif; ?>
		</style>
		<?php
	}
endif; // savemethewaltz_header_style

if ( ! function_exists( 'savemethewaltz_admin_header_image' ) ) :
	/**
	 * Custom header image markup displayed on the Appearance > Header admin panel.
	 *
	 * @see savemethewaltz_custom_header_setup().
	 */
	function savemethewaltz_admin_header_image() {
	?>
		<div id="headimg">
			<h1 class="displaying-header-text">
				<a id="name" style="<?php echo esc_attr( 'color: #' . get_header_textcolor() ); ?>" onclick="return false;" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
			</h1>
			<div class="displaying-header-text" id="desc" style="<?php echo esc_attr( 'color: #' . get_header_textcolor() ); ?>"><?php bloginfo( 'description' ); ?></div>
			<?php if ( get_header_image() ) : ?>
			<img src="<?php header_image(); ?>" alt="">
			<?php endif; ?>
		</div>
	<?php
	}
endif; // savemethewaltz_admin_header_image
