<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package mikahimself-2020
 */

?>

<div id="post-<?php the_ID(); ?>" <?php post_class("card"); ?>>
	<div class="card-body">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="card-title">', '</h1>' );
		else :
			#the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			the_title( '<h4 class="card-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
		endif;

		if ( 'post' === get_post_type() ) :
			?>
			<h6 class="card-title">
				<small class="text-muted">
				<?php
				mikahimself_2020_posted_on();
				/*mikahimself_2020_posted_by();*/
				?>
				</small>
			</h6><!-- .entry-meta -->
		<?php endif; ?>
	<!-- .entry-header -->

	<?php mikahimself_2020_post_thumbnail(); ?>
	<div class="card-text">
	
		<?php
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'mikahimself-2020' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			)
		);

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'mikahimself-2020' ),
				'after'  => '</div>',
			)
		);
		?>
		</div>
	</div><!-- .entry-content -->

	<div class="card-footer text-muted bg-transparent">
		<?php mikahimself_2020_entry_footer(); ?>
	</div><!-- .entry-footer -->
</div><!-- #post-<?php the_ID(); ?> -->
