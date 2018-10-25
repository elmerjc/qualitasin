<?php
/*
	Register Fonts
	*/
	function composer_theme_fonts_url() {

	    global $smof_data;

	    $font_url = '';

		if (!is_admin()) {

			$protocol = is_ssl() ? 'https' : 'http';

			//Subset
			$raw_subsets = (isset($smof_data['subset'])) ? $smof_data['subset'] : array("latin" => 1);

			$font_subsets = '';
			foreach ($raw_subsets as $key => $value) {
				if($value){
					$font_subsets .= $key .',';
				}
			}
			$font_subsets = rtrim($font_subsets, ",");

			$custom_fonts = array();
			$user_fonts = composer_get_option_value('custom_fonts', array() );

			if( !empty( $user_fonts ) ) {
				foreach ( $custom_fonts as $font ) {

					if( $font['font_title'] && ( $font['woff'] || $font['ttf'] || $font['eot'] || $font['svg'] ) ) {
						$custom_fonts[] = $font['font_title'];
					}

				}
			}

			//Advanced font Settings
			$afs = isset($smof_data['ad_font_settings']) ? $smof_data['ad_font_settings'] : '0';

			$body_font = $headings_font = '';

			//Body Font
			if( (isset($smof_data['custom_font_body']['g_face'])) && ! in_array($smof_data['custom_font_body']['g_face'], $custom_fonts) ) {
				$body_font = (isset($smof_data['custom_font_body']['g_face'])) ? $smof_data['custom_font_body']['g_face'] : 'Raleway';
				$body_font .= ':300,400,400italic,700,700italic';
			}

			//Heading Font
			if( (isset($smof_data['custom_font_primary']['g_face'])) && ! in_array($smof_data['custom_font_primary']['g_face'], $custom_fonts) ) {
				$headings_font = (isset($smof_data['custom_font_primary']['g_face'])) ? '|'.$smof_data['custom_font_primary']['g_face'] : '|Poppins';
				$headings_font .= ':300,400,500,600,700';
			}

			if($afs == '0'){ 

				/*
			    Translators: If there are characters in your language that are not supported
			    by chosen font(s), translate this to 'off'. Do not translate into your own language.
			     */

			    if ( 'off' !== _x( 'on', 'Google font: on or off', 'composer' ) ) {
			    	$font_url = add_query_arg( 'family', urlencode($body_font.$headings_font.'&subset='. $font_subsets), "//fonts.googleapis.com/css" );
			    }
			}
			else { // it runs only advance typography option is turned on

				$h1 = $h2 = $h3 = $h4 = $h5 = $h6 = $list = $link = $logo = $blockquote = $menu = $sub_menu = $mega_menu = $main_title = $btn = $btn_small = $btn_lg = $process_title = $process_content = $percent_text = $percent_outside = $txtfield = $staff_title = $filter_normal = $plan_title = $plan_value = $plan_valign = $plan_month = $testimonial_content = $widget_title = $cf_twitter = '';

				//H1 Custom Font				
				if( (isset($smof_data['cf_h1']['g_face'])) && ! in_array($smof_data['cf_h1']['g_face'], $custom_fonts) ) {
					$h1 = (isset($smof_data['cf_h1']['g_face'])) ? '|'.$smof_data['cf_h1']['g_face'] : '';
					$h1 .= (isset($smof_data['cf_h1']['style'])) ? ':'.$smof_data['cf_h1']['style'] : '';
				}

				//H2 Custom Font
				if( (isset($smof_data['cf_h2']['g_face'])) && ! in_array($smof_data['cf_h2']['g_face'], $custom_fonts) ) {
					$h2 = (isset($smof_data['cf_h2']['g_face'])) ? '|'.$smof_data['cf_h2']['g_face'] : '';
					$h2 .= (isset($smof_data['cf_h2']['style'])) ? ':'.$smof_data['cf_h2']['style'] : '';
				}

				//H3 Custom Font
				if( (isset($smof_data['cf_h3']['g_face'])) && ! in_array($smof_data['cf_h3']['g_face'], $custom_fonts) ) {
					$h3 = (isset($smof_data['cf_h3']['g_face'])) ? '|'.$smof_data['cf_h3']['g_face'] : '';
					$h3 .= (isset($smof_data['cf_h3']['style'])) ? ':'.$smof_data['cf_h3']['style'] : '';
				}

				//H4 Custom Font
				if( (isset($smof_data['cf_h4']['g_face'])) && ! in_array($smof_data['cf_h4']['g_face'], $custom_fonts) ) {
					$h4 = (isset($smof_data['cf_h4']['g_face'])) ? '|'.$smof_data['cf_h4']['g_face'] : '';
					$h4 .= (isset($smof_data['cf_h4']['style'])) ? ':'.$smof_data['cf_h4']['style'] : '';
				}

				//H5 Custom Font
				if( (isset($smof_data['cf_h5']['g_face'])) && ! in_array($smof_data['cf_h5']['g_face'], $custom_fonts) ) {
					$h5 = (isset($smof_data['cf_h5']['g_face'])) ? '|'.$smof_data['cf_h5']['g_face'] : '';
					$h5 .= (isset($smof_data['cf_h5']['style'])) ? ':'.$smof_data['cf_h5']['style'] : '';
				}

				//H6 Custom Font
				if( (isset($smof_data['cf_h6']['g_face'])) && ! in_array($smof_data['cf_h6']['g_face'], $custom_fonts) ) {
					$h6 = (isset($smof_data['cf_h6']['g_face'])) ? '|'.$smof_data['cf_h6']['g_face'] : '';
					$h6 .= (isset($smof_data['cf_h6']['style'])) ? ':'.$smof_data['cf_h6']['style'] : '';
				}

				//List Item Font
				if( (isset($smof_data['cf_list']['g_face'])) && ! in_array($smof_data['cf_list']['g_face'], $custom_fonts) ) {
					$list = (isset($smof_data['cf_list']['g_face'])) ? '|'.$smof_data['cf_list']['g_face'] : '';
					$list .= (isset($smof_data['cf_list']['style'])) ? ':'.$smof_data['cf_list']['style'] : '';
				}

				//Link Font
				if( (isset($smof_data['cf_link']['g_face'])) && ! in_array($smof_data['cf_link']['g_face'], $custom_fonts) ) {
					$link = (isset($smof_data['cf_link']['g_face'])) ? '|'.$smof_data['cf_link']['g_face'] : '';
					$link .= (isset($smof_data['cf_link']['style'])) ? ':'.$smof_data['cf_link']['style'] : '';
				}

				//Logo Font
				if( (isset($smof_data['cf_logo']['g_face'])) && ! in_array($smof_data['cf_logo']['g_face'], $custom_fonts) ) {
					$logo = (isset($smof_data['cf_logo']['g_face'])) ? '|'.$smof_data['cf_logo']['g_face'] : '';
					$logo .= (isset($smof_data['cf_logo']['style'])) ? ':'.$smof_data['cf_logo']['style'] : '';
				}

				//BlockQuote Font
				if( (isset($smof_data['cf_blockquote']['g_face'])) && ! in_array($smof_data['cf_blockquote']['g_face'], $custom_fonts) ) {
					$blockquote = (isset($smof_data['cf_blockquote']['g_face'])) ? '|'.$smof_data['cf_blockquote']['g_face'] : '';
					$blockquote .= (isset($smof_data['cf_blockquote']['style'])) ? ':'.$smof_data['cf_blockquote']['style'] : '';
				}

				//Menu Font
				if( (isset($smof_data['cf_menu']['g_face'])) && ! in_array($smof_data['cf_menu']['g_face'], $custom_fonts) ) {
					$menu = (isset($smof_data['cf_menu']['g_face'])) ? '|'.$smof_data['cf_menu']['g_face'] : '';
					$menu .= (isset($smof_data['cf_menu']['style'])) ? ':'.$smof_data['cf_menu']['style'] : '';
				}

				//Sub Menu Font
				if( (isset($smof_data['cf_sub_menu']['g_face'])) && ! in_array($smof_data['cf_sub_menu']['g_face'], $custom_fonts) ) {
					$sub_menu = (isset($smof_data['cf_sub_menu']['g_face'])) ? '|'.$smof_data['cf_sub_menu']['g_face'] : '';
					$sub_menu .= (isset($smof_data['cf_sub_menu']['style'])) ? ':'.$smof_data['cf_sub_menu']['style'] : '';
				}

				//Mega Menu Font
				if( (isset($smof_data['cf_mega_menu']['g_face'])) && ! in_array($smof_data['cf_mega_menu']['g_face'], $custom_fonts) ) {
					$mega_menu = (isset($smof_data['cf_mega_menu']['g_face'])) ? '|'.$smof_data['cf_mega_menu']['g_face'] : '';
					$mega_menu .= (isset($smof_data['cf_mega_menu']['style'])) ? ':'.$smof_data['cf_mega_menu']['style'] : '';
				}

				//Main Title Font
				if( (isset($smof_data['cf_main_title']['g_face'])) && ! in_array($smof_data['cf_main_title']['g_face'], $custom_fonts) ) {
					$main_title = (isset($smof_data['cf_main_title']['g_face'])) ? '|'.$smof_data['cf_main_title']['g_face'] : '';
					$main_title .= (isset($smof_data['cf_main_title']['style'])) ? ':'.$smof_data['cf_main_title']['style'] : '';
				}

				//Button Font
				if( (isset($smof_data['cf_btn']['g_face'])) && ! in_array($smof_data['cf_btn']['g_face'], $custom_fonts) ) {
					$btn = (isset($smof_data['cf_btn']['g_face'])) ? '|'.$smof_data['cf_btn']['g_face'] : '';
					$btn .= (isset($smof_data['cf_btn']['style'])) ? ':'.$smof_data['cf_btn']['style'] : '';
				}

				//Small Button Font
				if( (isset($smof_data['cf_btn_small']['g_face'])) && ! in_array($smof_data['cf_btn_small']['g_face'], $custom_fonts) ) {
					$btn_small = (isset($smof_data['cf_btn_small']['g_face'])) ? '|'.$smof_data['cf_btn_small']['g_face'] : '';
					$btn_small .= (isset($smof_data['cf_btn_small']['style'])) ? ':'.$smof_data['cf_btn_small']['style'] : '';
				}

				//Large Button Font
				if( (isset($smof_data['cf_btn_lg']['g_face'])) && ! in_array($smof_data['cf_btn_lg']['g_face'], $custom_fonts) ) {
					$btn_lg = (isset($smof_data['cf_btn_lg']['g_face'])) ? '|'.$smof_data['cf_btn_lg']['g_face'] : '';
					$btn_lg .= (isset($smof_data['cf_btn_lg']['style'])) ? ':'.$smof_data['cf_btn_lg']['style'] : '';
				}

				//Process Title Font
				if( (isset($smof_data['cf_process_title']['g_face'])) && ! in_array($smof_data['cf_process_title']['g_face'], $custom_fonts) ) {
					$process_title = (isset($smof_data['cf_process_title']['g_face'])) ? '|'.$smof_data['cf_process_title']['g_face'] : '';
					$process_title .= (isset($smof_data['cf_process_title']['style'])) ? ':'.$smof_data['cf_process_title']['style'] : '';
				}

				//Process Content Font
				if( (isset($smof_data['cf_process_content']['g_face'])) && ! in_array($smof_data['cf_process_content']['g_face'], $custom_fonts) ) {
					$process_content = (isset($smof_data['cf_process_content']['g_face'])) ? '|'.$smof_data['cf_process_content']['g_face'] : '';
					$process_content .= (isset($smof_data['cf_process_content']['style'])) ? ':'.$smof_data['cf_process_content']['style'] : '';
				}

				//Percent Text Font
				if( (isset($smof_data['cf_percent_text']['g_face'])) && ! in_array($smof_data['cf_percent_text']['g_face'], $custom_fonts) ) {
					$percent_text = (isset($smof_data['cf_percent_text']['g_face'])) ? '|'.$smof_data['cf_percent_text']['g_face'] : '';
					$percent_text .= (isset($smof_data['cf_percent_text']['style'])) ? ':'.$smof_data['cf_percent_text']['style'] : '';
				}

				//Percent Outside Font
				if( (isset($smof_data['cf_percent_outside']['g_face'])) && ! in_array($smof_data['cf_percent_outside']['g_face'], $custom_fonts) ) {
					$percent_outside = (isset($smof_data['cf_percent_outside']['g_face'])) ? '|'.$smof_data['cf_percent_outside']['g_face'] : '';
					$percent_outside .= (isset($smof_data['cf_percent_outside']['style'])) ? ':'.$smof_data['cf_percent_outside']['style'] : '';
				}

				//Textfield Font
				if( (isset($smof_data['cf_txtfield']['g_face'])) && ! in_array($smof_data['cf_txtfield']['g_face'], $custom_fonts) ) {
					$txtfield = (isset($smof_data['cf_txtfield']['g_face'])) ? '|'.$smof_data['cf_txtfield']['g_face'] : '';
					$txtfield .= (isset($smof_data['cf_txtfield']['style'])) ? ':'.$smof_data['cf_txtfield']['style'] : '';
				}

				//Staff Title Font
				if( (isset($smof_data['cf_staff_title']['g_face'])) && ! in_array($smof_data['cf_staff_title']['g_face'], $custom_fonts) ) {
					$staff_title = (isset($smof_data['cf_staff_title']['g_face'])) ? '|'.$smof_data['cf_staff_title']['g_face'] : '';
					$staff_title .= (isset($smof_data['cf_staff_title']['style'])) ? ':'.$smof_data['cf_staff_title']['style'] : '';
				}

				//Portfolio Filter Normal Font
				if( (isset($smof_data['cf_filter_normal']['g_face'])) && ! in_array($smof_data['cf_filter_normal']['g_face'], $custom_fonts) ) {
					$filter_normal = (isset($smof_data['cf_filter_normal']['g_face'])) ? '|'.$smof_data['cf_filter_normal']['g_face'] : '';
					$filter_normal .= (isset($smof_data['cf_filter_normal']['style'])) ? ':'.$smof_data['cf_filter_normal']['style'] : '';
				}

				//Pricing Table Title Font
				if( (isset($smof_data['cf_plan_title']['g_face'])) && ! in_array($smof_data['cf_plan_title']['g_face'], $custom_fonts) ) {
					$plan_title = (isset($smof_data['cf_plan_title']['g_face'])) ? '|'.$smof_data['cf_plan_title']['g_face'] : '';
					$plan_title .= (isset($smof_data['cf_plan_title']['style'])) ? ':'.$smof_data['cf_plan_title']['style'] : '';
				}

				//Pricing Table Price Font
				if( (isset($smof_data['cf_plan_value']['g_face'])) && ! in_array($smof_data['cf_plan_value']['g_face'], $custom_fonts) ) {
					$plan_value = (isset($smof_data['cf_plan_value']['g_face'])) ? '|'.$smof_data['cf_plan_value']['g_face'] : '';
					$plan_value .= (isset($smof_data['cf_plan_value']['style'])) ? ':'.$smof_data['cf_plan_value']['style'] : '';
				}

				//Pricing Table Currency Font
				if( (isset($smof_data['cf_plan_valign']['g_face'])) && ! in_array($smof_data['cf_plan_valign']['g_face'], $custom_fonts) ) {
					$plan_valign = (isset($smof_data['cf_plan_valign']['g_face'])) ? '|'.$smof_data['cf_plan_valign']['g_face'] : '';
					$plan_valign .= (isset($smof_data['cf_plan_valign']['style'])) ? ':'.$smof_data['cf_plan_valign']['style'] : '';
				}

				//Pricing Table Plan Month Font
				if( (isset($smof_data['cf_plan_month']['g_face'])) && ! in_array($smof_data['cf_plan_month']['g_face'], $custom_fonts) ) {
					$plan_month = (isset($smof_data['cf_plan_month']['g_face'])) ? '|'.$smof_data['cf_plan_month']['g_face'] : '';
					$plan_month .= (isset($smof_data['cf_plan_month']['style'])) ? ':'.$smof_data['cf_plan_month']['style'] : '';
				}

				//Testimonial Content Font
				if( (isset($smof_data['cf_testimonial_content']['g_face'])) && ! in_array($smof_data['cf_testimonial_content']['g_face'], $custom_fonts) ) {
					$testimonial_content = (isset($smof_data['cf_testimonial_content']['g_face'])) ? '|'.$smof_data['cf_testimonial_content']['g_face'] : '';
					$testimonial_content .= (isset($smof_data['cf_testimonial_content']['style'])) ? ':'.$smof_data['cf_testimonial_content']['style'] : '';
				}

				//Widget Title Font
				if( (isset($smof_data['cf_widget_title']['g_face'])) && ! in_array($smof_data['cf_widget_title']['g_face'], $custom_fonts) ) {
					$widget_title = (isset($smof_data['cf_widget_title']['g_face'])) ? '|'.$smof_data['cf_widget_title']['g_face'] : '';
					$widget_title .= (isset($smof_data['cf_widget_title']['style'])) ? ':'.$smof_data['cf_widget_title']['style'] : '';
				}

				//Twitter Content Font
				if( (isset($smof_data['cf_twitter']['g_face'])) && ! in_array($smof_data['cf_twitter']['g_face'], $custom_fonts) ) {
					$cf_twitter = (isset($smof_data['cf_twitter']['g_face'])) ? '|'.$smof_data['cf_twitter']['g_face'] : '';
					$cf_twitter .= (isset($smof_data['cf_twitter']['style'])) ? ':'.$smof_data['cf_twitter']['style'] : '';
				}

				/*
			    Translators: If there are characters in your language that are not supported
			    by chosen font(s), translate this to 'off'. Do not translate into your own language.
			     */

			    if ( 'off' !== _x( 'on', 'Google font: on or off', 'composer' ) ) {
			    	$font_url = add_query_arg( 'family', urlencode($body_font.$headings_font.$h1.$h2.$h3.$h4.$h5.$h6.$list.$link.$logo.$blockquote.$menu.$sub_menu.$mega_menu.$main_title.$btn.$btn_small.$btn_lg.$process_title.$process_content.$percent_text.$percent_outside.$txtfield.$staff_title.$filter_normal.$plan_title.$plan_value.$plan_valign.$plan_month.$testimonial_content.$widget_title.$cf_twitter .'&subset='. $font_subsets), "//fonts.googleapis.com/css" );
			    }
			}


		}	    
	    
	    return $font_url;
	}
	/*
	Enqueue scripts and styles.
	*/
	function composer_theme_fonts_scripts() {
	    wp_enqueue_style( 'pix_theme_fonts', composer_theme_fonts_url(), array(), '1.0.0' );
	}
	add_action( 'wp_enqueue_scripts', 'composer_theme_fonts_scripts' );

	//Seperate font weight & font Style

	if(!function_exists('composer_font_variant')){
		function composer_font_variant($fv = ''){

		    //Font Style
		    if(stristr($fv, 'italic') !== FALSE){
		        $fs = 'italic';
		    }else{
		        $fs = 'normal';
		    }

		    //Font Weight
		    $fw = substr($fv, 0, 3);
		    if($fw === FALSE || $fw == 'reg' || $fw == 'ita'){
		        $fw = '400';
		    }

		    return array($fs, $fw);
		}
	}

	function composer_get_font_family( $font ) {

		$ff = '';
		// Choosen Google webfont
		if( isset( $font['g_face'] ) ){
			$ff = $font['g_face'];
		} elseif( isset( $font['font-family'] ) )  {
			$ff = $font['font-family'];
		}

		return $ff;

	}

	function composer_get_font_style( $font ) {

		$fv = '';
		// Google web font variant (eg; 300italic)
		if( isset( $font['style'] ) ){
			$fv = $font['style'];
		} elseif( isset( $font['variant'] ) )  {
			$fv = $font['variant'];
		}

		return $fv;

	}

	function composer_get_font_size( $font ) {

		$fsize = '';
		// Font size
		if( isset( $font['size'] ) ){
			$fsize = $font['size'];
		} elseif( isset( $font['font-size'] ) )  {
			$fsize = $font['font-size'];
		}

		return $fsize;
	}

	function composer_get_font_fallback( $font ) {
		$ff = isset( $font['face'] ) ? $font['face'] : ''; // Fallback font
		return $ff;
	}

	//Page Title Bar
	function composer_sub_banner( $title, $title_bar_size, $title_bar_style, $breadcrumbs, $s_header = 'sub_header1', $s_header_trans = 'hide', $overlay, $overlay_color, $gradient1, $gradient2, $gradient3, $overlay_opacity ) {

		global $smof_data;

		if ( composer_is_shop() ) {
			$shop_page_id = wc_get_page_id( 'shop' );
			$title = get_the_title( $shop_page_id );
		} elseif ( composer_is_product_category() ) {
			$title = single_cat_title( '', false );
		}

		$s_header = 'sub-'.$s_header;

		$class_con = $class_left = $class_right = '';
		if ( $title_bar_size == 'small' ) {
			$composer_header_text = 'left';	
		} else {
			$composer_header_text = 'center';
		}

		if( $composer_header_text == 'left' ){
			$class_left = 'col-md-8 col-sm-8';
			$class_right = 'col-md-4 col-sm-4';
			$class_con = 'row';
		}

		$s_header_trans = ( 'show' === $s_header_trans ) ? 'header-trans' : '';

		echo '<div id="sub-header" class="clear '. esc_attr( $s_header .' '. $s_header_trans .' clearfix align-'. $composer_header_text .' '. $title_bar_size .' '. $title_bar_style ) .'" >';
			
		    if( $overlay == 'color' && !empty( $overlay_color ) ){
		        echo '<div class="pattern"></div>';
		    }
		    elseif( $overlay == 'gradient' && ( !empty( $gradient1 ) || !empty( $gradient2 ) || !empty( $gradient3 ) ) ){
		        echo '<div class="pattern"></div>';
		    }

			echo '<div class="container">';
				echo '<div id="banner" class="sub-header-inner '.$class_con.'">';

					echo '<header class="banner-header '. $class_left .'">';
						$search_date = isset( $_GET['date'] ) ? $_GET['date'] : '';
						$search_terms = isset( $_GET['terms'] ) ? $_GET['terms'] : '';
						$search_state = isset( $_GET['state'] ) ? $_GET['state'] : '';
						$search = isset( $_GET['event_search'] ) ? $_GET['event_search'] : '';

						if( $search && ( !empty( $search_date ) || !empty( $search_terms ) || !empty( $search_state ) ) ) {
							echo '<p>' . esc_html__( 'Filter By:', 'composer' ) . '</p>';
						}
						echo '<h2>' . esc_html( $title ) . '</h2>';
					echo '</header>';

					if( 'show' === $breadcrumbs ){

						echo '<div class="pix-breadcrumbs '. esc_attr( $class_right ) .'">';

							$breadcrumbs_blog = isset( $smof_data['blog_page_title'] ) ? $smof_data['blog_page_title'] : esc_html__('Blog', 'composer');

								if( function_exists( 'composer_breadcrumbs' ) ){

									if ( !is_home() ){

										composer_breadcrumbs();
										
									} elseif ( is_home() ){
										echo '<ul class="breadcrumb"><li><a href="' . esc_url(home_url( '/' ) ) . '">'. esc_html__( 'Home', 'composer' ) .'</a></li><li> <span class="current"> '. esc_html( $breadcrumbs_blog ) .'</span></li></ul>';
									}
								}

						echo '</div>';
					}
				echo '</div>';
			echo '</div>';   
		echo '</div>';    
	}

