<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Composer
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">

	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php composer_head(); ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php wp_head(); ?>
</head>

<?php

	$composer_prefix = composer_get_prefix();

	if ( $composer_prefix != '' ) {

		if( is_home() || is_archive() || is_search() || is_404() ) {
			$composer_id = get_option('page_for_posts');
		} else {
			global $wp_query; 
			$composer_id = ( 0 == get_the_ID() || NULL == get_the_ID() ) ? $wp_query->post->ID : get_the_ID();
		}

		${'composer_'.$composer_prefix.'boxed_content'} = composer_get_meta_value( $composer_id, '_amz_boxed_content', 'default', 'boxed_content', 'wide' ); // id, meta_key, meta_default, themeoption_key, themeoption_default

		${'composer_'.$composer_prefix.'header_layout'} = composer_get_meta_value( $composer_id, '_amz_header_layout', 'default', 'header_layout', 'header-1' ); // id, meta_key, meta_default, themeoption_key, themeoption_default

		${'composer_'.$composer_prefix.'header_hover_layout'} = composer_get_meta_value( $composer_id, '_amz_header_hover_layout', 'default', 'header_hover_layout', 'none' ); // id, meta_key, meta_default, themeoption_key, themeoption_default

		${'composer_'.$composer_prefix.'header_background_style'} = composer_get_meta_value( $composer_id, '_amz_header_background_style', 'default', 'header_background_style', 'light' ); // id, meta_key, meta_default, themeoption_key, themeoption_default

		${'composer_'.$composer_prefix.'header_line'} = composer_get_meta_value( $composer_id, '_amz_header_line', 'default', 'header_line', 'yes' ); // id, meta_key, meta_default, themeoption_key, themeoption_default

		${'composer_'.$composer_prefix.'transparent_header'} = composer_get_meta_value( $composer_id, '_amz_transparent_header', 'default', 'transparent_header', 'hide' ); // id, meta_key, meta_default, themeoption_key, themeoption_default

		${'composer_'.$composer_prefix.'transparent_header_opacity'} = composer_get_meta_value( $composer_id, '_amz_transparent_header_opacity', '', 'transparent_header_opacity', '0' ); // id, meta_key, meta_default, themeoption_key, themeoption_default

		${'composer_'.$composer_prefix.'top_header'} = composer_get_meta_value( $composer_id, '_amz_top_header', 'default', 'top_header', 'hide' ); // id, meta_key, meta_default, themeoption_key, themeoption_default

		${'composer_'.$composer_prefix.'top_header_position'} = composer_get_meta_value( $composer_id, '_amz_top_header_position', 'default', 'top_header_position', 'top' ); // id, meta_key, meta_default, themeoption_key, themeoption_default

		${'composer_'.$composer_prefix.'title_bar'} = composer_get_meta_value( $composer_id, '_amz_title_bar', 'default', 'title_bar', 'show' ); // id, meta_key, meta_default, themeoption_key, themeoption_default

		${'composer_'.$composer_prefix.'title_bar_style'} = composer_get_meta_value( $composer_id, '_amz_title_bar_style', 'default', 'title_bar_style', 'default' ); // id, meta_key, meta_default, themeoption_key, themeoption_default

		${'composer_'.$composer_prefix.'breadcrumbs'} = composer_get_meta_value( $composer_id, '_amz_breadcrumbs', 'default', 'breadcrumbs', 'show' ); // id, meta_key, meta_default, themeoption_key, themeoption_default

		${'composer_'.$composer_prefix.'title_bar_size'} = composer_get_meta_value( $composer_id, '_amz_title_bar_size', 'default', 'title_bar_size', 'small' ); // id, meta_key, meta_default, themeoption_key, themeoption_default

		${'composer_'.$composer_prefix.'title_bar_overlay'} = composer_get_meta_value( $composer_id, '_amz_title_bar_overlay', 'default', 'title_bar_overlay', 'color' ); // id, meta_key, meta_default, themeoption_key, themeoption_default			

		${'composer_'.$composer_prefix.'title_bar_overlay_color'} = composer_get_meta_value( $composer_id, '_amz_title_bar_overlay_color', 'default', 'title_bar_overlay_color', '' ); // id, meta_key, meta_default, themeoption_key, themeoption_default

		${'composer_'.$composer_prefix.'title_bar_gradient_top_value'} = composer_get_meta_value( $composer_id, '_amz_title_bar_gradient_top_value', 'default', 'title_bar_gradient_top_value', '' ); // id, meta_key, meta_default, themeoption_key, themeoption_default

		${'composer_'.$composer_prefix.'title_bar_gradient_middle_value'} = composer_get_meta_value( $composer_id, '_amz_title_bar_gradient_middle_value', 'default', 'title_bar_gradient_middle_value', '' ); // id, meta_key, meta_default, themeoption_key, themeoption_default

		${'composer_'.$composer_prefix.'title_bar_gradient_bottom_value'} = composer_get_meta_value( $composer_id, '_amz_title_bar_gradient_bottom_value', 'default', 'title_bar_gradient_bottom_value', '' ); // id, meta_key, meta_default, themeoption_key, themeoption_default

		${'composer_'.$composer_prefix.'title_bar_gradient_opacity'} = composer_get_meta_value( $composer_id, '_amz_title_bar_gradient_opacity', 'default', 'title_bar_gradient_opacity', '0.9' ); // id, meta_key, meta_default, themeoption_key, themeoption_default

		${'composer_'.$composer_prefix.'header_hide'} = composer_get_meta_value( $composer_id, '_amz_header_hide', 'default', 'header_hide', 'show' ); // id, meta_key, meta_default, themeoption_key, themeoption_default

		${'composer_'.$composer_prefix.'display_menu'} = composer_get_meta_value( $composer_id, '_amz_display_menu', 'default', 'display_menu', 'show' ); // id, meta_key, meta_default, themeoption_key, themeoption_default

		${'composer_'.$composer_prefix.'_slider_shortcode'} = composer_get_meta_value( $composer_id, '_amz_slider_shortcode', '' );

	}

	//Empty Assignment
	$composer_sub_class = $composer_main_class = $composer_header_class = $composer_header_con_class = $composer_header_line_class = '';

	//Page Title
	${'composer_'.$composer_prefix.'page_title'} = composer_get_page_title();

	/* Pixel8es Ajaxify Full Site */
	$composer_ajaxtransin = composer_get_option_value( 'ajaxtransin', 'fadeInUp' );
	$composer_ajaxtransout = composer_get_option_value( 'ajaxtransout', 'fadeOutDown' );

	/* PreLoader animation */		
	$composer_preloadtrans = composer_get_option_value( 'preloadtrans', 'fadeInUp' );

	if( 'dark' === ${'composer_'.$composer_prefix.'header_background_style'} ){
		$composer_header_class = ' dark ';
		$composer_header_con_class = ' dark-con ';
	}

	if( 'no' === ${'composer_'.$composer_prefix.'header_line'} ){
		$composer_header_line_class = ' header-line-no ';
	}

	
	$composer_header_sticky = composer_get_option_value( 'header_sticky', 'scroll_up' );
	$composer_header_sticky_color = composer_get_option_value( 'header_sticky_color', 'light' );
	$composer_header_sticky_class = ( $composer_header_sticky_color === 'light' ) ? ' sticky-light ' : ' sticky-dark ';

	if( ( 'enable' === $composer_header_sticky || 'scroll_up' === $composer_header_sticky ) && ${'composer_'.$composer_prefix.'header_layout'} != 'left-header' && ${'composer_'.$composer_prefix.'header_layout'} != 'right-header' ){

		if( 'enable' === $composer_header_sticky ) {
			$composer_header_con_class .= ' pix-sticky-header';
		} elseif ( 'scroll_up' === $composer_header_sticky ) {
			$composer_header_con_class .= ' pix-sticky-header pix-sticky-header-scroll-up';
		}

	}		

	$composer_header_sticky_responsive = composer_get_option_value( 'header_sticky_responsive', 'disable' );

	if( 'enable' === $composer_header_sticky_responsive ) {		
		$composer_header_res_class = ' pix-sticky-header-res';
	} else {
		$composer_header_res_class = '';
	}

