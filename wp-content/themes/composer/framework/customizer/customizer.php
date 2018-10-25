<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
composer_require_file( COMPOSER_CUSTOMIZER . '/kirki/kirki.php' );
composer_require_file( COMPOSER_CUSTOMIZER . '/customizer-helper.php' );
composer_require_file( COMPOSER_CUSTOMIZER . '/class-composer-kirki.php' );

add_action( 'customize_preview_init', 'composer_customize_preview_js' );
function composer_customize_preview_js() {
	wp_enqueue_script( 'composer_customizer_js', COMPOSER_CUSTOMIZER_URI . '/js/customizer.js', array( 'customize-preview' ), '20170207', true );		
}

/* Header Options */
Composer_Kirki::add_panel( 'header_option_panel', array(
    'priority'    => 15,
    'title'       => esc_html__( 'Header', 'composer' ),
    'description' => esc_html__( 'All top header settings can be changed here!', 'composer' ),
) );

/* Other Top Header Settings */
Composer_Kirki::add_section( 'top_header_section', array(
    'title'          => esc_html__( 'Top Header Settings', 'composer' ),
    'description'    => esc_html__( 'Add header styles', 'composer' ),
    'panel'			 => 'header_option_panel'
) );

Composer_Kirki::add_field( 'top_header', array(
	'type'     => 'radio-buttonset',
	'settings' => 'top_header',
	'label'    => esc_html__( 'Show Top Header?', 'composer' ),
	'section'  => 'top_header_section',
	'default'     => 'hide',
	'choices'     => array(
		'show'  => esc_attr__( 'Yes', 'composer' ),
		'hide'  => esc_attr__( 'No', 'composer' ),
	)
) );

Composer_Kirki::add_field( 'top_header_position', array(
	'type'     => 'radio-buttonset',
	'settings' => 'top_header_position',
	'label'    => esc_html__( 'Choose top header position', 'composer' ),
	'section'  => 'top_header_section',
	'default'     => 'top',
	'choices'     => array(
		'top'  => esc_attr__( 'Top', 'composer' ),
		'bottom'  => esc_attr__( 'Bottom', 'composer' ),
	),
	'active_callback'    => array(
		array(
			'setting'  => 'top_header',
			'operator' => '==',
			'value'    => 'show',
		),
	),
) );

Composer_Kirki::add_field( 'top_section_style', array(
	'type'     => 'radio-buttonset',
	'settings' => 'top_section_style',
	'label'    => esc_html__( 'Top Header Background Style', 'composer' ),
	'description'  => esc_html__( 'Select Top Header Background Style. Dark = White Text and Black Background; Light = Black Text and White Background.', 'composer' ),
	'section'  => 'top_header_section',
	'default'     => 'dark',
	'choices'     => array(
		'dark'    => esc_attr__( 'Dark', 'composer' ),
		'light'   => esc_attr__( 'Light', 'composer' ),
	),
	'active_callback'    => array(
		array(
			'setting'  => 'top_header',
			'operator' => '==',
			'value'    => 'show',
		),
	),	
	'transport' => 'postMessage'
) );

Composer_Kirki::add_field( 'top_header_mobile', array(
	'type'     => 'radio-buttonset',
	'settings' => 'top_header_mobile',
	'label'    => esc_html__( 'Top Header on Mobile?', 'composer' ),
	'description'  => esc_html__( 'Choose Show or Hide top header on Mobile.', 'composer' ),
	'section'  => 'top_header_section',
	'default'     => 'hide',
	'choices'     => array(
		'show'    => esc_attr__( 'Show', 'composer' ),
		'hide'   => esc_attr__( 'Hide', 'composer' ),
	),
	'transport' => 'postMessage',
	'active_callback'    => array(
		array(
			'setting'  => 'top_header',
			'operator' => '==',
			'value'    => 'show',
		),
	),
) );

Composer_Kirki::add_field( 'top_email', array(
	'type'     => 'text',
	'settings' => 'top_email',
	'label'    => __( 'Text Control', 'composer' ),
	'section'  => 'top_header_section',
	'default'  => esc_attr( 'info@yoursite.com' ),
	'transport' => 'postMessage',
	'active_callback'    => array(
		array(
			'setting'  => 'top_header',
			'operator' => '==',
			'value'    => 'show',
		),
	),
) );

Composer_Kirki::add_field( 'top_tel', array(
	'type'     => 'text',
	'settings' => 'top_tel',
	'label'    => __( 'Text Control', 'composer' ),
	'section'  => 'top_header_section',
	'default'  => esc_attr( '+ (009) 123 4567' ),
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.top-header-tel-text',
			'function' => 'html'
		)
	),
	'active_callback'    => array(
		array(
			'setting'  => 'top_header',
			'operator' => '==',
			'value'    => 'show',
		),
	),
) );

/* Top Header Socail Icons */
Composer_Kirki::add_section( 'top_header_social_section', array(
    'title'          => __( 'Social Icons', 'composer' ),
    'panel'			 => 'header_option_panel'
) );

Composer_Kirki::add_field( 'top_facebook', array(
	'type'     => 'text',
	'settings' => 'top_facebook',
	'label'    => __( 'Facebook URL', 'composer' ),
	'section'  => 'top_header_social_section',
	'default'  => '',
	'transport' => 'postMessage',
	'partial_refresh' => array(
		'top_facebook' => array(
			'selector'        => '.pageTopCon .social-icons',
			'render_callback' => 'composer_social_icons',
		),
	),
) );

Composer_Kirki::add_field( 'top_twitter', array(
	'type'     => 'text',
	'settings' => 'top_twitter',
	'label'    => __( 'Twitter URL', 'composer' ),
	'section'  => 'top_header_social_section',
	'default'  => '',
	'transport' => 'postMessage',
	'partial_refresh' => array(
		'top_twitter' => array(
			'selector'        => '.pageTopCon .social-icons',
			'render_callback' => 'composer_social_icons',
		),
	),
) );

Composer_Kirki::add_field( 'top_gplus', array(
	'type'     => 'text',
	'settings' => 'top_gplus',
	'label'    => __( 'GPlus URL', 'composer' ),
	'section'  => 'top_header_social_section',
	'default'  => '',
	'transport' => 'postMessage',
	'partial_refresh' => array(
		'top_gplus' => array(
			'selector'        => '.pageTopCon .social-icons',
			'render_callback' => 'composer_social_icons',
		),
	),
) );

Composer_Kirki::add_field( 'top_linkedin', array(
	'type'     => 'text',
	'settings' => 'top_linkedin',
	'label'    => __( 'LinkedIn URL', 'composer' ),
	'section'  => 'top_header_social_section',
	'default'  => '',
	'transport' => 'postMessage',
	'partial_refresh' => array(
		'top_linkedin' => array(
			'selector'        => '.pageTopCon .social-icons',
			'render_callback' => 'composer_social_icons',
		),
	),
) );

Composer_Kirki::add_field( 'top_dribble', array(
	'type'     => 'text',
	'settings' => 'top_dribble',
	'label'    => __( 'Dribbble URL', 'composer' ),
	'section'  => 'top_header_social_section',
	'default'  => '',
	'transport' => 'postMessage',
	'partial_refresh' => array(
		'top_dribble' => array(
			'selector'        => '.pageTopCon .social-icons',
			'render_callback' => 'composer_social_icons',
		),
	),
) );

Composer_Kirki::add_field( 'top_instagram', array(
	'type'     => 'text',
	'settings' => 'top_instagram',
	'label'    => __( 'Instagram URL', 'composer' ),
	'section'  => 'top_header_social_section',
	'default'  => '',
	'transport' => 'postMessage',
	'partial_refresh' => array(
		'top_instagram' => array(
			'selector'        => '.pageTopCon .social-icons',
			'render_callback' => 'composer_social_icons',
		),
	),
) );

Composer_Kirki::add_field( 'top_flickr', array(
	'type'     => 'text',
	'settings' => 'top_flickr',
	'label'    => __( 'Flickr URL', 'composer' ),
	'section'  => 'top_header_social_section',
	'default'  => '',
	'transport' => 'postMessage',
	'partial_refresh' => array(
		'top_flickr' => array(
			'selector'        => '.pageTopCon .social-icons',
			'render_callback' => 'composer_social_icons',
		),
	),
) );

Composer_Kirki::add_field( 'top_pinterest', array(
	'type'     => 'text',
	'settings' => 'top_pinterest',
	'label'    => __( 'Pinterest URL', 'composer' ),
	'section'  => 'top_header_social_section',
	'default'  => '',
	'transport' => 'postMessage',
	'partial_refresh' => array(
		'top_pinterest' => array(
			'selector'        => '.pageTopCon .social-icons',
			'render_callback' => 'composer_social_icons',
		),
	),
) );

Composer_Kirki::add_field( 'top_tumblr', array(
	'type'     => 'text',
	'settings' => 'top_tumblr',
	'label'    => __( 'Tumblr URL', 'composer' ),
	'section'  => 'top_header_social_section',
	'default'  => '',
	'transport' => 'postMessage',
	'partial_refresh' => array(
		'top_tumblr' => array(
			'selector'        => '.pageTopCon .social-icons',
			'render_callback' => 'composer_social_icons',
		),
	),
) );

Composer_Kirki::add_field( 'top_rss', array(
	'type'     => 'text',
	'settings' => 'top_rss',
	'label'    => __( 'RSS URL', 'composer' ),
	'section'  => 'top_header_social_section',
	'default'  => '',
	'transport' => 'postMessage',
	'partial_refresh' => array(
		'top_rss' => array(
			'selector'        => '.pageTopCon .social-icons',
			'render_callback' => 'composer_social_icons',
		),
	),
) );

/* Other Top Header Settings */
Composer_Kirki::add_section( 'header_option_section', array(
    'title'          => esc_html__( 'Header Options', 'composer' ),
    'panel'			 => 'header_option_panel'
) );

Composer_Kirki::add_field( 'header_hide', array(
	'type'     => 'radio-buttonset',
	'settings' => 'header_hide',
	'label'    => esc_html__( 'Show/Hide Header?', 'composer' ),
	'section'  => 'header_option_section',
	'default'  => 'show',
	'choices'  => array(
		'show'  => esc_attr__( 'Show', 'composer' ),
		'hide'  => esc_attr__( 'Hide', 'composer' ),
	)
) );

Composer_Kirki::add_field( 'header_width', array(
	'type'     => 'radio-buttonset',
	'settings' => 'header_width',
	'label'    => esc_html__( 'Header Layout Style.', 'composer' ),
	'section'  => 'header_option_section',
	'default'  => 'wide',
	'choices'  => array(
		'wide'  => esc_attr__( 'Wide', 'composer' ),
		'boxed'  => esc_attr__( 'Boxed', 'composer' ),
	)
) );

Composer_Kirki::add_field( 'header_sticky', array(
	'type'     => 'radio-buttonset',
	'settings' => 'header_sticky',
	'label'    => esc_html__( 'Sticky Header?', 'composer' ),
	'section'  => 'header_option_section',
	'default'  => 'scroll_up',
	'choices'  => array(
		'disable'  => esc_attr__( 'Disable', 'composer' ),
		'enable'  => esc_attr__( 'Enable', 'composer' ),
		'scroll_up'  => esc_attr__( 'Show On Scroll Up', 'composer' ),
	)
) );

Composer_Kirki::add_field( 'header_sticky_responsive', array(
	'type'     => 'radio-buttonset',
	'settings' => 'header_sticky_responsive',
	'label'    => esc_html__( 'Enable Sticky Header on Mobile Devices?', 'composer' ),
	'section'  => 'header_option_section',
	'default'  => 'disable',
	'choices'  => array(
		'disable'  => esc_attr__( 'Disable', 'composer' ),
		'enable'  => esc_attr__( 'Enable', 'composer' ),
	)
) );

Composer_Kirki::add_field( 'header_sticky_color', array(
	'type'     => 'radio-buttonset',
	'settings' => 'header_sticky_color',
	'label'    => esc_html__( 'Sticky Header Background', 'composer' ),
	'section'  => 'header_option_section',
	'default'  => 'light',
	'choices'  => array(
		'dark'  => esc_attr__( 'Dark', 'composer' ),
		'light'  => esc_attr__( 'Light', 'composer' ),
	),
	'active_callback'    => array(
		array(
			'setting'  => 'header_sticky',
			'operator' => '==',
			'value'    => 'enable'
		)
	),
	'transport' => 'postMessage',
) );

Composer_Kirki::add_field( 'main_menu', array(
	'type'     => 'radio-buttonset',
	'settings' => 'main_menu',
	'label'    => esc_html__( 'Main Menu Style', 'composer' ),
	'section'  => 'header_option_section',
	'default'  => 'dark',
	'choices'  => array(
		'dark'  => esc_attr__( 'Dark', 'composer' ),
		'light'  => esc_attr__( 'Light', 'composer' ),
	),
	'transport' => 'postMessage',
) );