//Breadcrumbs
function composer_breadcrumbs() {

	if( composer_is_shop() || composer_is_product() || composer_is_product_category() || composer_is_product_tag() ) {

		woocommerce_breadcrumb();

		return;

	}

	$show_on_home = 1; // 1 - show breadcrumbs on the homepage, 0 - don't show
	$delimiter = ''; // delimiter between crumbs
	$home = esc_html__( 'Home', 'composer' ); // text for the 'Home' link
	$show_current = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
	$before = '<span class="current">'; // tag before the current crumb
	$after = '</span>'; // tag after the current crumb

	global $post;
	$homeLink = home_url( '/' );

	if ( is_home() || is_front_page() ) {

		if ( $show_on_home == 1 ) {
			echo '<ul class="breadcrumb"><li><a href="' . esc_url( $homeLink ) . '">' . ucwords( $home ) . '</a></li></ul>';
		}

	}
	else {

		echo '<ul class="breadcrumb" itemprop="breadcrumb"><li><a href="' . esc_url( $homeLink ) . '">' . ucwords( $home ) . '</a> ' . $delimiter . '</li>';

			if ( is_category() ) {
				global $wp_query;
				$cat_obj = $wp_query->get_queried_object(); 
				$this_cat = $cat_obj->term_id;
				$this_cat = get_category( $this_cat );
				$parent_cat = get_category( $this_cat->parent );
				if ( $this_cat->parent != 0 ) {
					echo ( get_category_parents( $parent_cat, TRUE, ' ' . $delimiter . ' ' ) );
				}
				echo '<li>' .$before . esc_html( single_cat_title( '', false ) ) . $after.'</li>';

			}
			else if ( is_search() ) {
				echo '<li>' . $before . esc_html( get_search_query() ) . $after .'</li>';

			}
			else if ( is_day() ) {
				echo '<li><a href="' . esc_url( get_year_link( get_the_time( 'Y' ) ) ) . '">' . esc_html( get_the_time( 'Y' ) ) . '</a> ' . $delimiter . '</li>';
				echo '<li><a href="' . esc_url( get_month_link( get_the_time( 'Y' ), get_the_time( 'm' ) ) ) . '">' . esc_html( get_the_time('F') ) . '</a> ' . $delimiter . '</li>';
				echo '<li>' . $before . esc_html( get_the_time('d') ) . $after . '</li>';

			}
			else if ( is_month() ) {
				echo '<li><a href="' . esc_url( get_year_link( get_the_time( 'Y' ) ) ) . '">' . esc_html( get_the_time('Y') ) . '</a> ' . $delimiter . '</li>';
				echo '<li>' . $before . esc_html( get_the_time('F') ) . $after . '</li>';

			}
			else if ( is_year() ) {
				echo '<li>' . $before . esc_html( get_the_time('Y') ) . $after . '</li>';

			}
			else if ( is_single() && !is_attachment() ) {
				if ( get_post_type() != 'post' ) {

					if ( is_singular( 'pix_portfolio' ) ){

						// Get redirect link
				        $portfolio_page = composer_get_option_value( 'portfolio_page', '' );

				        if( 'dashboard' != $portfolio_page && !empty( $portfolio_page ) ) {
				            $portfolio_page_url = get_permalink( $portfolio_page );
				        }
				        else {
				            $portfolio_page_url = home_url( '/' );               
				        }

						echo '<li><a href="' . esc_url( $portfolio_page_url ) . '">' . esc_html__( 'Portfolio', 'composer' ) . '</a> ' . $delimiter . '</li>';
					}

					$post_type = get_post_type_object(get_post_type());
					$slug = $post_type->rewrite;
					if ( $show_current == 1 ){

						global $wp_query; 
						$post_id = ( 0 == get_the_ID() || NULL == get_the_ID() ) ? $wp_query->post->ID : get_the_ID();

						echo '<li> ' . $before . ucwords( esc_html( get_the_title( $post_id ) ) ) . $after . '</li>';
					}
				}
				else {
					$cat = get_the_category(); $cat = $cat[0];
					$cats = get_category_parents( $cat, TRUE, ' ' . $delimiter . ' ' );
					if ( $show_current == 0 ){
						$cats = preg_replace("/^(.+)\s$delimiter\s$/", "$1", $cats);
						echo '<li>'. $before . esc_html( $cats ) . $after . '</li>';
					}
					if ( $show_current == 1 ){
						echo '<li>'. $before . ucwords( composer_shorten_text( esc_html( get_the_title() ), 20 ) ) . $after . '</li>';
					}
				}

			}
			else if ( !is_single() && !is_page() && get_post_type() != 'post' && !composer_is_shop() && !composer_bbp_is_user_home() && !is_404() ) {

				$post_type = get_post_type_object( get_post_type() );
				echo '<li>'. $before . esc_html( ucwords( $post_type->labels->singular_name ) ) . $after.'</li>';

				if( is_tax() ) {
					$current_term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );

					echo '<li>'. $before . esc_html( ucwords( $current_term->name ) ) . $after.'</li>';
				}				

			}
			else if( composer_bbp_is_user_home() ) {
				echo '<li>'. $before . esc_html__( 'User', 'composer' ) . $after.'</li>';
			}
			else if ( is_attachment() ) {
				$parent = get_post( $post->post_parent );
				$cat = get_the_category( $parent->ID ); 
				if(!empty($cat)){
					$cat = $cat[0];
					echo get_category_parents( $cat, TRUE, ' ' . $delimiter . ' ' );
				}
				echo '<li><a href="' . esc_url( get_permalink( $parent ) ) . '">' . esc_html( ucwords( $parent->post_title ) ) . '</a></li>';
				if ( $show_current == 1 ) {
					echo '<li>' . $delimiter . ' ' . $before . ucwords( esc_html( get_the_title() ) ) . $after . '</li>';
				}

			} 
			elseif ( is_page() && !$post->post_parent ) {
				if ( $show_current == 1 ) {
					echo '<li>' . $before . ucwords( esc_html( get_the_title() ) ) . $after .'</li>';
				}

			}
			elseif ( is_page() && $post->post_parent ) {
				$parent_id  = $post->post_parent;
				$breadcrumbs = array();
				while ($parent_id) {
					$page = get_page( $parent_id );
					$breadcrumbs[] = '<li><a href="' . esc_url( get_permalink( $page->ID ) ) . '">' . esc_html( ucwords( get_the_title( $page->ID ) ) ) . '</a></li>';
					$parent_id  = $page->post_parent;
				}
				$breadcrumbs = array_reverse( $breadcrumbs );
				for ( $i = 0; $i < count( $breadcrumbs ); $i++ ) {
					echo $breadcrumbs[$i]; //escaped Properly on five lines before from here
					if ( $i != count( $breadcrumbs ) -1 ) {
						echo ' ' . $delimiter . ' ';
					}
				}
				if ( $show_current == 1 ) {
					echo '<li>' . $delimiter . ' ' . $before . ucwords( esc_html(get_the_title() ) ) . $after . '</li>';
				}

			}
			elseif ( is_tag() ) {
				echo '<li>' . $before . esc_html__( 'Posts Tag: ', 'composer' ) . esc_html( ucwords(single_tag_title('', false) . '') ) . $after . '</li>';

			}
			elseif ( is_author() ) {
				global $author;
				$userdata = get_userdata($author);
				echo '<li>' .$before . esc_html__( 'Posted By: ', 'composer' ) . esc_html( ucwords($userdata->display_name ) ) . $after .'</li>';

			}
			elseif ( is_404() ) {
				echo '<li>' .$before . esc_html__('Error 404', 'composer' ) . $after .'</li>';
			}

			if ( get_query_var( 'paged' ) ) {
				if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) {
					echo ' (';
						echo esc_html__(' - Page', 'composer' ) . ' ' . get_query_var( 'paged' );
					echo ')';
				}
			}

		echo '</ul>';

	}
}

