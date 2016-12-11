<?php
/**
 * Template part for displaying posts.
 *
 * @package Save Me the Waltz
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
	// Set the post thumbnail as the background of the panel
	if ( has_post_thumbnail() ) :
		$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'savemethewaltz-hero' ); ?>
		<div class="savemethewaltz-panel-background" style="background-image:url(<?php echo esc_url( $thumbnail[0] ); ?>)"></div>
	<?php endif; ?>

	<?php //echo get_post_format(); ?>
	<div class="savemethewaltz-panel-content">
		<?php

		$show_title = array( 'image', 'gallery', 'audio', 'video', 'aside', 'status', 'link', 'quote' );
		if ( in_array( get_post_format(), $show_title ) ) :
		endif;
		?>
		<header class="entry-header">
			<?php the_title( '<h2 class="entry-title"><a href="'. esc_url( get_the_permalink() ) .'">', '</a></h2>' ); ?>
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php
			// For certain post types, we're going to display the excerpt
			if ( ! get_post_format() || 'chat' === get_post_format() ) :
				the_excerpt();
			else : // Otherwise, it makes more sense to show the full content
				the_content();
			endif;
			?>

			<div class="entry-meta">
				<?php savemethewaltz_posted_on(); ?>
			</div><!-- .entry-meta -->

			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'save-me-the-waltz' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->

		<footer class="entry-footer">
			<?php savemethewaltz_edit_link( get_the_ID() ); ?>
		</footer><!-- .entry-footer -->
	</div><!-- .savemethewaltz-panel-content -->
</article><!-- #post-## -->
