<?php

/**
 * Pixel8es Header
 *
 * Functions for the Theme Header.
 *
 * @author 		Theme Innwit
 * @version     1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * Funtions Required For Header
 *
 * @return required meta tags and link tags for favicon, Apple Touch Icon etc
 */

if ( ! function_exists( 'composer_head' ) ) {

	function composer_head() { 
		global $smof_data;

		$mobile_responsive = isset( $smof_data['mobile_responsive'] ) ? $smof_data['mobile_responsive'] : 'on';

		$composer_theme_pri_color = isset( $smof_data['pri_color'] ) ? $smof_data['pri_color'] : '';

		if ( 'on' === $mobile_responsive ) : ?>

			<meta name="HandheldFriendly" content="True">
			<meta name="MobileOptimized" content="320">
			<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, minimum-scale=1.0"/>

		<?php
		endif;

		// Apple Touch Icon
		if ( isset( $smof_data['apple_touch_icon'] ) && !empty( $smof_data['apple_touch_icon'] ) ) : ?>
			<link rel="apple-touch-icon" href="<?php echo esc_url($smof_data['apple_touch_icon']); ?>">		
		<?php
		endif;

		/* FavIcon */
		if ( ! ( function_exists( 'has_site_icon' ) && has_site_icon() ) ) {
			if ( isset( $smof_data['fav_icon'] ) && ! empty( $smof_data['fav_icon'] ) ) {
				echo '<link rel="shortcut icon" href="'.esc_url($smof_data['fav_icon']).'">';
			}
		}

		/* Window Tile Icon */
		if ( isset( $smof_data['win_tile_icon'] ) && ! empty( $smof_data['win_tile_icon'] ) ) : ?>
			<meta name="msapplication-TileColor" content="<?php echo esc_attr( $composer_theme_pri_color ); ?>">
			<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/_images/win8-tile-icon.png">
		<?php 
		endif;

		// For Android L header
		if ( ! empty( $composer_theme_pri_color ) ) : ?>
		<meta name="theme-color" content="<?php echo esc_attr( $composer_theme_pri_color ); ?>">
		<?php
		endif;
		
	}

}

/*------------[ Wp Head ]-------------*/
if ( ! function_exists( 'composer_wphead' ) ){

	function composer_wphead() {
		global $smof_data;

		// Custom CSS from ThemeOptions
		if( isset( $smof_data['custom_css'] ) && ! empty( $smof_data['custom_css'] ) ){
			echo '<style>'. $smof_data['custom_css'] . '</style>';
		}

		// Custom CSS from ThemeOptions
		if( isset( $smof_data['custom_js'] ) && ! empty( $smof_data['custom_js'] ) ){
			echo '<script>'. $smof_data['custom_js'] . '</script>';
		}

	}

	add_action('wp_head', 'composer_wphead');

}


