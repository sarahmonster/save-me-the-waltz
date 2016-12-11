<?php
/**
 * Template part for displaying content of grid page templates.
 *
 * @package Save Me the Waltz
 */
?>

<?php
$savemethewaltz_child_pages = new WP_Query( array(
	'post_type'      => 'page',
	'orderby'        => 'menu_order',
	'order'          => 'ASC',
	'post_parent'    => $post->ID,
	'posts_per_page' => 12,
	'no_found_rows'  => true,
) );
?>

<?php if ( $savemethewaltz_child_pages->have_posts() ) : ?>

<div class="savemethewaltz-grid-three">

	<?php while ( $savemethewaltz_child_pages->have_posts() ) : $savemethewaltz_child_pages->the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<?php
			if ( has_post_thumbnail() ) :
				the_post_thumbnail( 'savemethewaltz-square' );
			endif;
			?>

			<?php the_title( '<h3>' , '</h3>' ); ?>

			<?php the_content(); ?>
		</article>

	<?php endwhile; ?>

</div><!-- .child-pages .grid -->

<?php
endif;
wp_reset_postdata();
?>
