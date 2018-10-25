/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {
	'use strict';

	/* Composer Options */

	// Sticky Header Background Color
	wp.customize( 'header_sticky_color', function( value ) {
		value.bind( function( to ) {
			if( 'dark' == to ) {
				$( '.header-con' ).removeClass( 'sticky-light' ).addClass( 'sticky-dark' );
			} else {
				$( '.header-con' ).removeClass( 'sticky-dark' ).addClass( 'sticky-light' );
			}
		} );
	} );

	// Main Menu Style
	wp.customize( 'main_menu', function( value ) {
		value.bind( function( to ) {
			if( 'dark' == to ) {
				$( '.header-con, .mobile-menu-nav' ).removeClass( 'menu-light' ).addClass( 'menu-dark' );				
			} else {
				$( '.header-con, .mobile-menu-nav' ).removeClass( 'menu-dark' ).addClass( 'menu-light' );
			}
		} );
	} );

	// Sub Menu Background
	wp.customize( 'sub_menu', function( value ) {
		value.bind( function( to ) {
			if( 'dark' == to ) {
				$( '.header-wrap, .main-side-left' ).removeClass( 'sub-menu-light' ).addClass( 'sub-menu-dark' );
			} else {
				$( '.header-wrap, .main-side-left' ).removeClass( 'sub-menu-dark' ).addClass( 'sub-menu-light' );
			}
		} );
	} );

	// Header Background Style
	wp.customize( 'header_background_style', function( value ) {
		value.bind( function( to ) {
			if( 'dark' == to ) {
				$( '.header-wrap' ).removeClass( 'light' ).addClass( 'dark' );
				$( '.header-con' ).removeClass( 'light-con' ).addClass( 'dark-con' );
			} else {
				$( '.header-wrap' ).removeClass( 'dark' ).addClass( 'light' );
				$( '.header-con' ).removeClass( 'dark-con' ).addClass( 'light-con' );
			}
		} );
	} );

	// Header Line
	wp.customize( 'header_line', function( value ) {
		value.bind( function( to ) {
			if( 'yes' == to ) {
				$( '.header-wrap' ).removeClass( 'header-line-no' );
			} else {
				$( '.header-wrap' ).addClass( 'header-line-no' );
			}
		} );
	} );

	// Left and Right Header Menu Alignment
	wp.customize( 'lr_menu_align', function( value ) {
		value.bind( function( to ) {
			if( 'top' == to ) {
				$( '.main-side-left' ).addClass( 'top-nav-align' );
			} else {
				$( '.main-side-left' ).removeClass( 'top-nav-align' );
			}
		} );
	} );

	// Left and Right Header Text Alignment
	wp.customize( 'lr_text_align', function( value ) {
		value.bind( function( to ) {
			if( 'center' == to ) {
				$( '.main-side-left' ).addClass( 'menu-on-center' );
			} else {
				$( '.main-side-left' ).removeClass( 'menu-on-center' );
			}
		} );
	} );

	// Left and Right Header Text Alignment
	wp.customize( 'lr_nav_line', function( value ) {
		value.bind( function( to ) {
			if( 'no' == to ) {
				$( '.main-side-left' ).addClass( 'no-line-menu' );
			} else {
				$( '.main-side-left' ).removeClass( 'no-line-menu' );
			}
		} );
	} );


	// Top Header Background Color
	wp.customize( 'top_section_style', function( value ) {
		value.bind( function( to ) {
			if( 'dark' == to ) {
				$( '.pageTopCon' ).addClass( 'top-sec-dark' );
			} else {
				$( '.pageTopCon' ).removeClass( 'top-sec-dark' );
			}
		} );
	} );

	// Mobile Top Header
	wp.customize( 'top_header_mobile', function( value ) {
		value.bind( function( to ) {
			if( 'hide' == to ) {
				$( '.pageTopCon' ).addClass( 'top-header-mobile-hide' );
			} else {
				$( '.pageTopCon' ).removeClass( 'top-header-mobile-hide' );
			}

		} );
	} );

	wp.customize( 'top_email', function( value ) {
		value.bind( function( to ) {
			$( '.top-header-email-text' ).attr( 'href', 'mailto:' + to ).find('.top-header-email-text').text( to );
			
		} );
	} );


	// Header Background change class
	wp.customize( 'header_background_style', function( value ) {
		value.bind( function( to ) {
			if( 'dark' == to ) {
				$( '.header-wrap' ).addClass( 'dark' );
			} else {
				$( '.header-wrap' ).removeClass( 'dark' );
			}
		} );
	} );

	// Transparent Header Opacity
	wp.customize( 'transparent_header_opacity', function( value ) {
		value.bind( function( to ) {
			$( '.transparent-header' ).removeClass('opacity-0 opacity-10 opacity-20 opacity-30 opacity-40 opacity-50 opacity-60 opacity-70 opacity-80 opacity-90').addClass( 'opacity-' + to );
		} );
	} );


	// Sticky Header change class
	wp.customize( 'header_sticky', function( value ) {
		value.bind( function( to ) {
			if( 'scroll_up' == to ) {
				$( '.header-con' ).addClass( 'pix-sticky-header pix-sticky-header-scroll-up' );
			} else if( 'enable' == to ) {
				$( '.header-con' ).removeClass( 'pix-sticky-header-scroll-up' ).addClass( 'pix-sticky-header' );
			} else {
				$( '.header-con' ).removeClass( 'pix-sticky-header pix-sticky-header-scroll-up' );
			}
		} );
	} );


	/* Wordpress Default */
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
	/*wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {

				$( '.site-title a, .site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-title a, .site-description' ).css( {
					'clip': 'auto',
					'position': 'relative'
				} );
				$( '.site-title a, .site-description' ).css( {
					'color': to
				} );
			}
		} );
	} );*/
} )( jQuery );