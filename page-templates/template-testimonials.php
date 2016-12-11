<?php
/**
 * Template Name: Testimonials
 *
 * @package Save Me the Waltz
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

	<?php while ( have_posts() ) : the_post(); ?>

		<?php get_template_part( 'components/content', 'page' ); ?>

		<?php // List all testimonials in order
		$testimonials = new WP_Query( array(
			'post_type'      => 'jetpack-testimonial',
			'order'          => 'ASC',
			'orderby'        => 'order',
			'posts_per_page' => 24,
			'no_found_rows'  => true,
		) );
		?>

		<?php if ( $testimonials->have_posts() ) : ?>
			<div class="savemethewaltz-testimonials savemethewaltz-grid-two">
			<?php
			while ( $testimonials->have_posts() ) : $testimonials->the_post();
				get_template_part( 'components/content', 'testimonial' );
			endwhile;
			wp_reset_postdata();
			?>
			</div><!-- .savemethewaltz-testimonials -->
		<?php endif; ?>

		<?php
		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;
		?>

	<?php endwhile; // End of the loop. ?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