/* =============================================================================
Page Headers
========================================================================== */
//Social Icons
function composer_social_icons() {
	global $smof_data;
	$facebook  = composer_get_option_value( 'top_facebook', '' );
	$twitter   = composer_get_option_value( 'top_twitter', '' );
	$gplus     = composer_get_option_value( 'top_gplus', '' );
	$linkedIn  = composer_get_option_value( 'top_linkedin', '' );
	$dribble   = composer_get_option_value( 'top_dribble', '' );
	$flickr    = composer_get_option_value( 'top_flickr', '' );
	$pinterest = composer_get_option_value( 'top_pinterest', '' );
	$tumblr    = composer_get_option_value( 'top_tumblr', '' );
	$rss       = composer_get_option_value( 'top_rss', '' );
	$instagram = composer_get_option_value( 'top_instagram', '' );

	$social_icons = '';

	if( !empty( $facebook ) || !empty( $twitter ) || !empty( $gplus ) || !empty( $linkedIn ) || !empty( $dribble ) || !empty( $flickr ) || !empty( $pinterest ) || !empty( $tumblr ) || !empty( $rss ) || !empty( $instagram ) ) {

		$social_icons .= '<div class="header-elem"><p class="social-icons">';

		if( !empty($facebook)) {
			$social_icons .= '<a href="'. esc_url( $facebook ) .'" target="_blank" title="Facebook" class="facebook"><i class="pixicon-facebook"></i></a>';
		}

		if( !empty($twitter)) {
			$social_icons .= '<a href="'. esc_url( $twitter ) .'" target="_blank" title="Twitter" class="twitter"><i class="pixicon-twitter"></i></a>';
		}

		if( !empty($gplus)) {
			$social_icons .= '<a href="'. esc_url( $gplus ) .'" target="_blank" title="Gplus" class="google-plus"><i class="pixicon-gplus"></i></a>';
		}

		if( !empty($linkedIn)) {
			$social_icons .= '<a href="'. esc_url( $linkedIn ) .'" target="_blank" title="linkedin" class="linkedin"><i class="pixicon-linked-in"></i></a>';
		}

		if( !empty($instagram) ) {
			$social_icons .= '<a href="'. esc_url( $instagram ) .'" target="_blank" title="Instagram" class="instagram"><i class="pixicon-instagram"></i></a>';
		}

		if( !empty($dribble)) {
			$social_icons .= '<a href="'. esc_url( $dribble ) .'" target="_blank" title="Dribble" class="dribbble"><i class="pixicon-dribbble"></i></a>';
		}

		if( !empty($flickr)) {
			$social_icons .= '<a href="'. esc_url( $flickr ) .'" target="_blank" title="Flickr" class="flickr"><i class="pixicon-flickr"></i></a>';
		}

		if( !empty($pinterest)) {
			$social_icons .= '<a href="'. esc_url( $pinterest ) .'" target="_blank" title="Pinterest" class="pinterest"><i class="pixicon-pinterest"></i></a>';
		}

		if( !empty($tumblr )) {
			$social_icons .= '<a href="'. esc_url( $tumblr ) .'" target="_blank" title="Tumblr" class="tumblr"><i class="pixicon-tumblr"></i></a>';
		}

		if( !empty($rss )) {
			$social_icons .= '<a href="'. esc_url( $rss ) .'" target="_blank" title="RSS" class="rss"><i class="pixicon-rss"></i></a>';
		}

		$social_icons .= '</p></div>';
	}

	return $social_icons;
}

// Header Info
function composer_header_contact_info_tel() {
	global $smof_data;
	$top_tel = isset($smof_data['top_tel']) ? $smof_data['top_tel'] : '';
	$header_info = '';	

	if( !empty($top_tel)) { 
		$header_info .= '<div class="header-elem"><p class="top-details clearfix">';
			$header_info .= '<span><a href="tel:'. esc_attr( $top_tel ) .'" class="top-header-email-text"><i class="pix-icon pixicon-call-end"></i><span class="top-header-tel-text">'. esc_html( $top_tel ) .'</span></a></span>';
		$header_info .= '</p></div>';
	}	

	return $header_info;
}

// Header Info
function composer_header_contact_info_email() {
	global $smof_data;
	$top_email = isset($smof_data['top_email']) ? $smof_data['top_email'] : '';
	$header_info = '';

	if( !empty($top_email)) {
		$header_info .= '<div class="header-elem"><p class="top-details clearfix">';
			$header_info .= '<span><a href="mailto:'. sanitize_email( $top_email ) .'" class="top-header-email-text"><i class="pix-icon pixicon-envelope-open"></i> <span class="top-header-email-text">'. esc_html( $top_email ) .'</a></span></span>';
		$header_info .= '</p></div>';
	}

	return $header_info;
}

// Header Search
function composer_header_search() {
	global $smof_data;
	$search_text = isset( $smof_data['search_text'] ) ? $smof_data['search_text'] : esc_html__( 'Search', 'composer' );

	$form = '<div class="search-btn"><i class="pix-icon pixicon-elegant-search"></i><form method="get" class="topSearchForm" action="' . esc_url( home_url( '/' ) ) . '" ><input type="text" value="' . esc_attr( get_search_query() ) . '" name="s" class="textfield" placeholder="'.esc_attr( $search_text ).'" autocomplete="off"></form></div>';

	return $form;
}


