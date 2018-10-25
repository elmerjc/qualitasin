<?php

add_action('init','of_options');

if (!function_exists('of_options'))
{
	
	function of_options()
	{
		//Access the WordPress Categories via an Array
		$of_categories 		= array();
		$of_categories_obj 	= get_categories('hide_empty=0');
		foreach ($of_categories_obj as $of_cat) {
			$of_categories[$of_cat->cat_ID] = $of_cat->cat_name;}
		$categories_tmp 	= array_unshift($of_categories, "Select a category:");    
		   
		//Access the WordPress Pages via an Array
		$of_pages 			= array();
		$of_pages_obj 		= get_pages('sort_column=post_parent,menu_order');    
		foreach ($of_pages_obj as $of_page) {
			$of_pages[$of_page->ID] = $of_page->post_name; }
		$of_pages_tmp 		= array_unshift($of_pages, "Select a page:");       
	
		// Single Blog Style
		$single_blog_style = array(
			"style1" => esc_html__("Style1", "composer"),
			"style2" => esc_html__("Style2", "composer"),
			"style3" => esc_html__("Style3", "composer")
		);

		//Preloader Animation Style
		$preloader_trans_in = array(
			"fadeIn" => esc_html__("Fade In", "composer"),
			"fadeInUp" => esc_html__("Fade In Up", "composer"),
			"fadeInDown" => esc_html__("Fade In Down", "composer"),
			"fadeInLeft" => esc_html__("Fade In Left", "composer"),
			"fadeInRight" => esc_html__("Fade In Right", "composer"),
			"zoomIn" => esc_html__("Zoom In", "composer"),
			"zoomInUp" => esc_html__("Zoom In Up", "composer"),
			"zoomInDown" => esc_html__("Zoom In Down", "composer"),
			"zoomInLeft" => esc_html__("Zoom In Left", "composer"),
			"zoomInRight" => esc_html__("Zoom In Right", "composer")
		);

		//Single Portfolio
		$style = array(
			"style1" => esc_html__("Style1", "composer"),
			"style2" => esc_html__("Style2", "composer"),
			"style3" => esc_html__("Style3", "composer"),
			"style4" => esc_html__("Style4", "composer"),
			"style5" => esc_html__("Style5", "composer"),
			"style6" => esc_html__("Style6", "composer")
		);

		$pagination = array( "number" => "Number", "load_more" => "Load More Button", "autoload" => "Autoload", "text" => "Text" );

		//Blog & Single Blog & Archives
		$sidebar = array(
			"left-sidebar" => esc_html__("Left Sidebar", "composer"),
			"right-sidebar" => esc_html__("Right Sidebar", "composer"),
			"full-width" => esc_html__("Full Width", "composer")
		);
		$blog_styles = array(
			"masonry" => esc_html__("Masonry", "composer"),
			"grid" => esc_html__("Grid", "composer"),
			"normal" => esc_html__("Normal", "composer")
		);
		$shop_styles = array(
			"default" => esc_html__("Grid", "composer"),
			"masonry" => esc_html__("Masonry", "composer")
		);

		$animation = array(
			"flash" => esc_html__("flash", "composer"),
			"bounce" => esc_html__("bounce", "composer"),
			"shake" => esc_html__("shake", "composer"),
			"tada" => esc_html__("tada", "composer"),
			"swing" => esc_html__("swing", "composer"),
			"wobble" => esc_html__("wobble", "composer"),
			"pulse" => esc_html__("pulse", "composer"),
			"flip" => esc_html__("flip", "composer"),
			"flipInX" => esc_html__("flipInX", "composer"),
			"flipInY" => esc_html__("flipInY", "composer"),
			"fadeIn" => esc_html__("fadeIn", "composer"),
			"fadeInUp" => esc_html__("fadeInUp", "composer"),
			"fadeInDown" => esc_html__("fadeInDown", "composer"),
			"fadeInLeft" => esc_html__("fadeInLeft", "composer"),
			"fadeInRight" => esc_html__("fadeInRight", "composer"),
			"fadeInUpBig" => esc_html__("fadeInUpBig", "composer"),
			"fadeInDownBig" => esc_html__("fadeInDownBig", "composer"),
			"fadeInLeftBig" => esc_html__("fadeInLeftBig", "composer"),
			"fadeInRightBig" => esc_html__("fadeInRightBig", "composer"),
			"slideInDown" => esc_html__("slideInDown", "composer"),
			"slideInLeft" => esc_html__("slideInLeft", "composer"),
			"slideInRight" => esc_html__("slideInRight", "composer"),
			"bounceIn" => esc_html__("bounceIn", "composer"),
			"bounceInUp" => esc_html__("bounceInUp", "composer"),
			"bounceInDown" => esc_html__("bounceInDown", "composer"),
			"bounceInLeft" => esc_html__("bounceInLeft", "composer"),
			"bounceInRight" => esc_html__("bounceInRight", "composer"),
			"rotateIn" => esc_html__("rotateIn", "composer"),
			"rotateInDownLeft" => esc_html__("rotateInDownLeft", "composer"),
			"rotateInDownRight" => esc_html__("rotateInDownRight", "composer"),
			"rotateInUpLeft" => esc_html__("rotateInUpLeft", "composer"),
			"rotateInUpRight" => esc_html__("rotateInUpRight", "composer"),
			"lightSpeedIn" => esc_html__("lightSpeedIn", "composer"),
			"hinge" => esc_html__("hinge", "composer"),
			"rollIn" => esc_html__("rollIn", "composer")
		);
		
		$order_by = array(
			"date" => esc_html__("Date", "composer"),
			"title" => esc_html__("Title", "composer"),
			"rand" => esc_html__("Random", "composer")
		); 
		$order = array(
			"asc" => esc_html__("Ascending", "composer"),
			"desc" => esc_html__("Descending", "composer")
		);
		$sub_header_size = array(
			"small" => esc_html__("Small", "composer"),
			"medium" => esc_html__("Medium", "composer"),
			"large" => esc_html__("Large", "composer")
		);
		$sub_header_bg_style = array(
			"color" => esc_html__("Default Background Color", "composer"),
			"image" => esc_html__("Background Image", "composer"),
			"customcolor" => esc_html__("Custom Background Color", "composer")
		);

		$args = array(
	       'public'   => true,
	       '_builtin' => false,
	    );

	    $post_types = get_post_types( $args );

		$post_types = array_merge( $post_types, array( 'post' => 'post', 'page' => 'page' ) );
		foreach ( $post_types as $key => $post_type ) {
			$obj = get_post_type_object( $post_type );
			$search_exclude[$key] = $obj->label;
		}

		if (class_exists('WooCommerce')) {
			$blocks = array( 
				"blog_blocks"          => esc_html__("Blog Blocks", "composer"),
				"grid_blog_blocks"     => esc_html__("Grid Blog Blocks", "composer"),
				"featured_blog_blocks" => esc_html__("Featured Blog Blocks", "composer"),
				"portfolio_blocks"     => esc_html__("Portfolio Blocks", "composer"),
				"shop_blocks"          => esc_html__("Shop Blocks", "composer"),
				"gallery_blocks"       => esc_html__("Gallery Blocks", "composer")
			);

			$block_default = array( 'blog_blocks', 'grid_blog_blocks', 'featured_blog_blocks', 'portfolio_blocks', 'shop_blocks', 'gallery_blocks' );
		}
		else {
			$blocks = array( 
				"blog_blocks"          => esc_html__("Blog Blocks", "composer"),
				"grid_blog_blocks"     => esc_html__("Grid Blog Blocks", "composer"),
				"featured_blog_blocks" => esc_html__("Featured Blog Blocks", "composer"),
				"portfolio_blocks"     => esc_html__("Portfolio Blocks", "composer"),
				"shop_blocks"          => esc_html__("Shop Blocks", "composer"),
				"gallery_blocks"       => esc_html__("Gallery Blocks", "composer")
			);

			$block_default = array( 'blog_blocks', 'grid_blog_blocks', 'featured_blog_blocks', 'portfolio_blocks', 'gallery_blocks' );
		}

		//Body & Footer Background Options
		$url =  COMPOSER_ADMIN_DIR . 'assets/images/';

		$headers = array(
			'header-1'      => $url . 'header-layout/header1.png',
			'header-2'      => $url . 'header-layout/header2.png',
			'header-3'      => $url . 'header-layout/header3.png',
			'header-4'      => $url . 'header-layout/header4.png',
			'header-5'      => $url . 'header-layout/header5.png',
			'header-6'      => $url . 'header-layout/header6.png',
			'header-7'      => $url . 'header-layout/header7.png',
			'header-8'      => $url . 'header-layout/header8.png',
			'header-9'      => $url . 'header-layout/header9.png',
			'header-10'      => $url . 'header-layout/header10.png',
			'left-header'  => $url . 'header-layout/header-11.png',
			'right-header' => $url . 'header-layout/header-12.png'
			);

		$headers_hover = array(
			'none'                                => $url . 'menu/none.png',
			'drive-nav'                           => $url . 'menu/drive-nav.png',
			'nav-border'                          => $url . 'menu/nav-border.png',
			'nav-double-border'                   => $url . 'menu/nav-double-border.png',
			'nav-border nav-border-bottom'        => $url . 'menu/nav-border-halfline.png',
			'right-arrow'                         => $url . 'menu/right-arrow.png',
			'right-arrow cross-arrow'             => $url . 'menu/cross-arrow.png',
			'background-nav'                      => $url . 'menu/background-nav.png',
			'background-nav background-nav-round' => $url . 'menu/background-nav-round.png',
			'solid-color-bg'                      => $url . 'menu/solid-color-bg.png',
			'square-left-right'                   => $url . 'menu/square-left-right.png',
			);

		$footer = array(
			'col3'      => $url . '/footer-layout/3col.png',
			'col4'      => $url . '/footer-layout/4col.png',
			'layout1'  => $url . 'footer-layout/layout1.png',
			'layout2'  => $url . 'footer-layout/layout2.png',
			'layout3'  => $url . 'footer-layout/layout3.png',
			'layout4'  => $url . 'footer-layout/layout4.png',
			'layout5'  => $url . 'footer-layout/layout5.png',
			'layout6'  => $url . 'footer-layout/layout6.png',
			'layout7'  => $url . 'footer-layout/layout7.png',
			'layout8'  => $url . 'footer-layout/layout8.png',
			'layout9'  => $url . 'footer-layout/layout9.png',
			'layout10' => $url . 'footer-layout/layout10.png',
			'layout11' => $url . 'footer-layout/layout11.png',
			'layout12' => $url . 'footer-layout/layout12.png',
			'layout13' => $url . 'footer-layout/layout13.png',
			'layout14' => $url . 'footer-layout/layout14.png',
			'layout15' => $url . 'footer-layout/layout15.png',
			'layout16' => $url . 'footer-layout/layout16.png',
			'layout17' => $url . 'footer-layout/layout17.png',
			'layout18' => $url . 'footer-layout/layout18.png',
			'layout19' => $url . 'footer-layout/layout19.png',
			'layout20' => $url . 'footer-layout/layout20.png'
			);

		$pattern = array(
			'none'  => $url . 'none.png',
			'pat-1' => $url . 'pat-1.png',
			'pat-2' => $url . 'pat-2.png',
			'pat-3' => $url . 'pat-3.png',
			'pat-4' => $url . 'pat-4.png',
			'pat-5' => $url . 'pat-5.png',
			);

		$bg_attachment = array(
			"fixed" => esc_html__("Fixed", "composer"),
			"scroll" => esc_html__("Scroll", "composer")
			);
		$bg_size = array(
			"auto" => esc_html__("Auto", "composer"),
			"cover" => esc_html__("Cover", "composer"),
			"contain" => esc_html__("Contain", "composer")
			);
		$bg_repeat = array(
			"repeat" => esc_html__("Repeat", "composer"),
			"repeat-x" => esc_html__("Repeat-x", "composer"),
			"Repeat-Y" => esc_html__("Repeat-Y", "composer"),
			"no-repeat" => esc_html__("No Repeat", "composer")
			);

		//font sizes
		$font_sizes = array();
		for ($i = 9; $i < 50; $i++){ 
			$font_sizes[$i.'px'] = $i.'px'; 
		}

		//Header & Footer widget columns
		$columns = array(
			"col3" => esc_html__("Three", "composer"),
			"col4" => esc_html__("Four", "composer")
			);
		

		/*-----------------------------------------------------------------------------------*/
		/* TO DO: Add options/functions that use these */
		/*-----------------------------------------------------------------------------------*/
		
		//More Options
		$uploads_arr 		= wp_upload_dir();
		$all_uploads_path 	= $uploads_arr['path'];
		$all_uploads 		= get_option('of_uploads');
		$other_entries 		= array("Select a number:","1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19");
		$body_repeat 		= array("no-repeat","repeat-x","repeat-y","repeat");
		$body_pos 			= array("top left","top center","top right","center left","center center","center right","bottom left","bottom center","bottom right");
		
		// Image Alignment radio box
		$of_options_thumb_align = array("alignleft" => "Left","alignright" => "Right","aligncenter" => "Center"); 
		
		// Image Links to Options
		$of_options_image_link_to = array("image" => "The Image","post" => "The Post");

		$theme_color_url =  COMPOSER_ADMIN_DIR . 'assets/images/color-bg/';

		$args = array(
			'sort_order' => 'asc',
			'sort_column' => 'post_title',
			'hierarchical' => 1,					
			'include' => '',
			'meta_key' => '',
			'meta_value' => '',
			'authors' => '',
			'child_of' => 0,
			'parent' => -1,
			'exclude_tree' => '',
			'number' => '',
			'offset' => 0,
			'post_type' => 'page',
			'post_status' => 'publish'
		); 

		if ( class_exists('WooCommerce') && is_admin() ) {
			$args['exclude'] = array(
				get_option( 'woocommerce_shop_page_id' ), 
				get_option( 'woocommerce_cart_page_id' ), 
				get_option( 'woocommerce_checkout_page_id' ),
				get_option( 'woocommerce_pay_page_id' ), 
				get_option( 'woocommerce_thanks_page_id' ), 
				get_option( 'woocommerce_myaccount_page_id' ), 
				get_option( 'woocommerce_edit_address_page_id' ), 
				get_option( 'woocommerce_view_order_page_id' ), 
				get_option( 'woocommerce_terms_page_id' )
			);
		}

		$pages = get_pages($args);
		$all_pages = array( '' => __('Choose A Page', 'composer' ) );

		$all_pages['dashboard'] = esc_html__( 'Dashboard', 'composer' );
		foreach ($pages as $page) {
			$all_pages[$page->ID] = $page->post_title;
		}

		/*$editable_roles = get_editable_roles();
	    foreach ( $editable_roles as $role => $details ) {
	    	$role = str_replace('_', ' ', $role );
	        $roles[$role] = esc_html( ucwords( $role ) );
	    }
	    $roles['administrator'] = esc_html( ucwords( 'administrator' ) );*/

/*-----------------------------------------------------------------------------------*/
/* The Options Array */
/*-----------------------------------------------------------------------------------*/

// Set the Options Array
global $of_options;
$of_options = array();

//Top Header
$of_options[] = array( "name" => esc_html__("Top Header", 'composer' ),
					"type" => "heading",
					"custom_class" => "top-header");

$of_options[] = array(  "name"  => esc_html__("Show Top Header?", 'composer' ),
						"desc"  => esc_html__("Choose 'Yes' to enable top header.", 'composer' ),
						"id"    => "top_header",
						"std"   => "hide",
						"folds" => 1,
						"options"	=> array(
							"show" => esc_html__("Yes", "composer"),
							"hide" => esc_html__("No", "composer")
						),
						"type"  => "switch"
					);

$of_options[] = array(  "name"  => esc_html__("Top Header Position", 'composer' ),
						"desc"  => esc_html__("Choose top header position.", 'composer' ),
						"id"    => "top_header_position",
						"std"   => "top",
						"fold" 	=> array( "top_header" => array('show')),
						"options"	=> array(
							"top" => esc_html__("Top", "composer"),
							"bottom" => esc_html__("Bottom", "composer")
						),
						"type"  => "switch"
					);

$of_options[] = array( 	"name" 		=> esc_html__("Top Header Background Style", 'composer' ),
						"desc" 		=> esc_html__("Select Top Header Background Style. Dark = White Text and Black Background; Light = Black Text and White Background.", 'composer' ),
						"id" 		=> "top_section_style",
						"std" 		=> "light",
						"fold" 		=> array( "top_header" => array('show') ),
						"options"	=> array(
							"dark" => esc_html__("Dark", "composer"),
							"light" => esc_html__("Light", "composer")
						),
						"type" 		=> "switch"
				);

$of_options[] = array(  "name"  => esc_html__("Top Header on Mobile?", 'composer' ),
						"desc"  => esc_html__("Choose 'Show' or 'Hide' top header on Mobile.", 'composer' ),
						"id"    => "top_header_mobile",
						"std"   => "hide",
						"options"	=> array(
							"show" => esc_html__("Show", "composer"),
							"hide" => esc_html__("Hide", "composer")
						),
						"type"  => "switch"
					);

$of_options[] = array(
					"id" => "introduction",
					"std" => '<h3>'. esc_html__( 'Email and Phone Number in Top left', 'composer' ) . '</h3>' . esc_html__('Enter the value to display email and phone, Leave it empty if you don\'t want display', 'composer' ),
					"icon" => true,
					"type" => "info");							
					
					
$of_options[] = array( "name" => esc_html__("Email", 'composer' ),
					"desc" => esc_html__("Please Enter Email address.", 'composer' ),
					"id" => "top_email",
					"std" => "info@yoursite.com",
					"type" => "text"); 		
					
$of_options[] = array( "name" => esc_html__("Telephone", 'composer' ),
					"desc" => esc_html__("Please Enter Telephone Number.", 'composer' ),
					"id" => "top_tel",
					"std" => "+ (009) 123 4567",
					"type" => "text");

$of_options[] = array( "name" => esc_html__("Top Header Text", 'composer' ),
					"desc" => esc_html__("Please Enter Text Here.", 'composer' ),
					"id" => "top_text",
					"std" => "Enter Your Text...",
					"type" => "textarea");

$of_options[] = array( "name" => esc_html__("Shortcode", 'composer' ),
					"desc" => esc_html__("Please Enter Shortcode Here.", 'composer' ),
					"id" => "shortcode_text",
					"std" => "",
					"type" => "textarea");

$of_options[] = array( 
					"id" => "introduction",
					"std" => '<h3>'. esc_html__( 'Social Networking Icons', 'composer' ) . '</h3>' . esc_html__('Enter the url to display social networking icons you want, Leave it empty if you don\'t want display', 'composer' ),
					"icon" => true,
					"type" => "info");
					
$of_options[] = array( "name" => esc_html__("Facebook URL", 'composer' ),
					"desc" => esc_html__("Please Enter Facebook URL, This will display in header.", 'composer' ),
					"id" => "top_facebook",
					"std" => "",
					"type" => "text"); 					

$of_options[] = array( "name" => esc_html__("Twitter", 'composer' ),
					"desc" => esc_html__("Please Enter Twitter Username, This will display in header.", 'composer' ),
					"id" => "top_twitter",
					"std" => "",
					"type" => "text");
										
$of_options[] = array( "name" => esc_html__("Google Plus URL", 'composer' ),
					"desc" => esc_html__("Please Enter Google Plus URL, This will display in header.", 'composer' ),
					"id" => "top_gplus",
					"std" => "",
					"type" => "text");
										
$of_options[] = array( "name" => esc_html__("LinkedIn URL", 'composer' ),
					"desc" => esc_html__("Enter your full linkedIn URL, This will display in header.", 'composer' ),
					"id" => "top_linkedin",
					"std" => "",
					"type" => "text");
										
$of_options[] = array( "name" => esc_html__("Dribble URL", 'composer' ),
					"desc" => esc_html__("Enter your full dribble URL, This will display in header.", 'composer' ),
					"id" => "top_dribble",
					"std" => "",
					"type" => "text");
										
$of_options[] = array( "name" => esc_html__("Instagram URL", 'composer' ),
					"desc" => esc_html__("Enter your full instagram URL, This will display in header.", 'composer' ),
					"id" => "top_instagram",
					"std" => "",
					"type" => "text"
				);
										
$of_options[] = array( "name" => esc_html__("Flickr URL", 'composer' ),
					"desc" => esc_html__("Enter your full flickr URL, This will display in header.", 'composer' ),
					"id" => "top_flickr",
					"std" => "",
					"type" => "text");
										
$of_options[] = array( "name" => esc_html__("Pinterest URL", 'composer' ),
					"desc" => esc_html__("Enter your full Pinterest URL, This will display in header.", 'composer' ),
					"id" => "top_pinterest",
					"std" => "",
					"type" => "text");
					
$of_options[] = array( "name" => esc_html__("Tumblr URL", 'composer' ),
					"desc" => esc_html__("Enter your full Tumblr URL, This will display in header.", 'composer' ),
					"id" => "top_tumblr",
					"std" => "",
					"type" => "text");
										
$of_options[] = array( "name" => esc_html__("RSS URL", 'composer' ),
					"desc" => esc_html__("Enter your full rss URL, This will display in header.", 'composer' ),
					"id" => "top_rss",
					"std" => "",
					"type" => "text"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Header Options", 'composer' ),
						"type" 		=> "heading"
				);

$of_options[] = array(  "name"  => esc_html__("Show/Hide Header", 'composer' ),
						"desc"  => esc_html__("Do you want to display Header?", 'composer' ),
						"id"    => "header_hide",
						"std"   => "show",
						"options"	=> array(
							"show" => esc_html__("Show", "composer"),
							"hide" => esc_html__("Hide", "composer")
						),
						"type"  => "switch"
					);

$of_options[] = array( 	"name" 		=> esc_html__("Header Layout Style.", 'composer' ),
						"desc" 		=> esc_html__("Choose Header Layout. Boxed = max header width is 1200px; Wide = header covers the viewport.", 'composer' ),
						"id" 		=> "header_width",
						"std" 		=> "wide",
						"options"	=> array(
							"wide" => esc_html__("Wide", "composer"),
							"boxed" => esc_html__("Boxed", "composer")
						),
						"type" 		=> "switch"
					);

$of_options[] = array( 	"name" 		=> esc_html__("Main Header Layout", 'composer' ),
						"id" 		=> "header_layout",
						"std" 		=> "header-2",
						"type" 		=> "images",
						"options" 	=> $headers
				);

$of_options[] = array( 	"name" 		=> esc_html__("Left and Right Header Menu Alignment", 'composer' ),
						"desc" 		=> esc_html__("Select menu alignment on left and right header.", 'composer' ),
						"id" 		=> "lr_menu_align",
						"std" 		=> "center",
						"options"	=> array(
							"center" => esc_html__("Center", "composer"),
							"top" => esc_html__("Top", "composer")
						),
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Left and Right Header Text Alignment", 'composer' ),
						"desc" 		=> esc_html__("Select text alignment on left and right header.", 'composer' ),
						"id" 		=> "lr_text_align",
						"std" 		=> "left",
						"options"	=> array(
							"center" => esc_html__("Center", "composer"),
							"left" => esc_html__("Left", "composer")
						),
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Menu Border for Left and Right Header", 'composer' ),
						"desc" 		=> esc_html__("Do you Want to add border on Menu?", 'composer' ),
						"id" 		=> "lr_nav_line",
						"std" 		=> "yes",
						"options"	=> array(
							"yes" => esc_html__("Yes", "composer"),
							"no" => esc_html__("No", "composer")
						),
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Header Hover Style", 'composer' ),
						"id" 		=> "header_hover_layout",
						"std" 		=> "none",
						"type" 		=> "images",
						"options" 	=> $headers_hover
				);

$of_options[] = array( 	"name" 		=> esc_html__("Header Background Style", 'composer' ),
						"desc" 		=> esc_html__("Select header background style. Dark = White Text and Black Background; Light = Black Text and White Background.", 'composer' ),
						"id" 		=> "header_background_style",
						"std" 		=> "light",
						"options"	=> array(
							"dark" => esc_html__("Dark", "composer"),
							"light" => esc_html__("Light", "composer")
						),
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Show/Hide Header border on Bottom?", 'composer' ),
						"desc" 		=> esc_html__("Show/Hide header border on bottom", 'composer' ),
						"id" 		=> "header_line",
						"std" 		=> "yes",
						"options"	=> array(
							"yes" => esc_html__("Yes", "composer"),
							"no" => esc_html__("No", "composer")
						),
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Enable Transparent Header", 'composer' ),
						"desc" 		=> esc_html__("Do you like to enable transparent header?", 'composer' ),
						"id" 		=> "transparent_header",
						"std" 		=> "hide",
						"folds"		=> 1,
						"options"	=> array(
							"show" => esc_html__("Yes", "composer"),
							"hide" => esc_html__("No", "composer")
						),
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Choose Percentage of Header Transparency", 'composer' ),
						"desc" 		=> esc_html__("How much transparency you want to apply for header", 'composer' ),
						"id" 		=> "transparent_header_opacity",
						"std" 		=> "0",
						"min" 		=> "0",
						"step"		=> "10",
						"max" 		=> "90",
						"fold" 		=> array( "transparent_header"=> array('show') ),
						"type" 		=> "sliderui" 
				);

$of_options[] = array( 	"name" 		=> esc_html__("Sticky Header", 'composer' ),
						"desc" 		=> esc_html__("Enable or disable Sticky Header from here", 'composer' ),
						"id" 		=> "header_sticky",
						"std" 		=> "scroll_up",
						"options"	=> array(
							"disable" => esc_html__("Disable", "composer"),
							"enable" => esc_html__("Enable", "composer"),
							"scroll_up" => esc_html__("Show On Scroll Up", "composer")
						),
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Enable Sticky Header on Mobile Devices?", 'composer' ),
						"desc" 		=> esc_html__("Enable or Disable Sticky Header on Mobile Devices from here", 'composer' ),
						"id" 		=> "header_sticky_responsive",
						"std" 		=> "disable",
						"options"	=> array(
							"disable" => esc_html__("Disable", "composer"),
							"enable" => esc_html__("Enable", "composer")
						),
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Sticky Header Background", 'composer' ),
						"desc" 		=> esc_html__("Select Sticky Background Color", 'composer' ),
						"id" 		=> "header_sticky_color",
						"std" 		=> "light",
						"options"	=> array(
							"dark" => esc_html__("Dark", "composer"),
							"light" => esc_html__("Light", "composer")
						),
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Show/Hide Header Widget", 'composer' ),
						"desc" 		=> esc_html__("Do you want to display the header widget?", 'composer' ),
						"id" 		=> "header_widget",
						"std" 		=> "hide",
						"folds"		=> 1,
						"options"	=> array(
							"show" => esc_html__("Show", "composer"),
							"hide" => esc_html__("Hide", "composer")
						),
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Header Widget Columns", 'composer' ),
						"desc" 		=> esc_html__("Choose the header widget columns", 'composer' ),
						"id" 		=> "header_widget_col",
						"std" 		=> "col3",
						"fold" 		=> array( "header_widget" => array('show') ),
						"type" 		=> "select",
						"options" 	=> $columns
				);

$of_options[] = array( "name" => esc_html__("Choose the Registered Sidebar", 'composer' ),
					"desc" => esc_html__("Please choose the sidebar you have created", 'composer' ),
					"id" => "header_select_sidebar",
					"std" => "0",
					"fold" => array( "header_widget" => array('show') ),
					"type" => "select_sidebar",
					"hide" => array('header-widgets')
					);

$of_options[] = array( 	"name" 		=> esc_html__("Main Menu Style", 'composer' ),
						"desc" 		=> esc_html__("Select main menu style.", 'composer' ),
						"id" 		=> "main_menu",
						"std" 		=> "dark",
						"options"	=> array(
							"dark" => esc_html__("Dark", "composer"),
							"light" => esc_html__("Light", "composer")
						),
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> esc_html__("DropDown Menu Style", 'composer' ),
						"desc" 		=> esc_html__("Select dropdown menu style.", 'composer' ),
						"id" 		=> "sub_menu",
						"std" 		=> "light",
						"options"	=> array(
							"dark" => esc_html__("Dark", "composer"),
							"light" => esc_html__("Light", "composer")
						),
						"type" 		=> "switch"
				);

$of_options[] = array(  "name"  => esc_html__("Menu on Mobile?", 'composer' ),
						"desc"  => esc_html__("Choose 'Show' or 'Hide' Menu on Mobile.", 'composer' ),
						"id"    => "display_menu",
						"std"   => "show",
						"options"	=> array(
							"show" => esc_html__("Show", "composer"),
							"hide" => esc_html__("Hide", "composer")
						),
						"type"  => "switch"
					);

$of_options[] = array( 	"name" 		=> esc_html__("Mobile Menu Alignment", 'composer' ),
						"desc" 		=> esc_html__("Select mobile menu alignment.", 'composer' ),
						"id" 		=> "mobile_menu_align",
						"std" 		=> "left",
						"options"	=> array(
							"left" => esc_html__("Left", "composer"),
							"right" => esc_html__("Right", "composer")
						),
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Mobile Menu Dropdown", 'composer' ),
						"desc" 		=> esc_html__("Choose Yes to show sub menus (as dropdown) in mobile menu.", 'composer' ),
						"id" 		=> "mobile_menu_dropdown",
						"std" 		=> "yes",
						"options"	=> array(
							"yes" => esc_html__("Yes", "composer"),
							"no" => esc_html__("No", "composer")
						),
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Show Language Selector", 'composer' ),
						"desc" 		=> esc_html__("Do you want to display language selector?", 'composer' ),
						"id" 		=> "show_lang_sel",
						"std" 		=> "no",
						"options"	=> array(
							"yes" => esc_html__("Yes", "composer"),
							"no" => esc_html__("No", "composer")
						),
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> esc_html__("WPML Language Selector Style", 'composer' ),
						"desc" 		=> esc_html__("Choose Language Selector Style", 'composer' ),
						"id" 		=> "wpml_lang_style",
						"std" 		=> "normal",
						"type" 		=> "select",
						"options" 	=> array( 
							'normal' => esc_html__('Normal', "composer"), 
							'dropdown' => esc_html__('Dropdown', "composer") 
						)
				);

$of_options[] = array( 	"name" 		=> esc_html__("WPML Language Display Style", 'composer' ),
						"desc" 		=> esc_html__("Choose Language Display Style", 'composer' ),
						"id" 		=> "language_style",
						"std" 		=> "flag",
						"type" 		=> "select",
						"options" 	=> array( 
							'lang_code' => esc_html__('Language Code', "composer"), 
							'lang_name' => esc_html__('Language Name', "composer"), 
							'flag' => esc_html__('Flag', "composer"), 
							'flag_with_name' => esc_html__('Flag With Name', "composer") 
						)
				);

$of_options[] = array( 	"name" 		=> esc_html__("How to handle languages without translation", 'composer' ),
						"desc" 		=> esc_html__("What you want to do when pages/elements not translationed for that language? Skip missing language or Link to home of language for missing translations", 'composer' ),
						"id" 		=> "skip_missing_lang",
						"std" 		=> "yes",
						"options"	=> array(
							"yes" => esc_html__("Skip language", "composer"),
							"no" => esc_html__("Link to home of language", "composer")
						),
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Body Background Color", 'composer' ),
						"desc" 		=> esc_html__("It applies body background color for all pages", 'composer' ),
						"id" 		=> "body_bgcolor",
						"std" 		=> "#ffffff",
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Body Container Background Color", 'composer' ),
						"desc" 		=> esc_html__("It applies body background color for all pages", 'composer' ),
						"id" 		=> "body_container_bgcolor",
						"std" 		=> "#ffffff",
						"type" 		=> "color"
				);

$of_options[] = array(  "name"  => esc_html__("Show/Hide Title Bar", 'composer' ),
						"desc"  => esc_html__("Do you want to display title bar?", 'composer' ),
						"id"    => "title_bar",
						"std"   => "show",
						"folds" => 1,
						"options"	=> array(
							"show" => esc_html__("Show", "composer"),
							"hide" => esc_html__("Hide", "composer")
						),
						"type"  => "switch"
					);

$of_options[] = array(  "name"  => esc_html__("Show/Hide breadcrumbs", 'composer' ),
						"desc"  => esc_html__("Do you want to display breadcrumbs?", 'composer' ),
						"id"    => "breadcrumbs",
						"std"   => "show",
						"fold" 	=> array( "title_bar" => array('show') ), 
						"options"	=> array(
							"show" => esc_html__("Show", "composer"),
							"hide" => esc_html__("Hide", "composer")
						),
						"type"  => "switch"
					);

$of_options[] = array( 	"name" 		=> esc_html__("Title Bar Style", 'composer' ),
						"desc" 		=> esc_html__("Select title bar style", 'composer' ),
						"id" 		=> "title_bar_style",
						"std" 		=> "default",
						"type" 		=> "select",
						'options' 	  => array(
							'default'   => esc_html__('Default', "composer"),
							'custom'  => esc_html__('Custom', "composer")
						),
						"fold" 		=> array( "title_bar" => array('show') )
				);

$of_options[] = array( 	"name" 		=> esc_html__("Title Bar Size", 'composer' ),
						"desc" 		=> esc_html__("Select title bar size", 'composer' ),
						"id" 		=> "title_bar_size",
						"std" 		=> "small",
						"type" 		=> "select",
						'options' 	  => array(
							'small'   => esc_html__('Small', "composer"),
							'medium'  => esc_html__('Medium', "composer"),
							'large'   => esc_html__('Large', "composer")
						),
						"fold" 		=> array( "title_bar" => array('show') )
				);

$of_options[] = array( 	"name" 		=> esc_html__("Title bar background color", 'composer' ),
						"desc" 		=> esc_html__("It applies title bar background color", 'composer' ),
						"id" 		=> "title_bar_bg_color",
						"std" 		=> "",
						"type" 		=> "color",
						"fold" 		=> array( "title_bar" => array('show') )
				);

$of_options[] = array( "name" => esc_html__("Upload Title bar background image", 'composer' ),
					"desc" => esc_html__("It applies title bar background image.", 'composer' ),
					"id" => "title_bar_bg_image",
					"std" => '',
					"mod" => "min",
					"type" => "media",
					"fold" 		=> array( "title_bar" => array('show') )
				);

$of_options[] = array( 	"name" 		=> esc_html__("Title Bar overlay", 'composer' ),
						"desc" 		=> esc_html__("Background Overlay Style", 'composer' ),
						"id" 		=> "title_bar_overlay",
						"std" 		=> "color",
						"type" 		=> "select",
						'options' 	  => array(
							'gradient'   => esc_html__('Gradient', "composer"),
							'color'  => esc_html__('Color', "composer")
						),
						"fold" 		=> array( "title_bar" => array('show') )
				);

$of_options[] = array( 	"name" 		=> esc_html__("Title bar overlay color", 'composer' ),
						"desc" 		=> esc_html__("It applies title bar background overlay color", 'composer' ),
						"id" 		=> "title_bar_overlay_color",
						"std" 		=> "",
						"type" 		=> "color",
						"fold" 		=> array( "title_bar" => array('show') )
				);

$of_options[] = array( 	"name" 		=> esc_html__("Overlay Gradient Top Value", 'composer' ),
						"desc" 		=> esc_html__("It applies title bar background overlay color", 'composer' ),
						"id" 		=> "title_bar_gradient_top_value",
						"std" 		=> "",
						"type" 		=> "color",
						"fold" 		=> array( "title_bar" => array('show') )
				);

$of_options[] = array( 	"name" 		=> esc_html__("Overlay Gradient Middle Value", 'composer' ),
						"desc" 		=> esc_html__("It applies title bar background overlay color", 'composer' ),
						"id" 		=> "title_bar_gradient_middle_value",
						"std" 		=> "",
						"type" 		=> "color",
						"fold" 		=> array( "title_bar" => array('show') )
				);

$of_options[] = array( 	"name" 		=> esc_html__("Overlay Gradient Bottom Value", 'composer' ),
						"desc" 		=> esc_html__("It applies title bar background overlay color", 'composer' ),
						"id" 		=> "title_bar_gradient_bottom_value",
						"std" 		=> "",
						"type" 		=> "color",
						"fold" 		=> array( "title_bar" => array('show') )
				);

$of_options[] = array( 	"name" 		=> esc_html__("Overlay Gradient Opacity", 'composer' ),
						"desc" 		=> esc_html__("Type the alpha value. Eg: 0.1 to 1.0", 'composer' ),
						"id" 		=> "title_bar_gradient_opacity",
						"std" 		=> "0.9",
						"type" 		=> "text",
						"fold" 		=> array( "title_bar" => array('show') )
				);

$of_options[] = array( 	"name" 		=> esc_html__("Title bar text color", 'composer' ),
						"desc" 		=> esc_html__("It applies title bar text color", 'composer' ),
						"id" 		=> "title_bar_text_color",
						"std" 		=> "",
						"type" 		=> "color",
						"fold" 		=> array( "title_bar" => array('show') )
				);

//General Settings
$of_options[] = array( "name" => esc_html__("General", 'composer' ),
					"type" => "heading");
					
$of_options[] = array(
					"id" => "introduction",
					"std" => '<h3>'. esc_html__( 'Welcome to the composer WordPress Responsive Theme.', 'composer' ) . '</h3>' . esc_html__('Adjust the options here and change the theme like you want', 'composer' ),
					"icon" => true,
					"type" => "info");
					
$of_options[] = array( "name" => esc_html__("Upload Logo", 'composer' ),
						"desc" => esc_html__("Upload a custom logo. Height should be within 116px.", 'composer' ),
						"id" => "custom_logo",
						"std" => get_template_directory_uri().'/_images/logo.png',
						"mod" => "min",
						"type" => "media"
					);

$of_options[] = array( "name" => esc_html__("Upload Retina Logo", 'composer' ),
						"desc" => esc_html__("Upload a retina logo. width and should be double size (width X 2 & height X 2) of above (original) logo.", 'composer' ),
						"id" => "retina_logo",
						"std" => get_template_directory_uri().'/_images/retina-logo.png',
						"mod" => "min",
						"type" => "media"
					);

$of_options[] = array( "name" => esc_html__("Upload White Logo", 'composer' ),
						"desc" => esc_html__("Upload a custom white logo. Height should be within 80px.", 'composer' ),
						"id" => "custom_logo_light",
						"std" => get_template_directory_uri().'/_images/logo-white.png',
						"mod" => "min",
						"type" => "media"
					);

$of_options[] = array( "name" => esc_html__("Upload Retina White Logo", 'composer' ),
						"desc" => esc_html__("Upload a retina white logo. width and should be double size (width X 2 & height X 2) of above (original) logo.", 'composer' ),
						"id" => "retina_logo_light",
						"std" => get_template_directory_uri().'/_images/retina-logo-white.png',
						"mod" => "min",
						"type" => "media"
					);
					
$of_options[] = array( "name" => esc_html__("Upload sticky Logo", 'composer' ),
						"desc" => esc_html__("Upload a sticky logo.", 'composer' ),
						"id" => "custom_sticky_logo",
						"std" => '',
						"mod" => "min",
						"type" => "media"
					);
					
$of_options[] = array( "name" => esc_html__("Upload Mobile Logo", 'composer' ),
						"desc" => esc_html__("Upload a custom mobile logo.", 'composer' ),
						"id" => "custom_mobile_logo",
						"std" => '',
						"mod" => "min",
						"type" => "media"
					);

$of_options[] = array( "name" => esc_html__("Fav Icon", 'composer' ),
						"desc" => esc_html__("Upload a 16px x 16px Png/Gif image that will represent your website's favicon.", 'composer' ),
						"id" => "fav_icon",
						"std" => get_template_directory_uri().'/favicon.png',
						"mod" => "min",
						"type" => "media"
					);
					
$of_options[] = array( "name" => esc_html__("Apple Touch Icon", 'composer' ),
						"desc" => esc_html__("Size: 57x57 for older iPhones, 72x72 for iPads, 114x114 for iPhone4's retina display (IMHO, just go ahead and use the biggest one). Transparency is not recommended (iOS will put a black BG behind the icon)", 'composer' ),
						"id" => "apple_touch_icon",
						"std" => get_template_directory_uri().'/_images/apple-icon-touch.png',
						"mod" => "min",
						"type" => "media"
					);

$of_options[] = array( "name" => esc_html__("Upload Placeholder Image", 'composer' ),
						"desc" => esc_html__("Upload a placeholder image and height should be more than 1366x900.", 'composer' ),
						"id" => "placeholder",
						"std" => '',
						"mod" => "min",
						"type" => "media"
					);

$of_options[] = array( "name" => esc_html__("Enable Preloader", 'composer' ),
						"desc" => esc_html__("Do you want to like to enable preloader?", 'composer' ),
						"id"   => "pix_preloader",
						"std"  => "no",
						"options"	=> array(
							"yes" => esc_html__("Yes", "composer"),
							"no" => esc_html__("No", "composer")
						),
						"folds" => 1,
						"type" => "switch"
                	);

$of_options[] = array( "name" => esc_html__("Preloader Style", 'composer' ),
						"desc" => esc_html__("Do you want to like to enable preloader?", 'composer' ),
						"id"   => "pix_preloader_style",
						"std"  => "style-1",
						"options"	=> array(
							"style-1" => esc_html__("Style 1", "composer"),
							"style-2" => esc_html__("Style 2", "composer"),
							"style-3" => esc_html__("Style 3", "composer"),
							"style-4" => esc_html__("Style 4", "composer"),
							"style-5" => esc_html__("Style 5", "composer"),
							"style-6" => esc_html__("Style 6", "composer"),
							"style-7" => esc_html__("Style 7", "composer"),
							"style-8" => esc_html__("Style 8", "composer"),
						),
						"type" => "switch",						
						"fold" => array( "pix_preloader" => array('yes') )
                	);

$of_options[] = array( 	"name" 		=> esc_html__("Preloader Animation In", 'composer' ),
						"desc" 		=> esc_html__("Choose a loading animation", 'composer' ),
						"id" 		=> "preloadtrans",
						"std" 		=> "fadeInUp",
						"fold"		=> array( "pix_preloader" => array('yes') ),
						"type" 		=> "select",
						"options" 	=> $preloader_trans_in
					);

$of_options[] = array( 	"name" 		=> esc_html__("Wide &amp; Boxed &amp; Frame Layout", 'composer' ),
						"desc" 		=> esc_html__("Choose Header Layout. Boxed = max header width is 1200px; Wide = header covers the viewport. Frame = White space around the edges.", 'composer' ),
						"id" 		=> "boxed_content",
						"std" 		=> "wide",
						"type" 		=> "select",
						'options' 	=> array(
							'wide'   => esc_html__('Wide', "composer"),
							'boxed'  => esc_html__('Boxed', "composer"),
							'frame'  => esc_html__('Frame', "composer")
						),
					);

$of_options[] = array( 	"name" 		=> esc_html__("Main Wrap", 'composer' ),
						"desc" 		=> esc_html__("Adjust Main wrap width", 'composer' ),
						"id" 		=> "main_wrap",
						"std" 		=> "1366",
						"min" 		=> "940",
						"step"		=> "1",
						"max" 		=> "1366",
						"edit"		=> true,
						"type" 		=> "sliderui" 
					);

$of_options[] = array( 	"name" 		=> esc_html__("Content Wrap", 'composer' ),
						"desc" 		=> esc_html__("Adjust Content wrap width", 'composer' ),
						"id" 		=> "content_wrap",
						"std" 		=> "1170",
						"min" 		=> "940",
						"step"		=> "1",
						"max" 		=> "1366",
						"edit"		=> true,
						"type" 		=> "sliderui" 
				);

$of_options[] = array( "name" => esc_html__("Responsive", 'composer' ),
						"desc" => esc_html__("Please choose responsive.", 'composer' ),
						"id" => "mobile_responsive",
						"std" => "on",
						"options"	=> array(
							"on" => esc_html__("ON", "composer"),
							"off" => esc_html__("OFF", "composer")
						),
						"type" => "switch"
					);

$of_options[] = array( "name" => esc_html__("Menu Responsive Breakpoint", 'composer' ),
					"desc" => esc_html__("Please Enter Menu Responsive Breakpoint (Ex:1024). Default Value is 991.", 'composer' ),
					"id" => "mobile_break_menu",
					"std" => "991",
					"type" => "text"
					);

$of_options[] = array( "name" => esc_html__("Show Flyin Sidebar", 'composer' ),
						"desc" => esc_html__("Do you want to show flyin sidebar?", 'composer' ),
						"id" => "flyin_sidebar",
						"std" => "off",
						"options"	=> array(
							"on" => esc_html__("ON", "composer"),
							"off" => esc_html__("OFF", "composer")
						),
						"folds" => 1,
						"type" => "switch"
					);

$of_options[] = array( "name" => esc_html__("Choose the Flyin Sidebar", 'composer' ),
					"desc" => esc_html__("Please choose the flyin sidebar you have created", 'composer' ),
					"id" => "flyin_select_sidebar",
					"std" => "0",
					"type" => "select_sidebar",
					"fold" => array( "flyin_sidebar" => array('on') ),
					"hide" => array('flyin-sidebar')
					);

$of_options[] = array( "name" => esc_html__("Search Text", 'composer' ),
					"desc" => esc_html__("Please Enter Search Text Here.", 'composer' ),
					"id" => "search_text",
					"std" => "Search",
					"type" => "text"
					);
					
$of_options[] = array( 	"name" 		=> esc_html__("Show Go to Top Button", 'composer' ),
						"desc" 		=> esc_html__("Show/Hide Go to Top Button in the page", 'composer' ),
						"id" 		=> "go_to_top",
						"std" 		=> "enable",
						"options"	=> array(
							"enable" => esc_html__("Enable", "composer"),
							"disable" => esc_html__("Disable", "composer")
						),
						"type" 		=> "switch"
				);
																		  
$of_options[] = array( "name" => esc_html__("Custom CSS", 'composer' ),
					"desc" => esc_html__("Type your custom CSS rules.", 'composer' ),
					"id" => "custom_css",
					"std" => "",
					"type" => "textarea");
																		  
$of_options[] = array( "name" => esc_html__("Custom JS", 'composer' ),
					"desc" => esc_html__("Type your custom JS.", 'composer' ),
					"id" => "custom_js",
					"std" => "",
					"type" => "textarea");

//Header Builder
$of_options[] = array( 	"name" 		=> esc_html__("Header Builder", 'composer' ),
						"type" 		=> "heading"
				);

$of_options[] = array( 
					"id" => "introduction",
					"std" => '<h3>'. esc_html__( 'Grey Header Area.', 'composer' ) . '</h3>' . esc_html__('This is the setting for grey Header Area which can be displayed above or below Main Header depends on header settings', 'composer' ),
					"icon" => true,
					"type" => "info");

// Top Left Header Element
$header_top_elem = array
( 
	"disabled" => array (
		"placebo" 	=> "placebo", //REQUIRED!
		"top_menu"		=> esc_html__( 'Menu', 'composer' ),
		"shortcode"		=> esc_html__( 'Shortcode', 'composer' ),
		"search"	=> esc_html__( 'Search', 'composer' ),
		"cart"		=> esc_html__( 'WooCommerce cart', 'composer' ),
		"lang"		=> esc_html__( 'WPML Language Selector', 'composer' ),
		"text"		=> esc_html__( 'Custom Text', 'composer' )
	), 
	"left" => array (
		"placebo" 		=> "placebo", //REQUIRED!
		"email"		=> esc_html__( 'Email', 'composer' ),
		"tel"		=> esc_html__( 'Telephone', 'composer' ),
	),
	"right" => array (
		"placebo" 		=> "placebo", //REQUIRED!
		"sicons"	=> esc_html__( 'Social Icons', 'composer' ),
	),
);

$of_options[] = array( 	"name" 		=> esc_html__("Top Header", 'composer' ),
						"desc" 		=> esc_html__("Choose what you want to display on Left / Right Side of Top Header Area", 'composer' ),
						"id" 		=> "grey_header_sorter",
						"std" 		=> $header_top_elem,
						"type" 		=> "sorter"
				);

// Main Header Element
$main_header_elem = array
( 
	"disabled" => array (
		"placebo" 	=> "placebo", //REQUIRED!	
		"shortcode"		=> esc_html__( 'Shortcode', 'composer' ),
		"sicons"	=> esc_html__( 'Social Icons', 'composer' ),
		"search"	=> esc_html__( 'Search Form', 'composer' ),
		"text"		=> esc_html__( 'Custom Text', 'composer' ),
	),	
	"left" => array (
		"placebo" 		=> "placebo", //REQUIRED!
		"email"		=> esc_html__( 'Email', 'composer' ),
		"tel"		=> esc_html__( 'Telephone', 'composer' ),
	),
	"right" => array (
		"placebo" 		=> "placebo", //REQUIRED!
		"lang"		=> esc_html__( 'WPML Language Selector', 'composer' ),
		"search_icon"	=> esc_html__( 'Search Icon', 'composer' ),
		"cart"		=> esc_html__( 'WooCommerce cart', 'composer' ),
	),
);

$of_options[] = array( 
					"id" => "introduction",
					"std" => '<h3>'. esc_html__( 'Main Header.', 'composer' ) . '</h3>' . esc_html__('This is the setting for Main Header Header layout Can be change in header settings', 'composer' ),
					"icon" => true,
					"type" => "info");

$of_options[] = array( 	"name" 		=> esc_html__("Main Header", 'composer' ),
						"desc" 		=> esc_html__("Choose what you want to display in Main Header Left / Right Side", 'composer' ),
						"id" 		=> "main_sorter",
						"std" 		=> $main_header_elem,
						"type" 		=> "sorter"
				);

// Side Header Element
$side_header_elem = array
( 
	"disabled" => array (
		"placebo"     => "placebo", //REQUIRED!	
		"shortcode"		=> esc_html__( 'Shortcode', 'composer' ),
		"search"      => esc_html__( 'Search Form', 'composer' ),
		"lang"        => esc_html__( 'WPML Language Selector', 'composer' ),
		"search_icon" => esc_html__( 'Search Icon', 'composer' ),
		"cart"        => esc_html__( 'WooCommerce cart', 'composer' ),
		"tel"     => esc_html__( 'Telephone', 'composer' ),	
	),	
	"left" => array (
		"placebo" => "placebo", //REQUIRED!
		"sicons"      => esc_html__( 'Social Icons', 'composer' ),	
		"copyright_text" => esc_html__( 'Copyright Text', 'composer' )
	),
);

$of_options[] = array( 	"name" 		=> esc_html__("Side Header Widget", 'composer' ),
						"desc" 		=> esc_html__("Choose what you want to display in side header widget", 'composer' ),
						"id" 		=> "side_sorter",
						"std" 		=> $side_header_elem,
						"type" 		=> "sorter"
				);

$of_options[] = array(
					"id" => "introduction",
					"std" => '<h3>'. esc_html__( 'Header Styling Options.', 'composer' ) . '</h3>' . esc_html__('This is the setting for Main Header. Header layout Can be change in header settings', 'composer' ),
					"icon" => true,
					"type" => "info");

$of_options[] = array(  "name"  => esc_html__("Custom Header Styles", 'composer' ),
						"desc"  => esc_html__("Do you like to use Custom Styles, Please enable it and choose the Background color, Primary color, Selection text color, selection background color, link hover color. If it's disabled, the default style will apply and custom styles are won't apply.", 'composer' ),
						"id"    => "custom_header_styles",
						"std"   => "no",
						"folds" => 1,
						"options"	=> array(
							"yes" => esc_html__("Yes", "composer"),
							"no" => esc_html__("No", "composer")
						),
						"type"  => "switch"
					);

$of_options[] = array(
					"id" => "introduction",
					"std" => '<h3>'. esc_html__( 'Top Info bar Styling Options.', 'composer' ) . '</h3>',
					"icon" => true,
					"type" => "info",
					"fold" 	=> array( "custom_header_styles" => array('yes') )
					);

$of_options[] = array( 	"name" 		=> esc_html__("Top Header Background Color", 'composer' ),
						"desc" 		=> esc_html__("This is the top header background color.", 'composer' ),
						"id" 		=> "top_header_background_color",
						"std" 		=> "",
						"fold" 		=> array( "custom_header_styles" => array('yes') ),
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Top Header Color", 'composer' ),
						"desc" 		=> esc_html__("This is the top header color.", 'composer' ),
						"id" 		=> "top_header_color",
						"std" 		=> "",
						"fold" 		=> array( "custom_header_styles" => array('yes') ),
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Top Header Link Color", 'composer' ),
						"desc" 		=> esc_html__("This is the top header link color.", 'composer' ),
						"id" 		=> "top_header_link_color",
						"std" 		=> "",
						"fold" 		=> array( "custom_header_styles" => array('yes') ),
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Top Header Link Hover Color", 'composer' ),
						"desc" 		=> esc_html__("This is the top header link hover color.", 'composer' ),
						"id" 		=> "top_header_link_hover_color",
						"std" 		=> "",
						"fold" 		=> array( "custom_header_styles" => array('yes') ),
						"type" 		=> "color"
				);

$of_options[] = array(
					"id" => "introduction",
					"std" => '<h3>'. esc_html__( 'Main Header Styling Options', 'composer' ) . '</h3>' . esc_html__('Leave the fields to empty to apply defaults', 'composer' ),
					"icon" => true,
					"type" => "info",
					"fold" 		=> array( "custom_header_styles" => array('yes') )
					);

$of_options[] = array( 	"name" 		=> esc_html__("Main Header Height", 'composer' ),
						"desc" 		=> esc_html__("Type the height in px. Eg: 100px. Leave it to empty to apply default", 'composer' ),
						"id" 		=> "main_header_height",
						"std" 		=> "",
						"type" 		=> "text",
						"fold" 		=> array( "custom_header_styles" => array('yes') ),
						"mod"		=> "mini", 
				);

$of_options[] = array( 	"name" 		=> esc_html__("Header Background Color", 'composer' ),
						"desc" 		=> esc_html__("This is the header background color.", 'composer' ),
						"id" 		=> "main_header_background_color",
						"std" 		=> "",
						"fold" 		=> array( "custom_header_styles" => array('yes') ),
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Header Color", 'composer' ),
						"desc" 		=> esc_html__("This is the header color.", 'composer' ),
						"id" 		=> "main_header_color",
						"std" 		=> "",
						"fold" 		=> array( "custom_header_styles" => array('yes') ),
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Header Link Color", 'composer' ),
						"desc" 		=> esc_html__("This is the header link color.", 'composer' ),
						"id" 		=> "main_header_link_color",
						"std" 		=> "",
						"fold" 		=> array( "custom_header_styles" => array('yes') ),
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Header Link Hover Color", 'composer' ),
						"desc" 		=> esc_html__("This is the header link hover color.", 'composer' ),
						"id" 		=> "main_header_link_hover_color",
						"std" 		=> "",
						"fold" 		=> array( "custom_header_styles" => array('yes') ),
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Menu Background Color", 'composer' ),
						"desc" 		=> esc_html__("This is the menu background color (for Header 6, Header 7, Header 8, Header 9).", 'composer' ),
						"id" 		=> "menu_background_color",
						"std" 		=> "",
						"fold" 		=> array( "custom_header_styles" => array('yes') ),
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Menu Link Color", 'composer' ),
						"desc" 		=> esc_html__("This is the menu link color.", 'composer' ),
						"id" 		=> "menu_link_color",
						"std" 		=> "",
						"fold" 		=> array( "custom_header_styles" => array('yes') ),
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Menu Link Hover Color", 'composer' ),
						"desc" 		=> esc_html__("This is the menu link hover color.", 'composer' ),
						"id" 		=> "menu_link_hover_color",
						"std" 		=> "",
						"fold" 		=> array( "custom_header_styles" => array('yes') ),
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Sub Menu Background Color", 'composer' ),
						"desc" 		=> esc_html__("This is the sub menu background color.", 'composer' ),
						"id" 		=> "sub_menu_background_color",
						"std" 		=> "",
						"fold" 		=> array( "custom_header_styles" => array('yes') ),
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Sub Menu Border Color", 'composer' ),
						"desc" 		=> esc_html__("This is the sub menu top & bottom border color.", 'composer' ),
						"id" 		=> "sub_menu_border_color",
						"std" 		=> "",
						"fold" 		=> array( "custom_header_styles" => array('yes') ),
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Sub Menu Link Color", 'composer' ),
						"desc" 		=> esc_html__("This is the sub menu link color.", 'composer' ),
						"id" 		=> "sub_menu_link_color",
						"std" 		=> "",
						"fold" 		=> array( "custom_header_styles" => array('yes') ),
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Sub Menu Link Hover Color", 'composer' ),
						"desc" 		=> esc_html__("This is the sub menu link hover color.", 'composer' ),
						"id" 		=> "sub_menu_link_hover_color",
						"std" 		=> "",
						"fold" 		=> array( "custom_header_styles" => array('yes') ),
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Mega Menu Title Color", 'composer' ),
						"desc" 		=> esc_html__("This is the mega menu title color.", 'composer' ),
						"id" 		=> "mega_menu_title_color",
						"std" 		=> "",
						"fold" 		=> array( "custom_header_styles" => array('yes') ),
						"type" 		=> "color"
				);

//Top Header
$of_options[] = array( "name" => esc_html__("Login/Registration", 'composer' ),
					"type" => "heading");

$of_options[] = array( 	"name" 		=> esc_html__("Login Redirect Page", 'composer' ),
						"desc" 		=> esc_html__("Please Choose page", 'composer' ),
						"id" 		=> "login_redirect",
						"std" 		=> "dashboard",
						"options" 	=> $all_pages,
						"type" 		=> "select"
				);

// Event Tribe Settings
if( class_exists( 'Tribe__Events__Main' ) ) {

	$of_options[] = array( 	
		"name" 		=> esc_html__( "Event Tribe", 'composer' ),
		"type" 		=> "heading"
	);

	$of_options[] = array( 
		"name" => esc_html__( "Event Tribe", 'composer' ),
		"type" => "heading"
	);

	$of_options[] = array( 
		"name" => esc_html__( "Event Tribe Page Title", 'composer' ),
		"desc" => esc_html__( "Please Enter the page title for event tribe", 'composer' ),
		"id" => "event_tribe_page_title",
		"std" => esc_html__( "Calendar", 'composer' ),
		"type" => "text"
	);
}

//Single Portfolio Settings
$of_options[] = array( 	"name" 		=> esc_html__("Portfolio", 'composer' ),
						"type" 		=> "heading"
				);

$of_options[] = array( "name" => esc_html__("Portfolio Slug", 'composer' ),
					"desc" => esc_html__("Please Enter the slug for Portfolio", 'composer' ),
					"id" => "slug_portfolio",
					"std" => "portfolio",
					"type" => "text"
					);

$of_options[] = array( 	"name" 		=> esc_html__("Choose Portfolio Page", 'composer' ),
						"desc" 		=> esc_html__("Please Choose page", 'composer' ),
						"id" 		=> "portfolio_page",
						"std" 		=> "dashboard",
						"options" 	=> $all_pages,
						"type" 		=> "select"
				);

$of_options[] = array(
					"id" => "introduction",
					"std" => '<h3>'. esc_html__( 'Single Portfolio Options', 'composer' ) . '</h3>' . esc_html__('Following options for single portfolio page', 'composer' ),
					"icon" => true,
					"type" => "info");

$of_options[] = array( 	"name" 		=> esc_html__("Project Detail Title", 'composer' ),
						"desc" 		=> esc_html__("Type the project detail title", 'composer' ),
						"id" 		=> "single_porfolio_project_detail_title",
						"std" 		=> "Project Details",
						"type" 		=> "text"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Client Title", 'composer' ),
						"desc" 		=> esc_html__("Type the Client title", 'composer' ),
						"id" 		=> "single_porfolio_client_title",
						"std" 		=> "Client",
						"type" 		=> "text"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Skill Title", 'composer' ),
						"desc" 		=> esc_html__("Type the Skill title", 'composer' ),
						"id" 		=> "single_porfolio_skill_title",
						"std" 		=> "Skills",
						"type" 		=> "text"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Task Title", 'composer' ),
						"desc" 		=> esc_html__("Type the Task title", 'composer' ),
						"id" 		=> "single_porfolio_task_title",
						"std" 		=> "Tasks",
						"type" 		=> "text"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Launch Button Text", 'composer' ),
						"desc" 		=> esc_html__("Type the Launch button text", 'composer' ),
						"id" 		=> "single_porfolio_launch_btn_text",
						"std" 		=> "Launch Project",
						"type" 		=> "text"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Show/Hide Like button", 'composer' ),
						"desc" 		=> esc_html__("Do you want to display Like button?", 'composer' ),
						"id" 		=> "single_porfolio_like",
						"std" 		=> "show",
						"options"	=> array(
							"show" => esc_html__("Show", "composer"),
							"hide" => esc_html__("Hide", "composer")
						),
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Show/Hide Share option", 'composer' ),
						"desc" 		=> esc_html__("Do you want to display Share option?", 'composer' ),
						"id" 		=> "single_porfolio_share",
						"std" 		=> "show",
						"options"	=> array(
							"show" => esc_html__("Show", "composer"),
							"hide" => esc_html__("Hide", "composer")
						),
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Show/Hide Next and Previous arrow", 'composer' ),
					"desc" 		=> esc_html__("Do you want to display Next and Previous arrow?", 'composer' ),
					"id" 		=> "single_porfolio_next_prev",
					"std" 		=> "show",
					"options"	=> array(
						"show" => esc_html__("Show", "composer"),
						"hide" => esc_html__("Hide", "composer")
					),
					"type" 		=> "switch"
				);

//Portfolio Category Page Settings
$of_options[] = array( 
	"name" 		=> esc_html__("Portfolio Category", 'composer' ),
	"type" 		=> "heading"
);

$of_options[] = array(
	"name" => esc_html__("Number of Items", 'composer' ),
	"desc" => esc_html__("How many items you want to display", 'composer' ),
	"id" => "portfolio_cat_no_of_items",
	"std" => "6",
	"type" => "text"
);

$of_options[] = array( 
	"name" 		=> esc_html__("Portfolio Style", 'composer' ),
	"desc" 		=> esc_html__("Choose Portfolio Style", 'composer' ),
	"id" 		=> "portfolio_cat_portfolio_style",
	"std" 		=> "grid",
	"type" 		=> "select",
	"options" 	=> array( 
		'grid'          => esc_html__('Grid', "composer"), 
		'masonry-fixed' => esc_html__('Masonry Defined Height', "composer"), 
		'masonry'       => esc_html__('Masonry Auto Height', "composer")  
	)
);

$of_options[] = array( 
	"name" 		=> esc_html__("Choose a hover style", 'composer' ),
	"desc" 		=> esc_html__("Choose Portfolio Category Hover Style", 'composer' ),
	"id" 		=> "portfolio_cat_style",
	"std" 		=> "style1",
	"type" 		=> "select",
	"options" 	=> array( 
		'style1' => esc_html__('Style 1', "composer"), 
		'style2' => esc_html__('Style 2', "composer"), 
		'style3' => esc_html__('Style 3', "composer"), 
		'style4' => esc_html__('Style 4', "composer"), 
		'style5' => esc_html__('Style 5', "composer"), 
		'style6' => esc_html__('Style 6', "composer")
	)
);

$of_options[] = array( 
	"name" 		=> esc_html__("Show Filter", 'composer' ),
	"desc" 		=> esc_html__("Do you want to show filter?", 'composer' ),
	"id" 		=> "portfolio_cat_filter",
	"std" 		=> "yes",
	"type" 		=> "switch",
	"options" 	=> array( 
		'yes' => esc_html__('Yes', "composer"), 
		'no'  => esc_html__('No', "composer")
	)
);

$of_options[] = array( 
	"name" 		=> esc_html__("Show Sub Category Only", 'composer' ),
	"desc" 		=> esc_html__("Do you want to show sub categories only?", 'composer' ),
	"id" 		=> "portfolio_cat_show_sub_category_only",
	"std" 		=> "yes",
	"type" 		=> "switch",
	"options" 	=> array( 
		'yes' => esc_html__('Yes', "composer"), 
		'no'  => esc_html__('No', "composer")
	)
);

$of_options[] = array( 
	"name" 		=> esc_html__("Show Search", 'composer' ),
	"desc" 		=> esc_html__("Do you want to show search?", 'composer' ),
	"id" 		=> "portfolio_cat_search",
	"std" 		=> "no",
	"type" 		=> "switch",
	"options" 	=> array( 
		'yes' => esc_html__('Yes', "composer"), 
		'no'  => esc_html__('No', "composer")
	)
);

// Block
$of_options[] = array( "name" => esc_html__("Block", 'composer' ),
					"type" => "heading"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Blocks", 'composer' ),
						"desc" 		=> esc_html__("Select the blocks shortcodes you want to use", 'composer' ),
						"id" 		=> "required_blocks",
						"std" 		=> $block_default,
						"type" 		=> "multicheck",
						"options" 	=> $blocks
				);

//Blog Settings
$of_options[] = array( 	"name" 		=> esc_html__("Blog", 'composer' ),
						"type" 		=> "heading"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Blog Title", 'composer' ),
						"desc" 		=> esc_html__("Type the blog title", 'composer' ),
						"id" 		=> "blog_page_title",
						"std" 		=> "Blog",
						"type" 		=> "text"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Pagination Type", 'composer' ),
						"desc" 		=> esc_html__("Choose pagination type", 'composer' ),
						"id" 		=> "blog_pagination",
						"std" 		=> "number",
						"type" 		=> "select",
						"options" 	=> $pagination
				);

$of_options[] = array( "name" => esc_html__("Load More Text", 'composer' ),
					"desc"    => esc_html__("Type load more text", 'composer' ),
					"id"      => "blog_loadmore_text",
					"std"     => "Load More",
					"type"    => "text"
				);

$of_options[] = array( "name" => esc_html__("All Posts Loaded Text", 'composer' ),
					"desc"    => esc_html__("Type load more text", 'composer' ),
					"id"      => "blog_allpost_loaded_text",
					"std"     => "All Posts Loaded",
					"type"    => "text"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Show Image Caption", 'composer' ),
						"desc" 		=> esc_html__("Do you want to show image caption below of the image?", 'composer' ),
						"id" 		=> "blog_caption",
						"std" 		=> "disable",
						"options"	=> array(
							"enable" => esc_html__("Enable", "composer"),
							"disable" => esc_html__("Disable", "composer")
						),
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Slider Shortcode", 'composer' ),
						"desc" 		=> esc_html__("Type the slider shortcode to display slider. Eg: [revslider demo]", 'composer' ),
						"id" 		=> "blog_slider",
						"std" 		=> "",
						"type" 		=> "text"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Style", 'composer' ),
						"desc" 		=> esc_html__("Select the style", 'composer' ),
						"id" 		=> "blog_styles",
						"std" 		=> "normal",
						"type" 		=> "select",
						"options" 	=> $blog_styles
				);
								
$of_options[] = array( "name" => esc_html__("Choose the Registered Sidebar", 'composer' ),
					"desc" => esc_html__("Please choose the sidebar you have created", 'composer' ),
					"id" => "blog_select_sidebar",
					"std" => "0",
					"type" => "select_sidebar",
					"hide" => array('blog-sidebar')
				);

$of_options[] = array( 	"name" 		=> esc_html__("Sidebar Position", 'composer' ),
						"desc" 		=> esc_html__("Choose blog sidebar position, it applies blog page only.", 'composer' ),
						"id" 		=> "blog_sidebar",
						"std" 		=> "right-sidebar",
						"type" 		=> "select",
						"options" 	=> $sidebar
				);

$of_options[] = array( 	"name" 		=> esc_html__("Enable/Disable Animation", 'composer' ),
						"desc" 		=> esc_html__("Do you want to animate?", 'composer' ),
						"id" 		=> "blog_animate",
						"std" 		=> "enable",
						"folds" 		=> "enable",
						"options"	=> array(
							"enable" => esc_html__("Enable", "composer"),
							"disable" => esc_html__("Disable", "composer")
						),
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Animation Transition", 'composer' ),
						"desc" 		=> esc_html__("Choose animation transition", 'composer' ),
						"id" 		=> "blog_transition",
						"std" 		=> "fadeInUp",
						"type" 		=> "select",
						"fold" 		=> array( "blog_animate" => array('enable') ),
						"options" 	=> $animation
				);

$of_options[] = array( 	"name" 		=> esc_html__("Transition Duration", 'composer' ),
						"desc" 		=> esc_html__("Enter the Duration (Ex: 500ms or 1s)", 'composer' ),
						"id" 		=> "blog_duration",
						"std" 		=> "500ms",
						"fold" 		=> array( "blog_animate" => array('enable') ),
						"type" 		=> "text"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Title Limit", 'composer' ),
						"desc" 		=> esc_html__("Type the no. of letters you want to display for the post title", 'composer' ),
						"id" 		=> "blog_title_limit",
						"std" 		=> 80,
						"type" 		=> "text"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Blog Content Type", 'composer' ),
						"desc" 		=> esc_html__("Display full content or summary?", 'composer' ),
						"id" 		=> "blog_content_type",
						"std" 		=> "excerpt",
						"folds"		=> 1,
						"options"	=> array(
							"content" => esc_html__("Full Content", "composer"),
							"excerpt" => esc_html__("Excerpt", "composer")
						),
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Content Limit", 'composer' ),
						"desc" 		=> esc_html__("Type the no. of words you want to display for the content", 'composer' ),
						"id" 		=> "blog_content_limit",
						"fold"		=> array( "blog_content_type" => array('excerpt') ),
						"std" 		=> 40,
						"type" 		=> "text"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Show/Hide Category in meta", 'composer' ),
						"desc" 		=> esc_html__("Do you want to display category meta?", 'composer' ),
						"id" 		=> "blog_category",
						"std" 		=> "show",
						"options"	=> array(
							"show" => esc_html__("Show", "composer"),
							"hide" => esc_html__("Hide", "composer")
						),
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Show/Hide Like meta", 'composer' ),
						"desc" 		=> esc_html__("Do you want to display like meta", 'composer' ),
						"id" 		=> "blog_meta_like",
						"std" 		=> "show",
						"options"	=> array(
							"show" => esc_html__("Show", "composer"),
							"hide" => esc_html__("Hide", "composer")
						),
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Show/Hide Comment meta", 'composer' ),
						"desc" 		=> esc_html__("Do you want to display comments meta?", 'composer' ),
						"id" 		=> "blog_meta_comment",
						"std" 		=> "show",
						"options"	=> array(
							"show" => esc_html__("Show", "composer"),
							"hide" => esc_html__("Hide", "composer")
						),
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Show/Hide Single post link", 'composer' ),
						"desc" 		=> esc_html__("Do you want to display single post link?", 'composer' ),
						"id" 		=> "blog_single_link",
						"std" 		=> "show",
						"options"	=> array(
							"show" => esc_html__("Show", "composer"),
							"hide" => esc_html__("Hide", "composer")
						),
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Type the single post link text", 'composer' ),
						"desc" 		=> esc_html__("Type the single post link text here", 'composer' ),
						"id" 		=> "blog_single_link_text",
						"std" 		=> "Continue Reading...",
						"type" 		=> "text"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Body Background Color", 'composer' ),
						"desc" 		=> esc_html__("It applies body background color for blog page", 'composer' ),
						"id" 		=> "blog_body_bgcolor",
						"std" 		=> "#fff",
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Body Container Background Color", 'composer' ),
						"desc" 		=> esc_html__("It applies body background color for all pages", 'composer' ),
						"id" 		=> "blog_body_container_bgcolor",
						"std" 		=> "#ffffff",
						"type" 		=> "color"
				);


//Single Post Setting
$of_options[] = array( 	"name" 		=> esc_html__("Single Blog", 'composer' ),
						"type" 		=> "heading"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Single Blog Style", 'composer' ),
						"desc" 		=> esc_html__("Select the single blog style", 'composer' ),
						"id" 		=> "single_style",
						"std" 		=> "style1",
						"options"	=> $single_blog_style,
						"type" 		=> "switch"
				);

$of_options[] = array( "name" => esc_html__("Choose the Registered Sidebar", 'composer' ),
					"desc" => esc_html__("Please choose the sidebar you have created", 'composer' ),
					"id" => "single_select_sidebar",
					"std" => "0",
					"type" => "select_sidebar",
					"hide" => array('blog-sidebar')
				);

$of_options[] = array( 	"name" 		=> esc_html__("Single Post Layout", 'composer' ),
						"desc" 		=> esc_html__("Choose single blog layout", 'composer' ),
						"id" 		=> "single_sidebar",
						"std" 		=> "right-sidebar",
						"type" 		=> "select",
						"options" 	=> $sidebar
				);

$of_options[] = array( 	"name" 		=> esc_html__("Show Image Caption", 'composer' ),
						"desc" 		=> esc_html__("Do you want to show image caption below of the image?", 'composer' ),
						"id" 		=> "single_caption",
						"std" 		=> "disable",
						"options"	=> array(
							"enable" => esc_html__("Enable", "composer"),
							"disable" => esc_html__("Disable", "composer")
						),
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Ad", 'composer' ),
						"desc" 		=> esc_html__("Enter the Ad code", 'composer' ),
						"id" 		=> "ad1",
						"std" 		=> "",
						"type" 		=> "textarea"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Show/Hide Category", 'composer' ),
						"desc" 		=> esc_html__("Do you want to display category", 'composer' ),
						"id" 		=> "single_category",
						"std" 		=> "show",
						"options"	=> array(
							"show" => esc_html__("Show", "composer"),
							"hide" => esc_html__("Hide", "composer")
						),
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Show/Hide Tags", 'composer' ),
						"desc" 		=> esc_html__("Do you want to display tags", 'composer' ),
						"id" 		=> "single_tags",
						"std" 		=> "show",
						"options"	=> array(
							"show" => esc_html__("Show", "composer"),
							"hide" => esc_html__("Hide", "composer")
						),
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Show/Hide Date meta", 'composer' ),
						"desc" 		=> esc_html__("Do you want to display date meta", 'composer' ),
						"id" 		=> "single_date",
						"std" 		=> "show",
						"options"	=> array(
							"show" => esc_html__("Show", "composer"),
							"hide" => esc_html__("Hide", "composer")
						),
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Show/Hide Like meta", 'composer' ),
						"desc" 		=> esc_html__("Do you want to display like meta", 'composer' ),
						"id" 		=> "single_like",
						"std" 		=> "show",
						"options"	=> array(
							"show" => esc_html__("Show", "composer"),
							"hide" => esc_html__("Hide", "composer")
						),
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Show/Hide Author meta", 'composer' ),
						"desc" 		=> esc_html__("Do you want to display like meta", 'composer' ),
						"id" 		=> "single_author",
						"std" 		=> "show",
						"options"	=> array(
							"show" => esc_html__("Show", "composer"),
							"hide" => esc_html__("Hide", "composer")
						),
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Show/Hide Comment meta", 'composer' ),
						"desc" 		=> esc_html__("Do you want to display comment meta", 'composer' ),
						"id" 		=> "single_comment",
						"std" 		=> "show",
						"options"	=> array(
							"show" => esc_html__("Show", "composer"),
							"hide" => esc_html__("Hide", "composer")
						),
						"type" 		=> "switch"
				);

// Share
$share = array
( 
	"disabled" => array (
		"placebo" 	=> "placebo", //REQUIRED!
	), 
	"enabled" => array (
		"placebo"   => "placebo", //REQUIRED!
		"facebook"  => esc_html__( 'Facebook', 'composer' ),
		"twitter"   => esc_html__( 'twitter', 'composer' ),
		"gplus"     => esc_html__( 'Google Plus', 'composer' ),
		"linkedin"  => esc_html__( 'Linkedin', 'composer' ),
		"pinterest" => esc_html__( 'Pinterest', 'composer' ),
	)
);

$of_options[] = array( 	"name" 		=> esc_html__("Share", 'composer' ),
						"desc" 		=> esc_html__("Enable what you want to display", 'composer' ),
						"id" 		=> "single_share",
						"std" 		=> $share,
						"type" 		=> "sorter"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Show/Hide Related Posts Section", 'composer' ),
						"desc" 		=> esc_html__("Do you want to display related post section", 'composer' ),
						"id" 		=> "single_related",
						"std" 		=> "show",
						"folds"		=> 1,
						"options"	=> array(
							"show" => esc_html__("Show", "composer"),
							"hide" => esc_html__("Hide", "composer")
						),
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Show/Hide Related Posts Featured Image", 'composer' ),
						"desc" 		=> esc_html__("Do you want to display related post featured image", 'composer' ),
						"id" 		=> "single_related_featured_image",
						"std" 		=> "no",
						"options"	=> array(
							"yes" => esc_html__("Show", "composer"),
							"no" => esc_html__("Hide", "composer")
						),
						"fold"		=> array( "single_related" => array('show') ),
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Related Post Title", 'composer' ),
						"desc" 		=> esc_html__("Type the relatted post section title here", 'composer' ),
						"id" 		=> "single_related_title",
						"std" 		=> "Related Post",
						"fold"		=> array( "single_related" => array('show') ),
						"type" 		=> "text"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Related Post Columns", 'composer' ),
						"desc" 		=> esc_html__("Enter the related post columns", 'composer' ),
						"id" 		=> "single_related_columns",
						"std" 		=> "col1",
						"type" 		=> "select",
						"options"	=> array(
							"col1" => esc_html__("1 Column", "composer"),
							"col2" => esc_html__("2 Column", "composer"),
							"col3" => esc_html__("3 Column", "composer"),
							"col4" => esc_html__("4 Column", "composer")
						),
						"fold"		=> array( "single_related" => array('show') )
				);

$of_options[] = array( 	"name" 		=> esc_html__("Title Limit", 'composer' ),
						"desc" 		=> esc_html__("Type the numerical value for the post title", 'composer' ),
						"id" 		=> "single_related_title_length",
						"std" 		=> 30,
						"type" 		=> "text",
						"fold"		=> array( "single_related" => array('show') )
				);

$of_options[] = array( 	"name" 		=> esc_html__("Content Limit", 'composer' ),
						"desc" 		=> esc_html__("Type the numerical value for the content", 'composer' ),
						"id" 		=> "single_related_content_length",
						"std" 		=> 90,
						"type" 		=> "text",
						"fold"		=> array( "single_related" => array('show') )
				);

$of_options[] = array( 	"name" 		=> esc_html__("Number of Related Post", 'composer' ),
						"desc" 		=> esc_html__("Enter the integer value to display related post", 'composer' ),
						"id" 		=> "single_related_no",
						"std" 		=> "6",
						"fold"		=> array( "single_related" => array('show') ),
						"type" 		=> "text"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Order By", 'composer' ),
						"desc" 		=> esc_html__("Choose the order by selection ", 'composer' ),
						"id" 		=> "single_related_orderby",
						"std" 		=> "date",
						"fold"		=> array( "single_related" => array('show') ),
						"type" 		=> "select",
						"options" 	=> $order_by
				);

$of_options[] = array( 	"name" 		=> esc_html__("Sorting Order", 'composer' ),
						"desc" 		=> esc_html__("Choose the sorting order", 'composer' ),
						"id" 		=> "single_related_order",
						"std" 		=> "desc",
						"fold"		=> array( "single_related" => array('show') ),
						"type" 		=> "select",
						"options" 	=> $order
				);

$of_options[] = array( 	"name" 		=> esc_html__("Bottom meta", 'composer' ),
						"desc" 		=> esc_html__("Select the bottom meta", 'composer' ),
						"id" 		=> "single_related_bottom_meta",
						"std" 		=> "like_comment",
						"options"	=> array(
							"like_comment" => esc_html__("Like and Comment", "composer"),
							"link" => esc_html__("Link", "composer"),
							"none" => esc_html__("None", "composer")
						),
						"fold"		=> array( "single_related" => array('show') ),
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Show/Hide Like", 'composer' ),
						"desc" 		=> esc_html__("Do you want to display Like meta?", 'composer' ),
						"id" 		=> "single_related_like",
						"std" 		=> "yes",
						"options"	=> array(
							"yes" => esc_html__("Show", "composer"),
							"no" => esc_html__("Hide", "composer")
						),
						"fold"		=> array( "single_related" => array('show') ),
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Show/Hide comment meta", 'composer' ),
						"desc" 		=> esc_html__("Do you want to display comment meta", 'composer' ),
						"id" 		=> "single_related_comment",
						"std" 		=> "yes",
						"options"	=> array(
							"yes" => esc_html__("Show", "composer"),
							"no" => esc_html__("Hide", "composer")
						),
						"fold"		=> array( "single_related" => array('show') ),
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Comment Section Title", 'composer' ),
						"desc" 		=> esc_html__("Type the comment section title here", 'composer' ),
						"id" 		=> "single_comment_title",
						"std" 		=> "Comments",
						"type" 		=> "text"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Comment form Title", 'composer' ),
						"desc" 		=> esc_html__("Type the comment form title here", 'composer' ),
						"id" 		=> "single_comment_form_title",
						"std" 		=> "Leave a Comments",
						"type" 		=> "text"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Comment form button text", 'composer' ),
						"desc" 		=> esc_html__("Type the comment form button text here", 'composer' ),
						"id" 		=> "single_comment_form_btn_text",
						"std" 		=> "Add Comment",
						"type" 		=> "text"
				);


//Archives Settings
$of_options[] = array( 	"name" 		=> esc_html__("Archives", 'composer' ),
						"type" 		=> "heading"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Slider Shortcode", 'composer' ),
						"desc" 		=> esc_html__("Type the slider shortcode to display slider. Eg: [revslider demo]", 'composer' ),
						"id" 		=> "archives_slider",
						"std" 		=> "",
						"type" 		=> "text"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Pagination Type", 'composer' ),
						"desc" 		=> esc_html__("Choose pagination type", 'composer' ),
						"id" 		=> "archives_pagination",
						"std" 		=> "number",
						"type" 		=> "select",
						"options" 	=> $pagination
				);

$of_options[] = array( "name" => esc_html__("Load More Text", 'composer' ),
					"desc"    => esc_html__("Type load more text", 'composer' ),
					"id"      => "archives_loadmore_text",
					"std"     => "Load More",
					"type"    => "text"
				);

$of_options[] = array( "name" => esc_html__("All Posts Loaded Text", 'composer' ),
					"desc"    => esc_html__("Type load more text", 'composer' ),
					"id"      => "archives_allpost_loaded_text",
					"std"     => "All Posts Loaded",
					"type"    => "text"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Show Image Caption", 'composer' ),
						"desc" 		=> esc_html__("Do you want to show image caption below of the image?", 'composer' ),
						"id" 		=> "archives_caption",
						"std" 		=> "disable",
						"options"	=> array(
							"enable" => esc_html__("Enable", "composer"),
							"disable" => esc_html__("Disable", "composer")
						),
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Style", 'composer' ),
						"desc" 		=> esc_html__("Select the style", 'composer' ),
						"id" 		=> "archives_styles",
						"std" 		=> "normal",
						"type" 		=> "select",
						"options" 	=> $blog_styles
				);
								
$of_options[] = array( "name" => esc_html__("Choose the Registered Sidebar", 'composer' ),
					"desc" => esc_html__("Please choose the sidebar you have created", 'composer' ),
					"id" => "archives_select_sidebar",
					"std" => "0",
					"type" => "select_sidebar",
					"hide" => array('blog-sidebar')
				);

$of_options[] = array( 	"name" 		=> esc_html__("Sidebar Position", 'composer' ),
						"desc" 		=> esc_html__("Choose blog sidebar position, it applies blog page only.", 'composer' ),
						"id" 		=> "archives_sidebar",
						"std" 		=> "right-sidebar",
						"type" 		=> "select",
						"options" 	=> $sidebar
				);

$of_options[] = array( 	"name" 		=> esc_html__("Enable/Disable Animation", 'composer' ),
						"desc" 		=> esc_html__("Do you want to animate?", 'composer' ),
						"id" 		=> "archives_animate",
						"std" 		=> "enable",
						"folds" 	=> 1,
						"options"	=> array(
							"enable" => esc_html__("Enable", "composer"),
							"disable" => esc_html__("Disable", "composer")
						),
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Animation Transition", 'composer' ),
						"desc" 		=> esc_html__("Choose animation transition", 'composer' ),
						"id" 		=> "archives_transition",
						"std" 		=> "fadeInUp",
						"type" 		=> "select",
						"fold" 		=> array( "archives_animate" => array('enable') ),
						"options" 	=> $animation
				);

$of_options[] = array( 	"name" 		=> esc_html__("Transition Duration", 'composer' ),
						"desc" 		=> esc_html__("Enter the Duration (Ex: 500ms or 1s)", 'composer' ),
						"id" 		=> "archives_duration",
						"std" 		=> "500ms",
						"fold" 		=> array( "archives_animate" => array('enable') ),
						"type" 		=> "text"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Title Limit", 'composer' ),
						"desc" 		=> esc_html__("Type the numerical value for the post title", 'composer' ),
						"id" 		=> "archives_title_limit",
						"std" 		=> 80,
						"type" 		=> "text"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Content Limit", 'composer' ),
						"desc" 		=> esc_html__("Type the numerical value for the content", 'composer' ),
						"id" 		=> "archives_content_limit",
						"std" 		=> 40,
						"type" 		=> "text"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Show/Hide Category in meta", 'composer' ),
						"desc" 		=> esc_html__("Do you want to display category meta?", 'composer' ),
						"id" 		=> "archives_category",
						"std" 		=> "show",
						"options"	=> array(
							"show" => esc_html__("Show", "composer"),
							"hide" => esc_html__("Hide", "composer")
						),
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Show/Hide Like meta", 'composer' ),
						"desc" 		=> esc_html__("Do you want to display like meta", 'composer' ),
						"id" 		=> "archives_meta_like",
						"std" 		=> "show",
						"options"	=> array(
							"show" => esc_html__("Show", "composer"),
							"hide" => esc_html__("Hide", "composer")
						),
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Show/Hide Comment meta", 'composer' ),
						"desc" 		=> esc_html__("Do you want to display comments meta?", 'composer' ),
						"id" 		=> "archives_meta_comment",
						"std" 		=> "show",
						"options"	=> array(
							"show" => esc_html__("Show", "composer"),
							"hide" => esc_html__("Hide", "composer")
						),
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Show/Hide Single post link", 'composer' ),
						"desc" 		=> esc_html__("Do you want to display single post link?", 'composer' ),
						"id" 		=> "archives_single_link",
						"std" 		=> "show",
						"options"	=> array(
							"show" => esc_html__("Show", "composer"),
							"hide" => esc_html__("Hide", "composer")
						),
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Type the single post link text", 'composer' ),
						"desc" 		=> esc_html__("Type the single post link text here", 'composer' ),
						"id" 		=> "archives_single_link_text",
						"std" 		=> "Continue Reading...",
						"type" 		=> "text"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Body Background Color", 'composer' ),
						"desc" 		=> esc_html__("It applies body background color for archives page", 'composer' ),
						"id" 		=> "archives_body_bgcolor",
						"std" 		=> "#fff",
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Body Container Background Color", 'composer' ),
						"desc" 		=> esc_html__("It applies body background color for all pages", 'composer' ),
						"id" 		=> "archives_body_container_bgcolor",
						"std" 		=> "#ffffff",
						"type" 		=> "color"
				);


//Search Setting
$of_options[] = array( 	"name" 		=> esc_html__("Search Page", 'composer' ),
						"type" 		=> "heading"
				);

$of_options[] = array(  "name"  => esc_html__("Search Title Bar", 'composer' ),
						"desc"  => esc_html__("Do you want to display search title bar?", 'composer' ),
						"id"    => "search_title_bar",
						"std"   => "show",
						"options"	=> array(
							"show" => esc_html__("Show", "composer"),
							"hide" => esc_html__("Hide", "composer")
						),
						"type"  => "switch"
					);

$of_options[] = array( 	"name" 		=> esc_html__("Search Exclude", 'composer' ),
						"desc" 		=> esc_html__("Exclude Search result here", 'composer' ),
						"id" 		=> "search_exclude",
						"std" 		=> array(''),
						"type" 		=> "multicheck",
						"options" 	=> $search_exclude
				);

$of_options[] = array( 	"name" 		=> esc_html__("No Search result title", 'composer' ),
						"desc" 		=> esc_html__("Type the no search result title", 'composer' ),
						"id" 		=> "search_no_search_result_title",
						"std" 		=> esc_html__( 'Oops, Search Result Not Found!', 'composer' ),
						"type" 		=> "text"
				);

$of_options[] = array( 	"name" 		=> esc_html__("No Search result content", 'composer' ),
						"desc" 		=> esc_html__("Type the no search result content", 'composer' ),
						"id" 		=> "search_no_search_result_content",
						"std" 		=> esc_html__( 'Uh Oh. Something is missing. Try double checking things.', 'composer' ),
						"type" 		=> "text"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Slider Shortcode", 'composer' ),
						"desc" 		=> esc_html__("Type the slider shortcode to display slider. Eg: [revslider demo]", 'composer' ),
						"id" 		=> "search_slider",
						"std" 		=> "",
						"type" 		=> "text"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Pagination Type", 'composer' ),
						"desc" 		=> esc_html__("Choose pagination type", 'composer' ),
						"id" 		=> "search_pagination",
						"std" 		=> "number",
						"type" 		=> "select",
						"options" 	=> $pagination
				);

$of_options[] = array( "name" => esc_html__("Load More Text", 'composer' ),
					"desc"    => esc_html__("Type load more text", 'composer' ),
					"id"      => "search_loadmore_text",
					"std"     => "Load More",
					"type"    => "text"
				);

$of_options[] = array( "name" => esc_html__("All Posts Loaded Text", 'composer' ),
					"desc"    => esc_html__("Type load more text", 'composer' ),
					"id"      => "search_allpost_loaded_text",
					"std"     => "All Posts Loaded",
					"type"    => "text"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Show Image Caption", 'composer' ),
						"desc" 		=> esc_html__("Do you want to show image caption below of the image?", 'composer' ),
						"id" 		=> "search_caption",
						"std" 		=> "disable",
						"options"	=> array(
							"enable" => esc_html__("Enable", "composer"),
							"disable" => esc_html__("Disable", "composer")
						),
						"type" 		=> "switch"
				);
								
$of_options[] = array( 	"name" 		=> esc_html__("Style", 'composer' ),
						"desc" 		=> esc_html__("Select the style", 'composer' ),
						"id" 		=> "search_styles",
						"std" 		=> "normal",
						"type" 		=> "select",
						"options" 	=> $blog_styles
				);
								
$of_options[] = array( "name" => esc_html__("Choose the Registered Sidebar", 'composer' ),
					"desc" => esc_html__("Please choose the sidebar you have created", 'composer' ),
					"id" => "search_select_sidebar",
					"std" => "0",
					"type" => "select_sidebar",
					"hide" => array('blog-sidebar')
				);

$of_options[] = array( 	"name" 		=> esc_html__("Sidebar Position", 'composer' ),
						"desc" 		=> esc_html__("Choose blog sidebar position, it applies blog page only.", 'composer' ),
						"id" 		=> "search_sidebar",
						"std" 		=> "right-sidebar",
						"type" 		=> "select",
						"options" 	=> $sidebar
				);

$of_options[] = array( 	"name" 		=> esc_html__("Enable/Disable Animation", 'composer' ),
						"desc" 		=> esc_html__("Do you want to animate?", 'composer' ),
						"id" 		=> "search_animate",
						"std" 		=> "enable",
						"folds" 	=> 1,
						"options"	=> array(
							"enable" => esc_html__("Enable", "composer"),
							"disable" => esc_html__("Disable", "composer")
						),
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Animation Transition", 'composer' ),
						"desc" 		=> esc_html__("Choose animation transition", 'composer' ),
						"id" 		=> "search_transition",
						"std" 		=> "fadeInUp",
						"type" 		=> "select",
						"fold" 		=> array( "search_animate" => array('enable') ),
						"options" 	=> $animation
				);

$of_options[] = array( 	"name" 		=> esc_html__("Transition Duration", 'composer' ),
						"desc" 		=> esc_html__("Enter the Duration (Ex: 500ms or 1s)", 'composer' ),
						"id" 		=> "search_duration",
						"std" 		=> "500ms",
						"fold" 		=> array( "search_animate" => array('enable') ),
						"type" 		=> "text"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Title Limit", 'composer' ),
						"desc" 		=> esc_html__("Type the numerical value for the post title", 'composer' ),
						"id" 		=> "search_title_limit",
						"std" 		=> 80,
						"type" 		=> "text"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Content Limit", 'composer' ),
						"desc" 		=> esc_html__("Type the numerical value for the content", 'composer' ),
						"id" 		=> "search_content_limit",
						"std" 		=> 40,
						"type" 		=> "text"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Show/Hide Category in meta", 'composer' ),
						"desc" 		=> esc_html__("Do you want to display category meta?", 'composer' ),
						"id" 		=> "search_category",
						"std" 		=> "show",
						"options"	=> array(
							"show" => esc_html__("Show", "composer"),
							"hide" => esc_html__("Hide", "composer")
						),
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Show/Hide Like meta", 'composer' ),
						"desc" 		=> esc_html__("Do you want to display like meta", 'composer' ),
						"id" 		=> "search_meta_like",
						"std" 		=> "show",
						"options"	=> array(
							"show" => esc_html__("Show", "composer"),
							"hide" => esc_html__("Hide", "composer")
						),
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Show/Hide Comment meta", 'composer' ),
						"desc" 		=> esc_html__("Do you want to display comments meta?", 'composer' ),
						"id" 		=> "search_meta_comment",
						"std" 		=> "show",
						"options"	=> array(
							"show" => esc_html__("Show", "composer"),
							"hide" => esc_html__("Hide", "composer")
						),
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Show/Hide Single post link", 'composer' ),
						"desc" 		=> esc_html__("Do you want to display single post link?", 'composer' ),
						"id" 		=> "search_single_link",
						"std" 		=> "show",
						"options"	=> array(
							"show" => esc_html__("Show", "composer"),
							"hide" => esc_html__("Hide", "composer")
						),
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Type the single post link text", 'composer' ),
						"desc" 		=> esc_html__("Type the single post link text here", 'composer' ),
						"id" 		=> "search_single_link_text",
						"std" 		=> "Continue Reading...",
						"type" 		=> "text"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Body Background Color", 'composer' ),
						"desc" 		=> esc_html__("It applies body background color for search page", 'composer' ),
						"id" 		=> "search_body_bgcolor",
						"std" 		=> "#fff",
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Body Container Background Color", 'composer' ),
						"desc" 		=> esc_html__("It applies body background color for all pages", 'composer' ),
						"id" 		=> "search_body_container_bgcolor",
						"std" 		=> "#ffffff",
						"type" 		=> "color"
				);

//404 Settings
$of_options[] = array( 	"name" 		=> esc_html__("Error Page", 'composer' ),
						"type" 		=> "heading"
				);

$of_options[] = array( "name" => esc_html__("Upload 404 Image", 'composer' ),
					"desc" => esc_html__("Upload a custom 404 image. Height should be more than 1360px.", 'composer' ),
					"id" => "404_bg",
					"std" => get_template_directory_uri().'/_images/404.png',
					"mod" => "min",
					"type" => "media");

$of_options[] = array( 	"name" 		=> esc_html__("404 Error text", 'composer' ),
						"desc" 		=> esc_html__("Enter the 404 error text here", 'composer' ),
						"id" 		=> "404_text",
						"std" 		=> "Page Not Found",
						"type" 		=> "textarea"
				);

$of_options[] = array( 	"name" 		=> esc_html__("404 Error text", 'composer' ),
						"desc" 		=> esc_html__("Enter the 404 error description here", 'composer' ),
						"id" 		=> "404_description",
						"std" 		=> "Sorry, but the page you were looking for can't be found. Please inform us about this error.",
						"type" 		=> "textarea"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Show/Hide 404 menu", 'composer' ),
						"desc" 		=> esc_html__("Do you want to display the 404 menu?", 'composer' ),
						"id" 		=> "404_menu",
						"std" 		=> "show",
						"options"	=> array(
							"show" => esc_html__("Show", "composer"),
							"hide" => esc_html__("Hide", "composer")
						),
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Show/Hide 404 Search", 'composer' ),
						"desc" 		=> esc_html__("Do you want to display the Search?", 'composer' ),
						"id" 		=> "404_search",
						"std" 		=> "show",
						"options"	=> array(
							"show" => esc_html__("Show", "composer"),
							"hide" => esc_html__("Hide", "composer")
						),
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Body background color", 'composer' ),
						"desc" 		=> esc_html__("It applies body background color for 404 page", 'composer' ),
						"id" 		=> "404_body_bgcolor",
						"std" 		=> "#fff",
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Body Container Background Color", 'composer' ),
						"desc" 		=> esc_html__("It applies body background color for all pages", 'composer' ),
						"id" 		=> "404_body_container_bgcolor",
						"std" 		=> "#ffffff",
						"type" 		=> "color"
				);

if (class_exists('WooCommerce')) {

	//Shop Setting
	$of_options[] = array( 	"name" 		=> esc_html__("Shop", 'composer' ),
							"type" 		=> "heading"
					);

$of_options[] = array( 	"name" 		=> esc_html__("Show/Hide Cart Button on Shop Page", 'composer' ),
						"desc" 		=> esc_html__("Do you want to display Cart Button on Shop Page?", 'composer' ),
						"id" 		=> "cart_btn_on_hover",
						"std" 		=> "show",
						"options"	=> array(
							"show" => esc_html__("Show", "composer"),
							"hide" => esc_html__("Hide", "composer")
						),
						"type" 		=> "switch"
				);

	$of_options[] = array( 	"name" 		=> esc_html__("Shop Page Style", 'composer' ),
							"desc" 		=> esc_html__("Choose shop page style, Ex: default, Masonry, Grid.", 'composer' ),
							"id" 		=> "shop_style",
							"std" 		=> "default",
							"type" 		=> "select",
							"options" 	=> $shop_styles
					);

	$of_options[] = array( 	"name" 		=> esc_html__("Pagination Type", 'composer' ),
						"desc" 		=> esc_html__("Choose pagination type", 'composer' ),
						"id" 		=> "shop_pagination",
						"std" 		=> "number",
						"type" 		=> "select",
						"options" 	=> $pagination
				);

$of_options[] = array( "name" => esc_html__("Load More Text", 'composer' ),
					"desc"    => esc_html__("Type load more text", 'composer' ),
					"id"      => "shop_loadmore_text",
					"std"     => "Load More",
					"type"    => "text"
				);

$of_options[] = array( "name" => esc_html__("All Posts Loaded Text", 'composer' ),
					"desc"    => esc_html__("Type load more text", 'composer' ),
					"id"      => "shop_allpost_loaded_text",
					"std"     => "All Posts Loaded",
					"type"    => "text"
				);

	$of_options[] = array( 	"name" 		=> esc_html__("Number of Products", 'composer' ),
							"desc" 		=> esc_html__("How many products you want to display per page?", 'composer' ),
							"id" 		=> "shop_count",
							"std" 		=> '8',
							"type" 		=> "text"
					);

	$of_options[] = array( 	"name" 		=> esc_html__("Shop Page Sidebar Position", 'composer' ),
							"desc" 		=> esc_html__("Choose shop page sidebar position, it applies shop page only.", 'composer' ),
							"id" 		=> "shop_sidebar",
							"std" 		=> "full-width",
							"type" 		=> "select",
							"options" 	=> $sidebar
					);

	$of_options[] = array( "name" => esc_html__("Choose the Shop Page Registered Sidebar", 'composer' ),
						"desc" => esc_html__("Please choose the sidebar you have created", 'composer' ),
						"id" => "shop_select_sidebar",
						"std" => "0",
						"type" => "select_sidebar",
						"hide" => array('shop')
					);

	$of_options[] = array( 	"name" 		=> esc_html__("Single Shop Sidebar Position", 'composer' ),
							"desc" 		=> esc_html__("Choose single shop page sidebar position, it applies single shop page only.", 'composer' ),
							"id" 		=> "single_shop_sidebar",
							"std" 		=> "full-width",
							"type" 		=> "select",
							"options" 	=> $sidebar
					);

	$of_options[] = array( "name" => esc_html__("Choose the Single Shop Page Registered Sidebar", 'composer' ),
						"desc" => esc_html__("Please choose the sidebar you have created", 'composer' ),
						"id" => "single_shop_select_sidebar",
						"std" => "0",
						"type" => "select_sidebar",
						"hide" => array('single-shop')
					);

	$of_options[] = array( 	"name" 		=> esc_html__("Product width", 'composer' ),
							"desc" 		=> esc_html__("Type the width of the products", 'composer' ),
							"id" 		=> "shop_width",
							"std" 		=> '398',
							"type" 		=> "text"
					);

	$of_options[] = array( 	"name" 		=> esc_html__("Product height", 'composer' ),
							"desc" 		=> esc_html__("Type the height of the products", 'composer' ),
							"id" 		=> "shop_height",
							"std" 		=> '494',
							"type" 		=> "text"
					);

$of_options[] = array( 	"name" 		=> esc_html__("Body Background Color", 'composer' ),
						"desc" 		=> esc_html__("It applies body background color for shop page", 'composer' ),
						"id" 		=> "shop_body_bgcolor",
						"std" 		=> "#fff",
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Body Container Background Color", 'composer' ),
						"desc" 		=> esc_html__("It applies body background color for all pages", 'composer' ),
						"id" 		=> "shop_body_container_bgcolor",
						"std" 		=> "#ffffff",
						"type" 		=> "color"
				);

// $of_options[] = array( 	"name" 		=> esc_html__("Single Shop Thumbnail Columns", 'composer' ),
// 						"desc" 		=> esc_html__("Choose the column for single shop thumbnails.", 'composer' ),
// 						"id" 		=> "thumbnail_column",
// 						"std" 		=> "3",
// 						"options"	=> array(
// 							"3" => esc_html__("Three", "composer"),
// 							"4" => esc_html__("Four", "composer")
// 						),
// 						"type" 		=> "switch"
// 				);

// $of_options[] = array( 	"name" 		=> esc_html__("Show/Hide Single Product Cart Button on Image Hover", 'composer' ),
// 						"desc" 		=> esc_html__("Do you want to display Single Product Cart Button on Image Hover?", 'composer' ),
// 						"id" 		=> "single_cart_btn",
// 						"std" 		=> "show",
// 						"options"	=> array(
// 							"show" => esc_html__("Show", "composer"),
// 							"hide" => esc_html__("Hide", "composer")
// 						),
// 						"type" 		=> "switch"
// 				);

}


//Footer Options
$of_options[] = array( 	"name" 		=> esc_html__("Footer Options", 'composer' ),
						"type" 		=> "heading"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Choose Fixed Footer?", 'composer' ),
						"desc" 		=> esc_html__("Do you want Footer Fixed?", 'composer' ),
						"id" 		=> "footer_fixed",
						"std" 		=> "no",
						"options"	=> array(
							"yes" => esc_html__("Yes", "composer"),
							"no" => esc_html__("No", "composer")
						),
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Show/Hide Footer Widget", 'composer' ),
						"desc" 		=> esc_html__("Do you want to display the footer widget?", 'composer' ),
						"id" 		=> "f_widget",
						"std" 		=> "show",
						"folds"		=> 1,
						"options"	=> array(
							"show" => esc_html__("Show", "composer"),
							"hide" => esc_html__("Hide", "composer")
						),
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Show/Hide Footer Widget on Mobile", 'composer' ),
						"desc" 		=> esc_html__("Do you want to display the footer widget on mobile?", 'composer' ),
						"id" 		=> "f_widget_mobile_hide",
						"std" 		=> "show",
						"folds"		=> 1,
						"options"	=> array(
							"show" => esc_html__("Show", "composer"),
							"hide" => esc_html__("Hide", "composer")
						),
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Footer Layout", 'composer' ),
						"id" 		=> "f_widget_col",
						"std" 		=> "col3",
						"type" 		=> "images",
						"fold" 		=> array( "f_widget" => array('show') ),
						"options" 	=> $footer
				);

$of_options[] = array( "name" => esc_html__("Choose the Registered Widgets", 'composer' ),
					"desc" => esc_html__("Please choose the widget area you have created", 'composer' ),
					"id" => "f_select_sidebar",
					"std" => "0",
					"type" => "select_sidebar",
					"fold" 		=> array( "f_widget" => array('show') ),
					"hide" => array('footer-widgets')
					);

$of_options[] = array( 	"name" 		=> esc_html__("Footer Style", 'composer' ),
						"desc" 		=> esc_html__("Select footer style.", 'composer' ),
						"id" 		=> "footer_style",
						"std" 		=> "dark",
						"fold" 		=> array( "f_widget" => array('show') ),
						"options"	=> array(
							"dark" => esc_html__("Dark", "composer"),
							"light" => esc_html__("Light", "composer")
						),
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Show/Hide Small footer", 'composer' ),
						"desc" 		=> esc_html__("Do you want to display the small footer?", 'composer' ),
						"id" 		=> "f_small",
						"std" 		=> "show",
						"options"	=> array(
							"show" => esc_html__("Show", "composer"),
							"hide" => esc_html__("Hide", "composer")
						),
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Show/Hide Small Footer on Mobile", 'composer' ),
						"desc" 		=> esc_html__("Do you want to display the small footer on mobile?", 'composer' ),
						"id" 		=> "f_small_mobile_hide",
						"std" 		=> "show",
						"folds"		=> 1,
						"options"	=> array(
							"show" => esc_html__("Show", "composer"),
							"hide" => esc_html__("Hide", "composer")
						),
						"type" 		=> "switch"
				);

$of_options[] = array( "name" => esc_html__("Copyright Text", 'composer' ),
					"desc" => esc_html__("Type Copyright Text", 'composer' ),
					"id"   => "f_copyright_t",
					"std"  => "&copy; 2016 [blog-link], All Rights Reserved.",
					"type"	=> "textarea");

$of_options[] = array( 	"name" 		=> esc_html__("Copyright Style", 'composer' ),
						"desc" 		=> esc_html__("Do you want to display the small footer?", 'composer' ),
						"id" 		=> "copyright_side",
						"std" 		=> "center",
						"folds" 	=> 1,
						"options"	=> array(
							"left_right" => esc_html__("Left and Right Side", "composer"),
							"center" => esc_html__("Centered", "composer")
						),
						"type" 		=> "switch"
				);

$copyright_elem = array
( 
	"disabled" => array (
		"placebo" 	=> "placebo", //REQUIRED!
		"sicons"         => "Social Icons"
	),
	"left" => array (
		"copyright_text" => "Copyright Text"
	),
	"right" => array (
		"placebo" => "placebo", //REQUIRED!
		"footer_menu"    => "Menu"
	),
);

$of_options[] = array( 	"name" 		=> esc_html__("Copyright Left Right elements", 'composer' ),
						"desc" 		=> esc_html__("Choose what you want to display on Footer Area", 'composer' ),
						"id" 		=> "copyright_sorter",
						"std" 		=> $copyright_elem,
						"fold" 		=> array( "copyright_side" => array('left_right') ),
						"type" 		=> "sorter"
				);

$copyright_center_elem = array
( 
	"disabled" => array (
		"placebo" 	=> "placebo", //REQUIRED!
		"sicons"         => "Social Icons",
		"footer_menu"    => "Menu"
	),
	"center" => array (
		"copyright_text" => "Copyright Text"
	),
);

$of_options[] = array( 	"name" 		=> esc_html__("Copyright Center elements", 'composer' ),
						"desc" 		=> esc_html__("Choose what you want to display on Footer Area", 'composer' ),
						"id" 		=> "copyright_center_sorter",
						"std" 		=> $copyright_center_elem,
						"fold" 		=> array( "copyright_side" => array('center') ),
						"type" 		=> "sorter"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Choose Footer Custom Style", 'composer' ),
						"desc" 		=> esc_html__("Do you want to customize the footer appearance?", 'composer' ),
						"id" 		=> "f_customization",
						"std" 		=> "no",
						"folds"		=> 1,
						"options"	=> array(
							"yes" => esc_html__("Yes", "composer"),
							"no" => esc_html__("No", "composer")
						),
						"type" 		=> "switch"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Footer Widget Title Color", 'composer' ),
						"desc" 		=> esc_html__("This is the footer widget title color", 'composer' ),
						"id" 		=> "custom_f_title_color",
						"std" 		=> "",
						"fold"		=> array( "f_customization" => array('yes') ),
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Footer Text Color", 'composer' ),
						"desc" 		=> esc_html__("This is the footer text color", 'composer' ),
						"id" 		=> "custom_f_txt_color",
						"std" 		=> "",
						"fold"		=> array( "f_customization" => array('yes') ),
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Footer Link Color", 'composer' ),
						"desc" 		=> esc_html__("This is the footer link color", 'composer' ),
						"id" 		=> "custom_f_link_color",
						"std" 		=> "",
						"fold"		=> array( "f_customization" => array('yes') ),
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Footer Link Hover Color", 'composer' ),
						"desc" 		=> esc_html__("This is the footer link hover color", 'composer' ),
						"id" 		=> "custom_f_link_hover_color",
						"std" 		=> "",
						"fold"		=> array( "f_customization" => array('yes') ),
						"type" 		=> "color"
				);


$of_options[] = array( 	"name" 		=> esc_html__("Footer Background Color", 'composer' ),
						"desc" 		=> esc_html__("This is the footer background color", 'composer' ),
						"id" 		=> "custom_f_bg_color",
						"std" 		=> "",
						"fold"		=> array( "f_customization" => array('yes') ),
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Choose Footer Pattern", 'composer' ),
						"desc" 		=> esc_html__("Select the footer pattern it affects only footer widget area section", 'composer' ),
						"id" 		=> "custom_f_bg_pattern",
						"std" 		=> "none",
						"type" 		=> "images",
						"fold"		=> array( "f_customization" => array('yes') ),
						"options" 	=> $pattern
				);

$of_options[] = array( "name" => esc_html__("Upload Footer Background", 'composer' ),
						"desc" => esc_html__("Upload a custom footer background. Height should be more than 1360px.", 'composer' ),
						"id" => "custom_f_bg",
						"std" => '',
						"mod" => "min",
						"fold" => array( "f_customization" => array('yes') ),
						"type" => "media"
					);


$of_options[] = array( 	"name" 		=> esc_html__("Background Attachment", 'composer' ),
						"desc" 		=> esc_html__("Choose the footer background image attachment", 'composer' ),
						"id" 		=> "custom_f_bg_attachment",
						"std" 		=> "scroll",
						"fold"		=> array( "f_customization" => array('yes') ),
						"type" 		=> "select",
						"options" 	=> $bg_attachment
				);

$of_options[] = array( 	"name" 		=> esc_html__("Background Size", 'composer' ),
						"desc" 		=> esc_html__("Choose the footer background image size", 'composer' ),
						"id" 		=> "custom_f_bg_size",
						"std" 		=> "cover",
						"fold"		=> array( "f_customization" => array('yes') ),
						"type" 		=> "select",
						"options" 	=> $bg_size
				);

$of_options[] = array( 	"name" 		=> esc_html__("Background Repeat", 'composer' ),
						"desc" 		=> esc_html__("Choose the footer background image repeat option", 'composer' ),
						"id" 		=> "custom_f_bg_repeat",
						"std" 		=> "cover",
						"fold"		=> array( "f_customization" => array('yes') ),
						"type" 		=> "select",
						"options" 	=> $bg_repeat
				);

$of_options[] = array( 	"name" 		=> esc_html__("Copyright Background Color", 'composer' ),
						"desc" 		=> esc_html__("This is the copyright background color", 'composer' ),
						"id" 		=> "custom_fc_bg_color",
						"std" 		=> "",
						"fold"		=> array( "f_customization" => array('yes') ),
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Copyright Text Color", 'composer' ),
						"desc" 		=> esc_html__("This is the copyright text color", 'composer' ),
						"id" 		=> "custom_fc_txt_color",
						"std" 		=> "",
						"fold"		=> array( "f_customization" => array('yes') ),
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Copyright Link Color", 'composer' ),
						"desc" 		=> esc_html__("This is the copyright link color", 'composer' ),
						"id" 		=> "custom_fc_link_color",
						"std" 		=> "",
						"fold"		=> array( "f_customization" => array('yes') ),
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Copyright Link Hover Color", 'composer' ),
						"desc" 		=> esc_html__("This is the copyright link hover color", 'composer' ),
						"id" 		=> "custom_fc_link_hover_color",
						"std" 		=> "",
						"fold"		=> array( "f_customization" => array('yes') ),
						"type" 		=> "color"
				);

//Styling Options
$of_options[] = array( "name" => esc_html__("Styling Options", 'composer' ),
					"type" => "heading");

$of_options[] = array( "name" => esc_html__("Custom Styles", 'composer' ),
						"desc" => esc_html__("Do you like to use Custom Styles, Please enable it and choose the Background color, Primary color, Selection text color, selection background color, link hover color. If it's disabled, the default style will apply and custom styles are won't apply.", 'composer' ),
						"id" => "custom_styles",
						"std" => "no",
						"options"	=> array(
							"yes" => esc_html__("Yes", "composer"),
							"no" => esc_html__("No", "composer")
						),
						"type" => "switch"
					);

$of_options[] = array( "name" => esc_html__("Customize Body Background", 'composer' ),
						"desc" => esc_html__("Do you want to customize the body backgound?", 'composer' ),
						"id" => "customize_body_bg",
						"std" => "no",
						"options"	=> array(
							"yes" => esc_html__("Yes", "composer"),
							"no" => esc_html__("No", "composer")
						),
						"folds" => 1,
						"type" => "switch"
					);
				
$of_options[] = array( 	"name" 		=> esc_html__("Body Background Color", 'composer' ),
						"desc" 		=> esc_html__("Pick a background color (default: #fff).", 'composer' ),
						"id" 		=> "body_background",
						"std" 		=> "#fff",
						"fold"		=> array( "customize_body_bg" => array('yes') ),
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Choose Body Pattern", 'composer' ),
						"id" 		=> "custom_body_bg_pattern",
						"std" 		=> "none",
						"type" 		=> "images",
						"fold"		=> array( "customize_body_bg" => array('yes') ),
						"options" 	=> $pattern
				);

$of_options[] = array( "name" => esc_html__("Upload Body Background Image", 'composer' ),
					"desc" => esc_html__("Upload a body background image", 'composer' ),
					"id" => "custom_body_bg",
					"std" => '',
					"mod" => "min",
					"fold"		=> array( "customize_body_bg" => array('yes') ),
					"type" => "media");

$of_options[] = array( 	"name" 		=> esc_html__("Background Attachment", 'composer' ),
						"desc" 		=> esc_html__("Choose the footer background image attachment", 'composer' ),
						"id" 		=> "custom_body_bg_attachment",
						"std" 		=> "scroll",
						"fold"		=> array( "customize_body_bg" => array('yes') ),
						"type" 		=> "select",
						"options" 	=> $bg_attachment
				);

$of_options[] = array( 	"name" 		=> esc_html__("Background Size", 'composer' ),
						"desc" 		=> esc_html__("Choose the footer background image size", 'composer' ),
						"id" 		=> "custom_body_bg_size",
						"std" 		=> "cover",
						"fold"		=> array( "customize_body_bg" => array('yes') ),
						"type" 		=> "select",
						"options" 	=> $bg_size
				);

$of_options[] = array( 	"name" 		=> esc_html__("Background Repeat", 'composer' ),
						"desc" 		=> esc_html__("Choose the footer background image repeat option", 'composer' ),
						"id" 		=> "custom_body_bg_repeat",
						"std" 		=> "cover",
						"fold"		=> array( "customize_body_bg" => array('yes') ),
						"type" 		=> "select",
						"options" 	=> $bg_repeat
				);

$of_options[] = array( 	"name" 		=> esc_html__("Container Background Color", 'composer' ),
						"desc" 		=> esc_html__("This is the container background color.(its applied for most of the items in the theme such as button, link etc..", 'composer' ),
						"id" 		=> "container_bg_color",
						"std" 		=> "",
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Primary Color", 'composer' ),
						"desc" 		=> esc_html__("This is the primary color.(its applied for most of the items in the theme such as button, link etc..", 'composer' ),
						"id" 		=> "pri_color",
						"std" 		=> "",
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Selection Text Color", 'composer' ),
						"desc" 		=> esc_html__("This is the text color when selecting the text.", 'composer' ),
						"id" 		=> "selection_text_color",
						"std" 		=> "",
						"type" 		=> "color"
				);
$of_options[] = array( 	"name" 		=> esc_html__("Selection Text Background Color", 'composer' ),
						"desc" 		=> esc_html__("This is the text background color when selecting the text.", 'composer' ),
						"id" 		=> "selection_bg_color",
						"std" 		=> "",
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Header Widget Title Color", 'composer' ),
						"desc" 		=> esc_html__("This is the header widget title color.", 'composer' ),
						"id" 		=> "header_widget_title_color",
						"std" 		=> "",
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Header Widget Text Color", 'composer' ),
						"desc" 		=> esc_html__("This is the header text color.", 'composer' ),
						"id" 		=> "header_text_color",
						"std" 		=> "",
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Header Widget Link Color", 'composer' ),
						"desc" 		=> esc_html__("This is the header link color.", 'composer' ),
						"id" 		=> "header_link_color",
						"std" 		=> "",
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Header Widget Link Hover Color", 'composer' ),
						"desc" 		=> esc_html__("This is the header widget link hover color.", 'composer' ),
						"id" 		=> "header_link_hover_color",
						"std" 		=> "",
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Highlight Color", 'composer' ),
						"desc" 		=> esc_html__("This is the highlight color.", 'composer' ),
						"id" 		=> "highlight_color",
						"std" 		=> "",
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Banner Top Meta Color", 'composer' ),
						"desc" 		=> esc_html__("This is the banner top meta color.", 'composer' ),
						"id" 		=> "single_banner_top_meta_color",
						"std" 		=> "",
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Banner Top Meta Background Color", 'composer' ),
						"desc" 		=> esc_html__("This is the banner top meta background color.", 'composer' ),
						"id" 		=> "single_banner_top_meta_background_color",
						"std" 		=> "",
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Banner Title Color", 'composer' ),
						"desc" 		=> esc_html__("This is the banner title color.", 'composer' ),
						"id" 		=> "single_banner_title_color",
						"std" 		=> "",
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Banner Meta Color", 'composer' ),
						"desc" 		=> esc_html__("This is the banner meta color.", 'composer' ),
						"id" 		=> "single_banner_meta_color",
						"std" 		=> "",
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Banner Meta Link Color", 'composer' ),
						"desc" 		=> esc_html__("This is the banner meta link color.", 'composer' ),
						"id" 		=> "single_banner_meta_link_color",
						"std" 		=> "",
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Banner Caption Color", 'composer' ),
						"desc" 		=> esc_html__("This is the banner caption color.", 'composer' ),
						"id" 		=> "single_banner_caption_color",
						"std" 		=> "",
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> esc_html__("Banner Background Color", 'composer' ),
						"desc" 		=> esc_html__("This is the banner background color.", 'composer' ),
						"id" 		=> "single_banner_background_color",
						"std" 		=> "",
						"type" 		=> "color"
				);

//Typography
$of_options[] = array( "name" => esc_html__("Typography", 'composer' ),
					"type" => "heading");

$of_options[] = array( 	"name" 		=> esc_html__("Body Fonts", 'composer' ),
						"desc" 		=> esc_html__("Choose google webfont and Fallback fonts (incase google webfonts not loaded, fallback websafe fonts will apply). This font will for body texts", 'composer' ),
						"id" 		=> "custom_font_body",
						"std" 		=> array(
											'size'  => '14px',
											'g_face' => 'Raleway',
											'face'  => 'Arial, sans-serif',
											'style' => 'regular',
											//'color' => '#3d3d3d'
										),
						"type" 		=> "select_google_font",
						"preview" 	=> array(
										"text" => "This is choosen google webfonts preview text!<br>0123456789", //this is the text from preview box
										"size" => "30px" //this is the text size from preview box
						)
				);

$of_options[] = array( 	"name" 		=> esc_html__("Primary Fonts", 'composer' ),
						"desc" 		=> esc_html__("Choose google webfont and Fallback fonts (incase google webfonts not loaded, fallback websafe fonts will apply). This font will apply for Headings, main menu, Titles etc. To take full contorl turn on advance font settings from below and enjoy!", 'composer' ),
						"id" 		=> "custom_font_primary",
						"std" 		=> array(
											'g_face' => 'Poppins',
											'face'  => 'Arial, sans-serif'
										),
						"type" 		=> "select_google_font",
						"preview" 	=> array(
										"text" => "This is choosen google webfonts preview text!<br>0123456789", //this is the text from preview box
										"size" => "30px" //this is the text size from preview box
						)
				);

$of_options[] = array( 	"name" 		=> esc_html__("Content Fonts", 'composer' ),
						"desc" 		=> esc_html__("Choose google webfont and Fallback fonts (incase google webfonts not loaded, fallback websafe fonts will apply). This font will apply for most of the sections in the theme including paragraph, lists, blockquote, testimonial, sub menu etc. To take full contorl turn on advance font settings from below and enjoy!", 'composer' ),
						"id" 		=> "custom_font_content",
						"std" 		=> array(
											'g_face' => 'Poppins',
											'face'  => 'Arial, sans-serif',
											//'style' => 'regular',
										),
						"type" 		=> "select_google_font",
						"preview" 	=> array(
										"text" => "This is choosen google webfonts preview text!<br>0123456789", //this is the text from preview box
										"size" => "30px" //this is the text size from preview box
						)
				);


//Subset
$subset = array(
			'latin' => esc_html__('Latin', "composer"),
			'cyrillic-ext' => esc_html__('Cyrillic Extended (cyrillic-ext) ', "composer"),
			'greek-ext' => esc_html__('Greek Extended (greek-ext)', "composer"),
			'greek' => esc_html__('Greek (greek)', "composer"),
			'vietnamese' => esc_html__('Vietnamese (vietnamese)', "composer"),
			'latin-ext' => esc_html__('Latin Extended (latin-ext)', "composer"),
			'cyrillic' => esc_html__('Cyrillic (cyrillic)', "composer")
			);

$of_options[] = array( 	"name" 		=> esc_html__("Choose the character sets you want:", 'composer' ),
						"desc" 		=> esc_html__("If you choose only the languages that you need, you'll help prevent slowness on your webpage.", 'composer' ),
						"id" 		=> "subset",
						"std" 		=> array("latin"),
						"type" 		=> "multicheck",
						"options" 	=> $subset
				);

//Advance Typography Options
$of_options[] = array( "name" => esc_html__("Advance Typography", 'composer' ),
					"type" => "heading");

$of_options[] = array( "name" => esc_html__("Advance Font Setting", 'composer' ),
						"desc" => esc_html__("Do you like to Enable Advance Font Settings? By enabling this you can choose font each and every possible section. choose less number of fonts, it will to help prevent slowness on your webpage.", 'composer' ),
						"id" => "ad_font_settings",
						"std" => "no",
						"folds"		=> 1,
						"options"	=> array(
							"yes" => esc_html__("Yes", "composer"),
							"no" => esc_html__("No", "composer")
						),
						"type" => "switch"
					);

$of_options[] = array( 	"name" 		=> esc_html__("H1 Font", 'composer' ),
						"desc" 		=> esc_html__("This font will apply for h1 tag blog and pages. (This will not apply in Title Shortcode). Choose google webfont and Fallback fonts (incase google webfonts not loaded, fallback websafe fonts will apply).", 'composer' ),
						"id" 		=> "cf_h1",
						"std" 		=> array(
											'size'  => '24px',
											'g_face' => 'Poppins',
											'face'  => 'Arial, sans-serif',
											'style' => '700',
											//'color' => '#3d3d3d'
										),
						"type" 		=> "select_google_font",
						"fold"		=> array( "ad_font_settings" => array('yes') ),
						"preview" 	=> array(
										"text" => "This is choosen google webfonts preview text!<br>0123456789", //this is the text from preview box
										"size" => "30px" //this is the text size from preview box
						)
				);

$of_options[] = array( 	"name" 		=> esc_html__("H2 Font", 'composer' ),
						"desc" 		=> esc_html__("This font will apply for h2 tag blog and pages. (This will not apply in Title Shortcode). Choose google webfont and Fallback fonts (incase google webfonts not loaded, fallback websafe fonts will apply).", 'composer' ),
						"id" 		=> "cf_h2",
						"std" 		=> array(
											'size'  => '21px',
											'g_face' => 'Poppins',
											'face'  => 'Arial, sans-serif',
											'style' => '700',
											//'color' => '#3d3d3d'
										),
						"type" 		=> "select_google_font",
						"fold"		=> array( "ad_font_settings" => array('yes') ),
						"preview" 	=> array(
										"text" => "This is choosen google webfonts preview text!<br>0123456789", //this is the text from preview box
										"size" => "30px" //this is the text size from preview box
						)
				);

$of_options[] = array( 	"name" 		=> esc_html__("H3 Font", 'composer' ),
						"desc" 		=> esc_html__("This font will apply for h2 tag blog and pages. (This will not apply in Title Shortcode). Choose google webfont and Fallback fonts (incase google webfonts not loaded, fallback websafe fonts will apply).", 'composer' ),
						"id" 		=> "cf_h3",
						"std" 		=> array(
											'size'  => '18px',
											'g_face' => 'Poppins',
											'face'  => 'Arial, sans-serif',
											'style' => '700',
											//'color' => '#3d3d3d'
										),
						"type" 		=> "select_google_font",
						"fold"		=> array( "ad_font_settings" => array('yes') ),
						"preview" 	=> array(
										"text" => "This is choosen google webfonts preview text!<br>0123456789", //this is the text from preview box
										"size" => "30px" //this is the text size from preview box
						)
				);

$of_options[] = array( 	"name" 		=> esc_html__("H4 Font", 'composer' ),
						"desc" 		=> esc_html__("This font will apply for h2 tag blog and pages. (This will not apply in Title Shortcode). Choose google webfont and Fallback fonts (incase google webfonts not loaded, fallback websafe fonts will apply).", 'composer' ),
						"id" 		=> "cf_h4",
						"std" 		=> array(
											'size'  => '16px',
											'g_face' => 'Poppins',
											'face'  => 'Arial, sans-serif',
											'style' => '700',
											//'color' => '#3d3d3d'
										),
						"type" 		=> "select_google_font",
						"fold"		=> array( "ad_font_settings" => array('yes') ),
						"preview" 	=> array(
										"text" => "This is choosen google webfonts preview text!<br>0123456789", //this is the text from preview box
										"size" => "30px" //this is the text size from preview box
						)
				);

$of_options[] = array( 	"name" 		=> esc_html__("H5 Font", 'composer' ),
						"desc" 		=> esc_html__("This font will apply for h2 tag blog and pages. (This will not apply in Title Shortcode). Choose google webfont and Fallback fonts (incase google webfonts not loaded, fallback websafe fonts will apply).", 'composer' ),
						"id" 		=> "cf_h5",
						"std" 		=> array(
											'size'  => '14px',
											'g_face' => 'Poppins',
											'face'  => 'Arial, sans-serif',
											'style' => '700',
											//'color' => '#3d3d3d'
										),
						"type" 		=> "select_google_font",
						"fold"		=> array( "ad_font_settings" => array('yes') ),
						"preview" 	=> array(
										"text" => "This is choosen google webfonts preview text!<br>0123456789", //this is the text from preview box
										"size" => "30px" //this is the text size from preview box
						)
				);

$of_options[] = array( 	"name" 		=> esc_html__("H6 Font", 'composer' ),
						"desc" 		=> esc_html__("This font will apply for h2 tag blog and pages. (This will not apply in Title Shortcode). Choose google webfont and Fallback fonts (incase google webfonts not loaded, fallback websafe fonts will apply).", 'composer' ),
						"id" 		=> "cf_h6",
						"std" 		=> array(
											'size'  => '12px',
											'g_face' => 'Poppins',
											'face'  => 'Arial, sans-serif',
											'style' => '700',
											//'color' => '#3d3d3d'
										),
						"type" 		=> "select_google_font",
						"fold"		=> array( "ad_font_settings" => array('yes') ),
						"preview" 	=> array(
										"text" => "This is choosen google webfonts preview text!<br>0123456789", //this is the text from preview box
										"size" => "30px" //this is the text size from preview box
						)
				);

$of_options[] = array( 	"name" 		=> esc_html__("List Item Font", 'composer' ),
						"desc" 		=> esc_html__("This font will apply for li tag.Choose google webfont and Fallback fonts (incase google webfonts not loaded, fallback websafe fonts will apply).", 'composer' ),
						"id" 		=> "cf_list",
						"std" 		=> array(
											'size'  => '14px',
											'g_face' => 'Poppins',
											'face'  => 'Arial, sans-serif',
											'style' => '400',
											//'color' => '#3d3d3d'
										),
						"type" 		=> "select_google_font",
						"fold"		=> array( "ad_font_settings" => array('yes') ),
						"preview" 	=> array(
										"text" => "This is choosen google webfonts preview text!<br>0123456789", //this is the text from preview box
										"size" => "30px" //this is the text size from preview box
						)
				);

$of_options[] = array( 	"name" 		=> esc_html__("Link Font", 'composer' ),
						"desc" 		=> esc_html__("This font will apply for link tag.Choose google webfont and Fallback fonts (incase google webfonts not loaded, fallback websafe fonts will apply).", 'composer' ),
						"id" 		=> "cf_link",
						"std" 		=> array(
											'size'  => '14px',
											'g_face' => 'Poppins',
											'face'  => 'Arial, sans-serif',
											'style' => '400',
											//'color' => '#3d3d3d'
										),
						"type" 		=> "select_google_font",
						"fold"		=> array( "ad_font_settings" => array('yes') ),
						"preview" 	=> array(
										"text" => "This is choosen google webfonts preview text!<br>0123456789", //this is the text from preview box
										"size" => "30px" //this is the text size from preview box
						)
				);

$of_options[] = array( 	"name" 		=> esc_html__("Logo Font", 'composer' ),
						"desc" 		=> esc_html__("This font will apply for Text Logo.Choose google webfont and Fallback fonts (incase google webfonts not loaded, fallback websafe fonts will apply).", 'composer' ),
						"id" 		=> "cf_logo",
						"std" 		=> array(
											'size'  => '30px',
											'g_face' => 'Poppins',
											'face'  => 'Arial, sans-serif',
											'style' => '700',
											//'color' => '#3d3d3d'
										),
						"type" 		=> "select_google_font",
						"fold"		=> array( "ad_font_settings" => array('yes') ),
						"preview" 	=> array(
										"text" => "This is choosen google webfonts preview text!<br>0123456789", //this is the text from preview box
										"size" => "30px" //this is the text size from preview box
						)
				);

$of_options[] = array( 	"name" 		=> esc_html__("BlockQuote Font", 'composer' ),
						"desc" 		=> esc_html__("This font will apply for blockquote tag.Choose google webfont and Fallback fonts (incase google webfonts not loaded, fallback websafe fonts will apply).", 'composer' ),
						"id" 		=> "cf_blockquote",
						"std" 		=> array(
											'size'  => '14px',
											'g_face' => 'Poppins',
											'face'  => 'Arial, sans-serif',
											'style' => '400italic',
											//'color' => '#3d3d3d'
										),
						"type" 		=> "select_google_font",
						"fold"		=> array( "ad_font_settings" => array('yes') ),
						"preview" 	=> array(
										"text" => "This is choosen google webfonts preview text!<br>0123456789", //this is the text from preview box
										"size" => "30px" //this is the text size from preview box
						)
				);

$of_options[] = array( 	"name" 		=> esc_html__("Main Menu Font", 'composer' ),
						"desc" 		=> esc_html__("This font will apply for Main Menu Style.Choose google webfont and Fallback fonts (incase google webfonts not loaded, fallback websafe fonts will apply).", 'composer' ),
						"id" 		=> "cf_menu",
						"std" 		=> array(
											'size'  => '14px',
											'g_face' => 'Poppins',
											'face'  => 'Arial, sans-serif',
											'style' => '700',
											//'color' => '#3d3d3d'
										),
						"type" 		=> "select_google_font",
						"fold"		=> array( "ad_font_settings" => array('yes') ),
						"preview" 	=> array(
										"text" => "This is choosen google webfonts preview text!<br>0123456789", //this is the text from preview box
										"size" => "30px" //this is the text size from preview box
						)
				);

$of_options[] = array( 	"name" 		=> esc_html__("Sub Menu Font", 'composer' ),
						"desc" 		=> esc_html__("This font will apply for Sub Menu Style.Choose google webfont and Fallback fonts (incase google webfonts not loaded, fallback websafe fonts will apply).", 'composer' ),
						"id" 		=> "cf_sub_menu",
						"std" 		=> array(
											'size'  => '14px',
											'g_face' => 'Poppins',
											'face'  => 'Arial, sans-serif',
											'style' => '400',
											//'color' => '#3d3d3d'
										),
						"type" 		=> "select_google_font",
						"fold"		=> array( "ad_font_settings" => array('yes') ),
						"preview" 	=> array(
										"text" => "This is choosen google webfonts preview text!<br>0123456789", //this is the text from preview box
										"size" => "30px" //this is the text size from preview box
						)
				);

$of_options[] = array( 	"name" 		=> esc_html__("Mega Menu Title Font", 'composer' ),
						"desc" 		=> esc_html__("This font will apply for Mega Menu Title Style.Choose google webfont and Fallback fonts (incase google webfonts not loaded, fallback websafe fonts will apply).", 'composer' ),
						"id" 		=> "cf_mega_menu",
						"std" 		=> array(
											'size'  => '14px',
											'g_face' => 'Poppins',
											'face'  => 'Arial, sans-serif',
											'style' => '700',
											//'color' => '#3d3d3d'
										),
						"type" 		=> "select_google_font",
						"fold"		=> array( "ad_font_settings" => array('yes') ),
						"preview" 	=> array(
										"text" => "This is choosen google webfonts preview text!<br>0123456789", //this is the text from preview box
										"size" => "30px" //this is the text size from preview box
						)
				);

$of_options[] = array( 	"name" 		=> esc_html__("Title Font", 'composer' ),
						"desc" 		=> esc_html__("This font will apply for Title Style.Choose google webfont and Fallback fonts (incase google webfonts not loaded, fallback websafe fonts will apply).", 'composer' ),
						"id" 		=> "cf_main_title",
						"std" 		=> array(
											'size'  => '21px',
											'g_face' => 'Poppins',
											'face'  => 'Arial, sans-serif',
											'style' => '700',
											//'color' => '#3d3d3d'
										),
						"type" 		=> "select_google_font",
						"fold"		=> array( "ad_font_settings" => array('yes') ),
						"preview" 	=> array(
										"text" => "This is choosen google webfonts preview text!<br>0123456789", //this is the text from preview box
										"size" => "30px" //this is the text size from preview box
						)
				);


$of_options[] = array( 	"name" 		=> esc_html__("Button Small Font Size", 'composer' ),
						"desc" 		=> esc_html__("Choose the button large text font size", 'composer' ),
						"id" 		=> "cf_btn_small",
						"std" 		=> "13px",
						"type" 		=> "select",
						"mod" 		=> "mini",
						"fold"		=> array( "ad_font_settings" => array('yes') ),
						"options" 	=> $font_sizes
				);


$of_options[] = array( 	"name" 		=> esc_html__("Button Medium Font", 'composer' ),
						"desc" 		=> esc_html__("This font will apply for Button Style.Choose google webfont and Fallback fonts (incase google webfonts not loaded, fallback websafe fonts will apply).", 'composer' ),
						"id" 		=> "cf_btn",
						"std" 		=> array(
											'size'  => '14px',
											'g_face' => 'Poppins',
											'face'  => 'Arial, sans-serif',
											'style' => '700',
											//'color' => '#3d3d3d'
										),
						"type" 		=> "select_google_font",
						"fold"		=> array( "ad_font_settings" => array('yes') ),
						"preview" 	=> array(
										"text" => "This is choosen google webfonts preview text!<br>0123456789", //this is the text from preview box
										"size" => "30px" //this is the text size from preview box
						)
				);

$of_options[] = array( 	"name" 		=> esc_html__("Button Large Font Size", 'composer' ),
						"desc" 		=> esc_html__("Choose the button large text font size", 'composer' ),
						"id" 		=> "cf_btn_lg",
						"std" 		=> "16px",
						"type" 		=> "select",
						"mod" 		=> "mini",
						"fold"		=> array( "ad_font_settings" => array('yes') ),
						"options" 	=> $font_sizes
				); 

$of_options[] = array( 	"name" 		=> esc_html__("Process Title Font", 'composer' ),
						"desc" 		=> esc_html__("This font will apply for Process Title Style.Choose google webfont and Fallback fonts (incase google webfonts not loaded, fallback websafe fonts will apply).", 'composer' ),
						"id" 		=> "cf_process_title",
						"std" 		=> array(
											'size'  => '21px',
											'g_face' => 'Poppins',
											'face'  => 'Arial, sans-serif',
											'style' => '700',
											//'color' => '#3d3d3d'
										),
						"type" 		=> "select_google_font",
						"fold"		=> array( "ad_font_settings" => array('yes') ),
						"preview" 	=> array(
										"text" => "This is choosen google webfonts preview text!<br>0123456789", //this is the text from preview box
										"size" => "30px" //this is the text size from preview box
						)
				); 

$of_options[] = array( 	"name" 		=> esc_html__("Process Content Font", 'composer' ),
						"desc" 		=> esc_html__("This font will apply for Process Content Style.Choose google webfont and Fallback fonts (incase google webfonts not loaded, fallback websafe fonts will apply).", 'composer' ),
						"id" 		=> "cf_process_content",
						"std" 		=> array(
											'size'  => '40px',
											'g_face' => 'Poppins',
											'face'  => 'Arial, sans-serif',
											'style' => '400',
											//'color' => '#3d3d3d'
										),
						"type" 		=> "select_google_font",
						"fold"		=> array( "ad_font_settings" => array('yes') ),
						"preview" 	=> array(
										"text" => "This is choosen google webfonts preview text!<br>0123456789", //this is the text from preview box
										"size" => "30px" //this is the text size from preview box
						)
				);

$of_options[] = array( 	"name" 		=> esc_html__("Skill Percentage Text Font", 'composer' ),
						"desc" 		=> esc_html__("This font will apply for Percentage Text Style.Choose google webfont and Fallback fonts (incase google webfonts not loaded, fallback websafe fonts will apply).", 'composer' ),
						"id" 		=> "cf_percent_text",
						"std" 		=> array(
											'size'  => '40px',
											'g_face' => 'Poppins',
											'face'  => 'Arial, sans-serif',
											'style' => '700',
											//'color' => '#3d3d3d'
										),
						"type" 		=> "select_google_font",
						"fold"		=> array( "ad_font_settings" => array('yes') ),
						"preview" 	=> array(
										"text" => "This is choosen google webfonts preview text!<br>0123456789", //this is the text from preview box
										"size" => "30px" //this is the text size from preview box
						)
				); 

$of_options[] = array( 	"name" 		=> esc_html__("Skill Percentage Outside Title Font", 'composer' ),
						"desc" 		=> esc_html__("This font will apply for Percentage Outside Title Style.Choose google webfont and Fallback fonts (incase google webfonts not loaded, fallback websafe fonts will apply).", 'composer' ),
						"id" 		=> "cf_percent_outside",
						"std" 		=> array(
											'size'  => '16px',
											'g_face' => 'Poppins',
											'face'  => 'Arial, sans-serif',
											'style' => '700',
											//'color' => '#3d3d3d'
										),
						"type" 		=> "select_google_font",
						"fold"		=> array( "ad_font_settings" => array('yes') ),
						"preview" 	=> array(
										"text" => "This is choosen google webfonts preview text!<br>0123456789", //this is the text from preview box
										"size" => "30px" //this is the text size from preview box
						)
				);

$of_options[] = array( 	"name" 		=> esc_html__("Textfield Font", 'composer' ),
						"desc" 		=> esc_html__("This font will apply for Textfield Style.Choose google webfont and Fallback fonts (incase google webfonts not loaded, fallback websafe fonts will apply).", 'composer' ),
						"id" 		=> "cf_txtfield",
						"std" 		=> array(
											'size'  => '14px',
											'g_face' => 'Poppins',
											'face'  => 'Arial, sans-serif',
											'style' => '400italic',
											//'color' => '#3d3d3d'
										),
						"type" 		=> "select_google_font",
						"fold"		=> array( "ad_font_settings" => array('yes') ),
						"preview" 	=> array(
										"text" => "This is choosen google webfonts preview text!<br>0123456789", //this is the text from preview box
										"size" => "30px" //this is the text size from preview box
						)
				);

$of_options[] = array( 	"name" 		=> esc_html__("Portfolio Filter Font", 'composer' ),
						"desc" 		=> esc_html__("This font will apply for Portfolio Filter Style.Choose google webfont and Fallback fonts (incase google webfonts not loaded, fallback websafe fonts will apply).", 'composer' ),
						"id" 		=> "cf_filter_normal",
						"std" 		=> array(
											'g_face' => 'Poppins',
											'face'  => 'Arial, sans-serif',
											'style' => '700',
											//'color' => '#3d3d3d'
										),
						"type" 		=> "select_google_font",
						"fold"		=> array( "ad_font_settings" => array('yes') ),
						"preview" 	=> array(
										"text" => "This is choosen google webfonts preview text!<br>0123456789", //this is the text from preview box
										"size" => "30px" //this is the text size from preview box
						)
				);

$of_options[] = array( 	"name" 		=> esc_html__("Pricing Table Title Font", 'composer' ),
						"desc" 		=> esc_html__("This font will apply for Pricing Table Title Style.Choose google webfont and Fallback fonts (incase google webfonts not loaded, fallback websafe fonts will apply).", 'composer' ),
						"id" 		=> "cf_plan_title",
						"std" 		=> array(
											'size'  => '16px',
											'g_face' => 'Poppins',
											'face'  => 'Arial, sans-serif',
											'style' => '600',
											//'color' => '#3d3d3d'
										),
						"type" 		=> "select_google_font",
						"fold"		=> array( "ad_font_settings" => array('yes') ),
						"preview" 	=> array(
										"text" => "This is choosen google webfonts preview text!<br>0123456789", //this is the text from preview box
										"size" => "30px" //this is the text size from preview box
						)
				);

$of_options[] = array( 	"name" 		=> esc_html__("Pricing Table Price Font", 'composer' ),
						"desc" 		=> esc_html__("This font will apply for Pricing Table Price Style.Choose google webfont and Fallback fonts (incase google webfonts not loaded, fallback websafe fonts will apply).", 'composer' ),
						"id" 		=> "cf_plan_value",
						"std" 		=> array(
											'size'  => '32px',
											'g_face' => 'Poppins',
											'face'  => 'Arial, sans-serif',
											'style' => '900',
											//'color' => '#3d3d3d'
										),
						"type" 		=> "select_google_font",
						"fold"		=> array( "ad_font_settings" => array('yes') ),
						"preview" 	=> array(
										"text" => "This is choosen google webfonts preview text!<br>0123456789", //this is the text from preview box
										"size" => "30px" //this is the text size from preview box
						)
				);

$of_options[] = array( 	"name" 		=> esc_html__("Pricing Table Currency Font", 'composer' ),
						"desc" 		=> esc_html__("This font will apply for Pricing Table Currency Style.Choose google webfont and Fallback fonts (incase google webfonts not loaded, fallback websafe fonts will apply).", 'composer' ),
						"id" 		=> "cf_plan_valign",
						"std" 		=> array(
											'size'  => '13px',
											'g_face' => 'Poppins',
											'face'  => 'Arial, sans-serif',
											'style' => '700',
											//'color' => '#3d3d3d'
										),
						"type" 		=> "select_google_font",
						"fold"		=> array( "ad_font_settings" => array('yes') ),
						"preview" 	=> array(
										"text" => "This is choosen google webfonts preview text!<br>0123456789", //this is the text from preview box
										"size" => "30px" //this is the text size from preview box
						)
				);

$of_options[] = array( 	"name" 		=> esc_html__("Pricing Table Price Period Font", 'composer' ),
						"desc" 		=> esc_html__("This font will apply for Pricing Table Price Period Style.Choose google webfont and Fallback fonts (incase google webfonts not loaded, fallback websafe fonts will apply).", 'composer' ),
						"id" 		=> "cf_plan_month",
						"std" 		=> array(
											'size'  => '14px',
											'g_face' => 'Poppins',
											'face'  => 'Arial, sans-serif',
											'style' => '400',
											//'color' => '#3d3d3d'
										),
						"type" 		=> "select_google_font",
						"fold"		=> array( "ad_font_settings" => array('yes') ),
						"preview" 	=> array(
										"text" => "This is choosen google webfonts preview text!<br>0123456789", //this is the text from preview box
										"size" => "30px" //this is the text size from preview box
						)
				);

$of_options[] = array( 	"name" 		=> esc_html__("Single Blog Banner Title", 'composer' ),
						"desc" 		=> esc_html__("This font will apply for Single Blog Banner Title.Choose google webfont and Fallback fonts (incase google webfonts not loaded, fallback websafe fonts will apply).", 'composer' ),
						"id" 		=> "cf_single_banner_title",
						"std" 		=> array(
											'size'  => '41px',
											'g_face' => 'Poppins',
											'face'  => 'Arial, sans-serif',
											'style' => '500',
											//'color' => '#3d3d3d'
										),
						"type" 		=> "select_google_font",
						"fold"		=> array( "ad_font_settings" => array('yes') ),
						"preview" 	=> array(
										"text" => "This is choosen google webfonts preview text!<br>0123456789", //this is the text from preview box
										"size" => "30px" //this is the text size from preview box
						)
				);

$of_options[] = array( 	"name" 		=> esc_html__("Single Blog Banner Meta", 'composer' ),
						"desc" 		=> esc_html__("This font will apply for Single Blog Banner Meta.Choose google webfont and Fallback fonts (incase google webfonts not loaded, fallback websafe fonts will apply).", 'composer' ),
						"id" 		=> "cf_single_banner_meta",
						"std" 		=> array(
											'size'  => '14px',
											'g_face' => 'Raleway',
											'face'  => 'Arial, sans-serif',
											'style' => '400',
											//'color' => '#3d3d3d'
										),
						"type" 		=> "select_google_font",
						"fold"		=> array( "ad_font_settings" => array('yes') ),
						"preview" 	=> array(
										"text" => "This is choosen google webfonts preview text!<br>0123456789", //this is the text from preview box
										"size" => "30px" //this is the text size from preview box
						)
				);

$of_options[] = array( 	"name" 		=> esc_html__("Widget Title Font", 'composer' ),
						"desc" 		=> esc_html__("This font will apply for Widget Title Style.Choose google webfont and Fallback fonts (incase google webfonts not loaded, fallback websafe fonts will apply).", 'composer' ),
						"id" 		=> "cf_widget_title",
						"std" 		=> array(
											'size'  => '16px',
											'g_face' => 'Poppins',
											'face'  => 'Arial, sans-serif',
											'style' => '700',
											//'color' => '#3d3d3d'
										),
						"type" 		=> "select_google_font",
						"fold"		=> array( "ad_font_settings" => array('yes') ),
						"preview" 	=> array(
										"text" => "This is choosen google webfonts preview text!<br>0123456789", //this is the text from preview box
										"size" => "30px" //this is the text size from preview box
						)
				);

// Backup Options
$of_options[] = array( 	"name" 		=> esc_html__("Custom Fonts", 'composer' ),
						"type" 		=> "heading",						
				);

$of_options[] = array(
					"id" => "introduction",
					"std" => '<h3>'. esc_html__( 'Add you own Custom fonts.', 'composer' ) . '</h3> ' . __('Add your own fonts here, once you added <strong>hit save button and refresh page</strong>, then you will see on your font on all fonts settings dropdown. <strong>Note:</strong> Once you added font here, it will automatically loaded on the site, but you have choose the font from styling options.', 'composer' ),
					"icon" => true,
					"type" => "info");	

$of_options[] = array( 	"name" 		=> esc_html__("Add you own fonts here", 'composer' ),
						"desc" 		=> esc_html__("Add your own fonts here, once you added your font refresh the page to see on your font on all fonts font refresh dropdown.", 'composer' ),
						"id" 		=> "custom_fonts",
						"std" 		=> "",		
						"type" 		=> "custom_fonts"
				);

// Backup Options
$of_options[] = array( 	"name" 		=> esc_html__("Backup Options", 'composer' ),
						"type" 		=> "heading",
						
				);
				
$of_options[] = array( 	"name" 		=> esc_html__("Backup and Restore Options", 'composer' ),
						"desc" 		=> esc_html__("You can use the two buttons below to backup your current options, and then restore it back at a later time. This is useful if you want to experiment on the options but would like to keep the old settings in case you need it back.", 'composer' ),
						"id" 		=> "of_backup",
						"std" 		=> "",
						"type" 		=> "backup",
				);
				
$of_options[] = array( 	"name" 		=> esc_html__("Transfer Theme Options Data", 'composer' ),
						"desc" 		=> esc_html__("You can tranfer the saved options data between different installs by copying the text inside the text box. To import data from another install, replace the data in the text box with the one from another install and click 'Import Options'.", 'composer' ),
						"id" 		=> "of_transfer",
						"std" 		=> "",
						"type" 		=> "transfer",
						
				);
				
	}//End function: of_options()
}//End chack if function exists: of_options()
?>