/* WPML */
function composer_languages_list(){
	if( class_exists( 'SitePress' ) ){
	
		global $smof_data;

		$show_lang_sel = isset($smof_data['show_lang_sel'])? $smof_data['show_lang_sel'] : 'no';

		if( 'yes' === $show_lang_sel ){
			$lang_display_style = isset($smof_data['wpml_lang_style'])? $smof_data['wpml_lang_style'] : 'normal'; //normal, dropdown
			$lang_list_style = isset($smof_data['language_style'])? $smof_data['language_style'] : 'lang_code'; // lang_code (en / fr / ta), lang_name (english, tamil, french), flag, flag_with_name
			$skip_missing_lang = isset($smof_data['skip_missing_lang'])? $smof_data['skip_missing_lang'] : 'yes';

			if( 'yes' === $skip_missing_lang ) {
				$skip_missing_lang = '1';
			} else {
				$skip_missing_lang = '0';
			}

			$languages = icl_get_languages('skip_missing='.$skip_missing_lang.'&orderby=custom');

			$lang_count = count($languages);
			$count = 1;

			if(1 < $lang_count){
				$trans_status = esc_html__('translated', 'composer' );			
			}else{
				$trans_status = esc_html__('not-translated', 'composer' );
			}

			if(!empty($languages)){
				echo '<div id="lang-list" class="lang-'. $lang_display_style .' '. $lang_list_style .' '. $trans_status .'" >';
				if($lang_display_style == 'dropdown'){
						//Check If Drop-down Add Current
						if($lang_display_style == 'dropdown'){

							echo '<div id="lang-dropdown-btn">';
								foreach($languages as $l){
									if($l['active']){
										if($lang_list_style == 'lang_code'){
											echo esc_html( $l['language_code'] );
										}elseif ($lang_list_style == 'lang_name') {
											echo icl_disp_language( $l['native_name'], $l['translated_name'] );
										}elseif ($lang_list_style == 'flag') {
											if($l['country_flag_url']){
												echo '<img src="'. esc_url( $l['country_flag_url'] ) .'" height="12" alt="'. esc_attr( $l['language_code'] ).'" width="18" />';
											}
										}else{
											if($l['country_flag_url']){
												echo '<img src="'. esc_url( $l['country_flag_url'] ) .'" height="12" alt="'.esc_attr( $l['language_code'] ) .'" width="18" />';
												echo ' ' . icl_disp_language($l['native_name'], $l['translated_name']);
											}
										}
										break;
									}
								}
							if(1 < $lang_count){	
								echo '<span class="pixicon-arrow-angle-down"></span></div>';
							}
							else{
								echo '<span class="already-liked">'. esc_html__('Not Translated','composer' ) .'</span></div>';
							}
						}

					echo '<div class="lang-dropdown-inner">';
				}

				foreach($languages as $l){

					if($l['active']){
						$active_class = ' class="active"';
					}else{
						$active_class = '';
					}
					// lang_code(en / fr / ta)
					if($lang_list_style == 'lang_code'){

						echo '<a href="'.esc_url($l['url']).'"'. $active_class .'>';
						echo esc_html( $l['language_code'] );
						echo '</a>';

						if($count != $lang_count && $lang_display_style != 'dropdown'){
							echo '<span class="slash">/</span>';
						}

					}
					 // lang_name (english, tamil, french)
					elseif ($lang_list_style == 'lang_name') {

						echo '<a href="'.esc_url($l['url']).'"'. $active_class .'>';
						echo icl_disp_language($l['native_name'], $l['translated_name']);
						echo '</a>';

						if($count != $lang_count && $lang_display_style != 'dropdown'){
							echo '<span class="slash">/</span>';
						}
					}
					// display flag
					elseif ($lang_list_style == 'flag'){

						if($l['country_flag_url']){
							echo '<a href="'.esc_url($l['url']).'"'. $active_class .'>';
							echo '<img src="'.esc_url($l['country_flag_url']).'" height="12" alt="'. esc_attr( $l['language_code'] ) .'" width="18" />';
							echo '</a>';
						}
					}
					// flag with name
					elseif($lang_list_style == 'flag_with_name'){
						
						if($l['country_flag_url']){
							echo '<a href="'.esc_url($l['url']).'"'. $active_class .'>';
							echo '<img src="'.esc_url($l['country_flag_url']).'" height="12" alt="'. esc_attr( $l['language_code'] ) .'" width="18" />';
							echo ' ' . icl_disp_language($l['native_name'], $l['translated_name']);
							echo '</a>';
						}
				
					}
					$count++;
				}

				if($lang_display_style == 'dropdown'){
					echo '</div>';
				}
				echo '</div>';
			}
		}
	}
}	

