<?php
/**
 * The Header for our Simple Masonry theme
 *
 * @package    WordPress
 * @subpackage Simple_Masonry_Theme
 * @since      2015-03-29
 * @version    2015-03-29
 * @author     Frank Bültge <frank@bueltge.de>
 */
?><!DOCTYPE html>
<!--[if lt IE 7 ]>
<html <?php language_attributes(); ?> class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>
<html <?php language_attributes(); ?> class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>
<html <?php language_attributes(); ?> class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]>
<html <?php language_attributes(); ?> class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

<head>

	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php
/**
 * If you want to use an element as a wrapper,
 * i.e. for styling only, then <div> is still the element to use
 */
?>
<div id="wrap" class="hfeed">

	<?php
	/*
	 * The page header typically contains items such as your site heading,
	 * logo and possibly the main site navigation
	 * ARIA: the landmark role "banner" is set as it is the prime heading or internal title of the page
	 */
	?>
	<header id="banner" role="banner">
		<div class="site-branding">
			<h1>
				<span><a href="<?php echo esc_attr( home_url( '/' ) ); ?>" title="<?php echo esc_attr(
						get_bloginfo(
							'name', 'display'
						)
					); ?>" rel="home"><?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?></a></span>
			</h1>

			<h2><?php bloginfo( 'description' ); ?></h2>
		</div>
		<!-- .site-branding -->


		<nav id="site-navigation" class="main-navigation" role="navigation">
			<h1><?php esc_attr_e( 'Page Navigation', 'simple-simple-masonry' ); ?></h1>
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
		</nav>
		<!-- #site-navigation -->
	</header>

	<?php
	/**
	 * The <main> element is used to enclose the main content,
	 * i.e. that which contains the central topic of a document
	 * ARIA: the landmark role "main" is added here as it contains the main content
	 * of the document, and it is recommended to add it to the
	 * <main> element until user agents implement the required role mapping.
	 */
	?>
	<main role="main">
