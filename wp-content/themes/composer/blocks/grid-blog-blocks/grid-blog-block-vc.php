<?php
    /* =============================================================================
     Grid Blog Blocks Extend Vc
     ========================================================================== */

	$block = array(
		'grid_block1'  => esc_html__( 'Grid Blog Block 1', 'composer' ),
		'grid_block2'  => esc_html__( 'Grid Blog Block 2', 'composer' ),
		'grid_block3'  => esc_html__( 'Grid Blog Block 3', 'composer' ),
		'grid_block4'  => esc_html__( 'Grid Blog Block 4', 'composer' ),
		'grid_block5'  => esc_html__( 'Grid Blog Block 5', 'composer' ),
		'grid_block6'  => esc_html__( 'Grid Blog Block 6', 'composer' ),
		'grid_block7'  => esc_html__( 'Grid Blog Block 7', 'composer' ),
		'grid_block8'  => esc_html__( 'Grid Blog Block 8', 'composer' ),
		'grid_block9'  => esc_html__( 'Grid Blog Block 9', 'composer' ),
		'grid_block10' => esc_html__( 'Grid Blog Block 10', 'composer' ),
		'grid_block11' => esc_html__( 'Grid Blog Block 11', 'composer' ),
		'grid_block12' => esc_html__( 'Grid Blog Block 12', 'composer' )
	);

	$default = array(

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Choose a style", "composer"),
			"param_name" => "style",
			"value" => array(
				esc_html__('style 1', "composer") => "grid_style1",
				esc_html__('style 2', "composer") => "grid_style2"
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
			"heading" => esc_html__("Margin", "composer"),
			"param_name" => "margin",
			"value" => array(
				__('Yes', "composer") => "margin-yes", 
				__('No', "composer") => "margin-no"
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
			"group"	=> esc_html__('General', 'composer')
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

		if( 'grid_block1' == $key ) {

			// Icon class for individual vc items
			$icon = 'icon-grid-block1';
		}
		elseif( 'grid_block2' == $key ) {

			// Icon class for individual vc items
			$icon = 'icon-grid-block2';
		}
		elseif( 'grid_block3' == $key ) {

			// Icon class for individual vc items
			$icon = 'icon-grid-block3';
		}
		elseif( 'grid_block4' == $key ) {

			// Icon class for individual vc items
			$icon = 'icon-grid-block4';
		}
		elseif( 'grid_block5' == $key ) {

			// Icon class for individual vc items
			$icon = 'icon-grid-block5';
		}
		elseif( 'grid_block6' == $key ) {

			// Icon class for individual vc items
			$icon = 'icon-grid-block6';
		}
		elseif( 'grid_block7' == $key ) {

			// Icon class for individual vc items
			$icon = 'icon-grid-block7';
		}
		elseif( 'grid_block8' == $key ) {

			// Icon class for individual vc items
			$icon = 'icon-grid-block8';
		}
		elseif( 'grid_block9' == $key ) {

			// Icon class for individual vc items
			$icon = 'icon-grid-block9';
		}
		elseif( 'grid_block10' == $key ) {

			// Icon class for individual vc items
			$icon = 'icon-grid-block10';
		}
		elseif( 'grid_block11' == $key ) {

			// Icon class for individual vc items
			$icon = 'icon-grid-block11';
		}
		elseif( 'grid_block12' == $key ) {

			// Icon class for individual vc items
			$icon = 'icon-grid-block12';
		}
		
		// Grid Blog Block
		vc_map( array(
			"name"     => $value, //Title
			"base"     => $key, //Shortcode name
			"class"    => "blocks",
			"icon"     => $icon,
			"category" => 'Magazine', //category
			"params"   => $param
		) );
	}
    