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
			the_title( '      <h3 class="card-title">', '</h3> ' );
		else :
			the_title( '      <h4 class="card-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h4>'  . "\n" );
		endif;

		if ( 'post' === get_post_type() ) :
			?>
			  <h6 class="card-title">
				<small class="text-muted">
				  <?php
				mikahimself_2020_posted_on();
				  ?>
			    </small>
			  </h6><!-- .entry-header -->
		<?php endif; ?>
	

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
		  
