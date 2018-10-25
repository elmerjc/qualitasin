<?php
    /* =============================================================================
     Portfolio Blocks Extend Vc
     ========================================================================== */

	$block = array(
		'portfolio_block1'  => esc_html__( 'Portfolio Block 1', 'composer' ),
		'portfolio_block2'  => esc_html__( 'Portfolio Block 2', 'composer' ),
		'portfolio_block3'  => esc_html__( 'Portfolio Block 3', 'composer' ),
		'portfolio_block4'  => esc_html__( 'Portfolio Block 4', 'composer' ),
		'portfolio_block5'  => esc_html__( 'Portfolio Block 5', 'composer' ),
		'portfolio_block6'  => esc_html__( 'Portfolio Block 6', 'composer' ),
		'portfolio_block7'  => esc_html__( 'Portfolio Block 7', 'composer' ),
		'portfolio_block8'  => esc_html__( 'Portfolio Block 8', 'composer' ),
		'portfolio_block9'  => esc_html__( 'Portfolio Block 9', 'composer' ),
		'portfolio_block10' => esc_html__( 'Portfolio Block 10', 'composer' ),
		'portfolio_block11' => esc_html__( 'Portfolio Block 11', 'composer' ),
		'portfolio_block12' => esc_html__( 'Portfolio Block 12', 'composer' )
	);
	foreach ( $block as $key => $value ) {

		if( 'portfolio_block1' == $key ) {

			// Icon class for individual vc items
			$icon = 'icon-portfolio-block1';
		}
		elseif( 'portfolio_block2' == $key ) {

			// Icon class for individual vc items
			$icon = 'icon-portfolio-block2';
		}
		elseif( 'portfolio_block3' == $key ) {

			// Icon class for individual vc items
			$icon = 'icon-portfolio-block3';
		}
		elseif( 'portfolio_block4' == $key ) {

			// Icon class for individual vc items
			$icon = 'icon-portfolio-block4';
		}
		elseif( 'portfolio_block5' == $key ) {

			// Icon class for individual vc items
			$icon = 'icon-portfolio-block5';
		}
		elseif( 'portfolio_block6' == $key ) {

			// Icon class for individual vc items
			$icon = 'icon-portfolio-block6';
		}
		elseif( 'portfolio_block7' == $key ) {

			// Icon class for individual vc items
			$icon = 'icon-portfolio-block7';
		}
		elseif( 'portfolio_block8' == $key ) {

			// Icon class for individual vc items
			$icon = 'icon-portfolio-block8';
		}
		elseif( 'portfolio_block9' == $key ) {

			// Icon class for individual vc items
			$icon = 'icon-portfolio-block9';
		}
		elseif( 'portfolio_block10' == $key ) {

			// Icon class for individual vc items
			$icon = 'icon-portfolio-block10';
		}
		elseif( 'portfolio_block11' == $key ) {

			// Icon class for individual vc items
			$icon = 'icon-portfolio-block11';
		}
		elseif( 'portfolio_block12' == $key ) {

			// Icon class for individual vc items
			$icon = 'icon-portfolio-block12';
		}

		// Portfolio Block
		vc_map( array(
			"name" => $value, //Title
			"base" => $key, //Shortcode name
			"class" => "blocks",
			"icon" => $icon,
			"category" => 'Portfolio Blocks', //category
			"params" => array(

				array(
					"type" => "dropdown",
					"heading" => esc_html__("Insert Portfolio By", "composer"),
					"param_name" => "insert_type",
					"value" => array(
						esc_html__('Posts', "composer") => "posts", 
						esc_html__('Id', "composer") => "id"
					),
					"description" => ''
				),

				array(
					"type" => "textfield",
					"heading" => esc_html__("Id", "composer"),
					"param_name" => "id",
					"value" => "",
					"description" => esc_html__("Enter the portfolio ids seperated by commas (,). Example: 2,54,8", "composer"),
					"dependency" => array('element' => "insert_type", 'value' => 'id'),
				),

				array(
					"type" => "dropdown",
					"heading" => esc_html__("Choose a style", "composer"),
					"param_name" => "style",
					"value" => array(
						esc_html__('style 1', "composer") => "style1",  
						esc_html__('style 2', "composer") => "style2",  
						esc_html__('style 3', "composer") => "style3",  
						esc_html__('style 4', "composer") => "style4",  
						esc_html__('style 5', "composer") => "style5",  
						esc_html__('style 6', "composer") => "style6"
					),
					"description" => esc_html__("Select the portfolio block hover styles", "composer")
				),

				array(
					"type" => "dropdown",
					"heading" => esc_html__("Show Filter", "composer"),
					"param_name" => "filter",
					"value" => array(
						esc_html__('Yes', "composer") => "yes",  
						esc_html__('No', "composer") => "no"
					),
					"description" => esc_html__('Filter only displays if you choose carousel "No"', "composer")
					),

				array(
					"type" => "dropdown",
					"heading" => esc_html__("Filter Style", "composer"),
					"param_name" => "filter_style",
					"value" => array(
						esc_html__('Simple', "composer") => "normal simple",
						esc_html__('Normal', "composer") => "normal",  
						esc_html__('Dropdown', "composer") => "dropdown"
					),
					"description" => ''
				),

				array(
					"type" => "dropdown",
					"heading" => esc_html__("HTML Tag for portfolio Name", "composer"),
					"param_name" => "title_tag",
					"value" => array('h2','h3','h4','h5','h6','h1' ),
					"description" => esc_html__("Choose which html tag you want use for portfolio name.", "composer")
				),

				array(
					"type" => "dropdown",
					"heading" => esc_html__("Order By", "composer"),
					"param_name" => "order_by",
					"value" => array(
						esc_html__('Date Modified', "composer") => "modified",
						esc_html__('Date', "composer") => "date",  
						esc_html__('Rand', "composer") => "rand",
						esc_html__('ID', "composer") => "ID", 
						esc_html__('Title', "composer") => "title", 
						esc_html__('Author', "composer") => "author",
						esc_html__('Name', "composer") => "name",
						esc_html__('Parent', "composer") => "parent",							  
						esc_html__('Menu Order', "composer") => "menu_order",
						esc_html__('None', "composer") => "none"
					),
					"dependency" => array('element' => "insert_type", 'value' => 'posts'),
					"description" => esc_html__("Order posts By choosen order", "composer")
				),

				array(
					"type" => "dropdown",
					"heading" => esc_html__("Order By", "composer"),
					"param_name" => "order",
					"value" => array(
						esc_html__('descending order', "composer") => "DESC", 
						esc_html__('Ascending order', "composer") => "ASC"
					),
					"dependency" => array('element' => "insert_type", 'value' => 'posts'),
					"description" => ''
				),

				array(
					"type" => "textfield",
					"heading" => esc_html__("Exclude Portfolio", "composer"),
					"param_name" => "exclude_portfolio",
					"value" => "",
					"description" => esc_html__("Enter the portfolio id you don't want to display. Divide id with comma (,).", "composer")
				),

				array(
					"type" => "dropdown",
					"heading" => esc_html__("Enable Space in columns?", "composer"),
					"param_name" => "margin",
					"value" => array(
						esc_html__('No', "composer") => "",  
						esc_html__('Yes', "composer") => "margin-yes"
					),
					"description" => esc_html__('Choose Yes to enable Space ( margin inbetween columns )', "composer")
				),

				array(
					"type" => "dropdown",
					"heading" => esc_html__("Show/Hide Category", "composer"),
					"param_name" => "show_terms",
					"value" => array(
						esc_html__('Yes', "composer") => "Yes",  
						esc_html__('No', "composer") => "no"
					),
					"description" => esc_html__('Show/Hide Category', "composer")
				),

				array(
					"type" => "dropdown",
					"heading" => esc_html__("Show/Hide Like", "composer"),
					"param_name" => "show_like",
					"value" => array(
						esc_html__('Yes', "composer") => "yes",  
						esc_html__('No', "composer") => "no"
					),
					"description" => esc_html__('Do you want to show like?', "composer")
				),

				array(
					"type" => "dropdown",
					"heading" => esc_html__("Portfolio Hover color", "composer"),
					"param_name" => "port_hover_color",
					"value" => array(
						esc_html__('Default', "composer") => "",
						esc_html__('White', "composer") => " port-bg-white",
						esc_html__('Color', "composer") => " port-bg-color"
					),
					"description" => ''
				),

				array(
					"type" => "dropdown",
					"heading" => esc_html__("Do you need light box for portfolio image", "composer"),
					"param_name" => "show_lightbox",
					"value" => array(
						esc_html__('Yes', "composer") => "yes",  
						esc_html__('No', "composer") => "no"
					),
					"description" => ''
				),

				array(
					"type" => "dropdown",
					"heading" => __("Choose the link for portfolio page?", "amz-composer-plugins"),
					"param_name" => "on_click",
					"value" => array(
						__('Single Portfolio Link', "amz-composer-plugins") => "single_port_link",  
						__('Button Link', "amz-composer-plugins") => "single_button_link",  
						__('None', "amz-composer-plugins") => "none"
					),
					"description" => ''
				),

				array(
					"type" => "dropdown",
					"heading" => esc_html__("Append Content", "composer"),
					"param_name" => "append_content",
					"value" => array(
						esc_html__('No', "composer") => "no",  
						esc_html__('Yes', "composer") => "yes"
					),
					"description" => esc_html__('Add a content box in-between portfolio items', "composer"),
					"group"	=> esc_html__('Append Content', 'composer')
				),

				array(
					"type" => "dropdown",
					"heading" => esc_html__("Append Content Alignment", "composer"),
					"param_name" => "append_content_align",
					"value" => array(
						esc_html__('Align Left', "composer") => "left", 
						esc_html__('Align Center', "composer") => "center", 
						esc_html__('Align Right', "composer") => "right"
					),
					"description" => esc_html__("Select alignment.", "composer"),
					"dependency" => array('element' => "append_content", 'value' => array('yes')),
					"group"	=> esc_html__('Append Content', 'composer')
				),

				array(
					"type" => "textfield",
					"heading" => esc_html__("Append Content Position", "composer"),
					"param_name" => "append_content_pos",
					"value" => "",
					"description" => esc_html__("Add a content box in-between portfolio items", "composer"),
					"dependency" => array('element' => "append_content", 'value' => array('yes')),
					"group"	=> esc_html__('Append Content', 'composer')
				),

				array(
					"type" => "textfield",
					"heading" => esc_html__("Content Box Title", "composer"),
					"param_name" => "append_title",
					"value" => esc_html__("Our Works", "composer"),
					"description" => esc_html__("Enter the title.", "composer"),
					"dependency" => array('element' => "append_content", 'value' => array('yes')),
					"group"	=> esc_html__('Append Content', 'composer')
				),

				array(
					"type" => "textarea_html",
					"class" => "",
					"heading" => esc_html__("Content Box Description", "composer"),
					"param_name" => "content", 
					"value" => '', 
					"description" => esc_html__("Enter the Content Box Description", "composer"),
					"dependency" => array('element' => "append_content", 'value' => array('yes')),
					"group"	=> esc_html__('Append Content', 'composer')
				),

				array(
					"type" => "vc_link",
					"heading" => esc_html__("Button URL", "composer"),
					"param_name" => "append_button_link",
					"value" => "",
					"description" => esc_html__("Enter the button link", "composer"),
					"dependency" => array('element' => "append_content", 'value' => array('yes')),
					"group"	=> esc_html__('Append Content', 'composer')
				),

				array(
					"type" => "dropdown",
					"heading" => esc_html__("Pagination", "composer"),
					"param_name" => "pagination",
					"value" => array(
						esc_html__('None', "composer")      => "none",
						esc_html__('Load More', "composer") => "load_more",
						esc_html__('Autoload', "composer")  => "autoload",
						esc_html__('Number', "composer")    => "number",
						esc_html__('Text', "composer")      => "text"
					),
					"description" => '',
				),

				array(
					"type" => "textfield",
					"heading" => esc_html__("Load More Text", "composer"),
					"param_name" => "loadmore_text",
					"value" => esc_html__( 'Load More', 'composer' ),
					"description" => esc_html__("Enter the load more text", "composer"),
				),

				array(
					"type" => "textfield",
					"heading" => esc_html__("All Post Loaded Text", "composer"),
					"param_name" => "allpost_loaded_text",
					"value" => esc_html__( 'All Portfolio Loaded', 'composer' ),
					"description" => esc_html__("Enter the all post loaded text", "composer"),
				),

				array(
					"type" => "textfield",
					"heading" => esc_html__("Extra class", "composer"),
					"param_name" => "el_class",
					"value" => "",
					"description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "composer"),
					"group"	=> esc_html__('General', 'composer')
				)
			)
		) );
	}
    