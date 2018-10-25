<?php
/**
 * Pixel8es Header 3
 *
 * Header 3 Template
 *
 * @author 		Theme Innwit
 * @version     1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

//Get Main Header
echo '<div class="pix-menu-align-right">';
	get_template_part ( 'templates/headers/header', 'main' );
echo '</div>';
