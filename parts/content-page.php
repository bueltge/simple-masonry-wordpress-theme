<?php
/**
 * The default page content template file
 *
 * @package    WordPress
 * @subpackage Simple_Masonry_Theme
 * @since      2015-03-29
 * @version    2015-03-29
 * @author     Frank Bültge <frank@bueltge.de>
 */

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
		<h1><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h1>
	</header>

	<div class="entry-content">

		<?php
		the_content(
			the_title( '', '', FALSE ) . ' ' . esc_attr__( 'read more &raquo;', 'simple-simple-masonry' )
		);
		wp_link_pages(
			array(
				'before' => '<nav class="page-link">' . __( '<span>Pages:</span>', 'simple-simple-masonry' ),
				'after'  => '</nav>',
			)
		);
		?>

	</div> <?php // end .entry-content ?>

</article>
