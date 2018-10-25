<?php 
//Animation
$animation = array('fadeIn','flash','bounce','shake','tada','swing','wobble','pulse','flip','flipInX','flipInY','fadeInUp','fadeInDown','fadeInLeft','fadeInRight','fadeInUpBig','fadeInDownBig','fadeInLeftBig','fadeInRightBig','slideInDown','slideInLeft','slideInRight','zoomIn','zoomInUp','zoomInDown','zoomInLeft','zoomInRight','bounceIn','bounceInUp','bounceInDown','bounceInLeft','bounceInRight','rotateIn','rotateInDownLeft','rotateInDownRight','rotateInUpLeft','rotateInUpRight','lightSpeedIn','hinge','rollIn');

$slider_animation_in = array('None' => 'false','fadeIn'=>'fadeIn','flash'=>'flash','bounce'=>'bounce','shake'=>'shake','tada'=>'tada','swing'=>'swing','wobble'=>'wobble','pulse'=>'pulse','flip'=>'flip','flipInX'=>'flipInX','flipInY'=>'flipInY','fadeInUp'=>'fadeInUp','fadeInDown'=>'fadeInDown','fadeInLeft'=>'fadeInLeft','fadeInRight'=>'fadeInRight','fadeInUpBig'=>'fadeInUpBig','fadeInDownBig'=>'fadeInDownBig','fadeInLeftBig'=>'fadeInLeftBig','fadeInRightBig'=>'fadeInRightBig','slideInDown'=>'slideInDown','slideInLeft'=>'slideInLeft','slideInRight'=>'slideInRight','zoomIn'=>'zoomIn','zoomInUp'=>'zoomInUp','zoomInDown'=>'zoomInDown','zoomInLeft'=>'zoomInLeft','zoomInRight'=>'zoomInRight','bounceIn'=>'bounceIn','bounceInUp'=>'bounceInUp','bounceInDown'=>'bounceInDown','bounceInLeft'=>'bounceInLeft','bounceInRight'=>'rotateIn','rotateIn'=>'rotateIn','rotateInDownLeft'=>'rotateInDownLeft','rotateInDownRight'=>'rotateInDownRight','rotateInUpLeft'=>'rotateInUpLeft','rotateInUpRight'=>'rotateInUpRight','lightSpeedIn'=>'lightSpeedIn','hinge'=>'hinge','rollIn'=>'rollIn');

$slider_animation_out = array('None' => 'false','fadeOut' => 'fadeOut','flipOutX' => 'flipOutX','flipOutY' => 'flipOutY','fadeOutUp' => 'fadeOutUp','fadeOutDown'=>'fadeOutDown','fadeOutLeft'=>'fadeOutLeft','fadeOutRight'=>'fadeOutRight','fadeOutUpBig'=>'fadeOutUpBig','fadeOutDownBig'=>'fadeOutDownBig','fadeOutLeftBig'=>'fadeOutLeftBig','fadeOutRightBig'=>'fadeOutRightBig','slideOutDown'=>'slideOutDown','slideOutLeft'=>'slideOutLeft','slideOutRight'=>'slideOutRight','zoomOut'=>'zoomOut','zoomOutUp'=>'zoomOutUp','zoomOutDown'=>'zoomOutDown','zoomOutLeft'=>'zoomOutLeft','zoomOutRight'=>'zoomOutRight','bounceOut'=>'bounceOut','bounceOutUp'=>'bounceOutUp','bounceOutDown'=>'bounceOutDown','bounceOutLeft'=>'bounceOutLeft','bounceOutRight'=>'bounceOutRight','rotateOut'=>'rotateOut','rotateOutDownLeft'=>'rotateOutDownLeft','rotateOutDownRight'=>'rotateOutDownRight','rotateOutUpLeft'=>'rotateOutUpLeft','rotateOutUpRight'=>'rotateOutUpRight','lightSpeedOut'=>'lightSpeedOut','rollOut'=>'rollOut');

$hover_animation_in = array('fadeIn'=>'fadeIn','flash'=>'flash','bounce'=>'bounce','shake'=>'shake','tada'=>'tada','swing'=>'swing','wobble'=>'wobble','pulse'=>'pulse','flip'=>'flip','flipInX'=>'flipInX','flipInY'=>'flipInY','fadeInUp'=>'fadeInUp','fadeInDown'=>'fadeInDown','fadeInLeft'=>'fadeInLeft','fadeInRight'=>'fadeInRight','fadeInUpBig'=>'fadeInUpBig','fadeInDownBig'=>'fadeInDownBig','fadeInLeftBig'=>'fadeInLeftBig','fadeInRightBig'=>'fadeInRightBig','slideInUp'=>'slideInUp','slideInDown'=>'slideInDown','slideInLeft'=>'slideInLeft','slideInRight'=>'slideInRight','zoomIn'=>'zoomIn','zoomInUp'=>'zoomInUp','zoomInDown'=>'zoomInDown','zoomInLeft'=>'zoomInLeft','zoomInRight'=>'zoomInRight','bounceIn'=>'bounceIn','bounceInUp'=>'bounceInUp','bounceInDown'=>'bounceInDown','bounceInLeft'=>'bounceInLeft','bounceInRight'=>'rotateIn','rotateIn'=>'rotateIn','rotateInDownLeft'=>'rotateInDownLeft','rotateInDownRight'=>'rotateInDownRight','rotateInUpLeft'=>'rotateInUpLeft','rotateInUpRight'=>'rotateInUpRight','lightSpeedIn'=>'lightSpeedIn','hinge'=>'hinge','rollIn'=>'rollIn');

$hover_animation_out = array('fadeOut' => 'fadeOut','flipOutX' => 'flipOutX','flipOutY' => 'flipOutY','fadeOutUp' => 'fadeOutUp','fadeOutDown'=>'fadeOutDown','fadeOutLeft'=>'fadeOutLeft','fadeOutRight'=>'fadeOutRight','fadeOutUpBig'=>'fadeOutUpBig','fadeOutDownBig'=>'fadeOutDownBig','fadeOutLeftBig'=>'fadeOutLeftBig','fadeOutRightBig'=>'fadeOutRightBig','slideOutDown'=>'slideOutDown','slideOutLeft'=>'slideOutLeft','slideOutRight'=>'slideOutRight','zoomOut'=>'zoomOut','zoomOutUp'=>'zoomOutUp','zoomOutDown'=>'zoomOutDown','zoomOutLeft'=>'zoomOutLeft','zoomOutRight'=>'zoomOutRight','bounceOut'=>'bounceOut','bounceOutUp'=>'bounceOutUp','bounceOutDown'=>'bounceOutDown','bounceOutLeft'=>'bounceOutLeft','bounceOutRight'=>'bounceOutRight','rotateOut'=>'rotateOut','rotateOutDownLeft'=>'rotateOutDownLeft','rotateOutDownRight'=>'rotateOutDownRight','rotateOutUpLeft'=>'rotateOutUpLeft','rotateOutUpRight'=>'rotateOutUpRight','lightSpeedOut'=>'lightSpeedOut','rollOut'=>'rollOut');

$theme_default = '#00a9d1';

//Add new param to vc
function composer_icon_field($settings, $value) {
	return '<div class="icon_field menu-item-settings">'
	.'<input type="hidden" class="edit-menu-item-icon wpb_vc_param_value wpb-textinput '.$settings['param_name'].' '.$settings['type'].'_field" name="'.$settings['param_name'].'" value="'.$value.'" />

	<span class="pix-inserted-icon"></span>

	<a href="#" class="button pix-insert-menu-icon"><i class="fa fa-arrow-circle-o-down"></i> '. __('Insert Icon', 'amz-composer-plugins' ) .'</a>
	<a href="#" class="button pix-remove-menu-icon hidden"><i class="fa fa-times"></i> '. __('Remove Icon', 'amz-composer-plugins' ) .'</a>
</div>';
}
vc_add_shortcode_param('icon', 'composer_icon_field', COMPOSER_EXTRAS_URI .'/composer-menu-extend/js/dialog.js');



function composer_image_select($settings, $value) {

	$html = '';

	$html .= '<ul class="pix-image-select float-clear">';

		foreach ( $settings['options'] as $key => $opt ) {

			if ( $key || $opt ) {

				$html .= '<li class="vc_image_sel_wrap">';
					$html .= '<a href="#" class="amz-image-select" data-val="'. $key .'"><img class="img-border" src="' . esc_attr( $settings['img_dir'] ) . esc_attr( $opt ) . '" alt="" /></a>';
				$html .= '</li>';

			}

		}

		$html .= '<input type="text" class="wpb_vc_param_value ' . esc_attr( $settings['param_name'] .' '.$settings['type'] ) .'_field" name="'. esc_attr( $settings['param_name'] ).'" value="'. esc_attr( $value ) .'" >';

	$html .= '</ul>';

	return $html;

}
vc_add_shortcode_param('image_select', 'composer_image_select', AMAZEE_PLUGIN_URL . '/assets/js/image-select.js');

// Pie Chart
vc_remove_element("vc_pie");
//vc_remove_element("vc_posts_slider");
//vc_remove_element("vc_images_carousel");
//vc_remove_element("vc_carousel_js");

// Theme Item 
vc_map( array(
	"name" => __("Demos on Filter", "amazee"), //Title
	"base" => "filter_wrap", //Shortcode name
	"class" => "",
	"icon" => "icon-pixel8es",
	"category" => 'By Composer', //category
    "as_parent" => array('only' => 'demo_port_item'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
    "content_element" => true,
    "show_settings_on_create" => false,
    "js_view" => 'VcColumnView',
	 "params" => array(

	 		array(
	 		"type" => "textarea",
	 		"heading" => esc_html__("Filter Text", "amz-composer-plugins"),
	 		"param_name" => "filter_text",
	 		"value" => ""
	 		),

		)
) );

// Theme Item 
vc_map( array(
	"name" => __("Portfolio Single Image", "amazee"), //Title
	"base" => "demo_port_item", //Shortcode name
	"class" => "",
	"icon" => "icon-pixel8es",
	"category" => 'By Composer', //category
	"content_element" => true,
    "as_child" => array('only' => 'filter_wrap'), // Use only|except attributes to limit parent (separate multiple values with comma)
	"params" => array(

		array(
			"type" => "attach_image",
			"heading" => __("Image", "amazee"),
			"param_name" => "theme_img",
			"value" => "",
			"description" => __("Select a icon image from media library.", "amazee")
			),

		array(
			"type" => "textfield",
			"heading" => __("Title", "amazee"),
			"param_name" => "title",
			"admin_label" => true,
			"value" => "",
			"description" => __("Enter the title.", "amazee")
			),

		array(
			"type" => "textfield",
			"heading" => __("Tagline", "amazee"),
			"param_name" => "desc",
			"value" => "",
			"description" => __("Enter the sub title text.", "amazee")
			),

		array(
			"type" => "textfield",
			"heading" => __("Categories", "amazee"),
			"param_name" => "cate",
			"value" => "",
			"description" => __("Enter the category to sort by filter.", "amazee")
			),

		array(
			"type" => "vc_link",
			"heading" => __("Preview Link URL", "amazee"),
			"param_name" => "preview_link",
			"value" => "",
			"description" => __("Enter the preview link", "amazee"),
			),

		array(
			"type" => "dropdown",
			"heading" => __("Batch Style", "amz-composer-plugins"),
			"param_name" => "style",
			"value" => array( __('None', "amz-composer-plugins") => "",
							  __('Date', "amz-composer-plugins") => "date",
							  __('New', "amz-composer-plugins") => "new"
							),
			"description" => __("Select Batch Style?", "amz-composer-plugins"),
			),

		array(
			"type" => "textfield",
			"heading" => __("Batch Name", "amazee"),
			"param_name" => "batch_name",
			"value" => "",
			"description" => __("Enter the batch name.", "amazee")
			),

		)
) );


//Your "container" content element should extend WPBakeryShortCodesContainer class to inherit all required functionality
if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
	class WPBakeryShortCode_filter_wrap extends WPBakeryShortCodesContainer {
	}
}
if ( class_exists( 'WPBakeryShortCode' ) ) {
	class WPBakeryShortCode_demo_port_item extends WPBakeryShortCode {
	}
}

// Theme Item 
vc_map( array(
	"name" => __("Single Image with Hover", "amz-composer-plugins"), //Title
	"base" => "demo_item", //Shortcode name
	"class" => "",
	"icon" => "icon-pixel8es",
	"category" => 'By Composer', //category
	"params" => array(

		array(
			"type" => "attach_image",
			"heading" => __("Image", "amz-composer-plugins"),
			"param_name" => "theme_img",
			"value" => "",
			"description" => __("Select a icon image from media library.", "amz-composer-plugins")
			),

		array(
			"type" => "textfield",
			"heading" => __("Title", "amz-composer-plugins"),
			"param_name" => "title",
			"admin_label" => true,
			"value" => "",
			"description" => __("Enter the title.", "amz-composer-plugins")
			),

		array(
			"type" => "textfield",
			"heading" => __("Tagline", "amz-composer-plugins"),
			"param_name" => "desc",
			"value" => "",
			"description" => __("Enter the sub title text.", "amz-composer-plugins")
			),

		array(
			"type" => "vc_link",
			"heading" => __("Preview Link URL", "amz-composer-plugins"),
			"param_name" => "preview_link",
			"value" => "",
			"description" => __("Enter the preview link", "amz-composer-plugins"),
			),

		array(
			"type" => "dropdown",
			"heading" => __("Batch Style", "amz-composer-plugins"),
			"param_name" => "style",
			"value" => array( __('None', "amz-composer-plugins") => "",
							  __('Date', "amz-composer-plugins") => "date",
							  __('New', "amz-composer-plugins") => "new"
							),
			"description" => __("Select Batch Style?", "amz-composer-plugins"),
			),

		array(
			"type" => "textfield",
			"heading" => __("Batch Name", "amz-composer-plugins"),
			"param_name" => "batch_name",
			"value" => "",
			"description" => __("Enter the batch name.", "amz-composer-plugins")
			),

		)
) );


//Line shortcode
vc_map( array(
	"name" => __("seperator Line", "amz-composer-plugins"), //Title
	"base" => "line", //Shortcode name
	"class" => "",
	"icon" => "icon-pixel8es",
	"category" => 'By Composer', //category
	"params" => array(
        array(
            "type" => "dropdown",
            "heading" => __("Line Style", "amz-composer-plugins"),
            "param_name" => "line_style",
			"admin_label" => true,
            "value" => array(__('Line Style1', "amz-composer-plugins") => "line-style1", 
                             __('Line Style2', "amz-composer-plugins") => "line-style2",
                             __('Line Style3', "amz-composer-plugins") => "line-style3",
                             __('Line Style4', "amz-composer-plugins") => "line-style4",
                             __('Line Style5', "amz-composer-plugins") => "line-style5"),
            "description" => __("Do you like to animate this element", "amz-composer-plugins"),
           
            ),

		array(
			"type" => "textfield",
			"heading" => __("Width in px", "amz-composer-plugins"),
			"param_name" => "width",
			"value" => "",
			"description" => __("Enter Width in Pixels or in percent (eg: 50px or 50%), Leave empty to apply default 75px", "amz-composer-plugins"),
             "dependency" => array('element' => "line_style", 'value' => array('line-style1'))
			),
            
		array(
			"type" => "textfield",
			"heading" => __("Line Thickness in px", "amz-composer-plugins"),
			"param_name" => "thickness",
			"value" => "1px",
			"description" => __("Enter thickness in Pixels (eg: 4px), Leave empty to apply default 1px", "amz-composer-plugins"),
             "dependency" => array('element' => "line_style", 'value' => array('line-style1'))
			),

		array(
			"type" => "dropdown",
			"heading" => __("Align", "amz-composer-plugins"),
			"param_name" => "align",
			"value" => array(__('Align left', "amz-composer-plugins") => "left alignLeft", __('Align center', "amz-composer-plugins") => "center alignCenter",  __('Align right', "amz-composer-plugins") => "right alignRight"),
			"description" => ''
			),

		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => __("Line color", "amz-composer-plugins"),
			"param_name" => "color", //Shortcode_attr name
			"value" => '', //Default Red color
			"description" => __("Choose line color if you want custom color, leave empty to apply theme default", "amz-composer-plugins"),
            "dependency" => array('element' => "line_style", 'value' => array('line-style1'))
            ),
		array(
			'type' => 'css_editor',
			'heading' => __( 'CSS box', 'amz-composer-plugins' ),
			'param_name' => 'line_css',
			'group' => __( 'Design Options', 'amz-composer-plugins' )
			),
		)
) );

// Blog
vc_map( array(
	"name" => __("Recent Blog ( Grid or carousel )", "amz-composer-plugins"), //Title
	"base" => "blog", //Shortcode name
	"class" => "",
	"icon" => "icon-pixel8es",
	"category" => 'By Composer', //category
	"params" => array(

		array(
			"type" => "dropdown",
			"heading" => __("Style", "amz-composer-plugins"),
			"param_name" => "style",
			"value" => array( __('Normal', "amz-composer-plugins") => "normal",
							  __('Overlay', "amz-composer-plugins") => "overlay",
							  __('Grey Box', "amz-composer-plugins") => "grey_box",
							  __('Static Background', "amz-composer-plugins") => "static_bg",
							  __('Simple', "amz-composer-plugins") => "simple"
							),
			"description" => __("Where you want to display arrow", "amz-composer-plugins"),
			),

		array(
			"type" => "dropdown",
			"heading" => __("Alignment", "amz-composer-plugins"),
			"param_name" => "align",
			"value" => array(__('Align Left', "amz-composer-plugins") => "text-left", 
							 __('Align Center', "amz-composer-plugins") => "text-center", 
							 __('Align Right', "amz-composer-plugins") => "text-right"),
			"description" => __("Select alignment.", "amz-composer-plugins")
			),

		array(
			"type" => "textfield",
			"heading" => __("No. of Recentblog", "amz-composer-plugins"),
			"param_name" => "no_of_items",
			"value" => 6,
			"dependency" => array('element' => "insert_type", 'value' => array('posts','category')),
			"description" => __("Enter the number of Posts you want to display (only numbers), Enter -1 for all posts", "amz-composer-plugins")
			),

		array(
			"type" => "dropdown",
			"heading" => __("Insert Blog Post By", "amz-composer-plugins"),
			"param_name" => "insert_type",
			"admin_label" => true,
			"value" => array(
				__('Blog Posts', "amz-composer-plugins") => "posts", 
				__('Blog Post Id', "amz-composer-plugins") => "id",
				__('Blog Post Category', "amz-composer-plugins") => "category"),
			"description" => ''
			),

		array(
			"type" => "dropdown",
			"heading" => __("Order By", "amz-composer-plugins"),
			"param_name" => "order_by",
			"value" => array( __('Date Modified', "amz-composer-plugins") => "modified",
							  __('Date', "amz-composer-plugins") => "date",  
							  __('Rand', "amz-composer-plugins") => "rand",
							  __('ID', "amz-composer-plugins") => "ID", 
							  __('Title', "amz-composer-plugins") => "title", 
							  __('Author', "amz-composer-plugins") => "author",
							  __('Name', "amz-composer-plugins") => "name",
							  __('Parent', "amz-composer-plugins") => "parent",							  
							  __('Menu Order', "amz-composer-plugins") => "menu_order",
							  __('None', "amz-composer-plugins") => "none"),
			"dependency" => array('element' => "insert_type", 'value' => 'posts'),
			"description" => __("Order posts By choosen order", "amz-composer-plugins")
			),

		array(
			"type" => "dropdown",
			"heading" => __("Order", "amz-composer-plugins"),
			"param_name" => "order",
			"value" => array( __('Descending order', "amz-composer-plugins") => "DESC", 
							  __('Ascending order', "amz-composer-plugins") => "ASC" ),
			"dependency" => array('element' => "insert_type", 'value' => 'posts'),
			"description" => __("In which Order, you want to display posts", "amz-composer-plugins")
			),

		array(
			"type" => "textfield",
			"heading" => __("Post Id", "amz-composer-plugins"),
			"param_name" => "id",
			"value" => "",
			"dependency" => array('element' => "insert_type", 'value' => 'id'),
			"description" => __("Enter the blog post ids seperated by commas (,). Example: 2,54,8", "amz-composer-plugins")
			),

		array(
			"type" => "textfield",
			"heading" => __("Category", "amz-composer-plugins"),
			"param_name" => "category",
			"value" => "",
			"dependency" => array('element' => "insert_type", 'value' => 'category'),
			"description" => __("Enter the blog post category seperated by commas (,). Example: design,illustration,print", "amz-composer-plugins")
			),

		array(
			"type" => "textfield",
			"heading" => __("Exclude Post ID", "amz-composer-plugins"),
			"param_name" => "exclude_id",
			"value" => "",
			"dependency" => array('element' => "insert_type", 'value' => array('posts','category')),
			"description" => __("Enter the exclude blog post ids seperated by commas (,). Example: 2,54,8", "amz-composer-plugins")
			),

		array(
			"type" => "textfield",
			"heading" => __("Exclude Category", "amz-composer-plugins"),
			"param_name" => "exclude_category",
			"value" => "",
			"dependency" => array('element' => "insert_type", 'value' => array('posts','category')),
			"description" => __("Enter the blog post category seperated by commas (,). Example: design,illustration,print", "amz-composer-plugins")
			),

		array(
			"type" => "textfield",
			"heading" => __("Title length", "amz-composer-plugins"),
			"param_name" => "title_length",
			"value" => "30",
			"description" => __("Enter excerpt length. Example: 180 (Leave it empty to apply default)", "amz-composer-plugins")
			),		

		array(
			"type" => "textfield",
			"heading" => __("Content length", "amz-composer-plugins"),
			"param_name" => "excerpt_length",
			"value" => "90",
			"description" => __("Enter excerpt length. Example: 180 (Leave it empty to apply default)", "amz-composer-plugins")
			),

		array(
			"type" => "dropdown",
			"heading" => __("Number of Columns", "amz-composer-plugins"),
			"param_name" => "columns",
			"value" => array(
				__('3 Columns', "amz-composer-plugins") => "col3",
				__('1 Columns', "amz-composer-plugins") => "col1",
				__('2 Columns', "amz-composer-plugins") => "col2",
				__('4 Columns', "amz-composer-plugins") => "col4"
			),
			"description" => ''
			),

		array(
			"type" => "dropdown",
			"heading" => __("Top Meta", "amz-composer-plugins"),
			"param_name" => "top_meta",
			"value" => array(
				__('Date', "amz-composer-plugins") => "date",
				__('Category', "amz-composer-plugins") => "category",
				__('Author', "amz-composer-plugins") => "author",
				__('None', "amz-composer-plugins") => "none"
			),
			"description" => ''
			),

		array(
			"type" => "dropdown",
			"heading" => __("Bottom Meta", "amz-composer-plugins"),
			"param_name" => "bottom_meta",
			"value" => array(
				__('Like and Comment', "amz-composer-plugins") => "like_comment",
				__('Link', "amz-composer-plugins") => "link",
				__('None', "amz-composer-plugins") => "none"
			),
			"description" => ''
			),

		array(
			"type" => "dropdown",
			"heading" => __("Show Like", "amz-composer-plugins"),
			"param_name" => "show_like",
			"value" => array(__('Yes', "amz-composer-plugins") => "yes",  
							 __('No', "amz-composer-plugins") => "no"),
			"description" => __('Do you like to display "Like" in post?', "amz-composer-plugins"),
			"dependency" => array('element' => "bottom_meta", 'value' => array('like_comment'))
			),

		array(
			"type" => "dropdown",
			"heading" => __("Show Comments", "amz-composer-plugins"),
			"param_name" => "show_comment",
			"value" => array(__('Yes', "amz-composer-plugins") => "yes",  
							 __('No', "amz-composer-plugins") => "no"),
			"description" => __('Do you like to display comments number in post', "amz-composer-plugins"),
			"dependency" => array('element' => "bottom_meta", 'value' => array('like_comment'))
			),

		array(
			"type" => "textfield",
			"heading" => __("Link Text", "amz-composer-plugins"),
			"param_name" => "link_text",
			"value" => esc_html__( 'Read More', 'amz-composer-plugins' ),
			"description" => __("Enter the link text", "amz-composer-plugins"),
			"dependency" => array('element' => "bottom_meta", 'value' => array('link'))
			),

		array(
			"type" => "dropdown",
			"heading" => __("Show Featured Image", "amz-composer-plugins"),
			"param_name" => "show_featured_image",
			"value" => array(__('Yes', "amz-composer-plugins") => "yes",  
							 __('No', "amz-composer-plugins") => "no"),
			"description" => __('Do you like to display featured image in post', "amz-composer-plugins")
			),

		array(
			"type" => "dropdown",
			"heading" => __("Show Description", "amz-composer-plugins"),
			"param_name" => "show_description",
			"value" => array(__('Yes', "amz-composer-plugins") => "yes",  
							 __('No', "amz-composer-plugins") => "no"),
			"description" => __('Do you like to display description in post', "amz-composer-plugins")
			),

		array(
			"type" => "dropdown",
			"heading" => __("Slider", "amz-composer-plugins"),
			"param_name" => "slider",
			"value" => array( __('No', "amz-composer-plugins") => "no",
							  __('Yes', "amz-composer-plugins") => "yes"),
			"description" => __("Do you like use this as carousel?", "amz-composer-plugins"),
			"group"	=> __('Carousel', 'amz-composer-plugins')
			),

		array(
			'type' => 'textfield',
			'heading' => __( 'Slides per view', 'amz-composer-plugins' ),
			'param_name' => 'slides_per_view',
			'value' => 1,
			'description' => __( 'Enter number of slides to display at the same time.', 'amz-composer-plugins' ),
			"dependency" => array('element' => "slider", 'value' => array('yes')),
			"group"	=> __('Carousel', 'amz-composer-plugins')
		),

		array(
			'type' => 'textfield',
			'heading' => __( 'Margin', 'amz-composer-plugins' ),
			'param_name' => 'margin',
			'value' => '30',
			'description' => __( 'Enter margin-right(px) on item ( Example: 30 ).', 'amz-composer-plugins' ),
			"dependency" => array('element' => "slider", 'value' => array('yes')),
			"group"	=> __('Carousel', 'amz-composer-plugins')
		),

		array(
			"type" => "dropdown",
			"heading" => __("Loop", "amz-composer-plugins"),
			"param_name" => "loop",
			"value" => array( __('No', "amz-composer-plugins") => "false",
							  __('Yes', "amz-composer-plugins") => "true"),
			"description" => __( 'Infinity loop. Duplicate last and first items to get loop illusion.', 'amz-composer-plugins' ),
			"dependency" => array('element' => "slider", 'value' => array('yes')),
			"group"	=> __('Carousel', 'amz-composer-plugins')
		),

		array(
			"type" => "dropdown",
			"heading" => __("Center", "amz-composer-plugins"),
			"param_name" => "center",
			"value" => array( __('No', "amz-composer-plugins") => "false",
							  __('Yes', "amz-composer-plugins") => "true"),
			"description" => __( 'Center item. Works well with even an odd number of items.', 'amz-composer-plugins' ),
			"dependency" => array('element' => "slider", 'value' => array('yes')),
			"group"	=> __('Carousel', 'amz-composer-plugins')
		),

		array(
			'type' => 'textfield',
			'heading' => __( 'Padding Left and Right', 'amz-composer-plugins' ),
			'param_name' => 'stage_padding',
			'value' => '0',
			'description' => __( 'Padding left and right on stage (can see neighbours).', 'amz-composer-plugins' ),
			"dependency" => array('element' => "slider", 'value' => array('yes')),
			"group"	=> __('Carousel', 'amz-composer-plugins')
		),

		array(
			'type' => 'textfield',
			'heading' => __( 'Start Position', 'amz-composer-plugins' ),
			'param_name' => 'start_position',
			'value' => '0',
			'description' => __( 'Start position.', 'amz-composer-plugins' ),
			"dependency" => array('element' => "slider", 'value' => array('yes')),
			"group"	=> __('Carousel', 'amz-composer-plugins')
		),

		array(
			"type" => "dropdown",
			"heading" => __("Autoplay", "amz-composer-plugins"),
			"param_name" => "autoplay",
			"value" => array( __('No', "amz-composer-plugins") => "false", 
							  __('Yes', "amz-composer-plugins") => "true" ),
			"description" => __("Enable autoplay?", "amz-composer-plugins"),
			"dependency" => array('element' => "slider", 'value' => array('yes')),
			"group"	=> __('Carousel', 'amz-composer-plugins')
		),

		array(
			"type" => "textfield",
			"heading" => __("Autoplay Interval Timeout", "amz-composer-plugins"),
			"param_name" => "slide_speed",
			"value" => "5000",
			"description" => __("Enter Autoplay interval timeout Value in milesecond (Ex: 5000).", "amz-composer-plugins"),
			"dependency" => array('element' => "slider", 'value' => array('yes')),
			"group"	=> __('Carousel', 'amz-composer-plugins')
		),

		array(
			"type" => "dropdown",
			"heading" => __("Autoplay Hover Pause", "amz-composer-plugins"),
			"param_name" => "stop_on_hover",
			"value" => array( __('Yes', "amz-composer-plugins") => "true",
							  __('No', "amz-composer-plugins") => "false"),
			"description" => __("Pause on mouse hover.", "amz-composer-plugins"),
			"dependency" => array('element' => "slider", 'value' => array('yes')),
			"group"	=> __('Carousel', 'amz-composer-plugins')
		),

		array(
			"type" => "dropdown",
			"heading" => __("Arrow", "amz-composer-plugins"),
			"param_name" => "slide_arrow",
			"value" => array( __('Yes', "amz-composer-plugins") => "true",
							  __('No', "amz-composer-plugins") => "false"),
			"description" => __("Do you like to show arrow navigation to move carousel.", "amz-composer-plugins"),
			"dependency" => array('element' => "slider", 'value' => array('yes')),
			"group"	=> __('Carousel', 'amz-composer-plugins')
		),

		array(
			"type" => "dropdown",
			"heading" => __("Bullets", "amz-composer-plugins"),
			"param_name" => "pagination",
			"value" => array( __('Yes', "amz-composer-plugins") => "true",
				__('No', "amz-composer-plugins") => "false"),
			"description" => __("Do you like to show dot navigation to move carousel", "amz-composer-plugins"),
			"dependency" => array('element' => "slider", 'value' => array('yes')),
			"group"	=> __('Carousel', 'amz-composer-plugins')
		),

		array(
		   "type" => "dropdown",
		   "heading" => __("Animation In", "amz-composer-plugins"),
		   "param_name" => "animate_in",
		   "value" => $slider_animation_in,
		   "description" => __("false = no animation. Animate functions work only with one item and only in browsers that support perspective property.", "amz-composer-plugins"),
			"dependency" => array('element' => "slider", 'value' => array('yes')),
			"group"	=> __('Carousel', 'amz-composer-plugins')
		   ),

		array(
		   "type" => "dropdown",
		   "heading" => __("Animation Out", "amz-composer-plugins"),
		   "param_name" => "animate_out",
		   "value" => $slider_animation_out,
		   "description" => __("Animate functions work only with one item and only in browsers that support perspective property.", "amz-composer-plugins"),
			"dependency" => array('element' => "slider", 'value' => array('yes')),
			"group"	=> __('Carousel', 'amz-composer-plugins')
		   ),

		array(
			"type" => "dropdown",
			"heading" => __("Mouse Drag?", "amz-composer-plugins"),
			"param_name" => "mouse_drag",
			"value" => array( __('Yes', "amz-composer-plugins") => "true",
							  __('No', "amz-composer-plugins") => "false"),
			"description" => __("Do you like to move carousel by Mouse Drag?", "amz-composer-plugins"),
			"dependency" => array('element' => "slider", 'value' => array('yes')),
			"group"	=> __('Carousel', 'amz-composer-plugins')
		),

		array(
			"type" => "dropdown",
			"heading" => __("Touch Drag", "amz-composer-plugins"),
			"param_name" => "touch_drag",
			"value" => array( __('Yes', "amz-composer-plugins") => "true",
							  __('No', "amz-composer-plugins") => "false"),
			"description" => __("Do you like to move carousel Touch Drag?", "amz-composer-plugins"),
			"dependency" => array('element' => "slider", 'value' => array('yes')),
			"group"	=> __('Carousel', 'amz-composer-plugins')
		), 
		) 
) ); 