/*------------[ Header Elements ]-------------*/
function composer_display_header_elements( $elems, $header_pos = 'default-header-lang', $page_side = '' ){

	global $smof_data;

	if( $elems == 'tel' ){

		echo composer_header_contact_info_tel();	

	} elseif( $elems == 'email' ){

		echo composer_header_contact_info_email();

	} elseif( $elems == 'lang' ){

		if(class_exists('SitePress')){
			echo '<div class="header-elem">';
				echo '<div class="'. esc_attr( $header_pos ) . ' '. esc_attr( $page_side ) .'">';
				composer_languages_list(); 
				echo '</div>';
			echo '</div>';
		}	

	} elseif( $elems == 'cart' ){
		if ( class_exists( 'WooCommerce' ) ) {
			composer_woo_cart();
		}	

	} elseif( $elems == 'sicons' ){

		echo composer_social_icons();

	} elseif( $elems == 'top_menu' ){

		echo '<div class="header-elem">';
			composer_top_nav();	
		echo '</div>';

	} elseif( $elems == 'shortcode' ){

		echo '<div class="header-elem">';
			echo do_shortcode( $smof_data['shortcode_text'] );
		echo '</div>';

	} elseif( $elems == 'footer_menu' ){

		echo '<div class="header-elem">';
			composer_footer_nav();	
		echo '</div>';

	} elseif( $elems == 'search' ){

		echo '<div class="header-elem">';
			get_search_form();			
		echo '</div>';

	} elseif( $elems == 'text' ){
		if( !empty( $smof_data['top_text'] ) ){
			echo '<div class="header-elem">';
				echo '<p class="custom-header-text">'. $smof_data['top_text'] .'</p>';	
			echo '</div>';
		}		

	} elseif( $elems == 'search_icon' ){

		echo '<div class="header-elem">';
			echo composer_header_search();
		echo '</div>';
	} elseif( $elems == 'copyright_text' ){

		echo '<div class="header-elem">';

			$footer_copyright_t = composer_get_option_value( 'f_copyright_t', '&copy;'. date('Y') . ' [blog-link],' . esc_html__('All Rights Reserved.', 'composer' ) );

			echo '<p class="copyright-text">' . do_shortcode( $footer_copyright_t )  . '</p>'; // it escaped properly above

		echo '</div>';
	}
}

/*------------[ Preloader ]-------------*/
if ( ! function_exists( 'composer_preloader' ) ){

	function composer_preloader(){

		global $smof_data;
		$pix_preloader = isset($smof_data['pix_preloader']) ? $smof_data['pix_preloader'] : 'no';
		$pix_preloader_style = isset($smof_data['pix_preloader_style']) ? $smof_data['pix_preloader_style'] : 'style-1';

		if(  ! isset( $_GET['vc_editable'] ) && ( 'yes' == $pix_preloader ) ) {


		echo '<div id="preloader-con">';
			if( $pix_preloader_style == 'style-1' ) {
				echo '<div class="preloader preloader-1"></div>';
			}elseif ( $pix_preloader_style == 'style-2' ) {
				echo '<svg class="amz-spinner" width="65px" height="65px" viewBox="0 0 66 66" xmlns="http://www.w3.org/2000/svg">
				<circle class="path" fill="none" stroke-width="2" stroke-linecap="round" cx="33" cy="33" r="30"></circle>
				</svg>';
			}elseif ( $pix_preloader_style == 'style-3' ) {
  				echo '<div class="preloader3"></div>';
			}elseif ( $pix_preloader_style == 'style-4' ) {
  				echo '<div class="preloader4"></div>';
			}elseif ( $pix_preloader_style == 'style-5' ) {
  				echo '<div class="preloader6"></div>';
			}elseif ( $pix_preloader_style == 'style-6' ) {
  				echo '<div class="preloader10"> <span></span><span></span></div>';
			}elseif ( $pix_preloader_style == 'style-7' ) {
  				echo '<div class="preloader9"><span></span></div>';
			}elseif ( $pix_preloader_style == 'style-8' ) {
  				echo '<div class="preloader8"> <span></span><span></span></div>';
			}
		echo '</div>';

		}
	}

}

