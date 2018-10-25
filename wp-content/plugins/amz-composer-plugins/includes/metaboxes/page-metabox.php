<?php

	//Preloader Animation Style
	$page_transition = array( "default" => "Default", "fadeIn" => "Fade In", "fadeInUp" => "Fade In Up", "fadeInDown" => "Fade In Down", "fadeInLeft" => "Fade In Left", "fadeInRight" => "Fade In Right", "zoomIn" => "Zoom In", "zoomInUp" => "Zoom In Up", "zoomInDown" => "Zoom In Down", "zoomInLeft" => "Zoom In Left", "zoomInRight" => "Zoom In Right");

	//Demo Purpose
	$menus = get_terms( 'nav_menu', array( 'hide_empty' => false ) );
	$menu_list = array();
	$menu_list[] = 'Default';
	foreach ( $menus as $key => $slug ) {
		$menu_list[$slug->slug] = $slug->name;
	}

	

	$amz_prefix = '_amz_';

	$page_metabox = array(
		'metabox'	=> array( 
			'id'         => 'page',
			'title'      => __( 'Page Options', 'amz-composer-plugins' ),
			'post_type'  => 'page',
			'context'    => 'normal',
			'priority'   => 'low',
			'tabs' 		 => true,
		),
		'fields'     => array(

			array(
				'title' => esc_html__('General', 'amz-composer-plugins'),
				'icon'  => 'icon-name',
				'type'  => 'heading'
			),

			array(
				'id'           => $amz_prefix . 'demo_logo',
				'title'        => esc_html__('Logo', 'amz-composer-plugins'),
				'description'  => esc_html__('Choose logo for this page.', 'amz-composer-plugins'),
				'option'       => 'image', // image, audio, video
				'multi_select' => false, // true, false
				'type'         => 'media_manager'
			),

			array(
				'id'           => $amz_prefix . 'demo_light_logo',
				'title'        => esc_html__('Light Logo', 'amz-composer-plugins'),
				'description'  => esc_html__('Choose light logo for this page.', 'amz-composer-plugins'),
				'option'       => 'image', // image, audio, video
				'multi_select' => false, // true, false
				'type'         => 'media_manager'
			),

			array( 	
				'id'		  => $amz_prefix . 'boxed_content',
				'title'		  => esc_html__('Wide &amp; Boxed &amp; Frame Layout', 'amz-composer-plugins' ),
				'description' => esc_html__('Choose Wide &amp; Boxed &amp; Frame Layout. Boxed = max header width is 1200px; Wide = header covers the viewport. Frame = White space around the edges.', 'amz-composer-plugins' ),
				'std'		  => 'default',
				'type' 		  => 'switch',
				'options' 	  => array(
					'default' => 'Default',
					'wide'	  => 'Wide',
					'boxed'	  => 'Boxed',
					'frame'	  => 'Frame'
					),
			),

			array(
				'id'          => $amz_prefix . 'main_navigation',
				'title'       => esc_html__('Main Navigation', 'amz-composer-plugins'),
				'description' => esc_html__('Select main navigation for this page', 'amz-composer-plugins'),
				'std'         => 'default',
				'options'     => $menu_list,
				'type' 	      => 'select'
			),

			array(
				'id'          => $amz_prefix . 'mobile_navigation',
				'title'       => esc_html__('Mobile Navigation', 'amz-composer-plugins'),
				'description' => esc_html__('Select mobile navigation for this page', 'amz-composer-plugins'),
				'std'         => 'default',
				'options'     => $menu_list,
				'type' 	      => 'select'
			),

			array(
				'id'          => $amz_prefix . 'left_navigation',
				'title'       => esc_html__('Left Header Menu', 'amz-composer-plugins'),
				'description' => esc_html__('Select left navigation for this page', 'amz-composer-plugins'),
				'std'         => 'default',
				'options' 	  => $menu_list,
				'type' 		  => 'select'
			),

			array(
				'id'          => $amz_prefix . 'right_navigation',
				'title'       => esc_html__('Right Header Menu', 'amz-composer-plugins'),
				'description' => esc_html__('Select right navigation for this page', 'amz-composer-plugins'),
				'std'         => 'default',
				'options' 	  => $menu_list,
				'type' 		  => 'select'
			),

			array(
				'id'          => $amz_prefix . 'left_side_navigation',
				'title'       => esc_html__('Left Side Navigation for left nav layout ( Not Header Menu )', 'amz-composer-plugins'),
				'description' => esc_html__('If you choose left nav layout. Then you choose menu from here.', 'amz-composer-plugins'),
				'std'         => 'default',
				'options' 	  => $menu_list,
				'type' 		  => 'select'
			),

			array(
				'id'          => $amz_prefix . 'right_side_navigation',
				'title'       => esc_html__('Right Side Navigation', 'amz-composer-plugins'),
				'description' => esc_html__('Select right side navigation for this page', 'amz-composer-plugins'),
				'std'         => 'default',
				'options' 	  => $menu_list,
				'type' 		  => 'select'
			),

			array(
				'id'          => $amz_prefix . 'body_bgcolor',
				'title'       => esc_html__('Body Background Color', 'amz-composer-plugins'),
				'description' => esc_html__('You can choose body background color here. Leave it empty to apply defaults', 'amz-composer-plugins'),
				'std'         => '',
				'type'        => 'colorpicker'
			),

			array(
				'id'          => $amz_prefix . 'footer',
				'title'       => esc_html__('Show/Hide Footer', 'amz-composer-plugins'),
				'description' => esc_html__('Do you want to display footer?', 'amz-composer-plugins'),
				'std'         => 'show',
				'options' 	  => array(
					'show' 	  => 'Show',
					'hide' 	  => 'Hide'
					),
				'type' 		  => 'switch'
			),

			array(
				'id'          => $amz_prefix.'slider_shortcode',
				'title'       => esc_html__( 'Slider Shortcode', 'amz-composer-plugins' ),
				'description' => esc_html__( 'Enter Slider Shortcode here. This will display above the header.', 'amz-composer-plugins' ),
				'placeholder' => '[rev slidename]',
				'type'        => 'text',
			),

			array(
				'title' => esc_html__('Layout', 'amz-composer-plugins'),
				'icon'  => 'icon-name',
				'type'  => 'heading'
			),

			array(
				'id'           => $amz_prefix . 'layout',
				'title' 	   => esc_html__('Page Layout', 'amz-composer-plugins'),
				'description'  => esc_html__('Choose page layout', 'amz-composer-plugins'),
				'std' 		   => 'default',
				'options'	   => array(
					'default'       => 'full_width.png',
					'left-sidebar'  => 'left_sidebar.png',	
					'right-sidebar' => 'right_sidebar.png',					
					'left-nav'      => 'left_nav.png',
					'right-nav'     => 'right_nav.png',
				),
				'type' 		   => 'image_select'
			),

			array(
				'id'           => $amz_prefix . 'sidebar',
				'title'        => esc_html__('Select Sidebar', 'amz-composer-plugins'),
				'description'  => esc_html__('Select Sidebar For this page.', 'amz-composer-plugins'),
				'hide_sidebar' => array('footer-widget-1', 'footer-widget-2'),
				'type'         => 'select_sidebar',
			),

			array(
				'title' => esc_html__('Header', 'amz-composer-plugins'),
				'icon'  => 'icon-name',
				'type'  => 'heading'
			),

			array(
				'id'          => $amz_prefix . 'header_hide',
				'title'       => esc_html__('Show/Hide Header', 'amz-composer-plugins'),
				'description' => esc_html__('Show / Hide Header', 'amz-composer-plugins'),
				'std'         => 'default',
				'options' 	  => array(
					'default' 	  => 'Default',
					'show' 	  => 'Show',
					'hide' 	  => 'Hide'
					),
				'type' 		  => 'switch',
				'class' => 'header', // class name for this meta field
			),

			array(
				'id'           => $amz_prefix . 'header_layout',
				'title' 	   => esc_html__('Header Layout', 'amz-composer-plugins'),
				'description'  => esc_html__('Choose header layout', 'amz-composer-plugins'),
				'std' 		   => 'default',
				'options'	   => array(
					'default'  => 'default.png',
					'header-1' => 'header-layout/header1.png',
					'header-2' => 'header-layout/header2.png',
					'header-3' => 'header-layout/header3.png',
					'header-4' => 'header-layout/header4.png',
					'header-5' => 'header-layout/header5.png',
					'header-6' => 'header-layout/header6.png',
					'header-7' => 'header-layout/header7.png',
					'header-8' => 'header-layout/header8.png',
					'header-9' => 'header-layout/header9.png',
					'header-10' => 'header-layout/header10.png',
					'left-header' => 'header-layout/header11.png',
					'right-header' => 'header-layout/header12.png'
				),
				'type' 		   => 'image_select',
				'class' => 'header', // class name for this meta field
			),

			array(
				'id'           => $amz_prefix . 'header_hover_layout',
				'title' 	   => esc_html__('Header Hover Layout', 'amz-composer-plugins'),
				'description'  => esc_html__('Choose header hover layout', 'amz-composer-plugins'),
				'std' 		   => 'default',
				'options'	   => array(
					'default'                             => 'default.png',
					'drive-nav'                           => 'menu/drive-nav.png',
					'nav-border'                          => 'menu/nav-border.png',
					'nav-double-border'                   => 'menu/nav-double-border.png',
					'right-arrow'                         => 'menu/right-arrow.png',
					'right-arrow cross-arrow'             => 'menu/cross-arrow.png',
					'background-nav'                      => 'menu/background-nav.png',
					'background-nav background-nav-round' => 'menu/background-nav-round.png',
					'solid-color-bg'                      => 'menu/solid-color-bg.png',
					'square-left-right'                   => 'menu/square-left-right.png'	
				),
				'type' 		   => 'image_select',
				'class' => 'header', // class name for this meta field
			),

			array(
				'id'          => $amz_prefix . 'header_width',
				'title'       => esc_html__('Header Width Style.', 'amz-composer-plugins'),
				'description' => esc_html__('Choose Header Width Style. Boxed = max header width is 1200px; Wide = header covers the viewport.', 'amz-composer-plugins'),
				'std'         => 'default',
				'options' 	  => array(
					'default' 	=> 'Default',
					'wide' 		=> 'Wide',
					'boxed' 	=> 'Boxed'
					),
				'type' 		  => 'switch'
			),

			array(
				'id'          => $amz_prefix . 'header_background_style',
				'title'       => esc_html__('Header Background Style', 'amz-composer-plugins'),
				'description' => esc_html__('Choose the Header Background Style', 'amz-composer-plugins'),
				'std'         => 'default',
				'options' 	  => array(
					'default' 	  => 'Default',
					'light' 	  => 'Light',
					'dark' 	  => 'Dark'
					),
				'type' 		  => 'switch',
				'class' => 'header', // class name for this meta field
			),

			array(
				'id'          => $amz_prefix . 'header_line',
				'title'       => esc_html__('Show Header border?', 'amz-composer-plugins'),
				'description' => esc_html__('Show/Hide Header border', 'amz-composer-plugins'),
				'std'         => 'default',
				'options' 	  => array(
					'default' 	  => 'Default',
					'yes' 	  => 'Yes',
					'no' 	  => 'No'
					),
				'type' 		  => 'switch',
				'class' => 'header', // class name for this meta field
			),

			array(
				'id'          => $amz_prefix . 'transparent_header',
				'title'       => esc_html__('Transparent Header', 'amz-composer-plugins'),
				'description' => esc_html__('Do you want to enable the transparent header?', 'amz-composer-plugins'),
				'std'         => 'default',
				'options' 	  => array(
					'default' 	  => 'Default',
					'show' 	  => 'Show',
					'hide' 	  => 'Hide'
					),
				'type' 		  => 'switch',
				'folds'		  => 1,
				'class' => 'header', // class name for this meta field
			),

			array(
				'id' => $amz_prefix . 'transparent_header_opacity',
				'title' => esc_html__('Transparent Header Opacity', 'amz-composer-plugins'),
				'description' => esc_html__('Type the alpha value. Eg: 0 to 90', 'amz-composer-plugins'),
				//'desc_tip' => 'Description tip',
				'placeholder' => '',
				'std'	=> '',
				'type' => 'text',
				'fold'         => array ( $amz_prefix . 'transparent_header' => array('show')),
				'class' => 'header', // class name for this meta field
			),

			array(
				'id'          => $amz_prefix . 'top_header',
				'title'       => esc_html__('Top Header', 'amz-composer-plugins'),
				'description' => esc_html__('Do you want to show the top header?', 'amz-composer-plugins'),
				'std'         => 'default',
				'options' 	  => array(
					'default' 	  => 'Default',
					'show' 	  => 'Show',
					'hide'  => 'Hide'
					),
				'type' 		  => 'switch',
				'folds'		  => 1,
				'class' => 'header', // class name for this meta field
			),

			array(
				'id'          => $amz_prefix . 'top_header_position',
				'title'       => esc_html__('Top Header Position', 'amz-composer-plugins'),
				'description' => esc_html__('Select the position of the top header', 'amz-composer-plugins'),
				'std'         => 'default',
				'options' 	  => array(
					'default' 	  => 'Default',
					'top' 	  => 'Top',
					'bottom'  => 'Bottom'
					),
				'type' 		  => 'switch',
				'fold'         => array ( $amz_prefix . 'top_header' => array('show')),
				'class' => 'header', // class name for this meta field
			),

			array(
				'id'          => $amz_prefix . 'top_section_style',
				'title'       => esc_html__('Top Section Style', 'amz-composer-plugins'),
				'description' => esc_html__('Choose the Top Section Style', 'amz-composer-plugins'),
				'std'         => 'default',
				'options' 	  => array(
					'default' 	  => 'Default',
					'light' 	  => 'Light',
					'dark' 	  => 'Dark'
					),
				'type' 		  => 'switch',
				'class' => 'header', // class name for this meta field
			),

			array(
				'id'          => $amz_prefix . 'display_menu',
				'title'       => esc_html__('Show/Hide Main Menu', 'amz-composer-plugins'),
				'description' => esc_html__('Show / Hide Main Menu', 'amz-composer-plugins'),
				'std'         => 'default',
				'options' 	  => array(
					'default' 	  => 'Default',
					'show' 	  => 'Show',
					'hide' 	  => 'Hide'
					),
				'type' 		  => 'switch',
				'class' => 'header', // class name for this meta field
			),

			array(
				'title' => esc_html__('Title Bar', 'amz-composer-plugins'),
				'icon'  => 'icon-name',
				'type'  => 'heading'
			),

			array(
				'id'          => $amz_prefix . 'title_bar',
				'title'       => esc_html__('Title bar', 'amz-composer-plugins'),
				'description' => esc_html__('Show / Hide Title bar in this page', 'amz-composer-plugins'),
				'std'         => 'default',
				'options' 	  => array(
					'default' 	  => 'Default',
					'show' 	  => 'Show',
					'hide' 	  => 'Hide'
					),
				'type' 		  => 'switch',
				'folds'		  => 1
			),

			array(
				'id'          => $amz_prefix . 'breadcrumbs',
				'title'       => esc_html__('Breadcrumbs', 'amz-composer-plugins'),
				'description' => esc_html__('Show / Hide breadcrumbs in Title bar', 'amz-composer-plugins'),
				'std'         => 'default',
				'options' 	  => array(
					'default' 	  => 'Default',
					'show' 	  => 'Show',
					'hide' 	  => 'Hide'
					),
				'type' 		  => 'switch',
				'fold'		  => array ( $amz_prefix . 'title_bar' => array('show')),
			),

			array(
				'id'          => $amz_prefix . 'title_bar_size',
				'title'       => esc_html__('Title bar Size', 'amz-composer-plugins'),
				'description' => esc_html__('Choose title bar size', 'amz-composer-plugins'),
				'std'         => 'default',
				'options' 	  => array(
					'default' 	  => 'Default',
					'small'   => 'Small',
					'medium'  => 'Medium',
					'large'   => 'Large',
					),
				'type' 		  => 'switch'
			),

			array(
				'id'          => $amz_prefix . 'title_bar_style',
				'title'       => esc_html__('Title Bar Style', 'amz-composer-plugins'),
				'description' => esc_html__('Choose title bar style', 'amz-composer-plugins'),
				'std'         => 'default',
				'options' 	  => array(
					'default'   => 'Default',
					'custom'  => 'Custom'
					),
				'type' 		  => 'switch',
				'folds'		  => 1,
			),

			array(
				'id'          => $amz_prefix . 'title_bar_bg_color',
				'title'       => esc_html__('Title Bar Background Color', 'amz-composer-plugins'),
				'description' => esc_html__('Choose Title bar background color. Leave it empty apply default', 'amz-composer-plugins'),
				'std'         => '',
				'type'        => 'colorpicker',
				'fold'		  => array ( $amz_prefix . 'title_bar_style' => array('custom')),
			),

			array(
				'id'           => $amz_prefix . 'title_bar_bg_image',
				'title'        => esc_html__('Title Bar Background Image', 'amz-composer-plugins'),
				'description'  => esc_html__('Choose Title bar background image. Leave it empty apply default from themeoption', 'amz-composer-plugins'),
				'option'       => 'image', // image, audio, video
				'multi_select' => false, // true, false
				'type'         => 'media_manager',
				'fold'		   => array ( $amz_prefix . 'title_bar_style' => array('custom')),
			),

			array(
				'id' => $amz_prefix . 'title_bar_overlay',
				'title' => esc_html__('Title Bar Overlay Style', 'amz-composer-plugins'),
				'description' => esc_html__('Choose the title bar background style', 'amz-composer-plugins'),
				//'desc_tip' => 'Description tip',
				//'placeholder' => 'Item placeholder here',
				'std'	=> 'default',
				'options' => array(
					'default' 	  => 'Default',
					'gradient' => 'Gradient',
					'color' => 'Color'
					),
				'type' => 'switch',
				'folds'		  => 1,
				'class' => 'title-bar', // class name for this meta field
			),

			array(
				'id' => $amz_prefix . 'title_bar_overlay_color',
				'title' => esc_html__('Select Overlay Color', 'amz-composer-plugins'),
				'description' => esc_html__('Select the overlay color value', 'amz-composer-plugins'),
				//'desc_tip' => 'Description tip',
				//'placeholder' => 'Item placeholder here',
				'std'	=> '',
				'type' => 'colorpicker',
				'fold'         => array ( $amz_prefix . 'title_bar_overlay' => array('color')),
				'class' => 'title-bar', // class name for this meta field
			),

			array(
				'id' => $amz_prefix . 'title_bar_gradient_top_value',
				'title' => esc_html__('Gradient Top Value', 'amz-composer-plugins'),
				'description' => esc_html__('Select the gradient top value', 'amz-composer-plugins'),
				//'desc_tip' => 'Description tip',
				//'placeholder' => 'Item placeholder here',
				'std'	=> '',
				'type' => 'colorpicker',
				'fold'         => array ( $amz_prefix . 'title_bar_overlay' => array('gradient')),
				'class' => 'title-bar', // class name for this meta field
			),

			array(
				'id' => $amz_prefix . 'title_bar_gradient_middle_value',
				'title' => esc_html__('Gradient Middle Value', 'amz-composer-plugins'),
				'description' => esc_html__('Select the gradient middle value', 'amz-composer-plugins'),
				//'desc_tip' => 'Description tip',
				//'placeholder' => 'Item placeholder here',
				'std'	=> '',
				'type' => 'colorpicker',
				'fold'         => array ( $amz_prefix . 'title_bar_overlay' => array('gradient')),
				'class' => 'title-bar', // class name for this meta field
			),

			array(
				'id' => $amz_prefix . 'title_bar_gradient_bottom_value',
				'title' => esc_html__('Gradient Bottom Value', 'amz-composer-plugins'),
				'description' => esc_html__('Select the gradient bottom value', 'amz-composer-plugins'),
				//'desc_tip' => 'Description tip',
				//'placeholder' => 'Item placeholder here',
				'std'	=> '',
				'type' => 'colorpicker',
				'fold'         => array ( $amz_prefix . 'title_bar_overlay' => array('gradient')),
				'class' => 'title-bar', // class name for this meta field
			),

			array(
				'id' => $amz_prefix . 'title_bar_gradient_opacity',
				'title' => esc_html__('Opacity', 'amz-composer-plugins'),
				'description' => esc_html__('Type the alpha value. Eg: 0.1 to 1.0. If you want to use the value from theme option type "default"', 'amz-composer-plugins'),
				//'desc_tip' => 'Description tip',
				'placeholder' => '',
				'std'	=> '0.9',
				'type' => 'text',
				'fold'         => array ( $amz_prefix . 'title_bar_overlay' => array('gradient','color')),
				'class' => 'title-bar', // class name for this meta field
			),

			array(
				'id'          => $amz_prefix . 'title_bar_text_color',
				'title'       => esc_html__('Title Bar text Color', 'amz-composer-plugins'),
				'description' => esc_html__('Choose Title bar text color. Leave it empty apply default', 'amz-composer-plugins'),
				'std'         => '',
				'type'        => 'colorpicker',
				'fold'		  => array ( $amz_prefix . 'title_bar_style' => array('custom')),
			),

		),
	);

	$page_metabox = new Amazee_Metabox( $page_metabox );