Composer_Kirki::add_field( 'sub_menu', array(
	'type'     => 'radio-buttonset',
	'settings' => 'sub_menu',
	'label'    => esc_html__( 'Sub Menu Background', 'composer' ),
	'section'  => 'header_option_section',
	'default'  => 'light',
	'choices'  => array(
		'dark'  => esc_attr__( 'Dark', 'composer' ),
		'light'  => esc_attr__( 'Light', 'composer' ),
	),
	'transport' => 'postMessage',
) );

Composer_Kirki::add_field( 'show_lang_sel', array(
	'type'     => 'radio-buttonset',
	'settings' => 'show_lang_sel',
	'label'    => esc_html__( 'Show Language Selector?', 'composer' ),
	'section'  => 'header_option_section',
	'default'  => 'no',
	'choices'  => array(
		'yes'  => esc_attr__( 'Yes', 'composer' ),
		'no'  => esc_attr__( 'No', 'composer' ),
	)
) );

Composer_Kirki::add_field( 'wpml_lang_style', array(
	'type'     => 'radio-buttonset',
	'settings' => 'wpml_lang_style',
	'label'    => esc_html__( 'WPML Language Selector Style', 'composer' ),
	'section'  => 'header_option_section',
	'default'  => 'dropdown',
	'choices'  => array(
		'normal'  => esc_attr__( 'Normal', 'composer' ),
		'dropdown'  => esc_attr__( 'Dropdown', 'composer' ),
	),
	'active_callback'    => array(
		array(
			'setting'  => 'show_lang_sel',
			'operator' => '==',
			'value'    => 'yes',
		),
	),
) );

Composer_Kirki::add_field( 'wpml_lang_style', array(
	'type'     => 'radio-buttonset',
	'settings' => 'wpml_lang_style',
	'label'    => esc_html__( 'WPML Language Display Style', 'composer' ),
	'section'  => 'header_option_section',
	'default'  => 'flag',
	'choices'  => array(
		'lang_code'  => esc_attr__( 'Language Code', 'composer' ),
		'lang_name'  => esc_attr__( 'Language Name', 'composer' ),
		'flag'  => esc_attr__( 'Flag', 'composer' ),
		'flag_with_name'  => esc_attr__( 'Flag With Name', 'composer' ),
	),
	'active_callback'    => array(
		array(
			'setting'  => 'show_lang_sel',
			'operator' => '==',
			'value'    => 'yes',
		),
	),
) );

Composer_Kirki::add_field( 'skip_missing_lang', array(
	'type'     => 'radio-buttonset',
	'settings' => 'skip_missing_lang',
	'label'    => esc_html__( 'How to handle languages without translation', 'composer' ),
	'section'  => 'header_option_section',
	'default'  => 'yes',
	'choices'  => array(
		'yes'  => esc_attr__( 'Skip language', 'composer' ),
		'no'  => esc_attr__( 'Link to home of language', 'composer' ),
	),
	'active_callback'    => array(
		array(
			'setting'  => 'show_lang_sel',
			'operator' => '==',
			'value'    => 'yes',
		),
	),
) );

Composer_Kirki::add_field( 'header_widget', array(
	'type'     => 'radio-buttonset',
	'settings' => 'header_widget',
	'label'    => esc_html__( 'Show/Hide Header Widget?', 'composer' ),
	'section'  => 'header_option_section',
	'default'  => 'hide',
	'choices'  => array(
		'show'  => esc_attr__( 'Show', 'composer' ),
		'hide'  => esc_attr__( 'Hide', 'composer' ),
	)
) );

//Header widget columns
$columns = array(
	"col3" => esc_html__("Three", "composer"),
	"col4" => esc_html__("Four", "composer")
	);

Composer_Kirki::add_field( 'header_widget_col', array(
	'type'     => 'radio-buttonset',
	'settings' => 'header_widget_col',
	'label'    => esc_html__( 'Header Widget Columns?', 'composer' ),
	'section'  => 'header_option_section',
	'default'  => 'hide',
	'choices'  => $columns,
	'active_callback'    => array(
		array(
			'setting'  => 'header_widget',
			'operator' => '==',
			'value'    => 'show',
		),
	),
) );

Composer_Kirki::add_field( 'header_select_sidebar', array(
	'type'     => 'select',
	'settings' => 'header_select_sidebar',
	'label'    => esc_html__( 'Choose the Registered Sidebar?', 'composer' ),
	'section'  => 'header_option_section',
	'default'  => 'hide',
	'choices'  => composer_get_registered_sidebars( array( 'header-widgets' ) ),
	'active_callback'    => array(
		array(
			'setting'  => 'header_widget',
			'operator' => '==',
			'value'    => 'show',
		),
	),
) );

/* Header Layout */
Composer_Kirki::add_section( 'header_layout_section', array(
    'title'          => __( 'Header Layout', 'composer' ),
    'panel'			 => 'header_option_panel'
) );

Composer_Kirki::add_field( 'header_background_style', array(
	'type'     => 'radio-buttonset',
	'settings' => 'header_background_style',
	'label'    => esc_html__( 'Header Background Style', 'composer' ),
	'section'  => 'header_layout_section',
	'default'  => 'light',
	'choices'  => array(
		'dark'  => esc_attr__( 'Dark', 'composer' ),
		'light'  => esc_attr__( 'Light', 'composer' ),
	),
	'transport' => 'postMessage',
) );

Composer_Kirki::add_field( 'header_line', array(
	'type'     => 'radio-buttonset',
	'settings' => 'header_line',
	'label'    => esc_html__( 'Show/Hide Header border on Bottom?', 'composer' ),
	'section'  => 'header_layout_section',
	'default'     => 'yes',
	'choices'     => array(
		'yes'  => esc_attr__( 'Yes', 'composer' ),
		'no'  => esc_attr__( 'No', 'composer' ),
	),
	'transport' => 'postMessage',
) );

Composer_Kirki::add_field( 'transparent_header', array(
	'type'     => 'radio-buttonset',
	'settings' => 'transparent_header',
	'label'    => esc_html__( 'Enable Transparent Header?', 'composer' ),
	'section'  => 'header_layout_section',
	'default'  => 'hide',
	'choices'  => array(
		'show'  => esc_attr__( 'Yes', 'composer' ),
		'hide'  => esc_attr__( 'No', 'composer' ),
	)
) );

Composer_Kirki::add_field( 'transparent_header_opacity', array(
	'type'     => 'slider',
	'settings' => 'transparent_header_opacity',
	'label'    => esc_html__( 'Do you like to enable transparent header?', 'composer' ),
	'section'  => 'header_layout_section',
	'default'  => '0',
	'choices'  => array(
		'min'  => '0',
		'max'  => '90',
		'step' => '10',
	),
	'transport' => 'postMessage',
	'active_callback'    => array(
		array(
			'setting'  => 'transparent_header',
			'operator' => '==',
			'value'    => 'show',
		),
	),
) );


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

Composer_Kirki::add_field( 'header_layout', array(
	'type'        => 'radio-image',
	'settings'    => 'header_layout',
	'label'       => esc_html__( 'Main Header Layout', 'composer' ),
	'section'     => 'header_layout_section',
	'default'     => 'header-2',
	'choices'     => $headers,
) );

Composer_Kirki::add_field( 'lr_menu_align', array(
	'type'     => 'radio-buttonset',
	'settings' => 'lr_menu_align',
	'label'    => esc_html__( 'Left and Right Header Menu Alignment', 'composer' ),
	'section'  => 'header_layout_section',
	'default'  => 'center',
	'choices'  => array(
		'center'  => esc_attr__( 'Center', 'composer' ),
		'top'  => esc_attr__( 'Top', 'composer' ),
	),
	'active_callback'    => array(
		array(
			'setting'  => 'header_layout',
			'operator' => 'contains',
			'value'    => 'left-header,right-header'
		)
	),
	'transport' => 'postMessage'
) );

Composer_Kirki::add_field( 'lr_text_align', array(
	'type'     => 'radio-buttonset',
	'settings' => 'lr_text_align',
	'label'    => esc_html__( 'Left and Right Header Text Alignment', 'composer' ),
	'section'  => 'header_layout_section',
	'default'  => 'center',
	'choices'  => array(
		'center'  => esc_attr__( 'Center', 'composer' ),
		'left'  => esc_attr__( 'Left', 'composer' ),
	),
	'active_callback'    => array(
		array(
			'setting'  => 'header_layout',
			'operator' => 'contains',
			'value'    => 'left-header,right-header'
		)
	),
	'transport' => 'postMessage'
) );

Composer_Kirki::add_field( 'lr_nav_line', array(
	'type'     => 'radio-buttonset',
	'settings' => 'lr_nav_line',
	'label'    => esc_html__( 'Menu Border for Left and Right Header', 'composer' ),
	'section'  => 'header_layout_section',
	'default'  => 'yes',
	'choices'  => array(
		'yes'  => esc_attr__( 'Yes', 'composer' ),
		'no'  => esc_attr__( 'No', 'composer' ),
	),
	'active_callback'    => array(
		array(
			'setting'  => 'header_layout',
			'operator' => 'contains',
			'value'    => 'left-header,right-header'
		)
	),
	'transport' => 'postMessage'
) );

/* Menu Styles */
Composer_Kirki::add_section( 'header_menu_section', array(
    'title'          => __( 'Menu Styles', 'composer' ),
    'panel'			 => 'header_option_panel'
) );

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

Composer_Kirki::add_field( 'header_menu_section', array(
	'type'        => 'radio-image',
	'settings'    => 'header_hover_layout',
	'label'       => esc_html__( 'Main Header Menu Style', 'composer' ),
	'section'     => 'header_menu_section',
	'default'     => 'none',
	'choices'     => $headers_hover,
) );

/* Menu Styles */
Composer_Kirki::add_section( 'mobile_menu_section', array(
    'title'          => __( 'Mobile Options', 'composer' ),
    'panel'			 => 'header_option_panel'
) );

Composer_Kirki::add_field( 'display_menu', array(
	'type'     => 'radio-buttonset',
	'settings' => 'display_menu',
	'label'    => esc_html__( 'Menu on Mobile?', 'composer' ),
	'section'  => 'mobile_menu_section',
	'default'  => 'show',
	'choices'  => array(
		'show'  => esc_attr__( 'Show', 'composer' ),
		'hide'  => esc_attr__( 'Hide', 'composer' ),
	)
) );

Composer_Kirki::add_field( 'mobile_menu_align', array(
	'type'     => 'radio-buttonset',
	'settings' => 'mobile_menu_align',
	'label'    => esc_html__( 'Mobile Menu on which side?', 'composer' ),
	'section'  => 'mobile_menu_section',
	'default'  => 'left',
	'choices'  => array(
		'left'  => esc_attr__( 'Left', 'composer' ),
		'right'  => esc_attr__( 'Right', 'composer' ),
	)
) );

Composer_Kirki::add_field( 'mobile_menu_dropdown', array(
	'type'     => 'radio-buttonset',
	'settings' => 'mobile_menu_dropdown',
	'label'    => esc_html__( 'Mobile Menu Dropdown?', 'composer' ),
	'section'  => 'mobile_menu_section',
	'default'  => 'yes',
	'choices'  => array(
		'yes'  => esc_attr__( 'Yes', 'composer' ),
		'no'  => esc_attr__( 'No', 'composer' ),
	)
) );

/* Sub Header Styles */
Composer_Kirki::add_section( 'sub_header_section', array(
    'title'          => __( 'Sub Header Options', 'composer' ),
    'panel'			 => 'header_option_panel'
) );

Composer_Kirki::add_field( 'title_bar', array(
	'type'     => 'radio-buttonset',
	'settings' => 'title_bar',
	'label'    => esc_html__( 'Show/Hide Title Bar?', 'composer' ),
	'section'  => 'sub_header_section',
	'default'  => 'show',
	'choices'  => array(
		'show'  => esc_attr__( 'Show', 'composer' ),
		'hide'  => esc_attr__( 'Hide', 'composer' ),
	)
) );

Composer_Kirki::add_field( 'breadcrumbs', array(
	'type'     => 'radio-buttonset',
	'settings' => 'breadcrumbs',
	'label'    => esc_html__( 'Show/Hide Breadcrumbs?', 'composer' ),
	'section'  => 'sub_header_section',
	'default'  => 'show',
	'choices'  => array(
		'show'  => esc_attr__( 'Show', 'composer' ),
		'hide'  => esc_attr__( 'Hide', 'composer' ),
	),
	'active_callback'    => array(
		array(
			'setting'  => 'title_bar',
			'operator' => '==',
			'value'    => 'show',
		),
	),
) );

