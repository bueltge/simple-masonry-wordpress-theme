<?php
/**
 * Setup and initialization of theme functions and definitions
 *
 * @package    WordPress
 * @subpackage Simple_Masonry_Theme
 * @since      2015-03-29
 * @version    2015-03-29
 * @author     Frank Bültge <frank@bueltge.de>
 */

/**
 * Set namespace to encapsulating items
 *
 * @link       http://www.php.net/manual/en/language.namespaces.rationale.php
 *
 * @since      2015-03-29
 * @version    2015-03-29
 * @author     Frank Bültge <frank@bueltge.de>
 */
namespace SimpleMasonry\Setup;

/**
 * Set the content width in pixels based on the theme's design and stylesheet.
 * Also the width of oEmbed objects to scale specific size
 *
 * @since    2015-03-29
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640;
} /* pixels */

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * @since      2015-03-29
 * @version    2015-03-29
 * @author     Frank Bültge <frank@bueltge.de>
 */
\add_action( 'init', '\SimpleMasonry\Setup\setup' );
function setup() {

	// Add 200px. the value from Masonry.js style
	\add_image_size( 'simple-masonry-thumb', 190, 190, TRUE );
	\add_image_size( 'simple-masonry-twice', 390, 390, TRUE );
	\add_image_size( 'simple-masonry-triple', 590, 390, TRUE );

	/**
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 * Usable since WordPress Version 4.1
	 */
	\add_theme_support( 'title-tag' );

	// This theme uses wp_nav_menu() in one location.
	\register_nav_menus(
		array(
			'primary' => __( 'Primary Menu', 'simple-simple-masonry' ),
		)
	);

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	\add_theme_support( 'automatic-feed-links' );
}

\add_action( 'wp_enqueue_scripts', '\SimpleMasonry\Setup\styles' );
function styles() {

	// set suffix for debug mode
	$suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

	wp_register_style(
		'normalize', get_stylesheet_directory_uri() . '/assets/css/normalize' . $suffix . '.css', array(), '2015-03-29'
	);
	// load stylesheet inside the css folder
	wp_register_style(
		'simple-simple-masonry-style', get_stylesheet_directory_uri() . '/assets/css/style' . $suffix . '.css',
		array( 'normalize' ),
		'2015-03-29'
	);
	wp_enqueue_style( 'simple-simple-masonry-style' );

	wp_enqueue_style( 'average', '//fonts.googleapis.com/css?family=Average', array(), '2015-03-29' );
}

\add_action( 'wp_enqueue_scripts', '\SimpleMasonry\Setup\scripts' );
function scripts() {

	// set suffix for debug mode
	$suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

	wp_register_script(
		'infinite-scroll',
		get_stylesheet_directory_uri() . '/assets/js/jquery.infinitescroll.min.js',
		array( 'jquery' ),
		'2015-03-29',
		TRUE
	);

	wp_register_script(
		'picturefill',
		get_stylesheet_directory_uri() . '/assets/js/picturefill.min.js',
		array(),
		'2015-03-29',
		TRUE
	);

	wp_register_script(
		'simple-masonry-theme',
		get_stylesheet_directory_uri() . '/assets/js/main' . $suffix . '.js',
		array( 'jquery', 'infinite-scroll', 'picturefill' ),
		'2015-03-30',
		TRUE
	);

	//if ( is_home() ) {
	wp_enqueue_script( 'simple-masonry-theme' );
	//}
}