function composer_get_page_title() {

	if( is_home() || is_archive() || is_search() || is_404() ) {
		$post_id = get_option('page_for_posts');
	} else {
		global $wp_query; 
		$post_id = ( 0 == get_the_ID() || NULL == get_the_ID() ) ? $wp_query->post->ID : get_the_ID();
	}

	if ( !is_single() && !is_page() && get_post_type() != 'post' && !composer_bbp_is_user_home() && !is_search() && !is_post_type_archive( 'tribe_events' ) && !composer_is_shop() && !is_404() ) {

		$post_type = get_post_type_object( get_post_type() );

		if ( isset($post_type->labels->singular_name ) ) {
			$page_title = esc_html( ucwords( $post_type->labels->singular_name ) );
		}
		else {
			$page_title = esc_html( get_the_title( $post_id ) );
		}

	}
	elseif( is_post_type_archive( 'tribe_events' ) ) {
		$page_title = composer_get_option_value( 'event_tribe_page_title', esc_html__( 'Calendar', 'composer' ) );
	}
	elseif( composer_bbp_is_user_home() ) {
		$page_title = esc_html( get_the_title( $post_id ) );
	}

	elseif ( is_home() ) {
		$page_title = composer_get_option_value( 'blog_page_title', esc_html__('Blog', 'composer' ) );
	}

	elseif ( is_category() ) {
		$page_title = esc_html__('Posts Categorized:', 'composer' ) . ' ' . single_cat_title( $prefix = '', $display = false );
	}

	elseif ( is_tag() ) { 
		$page_title = esc_html__('Posts Tagged:', 'composer' ) . ' ' . single_tag_title( $prefix = '', $display = false );
	}

	elseif ( is_author() ) { 
		global $post;
		$author_id = $post->post_author;

		$page_title = esc_html__('Posts By:', 'composer' ) . ' ' . get_the_author_meta('display_name', $author_id);

	}

	elseif ( is_day() ) { 
		$page_title = esc_html__('Daily Archives:', 'composer' ) . ' ' . get_the_time('l, F j, Y');
	}

	elseif ( is_month() ) {  
		$page_title = esc_html__('Monthly Archives:', 'composer' ) . ' ' . get_the_time('F Y');
	}

	elseif ( is_year() ) {  
		$page_title = esc_html__('Posts Categorized:', 'composer' ) . ' ' . get_the_time('Y');
	}

	elseif ( is_search() ) {  
		$page_title = esc_html__('Search Result: ', 'composer' ) .get_search_query();
	}

	elseif ( is_404() ) {  
		$page_title = esc_html__('404 Error', 'composer' );
	}

	elseif ( composer_is_shop() ) {  
		$page_title = composer_get_option_value( 'shop_title', esc_html__('Shop', 'composer' ) );
	}

	else {  
		$page_title = esc_html( get_the_title( $post_id ) );
	}

	return $page_title;
}