/*------------[ Logo ]-------------*/
if ( ! function_exists( 'composer_get_logo' ) ){

	function composer_get_logo(){

		$id = get_the_ID();

		$custom_logo = composer_get_option_value( 'custom_logo', get_bloginfo( 'name' ), true );

		$custom_logo_light = composer_get_option_value( 'custom_logo_light', get_bloginfo( 'name' ), true );

		$custom_logo2x = composer_get_option_value( 'retina_logo', '', true );

		$custom_logo_light2x = composer_get_option_value( 'retina_logo_light', '', true );

		$custom_mobile_logo = composer_get_option_value( 'custom_mobile_logo', '', true );

		if ( $custom_mobile_logo != '' ) {
			$mobile_logo_class = ' class="mobile-logo-yes"';
		} else {
			$mobile_logo_class = '';
		}
		
		$custom_sticky_logo = composer_get_option_value( 'custom_sticky_logo', '', true );

		if ( $custom_sticky_logo != '' ) {
			$sticky_logo_class = ' class="sticky-logo-yes"';
		} else {
			$sticky_logo_class = '';
		}

		//Demo Purpose
		$logo = composer_get_meta_value( $id, '_amz_demo_logo' ); // id, meta_key, meta_default, themeoption_key, themeoption_default
		$logo = !empty( $logo ) ? json_decode( $logo ) : '';

		$custom_logo = ( !empty( $logo ) ) ? composer_get_image_by_id( 'full', 'full', $logo[0]->itemId, 1, 0, 1 ) : $custom_logo;

		$light_logo = composer_get_meta_value( $id, '_amz_demo_light_logo' ); // id, meta_key, meta_default, themeoption_key, themeoption_default
		$light_logo = !empty( $light_logo ) ? json_decode( $light_logo ) : '';

		$custom_logo_light = ( !empty( $light_logo ) ) ? composer_get_image_by_id( 'full', 'full', $light_logo[0]->itemId, 1, 0, 1 ) : $custom_logo_light;

		$output = '<div id="logo"'. $sticky_logo_class .'>';
			$output .= '<a href="'. esc_url( home_url( '/' ) ) .'"'. $mobile_logo_class .' rel="nofollow">';
 				
				if ( $custom_logo != get_bloginfo( 'name' ) || $custom_logo_light != get_bloginfo( 'name' ) ) {
					if ( $custom_logo != get_bloginfo( 'name' ) ) { 
						$custom_logo2x = ( $custom_logo2x ) ? ' data-rjs="'. esc_attr( $custom_logo2x ) .'"' : '';
						$output .= '<img src="'. esc_url( $custom_logo ) .'"'. $custom_logo2x .' alt="" class="dark-logo">';
					} 
					if ( $custom_logo_light != get_bloginfo( 'name' ) ) { 
						$custom_logo_light2x = ( $custom_logo_light2x ) ? ' data-rjs="'. esc_attr( $custom_logo_light2x ) .'"' : '';
						$output .= '<img src="'. esc_url( $custom_logo_light ) .'"'. $custom_logo_light2x .' alt="" class="light-logo">';
					}
					if ( $custom_sticky_logo != '' ) { 
						$output .= '<img src="'. esc_url( $custom_sticky_logo ) .'" alt="" class="sticky-logo">';
					}
					if ( $custom_mobile_logo != '' ) { 
						$output .= '<img src="'. esc_url( $custom_mobile_logo ) .'" alt="" class="mobile-res-logo">';
					}
				} else {
					$output .= $custom_logo;
				}

			$output .= '</a>';
		$output .= '</div>';

		return $output;
	}

}