// Video Popup
vc_map( array(
	"name" => __("Video Popup", "amz-composer-plugins"), //Title
	"base" => "video_popup", //Shortcode name
	"class" => "",
	"icon" => "icon-pixel8es",
	"category" => 'By Composer', //category
	"params" => array(

		array(
			"type" => "textfield",
			"heading" => __("Enter the Url", "amz-composer-plugins"),
			"param_name" => "url",
			"value" => "",
			"description" => __("Please Enter the You-Tube or Vimeo Url.", "amz-composer-plugins")
			),

		array(
			"type" => "textfield",
			"heading" => __("Trigger Text", "amz-composer-plugins"),
			"param_name" => "text",
			"value" => "Title",
			"description" => __("Enter the trigger text.", "amz-composer-plugins")
			),

		array(
			"type" => "icon",
			"heading" => __("Trigger Icon", "amz-composer-plugins"),
			"param_name" => "icon_name",
			"value" => '',
			"description" => __("Select Trigger icon.", "amz-composer-plugins")
			),

		array(
			"type" => "attach_image",
			"heading" => __("Video Popup Image", "awed"),
			"param_name" => "video_popup_bg",
			"value" => "",
			"description" => __("Select a image if you want to display image on Video Background.", "awed")
			),

		array(
			'type' => 'textfield',
			'heading' => __( 'Video Popup Image Width', 'amz-composer-plugins' ),
			'param_name' => 'width',
			'value' => '',
			'description' => __( 'Enter the width ( Example: 300 ).', 'amz-composer-plugins' ),
			"edit_field_class" => 'vc_col-xs-6'
		),

		array(
			'type' => 'textfield',
			'heading' => __( 'Video Popup Image Height', 'amz-composer-plugins' ),
			'param_name' => 'height',
			'value' => '',
			'description' => __( 'Enter the height ( Example: 70px ).', 'amz-composer-plugins' ),
			"edit_field_class" => 'vc_col-xs-6'
		),

		array(
			"type" => "textfield",
			"heading" => __("Text Font Size", "amz-composer-plugins"),
			"param_name" => "text_size",
			"value" => "",
			"description" => __("Enter the text font size in px(Ex: 50px)", "amz-composer-plugins"),
			"group"	=> __('Custom Style', 'amz-composer-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => __("Text Letter Spacing in px", "amz-composer-plugins"),
			"param_name" => "text_letter_spacing",
			"value" => "",
			"description" => __("Enter text letter spacing in pixels.( eg: 50px )", "amz-composer-plugins"),
			"group"	=> __('Custom Style', 'amz-composer-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => __("Text Padding", "amz-composer-plugins"),
			"param_name" => "text_padding",
			"value" => "",
			"description" => __("Enter the padding (in css format [top right bottom left]) in px(Ex: 50px 50px 50px 50px)", "amz-composer-plugins"),
			"group"	=> __('Custom Style', 'amz-composer-plugins')
			),

		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => __("Text Color", "amz-composer-plugins"),
			"param_name" => "text_color", 
			"value" => '', 
			"description" => __("Choose text color", "amz-composer-plugins"),
			"group"	=> __('Custom Style', 'amz-composer-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => __("Icon Font Size", "amz-composer-plugins"),
			"param_name" => "icon_size",
			"value" => "",
			"description" => __("Enter the text font size in px(Ex: 50px)", "amz-composer-plugins"),
			"group"	=> __('Custom Style', 'amz-composer-plugins')
			),

		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => __("Icon Background Color", "amz-composer-plugins"),
			"param_name" => "icon_bg_color", 
			"value" => '', 
			"description" => __("Choose custom background color", "amz-composer-plugins"),
			"group"	=> __('Custom Style', 'amz-composer-plugins')
			),

		array(
			'type' => 'textfield',
			'heading' => __( 'Icon Border width', 'amz-composer-plugins' ),
			'param_name' => 'icon_border_width',
			'value' => '',
			'description' => __( 'Enter the border width in (px)  Example: 1px.', 'amz-composer-plugins' ),
			"group"	=> __('Custom Style', 'amz-composer-plugins'),
			"edit_field_class" => 'vc_col-xs-4'
			),

		array(
			"type" => "dropdown",
			"heading" => __("Icon Border Style", "amz-composer-plugins"),
			"param_name" => "icon_border_style",
			"value" => array(__('None', "amz-composer-plugins") => "none", 
							 __('Solid', "amz-composer-plugins") => "solid", 
							 __('Dotted', "amz-composer-plugins") => "dotted", 
							 __('Dashed', "amz-composer-plugins") => "dashed", 
							 __('Double', "amz-composer-plugins") => "double", 
							 __('Groove', "amz-composer-plugins") => "groove", 
							 __('Ridge', "amz-composer-plugins") => "ridge", 
							 __('Inset', "amz-composer-plugins") => "inset", 
							 __('Outset', "amz-composer-plugins") => "outset"),
			"description" => __("Select icon border style?", "amz-composer-plugins"),
			"group"	=> __('Custom Style', 'amz-composer-plugins'),
			"edit_field_class" => 'vc_col-xs-4'
			),

		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => __("Icon Border Color", "amz-composer-plugins"),
			"param_name" => "icon_border_color", 
			"value" => '', 
			"description" => __("Choose icon border color", "amz-composer-plugins"),
			"group"	=> __('Custom Style', 'amz-composer-plugins'),
			"edit_field_class" => 'vc_col-xs-4'
			),

		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => __("Icon Color", "amz-composer-plugins"),
			"param_name" => "icon_color", 
			"value" => '', 
			"description" => __("Choose icon color", "amz-composer-plugins"),
			"group"	=> __('Custom Style', 'amz-composer-plugins')
			),

		array(
			'type' => 'textfield',
			'heading' => __( 'Icon Width', 'amz-composer-plugins' ),
			'param_name' => 'icon_width',
			'value' => '',
			'description' => __( 'Enter the width in (px)  Example: 70px.', 'amz-composer-plugins' ),
			"group"	=> __('Custom Style', 'amz-composer-plugins'),
			"edit_field_class" => 'vc_col-xs-4'
		),

		array(
			'type' => 'textfield',
			'heading' => __( 'Icon Height', 'amz-composer-plugins' ),
			'param_name' => 'icon_height',
			'value' => '',
			'description' => __( 'Enter the height in (px)  Example: 70px.', 'amz-composer-plugins' ),
			"group"	=> __('Custom Style', 'amz-composer-plugins'),
			"edit_field_class" => 'vc_col-xs-4'
		),

		array(
			'type' => 'textfield',
			'heading' => __( 'Icon Line Height', 'amz-composer-plugins' ),
			'param_name' => 'icon_line_height',
			'value' => '',
			'description' => __( 'Enter the line-height in (px)  Example: 70px.', 'amz-composer-plugins' ),
			"group"	=> __('Custom Style', 'amz-composer-plugins'),
			"edit_field_class" => 'vc_col-xs-4'
			),

		array(
			'type' => 'textfield',
			'heading' => __( 'Icon Border Radius', 'amz-composer-plugins' ),
			'param_name' => 'icon_border_radius',
			'value' => '',
			'description' => __( 'Enter the border radius in (px)  Example: 70px or 50%.', 'amz-composer-plugins' ),
			"group"	=> __('Custom Style', 'amz-composer-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Alignment", "amz-composer-plugins"),
			"param_name" => "align",
			"value" => array(__('Align Center', "amz-composer-plugins") => "center", 
							 __('Align Left', "amz-composer-plugins") => "left", 
							 __('Align Right', "amz-composer-plugins") => "right"),
			"description" => __("Select alignment.", "amz-composer-plugins")
			),
		)
) );

// Background Text
vc_map( array(
	"name" => __("Background Text", "amz-composer-plugins"), //Title
	"base" => "background_text", //Shortcode name
	"class" => "",
	"icon" => "icon-pixel8es",
	"category" => 'By Composer', //category
	"params" => array(

		array(
			"type" => "textarea",
			"heading" => esc_html__("Title", "amz-composer-plugins"),
			"param_name" => "title",
			"admin_label" => true,
			"value" => esc_html__( "Title Goes Here", "amz-composer-plugins" )
		),

		array(
			"type" => "dropdown",
			"heading" => __("Title Tag", "amz-composer-plugins"),
			"param_name" => "title_tag",
			"value" => array('h2','h1','h3','h4','h5','h6','p'),
			"description" => esc_html__("Select title tag.", "amz-composer-plugins")
		),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Background Option", "amz-composer-plugins"),
			"param_name" => "background",
			"value" => array(
				esc_html__('Text', "amz-composer-plugins") =>'text',
				esc_html__('Icon', "amz-composer-plugins") =>'icon'
			)
		),

		array(
			"type" => "textfield",
			"heading" => esc_html__("Title Size", "amz-composer-plugins"),
			"param_name" => "title_size",
			"value" => '',
			"description" => esc_html__("Type the font size in px. Eg: 24px", "amz-composer-plugins")
		),

		array(
			"type" => "colorpicker",
			"heading" => __("Title Color", "amz-composer-plugins"),
			"param_name" => "title_color", 
			"value" => ''
		),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Uppercase", "amz-composer-plugins"),
			"param_name" => "title_uppercase",
			"value" => array(
				esc_html__('Yes', "amz-composer-plugins") =>'yes',
				esc_html__('No', "amz-composer-plugins") =>'no'
			)
		),

		array(
			"type" => "textfield",
			"heading" => esc_html__("Letter Spacing", "amz-composer-plugins"),
			"param_name" => "title_letter_space",
			"value" => '',
			"description" => esc_html__("Type the letter spacing in px. Eg: 24px", "amz-composer-plugins")
		),

		array(
			"type" => "textfield",
			"heading" => esc_html__("Title Margin", "amz-composer-plugins"),
			"param_name" => "title_margin",
			"value" => '',
			"description" => esc_html__("Value should be in css format [top right bottom left] in px (Ex: -10px 20px 30px 40px).", "amz-composer-plugins")
		),

		array(
			"type" => "textfield",
			"heading" => esc_html__("Title Padding", "amz-composer-plugins"),
			"param_name" => "title_padding",
			"value" => '',
			"description" => esc_html__("Value should be in css format [top right bottom left] in px (Ex: -10px 20px 30px 40px).", "amz-composer-plugins")
		),

		array(
			"type" => "textfield",
			"heading" => esc_html__("Background Text", "amz-composer-plugins"),
			"param_name" => "background_text",
			"value" => esc_html__( "Title Goes Here", "amz-composer-plugins" )
		),

		array(
			"type" => "dropdown",
			"heading" => __("Background Text Tag", "amz-composer-plugins"),
			"param_name" => "background_text_tag",
			"value" => array('h2','h1','h3','h4','h5','h6','p'),
			"description" => esc_html__("Select title tag.", "amz-composer-plugins")
		),

		array(
			"type" => "icon",
			"heading" => __("Background Icon", "amz-composer-plugins"),
			"param_name" => "background_icon",
			"value" => '',
			"description" => 'Choose the background icon',
		),

		array(
			"type" => "textfield",
			"heading" => esc_html__("Background Text/Icon Letter Spacing", "amz-composer-plugins"),
			"param_name" => "background_text_letter_space",
			"value" => '',
			"description" => esc_html__("Type the letter spacing in px. Eg: 24px", "amz-composer-plugins")
		),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Background Text/Icon Vertical Align", "amz-composer-plugins"),
			"param_name" => "background_v_align",
			"value" => array(
				esc_html__('Middle', "amz-composer-plugins") =>'middle',
				esc_html__('Top', "amz-composer-plugins") =>'top',
				esc_html__('Bottom', "amz-composer-plugins") =>'bottom'
			)
		),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Background Text/Icon Horizontal Align", "amz-composer-plugins"),
			"param_name" => "background_h_align",
			"value" => array(
				esc_html__('Center', "amz-composer-plugins") =>'center',
				esc_html__('Left', "amz-composer-plugins") =>'left',
				esc_html__('Right', "amz-composer-plugins") =>'right'
			)
		),

		array(
			"type" => "textfield",
			"heading" => esc_html__("Background Text/Icon Margin", "amz-composer-plugins"),
			"param_name" => "background_margin",
			"value" => '',
			"description" => esc_html__("Value should be in css format [top right bottom left] in px (Ex: -10px 20px 30px 40px).", "amz-composer-plugins")
		),

		array(
			"type" => "textfield",
			"heading" => esc_html__("Background Text/Icon Padding", "amz-composer-plugins"),
			"param_name" => "background_padding",
			"value" => '',
			"description" => esc_html__("Value should be in css format [top right bottom left] in px (Ex: -10px 20px 30px 40px).", "amz-composer-plugins")
		),

		array(
			"type" => "textfield",
			"heading" => esc_html__("Background Text/Icon Size", "amz-composer-plugins"),
			"param_name" => "background_size",
			"value" => '',
			"description" => esc_html__("Type the font size in px. Eg: 24px", "amz-composer-plugins")
		),

		array(
			"type" => "colorpicker",
			"heading" => __("Background Text/Icon Color", "amz-composer-plugins"),
			"param_name" => "background_color", 
			"value" => ''
		),

		array(
			'type' => 'textfield',
			'heading' => __( 'Background Text/Icon Opacity', 'amz-composer-plugins' ),
			'param_name' => 'background_opacity',
			'value' => '',
			'description' => __( 'Enter the opacity value should be within 0 - 1 (Example: 0.5).', 'amz-composer-plugins' )
		),

		array(
			"type" => "textfield",
			"heading" => __("Extra class", "amz-composer-plugins"),
			"param_name" => "el_class",
			"value" => "",
			"description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "amz-composer-plugins")
		),

		
	)
) );