//Sidebar
if( !function_exists( 'composer_sidebar' ) ){

    function composer_sidebar( $sidebar_name , $default ){
        echo '<div id="aside" class="sidebar col-md-3">';
            if ( is_active_sidebar( $sidebar_name ) ){
                dynamic_sidebar( $sidebar_name );
            }
            elseif( $sidebar_name == 0 ){

                if ( is_active_sidebar( $default ) ){
                    dynamic_sidebar( $default );
                }
                else{
                    echo '<p class="sidebar-info">'. esc_html__('Please active sidebar widget or disable it from theme option.', 'composer' ).'</p>';
                }
            }
        echo '</div>';

    }
}

/*
 * Function: Feature Thumbnail
 * Version : 1.2
 */

if( ! function_exists( 'composer_featured_thumbnail' ) ) {

    function composer_featured_thumbnail( $width, $height, $only_src, $show_placeholder, $force_lazy_load_off ) {

        $lazy_load = composer_get_option_value( 'lazy_load', 1 );

        if( $force_lazy_load_off ) { // if it's turned on, it force the lazy load to turned off
            $lazy_load = 0;
        }

        $image_thumb_url = '';

        if( has_post_thumbnail() ){

            $image_id = get_post_thumbnail_id();

            $image_thumb_url = wp_get_attachment_image_src( $image_id, 'full' );
        }

        if( !is_int( $width ) ) {
            $width = 1920;
        } 

        if( !is_int( $height ) ) {
            $height = 1020;
        }

        $output = '';

        if( ! empty( $image_thumb_url ) ) {
            $img = aq_resize( $image_thumb_url[0], $width , $height, true, true );

            if( $only_src ) {
                if($img){
                    $output = $img;
                }
                else{
                	$url = get_the_post_thumbnail( get_the_ID(), 'full' );
                    $output = $image_thumb_url[0];
                }
            }
            else {

                $img_url = ( $img ) ? $img : $image_thumb_url[0];

                if( $img ) {
                    $img_url = $img;
                } else {
                    $img_url = $image_thumb_url[0];
                    $width = $image_thumb_url[1];
                    $height = $image_thumb_url[2];
                }

                if ( $lazy_load ) {
                    $placeholder = get_template_directory_uri(). '/_img/img-placeholder.png';
                    $output = '<img class="amz-lazy" src="'. esc_url( $placeholder ) .'" data-original="' . esc_url( $img_url ) . '">';
                } else {
                    
                    $output = '<img src="' . esc_url( $img_url ) . '" alt="">';
                }

            }
        }
        else if( empty( $image_thumb_url ) && $show_placeholder ) {
        	
            $placeholder = composer_get_option_value( 'placeholder', '' );

        	if( !empty( $placeholder ) ) {
        		$img_url = aq_resize( $placeholder, $width , $height, true, true );
        	}
        	else {
        		$protocol = is_ssl() ? 'https' : 'http';
				$img_url = $protocol.'://placehold.it/'.$width.'x'.$height;        		
        	}

            if( $only_src ) {
                $output = $img_url;
            }
            else {
                $output = '<img src="'.esc_url( $img_url ) .'" alt="">';
            }
        }

        return $output;                  

    }
}

