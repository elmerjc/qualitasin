<?php
    /* =============================================================================
     Shop Blocks Extend Vc
     ========================================================================== */

	$block = array(
		'shop_block1'  => esc_html__( 'Shop Block 1', 'composer' ),
		'shop_block2'  => esc_html__( 'Shop Block 2', 'composer' ),
		'shop_block3'  => esc_html__( 'Shop Block 3', 'composer' ),
		'shop_block4'  => esc_html__( 'Shop Block 4', 'composer' ),
		'shop_block5'  => esc_html__( 'Shop Block 5', 'composer' )
	);

	$default = array(

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Choose a style", "composer"),
			"param_name" => "style",
			"value" => array(
				esc_html__('style 1', "composer") => "shop_style1"
			),
			"description" => esc_html__("Select the shop blocks styles", "composer"),
			"group"	=> esc_html__('General', 'composer')
		),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Title Tag", "composer"),
			"param_name" => "title_tag",
			"value" => array('h2','h1','h3','h4','h5','h6'),
			"description" => esc_html__("Select title tag.", "composer"),
			"group"	=> esc_html__('General', 'composer')
		),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Margin", "composer"),
			"param_name" => "margin",
			"value" => array(
				esc_html__('No', "composer") => "margin-no",
				esc_html__('Yes', "composer") => "margin-yes"
			),
			"description" => '',
			"group"	=> esc_html__('General', 'composer')
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
			"description" => ''
		),

		array(
			"type" => "textfield",
			"heading" => esc_html__("Load More Text", "composer"),
			"param_name" => "loadmore_text",
			"value" => esc_html__( 'Load More', 'composer' ),
			"description" => esc_html__("Enter the load more text", "composer"),
			"group"	=> esc_html__('General', 'composer')
		),

		array(
			"type" => "textfield",
			"heading" => esc_html__("All Post Loaded Text", "composer"),
			"param_name" => "allpost_loaded_text",
			"value" => esc_html__( 'All Post Loaded', 'composer' ),
			"description" => esc_html__("Enter the all post loaded text", "composer"),
			"group"	=> esc_html__('General', 'composer')
		),

		array(
			"type" => "textfield",
			"heading" => esc_html__("Extra class", "composer"),
			"param_name" => "el_class",
			"value" => "",
			"description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "composer"),
			"group"	=> esc_html__('General', 'composer')
		)
	);

	$query_builder = array(
		array(
			"type" => "dropdown",
			"heading" => esc_html__("Insert Products By", "composer"),
			"param_name" => "insert_type",
			"value" => array(
				esc_html__('Products', "composer") => "posts", 
				esc_html__('Product Id', "composer") => "id"
			),
			"description" => '',
			"group"	=> esc_html__('Query Builder', 'composer')
		),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Order By", "composer"),
			"param_name" => "order_by",
			"value" => array( 
				esc_html__('Date', "composer")          => "date",
				esc_html__('Date Modified', "composer") => "modified",  
				esc_html__('Rand', "composer")          => "rand",
				esc_html__('ID', "composer")            => "ID", 
				esc_html__('Title', "composer")         => "title", 
				esc_html__('Author', "composer")        => "author",
				esc_html__('Name', "composer")          => "name",
				esc_html__('Parent', "composer")        => "parent",						  
				esc_html__('Menu Order', "composer")    => "menu_order",
				esc_html__('None', "composer")          => "none"
			),
			"description" => esc_html__("Order posts By choosen order", "composer"),
			"group"	=> esc_html__('Query Builder', 'composer')
		),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Order", "composer"),
			"param_name" => "order",
			"value" => array(
				__('Descending order', "composer") => "DESC", 
				__('Ascending order', "composer") => "ASC"
			),
			"description" => esc_html__("In which Order, you want to display posts", "composer"),
			"group"	=> esc_html__('Query Builder', 'composer')
		),

		array(
			"type" => "textfield",
			"heading" => esc_html__("Product Id", "composer"),
			"param_name" => "id",
			"value" => "",
			"description" => esc_html__("Enter the blog post ids seperated by commas (,). Example: 2,54,8", "composer"),
			"group"	=> esc_html__('Query Builder', 'composer')
		),

		array(
			"type" => "textfield",
			"heading" => esc_html__("Exclude Product ID", "composer"),
			"param_name" => "exclude_id",
			"value" => "",
			"description" => esc_html__("Enter the exclude product ids seperated by commas (,). Example: 2,54,8", "composer"),
			"group"	=> esc_html__('Query Builder', 'composer')
		)
	);

	// Build default parameter
	$param = array_merge( $default, $query_builder );

	foreach ( $block as $key => $value ) {

		if( 'shop_block1' == $key ) {

			// Icon class for individual vc items
			$icon = 'icon-shop-block1';
		}
		else if( 'shop_block2' == $key ) {

			// Icon class for individual vc items
			$icon = 'icon-shop-block2';
		}
		else if( 'shop_block3' == $key ) {

			// Icon class for individual vc items
			$icon = 'icon-shop-block3';
		}
		else if( 'shop_block4' == $key ) {

			// Icon class for individual vc items
			$icon = 'icon-shop-block4';
		}
		else if( 'shop_block5' == $key ) {

			// Icon class for individual vc items
			$icon = 'icon-shop-block5';
		}
		
		// Shop Block
		vc_map( array(
			"name"     => $value, //Title
			"base"     => $key, //Shortcode name
			"class"    => "blocks",
			"icon"     => $icon,
			"category" => 'Shop Blocks', //category
			"params"   => $param
		) );
	}
    