<?php
/**
 * Composer Footer Layouts
 *
 * Footer Layout 6
 *
 * @author 		Theme Innwit
 * @version     1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

// Layout 6
echo '<div class="col-md-6">';
	if( is_active_sidebar( 'footer-first-column' ) ) {
		dynamic_sidebar( 'footer-first-column' );
	}	
echo '</div>';

echo '<div class="col-md-6">';
	if( is_active_sidebar( 'footer-second-column' ) ) {
		dynamic_sidebar( 'footer-second-column' );
	}	
echo '</div>';

echo '<div class="col-md-12">';
	if( is_active_sidebar( 'footer-third-column' ) ) {
		dynamic_sidebar( 'footer-third-column' );
	}	
echo '</div>';