/*
 * Function : Get Metabox value
 * Version  : 1.1
 * Required : SMOF Theme Option
 * Desc  : It's only for get values from metabox
 */
if(!function_exists('composer_get_meta_value')){

    function composer_get_meta_value( $id, $meta_key, $meta_default = '', $themeoption_key = '', $themeoption_default = '' ) {

    	$value = ( null != get_post_meta( $id, $meta_key, true ) ) ? get_post_meta( $id, $meta_key, true ) : $meta_default;

    	if( ( 'default' == $value || '' == $value ) && !empty( $themeoption_key ) ) {
    		$value = composer_get_option_value( $themeoption_key, $themeoption_default );
    	}

    	return $value;
    }
}



function composer_title_tag( $title_tag ){
	$title_tag_array = array( 'h1', 'h2', 'h3', 'h4', 'h5', 'h6' );

	if( in_array( $title_tag, $title_tag_array ) ) {
		return $title_tag;
	}
	else {
		return 'h2';
	}
}

//composer_shorten_text
function composer_shorten_text($text , $no_of__limit)
{
	$chars_limit = $no_of__limit;
	$chars_text = strlen($text);
	$text = $text." ";
	$text = substr($text,0,$chars_limit);
	$text = substr($text,0,strrpos($text,' '));
	if ($chars_text > $chars_limit)
	{

		$text = $text."...";

	}
	return $text;
}

