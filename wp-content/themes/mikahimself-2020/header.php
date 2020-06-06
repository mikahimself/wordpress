<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package mikahimself-2020
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<script src="https://kit.fontawesome.com/2d6ef164a0.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" />
	<link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@300&amp;display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet">

	<!-- Move bootstrap css before theme css. -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<?php wp_head(); ?>
</head>

<body <?php body_class('bg-light'); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'mikahimself-2020' ); ?></a>

	<nav class="navbar navbar-expand-md fixed-top navbar-dark bg-dark">
		<a class="navbar-brand" href="#">Offcanvas navbar</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        	<span class="navbar-toggler-icon"></span>
      	</button>


	  <?php
wp_nav_menu( array(
	'theme_location'	=> 'primary',
	'menu'				=> 'TopMenu',
    'depth'				=> 0, // 1 = with dropdowns, 0 = no dropdowns.
	'container'			=> 'div',
	'container_class'	=> 'collapse navbar-collapse',
	'container_id'		=> 'navbarNav',
	'menu_class'		=> 'navbar-nav mr-auto',
    //'fallback_cb'		=> 'WP_Bootstrap_Navwalker::fallback',
	//'walker'			=> new WP_Bootstrap_Navwalker()
	//'walker'			=> new MH2020_Menuwalker()
) );
?>



        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
	</nav>

	<header id="masthead" class="jumbotron jumbotron-fluid">

	
	  <div class="container">
	  
<?php
  the_custom_logo();
  if ( is_front_page() && is_home() ) :
?>
        <h1 class="display-4 main-heading">
		  <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
		</h1>
<?php
  else :
?>
        <h1 class="display-4 main-heading">
		  <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
  		</h1>
<?php
  endif;
  $mikahimself_2020_description = get_bloginfo( 'description', 'display' );
  if ( $mikahimself_2020_description || is_customize_preview() ) :
?>
        <p class="lead"><?php echo $mikahimself_2020_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
<?php endif; ?>

      </div><!-- .site-branding -->
	  
	</header><!-- #masthead -->