Composer_Kirki::add_field( 'title_bar_size', array(
	'type'     => 'radio-buttonset',
	'settings' => 'title_bar_size',
	'label'    => esc_html__( 'Title Bar Size', 'composer' ),
	'section'  => 'sub_header_section',
	'default'  => 'small',
	'choices'  => array(
		'small'  => esc_attr__( 'Small', 'composer' ),
		'medium'  => esc_attr__( 'Medium', 'composer' ),
		'large'  => esc_attr__( 'Large', 'composer' ),
	),
	'active_callback'    => array(
		array(
			'setting'  => 'title_bar',
			'operator' => '==',
			'value'    => 'show',
		),
	),
) );

Composer_Kirki::add_field( 'title_bar_style', array(
	'type'     => 'radio-buttonset',
	'settings' => 'title_bar_style',
	'label'    => esc_html__( 'Title Bar Background Image Overlay Style', 'composer' ),
	'section'  => 'sub_header_section',
	'default'  => 'default',
	'choices'  => array(
		'default'  => esc_attr__( 'Default', 'composer' ),
		'custom'  => esc_attr__( 'Custom', 'composer' ),
	),
	'active_callback'    => array(
		array(
			'setting'  => 'title_bar',
			'operator' => '==',
			'value'    => 'show',
		),
	),
) );

Composer_Kirki::add_field( 'title_bar_bg_color', array(
	'type'     => 'color',
	'settings' => 'title_bar_bg_color',
	'label'    => esc_html__( 'Title bar background color', 'composer' ),
	'section'  => 'sub_header_section',
	'default'  => '',	
	'choices'  => array(
		'alpha' => true,
	),
	'active_callback'    => array(
		array(
			'setting'  => 'title_bar',
			'operator' => '==',
			'value'    => 'show',
		),
		array(
			'setting'  => 'title_bar_style',
			'operator' => '==',
			'value'    => 'custom',
		),
	),
) );

Composer_Kirki::add_field( 'title_bar_bg_image', array(
	'type'     => 'image',
	'settings' => 'title_bar_bg_image',
	'label'    => esc_html__( 'Upload Title Bar Background Image', 'composer' ),
	'section'  => 'sub_header_section',
	'default'  => '',	
	'active_callback'    => array(
		array(
			'setting'  => 'title_bar',
			'operator' => '==',
			'value'    => 'show',
		),
		array(
			'setting'  => 'title_bar_style',
			'operator' => '==',
			'value'    => 'custom',
		),
	),
) );

Composer_Kirki::add_field( 'title_bar_overlay', array(
	'type'     => 'radio-buttonset',
	'settings' => 'title_bar_overlay',
	'label'    => esc_html__( 'Background Image Overlay Style', 'composer' ),
	'section'  => 'sub_header_section',
	'default'  => 'color',
	'choices'  => array(
		'gradient'  => esc_attr__( 'Gradient', 'composer' ),
		'color'  => esc_attr__( 'Color', 'composer' ),
	),
	'active_callback'    => array(
		array(
			'setting'  => 'title_bar',
			'operator' => '==',
			'value'    => 'show',
		),
		array(
			'setting'  => 'title_bar_style',
			'operator' => '==',
			'value'    => 'custom',
		),
	),
) );

Composer_Kirki::add_field( 'title_bar_overlay_color', array(
	'type'     => 'color',
	'settings' => 'title_bar_overlay_color',
	'label'    => esc_html__( 'Background Image Overlay Color', 'composer' ),
	'section'  => 'sub_header_section',
	'default'  => '',	
	'choices'  => array(
		'alpha' => true,
	),
	'active_callback'    => array(
		array(
			'setting'  => 'title_bar',
			'operator' => '==',
			'value'    => 'show',
		),
		array(
			'setting'  => 'title_bar_style',
			'operator' => '==',
			'value'    => 'custom',
		),
		array(
			'setting'  => 'title_bar_overlay',
			'operator' => '==',
			'value'    => 'color',
		),
	),
) );

Composer_Kirki::add_field( 'title_bar_gradient_top_value', array(
	'type'     => 'color',
	'settings' => 'title_bar_gradient_top_value',
	'label'    => esc_html__( 'Background Image Overlay Gradient Top Value', 'composer' ),
	'section'  => 'sub_header_section',
	'default'  => '',	
	'active_callback'    => array(
		array(
			'setting'  => 'title_bar',
			'operator' => '==',
			'value'    => 'show',
		),
		array(
			'setting'  => 'title_bar_style',
			'operator' => '==',
			'value'    => 'custom',
		),
		array(
			'setting'  => 'title_bar_overlay',
			'operator' => '==',
			'value'    => 'gradient',
		),
	),
) );


Composer_Kirki::add_field( 'title_bar_gradient_middle_value', array(
	'type'     => 'color',
	'settings' => 'title_bar_gradient_middle_value',
	'label'    => esc_html__( 'Background Image Overlay Gradient Middle Value', 'composer' ),
	'section'  => 'sub_header_section',
	'default'  => '',	
	'active_callback'    => array(
		array(
			'setting'  => 'title_bar',
			'operator' => '==',
			'value'    => 'show',
		),
		array(
			'setting'  => 'title_bar_style',
			'operator' => '==',
			'value'    => 'custom',
		),
		array(
			'setting'  => 'title_bar_overlay',
			'operator' => '==',
			'value'    => 'gradient',
		),
	),
) );


Composer_Kirki::add_field( 'title_bar_gradient_bottom_value', array(
	'type'     => 'color',
	'settings' => 'title_bar_gradient_bottom_value',
	'label'    => esc_html__( 'Background Image Overlay Gradient Bottom Value', 'composer' ),
	'section'  => 'sub_header_section',
	'default'  => '',	
	'active_callback'    => array(
		array(
			'setting'  => 'title_bar',
			'operator' => '==',
			'value'    => 'show',
		),
		array(
			'setting'  => 'title_bar_style',
			'operator' => '==',
			'value'    => 'custom',
		),
		array(
			'setting'  => 'title_bar_overlay',
			'operator' => '==',
			'value'    => 'gradient',
		),
	),
) );

/* Sub Header Styles */
Composer_Kirki::add_section( 'custom_header_style_section', array(
    'title'          => __( 'Header Custom Styles', 'composer' ),
    'panel'			 => 'header_option_panel'
) );

Composer_Kirki::add_field( 'custom_header_styles', array(
	'type'     => 'radio-buttonset',
	'settings' => 'custom_header_styles',
	'label'    => esc_html__( 'Custom Header Styles?', 'composer' ),
	'section'  => 'custom_header_style_section',
	'default'  => 'no',
	'choices'  => array(
		'yes'  => esc_attr__( 'Yes', 'composer' ),
		'no'  => esc_attr__( 'No', 'composer' ),
	)
) );

Composer_Kirki::add_field( 'top_header_background_color', array(
	'type'     => 'color',
	'settings' => 'top_header_background_color',
	'label'    => esc_html__( 'Top Header Background Color', 'composer' ),
	'section'  => 'custom_header_style_section',
	'default'  => '',	
	'choices'  => array(
		'alpha' => true,
	),
	'active_callback'    => array(
		array(
			'setting'  => 'custom_header_styles',
			'operator' => '==',
			'value'    => 'yes',
		),
	),
) );

Composer_Kirki::add_field( 'top_header_background_color', array(
	'type'     => 'color',
	'settings' => 'top_header_background_color',
	'label'    => esc_html__( 'Top Header Background Color', 'composer' ),
	'section'  => 'custom_header_style_section',
	'default'  => '',	
	'active_callback'    => array(
		array(
			'setting'  => 'custom_header_styles',
			'operator' => '==',
			'value'    => 'yes',
		),
	),
) );

Composer_Kirki::add_field( 'top_header_color', array(
	'type'     => 'color',
	'settings' => 'top_header_color',
	'label'    => esc_html__( 'Top Header Color', 'composer' ),
	'section'  => 'custom_header_style_section',
	'default'  => '',
	'active_callback'    => array(
		array(
			'setting'  => 'custom_header_styles',
			'operator' => '==',
			'value'    => 'yes',
		),
	),
) );

Composer_Kirki::add_field( 'top_header_link_color', array(
	'type'     => 'color',
	'settings' => 'top_header_link_color',
	'label'    => esc_html__( 'Top Header Link Color', 'composer' ),
	'section'  => 'custom_header_style_section',
	'default'  => '',	
	'choices'  => array(
		'alpha' => true,
	),
	'active_callback'    => array(
		array(
			'setting'  => 'custom_header_styles',
			'operator' => '==',
			'value'    => 'yes',
		),
	),
) );

Composer_Kirki::add_field( 'top_header_link_hover_color', array(
	'type'     => 'color',
	'settings' => 'top_header_link_hover_color',
	'label'    => esc_html__( 'Top Header Link Hover Color', 'composer' ),
	'section'  => 'custom_header_style_section',
	'default'  => '',	
	'choices'  => array(
		'alpha' => true,
	),
	'active_callback'    => array(
		array(
			'setting'  => 'custom_header_styles',
			'operator' => '==',
			'value'    => 'yes',
		),
	),
) );

Composer_Kirki::add_field( 'main_header_height', array(
	'type'     => 'text',
	'settings' => 'main_header_height',
	'label'    => esc_html__( 'Main Header Height', 'composer' ),
	'section'  => 'custom_header_style_section',
	'default'  => '',	
	'active_callback'    => array(
		array(
			'setting'  => 'custom_header_styles',
			'operator' => '==',
			'value'    => 'yes',
		),
	),
) );

Composer_Kirki::add_field( 'main_header_background_color', array(
	'type'     => 'color',
	'settings' => 'main_header_background_color',
	'label'    => esc_html__( 'Header Background Color', 'composer' ),
	'section'  => 'custom_header_style_section',
	'default'  => '',	
	'choices'  => array(
		'alpha' => true,
	),
	'active_callback'    => array(
		array(
			'setting'  => 'custom_header_styles',
			'operator' => '==',
			'value'    => 'yes',
		),
	),
) );

Composer_Kirki::add_field( 'main_header_color', array(
	'type'     => 'color',
	'settings' => 'main_header_color',
	'label'    => esc_html__( 'Header Color', 'composer' ),
	'section'  => 'custom_header_style_section',
	'default'  => '',	
	'choices'  => array(
		'alpha' => true,
	),
	'active_callback'    => array(
		array(
			'setting'  => 'custom_header_styles',
			'operator' => '==',
			'value'    => 'yes',
		),
	),
) );

Composer_Kirki::add_field( 'main_header_link_color', array(
	'type'     => 'color',
	'settings' => 'main_header_link_color',
	'label'    => esc_html__( 'Header Link Color', 'composer' ),
	'section'  => 'custom_header_style_section',
	'default'  => '',	
	'choices'  => array(
		'alpha' => true,
	),
	'active_callback'    => array(
		array(
			'setting'  => 'custom_header_styles',
			'operator' => '==',
			'value'    => 'yes',
		),
	),
) );

Composer_Kirki::add_field( 'main_header_link_hover_color', array(
	'type'     => 'color',
	'settings' => 'main_header_link_hover_color',
	'label'    => esc_html__( 'Header Link Hover Color', 'composer' ),
	'section'  => 'custom_header_style_section',
	'default'  => '',	
	'choices'  => array(
		'alpha' => true,
	),
	'active_callback'    => array(
		array(
			'setting'  => 'custom_header_styles',
			'operator' => '==',
			'value'    => 'yes',
		),
	),
) );

Composer_Kirki::add_field( 'menu_background_color', array(
	'type'     => 'color',
	'settings' => 'menu_background_color',
	'label'    => esc_html__( 'Menu Background Color', 'composer' ),
	'section'  => 'custom_header_style_section',
	'default'  => '',	
	'choices'  => array(
		'alpha' => true,
	),
	'active_callback'    => array(
		array(
			'setting'  => 'custom_header_styles',
			'operator' => '==',
			'value'    => 'yes',
		),
	),
) );

Composer_Kirki::add_field( 'menu_link_color', array(
	'type'     => 'color',
	'settings' => 'menu_link_color',
	'label'    => esc_html__( 'Menu Link Color', 'composer' ),
	'section'  => 'custom_header_style_section',
	'default'  => '',	
	'choices'  => array(
		'alpha' => true,
	),
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.main-nav li a',
			'function' => 'css',
			'property' => 'color',
		)
	),
	'active_callback'    => array(
		array(
			'setting'  => 'custom_header_styles',
			'operator' => '==',
			'value'    => 'yes',
		),
	),
) );

Composer_Kirki::add_field( 'menu_link_hover_color', array(
	'type'     => 'color',
	'settings' => 'menu_link_hover_color',
	'label'    => esc_html__( 'Menu Link Hover Color', 'composer' ),
	'section'  => 'custom_header_style_section',
	'default'  => '',	
	'choices'  => array(
		'alpha' => true,
	),
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.main-nav li a:hover',
			'function' => 'css',
			'property' => 'color',
		)
	),
	'active_callback'    => array(
		array(
			'setting'  => 'custom_header_styles',
			'operator' => '==',
			'value'    => 'yes',
		),
	),
) );