/*
 * Function : Get Image Src from Media Object
 * Version  : 1.0
 * Required : Aqua Resize
 * Desc  : It's only for get image from metabox
 */

if( ! function_exists( 'composer_get_image_by_id' ) ) {

    function composer_get_image_by_id( $width, $height, $image_id, $only_src = true, $placeholder = false, $force_lazy_load_off = true ) {

    	//Lazy load
		global $smof_data;
    	$lazy_load = isset( $smof_data['lazy_load'] ) ? $smof_data['lazy_load'] : 1;

    	if( $force_lazy_load_off ) { // if it's turned on, it force the lazy load to turned off
    		$lazy_load = 0;
    	}

        $image_thumb_url = '';

        if( !empty( $image_id ) ) {

			$image_thumb_url = wp_get_attachment_image_src( $image_id, 'full' ); // full iamge URL
        }

        if( !is_int( $width ) ) {
            $width = 1920;
        } 

        if( !is_int( $height ) ) {
            $height = 1020;
        }

        $output = '';

        if( ! empty( $image_thumb_url ) ) {
            $img = aq_resize( $image_thumb_url[0], $width , $height, true, true );

            if( $only_src ) {
                if($img){
                    $output = $img;
                }
                else{
                    $output = $image_thumb_url[0];
                }
            }
            else {

            	$img_url = ( $img ) ? $img : $image_thumb_url[0];

            	if( $img ) {
            		$img_url = $img;
            	} else {
            		$img_url = $image_thumb_url[0];
            		$width = $image_thumb_url[1];
            		$height = $image_thumb_url[2];
            	}

            	if ( $lazy_load ) {
            		$placeholder = get_template_directory_uri(). '/_img/img-placeholder.png';
            		$output = '<img class="amz-lazy" src="'. $placeholder .'" data-original="' . esc_url( $img_url ) . '" >';
            	} else {
            		
                	$output = '<img src="' . esc_url( $img_url ) . '" alt="">';
            	}

            }
        }
        else if( empty( $image_thumb_url ) && $placeholder ) {

        	$placeholder = composer_get_option_value( 'placeholder', '' );

        	if( !empty( $placeholder ) ) {
        		$img_url = aq_resize( $placeholder, $width , $height, true, true );
        	}
        	else {
        		$protocol = is_ssl() ? 'https' : 'http';
				$img_url = $protocol.'://placehold.it/'.$width.'x'.$height;        		
        	}

            if( $only_src ) {
                $output = $img_url;
            }
            else {
                $output = '<img src="'.esc_url( $img_url ) .'" alt="">';
            }
        }

        return $output;                  

    }
}


//Get saved themeoption value
if(!function_exists('composer_get_option_value')){

	function composer_get_option_value( $key, $default, $replace_site_url = false ) {

		if( is_customize_preview() ) {		
			$value = get_theme_mod( $key, $default );
			return $replace_site_url ? 
					str_replace( '[site_url]', get_home_url(), $value ) : 
					$value;
			return $value;
		}

		global $smof_data;

		$value = isset($smof_data[$key]) ? $smof_data[$key] : $default;

		return $value;
	}

}

//Get saved dynamic css value
if( ! function_exists('composer_dynamic_css_option') ) {

	function composer_dynamic_css_option( $key, $default ) {

		$data = $GLOBALS["amz_option_data"];

		return isset( $data[$key] ) ? $data[$key] : $default;

	}

}

