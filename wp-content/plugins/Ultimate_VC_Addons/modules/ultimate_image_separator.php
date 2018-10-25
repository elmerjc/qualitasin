<?php
/*
* Add-on Name: Image Separator
*/
if(!class_exists('Ultimate_Image_Separator'))
{
	class Ultimate_Image_Separator{
		function __construct(){
			if ( Ultimate_VC_Addons::$uavc_editor_enable ) {
				add_action('init',array($this,'ultimate_img_separator_init'));
			}
			add_shortcode('ultimate_img_separator',array($this,'ultimate_img_separator_shortcode'));
			add_action('wp_enqueue_scripts', array($this, 'register_easy_separator_assets'),1);
		}
		function register_easy_separator_assets()
		{
			Ultimate_VC_Addons::ultimate_register_style( 'ult-easy-separator-style', 'image-separator' );
			
			Ultimate_VC_Addons::ultimate_register_script( 'ult-easy-separator-script', 'image-separator', false, array( 'jquery' ), ULTIMATE_VERSION, false );
		}
		function ultimate_img_separator_init(){
			if(function_exists('vc_map'))
			{
				vc_map(
					array(
					   "name" => __("Image Separator","ultimate_vc"),
					   "base" => "ultimate_img_separator",
					   "class" => "vc_img_separator_icon",
					   "icon" => "vc_icon_img_separator",
					   "category" => "Ultimate VC Addons",
					   "description" => __("Add image as row seperator","ultimate_vc"),
					   "params" => array(
							array(
								'type' => 'ult_img_single',
								'heading' => __('Image','ultimate_vc'),
								'param_name' => 'img_separator',
							),
							array(
								"type" => "animator",
								"class" => "",
								"heading" => __("Animation","ultimate_vc"),
								"param_name" => "animation",
								"value" => "",
								"group" => "Animation"
								//"description" => __("","smile"),
						  	),
							array(
								"type" => "number",
								"class" => "",
								"heading" => __("Animation Duration","ultimate_vc"),
								"param_name" => "animation_duration",
								"value" => 3,
								"min" => 1,
								"max" => 100,
								"suffix" => "s",
								"description" => __("How long the animation effect should last. Decides the speed of effect.","ultimate_vc"),
								"group" => "Animation",

						  	),
							array(
								"type" => "number",
								"class" => "",
								"heading" => __("Animation Delay","ultimate_vc"),
								"param_name" => "animation_delay",
								"value" => 0,
								"min" => 1,
								"max" => 100,
								"suffix" => "s",
								"description" => __("Delays the animation effect for seconds you enter above.","ultimate_vc"),
								"group" => "Animation"
						  	),
							array(
								"type" => "number",
								"class" => "",
								"heading" => __("Animation Repeat Count","ultimate_vc"),
								"param_name" => "animation_iteration_count",
								"value" => 1,
								"min" => 0,
								"max" => 100,
								"suffix" => "",
								"description" => __("The animation effect will repeat to the count you enter above. Enter 0 if you want to repeat it infinitely.","ultimate_vc"),
								"group" => "Animation"
						  	),
							array(
								"type" => "number",
								"class" => "",
								"heading" => __("Viewport Position", "ultimate_vc"),
								"param_name" => "opacity_start_effect",
								"suffix" => "%",
								//"admin_label" => true,
								"value" => "90",
								"description" => __("The area of screen from top where animation effects will start working.", "ultimate_vc"),
								"group" => "Animation"
							),

							array(
								'type' => 'ultimate_responsive',
								'heading' => __('Image Size (px)','ultimate_vc'),
								'unit'  => 'px',                                  // use '%' or 'px'
								'media' => array(
									'Desktop'           => '',                  // Here '28' is default value set for 'Desktop'
									'Tablet'           => '',
									'Tablet Portrait'   => '',
									'Mobile Landscape'  => '',
									'Mobile'            => '',
								),
								'param_name' => 'img_separator_width'
							),
							array(
								'type' => 'dropdown',
								'heading' => __('Image Position','ultimate_vc'),
								'param_name' => 'img_separator_position',
								'value' => array(
									__('Top','ultimate_vc') => 'ult-top-easy-separator',
									__('Bottom','ultimate_vc') => 'ult-bottom-easy-separator',
								)
							),
							array(
								'type' => 'number',
								'heading' => __('Gutter','ultimate_vc'),
								'param_name' => 'img_separator_gutter',
								'suffix' => '%',
								'description' => __('50% is default. Increase to push the image outside or decrease to pull the image inside.','ultimate_vc')
							),
							array(
								"type" => "vc_link",
								"heading" => __("Link ","ultimate_vc"),
								"param_name" => "sep_link",
								"value" => "",
								"description" => __("Add a custom link or select existing page. You can remove existing link as well.","ultimate_vc")
							),
						),
					)
				);
			}
		}
		// Shortcode handler function for stats banner
		function ultimate_img_separator_shortcode($atts, $content)
		{
			$output = $wrapper_class = $custom_position = $opacity_start_effect_data = $animation_style = $animation_el_class = $animation_data = $href = $url = $link_title = $target = $target = $link_title  = $rel = '';
			$is_animation = false;
			extract(shortcode_atts( array(
				'img_separator' => '',
				'animation' => '',
				'img_separator_width' => '',
				'img_separator_position' => 'ult-top-easy-separator',
				'img_separator_gutter' => '',
				'opacity' => 'set',
				'opacity_start_effect' => '',
				'animation_duration' => '',
				'animation_delay' => '',
				'animation_iteration_count' => '',
				'sep_link' => ''
			),$atts));

			$ultimate_custom_vc_row = get_option('ultimate_custom_vc_row');
			if($ultimate_custom_vc_row == '')
				$ultimate_custom_vc_row = 'wpb_row';

			$img = apply_filters('ult_get_img_single', $img_separator, 'url');
			$alt = apply_filters('ult_get_img_single', $img_separator, 'alt');

			$id = 'ult-easy-separator-'.uniqid(rand());

			if( $sep_link !='' ){
				$href 		= 	vc_build_link($sep_link);

				$url 			= ( isset( $href['url'] ) && $href['url'] !== '' ) ? $href['url']  : '';
				$target 		= ( isset( $href['target'] ) && $href['target'] !== '' ) ? "target='" . esc_attr(trim( $href['target'] )) . "'" : '';
				$link_title 	= ( isset( $href['title'] ) && $href['title'] !== '' ) ? "title='".esc_attr($href['title'])."'" : '';
				$rel 			= ( isset( $href['rel'] ) && $href['rel'] !== '' ) ? "rel='".esc_attr($href['rel'])."'" : '';
			}

			$args = array(
				'target'      =>  '#'.$id,  // set targeted element e.g. unique class/id etc.
				'media_sizes' => array(
				   'width' => $img_separator_width
				),
			);
			$data_list = get_ultimate_vc_responsive_media_css($args);

			$trans = '-50%';
			if ( is_rtl() ) {
				$trans = '50%';
			}

			if($img_separator_gutter != '')
			{
				$wrapper_class = 'ult-easy-separator-no-default';
				if($img_separator_position == 'ult-top-easy-separator')
				{
					$img_separator_gutter = '-'.$img_separator_gutter;
					//$custom_position = 'top:'.$img_separator_gutter.'%;';
					$custom_position .= 'transform: translate('. $trans .','.$img_separator_gutter.'%)!important;';
					$custom_position .= '-ms-transform: translate('. $trans .','.$img_separator_gutter.'%)!important;';
					$custom_position .= '-webkit-transform: translate('. $trans .','.$img_separator_gutter.'%)!important;';

				}
				else if($img_separator_position == 'ult-bottom-easy-separator')
				{
					//$custom_position = 'bottom:'.$img_separator_gutter.'%;';
					$custom_position .= 'transform: translate('. $trans .','.$img_separator_gutter.'%)!important;';
					$custom_position .= '-ms-transform: translate('. $trans .','.$img_separator_gutter.'%)!important;';
					$custom_position .= '-webkit-transform: translate('. $trans .','.$img_separator_gutter.'%)!important;';
				}
			}

			$animation_style .= 'opacity:0;';
			if( strtolower($animation) !== strtolower('No Animation')) {
				$is_animation = true;
				$inifinite_arr = array("InfiniteRotate", "InfiniteDangle","InfiniteSwing","InfinitePulse","InfiniteHorizontalShake","InfiniteBounce","InfiniteFlash","InfiniteTADA");
				if($animation_iteration_count == 0 || in_array($animation,$inifinite_arr)){
					$animation_iteration_count = 'infinite';
					$animation = 'infinite '.$animation;
				}
				if($opacity == "set"){
					$animation_el_class .= ' ult-animation ult-animate-viewport ';
					$opacity_start_effect_data = 'data-opacity_start_effect="'.esc_attr($opacity_start_effect).'"';
				}
				$animation_data .= ' data-animate="'.esc_attr($animation).'" ';
				$animation_data .= ' data-animation-delay="'.esc_attr($animation_delay).'" ';
				$animation_data .= ' data-animation-duration="'.esc_attr($animation_duration).'" ';
				$animation_data .= ' data-animation-iteration="'.esc_attr($animation_iteration_count).'" ';
			}
			else
				$animation_el_class .= 'ult-no-animation';

			$output = '<div id="'.esc_attr($id).'" class="ult-easy-separator-wrapper ult-responsive '.esc_attr($img_separator_position).' '.esc_attr($wrapper_class).'" style="'.esc_attr($custom_position).'" data-vc-row="'.esc_attr($ultimate_custom_vc_row).'" '.$data_list.'>';
				$output .= '<div class="ult-easy-separator-inner-wrapper">';
					$output .= '<div class="'.esc_attr($animation_el_class).'" style="'.esc_attr($animation_style).'"  '.$animation_data.' '.$opacity_start_effect_data.'>';
						$output .= '<img class="ult-easy-separator-img" alt="'.esc_attr($alt).'" src="'.esc_url(apply_filters('ultimate_images', $img)).'" />';
						if($url != '') {
							$output .= '<a href="'.esc_attr($url).'" '.$target.' '. $link_title .' '. $rel .'></a>';
						}
					$output .= '</div>';
				$output .= '</div>';
			$output .= '</div>';

			return $output;
		}
	}
}
if(class_exists('Ultimate_Image_Separator'))
{
	$Ultimate_Image_Separator = new Ultimate_Image_Separator;
}

?>