Composer_Kirki::add_field( 'sub_menu_background_color', array(
	'type'     => 'color',
	'settings' => 'sub_menu_background_color',
	'label'    => esc_html__( 'Sub Menu Background Color', 'composer' ),
	'section'  => 'custom_header_style_section',
	'default'  => '',	
	'choices'  => array(
		'alpha' => true,
	),
	'active_callback'    => array(
		array(
			'setting'  => 'custom_header_styles',
			'operator' => '==',
			'value'    => 'yes',
		),
	),
) );

Composer_Kirki::add_field( 'sub_menu_border_color', array(
	'type'     => 'color',
	'settings' => 'sub_menu_border_color',
	'label'    => esc_html__( 'Sub Menu Border Color', 'composer' ),
	'section'  => 'custom_header_style_section',
	'default'  => '',	
	'choices'  => array(
		'alpha' => true,
	),
	'active_callback'    => array(
		array(
			'setting'  => 'custom_header_styles',
			'operator' => '==',
			'value'    => 'yes',
		),
	),
) );

Composer_Kirki::add_field( 'sub_menu_link_color', array(
	'type'     => 'color',
	'settings' => 'sub_menu_link_color',
	'label'    => esc_html__( 'Sub Menu Link Color', 'composer' ),
	'section'  => 'custom_header_style_section',
	'default'  => '',	
	'choices'  => array(
		'alpha' => true,
	),
	'active_callback'    => array(
		array(
			'setting'  => 'custom_header_styles',
			'operator' => '==',
			'value'    => 'yes',
		),
	),
) );

Composer_Kirki::add_field( 'sub_menu_link_hover_color', array(
	'type'     => 'color',
	'settings' => 'sub_menu_link_hover_color',
	'label'    => esc_html__( 'Sub Menu Link Hover Color', 'composer' ),
	'section'  => 'custom_header_style_section',
	'default'  => '',	
	'choices'  => array(
		'alpha' => true,
	),
	'active_callback'    => array(
		array(
			'setting'  => 'custom_header_styles',
			'operator' => '==',
			'value'    => 'yes',
		),
	),
) );

Composer_Kirki::add_field( 'mega_menu_title_color', array(
	'type'     => 'color',
	'settings' => 'mega_menu_title_color',
	'label'    => esc_html__( 'Mega Menu Title Color', 'composer' ),
	'section'  => 'custom_header_style_section',
	'default'  => '',	
	'choices'  => array(
		'alpha' => true,
	),
	'transport' => 'postMessage',
	// 'js_vars'   => array(
	// 	array(
	// 		'element'  => 'body',
	// 		'function' => 'css',
	// 		'property' => 'color',
	// 	)
	// )
	'active_callback'    => array(
		array(
			'setting'  => 'custom_header_styles',
			'operator' => '==',
			'value'    => 'yes',
		),
	),
) );


/* Login Registration */

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

if ( class_exists('WooCommerce') ) {
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

Composer_Kirki::add_section( 'login-registration', array(
    'title'          => __( 'Login Redirect Page', 'composer' ),
    'panel'			 => '',
    'priority'   	 => 16,
) );

Composer_Kirki::add_field( 'login_redirect', array(
	'type'        => 'select',
	'settings'    => 'login_redirect',
	'label'       => esc_html__( 'Please Choose page', 'composer' ),
	'section'     => 'login-registration',
	'default'     => 'dashboard',
	'choices'     => $all_pages,
) );

/* Portfolio   */

Composer_Kirki::add_section( 'portfolio', array(
    'title'          => __( 'portfolio Styles', 'composer' ),
    'panel'			 => '',
    'priority'   	 => 17,
) );

Composer_Kirki::add_field( 'slug_portfolio', array(
	'type'     => 'text',
	'settings' => 'slug_portfolio',
	'label'    => esc_html__( 'portfolio Slug', 'composer' ),
	'section'  => 'portfolio',
	'default'  => 'portfolio',
) );

Composer_Kirki::add_field( 'single_porfolio_project_detail_title', array(
	'type'     => 'text',
	'settings' => 'single_porfolio_project_detail_title',
	'label'    => esc_html__( 'Type the project detail title', 'composer' ),
	'section'  => 'portfolio',
	'default'  => 'Project Details',
) );

Composer_Kirki::add_field( 'single_porfolio_client_title', array(
	'type'     => 'text',
	'settings' => 'single_porfolio_client_title',
	'label'    => esc_html__( 'Type the Client title', 'composer' ),
	'section'  => 'portfolio',
	'default'  => 'Client',
) );

Composer_Kirki::add_field( 'single_porfolio_skill_title', array(
	'type'     => 'text',
	'settings' => 'single_porfolio_skill_title',
	'label'    => esc_html__( 'Type the Skill title', 'composer' ),
	'section'  => 'portfolio',
	'default'  => 'Client',
) );

Composer_Kirki::add_field( 'single_porfolio_task_title', array(
	'type'     => 'text',
	'settings' => 'single_porfolio_task_title',
	'label'    => esc_html__( 'Type the Task title', 'composer' ),
	'section'  => 'portfolio',
	'default'  => 'Tasks',
) );

Composer_Kirki::add_field( 'single_porfolio_launch_btn_text', array(
	'type'     => 'text',
	'settings' => 'single_porfolio_launch_btn_text',
	'label'    => esc_html__( 'Type the Launch button text', 'composer' ),
	'section'  => 'portfolio',
	'default'  => 'Launch Project',
) );

Composer_Kirki::add_field( 'single_porfolio_like', array(
	'type'     => 'radio-buttonset',
	'settings' => 'single_porfolio_like',
	'label'    => esc_html__( 'Do you want to display Like button?', 'composer' ),
	'section'  => 'portfolio',
	'default'  => 'show',
	'choices'  => array(
		'show'  => esc_attr__( 'Show', 'composer' ),
		'hide'  => esc_attr__( 'Hide', 'composer' ),
	)
) );

Composer_Kirki::add_field( 'single_porfolio_share', array(
	'type'     => 'radio-buttonset',
	'settings' => 'single_porfolio_share',
	'label'    => esc_html__( 'Do you want to display Share option?', 'composer' ),
	'section'  => 'portfolio',
	'default'  => 'show',
	'choices'  => array(
		'show'  => esc_attr__( 'Show', 'composer' ),
		'hide'  => esc_attr__( 'Hide', 'composer' ),
	)
) );

Composer_Kirki::add_field( 'single_porfolio_next_prev', array(
	'type'     => 'radio-buttonset',
	'settings' => 'single_porfolio_next_prev',
	'label'    => esc_html__( 'Do you want to display Next and Previous arrow?', 'composer' ),
	'section'  => 'portfolio',
	'default'  => 'show',
	'choices'  => array(
		'show'  => esc_attr__( 'Show', 'composer' ),
		'hide'  => esc_attr__( 'Hide', 'composer' ),
	)
) );


/* Blocks   */

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

Composer_Kirki::add_section( 'Blocks', array(
    'title'          => __( 'Blocks', 'composer' ),
    'panel'			 => '',
    'priority'   	 => 18,
) );

Composer_Kirki::add_field( 'required_blocks', array(
	'type'        => 'multicheck',
	'settings'    => 'required_blocks',
	'label'       => esc_html__( 'Select the blocks shortcodes you want to use', 'composer' ),
	'section'     => 'Blocks',
	'default'     => $block_default,
	'choices'     => $blocks,
) );


/* Blog Settings */

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

//Search Result
if (class_exists('WooCommerce')) {
	$search_exclude = array( 
		"post" => esc_html__("Post", "composer"),
		"page" => esc_html__("Page", "composer"),
		"product" => esc_html__("Product", "composer"),
		"pix_portfolio" => esc_html__("Portfolio", "composer")
		);
}
else {
	$search_exclude = array( 
		"post" => esc_html__("Post", "composer"),
		"page" => esc_html__("Page", "composer"),
		"pix_portfolio" => esc_html__("Portfolio" , "composer")
		);
}

Composer_Kirki::add_section( 'blog', array(
    'title'          => esc_html__( 'Blog', 'composer' ),
    'panel'			 => '',
    'priority'   	 => 19,
) );

Composer_Kirki::add_field( 'blog_page_title', array(
	'type'     => 'text',
	'settings' => 'blog_page_title',
	'label'    => esc_html__( 'Type the blog title', 'composer' ),
	'section'  => 'blog',
	'default'  => esc_attr__( 'Blog', 'composer' ),	
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => 'body.blog .banner-header h2',
			'function' => 'html'
		)
	)
) );

Composer_Kirki::add_field( 'blog_pagination', array(
	'type'     => 'select',
	'settings' => 'blog_pagination',
	'label'    => esc_html__( 'pagination type', 'composer' ),
	'section'  => 'blog',
	'default'  => 'number',
	'choices'  => $pagination
) );

Composer_Kirki::add_field( 'blog_loadmore_text', array(
	'type'     => 'text',
	'settings' => 'blog_loadmore_text',
	'label'    => esc_html__( 'load more text', 'composer' ),
	'section'  => 'blog',
	'default'  => esc_attr__( 'Load More', 'composer' ),	
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => 'body.blog #load-more-btn a',
			'function' => 'html'
		)
	)
) );

Composer_Kirki::add_field( 'blog_allpost_loaded_text', array(
	'type'     => 'text',
	'settings' => 'blog_allpost_loaded_text',
	'label'    => esc_html__( 'All Posts Loaded Text' ),
	'section'  => 'blog',
	'default'  => esc_attr__( 'All Posts Loaded', 'composer' ),	
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => 'body.blog #load-more-btn .loaded-msg',
			'function' => 'html'
		)
	)
) );

Composer_Kirki::add_field( 'blog_slider', array(
	'type'     => 'text',
	'settings' => 'blog_slider',
	'label'    => esc_html__( 'Slider Shortcode' ),
	'section'  => 'blog',
	'default'  => '',
) );

Composer_Kirki::add_field( 'blog_styles', array(
	'type'     => 'select',
	'settings' => 'blog_styles',
	'label'    => esc_html__( 'Style' ),
	'section'  => 'blog',
	'default'  => 'normal',
	'choices'  => $blog_styles,
) );


Composer_Kirki::add_field( 'blog_select_sidebar', array(
	'type'     => 'select',
	'settings' => 'blog_select_sidebar',
	'label'    => esc_html__( 'Choose the Registered Sidebar?', 'composer' ),
	'section'  => 'blog',
	'default'  => 'hide',
	'choices'  => composer_get_registered_sidebars( array( 'blog-sidebar' ) ),
	'active_callback'    => array(
		array(
			'setting'  => 'header_widget',
			'operator' => '==',
			'value'    => 'show',
		),
	),
) );

Composer_Kirki::add_field( 'blog_sidebar', array(
	'type'     => 'select',
	'settings' => 'blog_sidebar',
	'label'    => esc_html__( 'Sidebar Position' ),
	'section'  => 'blog',
	'default'  => 'right-sidebar',
	'choices'  => $sidebar,
) );

Composer_Kirki::add_field( 'blog_animate', array(
	'type'     => 'radio-buttonset',
	'settings' => 'blog_animate',
	'label'    => esc_html__( 'Enable/Disable Animation' ),
	'section'  => 'blog',
	'default'  => 'enable',
	'choices' => array(
		'enable'  => esc_attr__( 'Enable', 'composer' ),
		'disable' => esc_attr__( 'Disable', 'composer' )
	)
) );

Composer_Kirki::add_field( 'blog_transition', array(
	'type'     => 'select',
	'settings' => 'blog_transition',
	'label'    => esc_html__( 'Animation Transition' ),
	'section'  => 'blog',
	'default'  => 'fadeInUp',
	'choices'  => $animation,
	'active_callback'    => array(
		array(
			'setting'  => 'blog_animate',
			'operator' => '==',
			'value'    => 'enable',
		),
	),
) );

Composer_Kirki::add_field( 'blog_duration', array(
	'type'     => 'text',
	'settings' => 'blog_duration',
	'label'    => esc_html__( 'Transition Duration' ),
	'section'  => 'blog',
	'default'  => '500ms',
	'active_callback'    => array(
		array(
			'setting'  => 'blog_animate',
			'operator' => '==',
			'value'    => 'enable',
		),
	),
) );

Composer_Kirki::add_field( 'blog_title_limit', array(
	'type'     => 'text',
	'settings' => 'blog_title_limit',
	'label'    => esc_html__( 'Title Limit' ),
	'section'  => 'blog',
	'default'  => '80',
) );

Composer_Kirki::add_field( 'blog_content_limit', array(
	'type'     => 'text',
	'settings' => 'blog_content_limit',
	'label'    => esc_html__( 'Content Limit' ),
	'section'  => 'blog',
	'default'  => '40',
) );

