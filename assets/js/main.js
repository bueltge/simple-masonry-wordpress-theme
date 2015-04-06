/**
 * Created by frank on 29.03.15.
 */

jQuery( document ).ready( function( $ ) {

	$( '#masonry' ).infinitescroll( {
		loading     : {
			finished   : undefined,
			finishedMsg: "<em>Congratulations, you've reached the end of the internet.</em>",
			img        : null,
			msg        : null,
			msgText    : "<em>Loading the next set of images...</em>",
			selector   : null,
			speed      : 'fast',
			start      : undefined
		},
		navSelector : ".nav-previous",
		nextSelector: ".nav-previous a:first",
		itemSelector: "article",
		debug       : false
	}, function( newElements, data, url ) {
	} );
} );

// Picture element HTML shim|v it for old IE (pairs with Picturefill.js)
document.createElement( 'picture' );
