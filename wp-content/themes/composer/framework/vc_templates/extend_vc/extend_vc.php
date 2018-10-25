<?php 

vc_add_param("vc_row", array(
			'type' => 'column_offset',
			'heading' => __( 'Responsiveness', 'composer' ),
			'param_name' => 'offset',
			'group' => __( 'Responsive Options', 'composer' ),
			'description' => __( 'Adjust column for different screen sizes. Control width, offset and visibility settings.', 'composer' ),
		));

//Color Style
vc_add_param("vc_row", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => esc_html__("Text Color", 'composer'),
	"param_name" => "color_style",
	"value" => array(esc_html__('Default', 'composer') => "",
					 esc_html__('White', 'composer') => "light"),
	"description" => esc_html__("Choose the font color you want to apply. <br> Alternatively you can choose your own color at the top of this section", 'composer'),
	));

vc_add_param("vc_row", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => esc_html__("Default top and bottom space", 'composer'),
	"param_name" => "remove_padding",
	"value" => array(esc_html__('Keep', 'composer') => "",
					 esc_html__('Remove', 'composer') => "no-padding-vc-row"),
	"description" => esc_html__("By default row have 100px padding top and bottom, choose remove to remove default padding.", 'composer'),
	));

//Color Style
vc_add_param("vc_column", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => esc_html__("Text Color", 'composer'),
	"param_name" => "color_style",
	"value" => array(esc_html__('Default', 'composer') => "",
					 esc_html__('White', 'composer') => "light"),
	"description" => esc_html__("Choose the font color you want to apply. <br> Alternatively you can choose your own color at the top of this section", 'composer'),
	));


vc_add_param( "vc_gallery", 
	array(
		"type" => "dropdown",
		"heading" => esc_html__("Number of Columns", "composer"),
		"param_name" => "grid_columns",
		"value" => array(esc_html__('Default', "composer") => "",
						 esc_html__('2 Columns', "composer") => "grid-col grid-col2",
						 esc_html__('3 Columns', "composer") => "grid-col grid-col3",
						 esc_html__('4 Columns', "composer") => "grid-col grid-col4",
						 esc_html__('5 Columns', "composer") => "grid-col grid-col5"),
		"dependency" => array('element' => "type", 'value' => array('image_grid')),
		"description" => ''
		)
);

// VC Accordion
vc_add_param("vc_accordion", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => esc_html__("Accordion Style", "composer"),
	"param_name" => "style",
	"value" => array(esc_html__('Default', "composer") => "default border",
					 esc_html__('Style 2', "composer") => "default border border-background",
					 esc_html__('Style 3', "composer") => "default",
					 esc_html__('Style 4', "composer") => "default background"),
	"description" => '',
	));

// VC Tabs



vc_add_param("vc_tabs", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => esc_html__("Tabs Style", "composer"),
	"param_name" => "style",
	"value" => array(esc_html__('Default', "composer") => "default",
					 esc_html__('Default Background', "composer") => "default style2",
					 esc_html__('Background Color', "composer") => "default style3",
					 esc_html__('Color Highlight', "composer") => "default style3 style4"),
	"description" => "",
	));

vc_add_param("vc_tabs", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => esc_html__("Tabs Alignment", "composer"),
	"param_name" => "align",
	"value" => array(esc_html__('Left', "composer") => "default",
					 esc_html__('Right', "composer") => "right-align",
					 esc_html__('Center', "composer") => "center-align"),
	"description" => "",
	));

vc_add_param("vc_tabs", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => esc_html__("Tabs Nav View", "composer"),
	"param_name" => "side",
	"value" => array(esc_html__('Top', "composer") => "default",
					 esc_html__('Left', "composer") => "tabs-left",
					 esc_html__('Right', "composer") => "tabs-left tabs-right",
					 esc_html__('Bottom', "composer") => "tabs-bottom"),
	"description" => "",
	));

vc_add_param("vc_tab",
	array(
		"type" => "icon",
		"class" => "",
		"heading" => esc_html__("Insert Icon", "composer"),
		"param_name" => "icon_name",
		"value" => '',
		"description" => esc_html__("Insert an icon for tab.", "composer")
		)
	);

vc_add_param("vc_progress_bar", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => esc_html__("Progress Bar Style", "composer"),
	"param_name" => "style",
	"value" => array(esc_html__('Style1', "composer") => "style1",
					 esc_html__('Style2', "composer") => "style2",
					 esc_html__('Style3', "composer") => "style2 style3",
					 esc_html__('Style4', "composer") => "style4"
		),
	"description" => "",
	));