Composer_Kirki::add_field( 'blog_category', array(
	'type'     => 'radio-buttonset',
	'settings' => 'blog_category',
	'label'    => esc_html__( 'Show/Hide Category in meta' ),
	'section'  => 'blog',
	'default'  => 'show',
	'choices'     => array(
		'show'  => esc_attr__( 'Yes', 'composer' ),
		'hide'  => esc_attr__( 'No', 'composer' ),
	)
) );

Composer_Kirki::add_field( 'blog_meta_like', array(
	'type'     => 'radio-buttonset',
	'settings' => 'blog_meta_like',
	'label'    => esc_html__( 'Show/Hide Like meta' ),
	'section'  => 'blog',
	'default'  => 'show',
	'choices'     => array(
		'show'  => esc_attr__( 'Yes', 'composer' ),
		'hide'  => esc_attr__( 'No', 'composer' ),
	),
	'active_callback'    => array(
		array(
			'setting'  => 'blog_styles',
			'operator' => '!=',
			'value'    => 'normal'
		)
	)
) );

Composer_Kirki::add_field( 'blog_meta_comment', array(
	'type'     => 'radio-buttonset',
	'settings' => 'blog_meta_comment',
	'label'    => esc_html__( 'Show/Hide Comment meta' ),
	'section'  => 'blog',
	'default'  => 'show',
	'choices'     => array(
		'show'  => esc_attr__( 'Yes', 'composer' ),
		'hide'  => esc_attr__( 'No', 'composer' ),
	),
	'active_callback'    => array(
		array(
			'setting'  => 'blog_styles',
			'operator' => '!=',
			'value'    => 'normal',
		)
	)
) );

Composer_Kirki::add_field( 'blog_single_link', array(
	'type'     => 'radio-buttonset',
	'settings' => 'blog_single_link',
	'label'    => esc_html__( 'Show/Hide Single post link' ),
	'section'  => 'blog',
	'default'  => 'show',
	'choices'     => array(
		'show'  => esc_attr__( 'Yes', 'composer' ),
		'hide'  => esc_attr__( 'No', 'composer' ),
	)
) );

Composer_Kirki::add_field( 'blog_single_link_text', array(
	'type'     => 'text',
	'settings' => 'blog_single_link_text',
	'label'    => esc_html__( 'Type the single post link text' ),
	'section'  => 'blog',
	'default'  => esc_attr__( 'Continue Reading...', 'composer' ),	
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => 'body.blog .link-btn a',
			'function' => 'html'
		)
	)
) );

Composer_Kirki::add_field( 'blog_body_bgcolor', array(
	'type'     => 'color',
	'settings' => 'blog_body_bgcolor',
	'label'    => esc_html__( 'Body background color' ),
	'section'  => 'blog',
	'default'  => '#fff',
	'choices'  => array(
		'alpha' => true,
	),
) );

/*Single Post Setting*/

$single_blog_style = array(
	"style1" => esc_html__("Style1", "composer"),
	"style2" => esc_html__("Style2", "composer"),
	"style3" => esc_html__("Style3", "composer")
);

Composer_Kirki::add_section( 'single-blog', array(
    'title'          => __( 'Single Blog', 'composer' ),
    'panel'			 => '',
    'priority'   	 => 20,
) );

Composer_Kirki::add_field( 'single_style', array(
	'type'     => 'radio-buttonset',
	'settings' => 'single_style',
	'label'    => esc_html__( 'Single Blog Style', 'composer' ),
	'section'  => 'single-blog',
	'default'  => 'style1',
	'choices'  => $single_blog_style,
) );


Composer_Kirki::add_field( 'single_select_sidebar', array(
	'type'     => 'select',
	'settings' => 'single_select_sidebar',
	'label'    => esc_html__( 'Choose the Registered Sidebar', 'composer' ),
	'section'  => 'single-blog',
	'default'  => 'style1',
	'choices'  => composer_get_registered_sidebars( array( 'blog-sidebar' ) ),
) );

Composer_Kirki::add_field( 'single_sidebar', array(
	'type'     => 'select',
	'settings' => 'single_sidebar',
	'label'    => esc_html__( 'Single Post Layout', 'composer' ),
	'section'  => 'single-blog',
	'default'  => 'right-sidebar',
	'choices'  => $sidebar,
) );

Composer_Kirki::add_field( 'ad1', array(
	'type'     => 'textarea',
	'settings' => 'ad1',
	'label'    => esc_html__( 'Ad', 'composer' ),
	'section'  => 'single-blog',
	'default'  => '',
) );

Composer_Kirki::add_field( 'single_category', array(
	'type'     => 'radio-buttonset',
	'settings' => 'single_category',
	'label'    => esc_html__( 'Show/Hide category' ),
	'section'  => 'single-blog',
	'default'  => 'show',
	'choices'     => array(
		'show'  => esc_attr__( 'show', 'composer' ),
		'hide'  => esc_attr__( 'hide', 'composer' ),
	)
) );

Composer_Kirki::add_field( 'single_date', array(
	'type'     => 'radio-buttonset',
	'settings' => 'single_date',
	'label'    => esc_html__( 'Show/Hide Date meta' ),
	'section'  => 'single-blog',
	'default'  => 'show',
	'choices'     => array(
		'show'  => esc_attr__( 'show', 'composer' ),
		'hide'  => esc_attr__( 'hide', 'composer' ),
	)
) );

Composer_Kirki::add_field( 'single_like', array(
	'type'     => 'radio-buttonset',
	'settings' => 'single_like',
	'label'    => esc_html__( 'Show/Hide Like meta' ),
	'section'  => 'single-blog',
	'default'  => 'show',
	'choices'     => array(
		'show'  => esc_attr__( 'show', 'composer' ),
		'hide'  => esc_attr__( 'hide', 'composer' ),
	)
) );

Composer_Kirki::add_field( 'single_comment', array(
	'type'     => 'radio-buttonset',
	'settings' => 'single_comment',
	'label'    => esc_html__( 'Show/Hide comment meta' ),
	'section'  => 'single-blog',
	'default'  => 'show',
	'choices'     => array(
		'show'  => esc_attr__( 'show', 'composer' ),
		'hide'  => esc_attr__( 'hide', 'composer' ),
	)
) );

Composer_Kirki::add_field( 'single_related', array(
	'type'     => 'radio-buttonset',
	'settings' => 'single_related',
	'label'    => esc_html__( 'Show/Hide Related Posts Section' ),
	'section'  => 'single-blog',
	'default'  => 'show',
	'choices'     => array(
		'show'  => esc_attr__( 'show', 'composer' ),
		'hide'  => esc_attr__( 'hide', 'composer' ),
	)
) );

// Share
// $share = array
// ( 
// 	"disabled" => array (
// 		"placebo" 	=> "placebo", //REQUIRED!
// 	), 
// 	"enabled" => array (
// 		"placebo"   => "placebo", //REQUIRED!
// 		"facebook"  => esc_html__( 'Facebook', 'composer' ),
// 		"twitter"   => esc_html__( 'twitter', 'composer' ),
// 		"gplus"     => esc_html__( 'Google Plus', 'composer' ),
// 		"linkedin"  => esc_html__( 'Linkedin', 'composer' ),
// 		"pinterest" => esc_html__( 'Pinterest', 'composer' ),
// 	)
// );

// Composer_Kirki::add_field( 'single_share', array(
// 	'type'     => 'radio-buttonset',
// 	'settings' => 'single_share',
// 	'label'    => esc_html__( 'Share', 'composer' ),
// 	'section'  => 'single-blog',
// 	'default'     => $share,
// 	'choices'     => array(
// 		'show'  => esc_attr__( 'Yes', 'composer' ),
// 		'hide'  => esc_attr__( 'No', 'composer' ),
// 	)
// ) );

Composer_Kirki::add_field( 'single_related_title', array(
	'type'     => 'text',
	'settings' => 'single_related_title',
	'label'    => esc_html__( 'Related Post Title' ),
	'section'  => 'single-blog',
	'default'  => 'show',
	'choices'     => array(
		'show'  => esc_attr__( 'show', 'composer' ),
		'hide'  => esc_attr__( 'hide', 'composer' ),
	),
	'active_callback'    => array(
		array(
			'setting'  => 'single_related',
			'operator' => '==',
			'value'    => 'show',
		),
	),
) );

Composer_Kirki::add_field( 'single_related_no', array(
	'type'     => 'text',
	'settings' => 'single_related_no',
	'label'    => esc_html__( 'Number of Related Post' ),
	'section'  => 'single-blog',
	'default'  => '6',
	'active_callback'    => array(
		array(
			'setting'  => 'single_related',
			'operator' => '==',
			'value'    => 'show',
		),
	),
) );

Composer_Kirki::add_field( 'single_related_orderby', array(
	'type'     => 'select',
	'settings' => 'single_related_orderby',
	'label'    => esc_html__( 'Choose the order by selection' ),
	'section'  => 'single-blog',
	'default'  => 'date',
	'choices'  => $order_by,
	'active_callback'    => array(
		array(
			'setting'  => 'single_related',
			'operator' => '==',
			'value'    => 'show',
		),
	),
) );

Composer_Kirki::add_field( 'single_related_order', array(
	'type'     => 'select',
	'settings' => 'single_related_order',
	'label'    => esc_html__( 'Sorting Order' ),
	'section'  => 'single-blog',
	'default'  => 'date',
	'choices'  => $order,
	'active_callback'    => array(
		array(
			'setting'  => 'single_related',
			'operator' => '==',
			'value'    => 'show',
		),
	),
) );

Composer_Kirki::add_field( 'single_comment_title', array(
	'type'     => 'text',
	'settings' => 'single_comment_title',
	'label'    => esc_html__( 'Comment Section Title' ),
	'section'  => 'single-blog',
	'default'  => 'Comments',
) );

Composer_Kirki::add_field( 'single_comment_title', array(
	'type'     => 'text',
	'settings' => 'single_comment_title',
	'label'    => esc_html__( 'Comment form Title' ),
	'section'  => 'single-blog',
	'default'  => 'Leave a Comments',
) );

Composer_Kirki::add_field( 'single_comment_form_btn_text', array(
	'type'     => 'text',
	'settings' => 'single_comment_form_btn_text',
	'label'    => esc_html__( 'Comment form button text' ),
	'section'  => 'single-blog',
	'default'  => 'Add Comment',
) );

//Archives Settings

Composer_Kirki::add_section( 'archives', array(
    'title'          => __( 'Archives', 'composer' ),
    'panel'			 => '',
    'priority'   	 => 21,
) );

Composer_Kirki::add_field( 'archives_slider', array(
	'type'     => 'text',
	'settings' => 'archives_slider',
	'label'    => esc_html__( 'Slider Shortcode', 'composer' ),
	'section'  => 'archives',
	'default'  => '',
) );

Composer_Kirki::add_field( 'archives_pagination', array(
	'type'     => 'select',
	'settings' => 'archives_pagination',
	'label'    => esc_html__( 'Pagination Type', 'composer' ),
	'section'  => 'archives',
	'default'  => 'number',
	'choices'  => $pagination,
) );

Composer_Kirki::add_field( 'archives_loadmore_text', array(
	'type'     => 'text',
	'settings' => 'archives_loadmore_text',
	'label'    => esc_html__( 'Load More Text', 'composer' ),
	'section'  => 'archives',
	'default'  => esc_attr__( 'Load More', 'composer' ),	
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => 'body.archive #load-more-btn a',
			'function' => 'html'
		)
	)
) );

Composer_Kirki::add_field( 'archives_allpost_loaded_text', array(
	'type'     => 'text',
	'settings' => 'archives_allpost_loaded_text',
	'label'    => esc_html__( 'All Posts Loaded Text', 'composer' ),
	'section'  => 'archives',
	'default'  => esc_attr__( 'All Posts Loaded', 'composer' ),
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => 'body.archive #load-more-btn .loaded-msg',
			'function' => 'html'
		)
	)
) );

Composer_Kirki::add_field( 'archives_styles', array(
	'type'     => 'select',
	'settings' => 'archives_styles',
	'label'    => esc_html__( 'All Posts Loaded Text', 'composer' ),
	'section'  => 'archives',
	'default'  => 'normal',
	'choices'  => $blog_styles,
) );


Composer_Kirki::add_field( 'archives_select_sidebar', array(
	'type'     => 'select',
	'settings' => 'archives_select_sidebar',
	'label'    => esc_html__( 'Choose the Registered Sidebar', 'composer' ),
	'section'  => 'archives',
	'default'  => '0',
	'choices'  => composer_get_registered_sidebars( array( 'blog-sidebar' ) ),
) );

Composer_Kirki::add_field( 'archives_sidebar', array(
	'type'     => 'select',
	'settings' => 'archives_sidebar',
	'label'    => esc_html__( 'Sidebar Position', 'composer' ),
	'section'  => 'archives',
	'default'  => 'right-sidebar',
	'choices'  => $sidebar,
) );