//Get saved themeoption array value
if(!function_exists('composer_get_option_array_value')){

	function composer_get_option_array_value($key1, $key2, $default) {

		global $smof_data;

		$value = isset($smof_data[$key1][$key2]) ? $smof_data[$key1][$key2] : $default;

		return $value;
	}
}

//Get saved themeoption array value
if(!function_exists('composer_get_prefix')){

	function composer_get_prefix() {

		if( is_singular( 'page' ) ) {
			$prefix = 'page_';
		}
		elseif ( is_singular( 'post' ) ) {
			$prefix = 'single_';
		}
		elseif( is_home() || is_front_page() ) {
			$prefix = 'blog_';
		}
		elseif ( is_archive() ) {
			$prefix = 'archives_';
		}
		elseif ( is_search() ) {
			$prefix = 'search_';
		}
		elseif ( is_singular('pix_portfolio') ) {
			$prefix = 'page_';
		}
		elseif ( is_404() ) {
			$prefix = '404_';
		}
		elseif ( composer_is_shop() ) {
			$prefix = 'shop_';
		}else {
			$prefix = 'page_';
		}

		return $prefix;
	}
}

if( !function_exists( 'composer_pagination' ) ) {

	// Return pagination style
    function composer_pagination( $args = array(), $values = array() ) {

        //Empty assignment
        $output = '';        

        // Set max number of pages
        if( !isset( $values['max'] ) ) {
	        if( $args == '' ) {
	            global $wp_query;
	            $max = $wp_query->max_num_pages;
	            if ( $max <= 1 )
	                return;
	        }
	        else {
	            // Assign and call query
	            $q = new WP_Query( $args );
	            $max = $q->max_num_pages;
	            if ( $max <= 1 )
	                return;
	        }

        	$values['max']   = $max;
	    }

        // Set page number
        if( !isset( $values['paged'] ) ) {
	        if( get_query_var( 'paged' ) ) {
	            $paged = get_query_var( 'paged' );
	        }
	        elseif( get_query_var( 'page' ) ) {
	            $paged = get_query_var( 'page' );
	        }
	        else {
	            $paged = 1;
	        }

	        $values['paged']   = $paged;
	    }

	    // Hide pagination if no more posts exists
	    if( 'load_more' == $values['style'] || 'autoload' == $values['style'] ) {
	    	if( $values['paged'] == $values['max'] ) return;
	    }

        // Add max number of pages to the values array
        $values['prefix'] = composer_get_prefix();

        if( 'load_more' == $values['style'] ) {

            $output .= "<div id='load-more-btn' class='load-more-btn'>
                <a href='#' data-paged='". esc_attr( $values['paged'] ) ."' data-args='". json_encode( $args ) ."' data-values='". json_encode( $values ) ."'>". esc_html( $values['loadmore_text'] ) ."</a>
                <span class='hide loaded-msg'>". esc_html( $values['allpost_loaded_text'] ) ."</span>
                <div class='spinner' style='display: none;'>
                    <div class='spinner-inner'>
                        <div class='double-bounce1'></div>
                        <div class='double-bounce2'></div>
                    </div>
                </div>
            </div>";

        }
        elseif( 'autoload' == $values['style'] ) {
            $output .= "<div id='load-more-btn' class='load-more-btn amz-autoload'>
                <a href='#' data-paged='". esc_attr( $values['paged'] ) ."' data-args='". json_encode( $args ) ."' data-values='". json_encode( $values ) ."'>". esc_html( $values['loadmore_text'] ) ."</a>
                <span class='hide loaded-msg'>". esc_html( $values['allpost_loaded_text'] ) ."</span>
                <div class='spinner' style='display: none;'>
                    <div class='spinner-inner'>
                        <div class='double-bounce1'></div>
                        <div class='double-bounce2'></div>
                    </div>
                </div>
            </div>";
        }
        elseif( 'number' == $values['style']  ) {

            $bignum = 999999999; 

            $base = str_replace( $bignum, '%#%', esc_url( get_pagenum_link($bignum) ) );
        
            $pagination = paginate_links( array(
                'base'         => $base,
                'format'       => '',
                'current'      => max( 1, $values['paged'] ),
                'total'        => $values['max'],
                'prev_text'    => '&larr;',
                'next_text'    => '&rarr;',
                'type'         => 'list',
                'end_size'     => 3,
                'mid_size'     => 3
            ) );

            $output .= '<nav class="pagination clearfix">';
                $output .= $pagination;
            $output .= '</nav>';

        }
        elseif( 'text' == $values['style']  ) {
            if( get_next_posts_link() || get_previous_posts_link() ) {
                $output .= '<nav class="wp-prev-next ">
                    <ul class="clearfix">';
                    if( get_next_posts_link() ) {
                        $output .= '<li class="prev-link">'.get_next_posts_link( __( '&laquo; Older Entries', 'composer' )).'</li>';
                    }
                    if( get_previous_posts_link() ) {
                        $output .= '<li class="next-link">'.get_previous_posts_link( __( 'Newer Entries &raquo;', 'composer' )).'</li>';
                    }
                    $output .= '</ul>
                </nav>';
            }
        }

        return $output;
    }
}

function composer_bbp_is_user_home() {
	if ( function_exists('is_bbpress') ){
		return bbp_is_user_home();
	} else {
		return false;
	}
}


function composer_is_shop () {
	if ( function_exists('is_shop') ){
		return is_shop();
	} else {
		return false;
	}
}

function composer_is_single_shop () {
	if ( function_exists('is_product') ){
		return is_product();
	} else {
		return false;
	}
}

function composer_is_product_category () {
	if ( function_exists('is_product_category') ){
		return is_product_category();
	} else {
		return false;
	}
}

function composer_is_product_tag () {
	if ( function_exists('is_product_tag') ){
		return is_product_tag();
	} else {
		return false;
	}
}

function composer_is_product() {
	if ( function_exists('is_product') ){
		return is_product();
	} else {
		return false;
	}
}

/* returns class if vc_row exsist in content or vc disabled */
function composer_check_vc_active() {
	global $post;

	if( ! defined('WPB_VC_VERSION') || ( $post && ! preg_match( '/vc_row/', $post->post_content ) ) ) {
		return ' container no-vc-active';
	} else {
		return '';
	}

}

function composer_get_registered_sidebars( $hide_sidebars = array() ) {
	global $wp_registered_sidebars;
	
	$sidebars = $wp_registered_sidebars;
	$new_sidebars = array( '0' => esc_attr__( 'Default', 'composer' ) );

	//foreach ($value['options'] as $select_ID => $option) {
	foreach ( $sidebars as $sidebar ) {

		if ( ! in_array( $sidebar['id'], $hide_sidebars ) ) {
			$new_sidebars[$sidebar['id']] = $sidebar['name'];
		}
		
	}

	return $new_sidebars;
}
