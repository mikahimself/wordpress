<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package mikahimself-2020
 */

?>

	<div id="post-<?php the_ID(); ?>" <?php post_class("card"); ?>>
		<div class="card-body">
			<?php the_title( '<h1 class="card-title">', '</h1>' ); ?>
		</header><!-- .entry-header -->

		<?php mikahimself_2020_post_thumbnail(); ?>

		<div class="card-text">
			<?php
			the_content();

			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'mikahimself-2020' ),
					'after'  => '</div>',
				)
			);
			?>
		</div><!-- .entry-content -->
		<div class="card-footer text-muted bg-transparent">
			<?php mikahimself_2020_entry_footer(); ?>
		</div><!-- .entry-footer -->
		
		</div>
			</div><!-- #post-<?php the_ID(); ?> -->
