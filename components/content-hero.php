<?php
/**
 * The template used for displaying hero content in page.php and page-templates.
 *
 * @package Save Me the Waltz
 */
?>

<article id="savemethewaltz-hero" <?php post_class( 'savemethewaltz-panel' ); ?>>
	<?php if ( has_post_thumbnail() ) :
		$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'savemethewaltz-hero' ); ?>
		<div class="savemethewaltz-panel-background" style="background-image:url(<?php echo esc_url( $thumbnail[0] ); ?>)"></div>
	<?php endif; ?>

	<div class="savemethewaltz-panel-content">

		<div class="entry-content">

		<?php
		/* translators: %s: Name of current post */
		the_content( sprintf(
			wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'save-me-the-waltz' ), array( 'span' => array( 'class' => array() ) ) ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		) );
		?>
		</div><!-- .entry-content -->

	</div><!-- .savemethewaltz-panel-content -->

	<footer class="entry-footer">
		<?php savemethewaltz_edit_link( get_the_ID() ); ?>
	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
