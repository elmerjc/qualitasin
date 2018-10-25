<?php
/**
 * Pixel8es Header 1
 *
 * Header 1 Template
 *
 * @author 		Theme Innwit
 * @version     1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

echo '<div class="container-wrap">';
	echo '<div class="pix-menu-align-center">';
		get_template_part ( 'templates/headers/header', 'stack' );
	echo '</div>';
echo '</div>';