<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Save Me the Waltz
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<div class="entry-meta">
			<?php edit_post_link( esc_html__( 'Edit', 'save-me-the-waltz' ), '<span class="edit-link">', '</span>' ); ?>
		</div>
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'save-me-the-waltz' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