Composer_Kirki::add_field( 'archives_animate', array(
	'type'     => 'radio-buttonset',
	'settings' => 'archives_animate',
	'label'    => esc_html__( 'Enable/Disable Animation' ),
	'section'  => 'archives',
	'default'  => 'enable',
	'choices' => array(
		'enable'  => esc_attr__( 'Enable', 'composer' ),
		'disable' => esc_attr__( 'Disable', 'composer' )
	)
) );

Composer_Kirki::add_field( 'archives_transition', array(
	'type'     => 'select',
	'settings' => 'archives_transition',
	'label'    => esc_html__( 'Animation Transition' ),
	'section'  => 'archives',
	'default'  => 'fadeInUp',
	'choices'  => $animation,
	'active_callback'    => array(
		array(
			'setting'  => 'archives_animate',
			'operator' => '==',
			'value'    => 'enable',
		),
	),
) );

Composer_Kirki::add_field( 'archives_duration', array(
	'type'     => 'text',
	'settings' => 'archives_duration',
	'label'    => esc_html__( 'Transition Duration' ),
	'section'  => 'archives',
	'default'  => '500ms',
	'active_callback'    => array(
		array(
			'setting'  => 'archives_animate',
			'operator' => '==',
			'value'    => 'enable',
		),
	),
) );

Composer_Kirki::add_field( 'archives_title_limit', array(
	'type'     => 'text',
	'settings' => 'archives_title_limit',
	'label'    => esc_html__( 'Title Limit' ),
	'section'  => 'archives',
	'default'  => '80',
) );

Composer_Kirki::add_field( 'archives_content_limit', array(
	'type'     => 'text',
	'settings' => 'archives_content_limit',
	'label'    => esc_html__( 'Content Limit' ),
	'section'  => 'archives',
	'default'  => '40',
) );

Composer_Kirki::add_field( 'archives_category', array(
	'type'     => 'radio-buttonset',
	'settings' => 'archives_category',
	'label'    => esc_html__( 'Show/Hide Category in meta' ),
	'section'  => 'archives',
	'default'  => 'show',
	'choices'     => array(
		'show'  => esc_attr__( 'Yes', 'composer' ),
		'hide'  => esc_attr__( 'No', 'composer' ),
	)
) );

Composer_Kirki::add_field( 'archives_meta_like', array(
	'type'     => 'radio-buttonset',
	'settings' => 'archives_meta_like',
	'label'    => esc_html__( 'Show/Hide Like meta' ),
	'section'  => 'archives',
	'default'  => 'show',
	'choices'     => array(
		'show'  => esc_attr__( 'Yes', 'composer' ),
		'hide'  => esc_attr__( 'No', 'composer' ),
	),
	'active_callback'    => array(
		array(
			'setting'  => 'archives_styles',
			'operator' => '!=',
			'value'    => 'normal'
		)
	)
) );

Composer_Kirki::add_field( 'archives_meta_comment', array(
	'type'     => 'radio-buttonset',
	'settings' => 'archives_meta_comment',
	'label'    => esc_html__( 'Show/Hide Comment meta' ),
	'section'  => 'archives',
	'default'  => 'show',
	'choices'     => array(
		'show'  => esc_attr__( 'Yes', 'composer' ),
		'hide'  => esc_attr__( 'No', 'composer' ),
	),
	'active_callback'    => array(
		array(
			'setting'  => 'archives_styles',
			'operator' => '!=',
			'value'    => 'normal'
		)
	)
) );

Composer_Kirki::add_field( 'archives_single_link', array(
	'type'     => 'radio-buttonset',
	'settings' => 'archives_single_link',
	'label'    => esc_html__( 'Show/Hide Single post link' ),
	'section'  => 'archives',
	'default'  => 'show',
	'choices'     => array(
		'show'  => esc_attr__( 'Yes', 'composer' ),
		'hide'  => esc_attr__( 'No', 'composer' ),
	)
) );

Composer_Kirki::add_field( 'archives_single_link_text', array(
	'type'     => 'text',
	'settings' => 'archives_single_link_text',
	'label'    => esc_html__( 'Type the single post link text' ),
	'section'  => 'archives',
	'default'  => esc_attr__( 'Continue Reading...', 'composer' ),	
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => 'body.archive .link-btn a',
			'function' => 'html'
		)
	)
) );

Composer_Kirki::add_field( 'archives_body_bgcolor', array(
	'type'     => 'color',
	'settings' => 'archives_body_bgcolor',
	'label'    => esc_html__( 'Body background color' ),
	'section'  => 'archives',
	'default'  => '#fff',
	'choices'  => array(
		'alpha' => true,
	),
) );


//Search Setting
Composer_Kirki::add_section( 'search', array(
    'title'          => __( 'Search Page', 'composer' ),
    'panel'			 => '',
    'priority'   	 => 22,
) );

Composer_Kirki::add_field( 'search_title_bar', array(
	'type'     => 'radio-buttonset',
	'settings' => 'search_title_bar',
	'label'    => esc_html__( 'Search Title Bar', 'composer' ),
	'section'  => 'search',
	'default'  => 'show',
	'choices'     => array(
		'show'  => esc_attr__( 'show', 'composer' ),
		'hide'  => esc_attr__( 'hide', 'composer' ),
	)
) );

Composer_Kirki::add_field( 'search_exclude', array(
	'type'     => 'multicheck',
	'settings' => 'search_exclude',
	'label'    => esc_html__( 'Search Exclude', 'composer' ),
	'section'  => 'search',
	'default'  => '',
	'choices'  => $search_exclude,
) );


Composer_Kirki::add_field( 'search_slider', array(
	'type'     => 'text',
	'settings' => 'search_slider',
	'label'    => esc_html__( 'Slider Shortcode', 'composer' ),
	'section'  => 'search',
	'default'  => '',
) );

Composer_Kirki::add_field( 'search_pagination', array(
	'type'     => 'select',
	'settings' => 'search_pagination',
	'label'    => esc_html__( 'Pagination Type', 'composer' ),
	'section'  => 'search',
	'default'  => 'number',
	'choices'  => $pagination,
) );

Composer_Kirki::add_field( 'search_loadmore_text', array(
	'type'     => 'text',
	'settings' => 'search_loadmore_text',
	'label'    => esc_html__( 'Load More Text', 'composer' ),
	'section'  => 'search',
	'default'  => esc_attr__( 'Load More', 'composer' ),	
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => 'body.search #load-more-btn a',
			'function' => 'html'
		)
	)
) );

Composer_Kirki::add_field( 'search_allpost_loaded_text', array(
	'type'     => 'text',
	'settings' => 'search_allpost_loaded_text',
	'label'    => esc_html__( 'All Posts Loaded Text', 'composer' ),
	'section'  => 'search',
	'default'  => esc_attr__( 'All Posts Loaded', 'composer' ),
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => 'body.search #load-more-btn .loaded-msg',
			'function' => 'html'
		)
	)
) );

Composer_Kirki::add_field( 'search_styles', array(
	'type'     => 'select',
	'settings' => 'search_styles',
	'label'    => esc_html__( 'All Posts Loaded Text', 'composer' ),
	'section'  => 'search',
	'default'  => 'normal',
	'choices'  => $blog_styles,
) );


Composer_Kirki::add_field( 'search_select_sidebar', array(
	'type'     => 'select',
	'settings' => 'search_select_sidebar',
	'label'    => esc_html__( 'Choose the Registered Sidebar', 'composer' ),
	'section'  => 'search',
	'default'  => '0',
	'choices'  => composer_get_registered_sidebars( array( 'blog-sidebar' ) ),
) );

Composer_Kirki::add_field( 'search_sidebar', array(
	'type'     => 'select',
	'settings' => 'search_sidebar',
	'label'    => esc_html__( 'Sidebar Position', 'composer' ),
	'section'  => 'search',
	'default'  => 'right-sidebar',
	'choices'  => $sidebar,
) );


Composer_Kirki::add_field( 'search_animate', array(
	'type'     => 'radio-buttonset',
	'settings' => 'search_animate',
	'label'    => esc_html__( 'Enable/Disable Animation' ),
	'section'  => 'search',
	'default'  => 'enable',
	'choices' => array(
		'enable'  => esc_attr__( 'Enable', 'composer' ),
		'disable' => esc_attr__( 'Disable', 'composer' )
	)
) );

Composer_Kirki::add_field( 'search_transition', array(
	'type'     => 'select',
	'settings' => 'search_transition',
	'label'    => esc_html__( 'Animation Transition' ),
	'section'  => 'search',
	'default'  => 'fadeInUp',
	'choices'  => $animation,
	'active_callback'    => array(
		array(
			'setting'  => 'search_animate',
			'operator' => '==',
			'value'    => 'enable',
		),
	),
) );

Composer_Kirki::add_field( 'search_duration', array(
	'type'     => 'text',
	'settings' => 'search_duration',
	'label'    => esc_html__( 'Transition Duration' ),
	'section'  => 'search',
	'default'  => '500ms',
	'active_callback'    => array(
		array(
			'setting'  => 'search_animate',
			'operator' => '==',
			'value'    => 'enable',
		),
	),
) );

Composer_Kirki::add_field( 'search_title_limit', array(
	'type'     => 'text',
	'settings' => 'search_title_limit',
	'label'    => esc_html__( 'Title Limit' ),
	'section'  => 'search',
	'default'  => '80',
) );

Composer_Kirki::add_field( 'search_content_limit', array(
	'type'     => 'text',
	'settings' => 'search_content_limit',
	'label'    => esc_html__( 'Content Limit' ),
	'section'  => 'search',
	'default'  => '40',
) );

Composer_Kirki::add_field( 'search_category', array(
	'type'     => 'radio-buttonset',
	'settings' => 'search_category',
	'label'    => esc_html__( 'Show/Hide Category in meta' ),
	'section'  => 'search',
	'default'  => 'show',
	'choices'     => array(
		'show'  => esc_attr__( 'Yes', 'composer' ),
		'hide'  => esc_attr__( 'No', 'composer' ),
	)
) );

Composer_Kirki::add_field( 'search_meta_like', array(
	'type'     => 'radio-buttonset',
	'settings' => 'search_meta_like',
	'label'    => esc_html__( 'Show/Hide Like meta' ),
	'section'  => 'search',
	'default'  => 'show',
	'choices'     => array(
		'show'  => esc_attr__( 'Yes', 'composer' ),
		'hide'  => esc_attr__( 'No', 'composer' ),
	),
	'active_callback'    => array(
		array(
			'setting'  => 'search_styles',
			'operator' => '!=',
			'value'    => 'normal'
		)
	)
) );

Composer_Kirki::add_field( 'search_meta_comment', array(
	'type'     => 'radio-buttonset',
	'settings' => 'search_meta_comment',
	'label'    => esc_html__( 'Show/Hide Comment meta' ),
	'section'  => 'search',
	'default'  => 'show',
	'choices'     => array(
		'show'  => esc_attr__( 'Yes', 'composer' ),
		'hide'  => esc_attr__( 'No', 'composer' ),
	),
	'active_callback'    => array(
		array(
			'setting'  => 'search_styles',
			'operator' => '!=',
			'value'    => 'normal'
		)
	)
) );

Composer_Kirki::add_field( 'search_single_link', array(
	'type'     => 'radio-buttonset',
	'settings' => 'search_single_link',
	'label'    => esc_html__( 'Show/Hide Single post link' ),
	'section'  => 'search',
	'default'  => 'show',
	'choices'     => array(
		'show'  => esc_attr__( 'Yes', 'composer' ),
		'hide'  => esc_attr__( 'No', 'composer' ),
	)
) );

Composer_Kirki::add_field( 'search_single_link_text', array(
	'type'     => 'text',
	'settings' => 'search_single_link_text',
	'label'    => esc_html__( 'Type the single post link text' ),
	'section'  => 'search',
	'default'  => esc_attr__( 'Continue Reading...', 'composer' ),	
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => 'body.search .link-btn a',
			'function' => 'html'
		)
	)
) );

Composer_Kirki::add_field( 'search_body_bgcolor', array(
	'type'     => 'color',
	'settings' => 'search_body_bgcolor',
	'label'    => esc_html__( 'Body background color' ),
	'section'  => 'search',
	'default'  => '#fff',
	'choices'  => array(
		'alpha' => true,
	),
) );

//Search Setting
Composer_Kirki::add_section( 'error', array(
    'title'          => __( 'Error Page', 'composer' ),
    'panel'			 => '',
    'priority'   	 => 23,
) );

Composer_Kirki::add_field( '404_text', array(
	'type'     => 'textarea',
	'settings' => '404_text',
	'label'    => esc_html__( '404 Error text', 'composer' ),
	'section'  => 'error',
	'default'  => esc_attr__( 'Page Not Found', 'composer' ),
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => 'h3.error-text',
			'function' => 'html'
		)
	)
) );

Composer_Kirki::add_field( '404_description', array(
	'type'     => 'textarea',
	'settings' => '404_description',
	'label'    => esc_html__( 'Enter the 404 error description here', 'composer' ),
	'section'  => 'error',
	'default'  => esc_attr__( 'Sorry, but the page you were looking for can\'t be found. Please inform us about this error.', 'composer' ),
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '#errorCon .emphasis',
			'function' => 'html'
		)
	)
) );

