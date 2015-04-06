<?php
/**
 * The Template for displaying the footer.
 *
 * @package     WordPress
 * @subpackage  Simple_Masonry_Theme
 * @since       2015-03-29
 * @version     2015-03-29
 * @author      Frank Bültge <frank@bueltge.de>
 */
?>

</main> <?php // end main-element in header.php ?>

<?php
/**
 * The main page footer can contain items such as copyright and contact information.
 * It can also contain a duplicated navigation of your site which is not usually
 * contained within a <nav>
 * ARIA: the landmark role "contentinfo" is added here as it contains metadata
 * that applies to the parent document
 */
?>
<footer id="colophon" class="site-footer" role="contentinfo">
	<p><?php printf( esc_attr__( '&copy; Copyright %d, Frank Bültge', 'simple-simple-masonry' ), date( 'Y' ) ); ?></p>
</footer>

</div> <?php // end #wrap in header.php ?>

<?php wp_footer(); ?>
</body>
</html>
