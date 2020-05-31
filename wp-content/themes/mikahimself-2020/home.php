<?php
/**
 * The home template file
 *
 * @package mikahimself-2020
 */

get_header();
?>

	<main id="primary" class="container site-main">
      <div class="row">
        <div class="col-md-8">
                
                <?php
                if ( have_posts() ) :
                  if ( is_home() && ! is_front_page() ) :
                ?>
                        <header>
                            <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
                        </header>
                  <?php
                  endif;

                  /* Start the Loop */
                  while ( have_posts() ) :
                      the_post();

                        

                        /*
                        * Include the Post-Type-specific template for the content.
                        * If you want to override this in a child theme, then include a file
                        * called content-___.php (where ___ is the Post Type name) and that will be used instead.
                        */
                        get_template_part( 'template-parts/content', get_post_type() );

                    endwhile;

                    the_posts_navigation();

                else :

                    get_template_part( 'template-parts/content', 'none' );

                endif;
                


                
                ?>
        </div><!-- Posts column -->
            
        <div class="col-md-4">
            <?php
              get_sidebar();
            ?>
        </div><!-- Sidebar -->
     
      </div>
	</main><!-- #main -->

<?php

get_footer();