Composer_Kirki::add_field( '404_menu', array(
	'type'     => 'radio-buttonset',
	'settings' => '404_menu',
	'label'    => esc_html__( 'Show/Hide 404 menu', 'composer' ),
	'section'  => 'error',
	'default'  => 'show',
	'choices'     => array(
		'show'  => esc_attr__( 'Show', 'composer' ),
		'hide'  => esc_attr__( 'hide', 'composer' ),
	)
) );

Composer_Kirki::add_field( '404_search', array(
	'type'     => 'radio-buttonset',
	'settings' => '404_search',
	'label'    => esc_html__( 'Show/Hide 404 Search', 'composer' ),
	'section'  => 'error',
	'default'  => 'show',
	'choices'     => array(
		'show'  => esc_attr__( 'Show', 'composer' ),
		'hide'  => esc_attr__( 'hide', 'composer' ),
	)
) );

Composer_Kirki::add_field( '404_body_bgcolor', array(
	'type'     => 'color',
	'settings' => '404_body_bgcolor',
	'label'    => esc_html__( 'Body background color' ),
	'section'  => 'error',
	'default'  => '#fff',
	'choices'  => array(
		'alpha' => true,
	),
) );

//Search Setting
Composer_Kirki::add_section( 'shop', array(
    'title'          => __( 'Shop Page', 'composer' ),
    'panel'			 => '',
    'priority'   	 => 24,
) );

Composer_Kirki::add_field( 'cart_btn_on_hover', array(
	'type'     => 'radio-buttonset',
	'settings' => 'cart_btn_on_hover',
	'label'    => esc_html__( 'Show/Hide Cart Button on Shop Page', 'composer' ),
	'section'  => 'shop',
	'default'  => 'show',
	'choices'     => array(
		'show'  => esc_attr__( 'Show', 'composer' ),
		'hide'  => esc_attr__( 'hide', 'composer' ),
	)
) );

Composer_Kirki::add_field( 'shop_pagination', array(
	'type'     => 'select',
	'settings' => 'shop_pagination',
	'label'    => esc_html__( 'pagination type', 'composer' ),
	'section'  => 'shop',
	'default'  => 'number',
	'choices'  => $pagination
) );

Composer_Kirki::add_field( 'shop_loadmore_text', array(
	'type'     => 'text',
	'settings' => 'shop_loadmore_text',
	'label'    => esc_html__( 'load more text', 'composer' ),
	'section'  => 'shop',
	'default'  => esc_attr__( 'Load More', 'composer' ),	
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => 'body.post-type-archive-product.woocommerce #load-more-btn a',
			'function' => 'html'
		)
	)
) );

Composer_Kirki::add_field( 'shop_allpost_loaded_text', array(
	'type'     => 'text',
	'settings' => 'shop_allpost_loaded_text',
	'label'    => esc_html__( 'All Posts Loaded Text' ),
	'section'  => 'shop',
	'default'  => esc_attr__( 'All Posts Loaded', 'composer' ),	
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => 'body.post-type-archive-product.woocommerce #load-more-btn .loaded-msg',
			'function' => 'html'
		)
	)
) );

Composer_Kirki::add_field( 'shop_count', array(
	'type'     => 'text',
	'settings' => 'shop_count',
	'label'    => esc_html__( 'Number of Products' ),
	'section'  => 'shop',
	'default'  => '8',
) );

Composer_Kirki::add_field( 'shop_sidebar', array(
	'type'     => 'select',
	'settings' => 'shop_sidebar',
	'label'    => esc_html__( 'Shop Page Sidebar Position' ),
	'section'  => 'shop',
	'default'  => 'full-width',
	'choices'  => $sidebar,
) );

Composer_Kirki::add_field( 'shop_select_sidebar', array(
	'type'     => 'select',
	'settings' => 'shop_select_sidebar',
	'label'    => esc_html__( 'Choose the Shop Page Registered Sidebar?', 'composer' ),
	'section'  => 'shop',
	'default'  => 'hide',
	'choices'  => composer_get_registered_sidebars( array( 'shop' ) ),
) );

Composer_Kirki::add_field( 'shop_single_sidebar', array(
	'type'     => 'select',
	'settings' => 'single_shop_sidebar',
	'label'    => esc_html__( 'Single Shop Page Sidebar Position' ),
	'section'  => 'shop',
	'default'  => 'full-width',
	'choices'  => $sidebar,
) );

Composer_Kirki::add_field( 'shop_select_single_sidebar', array(
	'type'     => 'select',
	'settings' => 'single_shop_select_sidebar',
	'label'    => esc_html__( 'Choose the Single Shop Page Registered Sidebar?', 'composer' ),
	'section'  => 'shop',
	'default'  => 'hide',
	'choices'  => composer_get_registered_sidebars( array( 'single-shop' ) ),
) );

Composer_Kirki::add_field( 'shop_width', array(
	'type'     => 'text',
	'settings' => 'shop_width',
	'label'    => esc_html__( 'Product width' ),
	'section'  => 'shop',
	'default'  => '270',
) );

Composer_Kirki::add_field( 'shop_height', array(
	'type'     => 'text',
	'settings' => 'shop_height',
	'label'    => esc_html__( 'Product height' ),
	'section'  => 'shop',
	'default'  => '290',
) );

Composer_Kirki::add_field( 'shop_body_bgcolor', array(
	'type'     => 'color',
	'settings' => 'shop_body_bgcolor',
	'label'    => esc_html__( 'Body background color' ),
	'section'  => 'shop',
	'default'  => '#fff',
	'choices'  => array(
		'alpha' => true,
	),
) );

Composer_Kirki::add_field( 'thumbnail_column', array(
	'type'     => 'radio-buttonset',
	'settings' => 'thumbnail_column',
	'label'    => esc_html__( 'Single Shop Thumbnail Columns', 'composer' ),
	'section'  => 'shop',
	'default'  => '3',
	'choices'     => array(
		'3'  => esc_attr__( 'Three', 'composer' ),
		'4'  => esc_attr__( 'Four', 'composer' ),
	)
) );

//Footer Options

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

// Composer_Kirki::add_section( 'footer', array(
//     'title'          => __( 'Footer Options', 'composer' ),
//     'panel'			 => '',
//     'priority'   	 => 25,
// ) );

// Composer_Kirki::add_field( 'footer_fixed', array(
// 	'type'     => 'radio-buttonset',
// 	'settings' => 'footer_fixed',
// 	'label'    => esc_html__( 'Choose Fixed Footer?', 'composer' ),
// 	'section'  => 'footer',
// 	'default'  => 'no',
// 	'choices'     => array(
// 		'yes'  => esc_attr__( 'Yes', 'composer' ),
// 		'no'  => esc_attr__( 'No', 'composer' ),
// 	)
// ) );

// Composer_Kirki::add_field( 'f_widget', array(
// 	'type'     => 'radio-buttonset',
// 	'settings' => 'f_widget',
// 	'label'    => esc_html__( 'Show/Hide Footer Widget', 'composer' ),
// 	'section'  => 'footer',
// 	'default'  => 'show',
// 	'choices'     => array(
// 		'show'  => esc_attr__( 'Show', 'composer' ),
// 		'hide'  => esc_attr__( 'Hide', 'composer' ),
// 	)
// ) );

// Composer_Kirki::add_field( 'f_widget_col', array(
// 	'type'     => 'radio-image',
// 	'settings' => 'f_widget_col',
// 	'label'    => esc_html__( 'Footer Layout', 'composer' ),
// 	'section'  => 'footer',
// 	'default'  => 'col3',
// 	'choices'  =>  $footer,
// 	'active_callback'    => array(
// 		array(
// 			'setting'  => 'f_widget',
// 			'operator' => '==',
// 			'value'    => 'show',
// 		),
// 	),
// ) );

// Composer_Kirki::add_field( 'f_select_sidebar', array(
// 	'type'     => 'select',
// 	'settings' => 'f_select_sidebar',
// 	'label'    => esc_html__( 'Choose the Registered Widgets', 'composer' ),
// 	'section'  => 'footer',
// 	'default'  => '0',
// 	'choices'  => composer_get_registered_sidebars( array( 'footer-widgets' ) ),
// ) );

// Composer_Kirki::add_field( 'footer_style', array(
// 	'type'     => 'radio-buttonset',
// 	'settings' => 'footer_style',
// 	'label'    => esc_html__( 'Footer Style', 'composer' ),
// 	'section'  => 'footer',
// 	'default'  => 'dark',
// 	'choices'     => array(
// 		'dark'  => esc_attr__( 'Dark', 'composer' ),
// 		'light'  => esc_attr__( 'Light', 'composer' ),
// 	)
// ) );

// Composer_Kirki::add_field( 'f_small', array(
// 	'type'     => 'radio-buttonset',
// 	'settings' => 'f_small',
// 	'label'    => esc_html__( 'Show/Hide Small footer', 'composer' ),
// 	'section'  => 'footer',
// 	'default'  => 'show',
// 	'choices'     => array(
// 		'show'  => esc_attr__( 'Show', 'composer' ),
// 		'hide'  => esc_attr__( 'Hide', 'composer' ),
// 	)
// ) );

// Composer_Kirki::add_field( 'f_copyright_t', array(
// 	'type'     => 'textarea',
// 	'settings' => 'f_copyright_t',
// 	'label'    => esc_html__( 'Copyright Text', 'composer' ),
// 	'section'  => 'footer',
// 	'default'  => '&copy; 2016 [blog-link], All Rights Reserved.',
// ) );

// Composer_Kirki::add_field( 'copyright_side', array(
// 	'type'     => 'radio-buttonset',
// 	'settings' => 'copyright_side',
// 	'label'    => esc_html__( 'Copyright Style', 'composer' ),
// 	'section'  => 'footer',
// 	'default'  => 'center',
// 	'choices'     => array(
// 		'left_right'  => esc_attr__( 'Left and Right Side', 'composer' ),
// 		'center'  => esc_attr__( 'Centered', 'composer' ),
// 	)
// ) );

// Composer_Kirki::add_field( 'f_customization', array(
// 	'type'     => 'radio-buttonset',
// 	'settings' => 'f_customization',
// 	'label'    => esc_html__( 'Choose Footer Custom Style', 'composer' ),
// 	'section'  => 'footer',
// 	'default'  => 'no',
// 	'choices'  => array(
// 		'yes'  => esc_attr__( 'Yes', 'composer' ),
// 		'no'  => esc_attr__( 'No', 'composer' ),
// 	)
// ) );

// Composer_Kirki::add_field( 'custom_f_title_color', array(
// 	'type'     => 'color',
// 	'settings' => 'custom_f_title_color',
// 	'label'    => esc_html__( 'Footer Widget Title Color', 'composer' ),
// 	'section'  => 'footer',
// 	'default'  => '',	
// 	'choices'  => array(
// 		'alpha' => true,
// 	),
// 	'active_callback'    => array(
// 		array(
// 			'setting'  => 'f_customization',
// 			'operator' => '==',
// 			'value'    => 'yes',
// 		),
// 	),
// ) );

// Composer_Kirki::add_field( 'custom_f_txt_color', array(
// 	'type'     => 'color',
// 	'settings' => 'custom_f_txt_color',
// 	'label'    => esc_html__( 'Footer Text Color', 'composer' ),
// 	'section'  => 'footer',
// 	'default'  => '',	
// 	'choices'  => array(
// 		'alpha' => true,
// 	),
// 	'active_callback'    => array(
// 		array(
// 			'setting'  => 'f_customization',
// 			'operator' => '==',
// 			'value'    => 'yes',
// 		),
// 	),
// ) );


// Composer_Kirki::add_field( 'custom_f_link_color', array(
// 	'type'     => 'color',
// 	'settings' => 'custom_f_link_color',
// 	'label'    => esc_html__( 'Footer Link Color', 'composer' ),
// 	'section'  => 'footer',
// 	'default'  => '',	
// 	'choices'  => array(
// 		'alpha' => true,
// 	),
// 	'active_callback'    => array(
// 		array(
// 			'setting'  => 'f_customization',
// 			'operator' => '==',
// 			'value'    => 'yes',
// 		),
// 	),
// ) );

// Composer_Kirki::add_field( 'custom_f_link_hover_color', array(
// 	'type'     => 'color',
// 	'settings' => 'custom_f_link_hover_color',
// 	'label'    => esc_html__( 'Footer Link Hover Color', 'composer' ),
// 	'section'  => 'footer',
// 	'default'  => '',	
// 	'choices'  => array(
// 		'alpha' => true,
// 	),
// 	'active_callback'    => array(
// 		array(
// 			'setting'  => 'f_customization',
// 			'operator' => '==',
// 			'value'    => 'yes',
// 		),
// 	),
// ) );


