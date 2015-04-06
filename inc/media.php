<?php
/**
 * Get functions for return different content for usage of responsive image
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
namespace SimpleMasonry\Media;

/**
 * Get first attached image of a post
 *
 * @param null $post_is ID of a post
 *
 * @return int|null ID of the media
 */
function get_first_attached_image( $post_is = NULL ) {

	if ( ! isset( $post_is ) ) {
		$post_is = get_the_ID();
	}

	// get all images from post
	$attached_images = (array) get_attached_media( 'image', $post_is );
	// reset, remove array value, work only with object
	$attached_image = reset( $attached_images );

	if ( ! isset( $attached_image->ID ) ) {
		return NULL;
	}

	return $attached_image->ID;
}

/**
 * Create a 'srcset' attribute.
 *
 * @param int    $attachment_id Image attachment ID.
 * @param string $size          Optional. Name of image size. Default value: 'thumbnail'.
 *
 * @return string|bool    A full 'srcset' string or false.
 */
function get_srcset_string( $attachment_id, $size = 'thumbnail' ) {

	$srcset_array = get_srcset_array( $attachment_id, $size );
	if ( empty( $srcset_array ) ) {
		return FALSE;
	}

	return ' srcset="' . implode( ', ', $srcset_array ) . '"';
}

/**
 * Get an array of image sources candidates for use in a 'srcset' attribute.
 *
 * @param int    $attachment_id Image attachment ID.
 * @param string $size          Optional. Name of image size. Default value: 'thumbnail'.
 *
 * @return array|bool    An array of of srcset values or false.
 */
function get_srcset_array( $attachment_id, $size = 'thumbnail' ) {

	// See which image is being returned and bail if none is found
	if ( ! $image = wp_get_attachment_image_src( $attachment_id, $size ) ) {
		return FALSE;
	};

	// break image data into url, width, height
	list( , $width, $height ) = $image;

	// image meta
	$image_meta = wp_get_attachment_metadata( $attachment_id );

	// default sizes
	$default_sizes = $image_meta[ 'sizes' ];

	// add full size to the default_sizes array
	$default_sizes[ 'full' ] = array(
		'width'  => $image_meta[ 'width' ],
		'height' => $image_meta[ 'height' ],
		'file'   => $image_meta[ 'file' ],
	);

	// Remove any hard-crops
	foreach ( $default_sizes as $key => $image_size ) {

		// calculate the height we would expect if this is a soft crop given the size width
		$soft_height = (int) round( $image_size[ 'width' ] * $height / $width );

		// If image height varies more than 1px over the expected, throw it out.
		if ( $image_size[ 'height' ] <= $soft_height - 2 || $image_size[ 'height' ] >= $soft_height + 2 ) {
			unset( $default_sizes[ $key ] );
		}
	}

	// No sizes? Checkout early
	if ( ! $default_sizes ) {
		return FALSE;
	}

	$arr = array();
	// Loop through each size we know should exist
	foreach ( $default_sizes as $key => $size ) {

		// Reference the size directly by it's pixel dimension
		$image_src = wp_get_attachment_image_src( $attachment_id, $key );
		$arr[ ]    = $image_src[ 0 ] . ' ' . $size[ 'width' ] . 'w';
	}

	return $arr;
}
