<?php
    /* =============================================================================
     Featured Blocks Extend Vc
     ========================================================================== */

	$block = array(
		'featured_block1'  => esc_html__( 'Featured Block 1', 'composer' ),
		'featured_block2'  => esc_html__( 'Featured Block 2', 'composer' ),
		'featured_block3'  => esc_html__( 'Featured Block 3', 'composer' ),
		'featured_block4'  => esc_html__( 'Featured Block 4', 'composer' ),
		'featured_block5'  => esc_html__( 'Featured Block 5', 'composer' ),
		'featured_block6'  => esc_html__( 'Featured Block 6', 'composer' ),
		'featured_block7'  => esc_html__( 'Featured Block 7', 'composer' ),
		'featured_block8'  => esc_html__( 'Featured Block 8', 'composer' ),
		'featured_block9'  => esc_html__( 'Featured Block 9', 'composer' ),
		'featured_block10' => esc_html__( 'Featured Block 10', 'composer' )
	);

	$default = array(

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Choose a style", "composer"),
			"param_name" => "style",
			"value" => array(
				esc_html__('style 1', "composer") => "feature_style1",
				esc_html__('style 2', "composer") => "feature_style2"
			),
			"description" => esc_html__("Select the feature blog blocks styles", "composer"),
			"group"	=> esc_html__('General', 'composer')
		),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Choose a style", "composer"),
			"param_name" => "background_style",
			"value" => array(
				esc_html__('Deflat', "composer") => "",
				esc_html__('Background Transparent', "composer") => "background-transparent",
				esc_html__('Background White', "composer") => "background-white",
				esc_html__('Background Block', "composer") => "background-block"
			),
			"description" => esc_html__("Select the feature blog blocks Background styles", "composer"),
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
			"heading" => esc_html__("Enable Space in columns?", "composer"),
			"param_name" => "margin",
			"value" => array(
				__('No', "composer") => "margin-no", 
				__('Yes', "composer") => "margin-yes"
			),
			"description" => '',
			"group"	=> esc_html__('General', 'composer')
		),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Show Post Format Icon", "composer"),
			"param_name" => "show_post_format_icon",
			"value" => array(
				__('Yes', "composer") => "yes", 
				__('No', "composer") => "no"
			),
			"description" => '',
			"group"	=> esc_html__('General', 'composer')
		),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Show Category", "composer"),
			"param_name" => "show_category",
			"value" => array(
				__('Yes', "composer") => "yes", 
				__('No', "composer") => "no"
			),
			"description" => '',
			"group"	=> esc_html__('General', 'composer')
		),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Show Meta", "composer"),
			"param_name" => "show_meta",
			"value" => array(
				__('Yes', "composer") => "yes", 
				__('No', "composer") => "no"
			),
			"description" => '',
			"group"	=> esc_html__('General', 'composer')
		),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Meta Prefix", "composer"),
			"param_name" => "meta_prefix",
			"value" => array(
				__('Yes', "composer") => "yes", 
				__('No', "composer") => "no"
			),
			"description" => '',
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
			"heading" => esc_html__("Insert Blog Post By", "composer"),
			"param_name" => "insert_type",
			"value" => array(
				esc_html__('Blog Posts', "composer") => "posts", 
				esc_html__('Blog Post Id', "composer") => "id",
				esc_html__('Blog Post Category', "composer") => "category"
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
			"heading" => esc_html__("Post Id", "composer"),
			"param_name" => "id",
			"value" => "",
			"description" => esc_html__("Enter the blog post ids seperated by commas (,). Example: 2,54,8", "composer"),
			"group"	=> esc_html__('Query Builder', 'composer')
		),

		array(
			"type" => "textfield",
			"heading" => esc_html__("Category", "composer"),
			"param_name" => "category",
			"value" => "",
			"description" => esc_html__("Enter the blog post category seperated by commas (,). Example: design,illustration,print", "composer"),
			"group"	=> esc_html__('Query Builder', 'composer')
		),

		array(
			"type" => "textfield",
			"heading" => esc_html__("Exclude Post ID", "composer"),
			"param_name" => "exclude_id",
			"value" => "",
			"description" => esc_html__("Enter the exclude blog post ids seperated by commas (,). Example: 2,54,8", "composer"),
			"group"	=> esc_html__('Query Builder', 'composer')
		),

		array(
			"type" => "textfield",
			"heading" => esc_html__("Exclude Category", "composer"),
			"param_name" => "exclude_category",
			"value" => "",
			"description" => esc_html__("Enter the blog post category seperated by commas (,). Example: design,illustration,print", "composer"),
			"group"	=> esc_html__('Query Builder', 'composer')
		),

		array(
			"type" => "textfield",
			"heading" => esc_html__("Offset", "composer"),
			"param_name" => "offset",
			"value" => "",
			"description" => esc_html__("Number of post to displace or pass over", "composer"),
			"group"	=> esc_html__('Query Builder', 'composer')
		)
	);

	// Build default parameter
	$param = array_merge( $default, $query_builder );

	foreach ( $block as $key => $value ) {

		if( 'featured_block1' == $key ) {

			// Icon class for individual vc items
			$icon = 'icon-featured-block1';
		}
		elseif( 'featured_block2' == $key ) {

			// Icon class for individual vc items
			$icon = 'icon-featured-block2';
		}
		elseif( 'featured_block3' == $key ) {

			// Icon class for individual vc items
			$icon = 'icon-featured-block3';
		}
		elseif( 'featured_block4' == $key ) {

			// Icon class for individual vc items
			$icon = 'icon-featured-block4';
		}
		elseif( 'featured_block5' == $key ) {

			// Icon class for individual vc items
			$icon = 'icon-featured-block5';
		}
		elseif( 'featured_block6' == $key ) {

			// Icon class for individual vc items
			$icon = 'icon-featured-block6';
		}
		elseif( 'featured_block7' == $key ) {

			// Icon class for individual vc items
			$icon = 'icon-featured-block7';
		}
		elseif( 'featured_block8' == $key ) {

			// Icon class for individual vc items
			$icon = 'icon-featured-block8';
		}
		elseif( 'featured_block9' == $key ) {

			// Icon class for individual vc items
			$icon = 'icon-featured-block9';
		}
		elseif( 'featured_block10' == $key ) {

			// Icon class for individual vc items
			$icon = 'icon-featured-block10';
		}

		// Featured Block
		vc_map( array(
			"name"     => $value, //Title
			"base"     => $key, //Shortcode name
			"class"    => "blocks",
			"icon"     => $icon,
			"category" => 'Magazine', //category
			"params"   => $param
		) );
	}
    