// Composer_Kirki::add_field( 'custom_f_bg_color', array(
// 	'type'     => 'color',
// 	'settings' => 'custom_f_bg_color',
// 	'label'    => esc_html__( 'Footer Background Color', 'composer' ),
// 	'section'  => 'footer',
// 	'default'  => '',	
// 	'choices'  => array(
// 		'alpha' => true,
// 	),
// 	'active_callback'    => array(
// 		array(
// 			'setting'  => 'f_customization',
// 			'operator' => '==',
// 			'value'    => 'yes',
// 		),
// 	),
// ) );


// Composer_Kirki::add_field( 'custom_f_bg_pattern', array(
// 	'type'     => 'radio-image',
// 	'settings' => 'custom_f_bg_pattern',
// 	'label'    => esc_html__( 'Choose Footer Pattern', 'composer' ),
// 	'section'  => 'footer',
// 	'default'  => 'none',
// 	'choices'  =>  $pattern,
// 	'active_callback'    => array(
// 		array(
// 			'setting'  => 'f_customization',
// 			'operator' => '==',
// 			'value'    => 'yes',
// 		),
// 	),
// ) );


// Composer_Kirki::add_field( 'custom_f_bg', array(
// 	'type'     => 'text',
// 	'settings' => 'custom_f_bg',
// 	'label'    => esc_html__( 'Upload Footer Background', 'composer' ),
// 	'section'  => 'footer',
// 	'default'  => 'Upload Footer Background',
// 	'active_callback'    => array(
// 		array(
// 			'setting'  => 'f_customization',
// 			'operator' => '==',
// 			'value'    => 'yes',
// 		),
// 	),
// ) );

// Composer_Kirki::add_field( 'custom_f_bg_attachment', array(
// 	'type'     => 'select',
// 	'settings' => 'custom_f_bg_attachment',
// 	'label'    => esc_html__( 'Background Attachment', 'composer' ),
// 	'section'  => 'footer',
// 	'default'  => 'scroll',
// 	'choices'  =>  $bg_attachment,
// 	'active_callback'    => array(
// 		array(
// 			'setting'  => 'f_customization',
// 			'operator' => '==',
// 			'value'    => 'yes',
// 		),
// 	),
// ) );

// Composer_Kirki::add_field( 'custom_f_bg_size', array(
// 	'type'     => 'select',
// 	'settings' => 'custom_f_bg_size',
// 	'label'    => esc_html__( 'Background Size', 'composer' ),
// 	'section'  => 'footer',
// 	'default'  => 'cover',
// 	'choices'  =>  $bg_size,
// 	'active_callback'    => array(
// 		array(
// 			'setting'  => 'f_customization',
// 			'operator' => '==',
// 			'value'    => 'yes',
// 		),
// 	),
// ) );

// Composer_Kirki::add_field( 'custom_f_bg_repeat', array(
// 	'type'     => 'select',
// 	'settings' => 'custom_f_bg_repeat',
// 	'label'    => esc_html__( 'Background Repeat', 'composer' ),
// 	'section'  => 'footer',
// 	'default'  => 'cover',
// 	'choices'  =>  $bg_repeat,
// 	'active_callback'    => array(
// 		array(
// 			'setting'  => 'f_customization',
// 			'operator' => '==',
// 			'value'    => 'yes',
// 		),
// 	),
// ) );

// Composer_Kirki::add_field( 'custom_fc_bg_color', array(
// 	'type'     => 'color',
// 	'settings' => 'custom_fc_bg_color',
// 	'label'    => esc_html__( 'Copyright Background Color', 'composer' ),
// 	'section'  => 'footer',
// 	'default'  => '',
// 	'choices'  => array(
// 		'alpha' => true,
// 	),	
// 	'active_callback'    => array(
// 		array(
// 			'setting'  => 'f_customization',
// 			'operator' => '==',
// 			'value'    => 'yes',
// 		),
// 	),
// ) );

// Composer_Kirki::add_field( 'custom_fc_txt_color', array(
// 	'type'     => 'color',
// 	'settings' => 'custom_fc_txt_color',
// 	'label'    => esc_html__( 'Copyright Text Color', 'composer' ),
// 	'section'  => 'footer',
// 	'default'  => '',	
// 	'active_callback'    => array(
// 		array(
// 			'setting'  => 'f_customization',
// 			'operator' => '==',
// 			'value'    => 'yes',
// 		),
// 	),
// ) );

// Composer_Kirki::add_field( 'custom_fc_link_color', array(
// 	'type'     => 'color',
// 	'settings' => 'custom_fc_link_color',
// 	'label'    => esc_html__( 'Copyright Link Color', 'composer' ),
// 	'section'  => 'footer',
// 	'default'  => '',	
// 	'active_callback'    => array(
// 		array(
// 			'setting'  => 'f_customization',
// 			'operator' => '==',
// 			'value'    => 'yes',
// 		),
// 	),
// ) );

// Composer_Kirki::add_field( 'custom_fc_link_hover_color', array(
// 	'type'     => 'color',
// 	'settings' => 'custom_fc_link_hover_color',
// 	'label'    => esc_html__( 'Copyright Link Hover Color', 'composer' ),
// 	'section'  => 'footer',
// 	'default'  => '',	
// 	'active_callback'    => array(
// 		array(
// 			'setting'  => 'f_customization',
// 			'operator' => '==',
// 			'value'    => 'yes',
// 		),
// 	),
// ) );


//Styling Options
Composer_Kirki::add_section( 'styling-options', array(
    'title'          => __( 'Styling Options', 'composer' ),
    'panel'			 => '',
    'priority'   	 => 26,
) );

Composer_Kirki::add_field( 'custom_styles', array(
	'type'     => 'radio-buttonset',
	'settings' => 'custom_styles',
	'label'    => esc_html__( 'Custom Styles', 'composer' ),
	'section'  => 'styling-options',
	'default'  => 'no',
	'choices'  => array(
		'yes'  => esc_attr__( 'Yes', 'composer' ),
		'no'  => esc_attr__( 'No', 'composer' ),
	)
) );

Composer_Kirki::add_field( 'customize_body_bg', array(
	'type'     => 'radio-buttonset',
	'settings' => 'customize_body_bg',
	'label'    => esc_html__( 'Customize Body Background', 'composer' ),
	'section'  => 'styling-options',
	'default'  => 'no',
	'choices'  => array(
		'yes'  => esc_attr__( 'Yes', 'composer' ),
		'no'  => esc_attr__( 'No', 'composer' ),
	),
	'active_callback'    => array(
		array(
			'setting'  => 'custom_styles',
			'operator' => '==',
			'value'    => 'yes',
		),
	),
) );

Composer_Kirki::add_field( 'body_background', array(
	'type'     => 'color',
	'settings' => 'body_background',
	'label'    => esc_html__( 'Body Background Color', 'composer' ),
	'section'  => 'styling-options',
	'default'  => '#fff',
	'choices'  => array(
		'alpha' => true,
	),	
	'active_callback'    => array(
		array(
			'setting'  => 'custom_styles',
			'operator' => '==',
			'value'    => 'yes',
		),
	),
) );

Composer_Kirki::add_field( 'custom_body_bg_pattern', array(
	'type'     => 'radio-image',
	'settings' => 'custom_body_bg_pattern',
	'label'    => esc_html__( 'Choose Footer Pattern', 'composer' ),
	'section'  => 'styling-options',
	'default'  => 'none',
	'choices'  =>  $pattern,
	'active_callback'    => array(
		array(
			'setting'  => 'custom_styles',
			'operator' => '==',
			'value'    => 'yes',
		),
	),
) );

Composer_Kirki::add_field( 'custom_body_bg', array(
	'type'     => 'text',
	'settings' => 'custom_body_bg',
	'label'    => esc_html__( 'Upload Body Background Image', 'composer' ),
	'section'  => 'styling-options',
	'default'  => 'Upload Body Background Image',
	'active_callback'    => array(
		array(
			'setting'  => 'custom_styles',
			'operator' => '==',
			'value'    => 'yes',
		),
	),
) );

Composer_Kirki::add_field( 'custom_f_bg_attachment', array(
	'type'     => 'select',
	'settings' => 'custom_f_bg_attachment',
	'label'    => esc_html__( 'Background Attachment', 'composer' ),
	'section'  => 'styling-options',
	'default'  => 'scroll',
	'choices'  =>  $bg_attachment,
	'active_callback'    => array(
		array(
			'setting'  => 'custom_styles',
			'operator' => '==',
			'value'    => 'yes',
		),
	),
) );

Composer_Kirki::add_field( 'custom_f_bg_size', array(
	'type'     => 'select',
	'settings' => 'custom_f_bg_size',
	'label'    => esc_html__( 'Background Size', 'composer' ),
	'section'  => 'styling-options',
	'default'  => 'cover',
	'choices'  =>  $bg_size,
	'active_callback'    => array(
		array(
			'setting'  => 'custom_styles',
			'operator' => '==',
			'value'    => 'yes',
		),
	),
) );

Composer_Kirki::add_field( 'custom_f_bg_repeat', array(
	'type'     => 'select',
	'settings' => 'custom_f_bg_repeat',
	'label'    => esc_html__( 'Background Repeat', 'composer' ),
	'section'  => 'styling-options',
	'default'  => 'cover',
	'choices'  =>  $bg_repeat,
	'active_callback'    => array(
		array(
			'setting'  => 'custom_styles',
			'operator' => '==',
			'value'    => 'yes',
		),
	),
) );


Composer_Kirki::add_field( 'pri_color', array(
	'type'     => 'color',
	'settings' => 'pri_color',
	'label'    => esc_html__( 'Primary Color', 'composer' ),
	'section'  => 'styling-options',
	'default'  => '',	
	'active_callback'    => array(
		array(
			'setting'  => 'customize_body_bg',
			'operator' => '==',
			'value'    => 'yes',
		),
	),
) );

Composer_Kirki::add_field( 'selection_text_color', array(
	'type'     => 'color',
	'settings' => 'selection_text_color',
	'label'    => esc_html__( 'Selection Text Color', 'composer' ),
	'section'  => 'styling-options',
	'default'  => '',	
	'active_callback'    => array(
		array(
			'setting'  => 'customize_body_bg',
			'operator' => '==',
			'value'    => 'yes',
		),
	),
) );

Composer_Kirki::add_field( 'selection_bg_color', array(
	'type'     => 'color',
	'settings' => 'selection_bg_color',
	'label'    => esc_html__( 'Selection Text Background Color', 'composer' ),
	'section'  => 'styling-options',
	'default'  => '',	
	'choices'  => array(
		'alpha' => true,
	),
	'active_callback'    => array(
		array(
			'setting'  => 'customize_body_bg',
			'operator' => '==',
			'value'    => 'yes',
		),
	),
) );

Composer_Kirki::add_field( 'header_widget_title_color', array(
	'type'     => 'color',
	'settings' => 'header_widget_title_color',
	'label'    => esc_html__( 'Header Widget Title Color', 'composer' ),
	'section'  => 'styling-options',
	'default'  => '',	
	'active_callback'    => array(
		array(
			'setting'  => 'customize_body_bg',
			'operator' => '==',
			'value'    => 'yes',
		),
	),
) );

Composer_Kirki::add_field( 'header_text_color', array(
	'type'     => 'color',
	'settings' => 'header_text_color',
	'label'    => esc_html__( 'Header Widget Text Color', 'composer' ),
	'section'  => 'styling-options',
	'default'  => '',	
	'active_callback'    => array(
		array(
			'setting'  => 'customize_body_bg',
			'operator' => '==',
			'value'    => 'yes',
		),
	),
) );

Composer_Kirki::add_field( 'header_link_color', array(
	'type'     => 'color',
	'settings' => 'header_link_color',
	'label'    => esc_html__( 'Header Widget Link Color', 'composer' ),
	'section'  => 'styling-options',
	'default'  => '',	
	'active_callback'    => array(
		array(
			'setting'  => 'customize_body_bg',
			'operator' => '==',
			'value'    => 'yes',
		),
	),
) );

Composer_Kirki::add_field( 'header_link_hover_color', array(
	'type'     => 'color',
	'settings' => 'header_link_hover_color',
	'label'    => esc_html__( 'Header Widget Link Hover Color', 'composer' ),
	'section'  => 'styling-options',
	'default'  => '',	
	'active_callback'    => array(
		array(
			'setting'  => 'customize_body_bg',
			'operator' => '==',
			'value'    => 'yes',
		),
	),
) );

Composer_Kirki::add_field( 'highlight_color', array(
	'type'     => 'color',
	'settings' => 'highlight_color',
	'label'    => esc_html__( 'Highlight Color', 'composer' ),
	'section'  => 'styling-options',
	'default'  => '',	
	'active_callback'    => array(
		array(
			'setting'  => 'customize_body_bg',
			'operator' => '==',
			'value'    => 'yes',
		),
	),
) );