/* global wp, jQuery */
/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {
	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );

	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title, .site-description' ).css( {
					clip: 'rect(1px, 1px, 1px, 1px)',
					position: 'absolute',
				} );
			} else {
				$( '.site-title, .site-description' ).css( {
					clip: 'auto',
					position: 'relative',
				} );
				$( '.site-title a, .site-description' ).css( {
					color: to,
				} );
			}
		} );
	} );

	// Contact page
	wp.customize( 'law_address', function ( value ) {
		value.bind( function ( to ) {
			$( 'i.fa-map-marker-alt + a' ).text( to )
		} )
	} );

	wp.customize( 'law_phone', function ( value ) {
		value.bind( function ( to ) {
			el = $( 'i.fa-phone + a' )
			el.text( '+' + to )
			el.attr( 'href', 'tel://' + to )
		} )
	} );

	wp.customize( 'law_email', function ( value ) {
		value.bind( function ( to ) {
			el = $( 'i.fa-envelope + a' )
			el.text( to )
			el.attr( 'href', 'mailto://' + to )
		} )
	} );

	wp.customize( 'law_site', function ( value ) {
		value.bind( function ( to ) {
			el = $( 'i.fa-globe-americas + a' )
			el.text( to )
			el.attr( 'href', 'https://' + to )
		} )
	} );

}( jQuery ) );
