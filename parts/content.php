<?php
/**
 * The default content template file
 *
 * @package    WordPress
 * @subpackage Simple_Masonry_Theme
 * @since      2015-03-29
 * @version    2015-03-29
 * @author     Frank Bültge <frank@bueltge.de>
 */

// define a array for random sizes
$sizes_keys = array( 'simple-masonry-thumb', 'simple-masonry-twice', 'simple-masonry-triple' );
$size       = 'simple-masonry-twice';//$sizes_keys[ array_rand( $sizes_keys, 1 ) ];
// Get attached image to post
$attached_image = \SimpleMasonry\Media\get_first_attached_image( get_the_ID() );

// get path to media file
$src = wp_get_attachment_image_src( $attached_image, $size );
// No image src, return
if ( ! isset( $src[ 0 ] ) ) {
	return NULL;
}

// get sizes string include values
$sizes = \SimpleMasonry\Media\get_srcset_string( $attached_image, $size );

/**
 * The <article> element can be used to enclose content
 * that still makes sense on its own and is therefore "reusable"
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php
	/**
	 * A <header> element is required
	 * here is the heading contains often a <h1> element in Loop
	 */
	?>
	<header>
		<?php the_title( sprintf( '<h1><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
	</header>

	<div class="entry-content" style="width: <?php echo (int) $src[ 1 ]; ?>px; height: <?php echo (int) $src[ 2 ]; ?>px">
		<?php
		$string       = '<img alt="' . get_the_title() . '" title="' . get_the_title() . '" src="' . esc_url(
				$src[ 0 ]
			) . '" width="' . (int) $src[ 1 ] . '" height="' . $src[ 2 ] . '"' . $sizes . '/>';
		$allowed_html = array(
			'img' => array(
				'alt'    => array(),
				'title'  => array(),
				'src'    => array(),
				'width'  => array(),
				'height' => array(),
				'srcset' => array(),
			),
		);
		echo wp_kses( $string, $allowed_html );
		?>
	</div> <?php // end .entry-content ?>

	<footer class="entry-meta">
		<span class="cat-links"><?php _e( 'Posted in', 'wp_basis' ); ?> <?php the_category( ', ' ); ?></span>
		<?php the_tags(
			'<span class="sep"> &middot; </span> <span class="tag-links"><span class="entry-utility-prep entry-utility-prep-tag-links">' . __(
				'Tagged', 'wp_basis'
			) . '</span> ', ', ', '</span>'
		); ?>
	</footer> <?php // end .entry-meta ?>

</article>
