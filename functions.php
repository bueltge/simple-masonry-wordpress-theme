<?php # -*- coding: utf-8 -*-
/**
 * Simple Masonry Theme functions and definitions
 *
 * Sets up the theme and provides some helper functions.
 * This file load all files from directory /inc to include all helpers.
 *
 * When using a child theme
 *
 * @link       http://codex.wordpress.org/Theme_Development
 * @link       http://codex.wordpress.org/Child_Themes
 *             you can override certain functions
 *             (those wrapped in a function_exists() call) by defining them first in your child theme's
 *             functions.php file. The child theme's functions.php file is included before the parent
 *             theme's file, so the child theme functions would be used.
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are instead attached
 * to a filter or action hook.
 *
 * For more information on hooks, actions, and filters, see
 * @link       http://codex.wordpress.org/Plugin_API.
 *
 * Php Version 5.3
 *
 * @package    WordPress
 * @subpackage Simple_Masonry_Theme
 * @since      2015-03-29
 * @version    2015-04-11
 * @author     Frank Bültge <frank@bueltge.de>
 * @license    http://opensource.org/licenses/gpl-license.php GNU Public License
 */

namespace SimpleMasonry;

// @see http://php.net/manual/de/class.recursivedirectoryiterator.php
$directory = new \RecursiveDirectoryIterator( __DIR__ . '/inc', \RecursiveDirectoryIterator::SKIP_DOTS );
/**
 * LEAVES_ONLY (default): Only list files, no directories.
 * SELF_FIRST (above): List directory and then the files in there.
 * CHILD_FIRST (w/o example): List files in subdirectory first, then the directory.
 */
$files = new \RecursiveIteratorIterator( $directory, \RecursiveIteratorIterator::LEAVES_ONLY );

$pathlist = array();
foreach ( $files as $file ) {

	$pathlist[ ] = $file->getRealPath();
}
// Filter hook to change the loading of all files inside the directory
$pathlist = \apply_filters( 'masonry_loader', $pathlist );
// Load the files
foreach ( $pathlist as $file ) {
	require_once $file;
}
