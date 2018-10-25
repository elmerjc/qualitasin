<?php
/**
 * Composer Footer Layouts
 *
 * Footer Layout 8
 *
 * @author 		Theme Innwit
 * @version     1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

// Layout 8
echo '<div class="col-md-8">';
	if( is_active_sidebar( 'footer-first-column' ) ) {
		dynamic_sidebar( 'footer-first-column' );
	}	
echo '</div>';

echo '<div class="col-md-4">';
	if( is_active_sidebar( 'footer-second-column' ) ) {
		dynamic_sidebar( 'footer-second-column' );
	}	
echo '</div>';
