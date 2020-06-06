<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package mikahimself-2020
 */

get_header();
?>

	
    <main id="primary" class="container site-main">
      <div class="row">
        <div class="col-md-8">
		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );

			the_post_navigation(
				array(
					'prev_text' => '<span class="btn mh2020-nav-btn align-text-top mh2020-single-post-nav-link"><i class="fas align-middle fa-angle-left fa-2x margin-r8"></i> ' . ' %title</span>',
					'next_text' => '<span class="btn mh2020-nav-btn">%title <i class="fas align-middle fa-angle-right fa-2x margin-l8"></i></span>',
				)
			);

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>
		</div>
		<div class="col-md-4">
		    <?php
                get_sidebar();
                ?>
		</div>
		
    </main>
	<!-- #main -->

<?php

get_footer();
