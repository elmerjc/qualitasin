<?php
    /* =============================================================================
     Blog Blocks Extend Vc
     ========================================================================== */

    $block = array(
		'block1'  => esc_html__( 'Block 1', 'composer' ),
		'block2'  => esc_html__( 'Block 2', 'composer' ),
		'block3'  => esc_html__( 'Block 3', 'composer' ),
		'block4'  => esc_html__( 'Block 4', 'composer' ),
		'block5'  => esc_html__( 'Block 5', 'composer' ),
		'block6'  => esc_html__( 'Block 6', 'composer' ),
		'block7'  => esc_html__( 'Block 7', 'composer' ),
		'block8'  => esc_html__( 'Block 8', 'composer' ),
		'block9'  => esc_html__( 'Block 9', 'composer' ),
		'block10' => esc_html__( 'Block 10', 'composer' )
	);

	$default = array(
		array(
			"type" => "dropdown",
			"heading" => esc_html__("Block Column", "composer"),
			"param_name" => "block_column",
			"value" => array(
				esc_html__('One Column', "composer") => "col1", 
				esc_html__('Two Column', "composer") => "col2", 
				esc_html__('Three Column', "composer") => "col3"
			),
			"description" => esc_html__("Select the Blog blocks column", "composer"),
			"group"	=> esc_html__('General', 'composer')
		),

		array(
			"type" => "textfield",
			"heading" => esc_html__("Column 1 Post Count", "composer"),
			"param_name" => "column1_count",
			"value" => '',
			"description" => esc_html__("Type the integer value for number of posts in first column", "composer"),
			"group"	=> esc_html__('General', 'composer')
		),

		array(
			"type" => "textfield",
			"heading" => esc_html__("Column 2 Post Count", "composer"),
			"param_name" => "column2_count",
			"value" => '',
			"description" => esc_html__("Type the integer value for number of posts in second column", "composer"),			
     		"dependency" => array( 'element' => "block_column", 'value' => array('col2', 'col3') ),
			"group"	=> esc_html__('General', 'composer')
		),

		array(
			"type" => "textfield",
			"heading" => esc_html__("Column 3 Post Count", "composer"),
			"param_name" => "column3_count",
			"value" => '',
			"description" => esc_html__("Type the integer value for number of posts in third column", "composer"),
			"dependency" => array( 'element' => "block_column", 'value' => array('col3') ),
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
			"heading" =>esc_html__("Insert Blog Post By", "composer"),
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
				esc_html__('Descending order', "composer") => "DESC", 
				esc_html__('Ascending order', "composer") => "ASC"
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

	$module1 = array(
		array(
			"type" => "dropdown",
			"heading" => esc_html__("Show Post Format Icon", "composer"),
			"param_name" => "module1_show_post_format_icon",
			"value" => array(
				esc_html__('Yes', "composer") => "yes", 
				esc_html__('No', "composer")  => "no"
			),
			"description" => esc_html__("Do you want to display post format icon", "composer")
		),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Show Category", "composer"),
			"param_name" => "module1_show_category",
			"value" => array(
				esc_html__('Yes', "composer") => "yes", 
				esc_html__('No', "composer")  => "no"
			),
			"description" => esc_html__("Do you want to display category?", "composer")
		),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Show Meta", "composer"),
			"param_name" => "module1_show_meta",
			"value" => array(
				esc_html__('On Bottom', "composer") => "on_bottom", 
				esc_html__('On Top', "composer")  => "on_top",
				esc_html__('Hide', "composer")  => "hide"
			),
			"description" => esc_html__("Do you want to show meta?", "composer")
		),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Show Meta Prefix", "composer"),
			"param_name" => "module1_meta_prefix",
			"value" => array(
				esc_html__('Yes', "composer") => "yes", 
				esc_html__('No', "composer")  => "no"
			),
			"description" => esc_html__("Do you want to show meta prefix?", "composer")
		),

		array(
			"type" => "textfield",
			"heading" => esc_html__("Title Length", "composer"),
			"param_name" => "module1_title_length",
			"value" => "30",
			"description" => esc_html__("Enter title length. Example: 30", "composer"),
			"group"	=> esc_html__('General', 'composer')
		),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Show Description", "composer"),
			"param_name" => "module1_show_description",
			"value" => array(
				esc_html__('Yes', "composer") => "yes", 
				esc_html__('No', "composer")  => "no"
			),
			"description" => esc_html__("Do you want to show description?", "composer")
		),

		array(
			"type" => "textfield",
			"heading" => esc_html__("Content length", "composer"),
			"param_name" => "module1_excerpt_length",
			"value" => "180",
			"description" => esc_html__("Enter excerpt length. Example: 180", "composer")
		),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Show Share", "composer"),
			"param_name" => "module1_show_share",
			"value" => array(
				esc_html__('Yes', "composer") => "yes", 
				esc_html__('No', "composer")  => "no"
			),
			"description" => esc_html__("Do you want to display share options?", "composer")
		),

		array(
			"type" => "checkbox",
			"heading" => esc_html__("Share", "composer"),
			"param_name" => "module1_share",
			"value" => array(
				esc_html__('Facebook', "composer")    => "facebook", 
				esc_html__('Twitter', "composer")     => "twitter", 
				esc_html__('Google Plus', "composer") => "gplus", 
				esc_html__('Linkedin', "composer")    => "linkedin", 
				esc_html__('Pinterest', "composer")   => "pinterest"
			),
			"description" => esc_html__("Select the share options you want to share", "composer")
		)

	);

	$module2 = array(

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Show Featured Image", "composer"),
			"param_name" => "module2_show_featured_image",
			"value" => array(
				esc_html__('Yes', "composer") => "yes", 
				esc_html__('No', "composer")  => "no"
			),
			"description" => esc_html__("Do you want to display featured image", "composer")
		),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Show Post Format Icon", "composer"),
			"param_name" => "module2_show_post_format_icon",
			"value" => array(
				esc_html__('Yes', "composer") => "yes", 
				esc_html__('No', "composer")  => "no"
			),
			"description" => esc_html__("Do you want to display post format icon", "composer")
		),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Show Category", "composer"),
			"param_name" => "module2_show_category",
			"value" => array(
				esc_html__('Yes', "composer") => "yes", 
				esc_html__('No', "composer")  => "no"
			),
			"description" => esc_html__("Do you want to display category?", "composer")
		),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Show Meta", "composer"),
			"param_name" => "module2_show_meta",
			"value" => array(
				esc_html__('On Bottom', "composer") => "on_bottom", 
				esc_html__('On Top', "composer")  => "on_top",
				esc_html__('Hide', "composer")  => "hide"
			),
			"description" => esc_html__("Do you want to show meta?", "composer")
		),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Show Meta Prefix", "composer"),
			"param_name" => "module2_meta_prefix",
			"value" => array(
				esc_html__('Yes', "composer") => "yes", 
				esc_html__('No', "composer")  => "no"
			),
			"description" => esc_html__("Do you want to show meta prefix?", "composer")
		),

		array(
			"type" => "textfield",
			"heading" => esc_html__("Title Length", "composer"),
			"param_name" => "module2_title_length",
			"value" => "30",
			"description" => esc_html__("Enter title length. Example: 30", "composer")
		),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Show Description", "composer"),
			"param_name" => "module2_show_description",
			"value" => array(
				esc_html__('Yes', "composer") => "yes", 
				esc_html__('No', "composer")  => "no"
			),
			"description" => esc_html__("Do you want to show description?", "composer")
		),

		array(
			"type" => "textfield",
			"heading" => esc_html__("Content length", "composer"),
			"param_name" => "module2_excerpt_length",
			"value" => "180",
			"description" => esc_html__("Enter excerpt length. Example: 180", "composer")
		),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Show Button", "composer"),
			"param_name" => "module2_show_button",
			"value" => array(
				esc_html__('Yes', "composer") => "yes", 
				esc_html__('No', "composer")  => "no"
			),
			"description" => esc_html__("Do you want to display button?", "composer")
		),

		array(
			"type" => "textfield",
			"heading" => esc_html__("Button Text", "composer"),
			"param_name" => "module2_show_button",
			"value" => esc_html__( 'Read More', 'composer' ),
			"description" => esc_html__("Type the button text", "composer")
		)

	);

	$module3 = array(

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Show Featured Image", "composer"),
			"param_name" => "module3_show_featured_image",
			"value" => array(
				esc_html__('Yes', "composer") => "yes", 
				esc_html__('No', "composer")  => "no"
			),
			"description" => esc_html__("Do you want to display featured image", "composer")
		),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Show Meta", "composer"),
			"param_name" => "module3_show_meta",
			"value" => array(
				esc_html__('On Bottom', "composer") => "on_bottom", 
				esc_html__('On Top', "composer")  => "on_top",
				esc_html__('Hide', "composer")  => "hide"
			),
			"description" => esc_html__("Do you want to show meta?", "composer")
		),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Show Meta Prefix", "composer"),
			"param_name" => "module3_meta_prefix",
			"value" => array(
				esc_html__('Yes', "composer") => "yes", 
				esc_html__('No', "composer")  => "no"
			),
			"description" => esc_html__("Do you want to show meta prefix?", "composer")
		),

		array(
			"type" => "textfield",
			"heading" => esc_html__("Title Length", "composer"),
			"param_name" => "module3_title_length",
			"value" => "30",
			"description" => esc_html__("Enter title length. Example: 30", "composer")
		)

	);

	$module4 = array(

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Show Featured Image", "composer"),
			"param_name" => "module4_show_featured_image",
			"value" => array(
				esc_html__('Yes', "composer") => "yes", 
				esc_html__('No', "composer")  => "no"
			),
			"description" => esc_html__("Do you want to display featured image", "composer")
		),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Show Post Format Icon", "composer"),
			"param_name" => "module4_show_post_format_icon",
			"value" => array(
				esc_html__('Yes', "composer") => "yes", 
				esc_html__('No', "composer")  => "no"
			),
			"description" => esc_html__("Do you want to display post format icon", "composer")
		),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Show Category", "composer"),
			"param_name" => "module4_show_category",
			"value" => array(
				esc_html__('Yes', "composer") => "yes", 
				esc_html__('No', "composer")  => "no"
			),
			"description" => esc_html__("Do you want to display category?", "composer")
		),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Show Meta", "composer"),
			"param_name" => "module4_show_meta",
			"value" => array(
				esc_html__('On Bottom', "composer") => "on_bottom", 
				esc_html__('On Top', "composer")  => "on_top",
				esc_html__('Hide', "composer")  => "hide"
			),
			"description" => esc_html__("Do you want to show meta?", "composer")
		),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Show Meta Prefix", "composer"),
			"param_name" => "module4_meta_prefix",
			"value" => array(
				esc_html__('Yes', "composer") => "yes", 
				esc_html__('No', "composer")  => "no"
			),
			"description" => esc_html__("Do you want to show meta prefix?", "composer")
		),

		array(
			"type" => "textfield",
			"heading" => esc_html__("Title Length", "composer"),
			"param_name" => "module4_title_length",
			"value" => "30",
			"description" => esc_html__("Enter title length. Example: 30", "composer")
		),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Show Description", "composer"),
			"param_name" => "module4_show_description",
			"value" => array(
				esc_html__('Yes', "composer") => "yes", 
				esc_html__('No', "composer")  => "no"
			),
			"description" => esc_html__("Do you want to show description?", "composer")
		),

		array(
			"type" => "textfield",
			"heading" => esc_html__("Content length", "composer"),
			"param_name" => "module4_excerpt_length",
			"value" => "180",
			"description" => esc_html__("Enter excerpt length. Example: 180", "composer")
		),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Show Button", "composer"),
			"param_name" => "module4_show_button",
			"value" => array(
				esc_html__('Yes', "composer") => "yes", 
				esc_html__('No', "composer")  => "no"
			),
			"description" => esc_html__("Do you want to display button?", "composer")
		),

		array(
			"type" => "textfield",
			"heading" => esc_html__("Button Text", "composer"),
			"param_name" => "module4_show_button",
			"value" => esc_html__( 'Read More', 'composer' ),
			"description" => esc_html__("Type the button text", "composer")
		)

	);

	$module5 = array(

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Show Featured Image", "composer"),
			"param_name" => "module5_show_featured_image",
			"value" => array(
				esc_html__('Yes', "composer") => "yes", 
				esc_html__('No', "composer")  => "no"
			),
			"description" => esc_html__("Do you want to display featured image", "composer")
		),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Show Post Format Icon", "composer"),
			"param_name" => "module5_show_post_format_icon",
			"value" => array(
				esc_html__('Yes', "composer") => "yes", 
				esc_html__('No', "composer")  => "no"
			),
			"description" => esc_html__("Do you want to display post format icon", "composer")
		),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Show Category", "composer"),
			"param_name" => "module5_show_category",
			"value" => array(
				esc_html__('Yes', "composer") => "yes", 
				esc_html__('No', "composer")  => "no"
			),
			"description" => esc_html__("Do you want to display category?", "composer")
		),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Show Meta", "composer"),
			"param_name" => "module5_show_meta",
			"value" => array(
				esc_html__('On Bottom', "composer") => "on_bottom", 
				esc_html__('On Top', "composer")  => "on_top",
				esc_html__('Hide', "composer")  => "hide"
			),
			"description" => esc_html__("Do you want to show meta?", "composer")
		),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Show Meta Prefix", "composer"),
			"param_name" => "module5_meta_prefix",
			"value" => array(
				esc_html__('Yes', "composer") => "yes", 
				esc_html__('No', "composer")  => "no"
			),
			"description" => esc_html__("Do you want to show meta prefix?", "composer")
		),

		array(
			"type" => "textfield",
			"heading" => esc_html__("Title Length", "composer"),
			"param_name" => "module5_title_length",
			"value" => "30",
			"description" => esc_html__("Enter title length. Example: 30", "composer")
		),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Show Description", "composer"),
			"param_name" => "module5_show_description",
			"value" => array(
				esc_html__('Yes', "composer") => "yes", 
				esc_html__('No', "composer")  => "no"
			),
			"description" => esc_html__("Do you want to show description?", "composer")
		),

		array(
			"type" => "textfield",
			"heading" => esc_html__("Content length", "composer"),
			"param_name" => "module5_excerpt_length",
			"value" => "180",
			"description" => esc_html__("Enter excerpt length. Example: 180", "composer")
		),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Show Button", "composer"),
			"param_name" => "module5_show_button",
			"value" => array(
				esc_html__('Yes', "composer") => "yes", 
				esc_html__('No', "composer")  => "no"
			),
			"description" => esc_html__("Do you want to display button?", "composer")
		),

		array(
			"type" => "textfield",
			"heading" => esc_html__("Button Text", "composer"),
			"param_name" => "module5_show_button",
			"value" => esc_html__( 'Read More', 'composer' ),
			"description" => esc_html__("Type the button text", "composer")
		)

	);

	$module6 = array(

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Show Featured Image", "composer"),
			"param_name" => "module6_show_featured_image",
			"value" => array(
				esc_html__('Yes', "composer") => "yes", 
				esc_html__('No', "composer")  => "no"
			),
			"description" => esc_html__("Do you want to display featured image", "composer")
		),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Show Post Format Icon", "composer"),
			"param_name" => "module6_show_post_format_icon",
			"value" => array(
				esc_html__('Yes', "composer") => "yes", 
				esc_html__('No', "composer")  => "no"
			),
			"description" => esc_html__("Do you want to display post format icon", "composer")
		),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Show Category", "composer"),
			"param_name" => "module6_show_category",
			"value" => array(
				esc_html__('Yes', "composer") => "yes", 
				esc_html__('No', "composer")  => "no"
			),
			"description" => esc_html__("Do you want to display category?", "composer")
		),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Show Meta", "composer"),
			"param_name" => "module6_show_meta",
			"value" => array(
				esc_html__('On Bottom', "composer") => "on_bottom", 
				esc_html__('On Top', "composer")  => "on_top",
				esc_html__('Hide', "composer")  => "hide"
			),
			"description" => esc_html__("Do you want to show meta?", "composer")
		),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Show Meta Prefix", "composer"),
			"param_name" => "module6_meta_prefix",
			"value" => array(
				esc_html__('Yes', "composer") => "yes", 
				esc_html__('No', "composer")  => "no"
			),
			"description" => esc_html__("Do you want to show meta prefix?", "composer")
		),

		array(
			"type" => "textfield",
			"heading" => esc_html__("Title Length", "composer"),
			"param_name" => "module6_title_length",
			"value" => "30",
			"description" => esc_html__("Enter title length. Example: 30", "composer")
		),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Show Description", "composer"),
			"param_name" => "module6_show_description",
			"value" => array(
				esc_html__('Yes', "composer") => "yes", 
				esc_html__('No', "composer")  => "no"
			),
			"description" => esc_html__("Do you want to show description?", "composer")
		),

		array(
			"type" => "textfield",
			"heading" => esc_html__("Content length", "composer"),
			"param_name" => "module6_excerpt_length",
			"value" => "180",
			"description" => esc_html__("Enter excerpt length. Example: 180", "composer")
		),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Show Button", "composer"),
			"param_name" => "module6_show_button",
			"value" => array(
				esc_html__('Yes', "composer") => "yes", 
				esc_html__('No', "composer")  => "no"
			),
			"description" => esc_html__("Do you want to display button?", "composer")
		),

		array(
			"type" => "textfield",
			"heading" => esc_html__("Button Text", "composer"),
			"param_name" => "module6_show_button",
			"value" => esc_html__( 'Read More', 'composer' ),
			"description" => esc_html__("Type the button text", "composer")
		)

	);


	$module7 = array(

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Show Featured Image", "composer"),
			"param_name" => "module7_show_featured_image",
			"value" => array(
				esc_html__('Yes', "composer") => "yes", 
				esc_html__('No', "composer")  => "no"
			),
			"description" => esc_html__("Do you want to display featured image", "composer")
		),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Show Post Format Icon", "composer"),
			"param_name" => "module7_show_post_format_icon",
			"value" => array(
				esc_html__('Yes', "composer") => "yes", 
				esc_html__('No', "composer")  => "no"
			),
			"description" => esc_html__("Do you want to display post format icon", "composer")
		),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Show Category", "composer"),
			"param_name" => "module7_show_category",
			"value" => array(
				esc_html__('Yes', "composer") => "yes", 
				esc_html__('No', "composer")  => "no"
			),
			"description" => esc_html__("Do you want to display category?", "composer")
		),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Show Meta", "composer"),
			"param_name" => "module7_show_meta",
			"value" => array(
				esc_html__('On Bottom', "composer") => "on_bottom", 
				esc_html__('On Top', "composer")  => "on_top",
				esc_html__('Hide', "composer")  => "hide"
			),
			"description" => esc_html__("Do you want to show meta?", "composer")
		),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Show Meta Prefix", "composer"),
			"param_name" => "module7_meta_prefix",
			"value" => array(
				esc_html__('Yes', "composer") => "yes", 
				esc_html__('No', "composer")  => "no"
			),
			"description" => esc_html__("Do you want to show meta prefix?", "composer")
		),

		array(
			"type" => "textfield",
			"heading" => esc_html__("Title Length", "composer"),
			"param_name" => "module7_title_length",
			"value" => "30",
			"description" => esc_html__("Enter title length. Example: 30", "composer")
		),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Show Description", "composer"),
			"param_name" => "module7_show_description",
			"value" => array(
				esc_html__('Yes', "composer") => "yes", 
				esc_html__('No', "composer")  => "no"
			),
			"description" => esc_html__("Do you want to show description?", "composer")
		),

		array(
			"type" => "textfield",
			"heading" => esc_html__("Content length", "composer"),
			"param_name" => "module7_excerpt_length",
			"value" => "180",
			"description" => esc_html__("Enter excerpt length. Example: 180", "composer")
		),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Show Button", "composer"),
			"param_name" => "module7_show_button",
			"value" => array(
				esc_html__('Yes', "composer") => "yes", 
				esc_html__('No', "composer")  => "no"
			),
			"description" => esc_html__("Do you want to display button?", "composer")
		),

		array(
			"type" => "textfield",
			"heading" => esc_html__("Button Text", "composer"),
			"param_name" => "module7_show_button",
			"value" => esc_html__( 'Read More', 'composer' ),
			"description" => esc_html__("Type the button text", "composer")
		)

	);

	$module8 = array(

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Show Post Format Icon", "composer"),
			"param_name" => "module8_show_post_format_icon",
			"value" => array(
				esc_html__('Yes', "composer") => "yes", 
				esc_html__('No', "composer")  => "no"
			),
			"description" => esc_html__("Do you want to display post format icon", "composer")
		),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Show Category", "composer"),
			"param_name" => "module8_show_category",
			"value" => array(
				esc_html__('Yes', "composer") => "yes", 
				esc_html__('No', "composer")  => "no"
			),
			"description" => esc_html__("Do you want to display category?", "composer")
		),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Show Meta", "composer"),
			"param_name" => "module8_show_meta",
			"value" => array(
				esc_html__('On Bottom', "composer") => "on_bottom", 
				esc_html__('On Top', "composer")  => "on_top",
				esc_html__('Hide', "composer")  => "hide"
			),
			"description" => esc_html__("Do you want to show meta?", "composer")
		),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Show Meta Prefix", "composer"),
			"param_name" => "module8_meta_prefix",
			"value" => array(
				esc_html__('Yes', "composer") => "yes", 
				esc_html__('No', "composer")  => "no"
			),
			"description" => esc_html__("Do you want to show meta prefix?", "composer")
		),

		array(
			"type" => "textfield",
			"heading" => esc_html__("Title Length", "composer"),
			"param_name" => "module8_title_length",
			"value" => "30",
			"description" => esc_html__("Enter title length. Example: 30", "composer")
		),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Show Description", "composer"),
			"param_name" => "module8_show_description",
			"value" => array(
				esc_html__('Yes', "composer") => "yes", 
				esc_html__('No', "composer")  => "no"
			),
			"description" => esc_html__("Do you want to show description?", "composer")
		),

		array(
			"type" => "textfield",
			"heading" => esc_html__("Content length", "composer"),
			"param_name" => "module8_excerpt_length",
			"value" => "180",
			"description" => esc_html__("Enter excerpt length. Example: 180", "composer")
		),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Show Button", "composer"),
			"param_name" => "module8_show_button",
			"value" => array(
				esc_html__('Yes', "composer") => "yes", 
				esc_html__('No', "composer")  => "no"
			),
			"description" => esc_html__("Do you want to display button?", "composer")
		),

		array(
			"type" => "textfield",
			"heading" => esc_html__("Button Text", "composer"),
			"param_name" => "module8_show_button",
			"value" => esc_html__( 'Read More', 'composer' ),
			"description" => esc_html__("Type the button text", "composer")
		)

	);

	// Build default parameter
	$default = array_merge( $default, $query_builder );

	foreach ( $block as $key => $value ) {

		if( 'block1' == $key ) {

			// Set group name
			for ( $i=0; $i < count( $module1 ); $i++ ) { 
				$module1[$i]["group"] = esc_html__('Set 1', 'composer');
			}

			// Combine modules parameter with default parameter
			$param = array_merge( $default, $module1 );

			// Icon class for individual vc items
			$icon = 'icon-block1';
		}
		elseif( 'block2' == $key ) {

			// Set group name
			for ( $i=0; $i < count( $module2 ); $i++ ) { 
				$module2[$i]["group"] = esc_html__('Set 1', 'composer');
			}

			for ( $i=0; $i < count( $module3 ); $i++ ) { 
				$module3[$i]["group"] = esc_html__('Set 2', 'composer');
			}

			// Combine modules parameter with default parameter
			$param = array_merge( $default, $module2, $module3 );

			// Icon class for individual vc items
			$icon = 'icon-block2';
		}
		elseif( 'block3' == $key ) {

			// Set group name
			for ( $i=0; $i < count( $module2 ); $i++ ) { 
				$module2[$i]["group"] = esc_html__('Set 1', 'composer');
			}

			// Combine modules parameter with default parameter
			$param = array_merge( $default, $module2 );

			// Icon class for individual vc items
			$icon = 'icon-block3';
		}
		elseif( 'block4' == $key ) {

			// Set group name
			for ( $i=0; $i < count( $module4 ); $i++ ) { 
				$module4[$i]["group"] = esc_html__('Set 1', 'composer');
			}

			// Combine modules parameter with default parameter
			$param = array_merge( $default, $module4 );

			// Icon class for individual vc items
			$icon = 'icon-block4';
		}
		elseif( 'block5' == $key ) {

			// Set group name
			for ( $i=0; $i < count( $module4 ); $i++ ) { 
				$module4[$i]["group"] = esc_html__('Set 1', 'composer');
			}

			for ( $i=0; $i < count( $module3 ); $i++ ) { 
				$module3[$i]["group"] = esc_html__('Set 2', 'composer');
			}

			// Combine modules parameter with default parameter
			$param = array_merge( $default, $module4, $module3 );

			// Icon class for individual vc items
			$icon = 'icon-block5';
		}
		elseif( 'block6' == $key ) {

			// Set group name
			for ( $i=0; $i < count( $module3 ); $i++ ) { 
				$module3[$i]["group"] = esc_html__('Set 1', 'composer');
			}

			// Combine modules parameter with default parameter
			$param = array_merge( $default, $module3 );

			// Icon class for individual vc items
			$icon = 'icon-block6';
		}
		elseif( 'block7' == $key ) {

			// Set group name
			for ( $i=0; $i < count( $module5 ); $i++ ) { 
				$module5[$i]["group"] = esc_html__('Set 1', 'composer');
			}

			// Combine modules parameter with default parameter
			$param = array_merge( $default, $module5 );

			// Icon class for individual vc items
			$icon = 'icon-block7';
		}
		elseif( 'block8' == $key ) {

			// Set group name
			for ( $i=0; $i < count( $module6 ); $i++ ) { 
				$module6[$i]["group"] = esc_html__('Set 1', 'composer');
			}

			for ( $i=0; $i < count( $module3 ); $i++ ) { 
				$module3[$i]["group"] = esc_html__('Set 2', 'composer');
			}

			// Combine modules parameter with default parameter
			$param = array_merge( $default, $module6, $module3 );

			// Icon class for individual vc items
			$icon = 'icon-block8';
		}
		elseif( 'block9' == $key ) {

			// Set group name
			for ( $i=0; $i < count( $module7 ); $i++ ) { 
				$module7[$i]["group"] = esc_html__('Set 1', 'composer');
			}

			// Combine modules parameter with default parameter
			$param = array_merge( $default, $module7 );

			// Icon class for individual vc items
			$icon = 'icon-block9';
		}
		elseif( 'block10' == $key ) {

			// Set group name
			for ( $i=0; $i < count( $module8 ); $i++ ) { 
				$module8[$i]["group"] = esc_html__('Set 1', 'composer');
			}			

			// Combine modules parameter with default parameter
			$param = array_merge( $default, $module8 );

			// Icon class for individual vc items
			$icon = 'icon-block10';
		}

		// Blog Block
		vc_map( array(
			"name"     => $value, //Title
			"base"     => $key, //Shortcode name
			"class"    => "blocks",
			"icon"     => $icon,
			"category" => 'Magazine', //category
			"params"   => $param
		) );
	}