// Icon Box
vc_map( array(
	"name" => __("Icon Box", "amz-composer-plugins"), //Title
	"base" => "icon_box", //Shortcode name
	"class" => "",
	"icon" => "icon-pixel8es",
	"category" => 'By Composer', //category
	"params" => array(

		array(
			"type" => "dropdown",
			"heading" => __("Enable Link on Box?", "amz-composer-plugins"),
			"param_name" => "link_enable_on_box",
			"value" => array(__('No', "amz-composer-plugins") => "no", 
							 __('Yes', "amz-composer-plugins") => "yes"),
			"description" => __("Do you want to Enable Link on Full Box?", "amz-composer-plugins")
			),

		array(
			"type" => "vc_link",
			"heading" => __("Icon Box Full URL", "amz-composer-plugins"),
			"param_name" => "box_url",
			"value" => "",
			"description" => __("Enter the Icon Box Full URL", "amz-composer-plugins"),
			"dependency" => array('element' => "link_enable_on_box", 'value' => array('yes'))
			),

		array(
			"type" => "dropdown",
			"heading" => __("Insert Font icon or Image icon", "amz-composer-plugins"),
			"param_name" => "icon_type",
			"value" => array(__('Font Icon', "amz-composer-plugins") =>'icon',
							 __('Image Icon', "amz-composer-plugins") =>'image'),
			"description" => '',
			"dependency" => array('element' => "icon_image_con", 'value' => array('no')),
			"group"	=> __('Icon', 'amz-composer-plugins')
			),

		array(
			"type" => "icon",
			"heading" => __("Insert Icon", "amz-composer-plugins"),
			"param_name" => "icon_name",
			"value" => '',
			"description" => '',
			"dependency" => array('element' => "icon_type", 'value' => array('icon')),
			"group"	=> __('Icon', 'amz-composer-plugins')
			),

		array(
			"type" => "attach_image",
			"heading" => __("Image Icon", "amz-composer-plugins"),
			"param_name" => "icon_img",
			"value" => "",
			"description" => __("Select a icon image from media library.", "amz-composer-plugins"),
			"dependency" => array('element' => "icon_type", 'value' => array('image')),
			"group"	=> __('Icon', 'amz-composer-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Use Image instead of icon", "amz-composer-plugins"),
			"param_name" => "icon_image_con",
			"value" => array(__('No', "amz-composer-plugins") =>'no',
					 __('Yes', "amz-composer-plugins") =>'yes'),
			"description" => __('If you choose yes you can insert large image instead of icon (act as image box)', "amz-composer-plugins"),
			"group"	=> __('Icon', 'amz-composer-plugins')
			),

		array(
			"type" => "attach_image",
			"heading" => __("Image Icon", "amz-composer-plugins"),
			"param_name" => "icon_image",
			"value" => "",
			"description" => __("Select a icon image from media library.", "amz-composer-plugins"),
			"dependency" => array('element' => "icon_image_con", 'value' => array('yes')),
			"group"	=> __('Icon', 'amz-composer-plugins')
			),

		array( 
			"type" => "dropdown",
			"heading" => __("Insert Font icon or Image icon", "amz-composer-plugins"),
			"param_name" => "icon_image_style",
			"value" => array(__('Square', "amz-composer-plugins") =>'rectangle',
							 __('Circle', "amz-composer-plugins") =>'rounded'),
			"description" => '',
			"dependency" => array('element' => "icon_image_con", 'value' => array('yes')),
			"group"	=> __('Icon', 'amz-composer-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Icon Style", "amz-composer-plugins"),
			"param_name" => "icon_style",
			"value" => array(__('Default', "amz-composer-plugins") => "bg-none",
							 __('Circle', "amz-composer-plugins") => "circle",
							 __('Double Circle', "amz-composer-plugins") => "double-circle",
							 __('Small Circle', "amz-composer-plugins") => "small-circle"),							
			"description" => __("Select icon style.", "amz-composer-plugins"),
			"group"	=> __('Icon', 'amz-composer-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Hover Icon", "amz-composer-plugins"),
			"param_name" => "icon_hover",
			"value" => array(__('Yes', "amz-composer-plugins") => "yes", 
							 __('No', "amz-composer-plugins") => "no"),
			"description" => __("Do you want to Icon Hover Background?", "amz-composer-plugins"),
			"group"	=> __('Icon', 'amz-composer-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Icon Color", "amz-composer-plugins"),
			"param_name" => "icon_color",
			"value" => array(__('Theme Default Color', "amz-composer-plugins") => "color", 
							 __('Black', "amz-composer-plugins") => "default"),
			"description" => __("Choose icon color.", "amz-composer-plugins"),
			"group"	=> __('Icon', 'amz-composer-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => __("Title", "amz-composer-plugins"),
			"param_name" => "title",
			"admin_label" => true,
			"value" => "Section Title",
			"description" => __("Enter the title.", "amz-composer-plugins")
			),

		array(
			"type" => "dropdown",
			"heading" => __("Title Tag", "amz-composer-plugins"),
			"param_name" => "title_tag",
			"value" => array('h2','h1','h3','h4','h5','h6'),
			"description" => __("Select title tag.", "amz-composer-plugins")
			),

		array(
			"type" => "dropdown",
			"heading" => __("Display Title in UPPERCASE", "amz-composer-plugins"),
			"param_name" => "title_uppercase",
			"value" => array(__('Yes', "amz-composer-plugins") => "yes", 
							 __('No', "amz-composer-plugins") => "no"),
			"description" => __("Do you want display in all caps?", "amz-composer-plugins")
			),

		array(
			"type" => "textfield",
			"heading" => __("Custom Title Font Size?", "amz-composer-plugins"),
			"param_name" => "custom_size",
			"value" => "",
			"description" => __("Enter the font size in px(Ex: 50px) or Leave it empty to apply theme default", "amz-composer-plugins")
			),

		array(
			"type" => "textarea_html",
			"class" => "",
			"heading" => __("Icon Box Content", "amz-composer-plugins"),
			"param_name" => "content", 
			"value" => '', 
			"description" => __("Enter the Icon Box Content", "amz-composer-plugins")
			),
		
		array(
			"type" => "dropdown",
			"heading" => __("Line", "amz-composer-plugins"),
			"param_name" => "line",
			"value" => array(__('No', "amz-composer-plugins") => "no",
							 __('Yes', "amz-composer-plugins") => "yes"), 
			"description" => __("Display line below title?", "amz-composer-plugins")
			),
                
        array(
			"type" => "dropdown",
			"heading" => __("Line Style", "amz-composer-plugins"),
			"param_name" => "line_style",
			"value" => array(__('Line Style1', "amz-composer-plugins") => "line-style1", 
                             __('Line Style2', "amz-composer-plugins") => "line-style2",
                             __('Line Style3', "amz-composer-plugins") => "line-style3",
                             __('Line Style4', "amz-composer-plugins") => "line-style4",
                             __('Line Style5', "amz-composer-plugins") => "line-style5"),
			"description" => __("Do you like to animate this element", "amz-composer-plugins"),
            "dependency" => array('element' => "line", 'value' => array('yes'))
			),

		array(
			"type" => "dropdown",
			"heading" => __("Display Button?", "amz-composer-plugins"),
			"param_name" => "display_button",
			"value" => array(__('Yes', "amz-composer-plugins") => "yes", 
							 __('No', "amz-composer-plugins") => "no"),
			"description" => __("Do you want to display button in icon box?", "amz-composer-plugins"),
			"group"	=> __('Button', 'amz-composer-plugins')
			),

		array(
			"type" => "vc_link",
			"heading" => __("Button URL", "amz-composer-plugins"),
			"param_name" => "button_link",
			"value" => "",
			"description" => __("Enter the button link", "amz-composer-plugins"),
			"dependency" => array('element' => "display_button", 'value' => array('yes')),
			"group"	=> __('Button', 'amz-composer-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Button Style", "amz-composer-plugins"),
			"param_name" => "button_style",
			"value" => array(__('Outline', "amz-composer-plugins") => "outline", 
							 __('Solid', "amz-composer-plugins") => "solid", 
							 __('Default', "amz-composer-plugins") => "simple"),
			"description" => __("Select button style", "amz-composer-plugins"),
			"dependency" => array('element' => "display_button", 'value' => array('yes')),
			"group"	=> __('Button', 'amz-composer-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Button Hover Style", "amz-composer-plugins"),
			"param_name" => "button_hover_style",
			"value" => array(__('Outline', "amz-composer-plugins") => "outline", 
							 __('Solid', "amz-composer-plugins") => "solid"),
			"description" => __("Select button hover style", "amz-composer-plugins"),
			"dependency" => array('element' => "display_button", 'value' => array('yes')),
			"group"	=> __('Button', 'amz-composer-plugins')
			),

		array( 
			"type" => "dropdown",
			"heading" => __("Button Type", "amz-composer-plugins"),
			"param_name" => "button_type",
			"value" => array(__('Oval', "amz-composer-plugins") =>'oval',
							 __('Rectangle', "amz-composer-plugins") =>'rectangle'),
			"description" => '',
			"dependency" => array('element' => "display_button", 'value' => array('yes')),
			"group"	=> __('Button', 'amz-composer-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Button Color", "amz-composer-plugins"),
			"param_name" => "button_color",
			"value" => array(__('Theme default color', "amz-composer-plugins") => "color", 
							 __('black', "amz-composer-plugins") => "no-color",
							 __('white', "amz-composer-plugins") => "white"), 
			"description" => __("Please choose button color", "amz-composer-plugins"),
			"dependency" => array('element' => "display_button", 'value' => array('yes')),
			"group"	=> __('Button', 'amz-composer-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Button Hover Color", "amz-composer-plugins"),
			"param_name" => "button_hover_color",
			"value" => array(__('Theme default color', "amz-composer-plugins") => "color", 
							 __('black', "amz-composer-plugins") => "no-color",
							 __('white', "amz-composer-plugins") => "white"), 
			"description" => __("Please choose button hover color", "amz-composer-plugins"),
			"dependency" => array('element' => "display_button", 'value' => array('yes')),
			"group"	=> __('Button', 'amz-composer-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Button Size", "amz-composer-plugins"),
			"param_name" => "button_size",
			"value" => array(__('Small', "amz-composer-plugins") => "sm",
							 __('Medium', "amz-composer-plugins") => "md", 							  
							 __('Large', "amz-composer-plugins") => "lg"),
			"description" => __("Select button size", "amz-composer-plugins"),
			"dependency" => array('element' => "display_button", 'value' => array('yes')),
			"group"	=> __('Button', 'amz-composer-plugins')
			),

		array(
			"type" => "icon",
			"heading" => __("Button Icon", "amz-composer-plugins"),
			"param_name" => "button_icon",
			"value" => '',
			"description" => __("Select button icon.", "amz-composer-plugins"),
			"dependency" => array('element' => "display_button", 'value' => array('yes')),
			"group"	=> __('Button', 'amz-composer-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Button Icon Align", "amz-composer-plugins"),
			"param_name" => "button_icon_align",
			"value" => array(__('Left', "amz-composer-plugins") => "front", 
							 __('Right', "amz-composer-plugins") => "back"), 
			"description" => __("Where you want to display Icon?", "amz-composer-plugins"),
			"group"	=> __('Button', 'amz-composer-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Alignment", "amz-composer-plugins"),
			"param_name" => "align",
			"value" => array(__('Align Center', "amz-composer-plugins") => "center", 
							 __('Align Left', "amz-composer-plugins") => "left", 
							 __('Align Right', "amz-composer-plugins") => "left right"),
			"description" => __("Select icon box alignment.", "amz-composer-plugins")
			),

		array(
			"type" => "dropdown",
			"heading" => __("Description below Icon?", "amz-composer-plugins"),
			"param_name" => "icon_align",
			"value" => array(__('No', "amz-composer-plugins") => "no", 
							 __('Yes', "amz-composer-plugins") => "yes"),
			"description" => __("Do you want to display description below the icon?", "amz-composer-plugins")
			),

		array(
			"type" => "dropdown",
			"heading" => __("Title and description under Icon?", "amz-composer-plugins"),
			"param_name" => "icon_below",
			"value" => array(__('No', "amz-composer-plugins") => "no", 
							 __('Yes', "amz-composer-plugins") => "yes"),
			"description" => __("Do you like to Title and description under Icon?", "amz-composer-plugins")
			),

		array(
			"type" => "dropdown",
			"heading" => __("Box Animation", "amz-composer-plugins"),
			"param_name" => "animate",
			"value" => array(__('No', "amz-composer-plugins") => "no", 
							 __('Yes', "amz-composer-plugins") => "yes"),
			"description" => __("Do you like to animate this element", "amz-composer-plugins"),
			"group"	=> __('Animate', 'amz-composer-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Animation Transition", "amz-composer-plugins"),

			"param_name" => "transition",
			"value" => $animation,
			"description" => __("Choose Animation Transition.", "amz-composer-plugins"),
			"dependency" => array('element' => "animate", 'value' => array('yes')),
			"group"	=> __('Animate', 'amz-composer-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => __("Animation Duration", "amz-composer-plugins"),
			"param_name" => "duration",
			"value" => "",
			"description" => __("Enter the Duration (Ex: 500ms or 1s)", "amz-composer-plugins"),
			"dependency" => array('element' => "animate", 'value' => array('yes')),
			"group"	=> __('Animate', 'amz-composer-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => __("Animation Delay", "amz-composer-plugins"),
			"param_name" => "delay",
			"value" => "",
			"description" => __("Enter the Delay (Ex: 100ms or 1s)", "amz-composer-plugins"),
			"dependency" => array('element' => "animate", 'value' => array('yes')),
			"group"	=> __('Animate', 'amz-composer-plugins')
			),
		)
) );


//Gradient Text shortcode
vc_map( array(
	"name" => __("Gradient Text", "amz-composer-plugins"), //Title
	"base" => "gradient_text", //Shortcode name
	"class" => "",
	"icon" => "icon-pixel8es",
	"category" => 'By Composer', //category
	"params" => array(

		array(
			"type" => "textfield",
			"heading" => __("Text", "amz-composer-plugins"),
			"param_name" => "title",
			"value" => "",			
			"admin_label" => true,
			"description" => __("Enter the gradient text.", "amz-composer-plugins")
			),

		array(
			"type" => "dropdown",
			"heading" => __("Alignment", "amz-composer-plugins"),
			"param_name" => "align",			 
			"value" => array(__('Align center', "amz-composer-plugins") => "", 
							 __('Align left', "amz-composer-plugins") => "align-left",
							 __('Align Right', "amz-composer-plugins") => "align-right"),
			"description" => __("Select alignment.", "amz-composer-plugins")
			),

		array(
			"type" => "textfield",
			"heading" => __("Custom Font Size", "amz-composer-plugins"),
			"param_name" => "font_size",
			"value" => "",
			"description" => __("Enter the font size in px(Ex: 50px)", "amz-composer-plugins")
			),

		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => __("Gradient Color 1", "amz-composer-plugins"),
			"param_name" => "gradient1", 
			"value" => '',
			"description" => __("Choose gradient text color 1 (or) Leave it empty to apply theme default", "amz-composer-plugins")
			),

		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => __("Gradient Color 2", "amz-composer-plugins"),
			"param_name" => "gradient2", 
			"value" => '',
			"description" => __("Choose gradient text color 2 (or) Leave it empty to apply theme default", "amz-composer-plugins")
			),

		array(
			"type" => "dropdown",
			"heading" => __("Animation", "amz-composer-plugins"),
			"param_name" => "animate",
			"value" => array(__('No', "amz-composer-plugins") => "no", 
							 __('Yes', "amz-composer-plugins") => "yes"),
			"description" => __("Do you like to animate this element", "amz-composer-plugins"),
			"group"	=> __('Animate', 'amz-composer-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Animation Transition", "amz-composer-plugins"),

			"param_name" => "transition",
			"value" => $animation,
			"description" => __("Choose Animation Transition.", "amz-composer-plugins"),
			"dependency" => array('element' => "animate", 'value' => array('yes')),
			"group"	=> __('Animate', 'amz-composer-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => __("Animation Duration", "amz-composer-plugins"),
			"param_name" => "duration",
			"value" => "",
			"description" => __("Enter the Duration (Ex: 500ms or 1s)", "amz-composer-plugins"),
			"dependency" => array('element' => "animate", 'value' => array('yes')),
			"group"	=> __('Animate', 'amz-composer-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => __("Animation Delay", "amz-composer-plugins"),
			"param_name" => "delay",
			"value" => "",
			"description" => __("Enter the Delay (Ex: 100ms or 1s)", "amz-composer-plugins"),
			"dependency" => array('element' => "animate", 'value' => array('yes')),
			"group"	=> __('Animate', 'amz-composer-plugins')
			),

		)
) );

// Icon Shortcode
vc_map( array(
	"name" => __("Icon", "amz-composer-plugins"), //Title
	"base" => "icon", //Shortcode name
	"class" => "",
	"icon" => "icon-pixel8es",
	"category" => 'By Composer', //category
	"params" => array(

		array(
			"type" => "dropdown",
			"heading" => __("Alignment", "amz-composer-plugins"),
			"param_name" => "align",			 
			"value" => array(__('Align center', "amz-composer-plugins") => "center", 
							 __('Align left', "amz-composer-plugins") => "left",
							 __('Align Right', "amz-composer-plugins") => "right"),
			"description" => __("Select alignment.", "amz-composer-plugins")
			),

		array(
			"type" => "icon",
			"heading" => __("Insert Icon", "amz-composer-plugins"),
			"param_name" => "icon_name",
			"admin_label" => true,
			"value" => '',
			"description" => '',
			),

		array(
			"type" => "vc_link",
			"heading" => __("Icon URL", "amz-composer-plugins"),
			"param_name" => "icon_link",
			"value" => "",
			"description" => __("Enter the icon link", "amz-composer-plugins")
			),

		array(
			"type" => "dropdown",
			"heading" => __("Icon Style", "amz-composer-plugins"),
			"param_name" => "icon_style",
			"value" => array(__('Default', "amz-composer-plugins") => "bg-none",
							 __('Solid', "amz-composer-plugins") => "solid",
							 __('Outline', "amz-composer-plugins") => "outline",
							 __('Gradient', "amz-composer-plugins") => "gradient"),
			"description" => __("Select icon style.", "amz-composer-plugins")
			),

		array(
			"type" => "dropdown",
			"heading" => __("Icon Type", "amz-composer-plugins"),
			"param_name" => "icon_type",
			"value" => array(__('Circle', "amz-composer-plugins") => "icon-circle",
							 __('Square', "amz-composer-plugins") => "icon-square"),
			"description" => __("Select icon apperance.", "amz-composer-plugins"),
			"dependency" => array('element' => "icon_style", 'value' => array('outline', 'solid'))
			),

		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => __("Gradient Color 1", "amz-composer-plugins"),
			"param_name" => "gradient1", 
			"value" => '',
			"description" => __("Choose gradient text color 1 (or) Leave it empty to apply theme default", "amz-composer-plugins"),
			"dependency" => array('element' => "icon_style", 'value' => array('gradient'))
			),

		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => __("Gradient Color 2", "amz-composer-plugins"),
			"param_name" => "gradient2", 
			"value" => '',
			"description" => __("Choose gradient text color 2 (or) Leave it empty to apply theme default", "amz-composer-plugins"),
			"dependency" => array('element' => "icon_style", 'value' => array('gradient'))
			),

		array(
			"type" => "textfield",
			"heading" => __("Custom Icon Size?", "amz-composer-plugins"),
			"param_name" => "icon_size",
			"value" => "",
			"description" => __("Enter the font size in px(Ex: 50px) if you want use your own font size or Leave it empty to apply theme default", "amz-composer-plugins")
			),

		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => __("Custom Icon Color", "amz-composer-plugins"),
			"param_name" => "icon_color", 
			"value" => '',
			"description" => __("Choose Icon color (or) Leave it empty to apply theme default", "amz-composer-plugins"),
			"dependency" => array('element' => "icon_style", 'value' => array('bg-none', 'outline', 'solid'))
			),

		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => __("Custom Icon Background Color", "amz-composer-plugins"),
			"param_name" => "icon_bg_color", 
			"value" => '', 
			"description" => __("Choose Icon Background Color (or) Leave it empty to apply theme default", "amz-composer-plugins"),
			"dependency" => array('element' => "icon_style", 'value' => array('solid'))
			),

		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => __("Custom Icon Border Color", "amz-composer-plugins"),
			"param_name" => "icon_border_color", 
			"value" => '', 
			"description" => __("Choose Icon Border Color (or) Leave it empty to apply theme default", "amz-composer-plugins"),
			"dependency" => array('element' => "icon_style", 'value' => array('outline'))
			),

		array(
			"type" => "textfield",
			"heading" => __("Title", "amz-composer-plugins"),
			"param_name" => "title",
			"value" => "",
			"description" => __("Enter the title.", "amz-composer-plugins"),
			"group"	=> __('Title', 'amz-composer-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Title Tag", "amz-composer-plugins"),
			"param_name" => "title_tag",
			"value" => array('h2','h1','h3','h4','h5','h6', 'p'),
			"description" => __("Select title tag.", "amz-composer-plugins"),
			"group"	=> __('Title', 'amz-composer-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => __("Custom Title Font Size?", "amz-composer-plugins"),
			"param_name" => "text_font",
			"value" => "",
			"description" => __("Enter the font size in px (Ex: 50px) if you want custom font size or Leave it empty to apply theme default", "amz-composer-plugins"),
			"group"	=> __('Title', 'amz-composer-plugins')
			),

		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => __("Custom Text Color", "amz-composer-plugins"),
			"param_name" => "text_color", //Shortcode_attr name
			"value" => '', //Default Red color
			"description" => __("Choose text color if you want custom color (or) Leave it empty to apply theme default", "amz-composer-plugins"),
			"group"	=> __('Title', 'amz-composer-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => __("Title Margin", "amz-composer-plugins"),
			"param_name" => "margin",
			"value" => "",
			"description" => __("Value should be in css format [top right bottom left] in px (Ex: -10px 20px 30px 40px).", "amz-composer-plugins"),
			"group"	=> __('Title', 'amz-composer-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Box Animation", "amz-composer-plugins"),
			"param_name" => "animate",
			"value" => array(__('No', "amz-composer-plugins") => "no", 
							 __('Yes', "amz-composer-plugins") => "yes"),
			"description" => __("Do you like to animate this element", "amz-composer-plugins"),
			"group"	=> __('Animate', 'amz-composer-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Animation Transition", "amz-composer-plugins"),
			"param_name" => "transition",
			"value" => $animation,
			"description" => __("Choose Animation Transition.", "amz-composer-plugins"),
			"dependency" => array('element' => "animate", 'value' => array('yes')),
			"group"	=> __('Animate', 'amz-composer-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => __("Animation Duration", "amz-composer-plugins"),
			"param_name" => "duration",
			"value" => "",
			"description" => __("Enter the Duration (Ex: 500ms or 1s)", "amz-composer-plugins"),
			"dependency" => array('element' => "animate", 'value' => array('yes')),
			"group"	=> __('Animate', 'amz-composer-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => __("Animation Delay", "amz-composer-plugins"),
			"param_name" => "delay",
			"value" => "",
			"description" => __("Enter the Delay (Ex: 100ms or 1s)", "amz-composer-plugins"),
			"dependency" => array('element' => "animate", 'value' => array('yes')),
			"group"	=> __('Animate', 'amz-composer-plugins')
			)
		)
) );

// Clients
vc_map( array(
	"name" => __("Clients", "amz-composer-plugins"), //Title
	"base" => "clients", //Shortcode name
	"class" => "",
	"icon" => "icon-pixel8es",
	"category" => 'By Composer', //category
	"params" => array(

		array(
			"type" => "attach_images",
			"heading" => __("Images", "amz-composer-plugins"),
			"param_name" => "images",
			"value" => "",
			"description" => __("Select images from media library.", "amz-composer-plugins")
			),

		array(
			"type" => "dropdown",
			"heading" => __("Add Link client images?", "amz-composer-plugins"),
			"param_name" => "link",
			"value" => array( __('Yes', "amz-composer-plugins") => "yes",
							  __('No', "amz-composer-plugins") => "no"),
			"description" => ''
			),

		array(
			"type" => "textarea",
			"class" => "",
			"heading" => __("Enter links for each client here", "amz-composer-plugins"),
			"param_name" => "custom_links", 
			"value" => '', 
			"description" => __("Enter links for each client here. Divide links with comma (,).", "amz-composer-plugins"),
			"dependency" => array('element' => "link", 'value' => array('yes'))
			),

		array(
			"type" => "dropdown",
			"heading" => __("Client (company) Names on Hover", "amz-composer-plugins"),
			"param_name" => "title_on_hover",
			"value" => array( __('Yes', "amz-composer-plugins") => "yes",
				__('No', "amz-composer-plugins") => "no"),
			"description" => __("Do you want to display client (company) names on Hover over client image?.", "amz-composer-plugins")
			),

		array(
			"type" => "textarea",
			"class" => "",
			"heading" => __("Enter Company name for each client here", "amz-composer-plugins"),
			"param_name" => "titles", 
			"value" => '', 
			"description" => __("Enter Company name for each client here. Divide links with comma (,).", "amz-composer-plugins"),
			"dependency" => array('element' => "title_on_hover", 'value' => array('yes'))
			),

		array(
			"type" => "dropdown",
			"heading" => __("Clients Style", "amz-composer-plugins"),
			"param_name" => "style",
			"admin_label" => true,
			"value" => array(__('Style1', "amz-composer-plugins") => "", 
							 __('Style2', "amz-composer-plugins") => "style2", 
							 __('Style3', "amz-composer-plugins") => "style3",
							 __('Style4', "amz-composer-plugins") => "style4",
							 __('Style5', "amz-composer-plugins") => "style4 style5"),
			"description" => ''
			),

		array(
			"type" => "dropdown",
			"heading" => __("No of Items", "amz-composer-plugins"),
			"param_name" => "items",
			"value" => array(__('4', "amz-composer-plugins") => "4",
							 __('5', "amz-composer-plugins") => "5",
							 __('6', "amz-composer-plugins") => "6",
							 __('2', "amz-composer-plugins") => "2"),
			"description" => __("Choose Number of items", "amz-composer-plugins")
			),

		array(
			"type" => "dropdown",
			"heading" => __("Enable Carousel?", "amz-composer-plugins"),
			"param_name" => "slider",
			"value" => array( __('Yes', "amz-composer-plugins") => "yes",
							  __('No', "amz-composer-plugins") => "no"),
			"description" => '',
			"group"	=> __('Carousel', 'amz-composer-plugins')
			),
		
		array(
			"type" => "dropdown",
			"heading" => __("Enable Autoplay?", "amz-composer-plugins"),
			"param_name" => "autoplay",
			"value" => array(__('No', "amz-composer-plugins") => "false",  
							 __('Yes', "amz-composer-plugins") => "true"),
			"description" => __("Do you want to enable autoslide.", "amz-composer-plugins"),
			"dependency" => array('element' => "slider", 'value' => array('yes')),
			"group"	=> __('Carousel', 'amz-composer-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => __("Slide Speed", "amz-composer-plugins"),
			"param_name" => "slide_speed",
			"value" => "5000",
			"description" => __("Enter the Value in milesecond (Ex: 5000)", "amz-composer-plugins"),
			"dependency" => array('element' => "autoplay", 'value' => array('true')),
			"group"	=> __('Carousel', 'amz-composer-plugins')
			),   

		array(
			"type" => "dropdown",
			"heading" => __("Arrow", "amz-composer-plugins"),
			"param_name" => "slide_arrow",
			"value" => array( __('Yes', "amz-composer-plugins") => "true",
							  __('No', "amz-composer-plugins") => "false"),
			"description" => __("Display navigation arrow?", "amz-composer-plugins"),
			"dependency" => array('element' => "slider", 'value' => array('yes')),
			"group"	=> __('Carousel', 'amz-composer-plugins')
			),        

		array(
			"type" => "dropdown",
			"heading" => __("Arrow Style", "amz-composer-plugins"),
			"param_name" => "arrow_type",
			"value" => array( __('Default', "amz-composer-plugins") => "",
							  __('Arrow Top Right', "amz-composer-plugins") => "arrow-style2"),
			"description" => __("select the arrow Style", "amz-composer-plugins"),
			"dependency" => array('element' => "slide_arrow", 'value' => array('true')),
			"group"	=> __('Carousel', 'amz-composer-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Pagination", "amz-composer-plugins"),
			"param_name" => "pagination",
			"value" => array( __('Yes', "amz-composer-plugins") => "true",
							  __('No', "amz-composer-plugins") => "false"),
			"description" => __("Show pagination (dot nav) to slide images.", "amz-composer-plugins"),
			"dependency" => array('element' => "slider", 'value' => array('yes')),
			"group"	=> __('Carousel', 'amz-composer-plugins')
			),   

		array(
			"type" => "dropdown",
			"heading" => __("Loop", "amz-composer-plugins"),
			"param_name" => "loop",
			"value" => array( __('No', "amz-composer-plugins") => "false",
							  __('Yes', "amz-composer-plugins") => "true"),
			"description" => 'Infinity loop. Duplicate last and first items to get loop illusion.',
			"dependency" => array('element' => "slider", 'value' => array('yes')),
			"group"	=> __('Carousel', 'amz-composer-plugins')
			),

		array(
			'type' => 'textfield',
			'heading' => __( 'Margin', 'amz-composer-plugins' ),
			'param_name' => 'margin',
			'value' => '30',
			'description' => __( 'Enter margin-right(px) on item ( Example: 30 ).', 'amz-composer-plugins' ),
			"dependency" => array('element' => "slider", 'value' => array('yes')),
			"group"	=> __('Carousel', 'amz-composer-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Stop On Hover", "amz-composer-plugins"),
			"param_name" => "stop_on_hover",
			"value" => array( __('Yes', "amz-composer-plugins") => "true",
							  __('No', "amz-composer-plugins") => "false"),
			"description" => __("Stop autoplaying carousel on mouerover", "amz-composer-plugins"),
			"dependency" => array('element' => "slider", 'value' => array('yes')),
			"group"	=> __('Carousel', 'amz-composer-plugins')
			), 
		array(
			"type" => "dropdown",
			"heading" => __("Mouse Drag", "amz-composer-plugins"),
			"param_name" => "mouse_drag",
			"value" => array( __('Yes', "amz-composer-plugins") => "true",
							  __('No', "amz-composer-plugins") => "false"),
			"description" =>  __("Do you like to move carousel Mouse Drag?", "amz-composer-plugins"),
			"dependency" => array('element' => "slider", 'value' => array('yes')),
			"group"	=> __('Carousel', 'amz-composer-plugins')
			), 
		array(
			"type" => "dropdown",
			"heading" => __("Touch Drag", "amz-composer-plugins"),
			"param_name" => "touch_drag",
			"value" => array( __('Yes', "amz-composer-plugins") => "true",
				__('No', "amz-composer-plugins") => "false"),
			"description" => __("Do you like to move carousel Touch Drag (in touch devices)?", "amz-composer-plugins"),
			"dependency" => array('element' => "slider", 'value' => array('yes')),
			"group"	=> __('Carousel', 'amz-composer-plugins')
			),             
		)
) );

// Button
vc_map( array(
	"name" => __("Button", "amz-composer-plugins"), //Title
	"base" => "button", //Shortcode name
	"class" => "",
	"icon" => "icon-pixel8es",
	"category" => 'By Composer', //category
	"params" => array(

		array(
			"type" => "vc_link",
			"heading" => __("Button URL", "amz-composer-plugins"),
			"param_name" => "button_link",
			"value" => "",
			"description" => __("Enter the button link", "amz-composer-plugins")
			),

		array(
			"type" => "dropdown",
			"heading" => __("Button Style", "amz-composer-plugins"),
			"param_name" => "button_style",
			"value" => array(__('Outline', "amz-composer-plugins") => "outline", 
							 __('Solid', "amz-composer-plugins") => "solid", 
							 __('Simple (No Bg and No Border)', "amz-composer-plugins") => "simple"),
			"description" => __("Select button style?", "amz-composer-plugins")
			),

		array(
			"type" => "dropdown",
			"heading" => __("Button Hover Style", "amz-composer-plugins"),
			"param_name" => "button_hover_style",
			"value" => array(__('Outline', "amz-composer-plugins") => "outline", 
							 __('Solid', "amz-composer-plugins") => "solid"),
			"description" => __("Select button hover style", "amz-composer-plugins"),
			),

		array( 
			"type" => "dropdown",
			"heading" => __("Button Type", "amz-composer-plugins"),
			"param_name" => "button_type",
			"value" => array(__('Oval', "amz-composer-plugins") =>'oval',
							 __('Rectangle', "amz-composer-plugins") =>'rectangle'),
			"description" => ''
			),

		array(
			"type" => "dropdown",
			"heading" => __("Button Color", "amz-composer-plugins"),
			"param_name" => "button_color",
			"value" => array(__('Theme default color', "amz-composer-plugins") => "color", 
							 __('Black', "amz-composer-plugins") => "no-color",
							 __('White', "amz-composer-plugins") => "white",
							 __('Custom Color', "amz-composer-plugins") => "custom_color"), 
			"description" => __("Please choose button color", "amz-composer-plugins")
			),

		array(
			"type" => "dropdown",
			"heading" => __("Button Hover Color", "amz-composer-plugins"),
			"param_name" => "button_hover_color",
			"value" => array(__('Theme default color', "amz-composer-plugins") => "color", 
							 __('Black', "amz-composer-plugins") => "no-color",
							 __('White', "amz-composer-plugins") => "white"), 
			"description" => __("Please choose button hover color", "amz-composer-plugins"),
			"dependency" => array('element' => "button_color", 'value' => array('color','no-color','white'))
			),

		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => __("Custom Background Color", "amz-composer-plugins"),
			"param_name" => "btn_bg_color", 
			"value" => '', 
			"description" => __("Choose Background Color", "amz-composer-plugins"),
			"dependency" => array('element' => "button_color", 'value' => array('custom_color'))
			),

		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => __("Custom Color", "amz-composer-plugins"),
			"param_name" => "btn_text_color", 
			"value" => '', 
			"description" => __("Choose Text Color", "amz-composer-plugins"),
			"dependency" => array('element' => "button_color", 'value' => array('custom_color'))
			),

		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => __("Custom Border Color", "amz-composer-plugins"),
			"param_name" => "btn_border_color", 
			"value" => '', 
			"description" => __("Choose Border Color", "amz-composer-plugins"),
			"dependency" => array('element' => "button_color", 'value' => array('custom_color'))
			),

		array(
			"type" => "dropdown",
			"heading" => __("Button Size", "amz-composer-plugins"),
			"param_name" => "button_size",
			"value" => array(__('Medium', "amz-composer-plugins") => "md", 
							 __('Small', "amz-composer-plugins") => "sm", 
							 __('Large', "amz-composer-plugins") => "lg"),
			"description" => __("Select button size?", "amz-composer-plugins")
			),

		array(
			"type" => "dropdown",
			"heading" => __("Custom Button Size?", "amz-composer-plugins"),
			"param_name" => "custom_size",
			"value" => array(__('No', "amz-composer-plugins") => "no",
							 __('Yes', "amz-composer-plugins") => "yes"),
			"description" => __("Do you want to custom button size?", "amz-composer-plugins")
			),

		array(
			"type" => "textfield",
			"heading" => __("Font Size", "amz-composer-plugins"),
			"param_name" => "font_size",
			"value" => "",
			"description" => __("Enter the font size in px(Ex: 50px)", "amz-composer-plugins"),
			"dependency" => array('element' => "custom_size", 'value' => array('yes'))
			),

		array(
			"type" => "textfield",
			"heading" => __("Custom Padding", "amz-composer-plugins"),
			"param_name" => "padding_custom",
			"value" => "",
			"description" => __("Enter the padding (in css format [top right bottom left]) in px(Ex: 50px 50px 50px 50px)", "amz-composer-plugins"),
			"dependency" => array('element' => "custom_size", 'value' => array('yes'))
			),

		array(
			"type" => "dropdown",
			"heading" => __("Button Align", "amz-composer-plugins"),
			"param_name" => "button_align",
			"value" => array(__('Left', "amz-composer-plugins") => "", 
							 __('Center', "amz-composer-plugins") => "button-center", 
							 __('Right', "amz-composer-plugins") => "button-right"),
			"description" => __("Select button Align?", "amz-composer-plugins")
			),		

		array(
			"type" => "icon",
			"heading" => __("Button Icon", "amz-composer-plugins"),
			"param_name" => "button_icon",
			"value" => '',
			"description" => __("choose button icon.", "amz-composer-plugins")
			),

		array(
			"type" => "dropdown",
			"heading" => __("Button Icon Align", "amz-composer-plugins"),
			"param_name" => "button_icon_align",
			"value" => array(__('Left', "amz-composer-plugins") => "front", 
							 __('Right', "amz-composer-plugins") => "back"), 
			"description" => __("Where you want to display Icon?", "amz-composer-plugins")
			),

		array(
			"type" => "dropdown",
			"heading" => __("Button Animation", "amz-composer-plugins"),
			"param_name" => "animate",
			"value" => array(__('No', "amz-composer-plugins") => "no", 
				__('Yes', "amz-composer-plugins") => "yes"),
			"description" => __("Do you like to animate this element", "amz-composer-plugins"),
			"group"	=> __('Animate', 'amz-composer-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Animation Transition", "amz-composer-plugins"),
			"param_name" => "transition",
			"value" => $animation,
			"description" => __("Choose animation transition.", "amz-composer-plugins"),
			"dependency" => array('element' => "animate", 'value' => array('yes')),
			"group"	=> __('Animate', 'amz-composer-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => __("Animation Duration", "amz-composer-plugins"),
			"param_name" => "duration",
			"value" => "",
			"description" => __("Enter the duration (Ex: 500ms or 1s)", "amz-composer-plugins"),
			"dependency" => array('element' => "animate", 'value' => array('yes')),
			"group"	=> __('Animate', 'amz-composer-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => __("Animation Delay", "amz-composer-plugins"),
			"param_name" => "delay",
			"value" => "",
			"description" => __("Enter the delay (Ex: 100ms or 1s)", "amz-composer-plugins"),
			"dependency" => array('element' => "animate", 'value' => array('yes')),
			"group"	=> __('Animate', 'amz-composer-plugins')
			),
		)
) );

// Title 
vc_map( array(
	"name" => __("Title", "amz-composer-plugins"), //Title
	"base" => "title", //Shortcode name
	"class" => "",
	"icon" => "icon-pixel8es",
	"category" => 'By Composer', //category
	"params" => array(

		array(
			"type" => "textfield",
			"heading" => __("Title", "amz-composer-plugins"),
			"param_name" => "title",
			"admin_label" => true,
			"value" => "Title",
			"description" => __("Enter the title.", "amz-composer-plugins")
			),

		array(
			"type" => "dropdown",
			"heading" => __("Title Style", "amz-composer-plugins"),
			"param_name" => "style",
			"value" => array(__('Normal Title', "amz-composer-plugins") => "normal-title", 
					         __('Fancy Title (title with bg color and bottom arrow)', "amz-composer-plugins") => "bg_text",
                             __('Box Title', "amz-composer-plugins") => "box-title",
                             __('Box Title Small ', "amz-composer-plugins") => "box-small",
                             __('Title Right Border', "amz-composer-plugins") => "title-right-border",
                             __('Title Sep', "amz-composer-plugins") => "title-sep"),
                             
			"description" => __("Choose Title style", "amz-composer-plugins")
			),

		array(
			"type" => "dropdown",
			"heading" => __("Title Alignment", "amz-composer-plugins"),
			"param_name" => "align",
			"value" => array(__('Align Left', "amz-composer-plugins") => "left", 
							 __('Align Center', "amz-composer-plugins") => "center", 
							 __('Align Right', "amz-composer-plugins") => "right"),
			"description" => __("Choose Title alignment.", "amz-composer-plugins")
			),

		array(
			"type" => "dropdown",
			"heading" => __("Display Title in UPPERCASE", "amz-composer-plugins"),
			"param_name" => "title_uppercase",
			"value" => array(__('Yes', "amz-composer-plugins") => "yes", 
							 __('No', "amz-composer-plugins") => "no"),
			"description" => __("Do you want display in all caps?", "amz-composer-plugins")
			),

		array(
			"type" => "dropdown",
			"heading" => __("Font Size", "amz-composer-plugins"),
			"param_name" => "font_size",
			"value" => array(__('small', "amz-composer-plugins") => "size-sm", 
							 __('Medium', "amz-composer-plugins") => "size-md", 
							 __('Large', "amz-composer-plugins") => "size-lg"),
			"description" => __("Select Font Size.", "amz-composer-plugins")
			),

		array(
			"type" => "textfield",
			"heading" => __("Custom Font Size", "amz-composer-plugins"),
			"param_name" => "custom_font_size",
			"value" => "",
			"description" => __("Enter the Custom title Font Size in px (Ex : 30px). Leave it empty to apply theme default.", "amz-composer-plugins")
			),

		array(
			"type" => "textfield",
			"heading" => __("Title Margin", "amz-composer-plugins"),
			"param_name" => "title_margin",
			"value" => "",
			"description" => __("Value should be in css format top right bottom left in px (Ex: -10px 20px 30px 40px), Leave it empty to apply theme default.", "amz-composer-plugins")
			),

		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => __("Title Custom Color", "amz-composer-plugins"),
			"param_name" => "title_color", 
			"value" => '', 
			"description" => __("Choose custom color on title", "amz-composer-plugins"),
			),

		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => __("Title Custom Background Color", "amz-composer-plugins"),
			"param_name" => "title_bg_color", 
			"value" => '', 
			"description" => __("Choose custom background color on title", "amz-composer-plugins"),
			),

		array(
			"type" => "textfield",
			"heading" => __("Title Padding", "amz-composer-plugins"),
			"param_name" => "title_padding",
			"value" => "",
			"description" => __("Value should be in css format top right bottom left in px (Ex: -10px 20px 30px 40px), Leave it empty to apply theme default.", "amz-composer-plugins")
			),

		array(
			'type' => 'textfield',
			'heading' => __( 'Title Border Radius', 'amz-composer-plugins' ),
			'param_name' => 'title_border_radius',
			'value' => '',
			'description' => __( 'Enter the title border radius in (px)  Example: 70px.', 'amz-composer-plugins' )
		),

		array(
			'type' => 'textfield',
			'heading' => __( 'Title Line Height', 'amz-composer-plugins' ),
			'param_name' => 'title_line_height',
			'value' => '',
			'description' => __( 'Enter the line-height in (px)  Example: 70px.', 'amz-composer-plugins' )
		),

		array(
			"type" => "dropdown",
			"heading" => __("Title Display", "amz-composer-plugins"),
			"param_name" => "title_display",
			"value" => array(__('Default', "amz-composer-plugins") => "", 
							 __('Inline Block', "amz-composer-plugins") => "inline-block", 
							 __('Inline', "amz-composer-plugins") => "inline"),
			"description" => __("Select Title Display.", "amz-composer-plugins")
			),

		array(
			"type" => "textfield",
			"heading" => __("Title Letter Spacing in px", "amz-composer-plugins"),
			"param_name" => "title_letter_space",
			"value" => "",
			"description" => __("Enter Title Letter Spacing in Pixels.( eg: 50px )", "amz-composer-plugins")
			),

		array(
			"type" => "dropdown",
			"heading" => __("Title Tag", "amz-composer-plugins"),
			"param_name" => "title_tag",
			"value" => array('h2','h1','h3','h4','h5','h6'),
			"description" => __("Select title tag.", "amz-composer-plugins")
			),

		array(
			"type" => "dropdown",
			"heading" => __("Do you want subtitle?", "amz-composer-plugins"),
			"param_name" => "sub_title",
			"value" => array(__('No', "amz-composer-plugins") => "no",
				         __('Yes', "amz-composer-plugins") => "yes"), 
			"description" => __("Do you want subtitle?", "amz-composer-plugins"),
			"dependency" => array('element' => "style", 'value' => array('normal-title','box-title','box-small','title-sep','title-right-border')),
		 	"group"	=> __('Sub Title', 'amz-composer-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Do you want sub_title_style?", "amz-composer-plugins"),
			"param_name" => "sub_title_style",
			"value" => array(__('Normal', "amz-composer-plugins") => "",
					 __('Italic', "amz-composer-plugins") => "italic"), 
			"description" => __("Do you want subtitle?", "amz-composer-plugins"),
			"dependency" => array('element' => "sub_title", 'value' => array('yes')),
		 	"group"	=> __('Sub Title', 'amz-composer-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => __("subtitle text", "amz-composer-plugins"),
			"param_name" => "sub_title_text",
			"value" => "Subtitle text",
			"description" => __("Enter the sub title text.", "amz-composer-plugins"),
			"dependency" => array('element' => "sub_title", 'value' => array('yes')),
		 	"group"	=> __('Sub Title', 'amz-composer-plugins')
			),

		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => __("Sub Title Custom Color", "amz-composer-plugins"),
			"param_name" => "sub_title_color", 
			"value" => '', 
			"description" => __("Choose custom color on sub title", "amz-composer-plugins"),
			"dependency" => array('element' => "sub_title", 'value' => array('yes')),
		 	"group"	=> __('Sub Title', 'amz-composer-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => __("Custom Sub Title Font Size", "amz-composer-plugins"),
			"param_name" => "sub_title_size",
			"value" => "",
			"description" => __("Enter the Custom Sub Title Font Size in px (Ex : 30px). Leave it empty to apply theme default.", "amz-composer-plugins"),
			"dependency" => array('element' => "sub_title", 'value' => array('yes')),
		 	"group"	=> __('Sub Title', 'amz-composer-plugins')
			),

		 array(
		 	"type" => "textfield",
		 	"heading" => __("Sub Title Margin Bottom", "amz-composer-plugins"),
		 	"param_name" => "sub_title_margin",
		 	"value" => "",
		 	"description" => __("Margin bottom for sub title margin bottom in px (Ex: 20px), Leave it empty to apply theme default.", "amz-composer-plugins"),
		 	"dependency" => array('element' => "sub_title", 'value' => array('yes')),
		 	"group"	=> __('Sub Title', 'amz-composer-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Line", "amz-composer-plugins"),
			"param_name" => "line",
			"value" => array(__('Yes', "amz-composer-plugins") => "yes", 
							 __('No', "amz-composer-plugins") => "no"), 
			"description" => __("Display line below title?", "amz-composer-plugins"),
			"group"	=> __('Line', 'amz-composer-plugins')
			),
            
        array(
			"type" => "dropdown",
			"heading" => __("Line Positions", "amz-composer-plugins"),
			"param_name" => "line_positions",
			"value" => array(__('Below Title', "amz-composer-plugins") => "below-title", 
							 __('Below Sub Title', "amz-composer-plugins") => "below-sub-title"), 
			"description" => __("Display line below title?", "amz-composer-plugins"),
             "dependency" => array('element' => "line", 'value' => array('yes')),
			"group"	=> __('Line', 'amz-composer-plugins')
			),
                
        array(
			"type" => "dropdown",
			"heading" => __("Line Style", "amz-composer-plugins"),
			"param_name" => "line_style",
			"value" => array(__('Line Style1', "amz-composer-plugins") => "line-style1", 
                             __('Line Style2', "amz-composer-plugins") => "line-style2",
                             __('Line Style3', "amz-composer-plugins") => "line-style3",
                             __('Line Style4', "amz-composer-plugins") => "line-style4",
                             __('Line Style5', "amz-composer-plugins") => "line-style5"),
			"description" => __("Do you like to animate this element", "amz-composer-plugins"),
            "dependency" => array('element' => "line", 'value' => array('yes')),
			"group"	=> __('Line', 'amz-composer-plugins')
			),

		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => __("Custom Line Color", "amz-composer-plugins"),
			"param_name" => "line_color", 
			"value" => '', 
			"description" => __("Choose custom color on line", "amz-composer-plugins"),
			"dependency" => array('element' => "line", 'value' => array('yes')),
		 	"group"	=> __('Line', 'amz-composer-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Title Animation", "amz-composer-plugins"),
			"param_name" => "animate",
			"value" => array(__('No', "amz-composer-plugins") => "no", 
							 __('Yes', "amz-composer-plugins") => "yes"),
			"description" => __("Do you like to animate this element", "amz-composer-plugins"),
			"group"	=> __('Animate', 'amz-composer-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Title Animation Transition", "amz-composer-plugins"),
			"param_name" => "transition",
			"value" => $animation,
			"description" => __("Choose Animation Transition.", "amz-composer-plugins"),
			"dependency" => array('element' => "animate", 'value' => array('yes')),
			"group"	=> __('Animate', 'amz-composer-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => __("Title Animation Duration", "amz-composer-plugins"),
			"param_name" => "duration",
			"value" => "",
			"description" => __("Enter the Duration (Ex: 500ms or 1s)", "amz-composer-plugins"),
			"dependency" => array('element' => "animate", 'value' => array('yes')),
			"group"	=> __('Animate', 'amz-composer-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => __("Title Animation Delay", "amz-composer-plugins"),
			"param_name" => "delay",
			"value" => "",
			"description" => __("Enter the Delay (Ex: 100ms or 1s)", "amz-composer-plugins"),
			"dependency" => array('element' => "animate", 'value' => array('yes')),
			"group"	=> __('Animate', 'amz-composer-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Sub Title Animation", "amz-composer-plugins"),
			"param_name" => "sub_animate",
			"value" => array(__('No', "amz-composer-plugins") => "no", 
							 __('Yes', "amz-composer-plugins") => "yes"),
			"description" => __("Do you like to animate this element", "amz-composer-plugins"),
			"group"	=> __('Animate', 'amz-composer-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Sub Title Animation Transition", "amz-composer-plugins"),
			"param_name" => "sub_transition",
			"value" => $animation,
			"description" => __("Choose Animation Transition.", "amz-composer-plugins"),
			"dependency" => array('element' => "sub_animate", 'value' => array('yes')),
			"group"	=> __('Animate', 'amz-composer-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => __("Sub Title Animation Duration", "amz-composer-plugins"),
			"param_name" => "sub_duration",
			"value" => "",
			"description" => __("Enter the Duration (Ex: 500ms or 1s)", "amz-composer-plugins"),
			"dependency" => array('element' => "sub_animate", 'value' => array('yes')),
			"group"	=> __('Animate', 'amz-composer-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => __("Sub Title Animation Delay", "amz-composer-plugins"),
			"param_name" => "sub_delay",
			"value" => "",
			"description" => __("Enter the Delay (Ex: 100ms or 1s)", "amz-composer-plugins"),
			"dependency" => array('element' => "sub_animate", 'value' => array('yes')),
			"group"	=> __('Animate', 'amz-composer-plugins')
			),
		)
) );

// Counters 
vc_map( array(
	"name" => __("Counters", "amz-composer-plugins"), //Title
	"base" => "counter", //Shortcode name
	"class" => "",
	"icon" => "icon-pixel8es",
	"category" => 'By Composer', //category
	"params" => array(

		array(
			"type" => "textfield",
			"heading" => __("Counter Number", "amz-composer-plugins"),
			"param_name" => "number",
			"admin_label" => true,
			"value" => "5000",
			"description" => __("Enter the counter number.", "amz-composer-plugins")
			),

		array(
			"type" => "textfield",
			"heading" => __("Counter Number Font Size in px", "amz-composer-plugins"),
			"param_name" => "number_font_size",
			"value" => "",
			"description" => __("Enter Font Size in Pixels(eg: 16px), Leave empty to apply theme default", "amz-composer-plugins")
			),

		array(
			"type" => "textfield",
			"heading" => __("Counter Text", "amz-composer-plugins"),
			"param_name" => "text",
			"admin_label" => true,
			"value" => "Pizzas ordered",
			"description" => __("Enter the counter Text.", "amz-composer-plugins")
			),

		array(
			"type" => "textfield",
			"heading" => __("Counter Text Font Size in px", "amz-composer-plugins"),
			"param_name" => "text_font_size",
			"value" => "",
			"description" => __("Enter Font Size in Pixels(eg: 16px), Leave empty to apply theme default", "amz-composer-plugins")
			),

		array(
			"type" => "dropdown",
			"heading" => __("Icon", "amz-composer-plugins"),
			"param_name" => "icon",
			"value" => array(__('Yes', "amz-composer-plugins") => "yes", 
							 __('No', "amz-composer-plugins") => "no"), 
			"description" => __("Do you like to add icon?", "amz-composer-plugins")
			),

		array(
			"type" => "icon",
			"heading" => __("Insert Icon", "amz-composer-plugins"),
			"param_name" => "icon_name",
			"value" => '',
			"description" => __("Choose an icon.", "amz-composer-plugins")
			),

		array(
			"type" => "dropdown",
			"heading" => __("Icon Alignment", "amz-composer-plugins"),
			"param_name" => "icon_align",
			"value" => array(__('Align Left', "amz-composer-plugins") => "", 
							 __('Align Center', "amz-composer-plugins") => "center", 
							 __('Align Right', "amz-composer-plugins") => "right"),
			"description" => __("Select icon alignment.", "amz-composer-plugins")
			),

		array(
			"type" => "dropdown",
			"heading" => __("Display Icon in Theme Default Color?", "amz-composer-plugins"),
			"param_name" => "icon_color",
			"value" => array(__('Yes', "amz-composer-plugins") => " color", 
							 __('No', "amz-composer-plugins") => "no"), 
			"description" => ''
			),

		array(
			"type" => "dropdown",
			"heading" => __("Border", "amz-composer-plugins"),
			"param_name" => "border",
			"value" => array(__('Yes', "amz-composer-plugins") => "border", 
							 __('No', "amz-composer-plugins") => "no"), 
			"description" => __("Display border around counter?", "amz-composer-plugins")
			),

		)
) );

// Callout Box
vc_map( array(
	"name" => __("Callout Box", "amz-composer-plugins"), 
	"base" => "callout_box", 
	"class" => "",
	"icon" => "icon-pixel8es",
	"category" => 'By Composer',
	"params" => array(

		array(
			"type" => "dropdown",
			"heading" => __("Callout Box Style", "amz-composer-plugins"),
			"param_name" => "callout_style",
			"value" => array(__('Default (No background Color)', "amz-composer-plugins") => "default", 
							 __('Normal (In Grey Background)', "amz-composer-plugins") => "background",
							 __('classic (Grey Background with Border on  left)', "amz-composer-plugins") => "background border"),
			"description" => __("Select Call out box style.", "amz-composer-plugins")
			),

		array(
			"type" => "dropdown",
			"heading" => __("Callout Box Alignment", "amz-composer-plugins"),
			"param_name" => "callout_align",
			"value" => array(__('Align center', "amz-composer-plugins") => "center", 
							 __('Align left', "amz-composer-plugins") => "left"),
			"description" => __("Select box alignment.", "amz-composer-plugins")
			),

		array(
			"type" => "dropdown",
			"heading" => __("Title Tag", "amz-composer-plugins"),
			"param_name" => "title_tag",
			"value" => array('h2','h1','h3','h4','h5','h6'),
			"description" => __("Select title tag.", "amz-composer-plugins")
			),

		array(
			"type" => "textfield",
			"heading" => __("Title", "amz-composer-plugins"),
			"param_name" => "title",
			"admin_label" => true,
			"value" => "Title goes here",
			"description" => __("Enter the title.", "amz-composer-plugins")
			),

		array(
			"type" => "textarea_html",
			"class" => "",
			"heading" => __("Callout Box Content", "amz-composer-plugins"),
			"param_name" => "content", 
			"value" => '', 
			"description" => __("Enter the callout box content", "amz-composer-plugins")
			),

		array(
			"type" => "dropdown",
			"heading" => __("Display Button?", "amz-composer-plugins"),
			"param_name" => "display_button",
			"value" => array(__('Yes', "amz-composer-plugins") => "yes", 
							 __('No', "amz-composer-plugins") => "no"),
			"description" => __("Do you want to display button?", "amz-composer-plugins"),
			"group"	=> __('Button', 'amz-composer-plugins')
			),

		array(
			"type" => "vc_link",
			"heading" => __("Button URL", "amz-composer-plugins"),
			"param_name" => "button_link",
			"value" => "",
			"description" => __("Enter the button link", "amz-composer-plugins"),
			"dependency" => array('element' => "display_button", 'value' => array('yes')),
			"group"	=> __('Button', 'amz-composer-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Button Style", "amz-composer-plugins"),
			"param_name" => "button_style",
			"value" => array(__('Outline', "amz-composer-plugins") => "outline", 
							 __('Solid', "amz-composer-plugins") => "solid", 
							 __('Default', "amz-composer-plugins") => "simple"),
			"description" => __("Select button style?", "amz-composer-plugins"),
			"dependency" => array('element' => "display_button", 'value' => array('yes')),
			"group"	=> __('Button', 'amz-composer-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Button Hover Style", "amz-composer-plugins"),
			"param_name" => "button_hover_style",
			"value" => array(__('Outline', "amz-composer-plugins") => "outline", 
							 __('Solid', "amz-composer-plugins") => "solid"),
			"description" => __("Select button hover style", "amz-composer-plugins"),
			"dependency" => array('element' => "display_button", 'value' => array('yes')),
			"group"	=> __('Button', 'amz-composer-plugins')
			),

		array( 
			"type" => "dropdown",
			"heading" => __("Button Type", "amz-composer-plugins"),
			"param_name" => "button_type",
			"value" => array(__('Oval', "amz-composer-plugins") =>'oval',
							 __('Rectangle', "amz-composer-plugins") =>'rectangle'),
			"description" => '',
			"dependency" => array('element' => "display_button", 'value' => array('yes')),
			"group"	=> __('Button', 'amz-composer-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Button Color", "amz-composer-plugins"),
			"param_name" => "button_color",
			"value" => array(__('Theme default color', "amz-composer-plugins") => "color", 
							 __('black', "amz-composer-plugins") => "no-color",
							 __('white', "amz-composer-plugins") => "white"), 
			"description" => __("Please choose button color", "amz-composer-plugins"),
			"dependency" => array('element' => "display_button", 'value' => array('yes')),
			"group"	=> __('Button', 'amz-composer-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Button Hover Color", "amz-composer-plugins"),
			"param_name" => "button_hover_color",
			"value" => array(__('Theme default color', "amz-composer-plugins") => "color", 
							 __('black', "amz-composer-plugins") => "no-color",
							 __('white', "amz-composer-plugins") => "white"), 
			"description" => __("Please choose button hover color", "amz-composer-plugins"),
			"dependency" => array('element' => "display_button", 'value' => array('yes')),
			"group"	=> __('Button', 'amz-composer-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Button Size", "amz-composer-plugins"),
			"param_name" => "button_size",
			"value" => array(__('Medium', "amz-composer-plugins") => "md", 
							 __('Small', "amz-composer-plugins") => "sm", 
							 __('Large', "amz-composer-plugins") => "lg"),
			"description" => __("Select button size", "amz-composer-plugins"),
			"dependency" => array('element' => "display_button", 'value' => array('yes')),
			"group"	=> __('Button', 'amz-composer-plugins')
			),

		array(
			"type" => "icon",
			"heading" => __("Button Icon", "amz-composer-plugins"),
			"param_name" => "button_icon",
			"value" => '',
			"description" => __("Insert button icon.", "amz-composer-plugins"),
			"dependency" => array('element' => "display_button", 'value' => array('yes')),
			"group"	=> __('Button', 'amz-composer-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Button Icon Align", "amz-composer-plugins"),
			"param_name" => "button_icon_align",
			"value" => array(__('Left', "amz-composer-plugins") => "front", 
							 __('Right', "amz-composer-plugins") => "back"), 
			"description" => __("Where you want to display Icon?", "amz-composer-plugins"),
			"group"	=> __('Button', 'amz-composer-plugins')
			),


		array(
			"type" => "dropdown",
			"heading" => __("Callout Animation", "amz-composer-plugins"),
			"param_name" => "animate",
			"value" => array(__('No', "amz-composer-plugins") => "no", 
				__('Yes', "amz-composer-plugins") => "yes"),
			"description" => __("Do you like to animate this element", "amz-composer-plugins"),
			"group"	=> __('Animate', 'amz-composer-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Animation Transition", "amz-composer-plugins"),
			"param_name" => "transition",
			"value" => $animation,
			"description" => __("Choose Animation Transition.", "amz-composer-plugins"),
			"dependency" => array('element' => "animate", 'value' => array('yes')),
			"group"	=> __('Animate', 'amz-composer-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => __("Animation Duration", "amz-composer-plugins"),
			"param_name" => "duration",
			"value" => "",
			"description" => __("Enter the Duration (Ex: 500ms or 1s)", "amz-composer-plugins"),
			"dependency" => array('element' => "animate", 'value' => array('yes')),
			"group"	=> __('Animate', 'amz-composer-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => __("Animation Delay", "amz-composer-plugins"),
			"param_name" => "delay",
			"value" => "",
			"description" => __("Enter the Delay (Ex: 100ms or 1s)", "amz-composer-plugins"),
			"dependency" => array('element' => "animate", 'value' => array('yes')),
			"group"	=> __('Animate', 'amz-composer-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => __("Extra class name", "amz-composer-plugins"),
			"param_name" => "el_class",
			"value" => "",
			"description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "amz-composer-plugins")
			),
		)
) );

// Process
vc_map( array(
	"name" => __("Process", "amz-composer-plugins"), //Title
	"base" => "process", //Shortcode name
	"class" => "",
	"icon" => "icon-pixel8es",
	"category" => 'By Composer', //category
	"params" => array(

		array(
			"type" => "dropdown",
			"heading" => __("Process Background", "amz-composer-plugins"),
			"param_name" => "style",
			"value" => array(__('Default', "amz-composer-plugins") => "default", 
							 __('Solid Color Background', "amz-composer-plugins") => "background",
							 __('Solid Grey Background', "amz-composer-plugins") => "background grey"),
			"description" => ''
			),

		array(
			"type" => "dropdown",
			"heading" => __("Process Inner Content", "amz-composer-plugins"),
			"param_name" => "text",
			"value" => array(__('Number', "amz-composer-plugins") => "number", 
							 __('Icon', "amz-composer-plugins") => "icon",
							 __('Text', "amz-composer-plugins") => "text"),
			"description" => ''
			),

		array(
			"type" => "textfield",
			"heading" => __("Process Number", "amz-composer-plugins"),
			"param_name" => "circle_text",
			"value" => "01",
			"description" => __("Enter Process Number.", "amz-composer-plugins"),
			"dependency" => array('element' => "text", 'value' => array('number'))
			),

		array(
			"type" => "icon",
			"heading" => __("Insert Icon", "amz-composer-plugins"),
			"param_name" => "icon_name",
			"value" => '',
			"description" => __("Insert an icon.", "amz-composer-plugins"),
			"dependency" => array('element' => "text", 'value' => array('icon'))
			),

		array(
			"type" => "textfield",
			"heading" => __("Process Title", "amz-composer-plugins"),
			"param_name" => "title",
			"admin_label" => true,
			"value" => "Title",
			"description" => __("Enter the Process title.", "amz-composer-plugins")
			),

		array(
			"type" => "dropdown",
			"heading" => __("Display Process Description?", "amz-composer-plugins"),
			"param_name" => "process_content",
			"value" => array(__('No', "amz-composer-plugins") => 'no', 
							 __('Yes', "amz-composer-plugins") => 'yes'),
			"description" => __("Do you want to display process description", "amz-composer-plugins")
			),

		array(
			"type" => "textarea",
			"class" => "",
			"heading" => __("Process description", "amz-composer-plugins"),
			"param_name" => "content", 
			"value" => '', 
			"description" => __("Enter the process description", "amz-composer-plugins"),
			"dependency" => array('element' => "process_content", 'value' => array('yes'))
			),

		array(
			"type" => "dropdown",
			"heading" => __("Process Arrow Style", "amz-composer-plugins"),
			"param_name" => "process_style",
			"value" => array(__('Inclined Arrow', "amz-composer-plugins") => "nav-style",
							 __('Straight Arrow', "amz-composer-plugins") => "nav-style straight",
							 __('Straight Arrow 2', "amz-composer-plugins") => "nav-style straight round",
							 __('none', "amz-composer-plugins") => "default"),
			"description" => ''
			),

		array(
			"type" => "dropdown",
			"heading" => __("Process Animation", "amz-composer-plugins"),
			"param_name" => "animate",
			"value" => array(__('No', "amz-composer-plugins") => "no", 
							 __('Yes', "amz-composer-plugins") => "yes"),
			"description" => __("Do you like to animate this element", "amz-composer-plugins"),
			"group"	=> __('Animate', 'amz-composer-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => __("Extra class name", "amz-composer-plugins"),
			"param_name" => "el_class",
			"value" => "",
			"description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "amz-composer-plugins")
			),
		)
) );

// Spacer
vc_map( array(
	"name" => __("Spacer", "amz-composer-plugins"), //Title
	"base" => "spacer", //Shortcode name
	"class" => "",
	"icon" => "icon-pixel8es",
	"category" => 'By Composer', //category
	"params" => array(

		array(
			"type" => "textfield",
			"heading" => __("Spacer", "amz-composer-plugins"),
			"param_name" => "height",
			"value" => "30px",
			"description" => __("Enter the Space in px (Ex: 30px)", "amz-composer-plugins")
			),

		)
	) );

// Contact
vc_map( array(
       "name" => __("Contact", "amz-composer-plugins"), //Title
       "base" => "contact", //Shortcode name
       "class" => "",
       "icon" => "icon-pixel8es",
       "category" => 'By Composer', //category
       "params" => array(
       	array(
       		"type" => "textfield",
       		"heading" => __("Email", "amz-composer-plugins"),
       		"param_name" => "mailto",
       		"value" => "",
       		"description" => __("Enter the email where you want receive from contact form", "amz-composer-plugins"),
       		),         
       	)
));

// Pie Chart
vc_map( array(
	"name" => __("Pie Chart", "amz-composer-plugins"), //Title
	"base" => "pie_chart", //Shortcode name
	"class" => "",
	"icon" => "icon-pixel8es",
	"category" => 'By Composer', //category
	"params" => array(

		array(
			"type" => "dropdown",
			"heading" => __("Pie Chart Style", "amz-composer-plugins"),
			"param_name" => "style",
			"value" => array(__('Style1', "amz-composer-plugins") => "style1",
							 __('Style2', "amz-composer-plugins") => "style2",
							 __('Style3', "amz-composer-plugins") => "style3",
							 __('Style4', "amz-composer-plugins") => "style2 style4",
							 __('Style5', "amz-composer-plugins") => "style2 style5",
							 __('Style6', "amz-composer-plugins") => "style2 style6",
							 __('Style7', "amz-composer-plugins") => "style3 style7",
							 __('Style8', "amz-composer-plugins") => "style3 style8"),
			"description" => ""),

		array(
			"type" => "dropdown",
			"heading" => __("Inner Content Style", "amz-composer-plugins"),
			"param_name" => "icon_percentage",
			"value" => array(__('Text', "amz-composer-plugins") => "text",
							 __('Icon', "amz-composer-plugins") => "icon"),
			"description" => ""),

    	array(
    		"type" => "icon",
    		"heading" => __("Insert Icon", "amz-composer-plugins"),
    		"param_name" => "icon_name",
    		"value" => '',
    		"description" => __("Choose icon if you to display icons before list", "amz-composer-plugins"),
			"dependency" => array('element' => "icon_percentage", 'value' => array('icon'))
    		),

		array(
			"type" => "textfield",
			"heading" => __("Icon Font Size", "amz-composer-plugins"),
			"param_name" => "icon_font_size",
			"value" => "",
			"description" => __("Enter the font size in px(Ex: 50px)", "amz-composer-plugins")
			),

		array(
			"type" => "textfield",
			"heading" => __("Percentage", "amz-composer-plugins"),
			"param_name" => "percentage",
			"value" => "90",
			"admin_label" => true,
			"description" => __("Enter the Percentage Value (Ex: 50).", "amz-composer-plugins")
			),

		array(
			"type" => "dropdown",
			"heading" => __("Custom Color", "amz-composer-plugins"),
			"param_name" => "custom_color",
			"value" => array(__('Default', "amz-composer-plugins") => "default",
				__('Custom', "amz-composer-plugins") => "custom"),
			"description" => __("Select text color.", "amz-composer-plugins"),
			"edit_field_class" => 'vc_col-xs-6'
			),

		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => __("Bar Color", "amz-composer-plugins"),
			"param_name" => "barcolor", 
			"value" => $theme_default, 
			"description" => __("Choose Bar color", "amz-composer-plugins"),
			"dependency" => array('element' => "custom_color", 'value' => array('custom')),
			"edit_field_class" => 'vc_col-xs-6'
			),

		array(
			"type" => "dropdown",
			"heading" => __("Line Cap", "amz-composer-plugins"),
			"param_name" => "linecap",
			"value" => array(__('Default', "amz-composer-plugins") => "butt",
							 __('Round', "amz-composer-plugins") => "round",
							 __('Square', "amz-composer-plugins") => "square"),
			"description" => ''
			),

		array(
			"type" => "textfield",
			"heading" => __("Animate Duration", "amz-composer-plugins"),
			"param_name" => "animate_duration",
			"value" => "2000",
			"description" => __("Enter the Animate Duration in ms (2000ms = 2s) Ex: 2000.", "amz-composer-plugins")
			),

		array(
			"type" => "textfield",
			"heading" => __("Line Width", "amz-composer-plugins"),
			"param_name" => "line_width",
			"value" => "6",
			"description" => __("Enter the Line Width.", "amz-composer-plugins")
			),

		array(
			"type" => "textfield",
			"heading" => __("Circle Size", "amz-composer-plugins"),
			"param_name" => "size",
			"value" => "200",
			"description" => __("Enter the Circle Size in px (EX: 200).", "amz-composer-plugins")
			),

		array(
			"type" => "dropdown",
			"heading" => __("Text Position", "amz-composer-plugins"),
			"param_name" => "text_position",
			"value" => array(__('Outside', "amz-composer-plugins") => "",
							 __('Inside', "amz-composer-plugins") => "inside"),
			"description" => __("Select text position.", "amz-composer-plugins"),
			"dependency" => array('element' => "icon_percentage", 'value' => array('text'))
			),

		array(
			"type" => "textfield",
			"heading" => __("Text", "amz-composer-plugins"),
			"param_name" => "text",
			"admin_label" => true,
			"value" => "",
			"description" => __("Enter the text.", "amz-composer-plugins")
			),

		array(
			"type" => "textfield",
			"heading" => __("Extra class name", "amz-composer-plugins"),
			"param_name" => "el_class",
			"value" => "",
			"description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "amz-composer-plugins")
			),
		)
) );

// Gradient Button
vc_map( array(
	"name" => __("Gradient Button", "amz-composer-plugins"), //Title
	"base" => "gradient_button", //Shortcode name
	"class" => "",
	"icon" => "icon-pixel8es",
	"category" => 'By Composer', //category
	"params" => array(

		array(
			"type" => "vc_link",
			"heading" => __("Button URL", "amz-composer-plugins"),
			"param_name" => "button_link",
			"value" => "",						
			"admin_label" => true,
			"description" => __("Enter the button link", "amz-composer-plugins")
			),

		array( 
			"type" => "dropdown",
			"heading" => __("Button Type", "amz-composer-plugins"),
			"param_name" => "button_type",
			"value" => array(__('Oval', "amz-composer-plugins") =>'oval',
							 __('Rectangle', "amz-composer-plugins") =>'rectangle'),						
			"admin_label" => true,
			"description" => ''
			),

		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => __("Button Gradient Color 1", "amz-composer-plugins"),
			"param_name" => "gradient1", 
			"value" => '',
			"description" => __("Choose button gradient text color 1 (or) Leave it empty to apply theme default", "amz-composer-plugins")
			),

		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => __("Button Gradient Color 2", "amz-composer-plugins"),
			"param_name" => "gradient2", 
			"value" => '',
			"description" => __("Choose button gradient text color 2 (or) Leave it empty to apply theme default", "amz-composer-plugins")
			),

		array(
			"type" => "dropdown",
			"heading" => __("Button Size", "amz-composer-plugins"),
			"param_name" => "button_size",
			"value" => array(__('Medium', "amz-composer-plugins") => "md", 
							 __('Small', "amz-composer-plugins") => "sm", 
							 __('Large', "amz-composer-plugins") => "lg"),
			"description" => __("Select button size?", "amz-composer-plugins")
			),

		array(
			"type" => "dropdown",
			"heading" => __("Custom Font Size?", "amz-composer-plugins"),
			"param_name" => "custom_size",
			"value" => array(__('No', "amz-composer-plugins") => "no",
							 __('Yes', "amz-composer-plugins") => "yes"),
			"description" => __("Do you want to custom font size?", "amz-composer-plugins")
			),

		array(
			"type" => "textfield",
			"heading" => __("Font Size", "amz-composer-plugins"),
			"param_name" => "font_size",
			"value" => "",
			"description" => __("Enter the font size in px(Ex: 50px)", "amz-composer-plugins"),
			"dependency" => array('element' => "custom_size", 'value' => array('yes'))
			),

		array(
			"type" => "textfield",
			"heading" => __("Custom Padding", "amz-composer-plugins"),
			"param_name" => "padding_custom",
			"value" => "",
			"description" => __("Enter the padding (in css format [top right bottom left]) in px(Ex: 50px 50px 50px 50px)", "amz-composer-plugins"),
			"dependency" => array('element' => "custom_size", 'value' => array('yes'))
			),

		array(
			"type" => "dropdown",
			"heading" => __("Button Align", "amz-composer-plugins"),
			"param_name" => "button_align",
			"value" => array(__('Left', "amz-composer-plugins") => "", 
							 __('Center', "amz-composer-plugins") => "button-center", 
							 __('Right', "amz-composer-plugins") => "button-right"),
			"description" => __("Select button Align?", "amz-composer-plugins")
			),		

		array(
			"type" => "icon",
			"heading" => __("Button Icon", "amz-composer-plugins"),
			"param_name" => "button_icon",
			"value" => '',
			"description" => __("choose button icon.", "amz-composer-plugins")
			),

		array(
			"type" => "dropdown",
			"heading" => __("Button Icon Align", "amz-composer-plugins"),
			"param_name" => "button_icon_align",
			"value" => array(__('Left', "amz-composer-plugins") => "front", 
							 __('Right', "amz-composer-plugins") => "back"), 
			"description" => __("Where you want to display Icon?", "amz-composer-plugins")
			),

		array(
			"type" => "dropdown",
			"heading" => __("Button Animation", "amz-composer-plugins"),
			"param_name" => "animate",
			"value" => array(__('No', "amz-composer-plugins") => "no", 
				__('Yes', "amz-composer-plugins") => "yes"),
			"description" => __("Do you like to animate this element", "amz-composer-plugins"),
			"group"	=> __('Animate', 'amz-composer-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Animation Transition", "amz-composer-plugins"),
			"param_name" => "transition",
			"value" => $animation,
			"description" => __("Choose animation transition.", "amz-composer-plugins"),
			"dependency" => array('element' => "animate", 'value' => array('yes')),
			"group"	=> __('Animate', 'amz-composer-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => __("Animation Duration", "amz-composer-plugins"),
			"param_name" => "duration",
			"value" => "",
			"description" => __("Enter the duration (Ex: 500ms or 1s)", "amz-composer-plugins"),
			"dependency" => array('element' => "animate", 'value' => array('yes')),
			"group"	=> __('Animate', 'amz-composer-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => __("Animation Delay", "amz-composer-plugins"),
			"param_name" => "delay",
			"value" => "",
			"description" => __("Enter the delay (Ex: 100ms or 1s)", "amz-composer-plugins"),
			"dependency" => array('element' => "animate", 'value' => array('yes')),
			"group"	=> __('Animate', 'amz-composer-plugins')
			),
		)
) );

// Portfolio
vc_map( array(
	"name" => __("Portfolio", "amz-composer-plugins"), //Title
	"base" => "portfolio", //Shortcode name
	"class" => "",
	"icon" => "icon-pixel8es",
	"category" => 'By Composer', //category
	"params" => array(

		array(
			"type" => "dropdown",
			"heading" => __("Portfolio Style", "amz-composer-plugins"),
			"param_name" => "portfolio_style",
			"admin_label" => true,
			"value" => array(__('Grid', "amz-composer-plugins") => "grid",							 
							 __('Masonry Defined Height', "amz-composer-plugins") => "masonry-fixed",
							 __('Masonry Auto Height', "amz-composer-plugins") => "masonry",),
			"description" => ''
			),

		array(
			"type" => "dropdown",
			"heading" => __("Append Content", "amz-composer-plugins"),
			"param_name" => "append_content",
			"value" => array(__('No', "amz-composer-plugins") => "no",  
					 __('Yes', "amz-composer-plugins") => "yes"),
			"description" => __('Add a content box in-between portfolio items', "amz-composer-plugins"),
			"group"	=> __('Append Content', 'amz-composer-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Append Content Alignment", "amz-composer-plugins"),
			"param_name" => "append_content_align",
			"value" => array(__('Align Left', "amz-composer-plugins") => "left", 
					 __('Align Center', "amz-composer-plugins") => "center", 
					 __('Align Right', "amz-composer-plugins") => "right"),
			"description" => __("Select alignment.", "amz-composer-plugins"),
			"dependency" => array('element' => "append_content", 'value' => array('yes')),
			"group"	=> __('Append Content', 'amz-composer-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => __("Append Content Position", "amz-composer-plugins"),
			"param_name" => "append_content_pos",
			"value" => "",
			"description" => __("Add a content box in-between portfolio items", "amz-composer-plugins"),
			"dependency" => array('element' => "append_content", 'value' => array('yes')),
			"group"	=> __('Append Content', 'amz-composer-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => __("Content Box Title", "amz-composer-plugins"),
			"param_name" => "portfolio_title",
			"value" => "Our Works",
			"description" => __("Enter the title.", "amz-composer-plugins"),
			"dependency" => array('element' => "append_content", 'value' => array('yes')),
			"group"	=> __('Append Content', 'amz-composer-plugins')
			),

		array(
			"type" => "textarea_html",
			"class" => "",
			"heading" => __("Content Box Description", "amz-composer-plugins"),
			"param_name" => "content", 
			"value" => '', 
			"description" => __("Enter the Content Box Description", "amz-composer-plugins"),
			"dependency" => array('element' => "append_content", 'value' => array('yes')),
			"group"	=> __('Append Content', 'amz-composer-plugins')
		),

		array(
			"type" => "vc_link",
			"heading" => __("Button URL", "amz-composer-plugins"),
			"param_name" => "button_link",
			"value" => "",
			"description" => __("Enter the button link", "amz-composer-plugins"),
			"dependency" => array('element' => "append_content", 'value' => array('yes')),
			"group"	=> __('Append Content', 'amz-composer-plugins')
		),

		array(
			"type" => "dropdown",
			"heading" => __("Insert Portfolio by", "amz-composer-plugins"),
			"param_name" => "insert_type",
			"admin_label" => true,
			"value" => array(
				__('Portfolio Posts', "amz-composer-plugins")    => "posts", 
				__('portfolio Id', "amz-composer-plugins")       => "id", 
				__('Portfolio Category', "amz-composer-plugins") => "category"
			),
			"description" => ''
		),

		array(
			"type" => "dropdown",
			"heading" => __("Filterable", "amz-composer-plugins"),
			"param_name" => "pix_filterable",
			"value" => array(__('Yes', "amz-composer-plugins") => "yes",  
							 __('No', "amz-composer-plugins") => "no"),
			"description" => __('Filter only displays if you choose carousel "No"', "amz-composer-plugins")
			),

		array(
			"type" => "dropdown",
			"heading" => __("Filter Style", "amz-composer-plugins"),
			"param_name" => "filter_style",
			"value" => array(__('Simple', "amz-composer-plugins") => "normal simple",
							 __('Normal', "amz-composer-plugins") => "normal",  
							 __('Dropdown', "amz-composer-plugins") => "dropdown"),
			"dependency" => array('element' => "pix_filterable", 'value' => 'yes'),
			"description" => ''
			),

		array(
			"type" => "textfield",
			"heading" => __("No. of Portfolio", "amz-composer-plugins"),
			"param_name" => "no_of_items",
			"value" => '6',
			"dependency" => array('element' => "insert_type", 'value' => 'posts'),
			"description" => __("Enter the number of Portfolio you want to display (only numbers), Enter -1 for all portfolio items", "amz-composer-plugins")
			),

		array(
			"type" => "dropdown",
			"heading" => __("Order By", "amz-composer-plugins"),
			"param_name" => "order_by",
			"value" => array( __('Date Modified', "amz-composer-plugins") => "modified",
							  __('Date', "amz-composer-plugins") => "date",  
							  __('Rand', "amz-composer-plugins") => "rand",
							  __('ID', "amz-composer-plugins") => "ID", 
							  __('Title', "amz-composer-plugins") => "title", 
							  __('Author', "amz-composer-plugins") => "author",
							  __('Name', "amz-composer-plugins") => "name",
							  __('Parent', "amz-composer-plugins") => "parent",							  
							  __('Menu Order', "amz-composer-plugins") => "menu_order",
							  __('None', "amz-composer-plugins") => "none"),
			"dependency" => array('element' => "insert_type", 'value' => 'posts'),
			"description" => __("Order posts By choosen order", "amz-composer-plugins")
			),

		array(
			"type" => "dropdown",
			"heading" => __("Order By", "amz-composer-plugins"),
			"param_name" => "order",
			"value" => array( __('descending order', "amz-composer-plugins") => "DESC", 
							  __('Ascending order', "amz-composer-plugins") => "ASC" ),
			"dependency" => array('element' => "insert_type", 'value' => 'posts'),
			"description" => ''
			),

		array(
			"type" => "textfield",
			"heading" => __("Portfolio ID", "amz-composer-plugins"),
			"param_name" => "portfolio_id",
			"value" => "",
			"dependency" => array('element' => "insert_type", 'value' => 'id'),
			"description" => __("Enter the portfolio ids seperated by commas (,). Example: 2,54,8", "amz-composer-plugins")
			),

		array(
			"type" => "textfield",
			"heading" => __("Portfolio Category", "amz-composer-plugins"),
			"param_name" => "portfolio_category",
			"value" => '',
			"dependency" => array('element' => "insert_type", 'value' => 'category'),
			"description" => __("Type the portfolio category slug. Example: design", "amz-composer-plugins")
			),

		array(
			"type" => "dropdown",
			"heading" => __("Sub Category Only", "amz-composer-plugins"),
			"param_name" => "show_sub_category_only",
			"value" => array(				
				__('No', "amz-composer-plugins")  => "no",
				__('Yes', "amz-composer-plugins") => "yes"
			),
			"dependency" => array('element' => "insert_type", 'value' => 'category'),
			"description" => ''
		),

		array(
			"type" => "textfield",
			"heading" => __("Exclude Portfolio", "amz-composer-plugins"),
			"param_name" => "exclude_portfolio",
			"value" => "",
			"description" => __("Enter the portfolio id you don't want to display. Divide id with comma (,).", "amz-composer-plugins")
			),

		array(
			"type" => "dropdown",
			"heading" => __("Number of Columns", "amz-composer-plugins"),
			"param_name" => "columns",
			"value" => array( __('4 Columns', "amz-composer-plugins") => "col4",  
							  __('3 Columns', "amz-composer-plugins") => "col3",
							  __('2 Columns', "amz-composer-plugins") => "col2"),
			"description" => ''
			),

		array(
			"type" => "dropdown",
			"heading" => __("Choose a style", "amz-composer-plugins"),
			"param_name" => "style",
			"value" => array( __('style 1', "amz-composer-plugins") => "style1",  
							  __('style 2', "amz-composer-plugins") => "style2",  
							  __('style 3', "amz-composer-plugins") => "style3",  
							  __('style 4', "amz-composer-plugins") => "style4",  
							  __('style 5', "amz-composer-plugins") => "style5",  
							  __('style 6', "amz-composer-plugins") => "style6"),
			"description" => __("This theme have 6 Portfolio styles, please choose one", "amz-composer-plugins")
			),

		array(
			"type" => "dropdown",
			"heading" => __("Choose the target for portfolio image?", "amz-composer-plugins"),
			"param_name" => "style2_click",
			"value" => array(__('Lightbox', "amz-composer-plugins") => "lightbox",
							 __('Single Portfolio Link', "amz-composer-plugins") => "single_port_link",  
							 __('Portfolio Button Link', "amz-composer-plugins") => "single_button_link"),
			"description" => '',
			"dependency" => array('element' => "style", 'value' => array('style2'))
			),

		array(
			"type" => "dropdown",
			"heading" => __("Show Like", "amz-composer-plugins"),
			"param_name" => "like",
			"value" => array(__('Yes', "amz-composer-plugins") => "yes",  
							 __('No', "amz-composer-plugins") => "no"),
			"description" => __('Do you like to display "Like" in portfolio?', "amz-composer-plugins"),
			"dependency" => array('element' => "style", 'value' => array('style2'))
			),

		array(
			"type" => "dropdown",
			"heading" => __("Grayscale", "amz-composer-plugins"),
			"param_name" => "grayscale",
			"value" => array(__('No', "amz-composer-plugins") => "no",  
							 __('Yes', "amz-composer-plugins") => "yes"),
			"description" => __('Select "Yes" do you want black and white Image.', "amz-composer-plugins")
			),

		array(
			"type" => "dropdown",
			"heading" => __("Enable Space in columns?", "amz-composer-plugins"),
			"param_name" => "margin",
			"value" => array(__('No', "amz-composer-plugins") => "",  
							 __('Yes', "amz-composer-plugins") => "margin-yes"),
			"description" => __('Choose Yes to enable Space ( margin inbetween columns )', "amz-composer-plugins"),
			"dependency" => array('element' => "slider", 'value' => array('no'))
			),

		array(
			"type" => "dropdown",
			"heading" => __("Portfolio Hover color", "amz-composer-plugins"),
			"param_name" => "port_hover_color",
			"value" => array( __('Default', "amz-composer-plugins") => "",
							  __('White', "amz-composer-plugins") => " port-bg-white",
							  __('Color', "amz-composer-plugins") => " port-bg-color"),
			"description" => ''
			),

		array(
			"type" => "dropdown",
			"heading" => __("HTML Tag for portfolio Name", "amz-composer-plugins"),
			"param_name" => "title_tag",
			"value" => array('h2','h3','h4','h5','h6','h1', 'p'),
			"description" => __("Choose which html tag you want use for portfolio name.", "amz-composer-plugins")
			),

		array(
			"type" => "textfield",
			"heading" => __("Title Font Size", "amz-composer-plugins"),
			"param_name" => "title_font_size",
			"value" => "",
			"description" => __("Enter the font size in px(Ex: 18px). Leave it empty to apply theme default.", "amz-composer-plugins"),
			),

		array(
			"type" => "textfield",
			"heading" => __("Category Font Size", "amz-composer-plugins"),
			"param_name" => "cat_font_size",
			"value" => "",
			"description" => __("Enter the font size in px(Ex: 14px). Leave it empty to apply theme default.", "amz-composer-plugins"),
			),

		array(
			"type" => "dropdown",
			"heading" => __("Do you need light box for portfolio image", "amz-composer-plugins"),
			"param_name" => "lightbox",
			"value" => array(__('Yes', "amz-composer-plugins") => "yes",  
							 __('No', "amz-composer-plugins") => "no"),
			"description" => ''
			),

		array(
			"type" => "dropdown",
			"heading" => __("Choose the link for portfolio page?", "amz-composer-plugins"),
			"param_name" => "on_click",
			"value" => array(__('Single Portfolio Link', "amz-composer-plugins") => "single_port_link",  
							 __('Button Link', "amz-composer-plugins") => "single_button_link",  
							 __('None', "amz-composer-plugins") => "none"),
			"description" => ''
			),

		array(
			"type" => "dropdown",
			"heading" => __("Portfolio Page Link Target?", "amz-composer-plugins"),
			"param_name" => "link_target",
			"value" => array(__('Open Same Page', "amz-composer-plugins") => "_self",  
							 __('Open New Tab', "amz-composer-plugins") => "_blank"),
			"description" => ''
			),

		array(
			"type" => "dropdown",
			"heading" => __("Portfolio Search", "amz-composer-plugins"),
			"param_name" => "show_search",
			"value" => array(
				esc_html__('No', "amz-composer-plugins") => "no",  
				esc_html__('Yes', "amz-composer-plugins") => "yes"
			),
			"description" => ''
		),

		array(
			"type" => "dropdown",
			"heading" => __("Pagination", "amz-composer-plugins"),
			"param_name" => "pagination",
			"value" => array(
				__('None', "amz-composer-plugins")      => "none", 
				__('Load More', "amz-composer-plugins") => "load_more", 
				__('Autoload', "amz-composer-plugins")  => "autoload", 
				__('Number', "amz-composer-plugins")    => "number", 
				__('Text', "amz-composer-plugins")      => "text"
			),
			"description" => ''
		),

		array(
			"type" => "textfield",
			"heading" => __("Loadmore Text", "amz-composer-plugins"),
			"param_name" => "loadmore_text",
			"value" => esc_html__( "Load More", "amz-composer-plugins" ),
			"description" => __("Type the load more text", "amz-composer-plugins"),
			"dependency" => array('element' => "pagination", 'value' => array('load_more'))
		),

		array(
			"type" => "textfield",
			"heading" => __("All Portfolio Loaded Text", "amz-composer-plugins"),
			"param_name" => "allpost_loaded_text",
			"value" => esc_html__( "All Portfolio Loaded", "amz-composer-plugins" ),
			"description" => __("Type the all portfolio loaded text", "amz-composer-plugins"),
			"dependency" => array('element' => "pagination", 'value' => array('load_more'))
		),

		array(
			"type" => "dropdown",
			"heading" => __("Enable carousel?", "amz-composer-plugins"),
			"param_name" => "slider",
			"value" => array(__('No', "amz-composer-plugins") => "no",  
							 __('Yes', "amz-composer-plugins") => "yes"),
			"description" => __("Do you like to display Portfolio in carousel?", "amz-composer-plugins"),
			"group"	=> __('Carousel', 'amz-composer-plugins')
			),  

		array(
			"type" => "dropdown",
			"heading" => __("Enable Autoplay?", "amz-composer-plugins"),
			"param_name" => "autoplay",
			"value" => array(__('No', "amz-composer-plugins") => "false",  
							 __('Yes', "amz-composer-plugins") => "true"),
			"description" => __("Do you want to enable autoslide.", "amz-composer-plugins"),
			"dependency" => array('element' => "slider", 'value' => array('yes')),
			"group"	=> __('Carousel', 'amz-composer-plugins')
			),  

		array(
			"type" => "textfield",
			"heading" => __("Slide Speed", "amz-composer-plugins"),
			"param_name" => "slide_speed",
			"value" => "5000",
			"description" => __("Enter the Value in milesecond (Ex: 5000)", "amz-composer-plugins"),
			"dependency" => array('element' => "autoplay", 'value' => array('true')),
			"group"	=> __('Carousel', 'amz-composer-plugins')
			),   

		array(
			"type" => "textfield",
			"heading" => __("Slide Margin", "amz-composer-plugins"),
			"param_name" => "slide_margin",
			"value" => "30",
			"description" => __("Enter the Value in px (Ex: 30)", "amz-composer-plugins"),
			"dependency" => array('element' => "slider", 'value' => array('yes')),
			"group"	=> __('Carousel', 'amz-composer-plugins')
			),      

		array(
			"type" => "dropdown",
			"heading" => __("Arrow", "amz-composer-plugins"),
			"param_name" => "slide_arrow",
			"value" => array( __('Yes', "amz-composer-plugins") => "true",
				__('No', "amz-composer-plugins") => "false"),
			"description" => __("select the arrow if you want", "amz-composer-plugins"),
			"dependency" => array('element' => "slider", 'value' => array('yes')),
			"group"	=> __('Carousel', 'amz-composer-plugins')
			),       

		array(
			"type" => "dropdown",
			"heading" => __("Arrow Style", "amz-composer-plugins"),
			"param_name" => "arrow_type",
			"value" => array( __('Default', "amz-composer-plugins") => "",
							 __('Arrow Top Right', "amz-composer-plugins") => "arrow-style2"),
			"description" => __("Do you like to show arrow navigation to move carousel.", "amz-composer-plugins"),
			"dependency" => array('element' => "slide_arrow", 'value' => array('true')),
			"group"	=> __('Carousel', 'amz-composer-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Pagination", "amz-composer-plugins"),
			"param_name" => "slider_pagination",
			"value" => array( __('Yes', "amz-composer-plugins") => "true",
							  __('No', "amz-composer-plugins") => "false"),
			"description" => __("Do you want to display carousel dot nav?", "amz-composer-plugins"),
			"dependency" => array('element' => "slider", 'value' => array('yes')),
			"group"	=> __('Carousel', 'amz-composer-plugins')
			),  

		array(
			"type" => "dropdown",
			"heading" => __("Loop", "amz-composer-plugins"),
			"param_name" => "loop",
			"value" => array( __('No', "amz-composer-plugins") => "false",
							  __('Yes', "amz-composer-plugins") => "true"),
			"description" => 'Infinity loop. Duplicate last and first items to get loop illusion.',
			"dependency" => array('element' => "slider", 'value' => array('yes')),
			"group"	=> __('Carousel', 'amz-composer-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Stop On Hover", "amz-composer-plugins"),
			"param_name" => "stop_on_hover",
			"value" => array( __('Yes', "amz-composer-plugins") => "true",
				__('No', "amz-composer-plugins") => "false"),
			"description" => __("Stop On Hover", "amz-composer-plugins"),
			"dependency" => array('element' => "slider", 'value' => array('yes')),
			"group"	=> __('Carousel', 'amz-composer-plugins')
			), 

		array(
			"type" => "dropdown",
			"heading" => __("Do you like to move carousel Mouse Drag?", "amz-composer-plugins"),
			"param_name" => "mouse_drag",
			"value" => array( __('Yes', "amz-composer-plugins") => "true",
				__('No', "amz-composer-plugins") => "false"),
			"description" => __("Do you like to move carousel Mouse Drag?", "amz-composer-plugins"),
			"dependency" => array('element' => "slider", 'value' => array('yes')),
			"group"	=> __('Carousel', 'amz-composer-plugins')
			), 

		array(
			"type" => "dropdown",
			"heading" => __("Touch Drag", "amz-composer-plugins"),
			"param_name" => "touch_drag",
			"value" => array( __('Yes', "amz-composer-plugins") => "true",
				__('No', "amz-composer-plugins") => "false"),
			"description" => __("Do you like to move carousel Touch Drag (in touch devices)?", "amz-composer-plugins"),
			"dependency" => array('element' => "slider", 'value' => array('yes')),
			"group"	=> __('Carousel', 'amz-composer-plugins')
			),   
		)
) );

// Pricing Tables
vc_map( array(
	"name" => __("Pricing Tables", "amz-composer-plugins"), //Title
	"base" => "pricing_tables", //Shortcode name
	"class" => "",
	"icon" => "icon-pixel8es",
	"category" => 'By Composer', //category
	"params" => array(

		array(
			"type" => "dropdown",
			"heading" => __("Choose a style", "amz-composer-plugins"),
			"param_name" => "style",
			"value" => array( __('Style 1', "amz-composer-plugins") => "style1",  
							  __('Style 2', "amz-composer-plugins") => "style2",
							  __('Style 3', "amz-composer-plugins") => "style3",
							  __('Style 4', "amz-composer-plugins") => "style4",
							  __('Style 5', "amz-composer-plugins") => "style5",
							  __('Style 6', "amz-composer-plugins") => "style6",
							  __('Style 7', "amz-composer-plugins") => "style7",
							  __('Style 8', "amz-composer-plugins") => "style8",
							  __('Style 9', "amz-composer-plugins") => "style9",
							  __('Style 10', "amz-composer-plugins") => "style10"),
			"description" => __("This theme have 2 pricing tables styles, please choose one", "amz-composer-plugins")
			),

		array(
			"type" => "attach_image",
			"heading" => __("Plan Name Background Image", "amz-composer-plugins"),
			"param_name" => "pricing_table_img",
			"value" => "",
			"dependency" => array('element' => "style", 'value' => array('style7')),
			"description" => __("Select a image if you want to display image behind plan name.", "amz-composer-plugins")
			),

		array(
			"type" => "dropdown",
			"heading" => __("Title Tag", "amz-composer-plugins"),
			"param_name" => "title_tag",
			"value" => array('h2','h1','h3','h4','h5','h6'),
			"description" => __("Select title tag.", "amz-composer-plugins")
			),

		array(
			"type" => "textfield",
			"heading" => __("Title", "amz-composer-plugins"),
			"param_name" => "title",
			"admin_label" => true,
			"value" => "Title",
			"description" => __("Enter the title.", "amz-composer-plugins"),
			),

		array(
			"type" => "textfield",
			"heading" => __("Currency Symbol", "amz-composer-plugins"),
			"param_name" => "currency",
			"value" => '$',
			"description" => __("Enter the symbol.", "amz-composer-plugins"),
			"edit_field_class" => 'vc_col-xs-4'
			),

		array(
			"type" => "textfield",
			"heading" => __("price", "amz-composer-plugins"),
			"param_name" => "price",
			"value" => '99.99',
			"description" => __("Enter the price.", "amz-composer-plugins"),
			"edit_field_class" => 'vc_col-xs-4'
			),

		array(
			"type" => "textfield",
			"heading" => __("period", "amz-composer-plugins"),
			"param_name" => "period",
			"value" => 'per month',
			"description" => __("Enter the period.", "amz-composer-plugins"),
			"edit_field_class" => 'vc_col-xs-4'
			),

		array(
			"type" => "dropdown",
			"heading" => __("Currency Symbol Position", "amz-composer-plugins"),
			"param_name" => "currency_align",
			"value" => array( __('Before Price', "amz-composer-plugins") => "before",  
							  __('After Price', "amz-composer-plugins") => "after"),
			"description" => __("Select Currency Position", "amz-composer-plugins")
			),

		array(
			"type" => "textarea_html",
			"class" => "",
			"heading" => __("Pricing Content", "amz-composer-plugins"),
			"param_name" => "content", //Shortcode_attr name
			"value" => '<ul><li>3 Wordpress</li><li>Single usage</li><li>One User</li><li>5 GB storage</li><li>6 months free Support</li></ul>', //Default Red color
			"description" => __("Enter the Icon Box Content", "amz-composer-plugins")
			),

		array(
			"type" => "dropdown",
			"heading" => __("Highlight", "amz-composer-plugins"),
			"param_name" => "highlight_box",
			"value" => array(__('No', "amz-composer-plugins") => "no", 
							 __('Yes', "amz-composer-plugins") => "yes"),
			"description" => __("Do you want to highlight the box?", "amz-composer-plugins")
			),

		array(
			"type" => "dropdown",
			"heading" => __("Display Button?", "amz-composer-plugins"),
			"param_name" => "display_button",
			"value" => array(__('Yes', "amz-composer-plugins") => "yes", 
				__('No', "amz-composer-plugins") => "no"),
			"description" => __("Do you want to display button?", "amz-composer-plugins"),
			"group"	=> __('Button', 'amz-composer-plugins')
			),

		array(
			"type" => "vc_link",
			"heading" => __("Button URL", "amz-composer-plugins"),
			"param_name" => "button_link",
			"value" => "",
			"description" => __("Enter the button link", "amz-composer-plugins"),
			"dependency" => array('element' => "display_button", 'value' => array('yes')),
			"group"	=> __('Button', 'amz-composer-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Button Style", "amz-composer-plugins"),
			"param_name" => "button_style",
			"value" => array(__('Outline', "amz-composer-plugins") => "outline", 
				__('Solid', "amz-composer-plugins") => "solid", 
				__('Default', "amz-composer-plugins") => "simple"),
			"description" => __("Select button style?", "amz-composer-plugins"),
			"dependency" => array('element' => "display_button", 'value' => array('yes')),
			"group"	=> __('Button', 'amz-composer-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Button Hover Style", "amz-composer-plugins"),
			"param_name" => "button_hover_style",
			"value" => array(__('Outline', "amz-composer-plugins") => "outline", 
							 __('Solid', "amz-composer-plugins") => "solid"),
			"description" => __("Select button hover style", "amz-composer-plugins"),
			"dependency" => array('element' => "display_button", 'value' => array('yes')),
			"group"	=> __('Button', 'amz-composer-plugins')
			),

		array( 
			"type" => "dropdown",
			"heading" => __("Button Type", "amz-composer-plugins"),
			"param_name" => "button_type",
			"value" => array(__('Oval', "amz-composer-plugins") =>'oval',
							 __('Rectangle', "amz-composer-plugins") =>'rectangle'),
			"description" => '',
			"dependency" => array('element' => "display_button", 'value' => array('yes')),
			"group"	=> __('Button', 'amz-composer-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Button Color", "amz-composer-plugins"),
			"param_name" => "button_color",
			"value" => array(__('Theme default color', "amz-composer-plugins") => "color", 
							 __('black', "amz-composer-plugins") => "no-color",
							 __('white', "amz-composer-plugins") => "white"), 
			"description" => __("Please choose button color", "amz-composer-plugins"),
			"dependency" => array('element' => "display_button", 'value' => array('yes')),
			"group"	=> __('Button', 'amz-composer-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Button Hover Color", "amz-composer-plugins"),
			"param_name" => "button_hover_color",
			"value" => array(__('Theme default color', "amz-composer-plugins") => "color", 
							 __('black', "amz-composer-plugins") => "no-color",
							 __('white', "amz-composer-plugins") => "white"), 
			"description" => __("Please choose button hover color", "amz-composer-plugins"),
			"dependency" => array('element' => "display_button", 'value' => array('yes')),
			"group"	=> __('Button', 'amz-composer-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Button Size", "amz-composer-plugins"),
			"param_name" => "button_size",
			"value" => array(__('Medium', "amz-composer-plugins") => "md", 
				__('Small', "amz-composer-plugins") => "sm", 
				__('Large', "amz-composer-plugins") => "lg"),
			"description" => __("Select button size?", "amz-composer-plugins"),
			"dependency" => array('element' => "display_button", 'value' => array('yes')),
			"group"	=> __('Button', 'amz-composer-plugins')
			),

		array(
			"type" => "icon",
			"class" => "",
			"heading" => __("Button Icon", "amz-composer-plugins"),
			"param_name" => "button_icon",
			"value" => '',
			"description" => __("Insert an icon for button.", "amz-composer-plugins"),
			"dependency" => array('element' => "display_button", 'value' => array('yes')),
			"group"	=> __('Button', 'amz-composer-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Button Icon Align", "amz-composer-plugins"),
			"param_name" => "button_icon_align",
			"value" => array(__('Left', "amz-composer-plugins") => "front", 
							 __('Right', "amz-composer-plugins") => "back"), 
			"description" => __("Where you want to display Icon?", "amz-composer-plugins"),
			"group"	=> __('Button', 'amz-composer-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Pricing Tables Animation", "amz-composer-plugins"),
			"param_name" => "animate",
			"value" => array(__('No', "amz-composer-plugins") => "no", 
				__('Yes', "amz-composer-plugins") => "yes"),
			"description" => __("Do you like to animate this element", "amz-composer-plugins"),
			"group"	=> __('Animate', 'amz-composer-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Animation Transition", "amz-composer-plugins"),

			"param_name" => "transition",
			"value" => $animation,
			"description" => __("Choose Animation Transition.", "amz-composer-plugins"),
			"dependency" => array('element' => "animate", 'value' => array('yes')),
			"group"	=> __('Animate', 'amz-composer-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => __("Animation Duration", "amz-composer-plugins"),
			"param_name" => "duration",
			"value" => "",
			"description" => __("Enter the Duration (Ex: 500ms or 1s)", "amz-composer-plugins"),
			"dependency" => array('element' => "animate", 'value' => array('yes')),
			"group"	=> __('Animate', 'amz-composer-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => __("Animation Delay", "amz-composer-plugins"),
			"param_name" => "delay",
			"value" => "",
			"description" => __("Enter the Delay (Ex: 100ms or 1s)", "amz-composer-plugins"),
			"dependency" => array('element' => "animate", 'value' => array('yes')),
			"group"	=> __('Animate', 'amz-composer-plugins')
			)
		)
) );


//Social 
vc_map( array(
	"name" => __("Social Icons", "amz-composer-plugins"), //Title
	"base" => "social", //Shortcode name
	"class" => "",
	"icon" => "icon-pixel8es",
	"category" => 'By Composer', //category
	"params" => array(

		array(
			"type" => "dropdown",
			"heading" => __("Choose a style", "amz-composer-plugins"),
			"param_name" => "size",
			"admin_label" => true,
			"value" => array( __('Normal', "amz-composer-plugins") => "normal",  
							  __('Circle', "amz-composer-plugins") => "full-width",  
							  __('Custom Styles', "amz-composer-plugins") => "custom"),
			"description" => __("Choose a style.", "amz-composer-plugins")
			),

		array(
			"type" => "dropdown",
			"heading" => __("Alignment", "amz-composer-plugins"),
			"param_name" => "align",
			"value" => array(__('Align Left', "amz-composer-plugins") => "left", 
							 __('Align Center', "amz-composer-plugins") => "center", 
							 __('Align Right', "amz-composer-plugins") => "right"),
			"description" => __("Select alignment.", "amz-composer-plugins")
			),

		array(
			"type" => "dropdown",
			"heading" => __("Choose a style Color", "amz-composer-plugins"),
			"param_name" => "style",
			"admin_label" => true,
			"value" => array( __('Black', "amz-composer-plugins") => "style1",  
							  __('Solid Color', "amz-composer-plugins") => "style2",
							  __('Outline Color', "amz-composer-plugins") => "style3"),
			"dependency" => array('element' => "size", 'value' => array('full-width')),
			"description" => __("Choose a style Color", "amz-composer-plugins")
			),

		array(
			"type" => "textfield",
			"heading" => __("Icon Font Size", "amz-composer-plugins"),
			"param_name" => "font_size",
			"value" => "",
			"description" => __("Enter the Custom Icon Font Size in px (Ex : 30px). Leave it empty to apply theme default.", "amz-composer-plugins"),
			"dependency" => array('element' => "size", 'value' => array('custom'))
			),

		array(
			'type' => 'textfield',
			'heading' => __( 'Width', 'amz-composer-plugins' ),
			'param_name' => 'width',
			'value' => '',
			'description' => __( 'Enter the width in (px)  Example: 70px.', 'amz-composer-plugins' ),
			"dependency" => array('element' => "size", 'value' => array('custom')),
			"edit_field_class" => 'vc_col-xs-4'
		),

		array(
			'type' => 'textfield',
			'heading' => __( 'Height', 'amz-composer-plugins' ),
			'param_name' => 'height',
			'value' => '',
			'description' => __( 'Enter the height in (px)  Example: 70px.', 'amz-composer-plugins' ),
			"dependency" => array('element' => "size", 'value' => array('custom')),
			"edit_field_class" => 'vc_col-xs-4'
		),

		array(
			'type' => 'textfield',
			'heading' => __( 'Line Height', 'amz-composer-plugins' ),
			'param_name' => 'line_height',
			'value' => '',
			'description' => __( 'Enter the line-height in (px)  Example: 70px.', 'amz-composer-plugins' ),
			"dependency" => array('element' => "size", 'value' => array('custom')),
			"edit_field_class" => 'vc_col-xs-4'
		),

		array(
			'type' => 'textfield',
			'heading' => __( 'Border Radius', 'amz-composer-plugins' ),
			'param_name' => 'border_radius',
			'value' => '',
			'description' => __( 'Enter the border radius in (px)  Example: 70px.', 'amz-composer-plugins' ),
			"dependency" => array('element' => "size", 'value' => array('custom'))
		),

		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => __("Custom Background Color", "amz-composer-plugins"),
			"param_name" => "bg_color", 
			"value" => '', 
			"description" => __("Choose custom background color", "amz-composer-plugins"),
			"dependency" => array('element' => "size", 'value' => array('custom'))
			),

		array(
			'type' => 'textfield',
			'heading' => __( 'Custom Border width', 'amz-composer-plugins' ),
			'param_name' => 'border_width',
			'value' => '',
			'description' => __( 'Enter the border width in (px)  Example: 1px.', 'amz-composer-plugins' ),
			"dependency" => array('element' => "size", 'value' => array('custom')),
			"edit_field_class" => 'vc_col-xs-4'
		),

		array(
			"type" => "dropdown",
			"heading" => __("Custom Border Style", "amz-composer-plugins"),
			"param_name" => "border_style",
			"value" => array(__('None', "amz-composer-plugins") => "none", 
							 __('Solid', "amz-composer-plugins") => "solid", 
							 __('Dotted', "amz-composer-plugins") => "dotted", 
							 __('Dashed', "amz-composer-plugins") => "dashed", 
							 __('Double', "amz-composer-plugins") => "double", 
							 __('Groove', "amz-composer-plugins") => "groove", 
							 __('Ridge', "amz-composer-plugins") => "ridge", 
							 __('Inset', "amz-composer-plugins") => "inset", 
							 __('Outset', "amz-composer-plugins") => "outset"),
			"description" => __("Select custom border style?", "amz-composer-plugins"),
			"dependency" => array('element' => "size", 'value' => array('custom')),
			"edit_field_class" => 'vc_col-xs-4'
			),

		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => __("Custom Border Color", "amz-composer-plugins"),
			"param_name" => "border_color", 
			"value" => '', 
			"description" => __("Choose custom border color", "amz-composer-plugins"),
			"dependency" => array('element' => "size", 'value' => array('custom')),
			"edit_field_class" => 'vc_col-xs-4'
			),

		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => __("Custom Color", "amz-composer-plugins"),
			"param_name" => "color", 
			"value" => '', 
			"description" => __("Choose custom color", "amz-composer-plugins"),
			"dependency" => array('element' => "size", 'value' => array('custom'))
			),

		array(
			"type" => "textfield",
			"heading" => __("Margin", "amz-composer-plugins"),
			"param_name" => "margin",
			"value" => "",
			"description" => __("Value should be in css format top right bottom left in px (Ex: -10px 20px 30px 40px), Leave it empty to apply theme default.", "amz-composer-plugins")
			),

		array(
			"type" => "textfield",
			"heading" => __("Facebook Url", "amz-composer-plugins"),
			"param_name" => "facebook",
			"value" => "",
			"description" => __("Enter the facebook Url", "amz-composer-plugins")
			),

		array(
			"type" => "textfield",
			"heading" => __("Twitter Url", "amz-composer-plugins"),
			"param_name" => "twitter",
			"value" => "",
			"description" => __("Enter the twitter Url", "amz-composer-plugins")
			),

		array(
			"type" => "textfield",
			"heading" => __("GooglePlus Url", "amz-composer-plugins"),
			"param_name" => "gplus",
			"value" => "",
			"description" => __("Enter the gplus Url", "amz-composer-plugins")
			),

		array(
			"type" => "textfield",
			"heading" => __("LinkedIn Url", "amz-composer-plugins"),
			"param_name" => "linkedin",
			"value" => "",
			"description" => __("Enter the linkedin Url", "amz-composer-plugins")
			),

		array(
			"type" => "textfield",
			"heading" => __("Dribbble Url", "amz-composer-plugins"),
			"param_name" => "dribble",
			"value" => "",
			"description" => __("Enter the dribbble Url", "amz-composer-plugins")
			),

		array(
			"type" => "textfield",
			"heading" => __("Flickr Url", "amz-composer-plugins"),
			"param_name" => "flickr",
			"value" => "",
			"description" => __("Enter the flickr Url", "amz-composer-plugins")
			),

		array(
			"type" => "textfield",
			"heading" => __("Pinterest Url", "amz-composer-plugins"),
			"param_name" => "pinterest",
			"value" => "",
			"description" => __("Enter the pinterest Url", "amz-composer-plugins")
			),

		array(
			"type" => "textfield",
			"heading" => __("Tumblr Url", "amz-composer-plugins"),
			"param_name" => "tumblr",
			"value" => "",
			"description" => __("Enter the tumblr Url", "amz-composer-plugins")
			),

		array(
			"type" => "textfield",
			"heading" => __("Instagrem Url", "amz-composer-plugins"),
			"param_name" => "instagrem",
			"value" => "",
			"description" => __("Enter the instagrem Url", "amz-composer-plugins")
			),

		array(
			"type" => "textfield",
			"heading" => __("RSS Url", "amz-composer-plugins"),
			"param_name" => "rss",
			"value" => "",
			"description" => __("Enter the rss Url", "amz-composer-plugins")
			),
		)
));


//Register "container" content element. It will hold all your inner (child) content elements
vc_map( array(
	"name" => __("Lists", "amz-composer-plugins"),
	"base" => "list",
	"icon" => "icon-pixel8es",
	"category" => 'By Composer', //category
    "as_parent" => array('only' => 'li'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
    "content_element" => true,
    "show_settings_on_create" => false,
    /*"params" => array(
        // add params same as with any other content element
    	array(
    		"type" => "dropdown",
    		"heading" => __("Style", "amz-composer-plugins"),
    		"param_name" => "style",
    		"value" => array( __('default', "amz-composer-plugins") => "default",
    			__('style1', "amz-composer-plugins") => "style1",
    			__('style2', "amz-composer-plugins") => "style2"),
    		"description" => __("Choose list style", "amz-composer-plugins"),
    		)
    	),*/
    "js_view" => 'VcColumnView'
    ) );
vc_map( array(
	"name" => __("List Item", "amz-composer-plugins"),
	"base" => "li",
	"icon" => "icon-pixel8es",
	"category" => 'By Composer', //category
	"content_element" => true,
    "as_child" => array('only' => 'list'), // Use only|except attributes to limit parent (separate multiple values with comma)
    "params" => array(
        // add params same as with any other content element

    	array(
    		"type" => "textarea",
    		"holder" => "li",
    		"class" => "",
    		"heading" => __("Content", "amz-composer-plugins"),
    		"param_name" => "content",
    		"value" => "Enter your list item text here",
    		"description" => __("Enter your list item content.", "amz-composer-plugins")
    		),

		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => __("Content Color", "amz-composer-plugins"),
			"param_name" => "content_color", 
			"value" => '',
			"description" => __("Choose Content Color (or) Leave it empty to apply theme default", "amz-composer-plugins")
			),

		array(
			"type" => "textfield",
			"heading" => __("Content Size", "amz-composer-plugins"),
			"param_name" => "content_size",
			"value" => "",
			"description" => __("Enter the font size in px(Ex: 50px)", "amz-composer-plugins")
			),

		array(
			"type" => "textfield",
			"heading" => __("Content Margin", "amz-composer-plugins"),
			"param_name" => "content_margin",
			"value" => "",
			"description" => __("Value should be in css format top right bottom left in px (Ex: -10px 20px 30px 40px), Leave it empty to apply theme default.", "amz-composer-plugins")
			),

		array(
			"type" => "textfield",
			"heading" => __("Content Line Height in px", "amz-composer-plugins"),
			"param_name" => "content_line_height",
			"value" => "",
			"description" => __("Enter Content Line Height in Pixels or Integer Number (eg: 50px or 1.2)", "amz-composer-plugins")
			),

		array(
			"type" => "textfield",
			"heading" => __("Content Letter Spacing in px", "amz-composer-plugins"),
			"param_name" => "content_letter_spacing",
			"value" => "",
			"description" => __("Enter Content Letter Spacing in Pixels.( eg: 50px )", "amz-composer-plugins")
			),

    	array(
    		"type" => "icon",
    		"heading" => __("Insert Icon", "amz-composer-plugins"),
    		"param_name" => "icon_name",
    		"value" => '',
    		"description" => __("Choose icon if you to display icons before list", "amz-composer-plugins"),
			"group"	=> __('Icon', 'amz-composer-plugins')
    		),

    	array(
    		"type" => "dropdown",
    		"heading" => __("Icon Color", "amz-composer-plugins"),
    		"param_name" => "icon_color",
    		"value" => array(__('black', "amz-composer-plugins") => "",  
    			__('Theme Primary Color', "amz-composer-plugins") => "color",
    			__('custom color', "amz-composer-plugins") => "custom"),
    		"description" => '',
			"group"	=> __('Icon', 'amz-composer-plugins')
    		),

    	array(
    		"type" => "colorpicker",
    		"class" => "",
    		"heading" => __("Icon Custom Color", "amz-composer-plugins"),
    		"param_name" => "user_icon_color",
    		"value" => '', 
    		"description" => __("Choose Icon Custom color", "amz-composer-plugins"),
    		"dependency" => array('element' => "icon_color", 'value' => array('custom')),
			"group"	=> __('Icon', 'amz-composer-plugins')
    		),

		array(
			"type" => "textfield",
			"heading" => __("Icon Size", "amz-composer-plugins"),
			"param_name" => "icon_size",
			"value" => "",
			"description" => __("Enter the font size in px(Ex: 50px)", "amz-composer-plugins"),
			"group"	=> __('Icon', 'amz-composer-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => __("Icon Margin", "amz-composer-plugins"),
			"param_name" => "icon_margin",
			"value" => "",
			"description" => __("Value should be in css format top right bottom left in px (Ex: -10px 20px 30px 40px), Leave it empty to apply theme default.", "amz-composer-plugins"),
			"group"	=> __('Icon', 'amz-composer-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => __("Icon Line Height in px", "amz-composer-plugins"),
			"param_name" => "icon_line_height",
			"value" => "",
			"description" => __("Enter Icon Line Height in Pixels or Integer Number (eg: 50px or 1.2)", "amz-composer-plugins"),
			"group"	=> __('Icon', 'amz-composer-plugins')
			),
    	)
) );


//Your "container" content element should extend WPBakeryShortCodesContainer class to inherit all required functionality
if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
	class WPBakeryShortCode_list extends WPBakeryShortCodesContainer {
	}
}
if ( class_exists( 'WPBakeryShortCode' ) ) {
	class WPBakeryShortCode_li extends WPBakeryShortCode {
	}
}


//Register "container" content element. It will hold all your inner (child) content elements
vc_map( array(
	"name" => __("Hover Box", "amz-composer-plugins"),
	"base" => "hover_box",
	"icon" => "icon-pixel8es",
	"category" => 'By Composer', //category
    "as_parent" => array('only' => 'hover_elements'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
    "content_element" => true,
    "show_settings_on_create" => false,
    "js_view" => 'VcColumnView',
    "params" => array(
    	array(
			"type" => "attach_image",
			"heading" => esc_html__("Front Image", "amz-composer-plugins"),
			"param_name" => "front_image",
			"value" => "",
		),

		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Image Width', 'amz-composer-plugins' ),
			'param_name' => 'front_image_width',
			'value' => '',
			'description' => esc_html__( 'Enter the width as integer value  Ex: 200', 'amz-composer-plugins' )
		),

		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Image Height', 'amz-composer-plugins' ),
			'param_name' => 'front_image_height',
			'value' => '',
			'description' => esc_html__( 'Enter the height as integer value  Ex: 200', 'amz-composer-plugins' )
		),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Display Overlay", "amz-composer-plugins"),
			"param_name" => "overlay",
			"value" => array(
				esc_html__('Yes', "amz-composer-plugins") => "yes",
				esc_html__('No', "amz-composer-plugins") => "no",
			),
			"description" => '',
			"group"	=> esc_html__('Overlay', 'amz-composer-plugins')
		),

    	array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => __("Overlay Color", "amz-composer-plugins"),
			"param_name" => "hover_color", 
			"value" => '',
			"dependency" => array('element' => "overlay", 'value' => array('yes')),
			"description" => __("Leave it empty to apply default", "amz-composer-plugins"),
			"group"	=> esc_html__('Overlay', 'amz-composer-plugins')
		),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Animation In", "amz-composer-plugins"),
			"param_name" => "animate_in",
			"value" => $hover_animation_in,
			"description" => esc_html__("Choose hove in animation", "amz-composer-plugins"),
			"dependency" => array('element' => "overlay", 'value' => array('yes')),
			"group"	=> esc_html__('Overlay', 'amz-composer-plugins')
		),

		array(
			"type" => "textfield",
			"heading" => __("Overlay Animation In Duration", "amz-composer-plugins"),
			"param_name" => "duration_in",
			"value" => "",
			"description" => __("Enter the Duration (Ex: 500ms or 1s). Leave it empty to apply default which is 0.3s", "amz-composer-plugins"),
			"dependency" => array('element' => "overlay", 'value' => array('yes')),
			"group"	=> esc_html__('Overlay', 'amz-composer-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => __("Animation In Delay", "amz-composer-plugins"),
			"param_name" => "delay_in",
			"value" => "",
			"description" => __("Enter the Delay (Ex: 100ms or 1s). Leave it empty to apply default which is 0s", "amz-composer-plugins"),
			"dependency" => array('element' => "overlay", 'value' => array('yes')),
			"group"	=> esc_html__('Overlay', 'amz-composer-plugins')
		),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Animation Out", "amz-composer-plugins"),
			"param_name" => "animate_out",
			"value" => $hover_animation_out,
			"description" => esc_html__("Choose hover out animation", "amz-composer-plugins"),
			"dependency" => array('element' => "overlay", 'value' => array('yes')),
			"group"	=> esc_html__('Overlay', 'amz-composer-plugins')
		),

		array(
			"type" => "textfield",
			"heading" => __("Animation Out Duration", "amz-composer-plugins"),
			"param_name" => "duration_out",
			"value" => "",
			"description" => __("Enter the Duration (Ex: 500ms or 1s). Leave it empty to apply default which is 0.3s", "amz-composer-plugins"),
			"dependency" => array('element' => "overlay", 'value' => array('yes')),
			"group"	=> esc_html__('Overlay', 'amz-composer-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => __("Animation Out Delay", "amz-composer-plugins"),
			"param_name" => "delay_out",
			"value" => "",
			"description" => __("Enter the Delay (Ex: 100ms or 1s). Leave it empty to apply default which is 0s", "amz-composer-plugins"),
			"dependency" => array('element' => "overlay", 'value' => array('yes')),
			"group"	=> esc_html__('Overlay', 'amz-composer-plugins')
			),

		array(
			'type' => 'css_editor',
			'heading' => esc_html__( 'CSS box', 'amz-composer-plugins' ),
			'param_name' => 'overlay_css',
			"dependency" => array('element' => "overlay", 'value' => array('yes')),
			'group' => esc_html__( 'Overlay Design Options', 'amz-composer-plugins' )
			),

		array(
			'type' => 'css_editor',
			'heading' => esc_html__( 'CSS box', 'amz-composer-plugins' ),
			'param_name' => 'hover_box_css',
			'group' => esc_html__( 'Design Options', 'amz-composer-plugins' )
			),
		
    )
) );

vc_map( array(
	"name" => __("Hover Elements", "amz-composer-plugins"),
	"base" => "hover_elements",
	"icon" => "icon-pixel8es",
	"category" => 'By Composer', //category
    "as_child" => array('only' => 'hover_box'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
    "as_parent" => array('except' => 'hover_elements, hover_box'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
    "content_element" => true,
    "show_settings_on_create" => false,
    "js_view" => 'VcColumnView',
    "params" => array(
    	array(
    		"type" => "dropdown",
    		"heading" => esc_html__("Text Color", "amz-composer-plugins"),
    		"param_name" => "text_color",
    		"value" => array(  
    			esc_html__('White', "amz-composer-plugins") => "light",
    			esc_html__('Black', "amz-composer-plugins") => "dark",    			
    			esc_html__('Default', "amz-composer-plugins") => "default"
    		),
    		"description" => esc_html__("Choose default to apply shortcode default or theme default color", "amz-composer-plugins"),
    	),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Display", "amz-composer-plugins"),
			"param_name" => "on_hover",
			"value" => array(
				esc_html__('Display On Hover', "amz-composer-plugins") => "yes",
				esc_html__('Always Display', "amz-composer-plugins") => "no",
			),
			"description" => ''
		),

    	array(
    		"type" => "dropdown",
    		"heading" => esc_html__("Vertical Align", "amz-composer-plugins"),
    		"param_name" => "vertical_align",
    		"value" => array(
    			esc_html__('Top', "amz-composer-plugins") => "",
    			esc_html__('Middle', "amz-composer-plugins") => "middle",      			
    			esc_html__('Bottom', "amz-composer-plugins") => "bottom"
    		),
    		"description" => ''
    	),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Animation In", "amz-composer-plugins"),
			"param_name" => "animate_in",
			"value" => $hover_animation_in,
			"description" => esc_html__("Choose hove in animation", "amz-composer-plugins"),
			"group"	=> esc_html__('Animation', 'amz-composer-plugins')
		),

		array(
			"type" => "textfield",
			"heading" => __("Animation In Duration", "amz-composer-plugins"),
			"param_name" => "duration_in",
			"value" => "",
			"description" => __("Enter the Duration (Ex: 500ms or 1s). Leave it empty to apply default which is 0.3s", "amz-composer-plugins"),
			"group"	=> esc_html__('Animation', 'amz-composer-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => __("Animation In Delay", "amz-composer-plugins"),
			"param_name" => "delay_in",
			"value" => "",
			"description" => __("Enter the Delay (Ex: 100ms or 1s). Leave it empty to apply default which is 0s", "amz-composer-plugins"),
			"group"	=> esc_html__('Animation', 'amz-composer-plugins')
		),

		array(
			"type" => "dropdown",
			"heading" => esc_html__("Animation Out", "amz-composer-plugins"),
			"param_name" => "animate_out",
			"value" => $hover_animation_out,
			"description" => esc_html__("Choose hover out animation", "amz-composer-plugins"),
			"group"	=> esc_html__('Animation', 'amz-composer-plugins')
		),

		array(
			"type" => "textfield",
			"heading" => __("Animation Out Duration", "amz-composer-plugins"),
			"param_name" => "duration_out",
			"value" => "",
			"description" => __("Enter the Duration (Ex: 500ms or 1s). Leave it empty to apply default which is 0.3s", "amz-composer-plugins"),
			"group"	=> esc_html__('Animation', 'amz-composer-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => __("Animation Out Delay", "amz-composer-plugins"),
			"param_name" => "delay_out",
			"value" => "",
			"description" => __("Enter the Delay (Ex: 100ms or 1s). Leave it empty to apply default which is 0s", "amz-composer-plugins"),
			"group"	=> esc_html__('Animation', 'amz-composer-plugins')
		),

    	array(
			'type' => 'css_editor',
			'heading' => esc_html__( 'CSS box', 'amz-composer-plugins' ),
			'param_name' => 'hover_box_css',
			'group' => esc_html__( 'Design Options', 'amz-composer-plugins' )
		)
    )
) );

//Your "container" content element should extend WPBakeryShortCodesContainer class to inherit all required functionality
if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
	class WPBakeryShortCode_hover_box extends WPBakeryShortCodesContainer {}
	class WPBakeryShortCode_hover_elements extends WPBakeryShortCodesContainer {}
}


//Register "container" content element. It will hold all your inner (child) content elements
vc_map( array(
	"name" => __("Slider", "amz-composer-plugins"),
	"base" => "slider",
	"icon" => "icon-pixel8es",
	"category" => 'By Composer', //category
    "as_parent" => array('only' => 'slide'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
    "content_element" => true,
    "show_settings_on_create" => false,
    "params" => array(
        // add params same as with any other content element
		array(
			"type" => "dropdown",
			"heading" => __("Bullets", "amz-composer-plugins"),
			"param_name" => "pagination",
			"value" => array( __('Yes', "amz-composer-plugins") => "true",
							  __('No', "amz-composer-plugins") => "false",
							),
			"description" => __("Do you like to show dot navigation to move carousel", "amz-composer-plugins"),
		),
		
		array(
			"type" => "dropdown",
			"heading" => __("Arrow", "amz-composer-plugins"),
			"param_name" => "slide_arrow",
			"value" => array( __('No', "amz-composer-plugins") => "false",
							  __('Yes', "amz-composer-plugins") => "true"),
			"description" => __("Do you like to show arrow navigation to move carousel.", "amz-composer-plugins")
		),   

		array(
			"type" => "image_select",
			"class" => "",
			"heading" => esc_html__("Arrow Style", 'composer'),
			"param_name" => "slide_arrow_style",
			"value" => 'arrow-style-1',
			"options" => array( 
				"arrow-style-1"    => "arrow-style1.jpg",
				"arrow-style-2"    => 'arrow-style2.jpg',
				"arrow-style-3"    => 'arrow-style4.jpg',
				"arrow-style-4"    => 'arrow-style3.jpg',
				),
			'img_dir' => AMAZEE_PLUGIN_URL . '/assets/img/',
			"dependency" => array('element' => "slide_arrow", 'value' => array('true')),
			"description" => esc_html__("Select Top Row Seperator", 'composer'),
		),

		array(
			"type" => "dropdown",
			"heading" => __("Autoplay", "amz-composer-plugins"),
			"param_name" => "autoplay",
			"value" => array( __('No', "amz-composer-plugins") => "false", 
							  __('Yes', "amz-composer-plugins") => "true" ),
			"description" => __("Enable autoplay?", "amz-composer-plugins"),
		),

		array(
			"type" => "textfield",
			"heading" => __("Autoplay Interval Timeout", "amz-composer-plugins"),
			"param_name" => "slide_speed",
			"value" => "5000",
			"description" => __("Enter Autoplay interval timeout Value in milesecond (Ex: 5000).", "amz-composer-plugins"),
			"dependency" => array('element' => "autoplay", 'value' => array('true')),
		),

		array(
			"type" => "dropdown",
			"heading" => __("Autoplay Pause on Hover?", "amz-composer-plugins"),
			"param_name" => "autoplay_pause",
			"value" => array( __('Yes', "amz-composer-plugins") => "true", 
							  __('No', "amz-composer-plugins") => "false" ),
			"description" => __("Enable autoplay pause on hover?", "amz-composer-plugins"),
		),

		array(
			"type" => "dropdown",
			"heading" => __("Loop", "amz-composer-plugins"),
			"param_name" => "loop",
			"value" => array( __('Yes', "amz-composer-plugins") => "true", 
							  __('No', "amz-composer-plugins") => "false" ),
			"description" => __("Enable loop?", "amz-composer-plugins"),
		),

	),
    "js_view" => 'VcColumnView'
    ) );
vc_map( array(
	"name" => __("Slide", "amz-composer-plugins"),
	"base" => "slide",
	"icon" => "icon-pixel8es",
	"category" => 'By Composer', //category
	"content_element" => true,
    "as_child" => array('only' => 'slider'),
    "params" => array(
    	array(
    		"type" => "textfield",
    		//"holder" => "slide",
    		"class" => "",
    		"heading" => __("Title", "amz-composer-plugins"),
    		"param_name" => "title",
    		"value" => "",
		"admin_label" => true,
    		"description" => __("Enter your slide title text here.", "amz-composer-plugins")
    		),

		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => __("Title Custom Color", "amz-composer-plugins"),
			"param_name" => "title_color", 
			"value" => '',
			"description" => __("Choose Title Color (or) Leave it empty to apply theme default", "amz-composer-plugins")
			),

    	array(
    		"type" => "textarea",
    		//"holder" => "slide",
    		"class" => "",
    		"heading" => __("Content", "amz-composer-plugins"),
    		"param_name" => "content",
    		"value" => "",
		"admin_label" => false,
    		"description" => __("Enter your slide content.", "amz-composer-plugins")
    		),

		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => __("Content Custom Color", "amz-composer-plugins"),
			"param_name" => "content_color", 
			"value" => '',
			"description" => __("Choose Content Color (or) Leave it empty to apply theme default", "amz-composer-plugins")
			),

    	array(
    		"type" => "dropdown",
    		"heading" => __("Align", "amz-composer-plugins"),
    		"param_name" => "align",
    		"value" =>array(
				__('Left', "amz-composer-plugins") => "",  
				__('Right', "amz-composer-plugins") => "align-right",
				__('Center', "amz-composer-plugins") => "align-center"
				),
    		"description" => ''
    		),

    	array(
			"type" => "dropdown",
			"heading" => __("Change Header text color?", "amz-composer-plugins"),
			"param_name" => "enable_header_text",
			"value" => array(__('Yes', "amz-composer-plugins") => "yes", 
							 __('No', "amz-composer-plugins") => "no"),
			"description" => __("If you are using this slider below the header and if you enabled transparent Header, this option will help to adjust header text color, depends on your slider background", "amz-composer-plugins"),
			"group"	=> __('Header', 'amz-composer-plugins')
			),

    	array(
    		"type" => "dropdown",
    		"heading" => __("Header Text Color", "amz-composer-plugins"),
    		"param_name" => "header_text",
    		"value" =>array(
				__('Black', "amz-composer-plugins") => "",  
				__('White', "amz-composer-plugins") => "white"
				),
    		"description" => 'If you are using transparent Header, this option will help to adjust header text color, depends on your slider background',    		
			"group"	=> __('Header', 'amz-composer-plugins')
    		),

    	array(
			"type" => "dropdown",
			"heading" => __("Display Button?", "amz-composer-plugins"),
			"param_name" => "display_button",
			"value" => array(__('Yes', "amz-composer-plugins") => "yes", 
							 __('No', "amz-composer-plugins") => "no"),
			"description" => __("Do you want to display button in icon box?", "amz-composer-plugins"),
			"group"	=> __('Button', 'amz-composer-plugins')
			),

		array(
			"type" => "vc_link",
			"heading" => __("Button URL", "amz-composer-plugins"),
			"param_name" => "button_link",
			"value" => "",
			"description" => __("Enter the button link", "amz-composer-plugins"),
			"dependency" => array('element' => "display_button", 'value' => array('yes')),
			"group"	=> __('Button', 'amz-composer-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Button Style", "amz-composer-plugins"),
			"param_name" => "button_style",
			"value" => array(__('Outline', "amz-composer-plugins") => "outline", 
							 __('Solid', "amz-composer-plugins") => "solid", 
							 __('Default', "amz-composer-plugins") => "simple"),
			"description" => __("Select button style", "amz-composer-plugins"),
			"dependency" => array('element' => "display_button", 'value' => array('yes')),
			"group"	=> __('Button', 'amz-composer-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Button Hover Style", "amz-composer-plugins"),
			"param_name" => "button_hover_style",
			"value" => array(__('Outline', "amz-composer-plugins") => "outline", 
							 __('Solid', "amz-composer-plugins") => "solid"),
			"description" => __("Select button hover style", "amz-composer-plugins"),
			"dependency" => array('element' => "display_button", 'value' => array('yes')),
			"group"	=> __('Button', 'amz-composer-plugins')
			),

		array( 
			"type" => "dropdown",
			"heading" => __("Button Type", "amz-composer-plugins"),
			"param_name" => "button_type",
			"value" => array(__('Oval', "amz-composer-plugins") =>'oval',
							 __('Rectangle', "amz-composer-plugins") =>'rectangle'),
			"description" => '',
			"dependency" => array('element' => "display_button", 'value' => array('yes')),
			"group"	=> __('Button', 'amz-composer-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Button Color", "amz-composer-plugins"),
			"param_name" => "button_color",
			"value" => array(__('Theme default color', "amz-composer-plugins") => "color", 
							 __('Black', "amz-composer-plugins") => "no-color",
							 __('White', "amz-composer-plugins") => "white",
							 __('Custom Color', "amz-composer-plugins") => "custom_color"), 
			"description" => __("Please choose button color", "amz-composer-plugins"),
			"dependency" => array('element' => "display_button", 'value' => array('yes')),
			"group"	=> __('Button', 'amz-composer-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Button Hover Color", "amz-composer-plugins"),
			"param_name" => "button_hover_color",
			"value" => array(__('Theme default color', "amz-composer-plugins") => "color", 
							 __('Black', "amz-composer-plugins") => "no-color",
							 __('White', "amz-composer-plugins") => "white"), 
			"description" => __("Please choose button hover color", "amz-composer-plugins"),
			"dependency" => array('element' => "display_button", 'value' => array('yes')),
			"group"	=> __('Button', 'amz-composer-plugins')
			),

		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => __("Custom Background Color", "amz-composer-plugins"),
			"param_name" => "btn_bg_color", 
			"value" => '', 
			"description" => __("Choose Background Color", "amz-composer-plugins"),
			"dependency" => array('element' => "button_color", 'value' => array('custom_color')),
			"group"	=> __('Button', 'amz-composer-plugins')
			),

		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => __("Custom Color", "amz-composer-plugins"),
			"param_name" => "btn_text_color", 
			"value" => '', 
			"description" => __("Choose Text Color", "amz-composer-plugins"),
			"dependency" => array('element' => "button_color", 'value' => array('custom_color')),
			"group"	=> __('Button', 'amz-composer-plugins')
			),

		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => __("Custom Border Color", "amz-composer-plugins"),
			"param_name" => "btn_border_color", 
			"value" => '', 
			"description" => __("Choose Border Color", "amz-composer-plugins"),
			"dependency" => array('element' => "button_color", 'value' => array('custom_color')),
			"group"	=> __('Button', 'amz-composer-plugins')
			),

		array(
			"type" => "dropdown",
			"heading" => __("Custom Button Size?", "amz-composer-plugins"),
			"param_name" => "custom_size",
			"value" => array(__('No', "amz-composer-plugins") => "no",
							 __('Yes', "amz-composer-plugins") => "yes"),
			"description" => __("Do you want to custom button size?", "amz-composer-plugins"),
			"dependency" => array('element' => "display_button", 'value' => array('yes')),
			"group"	=> __('Button', 'amz-composer-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => __("Font Size", "amz-composer-plugins"),
			"param_name" => "font_size",
			"value" => "",
			"description" => __("Enter the font size in px(Ex: 50px)", "amz-composer-plugins"),
			"dependency" => array('element' => "custom_size", 'value' => array('yes')),
			"group"	=> __('Button', 'amz-composer-plugins')
			),

		array(
			"type" => "textfield",
			"heading" => __("Custom Padding", "amz-composer-plugins"),
			"param_name" => "padding_custom",
			"value" => "",
			"description" => __("Enter the padding (in css format [top right bottom left]) in px(Ex: 50px 50px 50px 50px)", "amz-composer-plugins"),
			"dependency" => array('element' => "custom_size", 'value' => array('yes')),
			"group"	=> __('Button', 'amz-composer-plugins')
			),

		array(
			'type' => 'css_editor',
			'heading' => __( 'CSS box', 'amz-composer-plugins' ),
			'param_name' => 'slide_css',
			'group' => __( 'Design Options', 'amz-composer-plugins' )
		),

    	
    	)
) );


//Your "container" content element should extend WPBakeryShortCodesContainer class to inherit all required functionality
if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
	class WPBakeryShortCode_slider extends WPBakeryShortCodesContainer {
	}
}
if ( class_exists( 'WPBakeryShortCode' ) ) {
	class WPBakeryShortCode_slide extends WPBakeryShortCode {
	}
}

/* Composer Image carousel */
vc_map( array(
	"name" => __("Image Carousel", "amz-composer-plugins"),
	"base" => "composer_image_carousel",
	"icon" => "icon-pixel8es",
	'description' => __( 'Responsive Image carousel with/without Lightbox', 'amz-composer-plugins' ),
	"category" => 'By Composer',
    "show_settings_on_create" => true,
    "params" => array(

    	array(
    		"type" => "attach_images",
    		"heading" => __("Images", "amz-composer-plugins"),
    		"param_name" => "images",
    		"value" => "",
    		"admin_label" => true,
    		"description" => __("Select images from media library.", "amz-composer-plugins")
    		),

    	array(
    		'type' => 'textfield',
    		'heading' => __( 'Carousel size', 'amz-composer-plugins' ),
    		'param_name' => 'img_size',
    		'value' => 'thumbnail',
    		'description' => __( 'Enter image size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use "thumbnail" size. If used slides per view, this will be used to define carousel wrapper size.', 'amz-composer-plugins' ),
    	),

    	array(
    		'type' => 'textfield',
    		'heading' => __( 'Lightbox Image size', 'amz-composer-plugins' ),
    		'param_name' => 'large_img_size',
    		'value' => 'large',
    		'description' => __( 'Enter image size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use "thumbnail" size. If used slides per view, this will be used to define carousel wrapper size.', 'amz-composer-plugins' ),
    	),

    	array(
    		'type' => 'dropdown',
    		'heading' => __( 'On click action', 'amz-composer-plugins' ),
    		'param_name' => 'onclick',
    		'value' => array(
    			__( 'Open prettyPhoto', 'amz-composer-plugins' ) => 'link_image',
    			__( 'None', 'amz-composer-plugins' ) => 'link_no',
    		),
    		'description' => __( 'Select action for click event.', 'amz-composer-plugins' ),
    	),

		array(
			'type' => 'textfield',
			'heading' => __( 'Slides per view', 'amz-composer-plugins' ),
			'param_name' => 'slides_per_view',
			'value' => 1,
			'description' => __( 'Enter number of slides to display at the same time.', 'amz-composer-plugins' )
		),

		array(
			'type' => 'textfield',
			'heading' => __( 'Margin', 'amz-composer-plugins' ),
			'param_name' => 'margin',
			'value' => '30',
			'description' => __( 'Enter margin-right(px) on item ( Example: 30 ).', 'amz-composer-plugins' ),
		),
		
		array(
			"type" => "dropdown",
			"heading" => __("Loop", "amz-composer-plugins"),
			"param_name" => "loop",
			"value" => array( __('No', "amz-composer-plugins") => "false",
							  __('Yes', "amz-composer-plugins") => "true"),
			"dependency" => array('element' => "onclick", 'value' => 'link_no'),
			"description" => 'Infinity loop. Duplicate last and first items to get loop illusion.',
		),

		array(
			"type" => "dropdown",
			"heading" => __("Center", "amz-composer-plugins"),
			"param_name" => "center",
			"value" => array( __('No', "amz-composer-plugins") => "false",
							  __('Yes', "amz-composer-plugins") => "true"),
			"description" => 'Center item. Works well with even an odd number of items.'
		),

		array(
			'type' => 'textfield',
			'heading' => __( 'Padding Left and Right', 'amz-composer-plugins' ),
			'param_name' => 'stage_padding',
			'value' => '0',
			'description' => __( 'Padding left and right on stage (can see neighbours).', 'amz-composer-plugins' )
		),

		array(
			'type' => 'textfield',
			'heading' => __( 'Start Position', 'amz-composer-plugins' ),
			'param_name' => 'start_position',
			'value' => '0',
			'description' => __( 'Start position.', 'amz-composer-plugins' )
		),

		array(
			"type" => "dropdown",
			"heading" => __("Autoplay", "amz-composer-plugins"),
			"param_name" => "autoplay",
			"value" => array( __('No', "amz-composer-plugins") => "false", __('Yes', "amz-composer-plugins") => "true" ),
			"description" => __("Enable autoplay?", "amz-composer-plugins"),
		),

		array(
			"type" => "textfield",
			"heading" => __("Autoplay Interval Timeout", "amz-composer-plugins"),
			"param_name" => "slide_speed",
			"value" => "5000",
			"description" => __("Enter Autoplay interval timeout Value in milesecond (Ex: 5000).", "amz-composer-plugins"),
		),

		array(
			"type" => "dropdown",
			"heading" => __("Autoplay Hover Pause", "amz-composer-plugins"),
			"param_name" => "stop_on_hover",
			"value" => array( __('Yes', "amz-composer-plugins") => "true",
							  __('No', "amz-composer-plugins") => "false"),
			"description" => 'Pause on mouse hover.'
		),

		array(
			"type" => "dropdown",
			"heading" => __("Arrow", "amz-composer-plugins"),
			"param_name" => "slide_arrow",
			"value" => array( __('Yes', "amz-composer-plugins") => "true",
							  __('No', "amz-composer-plugins") => "false"),
			"description" => __("Do you like to show arrow navigation to move carousel.", "amz-composer-plugins")
		),   

		array(
			"type" => "image_select",
			"class" => "",
			"heading" => esc_html__("Arrow Style", 'composer'),
			"param_name" => "slide_arrow_style",
			"value" => 'arrow-style-1',
			"options" => array( 
				"arrow-style-1"    => "arrow-style1.jpg",
				"arrow-style-2"    => 'arrow-style2.jpg',
				"arrow-style-3"    => 'arrow-style4.jpg',
				"arrow-style-4"    => 'arrow-style3.jpg',
				),
			'img_dir' => AMAZEE_PLUGIN_URL . '/assets/img/',
			"dependency" => array('element' => "slide_arrow", 'value' => array('true')),
			"description" => esc_html__("Select Top Row Seperator", 'composer'),
		),

		array(
			"type" => "dropdown",
			"heading" => __("Bullets", "amz-composer-plugins"),
			"param_name" => "pagination",
			"value" => array( __('No', "amz-composer-plugins") => "false",
							  __('Yes', "amz-composer-plugins") => "true",
							),
			"description" => __("Do you like to show dot navigation to move carousel", "amz-composer-plugins"),
		),

		array(
		   "type" => "dropdown",
		   "heading" => __("Animation In", "amz-composer-plugins"),
		   "param_name" => "animate_in",
		   "value" => $slider_animation_in,
		   "dependency" => array('element' => "slides_per_view", 'value' => '1'),
		   "description" => __("false = no animation. Animate functions work only with one item and only in browsers that support perspective property.", "amz-composer-plugins")
		   ),

		array(
		   "type" => "dropdown",
		   "heading" => __("Animation Out", "amz-composer-plugins"),
		   "param_name" => "animate_out",
		   "value" => $slider_animation_out,
		   "dependency" => array('element' => "slides_per_view", 'value' => '1'),
		   "description" => __("Animate functions work only with one item and only in browsers that support perspective property.", "amz-composer-plugins")
		   ),

		array(
			"type" => "dropdown",
			"heading" => __("Mouse Drag?", "amz-composer-plugins"),
			"param_name" => "mouse_drag",
			"value" => array( __('Yes', "amz-composer-plugins") => "true",
							  __('No', "amz-composer-plugins") => "false"),
			"description" => __("Do you like to move carousel by Mouse Drag?", "amz-composer-plugins")
		),

		array(
			"type" => "dropdown",
			"heading" => __("Touch Drag", "amz-composer-plugins"),
			"param_name" => "touch_drag",
			"value" => array( __('Yes', "amz-composer-plugins") => "true",
							  __('No', "amz-composer-plugins") => "false"),
			"description" => __("Do you like to move carousel Touch Drag?", "amz-composer-plugins")
		),

		array(
			'type' => 'css_editor',
			'heading' => __( 'CSS box', 'amz-composer-plugins' ),
			'param_name' => 'anything_css',
			'group' => __( 'Design Options', 'amz-composer-plugins' )
			),
    ),
   
    ) );

/* Anything carousel */
vc_map( array(
	"name" => __("Anything Carousel", "amz-composer-plugins"),
	"base" => "anything_carousel",
	"icon" => "icon-pixel8es",
	"category" => 'By Composer', //category
    "as_parent" => array('except' => 'anything_carousel'), 
    "content_element" => true,
    "show_settings_on_create" => true,
    "params" => array(

		array(
			'type' => 'textfield',
			'heading' => __( 'Slides per view', 'amz-composer-plugins' ),
			'param_name' => 'slides_per_view',
			'value' => 1,
			'description' => __( 'Enter number of slides to display at the same time.', 'amz-composer-plugins' )
		),

		array(
			'type' => 'textfield',
			'heading' => __( 'Margin', 'amz-composer-plugins' ),
			'param_name' => 'margin',
			'value' => '30',
			'description' => __( 'Enter margin-right(px) on item ( Example: 30 ).', 'amz-composer-plugins' ),
		),
		
		array(
			"type" => "dropdown",
			"heading" => __("Loop", "amz-composer-plugins"),
			"param_name" => "loop",
			"value" => array( __('No', "amz-composer-plugins") => "false",
							  __('Yes', "amz-composer-plugins") => "true"),
			"description" => 'Infinity loop. Duplicate last and first items to get loop illusion.',
		),

		array(
			"type" => "dropdown",
			"heading" => __("Center", "amz-composer-plugins"),
			"param_name" => "center",
			"value" => array( __('No', "amz-composer-plugins") => "false",
							  __('Yes', "amz-composer-plugins") => "true"),
			"description" => 'Center item. Works well with even an odd number of items.'
		),

		array(
			'type' => 'textfield',
			'heading' => __( 'Padding Left and Right', 'amz-composer-plugins' ),
			'param_name' => 'stage_padding',
			'value' => '0',
			'description' => __( 'Padding left and right on stage (can see neighbours).', 'amz-composer-plugins' )
		),

		array(
			'type' => 'textfield',
			'heading' => __( 'Start Position', 'amz-composer-plugins' ),
			'param_name' => 'start_position',
			'value' => '0',
			'description' => __( 'Start position.', 'amz-composer-plugins' )
		),

		array(
			"type" => "dropdown",
			"heading" => __("Autoplay", "amz-composer-plugins"),
			"param_name" => "autoplay",
			"value" => array( __('No', "amz-composer-plugins") => "false", __('Yes', "amz-composer-plugins") => "true" ),
			"description" => __("Enable autoplay?", "amz-composer-plugins"),
		),

		array(
			"type" => "textfield",
			"heading" => __("Autoplay Interval Timeout", "amz-composer-plugins"),
			"param_name" => "slide_speed",
			"value" => "5000",
			"description" => __("Enter Autoplay interval timeout Value in milesecond (Ex: 5000).", "amz-composer-plugins"),
		),

		array(
			"type" => "dropdown",
			"heading" => __("Autoplay Hover Pause", "amz-composer-plugins"),
			"param_name" => "stop_on_hover",
			"value" => array( __('Yes', "amz-composer-plugins") => "true",
							  __('No', "amz-composer-plugins") => "false"),
			"description" => 'Pause on mouse hover.'
		),

		array(
			"type" => "dropdown",
			"heading" => __("Arrow", "amz-composer-plugins"),
			"param_name" => "slide_arrow",
			"value" => array( __('Yes', "amz-composer-plugins") => "true",
							  __('No', "amz-composer-plugins") => "false"),
			"description" => __("Do you like to show arrow navigation to move carousel.", "amz-composer-plugins")
		),   

		array(
			"type" => "image_select",
			"class" => "",
			"heading" => esc_html__("Arrow Style", 'composer'),
			"param_name" => "slide_arrow_style",
			"value" => 'arrow-style-1',
			"options" => array( 
				"arrow-style-1"    => "arrow-style1.jpg",
				"arrow-style-2"    => 'arrow-style2.jpg',
				"arrow-style-3"    => 'arrow-style4.jpg',
				"arrow-style-4"    => 'arrow-style3.jpg',
				),
			'img_dir' => AMAZEE_PLUGIN_URL . '/assets/img/',
			"dependency" => array('element' => "slide_arrow", 'value' => array('true')),
			"description" => esc_html__("Select Top Row Seperator", 'composer'),
		),

		array(
			"type" => "dropdown",
			"heading" => __("Bullets", "amz-composer-plugins"),
			"param_name" => "pagination",
			"value" => array( __('Yes', "amz-composer-plugins") => "true",
				__('No', "amz-composer-plugins") => "false"),
			"description" => __("Do you like to show dot navigation to move carousel", "amz-composer-plugins"),
		),

		array(
		   "type" => "dropdown",
		   "heading" => __("Animation In", "amz-composer-plugins"),
		   "param_name" => "animate_in",
		   "value" => $slider_animation_in,
		   "description" => __("false = no animation. Animate functions work only with one item and only in browsers that support perspective property.", "amz-composer-plugins")
		   ),

		array(
		   "type" => "dropdown",
		   "heading" => __("Animation Out", "amz-composer-plugins"),
		   "param_name" => "animate_out",
		   "value" => $slider_animation_out,
		   "description" => __("Animate functions work only with one item and only in browsers that support perspective property.", "amz-composer-plugins")
		   ),

		array(
			"type" => "dropdown",
			"heading" => __("Mouse Drag?", "amz-composer-plugins"),
			"param_name" => "mouse_drag",
			"value" => array( __('Yes', "amz-composer-plugins") => "true",
							  __('No', "amz-composer-plugins") => "false"),
			"description" => __("Do you like to move carousel by Mouse Drag?", "amz-composer-plugins")
		),

		array(
			"type" => "dropdown",
			"heading" => __("Touch Drag", "amz-composer-plugins"),
			"param_name" => "touch_drag",
			"value" => array( __('Yes', "amz-composer-plugins") => "true",
							  __('No', "amz-composer-plugins") => "false"),
			"description" => __("Do you like to move carousel Touch Drag?", "amz-composer-plugins")
		),

		array(
			'type' => 'css_editor',
			'heading' => __( 'CSS box', 'amz-composer-plugins' ),
			'param_name' => 'anything_css',
			'group' => __( 'Design Options', 'amz-composer-plugins' )
			),
    ),
    "js_view" => 'VcColumnView'
    ) );

if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
	class WPBakeryShortCode_anything_carousel extends WPBakeryShortCodesContainer {
	}
}



/* Anything carousel */
vc_map( array(
	"name" => __("Video Carousel", "amz-composer-plugins"),
	"base" => "video_carousel",
	"icon" => "icon-pixel8es",
	"category" => 'By Composer', //category
    "show_settings_on_create" => true,
    "params" => array(

		array(
			"type" => "textarea",
			"heading" => __("Video Url", "amz-composer-plugins"),
			"param_name" => "video_url",
			"value" => "",
			"description" => __("Enter the straight URL from YouTube, Vimeo, or vzaar seperated by commas (,).", "amz-composer-plugins")
			),

		array(
			'type' => 'textfield',
			'heading' => __( 'Video Height', 'amz-composer-plugins' ),
			'param_name' => 'video_height',
			'value' => '400px',
			'description' => __( 'Enter the height in (px). Example: 300px ).', 'amz-composer-plugins' )
		),

		array(
			'type' => 'textfield',
			'heading' => __( 'Slides per view', 'amz-composer-plugins' ),
			'param_name' => 'slides_per_view',
			'value' => 1,
			'description' => __( 'Enter number of slides to display at the same time.', 'amz-composer-plugins' )
		),

		array(
			"type" => "dropdown",
			"heading" => __("Layout Style", "amz-composer-plugins"),
			"param_name" => "layout_style",
			"value" => array(__('Big Center', "amz-composer-plugins") => "big-center",
							 __('Normal', "amz-composer-plugins") => "normal"),							
			"description" => __("Select layout style.", "amz-composer-plugins"),
			),

		array(
			'type' => 'textfield',
			'heading' => __( 'Margin', 'amz-composer-plugins' ),
			'param_name' => 'margin',
			'value' => '30',
			'description' => __( 'Enter margin-right(px) on item ( Example: 30 ).', 'amz-composer-plugins' ),
		),
		
		array(
			"type" => "dropdown",
			"heading" => __("Loop", "amz-composer-plugins"),
			"param_name" => "loop",
			"value" => array( __('Yes', "amz-composer-plugins") => "true",
							  __('No', "amz-composer-plugins") => "false"),
			"description" => 'Infinity loop. Duplicate last and first items to get loop illusion.',
		),

		array(
			"type" => "dropdown",
			"heading" => __("Center", "amz-composer-plugins"),
			"param_name" => "center",
			"value" => array( __('Yes', "amz-composer-plugins") => "true",
							  __('No', "amz-composer-plugins") => "false"),
			"description" => 'Center item. Works well with even an odd number of items.'
		),

		array(
			'type' => 'textfield',
			'heading' => __( 'Padding Left and Right', 'amz-composer-plugins' ),
			'param_name' => 'stage_padding',
			'value' => '0',
			'description' => __( 'Padding left and right on stage (can see neighbours).', 'amz-composer-plugins' )
		),

		array(
			'type' => 'textfield',
			'heading' => __( 'Start Position', 'amz-composer-plugins' ),
			'param_name' => 'start_position',
			'value' => '0',
			'description' => __( 'Start position.', 'amz-composer-plugins' )
		),

		array(
			"type" => "dropdown",
			"heading" => __("Autoplay", "amz-composer-plugins"),
			"param_name" => "autoplay",
			"value" => array( __('No', "amz-composer-plugins") => "false", __('Yes', "amz-composer-plugins") => "true" ),
			"description" => __("Enable autoplay?", "amz-composer-plugins"),
		),

		array(
			"type" => "textfield",
			"heading" => __("Autoplay Interval Timeout", "amz-composer-plugins"),
			"param_name" => "slide_speed",
			"value" => "5000",
			"description" => __("Enter Autoplay interval timeout Value in milesecond (Ex: 5000).", "amz-composer-plugins"),
		),

		array(
			"type" => "dropdown",
			"heading" => __("Autoplay Hover Pause", "amz-composer-plugins"),
			"param_name" => "stop_on_hover",
			"value" => array( __('Yes', "amz-composer-plugins") => "true",
							  __('No', "amz-composer-plugins") => "false"),
			"description" => 'Pause on mouse hover.'
		),

		array(
			"type" => "dropdown",
			"heading" => __("Arrow", "amz-composer-plugins"),
			"param_name" => "slide_arrow",
			"value" => array( __('Yes', "amz-composer-plugins") => "true",
							  __('No', "amz-composer-plugins") => "false"),
			"description" => __("Do you like to show arrow navigation to move carousel.", "amz-composer-plugins")
		),   

		array(
			"type" => "image_select",
			"class" => "",
			"heading" => esc_html__("Arrow Style", 'composer'),
			"param_name" => "slide_arrow_style",
			"value" => 'arrow-style-1',
			"options" => array( 
				"arrow-style-1"    => "arrow-style1.jpg",
				"arrow-style-2"    => 'arrow-style2.jpg',
				"arrow-style-3"    => 'arrow-style4.jpg',
				"arrow-style-4"    => 'arrow-style3.jpg',
				),
			'img_dir' => AMAZEE_PLUGIN_URL . '/assets/img/',
			"dependency" => array('element' => "slide_arrow", 'value' => array('true')),
			"description" => esc_html__("Select Top Row Seperator", 'composer'),
		),

		array(
			"type" => "dropdown",
			"heading" => __("Bullets", "amz-composer-plugins"),
			"param_name" => "pagination",
			"value" => array( __('Yes', "amz-composer-plugins") => "true",
				__('No', "amz-composer-plugins") => "false"),
			"description" => __("Do you like to show dot navigation to move carousel", "amz-composer-plugins"),
		),

		array(
		   "type" => "dropdown",
		   "heading" => __("Animation In", "amz-composer-plugins"),
		   "param_name" => "animate_in",
		   "value" => $slider_animation_in,
		   "description" => __("false = no animation. Animate functions work only with one item and only in browsers that support perspective property.", "amz-composer-plugins")
		   ),

		array(
		   "type" => "dropdown",
		   "heading" => __("Animation Out", "amz-composer-plugins"),
		   "param_name" => "animate_out",
		   "value" => $slider_animation_out,
		   "description" => __("Animate functions work only with one item and only in browsers that support perspective property.", "amz-composer-plugins")
		   ),

		array(
			"type" => "dropdown",
			"heading" => __("Mouse Drag?", "amz-composer-plugins"),
			"param_name" => "mouse_drag",
			"value" => array( __('Yes', "amz-composer-plugins") => "true",
							  __('No', "amz-composer-plugins") => "false"),
			"description" => __("Do you like to move carousel by Mouse Drag?", "amz-composer-plugins")
		),

		array(
			"type" => "dropdown",
			"heading" => __("Touch Drag", "amz-composer-plugins"),
			"param_name" => "touch_drag",
			"value" => array( __('Yes', "amz-composer-plugins") => "true",
							  __('No', "amz-composer-plugins") => "false"),
			"description" => __("Do you like to move carousel Touch Drag?", "amz-composer-plugins")
		),

		array(
			'type' => 'css_editor',
			'heading' => __( 'CSS box', 'amz-composer-plugins' ),
			'param_name' => 'anything_css',
			'group' => __( 'Design Options', 'amz-composer-plugins' )
			),
    ),
) );

/* Skrollr */
vc_map( array(
	"name" => __("Skroller", "amz-composer-plugins"),
	"base" => "skroller",
	"icon" => "icon-pixel8es",
	"category" => 'By Composer', //category
    "as_parent" => array('except' => 'skroller'),
    "content_element" => true,
    "show_settings_on_create" => true,
    "params" => array(

		array(
			'type' => 'textfield',
			'heading' => __( 'Width', 'amz-composer-plugins' ),
			'param_name' => 'elem_width',
			'value' => '',
			'description' => __( 'Enter the width in (px)  Example: 200px.', 'amz-composer-plugins' ),
			"group"	=> __('Initial Position', 'amz-composer-plugins')
		),

		array(
			'type' => 'textfield',
			'heading' => __( 'Height', 'amz-composer-plugins' ),
			'param_name' => 'elem_height',
			'value' => '',
			'description' => __( 'Enter the height in (px)  Example: 200px ).', 'amz-composer-plugins' ),
			"group"	=> __('Initial Position', 'amz-composer-plugins')
		),

		array(
			"type" => "dropdown",
			"heading" => __("Positioning?", "amz-composer-plugins"),
			"param_name" => "elem_position",
			"value" => array(__('Static', "amz-composer-plugins") => "static",
							 __('Relative', "amz-composer-plugins") => "relative", 
							 __('Absolute', "amz-composer-plugins") => "absolute"), 
			"description" => '',
			"group"	=> __('Initial Position', 'amz-composer-plugins')
			),

		array(
			'type' => 'textfield',
			'heading' => __( 'Top', 'amz-composer-plugins' ),
			'param_name' => 'elem_top',
			'value' => '',
			'description' => __( 'Enter the top in (px)  Example: 200px ).', 'amz-composer-plugins' ),
			"group"	=> __('Initial Position', 'amz-composer-plugins'),
			"edit_field_class" => 'vc_col-xs-3'
		),

		array(
			'type' => 'textfield',
			'heading' => __( 'Left', 'amz-composer-plugins' ),
			'param_name' => 'elem_left',
			'value' => '',
			'description' => __( 'Enter the Left in (px)  Example: 200px ).', 'amz-composer-plugins' ),
			"group"	=> __('Initial Position', 'amz-composer-plugins'),
			"edit_field_class" => 'vc_col-xs-3'
		),

		array(
			'type' => 'textfield',
			'heading' => __( 'Right', 'amz-composer-plugins' ),
			'param_name' => 'elem_right',
			'value' => '',
			'description' => __( 'Enter the right in (px)  Example: 200px ).', 'amz-composer-plugins' ),
			"group"	=> __('Initial Position', 'amz-composer-plugins'),
			"edit_field_class" => 'vc_col-xs-3'
		),

		array(
			'type' => 'textfield',
			'heading' => __( 'Bottom', 'amz-composer-plugins' ),
			'param_name' => 'elem_bottom',
			'value' => '',
			'description' => __( 'Enter the bottom in (px)  Example: 200px ).', 'amz-composer-plugins' ),
			"group"	=> __('Initial Position', 'amz-composer-plugins'),
			"edit_field_class" => 'vc_col-xs-3'
		),

		array(
			'type' => 'textfield',
			'heading' => __( 'Z index', 'amz-composer-plugins' ),
			'param_name' => 'z_index',
			'value' => '',
			'description' => __( 'Enter the z-index value (Example: 2).', 'amz-composer-plugins' ),
			"group"	=> __('Initial Position', 'amz-composer-plugins')
		),


		array(
			"type" => "dropdown",
			"heading" => __("Easing?", "amz-composer-plugins"),
			"param_name" => "elem_easing",
			"value" => array(__('Linear', "amz-composer-plugins") => "",
					 __('Quadratic', "amz-composer-plugins") => "quadratic", 
					 __('Cubic', "amz-composer-plugins") => "cubic", 
					 __('Swing', "amz-composer-plugins") => "swing", 
					 __('Sqrt', "amz-composer-plugins") => "sqrt", 
					 __('Bounce', "amz-composer-plugins") => "bounce", 
					 __('OutCubic', "amz-composer-plugins") => "outCubic", 
					 __('Quintic', "amz-composer-plugins") => "quintic"), 
			"description" => 'linear: The default.<br>
quadratic: To the power of two. So 50% looks like 25%.<br>
cubic: To the power of three. So 50% looks like 12.5%.<br>
swing: Slow at the beginning and accelerates at the end. So 25% -> 14.6%, 50% -> 50%, 75% -> 85.3%<br>
sqrt: Square root. Starts fast, slows down at the end.<br>
bounce: Bounces like a ball.',
			"group"	=> __('Initial Position', 'amz-composer-plugins')
			),

		array(
			'type' => 'textfield',
			'heading' => __( 'Class', 'amz-composer-plugins' ),
			'param_name' => 'el_class',
			'value' => '',
			'description' => __( 'Enter the class name', 'amz-composer-plugins' ),
			"group"	=> __('Initial Position', 'amz-composer-plugins')
		),

		array(
			"type" => "dropdown",
			"heading" => __("Animate start From", "amz-composer-plugins"),
			"param_name" => "start_animation",
			"value" => array( __('Top Bottom', "amz-composer-plugins") => "top-bottom",
							  __('Top', "amz-composer-plugins") => "top",
							  __('Bottom', "amz-composer-plugins") => "bottom",
							  __('Bottom Top', "amz-composer-plugins") => "bottom-top",
							  __('center', "amz-composer-plugins") => "center",
							  __('center Bottom', "amz-composer-plugins") => "center-bottom",
							  __('center Top', "amz-composer-plugins") => "center-top",
							  ),
			"description" => __( 'Choose when you want start animation.', 'amz-composer-plugins' ) . '<a href="'. get_template_directory_uri().'/_images/skrollr-cheatsheet-v02.png" target="_blank">' . __( 'check this for more info', 'amz-composer-plugins') .'</a>',
			"group"	=> __('Start', 'amz-composer-plugins')
		),

		array(
			'type' => 'textfield',
			'heading' => __( 'Move Horizontal', 'amz-composer-plugins' ),
			'param_name' => 'translate_x',
			'value' => '',
			'description' => __( 'Enter positive value to move left or negative value to move right (Example: 200px).', 'amz-composer-plugins' ),
			"group"	=> __('Start', 'amz-composer-plugins')
		),

		array(
			'type' => 'textfield',
			'heading' => __( 'Move Vertical', 'amz-composer-plugins' ),
			'param_name' => 'translate_y',
			'value' => '',
			'description' => __( 'Enter positive value to move bottom or negative value to move top (Example: 200px).', 'amz-composer-plugins' ),
			"group"	=> __('Start', 'amz-composer-plugins')
		),

		array(
			'type' => 'textfield',
			'heading' => __( 'Scale', 'amz-composer-plugins' ),
			'param_name' => 'scale',
			'value' => '',
			'description' => __( 'Enter the value in decimal, value above 1 make element larger and below 1 make element smaller (Example: 1.2).', 'amz-composer-plugins' ),
			"group"	=> __('Start', 'amz-composer-plugins')
		),

		array(
			'type' => 'textfield',
			'heading' => __( 'Rotate', 'amz-composer-plugins' ),
			'param_name' => 'rotate',
			'value' => '',
			'description' => __( 'Enter rotate deg, value should be within 0 - 360 (Example: 45).', 'amz-composer-plugins' ),
			"group"	=> __('Start', 'amz-composer-plugins')
		),

		array(
			'type' => 'textfield',
			'heading' => __( 'Opacity', 'amz-composer-plugins' ),
			'param_name' => 'opacity',
			'value' => '',
			'description' => __( 'Enter the opacity value should be within 0 - 1 (Example: 0.5).', 'amz-composer-plugins' ),
			"group"	=> __('Start', 'amz-composer-plugins')
		),

		array(
			"type" => "dropdown",
			"heading" => __("Animate End From", "amz-composer-plugins"),
			"param_name" => "end_animation",
			"value" => array( __('Bottom Top', "amz-composer-plugins") => "bottom-top",
							  __('Top', "amz-composer-plugins") => "top",
							  __('Bottom', "amz-composer-plugins") => "bottom",							  
							  __('Top Bottom', "amz-composer-plugins") => "top-bottom",
							  __('center', "amz-composer-plugins") => "center",
							  __('center Bottom', "amz-composer-plugins") => "center-bottom",
							  __('center Top', "amz-composer-plugins") => "center-top",
							  ),
			"description" => __( 'Choose when you want start animation.', 'amz-composer-plugins' ) . '<a href="'. get_template_directory_uri().'/_images/skrollr-cheatsheet-v02.png" target="_blank">' . __( 'check this for more info', 'amz-composer-plugins') .'</a>',
			"group"	=> __('End', 'amz-composer-plugins')
		),

		array(
			'type' => 'textfield',
			'heading' => __( 'Move Horizontal', 'amz-composer-plugins' ),
			'param_name' => 'translate_x_end',
			'value' => '',
			'description' => __( 'Enter positive value to move left or negative value to move right (Example: 200px).', 'amz-composer-plugins' ),
			"group"	=> __('End', 'amz-composer-plugins')
		),

		array(
			'type' => 'textfield',
			'heading' => __( 'Move Vertical', 'amz-composer-plugins' ),
			'param_name' => 'translate_y_end',
			'value' => '',
			'description' => __( 'Enter positive value to move bottom or negative value to move top (Example: 200px).', 'amz-composer-plugins' ),
			"group"	=> __('End', 'amz-composer-plugins')
		),

		array(
			'type' => 'textfield',
			'heading' => __( 'Scale', 'amz-composer-plugins' ),
			'param_name' => 'scale_end',
			'value' => '',
			'description' => __( 'Enter the value in decimal, value above 1 make element larger and below 1 make element smaller (Example: 1.2).', 'amz-composer-plugins' ),
			"group"	=> __('End', 'amz-composer-plugins')
		),

		array(
			'type' => 'textfield',
			'heading' => __( 'Rotate', 'amz-composer-plugins' ),
			'param_name' => 'rotate_end',
			'value' => '',
			'description' => __( 'Enter rotate deg, value should be within 0 - 360 (Example: 45).', 'amz-composer-plugins' ),
			"group"	=> __('End', 'amz-composer-plugins')
		),

		array(
			'type' => 'textfield',
			'heading' => __( 'Opacity', 'amz-composer-plugins' ),
			'param_name' => 'opacity_end',
			'value' => '',
			'description' => __( 'Enter the opacity value should be within 0 - 1 (Example: 0.5).', 'amz-composer-plugins' ),
			"group"	=> __('End', 'amz-composer-plugins')
		),

		array(
			"type" => "dropdown",
			"heading" => __("Advanced", "amz-composer-plugins"),
			"param_name" => "advanced",
			"value" => array(__('No', "amz-composer-plugins") => "no",
							 __('Yes', "amz-composer-plugins") => "yes"),
			"description" => __('If you know how to use skrollr jquery plugin then you can enter data below.', "amz-composer-plugins"),
			"group"	=> __('Advanced', 'amz-composer-plugins')
			),


		array(
			"type" => "textarea",
			"class" => "",
			"heading" => __("Skrollr Data", "amz-composer-plugins"),
			"param_name" => "advanced_data", 
			"value" => '', 
			"description" => __("If you know how to use skrollr jquery plugin then you can enter data here.", "amz-composer-plugins"),
			"dependency" => array('element' => "advanced", 'value' => array('yes')),
			"group"	=> __('Advanced', 'amz-composer-plugins')
			),
    ),
    "js_view" => 'VcColumnView'
    ) );

if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
	class WPBakeryShortCode_skroller extends WPBakeryShortCodesContainer {
	}
}

// Login Form Shortcode
vc_map( array(
	"name" => __("Login and Register Form", "amz-composer-plugins"), //Title
	"base" => "login_register_form", //Shortcode name
	"class" => "",
	"icon" => "icon-pixel8es",
	"category" => 'By Composer', //category
	"params" => array(

		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Login Form Title', 'amz-composer-plugins' ),
			'param_name' => 'login_form_title',
			'value' => esc_html__( 'Login', 'amz-composer-plugins' ),
			'description' => esc_html__( 'Type the login form title', 'amz-composer-plugins' )
		),

		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Login Button Text', 'amz-composer-plugins' ),
			'param_name' => 'login_btn_txt',
			'value' => esc_html__( 'Submit', 'amz-composer-plugins' ),
			'description' => esc_html__( 'Type the login form button text', 'amz-composer-plugins' )
		),

		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Reset Title', 'amz-composer-plugins' ),
			'param_name' => 'reset_title',
			'value' => esc_html__( 'Reset Password', 'amz-composer-plugins' ),
			'description' => esc_html__( 'Type the reset form title', 'amz-composer-plugins' )
		),

		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Reset Button Text', 'amz-composer-plugins' ),
			'param_name' => 'reset_btn_txt',
			'value' => esc_html__( 'Submit', 'amz-composer-plugins' ),
			'description' => esc_html__( 'Type the reset button text', 'amz-composer-plugins' )
		),

		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'My Account Title', 'amz-composer-plugins' ),
			'param_name' => 'my_account_title',
			'value' => esc_html__( 'My Account', 'amz-composer-plugins' ),
			'description' => esc_html__( 'Type the my account title', 'amz-composer-plugins' )
		),

		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Update Button Text', 'amz-composer-plugins' ),
			'param_name' => 'update_btn_txt',
			'value' => esc_html__( 'Update', 'amz-composer-plugins' ),
			'description' => esc_html__( 'Type the update button text', 'amz-composer-plugins' )
		),

		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Register Form Title', 'amz-composer-plugins' ),
			'param_name' => 'register_form_title',
			'value' => esc_html__( 'Register', 'amz-composer-plugins' ),
			'description' => esc_html__( 'Type the register form title', 'amz-composer-plugins' )
		),

		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'RegisterButton Button Text', 'amz-composer-plugins' ),
			'param_name' => 'register_btn_txt',
			'value' => esc_html__( 'Submit', 'amz-composer-plugins' ),
			'description' => esc_html__( 'Type the register form button text', 'amz-composer-plugins' )
		)
	)

) );

// Single Image Link
vc_map( array(
	"name" => __("Single Image Link", "amz-composer-plugins"), //Title
	"base" => "single_image_link", //Shortcode name
	"class" => "",
	"icon" => "icon-pixel8es",
	"category" => 'By Composer', //category
	"params" => array(
		
		array(
			"type" => "dropdown",
			"heading" => __("Image Link Style", "amz-composer-plugins"),
			"param_name" => "image_link",
			"value" => array(__('Image and Content with Link', "amz-composer-plugins") => "img_con_with_link",  
							 __('Content with Link', "amz-composer-plugins") => "con_with_link",  
							 __('None', "amz-composer-plugins") => ""),			
			),

		array(
			"type" => "attach_image",
			"heading" => esc_html__("Front Image", "amz-composer-plugins"),
			"param_name" => "front_image",
			"value" => "",
			"dependency" => array('element' => "image_link", 'value' => array('img_con_with_link', 'con_with_link'))
			),

		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Image url', 'amz-composer-plugins' ),
			'param_name' => 'link_url',
			'value' => '',
			'description' => esc_html__( 'Link Url Enter', 'amz-composer-plugins' ),
			"dependency" => array('element' => "image_link", 'value' => array('img_con_with_link', 'con_with_link'))
			),

		array(
			"type" => "dropdown",
			"heading" => __("Image Link Target?", "amz-composer-plugins"),
			"param_name" => "link_target",
			"value" => array(__('Open Same Page', "amz-composer-plugins") => "_self",  
							 __('Open New Tab', "amz-composer-plugins") => "_blank"),
			"description" => '',
			"dependency" => array('element' => "image_link", 'value' => array('img_con_with_link', 'con_with_link'))
			),

		array(
			"type" => "colorpicker",
			"heading" => __("Contents Background Color", "amz-composer-plugins"),
			"param_name" => "background_color", 
			"value" => '',
			'group' => __( 'Contents', 'amz-composer-plugins' )
			),

		array(
			"type" => "textfield",
			"heading" => __("Title", "amz-composer-plugins"),
			"param_name" => "title",
			"admin_label" => true,
			"value" => "Section Title",
			"description" => __("Enter the title.", "amz-composer-plugins"),
			'group' => __( 'Contents', 'amz-composer-plugins' )
			),

		array(
			"type" => "dropdown",
			"heading" => __("Title Tag", "amz-composer-plugins"),
			"param_name" => "title_tag",
			"value" => array('h2','h1','h3','h4','h5','h6'),
			"description" => __("Select title tag.", "amz-composer-plugins"),
			'group' => __( 'Contents', 'amz-composer-plugins' )
			),

		array(
			"type" => "dropdown",
			"heading" => __("Display Title in UPPERCASE", "amz-composer-plugins"),
			"param_name" => "title_uppercase",
			"value" => array(__('Yes', "amz-composer-plugins") => "yes", 
							 __('No', "amz-composer-plugins") => "no"),
			"description" => __("Do you want display in all caps?", "amz-composer-plugins"),
			'group' => __( 'Contents', 'amz-composer-plugins' )
			),

		array(
			"type" => "colorpicker",
			"heading" => __("Title Color", "amz-composer-plugins"),
			"param_name" => "title_color", 
			"value" => '',
			'group' => __( 'Contents', 'amz-composer-plugins' )
			),

		array(
			"type" => "textfield",
			"heading" => __("Custom Title Font Size?", "amz-composer-plugins"),
			"param_name" => "custom_size",
			"value" => "",
			"description" => __("Enter the font size in px(Ex: 50px) or Leave it empty to apply theme default", "amz-composer-plugins"),
			'group' => __( 'Contents', 'amz-composer-plugins' )
			),

		array(
			"type" => "textfield",
			"class" => "",
			"heading" => __("Description", "amz-composer-plugins"),
			"param_name" => "content", 
			"value" => '', 
			"description" => __("Enter the Description", "amz-composer-plugins"),
			'group' => __( 'Contents', 'amz-composer-plugins' )
			),

		array(
			"type" => "colorpicker",
			"heading" => __("Text Color", "amz-composer-plugins"),
			"param_name" => "text_color", 
			"value" => '',
			'group' => __( 'Contents', 'amz-composer-plugins' )
			),	
	)	

) );

// Single Image Link
vc_map( array(
	"name" => esc_html__( 'Project Details', 'amz-composer-plugins' ), //Title
	"base" => 'single_portfolio_project_details', //Shortcode name
	"class" => '',
	"icon" => 'icon-pixel8es',
	"category" => esc_html__( 'Single Portfolio', 'amz-composer-plugins' ), //category
	"params" => array(

		array(
			'type' => 'param_group',
			'heading' => esc_html__( 'Details', 'amz-composer-plugins' ),
			'param_name' => 'details',
			'value' => urlencode( json_encode( array(
				array(
					'title' => esc_html__( 'Title', 'amz-composer-plugins' ),
					'value' => esc_html__( 'Value', 'amz-composer-plugins' ),
				)
			) ) ),
			'params' => array(
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Title', 'amz-composer-plugins' ),
					'param_name' => 'title',
					'description' => esc_html__( 'Enter title for chart dataset.', 'amz-composer-plugins' ),
					'admin_label' => true,
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Value', 'amz-composer-plugins' ),
					'param_name' => 'value',
					'description' => esc_html__( 'Enter the value', 'amz-composer-plugins' ),
				)
			)
		),
		
		array(
			"type" => "textfield",
			"heading" => __("Extra class", "amz-composer-plugins"),
			"param_name" => "el_class",
			"value" => "",
			"description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "amz-composer-plugins")
		),
	)	

) );