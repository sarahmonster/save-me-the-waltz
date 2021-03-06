<?php
/**
 * Template part for displaying pages on front page.
 *
 * @package Save Me the Waltz
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'savemethewaltz-panel savemethewaltz-panel'. esc_attr( $savemethewaltz_panel ) ); ?> data-panel-title="Panel <?php echo esc_attr( $savemethewaltz_panel ); ?>" >
	<div class="savemethewaltz-panel-content">
		<header class="entry-header">
			<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>

			<?php if ( 'post' === get_post_type() ) : ?>
			<div class="entry-meta">
				<?php savemethewaltz_posted_on(); ?>
			</div><!-- .entry-meta -->
			<?php endif; ?>

		</header><!-- .entry-header -->

		<footer class="entry-footer">
			<?php savemethewaltz_edit_link( get_the_ID() ); ?>
		</footer><!-- .entry-footer -->

		<div class="entry-content">
			<?php
				/* translators: %s: Name of current post */
				the_content( sprintf(
					wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'save-me-the-waltz' ), array( 'span' => array( 'class' => array() ) ) ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				) );
			?>

			<?php
			// Show recent blog posts for blog panel (Note that get_option returns a string, so we're casting the result as an int)
			if ( get_the_ID() === (int) get_option( 'page_for_posts' )  ) : ?>

				<?php // Show four most recent posts
				$recent_posts = new WP_Query( array(
					'posts_per_page' => 3,
					'post_status'    => 'publish',
				) );
				?>

		 		<?php if ( $recent_posts->have_posts() ) : ?>

					<div class="savemethewaltz-recent-posts savemethewaltz-grid-three">

						<?php
						// Since WordPress seem to be ignoring our posts_per_page above, let's just brute-force the limit
						// Note: it's also ignoring the user settings for posts_per_page and defaulting to 7. Maybe an issue
						// with Infinite Scroll? At any rate, I don't feel so bad about being brutish when it's also being a jerk.
						$count = 0;
						while ( $count < 3 AND $recent_posts->have_posts() ) : $recent_posts->the_post();
							get_template_part( 'components/content', 'excerpt' );
							$count++;
						endwhile;
						wp_reset_postdata();
						?>
					</div><!-- .savemethewaltz-recent-posts -->
				<?php endif; ?>
			<?php endif; ?>

			<?php // Show sub-pages of grid template page
			if ( 'page-templates/template-grid.php' === get_page_template_slug() ) :
				get_template_part( 'components/content', 'grid' );
			endif;

			// Show testimonials
			if ( 'page-templates/template-testimonials.php' === get_page_template_slug() ) :
				// Show two random testimonials
				$testimonials = savemethewaltz_get_random_posts( 2, 'jetpack-testimonial' );
				?>

				<?php if ( ! empty( $testimonials ) ) : ?>
					<div class="savemethewaltz-testimonials savemethewaltz-grid-two">
						<?php
						foreach ( $testimonials as $testimonial ) :

							setup_postdata( $GLOBALS['post'] =& $testimonial );

							get_template_part( 'components/content', 'testimonial' );

						endforeach;
						wp_reset_postdata();
						?>
					</div><!-- .savemethewaltz-testimonials -->
				<?php endif; ?>
			<?php endif; ?>


			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'save-me-the-waltz' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->

	</div><!-- .savemethewaltz-panel-content -->

</article><!-- #post-## -->
