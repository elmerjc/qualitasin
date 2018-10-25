<?php
    /* =============================================================================
     Gallery Blocks Extend Vc
     ========================================================================== */

	$block = array(
		'gallery_block1'  => esc_html__( 'Gallery Block 1', 'composer' ),
		'gallery_block2'  => esc_html__( 'Gallery Block 2', 'composer' ),
		'gallery_block3'  => esc_html__( 'Gallery Block 3', 'composer' ),
		'gallery_block4'  => esc_html__( 'Gallery Block 4', 'composer' ),
		'gallery_block5'  => esc_html__( 'Gallery Block 5', 'composer' ),
		'gallery_block6'  => esc_html__( 'Gallery Block 6', 'composer' ),
		'gallery_block7'  => esc_html__( 'Gallery Block 7', 'composer' ),
		'gallery_block8'  => esc_html__( 'Gallery Block 8', 'composer' ),
		'gallery_block9'  => esc_html__( 'Gallery Block 9', 'composer' ),
		'gallery_block10' => esc_html__( 'Gallery Block 10', 'composer' ),
		'gallery_block11' => esc_html__( 'Gallery Block 11', 'composer' ),
		'gallery_block12' => esc_html__( 'Gallery Block 12', 'composer' )
	);
	
	foreach ( $block as $key => $value ) {

		$icon = str_replace('gallery_block', 'icon-portfolio-block', $key);

		// Gallery Block
		vc_map( array(
			"name" => $value, //Title
			"base" => $key, //Shortcode name
			"class" => "blocks",
			"icon" => $icon,
			"category" => 'Gallery Blocks', //category
			"params" => array(

				array(
					"type" => "attach_images",
					"heading" => esc_html__("Image", "composer"),
					"param_name" => "image_id",
					"value" => "",
					"description" => esc_html__("Select a icon image from media library.", "composer")
				),

				// array(
				// 	"type" => "dropdown",
				// 	"heading" => esc_html__("Choose a style", "composer"),
				// 	"param_name" => "style",
				// 	"value" => array(
				// 		esc_html__('style 1', "composer") => "gallery_style1"
				// 	),
				// 	"description" => esc_html__("Select the gallery block hover styles", "composer")
				// ),

				array(
					'type' => 'dropdown',
					'heading' => __( 'On click action', 'composer' ),
					'param_name' => 'onclick',
					'value' => array(
						__( 'None', 'composer' ) => '',
						__( 'Open lightbox', 'composer' ) => 'lightbox',
						__( 'Open custom link', 'composer' ) => 'custom_link',
					),
					'description' => __( 'Select action for click action.', 'composer' ),
					'std' => 'lightbox',
				),

				array(
					"type" => "dropdown",
					"heading" => esc_html__("Hover color", "composer"),
					"param_name" => "hover_color",
					"value" => array(
						esc_html__('Default', "composer") => "",
						esc_html__('White', "composer") => " port-bg-white",
						esc_html__('Color', "composer") => " port-bg-color"
					),
					"description" => '',
					'dependency' => array( 'element' => 'onclick', 'value' => array( 'lightbox'),
					),
				),

				array(
					'type' => 'textfield',
					'heading' => __( 'Custom links', 'composer' ),
					'param_name' => 'custom_links',
					'description' => __( 'Enter links for each image (Note: divide links with commas).', 'composer' ),
					'dependency' => array( 'element' => 'onclick', 'value' => array( 'custom_link' ),
					),
				),

				array(
					'type' => 'dropdown',
					'heading' => __( 'Custom link target', 'composer' ),
					'param_name' => 'custom_links_target',
					'description' => __( 'Select where to open  custom links.', 'composer' ),
					'dependency' => array( 'element' => 'onclick', 'value' => array( 'custom_link' ),
					),
					'value' => array(
						__( 'Same window', 'composer' ) => '_self',
						__( 'New window', 'composer' ) => '_blank',
					),
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
    