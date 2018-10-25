<?php

	$amz_prefix = '_amz_';

	$portfolio_metabox = array(
		'metabox'	=> array( 
			'id'         => 'portfolio',
			'title'      => __( 'Portfolio Options', 'amz-composer-plugins' ),
			'post_type'  => 'pix_portfolio',
			'context'    => 'normal',
			'priority'   => 'low',
			'tabs' 		 => true,
		),
		'fields'     => array(

			array(
				'title' => esc_html__('Portfolio Settings', 'amz-composer-plugins'),
				'icon'  => 'icon-name',
				'type'  => 'heading'
			),

			array(
				'id' => $amz_prefix . 'client_name',
				'title' => esc_html__('Client Name', 'amz-composer-plugins'),
				'description' => esc_html__('Enter the client name.', 'amz-composer-plugins'),
				//'desc_tip' => '',
				'placeholder' => '',
				'type' => 'text',
			),

			array(
				'id' => $amz_prefix . 'tasks',
				'title' => esc_html__('Tasks', 'amz-composer-plugins'),
				'description' => esc_html__('Enter the tasks.', 'amz-composer-plugins'),
				//'desc_tip' => '',
				'placeholder' => '',
				'type' => 'text',
			),

			array(
				'id' => $amz_prefix . 'skills',
				'title' => esc_html__('Skills', 'amz-composer-plugins'),
				'description' => esc_html__('Enter the skills.', 'amz-composer-plugins'),
				//'desc_tip' => '',
				'placeholder' => '',
				'type' => 'text',
			),

			array(
				'id' => $amz_prefix . 'project_url',
				'title' => esc_html__('Project URL', 'amz-composer-plugins'),
				'description' => esc_html__('Type the URL of the project', 'amz-composer-plugins'),
				'desc_tip' => esc_html__('If this field is empty the button wont display', 'amz-composer-plugins'),
				'placeholder' => '',
				'type' => 'text',
			),

			array(
				'id' => $amz_prefix . 'target',
				'title' => esc_html__('Target', 'amz-composer-plugins'),
				'description' => esc_html__('Do you want to open the project in new tab?', 'amz-composer-plugins'),
				//'desc_tip' => 'Description tip',
				//'placeholder' => 'Item placeholder here',
				'std'	=> 'new_window',
				'options' => array(
					'_blank' => esc_html__('Open in a new window or tab', 'amz-composer-plugins'),
					'_self' => esc_html__('Open in a same window as it was clicked', 'amz-composer-plugins'),
					),
				'type' => 'select'
			),

			array(
				'id'           => $amz_prefix . 'portfolio_image',
				'title'        => esc_html__('Portfolio Thumb', 'amz-composer-plugins'),
				'description'  => esc_html__('Choose/Upload image for portfolio page. This image will display in portfolio list', 'amz-composer-plugins'),
				'option'       => 'image', // image, audio, video
				'multi_select' => false, // true, false
				'type'         => 'media_manager',
			),

			array(
				'id'          => $amz_prefix . 'portfolio_image_style',
				'title'       => esc_html__('Portfolio Masonry Thumb Size', 'amz-composer-plugins'),
				'description' => esc_html__('This option help to determine the image size in portfolio page (Masonry portfolio list shortcode)', 'amz-composer-plugins'),
				'std'         => 'square',
				'options' 	  => array(
					'square' 	  => 'Square small',
					'boxed' 	  => 'Square Large',
					'horizontal' 	  => 'Horizontal',
					'vertical' 	  => 'Vertical'
					),
				'type' 		  => 'switch'
			),

			array(
				'title' => esc_html__('Single Portfolio', 'amz-composer-plugins'),
				'icon'  => 'icon-name',
				'type'  => 'heading'
			),

			array(
				'id'          => $amz_prefix . 'portfolio_layout',
				'title'       => esc_html__('Portfolio layout', 'amz-composer-plugins'),
				'description' => esc_html__('Select the portfolio layout', 'amz-composer-plugins'),
				'std'         => 'full_width',
				'options' 	  => array(
					'full_width'      => 'Full Width',
					'two_column'      => 'Two Column',
					'visual_composer' => 'Visual Composer'
					),
				'type' 		  => 'switch'
			),

			array(
				'id'          => $amz_prefix . 'portfolio_details_position',
				'title'       => esc_html__('Portfolio Details Position', 'amz-composer-plugins'),
				'description' => esc_html__('Select the portfolio details position. This option only works portfolio full width layout', 'amz-composer-plugins'),
				'std'         => 'media_on_top',
				'options' 	  => array(
					'media_on_top' 	  => 'Media on Top',
					'details_on_top'  => 'Details on Top'
					),
				'type' 		  => 'switch'
			),

			array(
				'id'          => $amz_prefix . 'single_portfolio_style',
				'title'       => esc_html__('Single Portfolio Style', 'amz-composer-plugins'),
				'description' => esc_html__('Select you want to display image or video', 'amz-composer-plugins'),
				'std'         => 'image',
				'options' 	  => array(
					'image' 	  => 'Image',
					'gallery' 	  => 'Gallery',
					'video' 	  => 'Video'
					),
				'type' 		  => 'switch',
				'folds' 	  => 1
			),

			array(
				'id'          => $amz_prefix . 'portfolio_fixed_content',
				'title'       => esc_html__('Fixed Content', 'amz-composer-plugins'),
				'description' => esc_html__('Do you want fix the portfolio content. This option only works portfolio two column layout', 'amz-composer-plugins'),
				'std'         => 'not_fixed',
				'options' 	  => array(
					'not_fixed' 	  => 'Not Fixed',
					'fixed'  => 'Fixed'
					),
				'type' 		  => 'switch'
			),

			array(
				'id'          => $amz_prefix . 'portfolio_fixed_position',
				'title'       => esc_html__('Fixed Content Position', 'amz-composer-plugins'),
				'description' => esc_html__('Select the fixed content position.', 'amz-composer-plugins'),
				'std'         => 'fixed_on_right',
				'options' 	  => array(
					'fixed_on_left' 	  => 'Fixed On Left',
					'fixed_on_right'  => 'Fixed On Right'
					),
				'type' 		  => 'switch'
			),

			array(
				'id'           => $amz_prefix . 'portfolio_single_image',
				'title'        => esc_html__('Portfolio Image', 'amz-composer-plugins'),
				'description'  => esc_html__('Choose/Upload images for single portfolio single image', 'amz-composer-plugins'),
				'option'       => 'image', // image, audio, video
				'multi_select' => false, // true, false
				'type'         => 'media_manager',
				'fold'		   => array ( $amz_prefix . 'single_portfolio_style' => array('image')),
			),

			array(
				'id'           => $amz_prefix . 'portfolio_gallery',
				'title'        => esc_html__('Portfolio Gallery', 'amz-composer-plugins'),
				'description'  => esc_html__('Choose/Upload images for single portfolio carousel', 'amz-composer-plugins'),
				'option'       => 'image', // image, audio, video
				'multi_select' => true, // true, false
				'type'         => 'media_manager',
				'fold'		   => array ( $amz_prefix . 'single_portfolio_style' => array('gallery')),
			),

			array(
				'id'          => $amz_prefix . 'width',
				'title'       => esc_html__('Width', 'amz-composer-plugins'),
				'description' => esc_html__('Type the image width in the integer value', 'amz-composer-plugins'),
				'std'         => 1200,
				'type'        => 'text',
				'placeholder' => ''
			),

			array(
				'id'          => $amz_prefix . 'height',
				'title'       => esc_html__('Height', 'amz-composer-plugins'),
				'description' => esc_html__('Type the image height in the integer value', 'amz-composer-plugins'),
				'std'         => 500,
				'type'        => 'text',
				'placeholder' => ''
			),

			array(
				'id'          => $amz_prefix . 'portfolio_slider',
				'title'       => esc_html__('Portfolio Slider', 'amz-composer-plugins'),
				'description' => esc_html__('Do you want to display gallery images as slider', 'amz-composer-plugins'),
				'std'         => 'yes',
				'options' 	  => array(
					'yes' 	  => 'Yes',
					'no' 	  => 'No'
					),
				'type' 		  => 'switch',
				'fold'		   => array ( $amz_prefix . 'single_portfolio_style' => array('gallery')),
			),

			array(
				'id'          => $amz_prefix . 'slides_per_view',
				'title'       => esc_html__('Slides per view', 'amz-composer-plugins'),
				'description' => esc_html__('How many items you want to display in single slide?', 'amz-composer-plugins'),
				'placeholder' => '',
				'std'         => '1',
				'options' 	  => array(
					'1' 	  => 'One',
					'2' 	  => 'Two',
					'3'		  => 'Three',
					'4'		  => 'Four'
					),
				'type'        => 'switch',
				'fold'		   => array ( $amz_prefix . 'single_portfolio_style' => array('gallery')),
			),

			array(
				'id'          => $amz_prefix . 'loop',
				'title'       => esc_html__('Slider Loop', 'amz-composer-plugins'),
				'description' => esc_html__('Duplicate last and first items to get loop illusion.', 'amz-composer-plugins'),
				'std'         => 'false',
				'options' 	  => array(
					'true' 	  => 'True',
					'false' 	  => 'False'
					),
				'type' 		  => 'switch',
				'fold'		   => array ( $amz_prefix . 'single_portfolio_style' => array('gallery')),
			),

			array(
				'id'          => $amz_prefix . 'margin',
				'title'       => esc_html__('Margin', 'amz-composer-plugins'),
				'description' => esc_html__('Gap between the slide item', 'amz-composer-plugins'),
				'std'         => '0',
				'type'        => 'text',
				'placeholder' => '',
				'fold'		   => array ( $amz_prefix . 'single_portfolio_style' => array('gallery')),
			),

			array(
				'id'          => $amz_prefix . 'center',
				'title'       => esc_html__('Center', 'amz-composer-plugins'),
				'description' => esc_html__('Works well with even an odd number of items.', 'amz-composer-plugins'),
				'std'         => 'false',
				'options' 	  => array(
					'true' 	  => 'True',
					'false' 	  => 'False'
					),
				'type' 		  => 'switch',
				'fold'		   => array ( $amz_prefix . 'single_portfolio_style' => array('gallery')),
			),

			array(
				'id'          => $amz_prefix . 'stage_padding',
				'title'       => esc_html__('Stage Padding', 'amz-composer-plugins'),
				'description' => esc_html__('Padding left and right on stage', 'amz-composer-plugins'),
				'std'         => '0',
				'type'        => 'text',
				'placeholder' => '',
				'fold'		   => array ( $amz_prefix . 'single_portfolio_style' => array('gallery')),
			),

			array(
				'id'          => $amz_prefix . 'start_position',
				'title'       => esc_html__('Start Position', 'amz-composer-plugins'),
				'description' => esc_html__('Start position or URL Hash string like "#id"', 'amz-composer-plugins'),
				'std'         => '0',
				'type'        => 'text',
				'placeholder' => '',
				'fold'		   => array ( $amz_prefix . 'single_portfolio_style' => array('gallery')),
			),

			array(
				'id'          => $amz_prefix . 'pagination',
				'title'       => esc_html__('Pagination', 'amz-composer-plugins'),
				'description' => esc_html__('Do you want to display pagination?', 'amz-composer-plugins'),
				'std'         => 'false',
				'options' 	  => array(
					'true' 	  => 'True',
					'false' 	  => 'False'
					),
				'type' 		  => 'switch',
				'fold'		   => array ( $amz_prefix . 'single_portfolio_style' => array('gallery')),
			),

			array(
				'id'          => $amz_prefix . 'touch_drag',
				'title'       => esc_html__('Touch and Drag', 'amz-composer-plugins'),
				'description' => esc_html__('Do you want to enable touch and drag?', 'amz-composer-plugins'),
				'std'         => 'true',
				'options' 	  => array(
					'true' 	  => 'True',
					'false' 	  => 'False'
					),
				'type' 		  => 'switch',
				'fold'		   => array ( $amz_prefix . 'single_portfolio_style' => array('gallery')),
			),

			array(
				'id'          => $amz_prefix . 'mouse_drag',
				'title'       => esc_html__('Mouse Drag', 'amz-composer-plugins'),
				'description' => esc_html__('Do you want to enable mouse drag?', 'amz-composer-plugins'),
				'std'         => 'true',
				'options' 	  => array(
					'true' 	  => 'True',
					'false' 	  => 'False'
					),
				'type' 		  => 'switch',
				'fold'		   => array ( $amz_prefix . 'single_portfolio_style' => array('gallery')),
			),

			array(
				'id'          => $amz_prefix . 'stop_on_hover',
				'title'       => esc_html__('Stop on hover', 'amz-composer-plugins'),
				'description' => esc_html__('Pause on mouse hover.', 'amz-composer-plugins'),
				'std'         => 'true',
				'options' 	  => array(
					'true' 	  => 'True',
					'false' 	  => 'False'
					),
				'type' 		  => 'switch',
				'fold'		   => array ( $amz_prefix . 'single_portfolio_style' => array('gallery')),
			),

			array(
				'id'          => $amz_prefix . 'slide_arrow',
				'title'       => esc_html__('Slide arrow', 'amz-composer-plugins'),
				'description' => esc_html__('Do you want to display slider arrow?', 'amz-composer-plugins'),
				'std'         => 'true',
				'options' 	  => array(
					'true' 	  => 'True',
					'false' 	  => 'False'
					),
				'type' 		  => 'switch',
				'fold'		   => array ( $amz_prefix . 'single_portfolio_style' => array('gallery')),
			),

			array(
				'id'          => $amz_prefix . 'slide_speed',
				'title'       => esc_html__('Slide speed', 'amz-composer-plugins'),
				'description' => esc_html__('Type the slide speed value in integer', 'amz-composer-plugins'),
				'std'         => '5000',
				'type'        => 'text',
				'placeholder' => '',
				'fold'		   => array ( $amz_prefix . 'single_portfolio_style' => array('gallery')),
			),

			array(
				'id'          => $amz_prefix . 'autoplay',
				'title'       => esc_html__('Autoplay', 'amz-composer-plugins'),
				'description' => esc_html__('Do you want to enable autoplay?', 'amz-composer-plugins'),
				'std'         => 'false',
				'options' 	  => array(
					'true' 	  => 'True',
					'false' 	  => 'False'
					),
				'type' 		  => 'switch',
				'fold'		   => array ( $amz_prefix . 'single_portfolio_style' => array('gallery')),
			),

			array(
				'id'          => $amz_prefix . 'animate_out',
				'title'       => esc_html__('Animate Out', 'amz-composer-plugins'),
				'description' => esc_html__('CSS3 animation out.', 'amz-composer-plugins'),
				'std'         => 'false',
				'options' 	  => array(
					'true' 	  => 'True',
					'false' 	  => 'False'
					),
				'type' 		  => 'switch',
				'fold'		   => array ( $amz_prefix . 'single_portfolio_style' => array('gallery')),
			),

			array(
				'id'          => $amz_prefix . 'animate_in',
				'title'       => esc_html__('Animate In', 'amz-composer-plugins'),
				'description' => esc_html__('CSS3 animation in.', 'amz-composer-plugins'),
				'std'         => 'false',
				'options' 	  => array(
					'true' 	  => 'True',
					'false' 	  => 'False'
					),
				'type' 		  => 'switch',
				'fold'		   => array ( $amz_prefix . 'single_portfolio_style' => array('gallery')),
			),

			array(
				'id'           => $amz_prefix . 'portfolio_video',
				'title'        => esc_html__('Portfolio Video', 'amz-composer-plugins'),
				'description'  => esc_html__('Choose/Upload video for single portfolio', 'amz-composer-plugins'),
				'option'       => 'video', // image, audio, video
				'multi_select' => false, // true, false
				'type'         => 'media_manager',
				'fold'		   => array ( $amz_prefix . 'single_portfolio_style' => array('video')),
			),

			array(
				'id' => $amz_prefix . 'portfolio_poster',
				'title' => esc_html__('Poster', 'amz-composer-plugins'),
				'description' => esc_html__('Choose or Upload image from Media Uploader for video poster', 'amz-composer-plugins'),
				'option' => 'image', // image, audio, video
				'multi_select' => false, // true, false
				'type' => 'media_manager',
				'fold'         => array ( $amz_prefix . 'single_portfolio_style' => array('video')),
			),

			array(
				'id' => $amz_prefix . 'portfolio_video_autoplay',
				'title' => esc_html__('Autoplay', 'amz-composer-plugins'),
				'description' => esc_html__('If it\'s true, the videos plays automatically when the page loads', 'amz-composer-plugins'),
				'std'	=> 'no',
				'options' => array(
					'yes' => 'Yes',
					'no' => 'No'
					),
				'type' => 'switch',
				'fold'         => array ( $amz_prefix . 'single_portfolio_style' => array('video')),
			),

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
				'title'       => esc_html__('Header Layout Style.', 'amz-composer-plugins'),
				'description' => esc_html__('Choose Header Layout. Boxed = max header width is 1200px; Wide = header covers the viewport.', 'amz-composer-plugins'),
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
				'std'	=> '0',
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
				'fold'         => array ( $amz_prefix . 'title_bar_overlay' => array('gradient', 'color')),
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

	$portfolio_metabox = new Amazee_Metabox( $portfolio_metabox );