?>

	<body <?php body_class(); ?>>
		
		<?php 
			/* Preloader */
			composer_preloader();	

			if ( ${'composer_'.$composer_prefix.'boxed_content'} === 'frame' ) {
				echo ' <span class="composer-inner-frame frame-left"></span><span class="composer-inner-frame frame-right"></span><span class="composer-inner-frame frame-top"></span><span class="composer-inner-frame frame-bottom"></span> ';
			}	
			
			// Mobile Navigation ( Menu Style light or dark for some header styles and for mobile navigation )
			$composer_main_menu = composer_get_option_value( 'main_menu', 'dark' );
			if( $composer_main_menu === 'light' ){
				$composer_main_class = ' menu-light ';
			} else{
				$composer_main_class = ' menu-dark ';
			}

			// Sub Menu Class - Dropdown menu light or dark
			$composer_sub_menu = composer_get_option_value( 'sub_menu', 'light' );

			if( 'dark' === $composer_sub_menu ){
				$composer_sub_class = ' sub-menu-dark ';
			}

			// Mobile Menu Enable or Disable Dropdown function
			$composer_mobile_menu_dropdown =  composer_get_option_value( 'mobile_menu_dropdown', 'yes' );
			if( $composer_mobile_menu_dropdown === 'no' ){
				$composer_mobile_menu_dropdown = ' mobile-menu-dropdown-none ';
			} else{
				$composer_mobile_menu_dropdown = '';
			}

			if( ! has_nav_menu( 'mobile-nav' )){
		?>

		<div class="mobile-menu-nav <?php echo esc_attr( $composer_main_class . $composer_mobile_menu_dropdown ); ?>"><div class="mobile-menu-inner"></div></div>
		<?php } else { ?>
			<div class="mobile-menu-nav <?php echo esc_attr( $composer_main_class . $composer_mobile_menu_dropdown ); ?>"><div class="mobile-menu-inner">
				<?php composer_mobile_nav(); ?>
			</div></div>			
		<?php } ?>

		<div id="content-pusher">

		<?php 
			if ( ${'composer_'.$composer_prefix.'boxed_content'} === 'boxed' ) {
				echo '<div class="pix-boxed-content">';
			}
			
			if( ${'composer_'.$composer_prefix.'header_layout'} == 'right-header' ){
				$composer_pagetop_class = 'right-header-top';
			}else {
				$composer_pagetop_class = '';
			}


			// Go to Top Button
			$composer_go_to_top = composer_get_option_value( 'go_to_top', 'enable' );
			if ( 'enable' === $composer_go_to_top ) {	
				echo '<p id="back-top" class="'. esc_attr( $composer_pagetop_class ) .'"><a href="#top"><span class="pixicon-arrow-angle-up"></span></a></p>';
			}

			//Check if Blank Template, if yes remove header and footer
			$composer_page_slug =  get_page_template_slug(); 
			if ( 'templates/page-blank.php' != $composer_page_slug ) : 

				if( ${'composer_'.$composer_prefix.'header_hide'} != 'hide' ) {

				//Header Drawer ( Header Widgets dropdown )
				get_template_part ( 'templates/headers/header-drawer' );

				if( 'show' === ${'composer_'.$composer_prefix.'transparent_header'} ){
					echo '<div class="transparent-header opacity-'. esc_attr( ${'composer_'.$composer_prefix.'transparent_header_opacity'} ) .'">';
				}

				if( 'default' == ${'composer_'.$composer_prefix.'header_hover_layout'} ){
					${$composer_prefix.'header_hover_layout'} = '';
				}

				if ( isset ( ${'composer_'.$composer_prefix.'_slider_shortcode'} ) && ! empty ( ${'composer_'.$composer_prefix.'_slider_shortcode'} ) ) {
					echo do_shortcode ( ${'composer_'.$composer_prefix.'_slider_shortcode'} );
				}

				/* Header Wrapper Div */

				if( ${'composer_'.$composer_prefix.'header_layout'} != 'left-header' && ${'composer_'.$composer_prefix.'header_layout'} != 'right-header' ){
				?>
				<div class="header-wrap <?php echo esc_attr( ${'composer_'.$composer_prefix.'header_hover_layout'} . $composer_header_class. $composer_header_line_class . $composer_sub_class ); ?>">

					<div class="header-con<?php echo esc_attr( $composer_header_sticky_class . $composer_header_con_class . $composer_header_res_class .' menu-'.${'composer_'.$composer_prefix.'header_layout'} . $composer_main_class ); ?>">

						<?php

							if(${'composer_'.$composer_prefix.'header_layout'} == 'header-5'){
								echo '<div class="menu-header-5-con">';
							}

							if ( 'show' === ${'composer_'.$composer_prefix.'top_header'} && ${'composer_'.$composer_prefix.'top_header_position'} === 'top' ){
								get_template_part ( 'templates/headers/header-info' );
							}
							
							get_template_part ( 'templates/headers/'. ${'composer_'.$composer_prefix.'header_layout'} );

							if ( 'show' === ${'composer_'.$composer_prefix.'top_header'} && ${'composer_'.$composer_prefix.'top_header_position'} === 'bottom' ){
								get_template_part ( 'templates/headers/header-info' );
							}

							if(${'composer_'.$composer_prefix.'header_layout'} == 'header-5'){
								echo '</div>';
							}

						?>
					</div>

				</div>

				<?php 
				}

				if( 'show' === ${'composer_'.$composer_prefix.'transparent_header'} ){
					echo '</div>';
				}

		if( ${'composer_'.$composer_prefix.'header_layout'} == 'left-header' || ${'composer_'.$composer_prefix.'header_layout'} == 'right-header'){ 
			
			$lr_menu_alignment = composer_get_option_value( 'lr_menu_align', 'center' );
			if( $lr_menu_alignment == 'top' ){
				$lr_menu_class = ' top-nav-align';
			} else {
				$lr_menu_class = '';
			}

			$lr_text_alignment = composer_get_option_value( 'lr_text_align', 'left' );
			if( $lr_text_alignment == 'center' ){
				$lr_text_class = ' menu-on-center';
			} else {
				$lr_text_class = '';
			}

			$lr_menu_line = composer_get_option_value( 'lr_nav_line', 'yes' );
			if( $lr_menu_line == 'no' ){
				$lr_line_class = ' no-line-menu';
			} else {
				$lr_line_class = '';
			}
			?>

			<?php 
				if( ${'composer_'.$composer_prefix.'header_layout'} == 'left-header' ){ 
					echo '<div class="main-side-left'. esc_attr( $composer_header_class ) . esc_attr( $composer_sub_class ) . esc_attr($lr_menu_class) . esc_attr($lr_text_class) . esc_attr($lr_line_class) .' '. esc_attr( ${'composer_'.$composer_prefix.'header_hover_layout'} ) .'">';
				} 
				if( ${'composer_'.$composer_prefix.'header_layout'} == 'right-header' ){ 
					echo '<div class="main-side-left main-side-right'. esc_attr( $composer_header_class ) . esc_attr( $composer_sub_class ) . esc_attr($lr_menu_class) .'">';
				}
			?>
			<div class="left-main-menu">
				<div class="menu-container">

					<?php  

					$composer_logo = composer_get_option_value( 'custom_logo', get_bloginfo( 'name' ) );

					$composer_logo_light = composer_get_option_value( 'custom_logo_light', get_bloginfo( 'name' ) );

					$composer_logo2x = composer_get_option_value( 'retina_logo', '' );

					$composer_logo_light2x = composer_get_option_value( 'retina_logo_light', '' );

					?>

					<div class="m-sticky">
						<div class="container">
							<div id="mobile-logo">	
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="nofollow">
									<?php 
										if ( $composer_logo != get_bloginfo('name') ) {
											echo '<img src="'.esc_url( $composer_logo ).'" data-rjs="'.esc_url( $composer_logo2x ).'" alt="">';
										}
										else {
											echo esc_html( $composer_logo );
										}
									?>
								</a>
							</div>
							<div class="menu-responsive pix-menu-trigger">
								<span class="mobile-menu"></span>
							</div>
						</div>
					</div>

					<?php echo composer_get_logo(); ?>

					<?php if( ${'composer_'.$composer_prefix.'display_menu'} != 'hide' ) { ?>
						<div class="pix-menu">
							<div class="pix-menu-trigger">
								<span class="mobile-menu"><?php esc_html_e( 'Menu', 'composer' ); ?></span>
							</div>
						</div>
						
						<nav class="main-nav main-nav-left">
							<?php  composer_main_nav(); ?>
						</nav>
					<?php } ?>

					<div class="side-header-widget">
						<?php
						$composer_side_sorter = array( 
							"left" => array (
								"placebo" => "placebo", //REQUIRED!
								"sicons"      => "Social Icons",	
								"copyright_text" => "Copyright Text"
							)
						);
						$composer_side_sorter_left = composer_get_option_array_value('side_sorter','left', $composer_side_sorter['left'] );
						foreach ($composer_side_sorter_left as $key => $value) {
							composer_display_header_elements( $key, 'lang-list-wrap', 'page-top-main' );
						} 
						?>
					</div>
					
				</div>

			</div>
		<?php } 

			} // header_hide option close

			endif; //Blank template check ?>

		<div id="main-wrapper" class="clearfix" >
			<?php
			$composer_page_slug =  get_page_template_slug(); 	

			if ( is_search() ){
				${'composer_'.$composer_prefix.'title_bar'} = composer_get_option_value( 'search_title_bar', 'show' ); // id, meta_key, meta_default, themeoption_key, themeoption_default
			}		

			if ( 'templates/page-blank.php' != $composer_page_slug ) {
				if ( ( ! is_front_page() || is_home() ) && ( 'show' === ${'composer_'.$composer_prefix.'title_bar'} ) ) {

					composer_sub_banner( ${'composer_'.$composer_prefix.'page_title'}, ${'composer_'.$composer_prefix.'title_bar_size'}, ${'composer_'.$composer_prefix.'title_bar_style'}, ${'composer_'.$composer_prefix.'breadcrumbs'}, ${'composer_'.$composer_prefix.'header_layout'}, ${'composer_'.$composer_prefix.'transparent_header'}, ${'composer_'.$composer_prefix.'title_bar_overlay'}, ${'composer_'.$composer_prefix.'title_bar_overlay_color'}, ${'composer_'.$composer_prefix.'title_bar_gradient_top_value'}, ${'composer_'.$composer_prefix.'title_bar_gradient_middle_value'}, ${'composer_'.$composer_prefix.'title_bar_gradient_bottom_value'}, ${'composer_'.$composer_prefix.'title_bar_gradient_opacity'} );
				}
			}
			?>
			<div id="wrapper" data-ajaxtransin="<?php echo esc_attr( $composer_ajaxtransin ); ?>" data-ajaxtransout="<?php echo esc_attr( $composer_ajaxtransout ); ?>" data-preloadtrans="<?php echo esc_attr( $composer_preloadtrans ); ?>">
			