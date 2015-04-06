<?php
/**
 * The page template file.
 *
 * @link        http://codex.wordpress.org/Template_Hierarchy
 *
 * @package     WordPress
 * @subpackage  Simple_Masonry_Theme
 * @since       2015-03-29
 * @version     2015-03-29
 * @author      Frank Bültge <frank@bueltge.de>
 */

get_header();

// Whether current WordPress query has results to loop over
if ( have_posts() ) {
	?>

	<div id="masonry" class="content-area">
		<?php
		/* Starting the Loop */
		while ( have_posts() ) :
			the_post();

			/**
			 * Include the Post-Format-specific template for the content.
			 * If you want to overload this in a child theme then include a file
			 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
			 */
			get_template_part( 'parts/content', 'page' );

		endwhile;
		?>
	</div> <!-- #masonry -->
	<?php
	the_posts_navigation();

	// if the loop has no results
} else {
	/**
	 * Include the template for the loop dosn't find and result
	 * If you will overwrite this in in a child theme the include a file
	 * called no-results-index.php and that will be used instead.
	 */
	get_template_part( 'parts/no-results', 'page' );

} // endif

get_footer();
