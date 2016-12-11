<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Save Me the Waltz
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo" style="background-image: url('<?php header_image(); ?>')">

		<?php get_sidebar( 'footer' ); ?>

		<?php
		if ( has_nav_menu( 'secondary' ) ) :
			wp_nav_menu( array( 'theme_location' => 'secondary', 'depth' => 1, 'container_class' => 'secondary-links', ) );
		endif;
		?>

		<div class="site-info">
			<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'save-me-the-waltz' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'save-me-the-waltz' ), 'WordPress' ); ?></a>
			<span class="sep"> &middot; </span>
			<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'save-me-the-waltz' ), 'save-me-the-waltz', '<a href="http://wordpress.com/themes" rel="designer">WordPress.com</a>' ); ?>
    </div><!-- .site-info -->

	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
