<?php
/**
 * The Ocean functions and definitions
 *
 * @package Composer
 */

function composer_require_file ( $file_path ) {
    require_once ( $file_path );
}

if ( ! function_exists( 'composer_setup' ) ) {

    function composer_setup() {

        load_theme_textdomain( 'composer', get_template_directory() . '/languages' );

        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );

        add_theme_support( 'title-tag' );

        add_theme_support( 'post-thumbnails' );

        add_theme_support( 'wc-product-gallery-zoom' );
        add_theme_support( 'wc-product-gallery-lightbox' );
        add_theme_support( 'wc-product-gallery-slider' );

        add_theme_support( 'custom-header' );

        // wp menus
        add_theme_support( 'menus' );

        if ( class_exists( 'WooCommerce' ) ) {
            //WooCommerce theme support
            add_theme_support( 'woocommerce' );
        }

        //registering wp3+ menus
        register_nav_menus(
            array(
                'main-nav'       => esc_html__( 'The Main Menu', 'composer' ),   // main nav in header
                'main-nav-left'  => esc_html__( 'Left Main Menu', 'composer' ),   // main nav Left in header
                'main-nav-right' => esc_html__( 'Right Main Menu', 'composer' ),   // main nav Right in header
                'top-head-nav'   => esc_html__( 'Top Header Nav', 'composer' ),
                'footer-nav'     => esc_html__( 'Footer Nav', 'composer' ),
                'left-nav'       => esc_html__( 'Left Side Nav', 'composer' ),
                'right-nav'      => esc_html__( 'Right Side Nav', 'composer' ),
                '404-nav'        => esc_html__( '404 Nav', 'composer' ),
                'mobile-nav'      => esc_html__( 'Mobile Nav', 'composer' ),
            )
        );


        /*
        * Switch default core markup for search form, comment form, and comments
        * to output valid HTML5.
        */
        add_theme_support( 'html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ) );

        /*
        * Enable support for Post Formats.
        * See http://codex.wordpress.org/Post_Formats
        */
        add_theme_support( 'post-formats', array(
            'audio',
            'image',
            'video',
            'quote',
            'link',
            'gallery',
        ) );

        // Set up the WordPress core custom background feature.
        add_theme_support( 'custom-background', 
            apply_filters( 'pix_custom_background_args', 
                array(
                    'default-color' => 'ffffff',
                    'default-image' => '',
                ) 
            ) 
        );

      add_filter( 'get_search_form', 'composer_wpsearch' );
    }
}

add_action( 'after_setup_theme', 'composer_setup' );

// the main menu
function composer_main_nav() {
    
    $menu = composer_get_meta_value( get_the_ID(), '_amz_main_navigation', 'default' ); // id, meta_key, meta_default
    $menu = ( 'default' != $menu ) ? $menu : '';

    // display the wp3 menu if available
    wp_nav_menu(array(
        'menu'            => $menu,
        'container'       => false,                     // remove nav container
        'container_class' => 'menu clearfix',           // class of container (should you choose to use it)
        'menu_class'      => 'menu clearfix',           // adding custom nav class
        'theme_location'  => 'main-nav',                // where it's located in the theme
        'before'          => '',                        // before the menu
        'after'           => '<span class="pix-dropdown-arrow"></span>', // after the menu
        'link_before'     => '',                        // before each link
        'link_after'      => '',                        // after each link
        'depth'           => 4,                         // limit the depth of the nav
        'fallback_cb'     => '',                        // fallback function
        'walker'          => new Composer_Menu_Extend_Walker()
    ));


} /* end composer main nav */

// the main menu
function composer_mobile_nav() {

    $menu = composer_get_meta_value( get_the_ID(), '_amz_mobile_navigation', 'default' ); // id, meta_key, meta_default
    $menu = ( 'default' != $menu ) ? $menu : '';

    // display the wp3 menu if available
    wp_nav_menu(array(
        'menu'            => $menu,
        'container'       => false,                     // remove nav container
        'container_class' => 'menu clearfix',           // class of container (should you choose to use it)
        'menu_class'      => 'menu clearfix',           // adding custom nav class
        'theme_location'  => 'mobile-nav',                // where it's located in the theme
        'before'          => '',                        // before the menu
        'after'           => '<span class="pix-dropdown-arrow"></span>', // after the menu
        'link_before'     => '',                        // before each link
        'link_after'      => '',                        // after each link
        'depth'           => 4,                         // limit the depth of the nav
        'fallback_cb'     => '',                        // fallback function
        'walker'          => new Composer_Menu_Extend_Walker()
    ));


} /* end composer main nav */

function composer_main_left_nav() {

    $menu = composer_get_meta_value( get_the_ID(), '_amz_left_navigation', 'default' ); // id, meta_key, meta_default
    $menu = ( 'default' != $menu ) ? $menu : '';

    // display the wp3 menu if available
    wp_nav_menu(array(
        'menu'            => $menu,
        'container'       => false,                     // remove nav container
        'container_class' => 'menu clearfix',           // class of container (should you choose to use it)
        'menu_class'      => 'menu clearfix',           // adding custom nav class
        'theme_location'  => 'main-nav-left',                // where it's located in the theme
        'before'          => '',                        // before the menu
        'after'           => '<span class="pix-dropdown-arrow"></span>', // after the menu
        'link_before'     => '',                        // before each link
        'link_after'      => '',                        // after each link
        'depth'           => 3,                         // limit the depth of the nav
        'fallback_cb'     => '',                        // fallback function
        'walker'          => new Composer_Menu_Extend_Walker()
    ));
} /* end composer main nav */

function composer_main_right_nav() {

    $menu = composer_get_meta_value( get_the_ID(), '_amz_right_navigation', 'default' ); // id, meta_key, meta_default
    $menu = ( 'default' != $menu ) ? $menu : '';

    // display the wp3 menu if available
    wp_nav_menu(array(
        'menu'            => $menu,
        'container'       => false,                     // remove nav container
        'container_class' => 'menu clearfix',           // class of container (should you choose to use it)
        'menu_class'      => 'menu clearfix',           // adding custom nav class
        'theme_location'  => 'main-nav-right',                // where it's located in the theme
        'before'          => '',                        // before the menu
        'after'           => '<span class="pix-dropdown-arrow"></span>', // after the menu
        'link_before'     => '',                        // before each link
        'link_after'      => '',                        // after each link
        'depth'           => 3,                         // limit the depth of the nav
        'fallback_cb'     => '',                        // fallback function
        'walker'          => new Composer_Menu_Extend_Walker()
    ));
} /* end composer main nav */

function composer_404_nav() {
    // display the wp3 menu if available
    wp_nav_menu(
        array(
            'theme_location' => '404-nav',
            'container'      => false,
            'menu_class'     => 'alignCenter nav404',
            'echo'           => true,
            'before'         => '&emsp;',
            'after'          => '&emsp;',
            'link_before'    => '',
            'link_after'     => '',
            'depth'          => 1,
            'fallback_cb'    => ''
            )
    );
} /* end composer main nav */

function composer_top_nav() {
    // display the wp3 menu if available
    wp_nav_menu(
        array(
            'theme_location' => 'top-head-nav',
            'container'      => false,
            'menu_class'     => 'top-head-nav clearfix',
            'echo'           => true,
            'before'         => '',
            'after'          => '',
            'link_before'    => '',
            'link_after'     => '',
            'depth'          => 1,
            'fallback_cb'    => ''
            )
    );
} /* end composer main nav */

function composer_footer_nav() {
    // display the wp3 menu if available
    wp_nav_menu(
        array(
            'theme_location' => 'footer-nav',
            'container'      => false,
            'menu_class'     => 'top-head-nav clearfix',
            'echo'           => true,
            'before'         => '',
            'after'          => '',
            'link_before'    => '',
            'link_after'     => '',
            'depth'          => 1,
            'fallback_cb'    => ''
            )
    );
} /* end composer footer nav */

function composer_side_nav( $menu_pos, $key ) {

    $side_menu = composer_get_meta_value( get_the_ID(), '_amz_'. $key .'_side_navigation', 'default' ); // id, meta_key, meta_default.

    $side_menu = ( 'default' != $side_menu ) ? $side_menu : '';

    wp_nav_menu(
        array(
            'menu'           => $side_menu,
            'theme_location' => $menu_pos,
            'container'      => false,
            'menu_class'     => 'sub-navigation',
            'echo'           => true,
            'before'         => '',
            'after'          => '',
            'link_before'    => '',
            'link_after'     => '',
            'depth'          => 1,
            'fallback_cb'    => ''
            )
        );
}

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function composer_content_width() {
  $GLOBALS['content_width'] = apply_filters( 'composer_content_width', 840 );
}
add_action( 'after_setup_theme', 'composer_content_width', 0 );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function composer_widgets_init() {

    register_sidebar( array(
        'id' => 'primary-sidebar',
        'name' => esc_html__( 'Primary Sidebar', 'composer' ),
        'description' => esc_html__( 'The primary sidebar this will be the default sidebar for pages.', 'composer' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s clearfix">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widgettitle">',
        'after_title' => '</h3>',
    ) );

    register_sidebar( array(
        'id' => 'blog-sidebar',
        'name' => esc_html__( 'Blog Sidebar', 'composer' ),
        'description' => esc_html__( 'This is default sidebar for Blog, catergories, Archives and single posts pages.', 'composer' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s clearfix">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widgettitle">',
        'after_title' => '</h3>',
    ) );

    $composer_footer_widget_layout = composer_get_option_value( 'f_widget_col', 'col3' );
    
    if( 'col3' == $composer_footer_widget_layout || 'col4' == $composer_footer_widget_layout ) {
        register_sidebar(
            array(
                'id' => 'footer-widgets',
                'name' => esc_html__('Footer Widgets', 'composer' ),
                'description' => esc_html__('Add Widgets to display in footer.', 'composer' ),
                'before_widget' => '<div id="%1$s" class="widget %2$s clearfix">',
                'after_widget' => '</div>',
                'before_title' => '<h3 class="widgettitle">',
                'after_title' => '</h3>'
            )
        );
    }
    else {
        
        // Footer Layouts
        register_sidebar(
            array(
                'id' => 'footer-first-column',
                'name' => esc_html__('Footer First Column', 'composer' ),
                'description' => esc_html__('Add Widgets to display in footer layout first column.', 'composer' ),
                'before_widget' => '<div id="%1$s" class="widget %2$s clearfix">',
                'after_widget' => '</div>',
                'before_title' => '<h3 class="widgettitle">',
                'after_title' => '</h3>'
            )
        );

        register_sidebar(
            array(
                'id' => 'footer-second-column',
                'name' => esc_html__('Footer Second Column', 'composer' ),
                'description' => esc_html__('Add Widgets to display in footer layout second column.', 'composer' ),
                'before_widget' => '<div id="%1$s" class="widget %2$s clearfix">',
                'after_widget' => '</div>',
                'before_title' => '<h3 class="widgettitle">',
                'after_title' => '</h3>'
            )
        );

        // layout1, 

        if( 'layout5' != $composer_footer_widget_layout && 'layout7' != $composer_footer_widget_layout &&'layout8' != $composer_footer_widget_layout ) {

            register_sidebar(
                array(
                    'id' => 'footer-third-column',
                    'name' => esc_html__('Footer Third Column', 'composer' ),
                    'description' => esc_html__('Add Widgets to display in footer layout third column.', 'composer' ),
                    'before_widget' => '<div id="%1$s" class="widget %2$s clearfix">',
                    'after_widget' => '</div>',
                    'before_title' => '<h3 class="widgettitle">',
                    'after_title' => '</h3>'
                )
            );

            if( 'layout1' != $composer_footer_widget_layout && 'layout2' != $composer_footer_widget_layout && 'layout6' != $composer_footer_widget_layout && 'layout9' != $composer_footer_widget_layout && 'layout10' != $composer_footer_widget_layout && 'layout11' != $composer_footer_widget_layout && 'layout115' != $composer_footer_widget_layout && 'layout16' != $composer_footer_widget_layout ) {

                register_sidebar(
                    array(
                        'id' => 'footer-fourth-column',
                        'name' => esc_html__('Footer Fourth Column', 'composer' ),
                        'description' => esc_html__('Add Widgets to display in footer layout fourth column.', 'composer' ),
                        'before_widget' => '<div id="%1$s" class="widget %2$s clearfix">',
                        'after_widget' => '</div>',
                        'before_title' => '<h3 class="widgettitle">',
                        'after_title' => '</h3>'
                    )
                );

                if( 'layout14' == $composer_footer_widget_layout || 'layout19' == $composer_footer_widget_layout || 'layout20' == $composer_footer_widget_layout ) {

                    register_sidebar(
                        array(
                            'id' => 'footer-fifth-column',
                            'name' => esc_html__('Footer Fifth Column', 'composer' ),
                            'description' => esc_html__('Add Widgets to display in footer layout fifth column.', 'composer' ),
                            'before_widget' => '<div id="%1$s" class="widget %2$s clearfix">',
                            'after_widget' => '</div>',
                            'before_title' => '<h3 class="widgettitle">',
                            'after_title' => '</h3>'
                        )
                    );

                }

                if( 'layout19' == $composer_footer_widget_layout || 'layout20' == $composer_footer_widget_layout ) {

                    register_sidebar(
                        array(
                            'id' => 'footer-sixth-column',
                            'name' => esc_html__('Footer Sixth Column', 'composer' ),
                            'description' => esc_html__('Add Widgets to display in footer layout sixth column.', 'composer' ),
                            'before_widget' => '<div id="%1$s" class="widget %2$s clearfix">',
                            'after_widget' => '</div>',
                            'before_title' => '<h3 class="widgettitle">',
                            'after_title' => '</h3>'
                        )
                    );

                }

                if( 'layout20' == $composer_footer_widget_layout ) {

                    register_sidebar(
                        array(
                            'id' => 'footer-seventh-column',
                            'name' => esc_html__('Footer Seventh Column', 'composer' ),
                            'description' => esc_html__('Add Widgets to display in footer layout seventh column.', 'composer' ),
                            'before_widget' => '<div id="%1$s" class="widget %2$s clearfix">',
                            'after_widget' => '</div>',
                            'before_title' => '<h3 class="widgettitle">',
                            'after_title' => '</h3>'
                        )
                    );

                }

            }

        }
    }

    $composer_header_widget = composer_get_option_value( 'header_widget', 'hide' );
    
    if( 'show' == $composer_header_widget ) {
        register_sidebar(
            array(
                'id' => 'header-widgets',
                'name' => esc_html__('Header Widgets', 'composer' ),
                'description' => esc_html__('Add Widgets to display in Header Widget Area.', 'composer' ),
                'before_widget' => '<div id="%1$s" class="widget %2$s clearfix">',
                'after_widget' => '</div>',
                'before_title' => '<h3 class="widgettitle">',
                'after_title' => '</h3>'
            )
        );
    }

    if ( class_exists( 'WooCommerce' ) ) {
        register_sidebar( array(
            'id' => 'shop',
            'name' => esc_html__('Shop', 'composer' ),
            'description' => esc_html__('Add Widgets to display in Shop Page.', 'composer' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s clearfix">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widgettitle">',
            'after_title' => '</h3>',
        ) );
        register_sidebar( array(
            'id' => 'single-shop',
            'name' => esc_html__('Single Shop', 'composer' ),
            'description' => esc_html__('Add Widgets to display in Single Shop Page.', 'composer' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s clearfix">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widgettitle">',
            'after_title' => '</h3>',
        ) );
    }

}
add_action( 'widgets_init', 'composer_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function composer_scripts_and_styles() {

    // call global $wp_styles variable to add conditional wrapper around ie stylesheet the WordPress way
    global $wp_styles, $smof_data; 

    if ( !is_admin() ) {

        //Adding scripts file in the footer
        $pix_ajax = isset( $smof_data['pix_ajax'] ) ? $smof_data['pix_ajax'] : 'no';

        /* 
         * Theme CSS
         */

        wp_enqueue_style( 'composer-fonts', get_template_directory_uri() . '/_css/pix-icons.css', array(), '3.0.3', 'all' );

        wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/_css/bootstrap.min.css', array('composer-fonts'), '3.1.1', 'all' );

        if( ( class_exists( 'WPBakeryVisualComposerAbstract' ) && 'yes' === $pix_ajax  ) ||  is_page_template( 'templates/page-portfolio-category.php' ) || is_tax( 'pix_categories' ) ) {
            wp_enqueue_style( 'js_composer_front' );
            wp_enqueue_style( 'js_composer_custom_css' );
        }

        wp_enqueue_style( 'composer-animate-stylesheet', get_template_directory_uri() . '/_css/animate.min.css', array('bootstrap'), '3.0.3', 'all' );

        wp_enqueue_style( 'composer-stylesheet', get_template_directory_uri() . '/_css/main.css', array('bootstrap'), '3.0.3', 'all' );

        wp_enqueue_style( 'composer-form-g', get_template_directory_uri() . '/_css/form.css', array('bootstrap'), '1.0', 'all' );

        wp_enqueue_style( 'bbpress', get_template_directory_uri() . '/_css/bbpress.css', array('bootstrap'), '1.0', 'all' );

        // register responsive stylesheet
        $mobile_responsive = isset($smof_data['mobile_responsive'])? $smof_data['mobile_responsive'] : 'on';
        if( 'on' === $mobile_responsive ){
            wp_enqueue_style( 'composer-responsive-stylesheet', get_template_directory_uri() . '/_css/responsive.css', array('composer-stylesheet'), '3.0.3', 'all' );
        }else{
            wp_enqueue_style( 'composer-responsive-stylesheet', get_template_directory_uri() . '/_css/non-responsive.css', array('composer-stylesheet'), '3.0.3', 'all' );
        }

        wp_enqueue_style( 'composer-plugins-stylesheet', get_template_directory_uri() . '/_css/plugins.css', array('composer-stylesheet'), '3.0.3', 'all' );

        if ( class_exists('WooCommerce') ) {
            wp_enqueue_style( 'composer-woo-stylesheet', get_template_directory_uri() . '/_css/woo.css', array( 'composer-plugins-stylesheet' ), '3.0.3', 'all' );
        }

        if ( is_rtl() ) {
            wp_enqueue_style( 'composer-rtl-stylesheet', get_template_directory_uri() . '/_css/rtl.css', array( 'composer-plugins-stylesheet' ), '3.0.3', 'all' );
        }
        

        $to_last_saved_time = get_theme_mod( 'to_last_saved_time', '3.0.3' );

        /* if(is_multisite()) {

            $uploads = wp_upload_dir();
            $my_theme = wp_get_theme();
            $theme_name = strtolower( str_replace( ' ', '-', $my_theme->get( 'Name' ) ) );

            $css_upload_dir = $uploads['baseurl'] . '/'. $theme_name;

            wp_enqueue_style( 'composer-custom-css', $css_upload_dir . '/custom.css', array('composer-plugins-stylesheet'), $to_last_saved_time, 'all' );
            
        } else {
            wp_enqueue_style( 'composer-custom-css', get_template_directory_uri() . '/_css/custom.css', array( 'composer-plugins-stylesheet' ), $to_last_saved_time, 'all' );
        } */

        $uploads = wp_upload_dir();
        $my_theme = wp_get_theme();
        $theme_name = htmlentities( strtolower( str_replace( array(' ','.'), array('-',''), $my_theme->get( 'Name' ) ) ) );

        $css_upload_dir = $uploads['baseurl'] . '/'. $theme_name;

        wp_enqueue_style( 'composer-custom-css', $css_upload_dir . '/custom.css', array('composer-plugins-stylesheet'), $to_last_saved_time, 'all' );


        /* 
         * Theme Js
         */

        if( 'yes' === $pix_ajax ){
            $load_script_in_footer = false;
        } else{
            $load_script_in_footer = true;
        }   

        //Protocol
        $protocol = is_ssl() ? 'https' : 'http';

        wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/_js/libs/modernizr.custom.min.js', array( 'jquery' ), '2.5.3', false );
        
        wp_enqueue_script( 'waypoints', get_template_directory_uri() . '/_js/waypoints.min.js', array( 'jquery' ), '2.0.4', $load_script_in_footer );

        if ( class_exists('WPBakeryVisualComposerAbstract')  && 'yes' === $pix_ajax ) {
            wp_enqueue_script( 'composer-plugins-js', get_template_directory_uri() . '/_js/plugins.js', array( 'jquery', 'jquery-ui-tabs', 'jquery-ui-accordion', 'jquery_ui_tabs_rotate', 'prettyphoto', 'waypoints', 'vc_jquery_skrollr_js', 'wpb_composer_front_js' ), '3.0.3', $load_script_in_footer );
        }else{
            wp_enqueue_script( 'composer-plugins-js', get_template_directory_uri() . '/_js/plugins.js', array( 'jquery', 'waypoints' ), '3.0.3', $load_script_in_footer );
        }

        wp_localize_script( 'composer-plugins-js', 'pix_composer',
            array(
                'rootUrl' => esc_url( home_url( '/' ) ),
                'ajaxurl' => esc_url( admin_url( 'admin-ajax.php' ) ),
                'rtl'     => is_rtl() ? 'true' : 'false'
            )
        );
        
        if( !isset( $_GET['vc_editable'] ) ){
            wp_enqueue_script( 'composer-js', get_template_directory_uri() . '/_js/scripts.js', array( 'jquery', 'waypoints', 'composer-plugins-js' ), '3.0.3', $load_script_in_footer );
        }

        if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
            wp_enqueue_script( 'comment-reply' );
        }

    }
}
add_action( 'wp_enqueue_scripts', 'composer_scripts_and_styles' );

/**
* Theme Framework
*/
require get_template_directory() . '/framework/theme-init.php';

function composer_custom_nav_attributes ( $atts, $item, $args ) {
    $atts['data-scroll'] = 'true';
    return $atts;
}
add_filter( 'nav_menu_link_attributes', 'composer_custom_nav_attributes', 10, 3 );

function composer_add_editor_styles() {
    add_editor_style( 'custom-editor-style.css' );
}
add_action( 'admin_init', 'composer_add_editor_styles' );


function composer_add_inline_css() {

    if( is_home() || is_archive() || is_search() || is_404() ) {
        $id = get_option('page_for_posts');
    } else {
        $id = get_the_ID();
    }

    $prefix = composer_get_prefix();

    //Empty Assignment
    $sub_header_css = $sub_header_text_color = $sub_header_overlay = $body_bg = $body_container_bg = '';

    /* Title Bar */
    $title_bar_style = composer_get_meta_value( $id, '_amz_title_bar_style', 'default', 'title_bar_style', 'default' ); // id, meta_key, meta_default, themeoption_key, themeoption_default

    $title_bar_bg_color = composer_get_meta_value( $id, '_amz_title_bar_bg_color', 'default', 'title_bar_bg_color', '' ); // id, meta_key, meta_default, themeoption_key, themeoption_default

    $title_bar_text_color = composer_get_meta_value( $id, '_amz_title_bar_text_color', 'default', 'title_bar_text_color', '' ); // id, meta_key, meta_default, themeoption_key, themeoption_default

    $title_bar_bg_image    = composer_get_meta_value( $id, '_amz_title_bar_bg_image' ); // id, meta_key, meta_default, themeoption_key, themeoption_default

    if( $title_bar_style == 'custom' && !empty( $title_bar_bg_image ) ){

        $header_bg_image = json_decode( htmlspecialchars_decode( $title_bar_bg_image ),true );

        if( is_array( $header_bg_image ) && !empty( $header_bg_image ) ){
            $header_bg_image = $header_bg_image[0]['full'];
        }
    }

    if( ( $title_bar_style == 'custom' ) && ( !empty($header_bg_image ) || !empty( $title_bar_bg_color ) || !empty( $title_bar_text_color ) ) ){

        if( $title_bar_style == 'custom' && !empty( $title_bar_bg_color ) ){
            $sub_header_css .= !empty( $title_bar_bg_color ) ? 'background-color:'. $title_bar_bg_color .';' : '';
        }

        if( $title_bar_style == 'custom' && !empty( $header_bg_image ) ){
            $sub_header_css .= 'background-image: url('. esc_url( $header_bg_image ) .');';
            $sub_header_css .= 'background-size: cover;';
            $sub_header_css .= 'background-repeat: no-repeat;background-position: center center;';
        }

        if( $title_bar_style == 'custom' && !empty( $title_bar_text_color ) ){
            $sub_header_text_color .= 'color:'. $title_bar_text_color .';';
        }        
    }

    $overlay_color = composer_get_meta_value( $id, '_amz_title_bar_overlay_color', 'default', 'title_bar_overlay_color', '' ); // id, meta_key, meta_default, themeoption_key, themeoption_default

    $gradient1 = composer_get_meta_value( $id, '_amz_title_bar_gradient_top_value', 'default', 'title_bar_gradient_top_value', '' ); // id, meta_key, meta_default, themeoption_key, themeoption_default

    $gradient2 = composer_get_meta_value( $id, '_amz_title_bar_gradient_middle_value', 'default', 'title_bar_gradient_middle_value', '' ); // id, meta_key, meta_default, themeoption_key, themeoption_default

    $gradient3 = composer_get_meta_value( $id, '_amz_title_bar_gradient_bottom_value', 'default', 'title_bar_gradient_bottom_value', '' ); // id, meta_key, meta_default, themeoption_key, themeoption_default

    $overlay_opacity = composer_get_meta_value( $id, '_amz_title_bar_gradient_opacity', 'default', 'title_bar_gradient_opacity', '0.9' ); // id, meta_key, meta_default, themeoption_key, themeoption_default

    if( !empty( $overlay_color ) ){
        $sub_header_overlay .= 'background:'. esc_attr( $overlay_color ) .';';
        if( !empty($overlay_opacity) ) {
            $sub_header_overlay .= 'opacity: '. esc_attr( $overlay_opacity ) .'';
        }
    }
    elseif( !empty( $gradient1 ) || !empty( $gradient2 ) || !empty( $gradient3 ) ){
        if(!empty($gradient1)){
            $bg_gradient = $gradient1;
        } elseif(!empty($gradient2)) {
            $bg_gradient = $gradient2;
        } else {
            $bg_gradient = $gradient3;
        }
        $gradient1 = !empty($gradient1) ? $gradient1.', ': '';
        $gradient2 = !empty($gradient2) ? $gradient2.', ': '';
        $sub_header_overlay = 'background: '. $bg_gradient .';
            background: -webkit-linear-gradient('. esc_attr( $gradient1 ) . esc_attr( $gradient2 ) . esc_attr( $gradient3 ) .');
            background: -o-linear-gradient('. esc_attr( $gradient1 ) . esc_attr( $gradient2 ) . esc_attr( $gradient3 ) .');
            background: -moz-linear-gradient('. esc_attr( $gradient1 ) . esc_attr( $gradient2 ) . esc_attr( $gradient3 ) .');
            background: linear-gradient('. esc_attr( $gradient1 ) . esc_attr( $gradient2 ) . esc_attr( $gradient3 ) .');';
        if( !empty($overlay_opacity) ) {
            $sub_header_overlay .= 'opacity: '. esc_attr( $overlay_opacity ) .';';
        }
    }

    /* Body Background */
    if( is_home() || is_search() || is_archive() || is_404() || composer_is_shop() ) {
        $body_bgcolor = composer_get_option_value( $prefix.'body_bgcolor', '' );
        $body_container_bgcolor = composer_get_option_value( $prefix.'body_container_bgcolor', '' );

    }
    else {
        $general = composer_get_option_value( 'body_bgcolor', '' );
        $page = composer_get_meta_value( $id, '_amz_body_bgcolor', '' ); // id, meta_key, meta_default

        if( !empty( $page ) ) {
            $body_bgcolor = $page;
        }
        else {
            $body_bgcolor = $general;
        }
    }

    if ( isset ( $body_bgcolor ) && !empty ( $body_bgcolor ) ) {
        $body_bg .= 'background-color:'. $body_bgcolor .';';
    }

    if ( isset ( $body_container_bgcolor ) && !empty ( $body_container_bgcolor ) ) {
        $body_container_bg .= 'background-color:'. $body_container_bgcolor .' !important;';
    }

    $custom_css = "
        #sub-header, .composer-header-dark #sub-header {
            {$sub_header_css}
        }
        #sub-header h2, .banner-header h2, .breadcrumb li a, .breadcrumb li span, #sub-header .current {
            {$sub_header_text_color}
        }
        #sub-header .pattern {
            {$sub_header_overlay}
        }
        body, #main-wrapper {
            {$body_bg}
        }
        #main-wrapper {
            {$body_container_bg}
        }
    ";

    wp_add_inline_style( 'composer-responsive-stylesheet', wp_strip_all_tags( stripslashes( $custom_css ) ) );

}
add_action( 'wp_enqueue_scripts', 'composer_add_inline_css' );

// Enable shortcodes in text widgets 
function composer_do_shortcode( $content ) {
    
    $widget_css = '';

    if ( in_array( 'js_composer/js_composer.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {

        $css = apply_filters( 'vc_base_build_shortcodes_custom_css', visual_composer()->parseShortcodesCustomCss( $content ) );
        $widget_css .= "<style type='text/css'>";
            $widget_css .= $css;
        $widget_css .= "</style>";
    }

    return $widget_css . do_shortcode( $content );

}
add_filter('widget_text','composer_do_shortcode');

function blog_loadmore(){

    // Empty assignment
    $output = '';

    // Get ajax values
    $args = isset($_POST['args']) ? $_POST['args'] : '';
    $values = isset($_POST['values']) ? $_POST['values'] : '';

    // Add next paged number in a query
    $args['paged'] = isset($_POST['paged']) ? $_POST['paged'] : 1;

    query_posts( $args );

    if ( have_posts() ) :
        $post_count = 1;
        echo '<div class="ajax-posts-wrap">';
        echo '<div class="ajax-posts" data-paged="'. esc_attr( $args['paged'] ) .'">';

            while ( have_posts() ) : the_post();
                get_template_part( 'blog/blog', 'content' );
            $post_count++; endwhile;

        echo '</div>';
        echo '</div>';
    else:
        echo '<div>'. esc_html__('Post Not Found.', 'composer'). '</div>';
    endif;

    wp_reset_query();

    die();
}

// ajax functions
add_action('wp_ajax_blog_loadmore',  'blog_loadmore' );
add_action('wp_ajax_nopriv_blog_loadmore', 'blog_loadmore' );

function shop_loadmore(){

    // Empty assignment
    $output = '';

    // Get ajax values
    $args = isset($_POST['args']) ? $_POST['args'] : '';
    $values = isset($_POST['values']) ? $_POST['values'] : '';

    // Add next paged number in a query
    $args['paged'] = isset($_POST['paged']) ? $_POST['paged'] : 1;

    query_posts($args);

    if ( have_posts() ) :
        $post_count = 1;
        echo '<div class="ajax-posts-wrap">';
        echo '<div class="ajax-posts" data-paged="'. esc_attr( $args['paged'] ) .'">';

            while ( have_posts() ) : the_post();

                wc_get_template_part( 'content', 'product' );

            $post_count++; endwhile;

        echo '</div>';
        echo '</div>';
    else:
        echo '<div>'. esc_html__('Products Not Found.', 'composer'). '</div>';
    endif;

    wp_reset_query();

    die();
}

// ajax functions
add_action('wp_ajax_shop_loadmore',  'shop_loadmore' );
add_action('wp_ajax_nopriv_shop_loadmore', 'shop_loadmore' );


function portfolio_loadmore(){

    // Empty assignment
    $output = '';

    // Get ajax values
    $args = isset($_POST['args']) ? $_POST['args'] : '';
    $paged = isset($_POST['paged']) ? $_POST['paged'] : '';
    $values = isset($_POST['values']) ? $_POST['values'] : '';

    // Add values in a query
    $args['paged'] = isset($_POST['paged']) ? $_POST['paged'] : 1;
    $args['s'] = isset($_POST['search']) ? $_POST['search'] : '';

    // Seperate array values as variables

    // Seperate array values as variables
    $columns               = $values['columns'];
    $portfolio_style       = $values['portfolio_style'];
    $hover_style           = $values['hover_style'];
    $title_tag             = $values['title_tag'];
    $title_custom_style    = $values['title_custom_style'];
    $category_custom_style = $values['category_custom_style'];
    $like                  = $values['like'];
    $on_click              = $values['on_click'];
    $link_target           = $values['link_target'];
    $style2_click          = $values['style2_click'];

    if( $columns == 'col3' ){
        $shorten_length = 50;
        $class = 'vc_col-sm-4';
        $width = '640';
    }
    elseif( $columns == 'col2' ){
        $shorten_length = 120;
        $class = 'vc_col-sm-6';
        $width = '960';
    }
    else{
        $class = 'vc_col-sm-3';
        $shorten_length = 120;
        $width = '480';
    }

        if( $columns == 'col3' && ( $portfolio_style == 'grid' || $portfolio_style == 'masonry-fixed' ) ) {         
            $height = '640';
        }
        elseif( $columns == 'col2' && ( $portfolio_style == 'grid' || $portfolio_style == 'masonry-fixed' ) ) {         
            $height = '800';
        }
        elseif( ( $columns == 'col4' || $columns == '' ) && ( $portfolio_style == 'grid' || $portfolio_style == 'masonry-fixed' ) ) {           
            $height = '480';
        }

    $q = new WP_Query( $args );
    $max = $q->max_num_pages;

    echo '<div class="ajax-posts-wrap">';

        if ( $q->have_posts() ) :
            $post_count = 1;
            echo '<div class="ajax-posts" data-post-found="true" data-paged="'. esc_attr( $paged ) .'" data-max="'. esc_attr( $max ) .'">';

                while ( $q->have_posts() ) : $q->the_post();

                    $portfolio_image_style = composer_get_meta_value( get_the_id(), '_amz_portfolio_image_style', 'square' );

                    if ( $portfolio_style == 'masonry-fixed' ) {

                        if( $columns == 'col3' ){
                            $temp_class = 'vc_col-sm-4';
                            $temp_width = '640';
                            $temp_height = '640';
                        }
                        elseif( $columns == 'col2' ){
                            $temp_class = 'vc_col-sm-6';
                            $temp_width = '960';
                            $temp_height = '800';
                        }
                        else{
                            $temp_class = 'vc_col-sm-3';
                            $temp_width = '480';
                            $temp_height = '480';
                        }

                        if ( $portfolio_image_style == 'boxed' ) {
                            $width = $temp_width * 2;
                            $height = $temp_height * 2;

                            if( $columns == 'col3' ){
                                $class = 'vc_col-sm-8';
                            }
                            elseif( $columns == 'col2' ){
                                $class = 'vc_col-sm-12';
                            }
                            else{
                                $class = 'vc_col-sm-6';
                            }

                        }
                        elseif ( $portfolio_image_style == 'horizontal' ) {
                            $width = $temp_width * 2;
                            $height = $temp_height;

                            if( $columns == 'col3' ){
                                $class = 'vc_col-sm-8';
                            }elseif( $columns == 'col2' ){
                                $class = 'vc_col-sm-12';
                            }else{
                                $class = 'vc_col-sm-6';
                            }

                        }
                        elseif ( $portfolio_image_style == 'vertical' ) {

                            $width = $temp_width;
                            $height = $temp_height * 2;

                            $class = $temp_class;

                        }
                        else {
                            $width = $temp_width;
                            $height = $temp_height;

                            $class = $temp_class;
                        }

                        $masonry_class = ' masonry-class';

                    }   

                    // Useful values saved as variable
                    $terms = get_the_terms( get_the_ID(),'pix_categories' );

                    $temp_title = get_the_title(); //title
                    $temp_content = composer_shorten_text( get_the_content(), $shorten_length ); //content
                    $temp_link = get_permalink(); //permalink

                    // Like
                    $like_count = get_post_meta( get_the_ID(), '_pix_like_me', true );
                    $like_class = ( isset( $_COOKIE['pix_like_me_'. get_the_ID()] ) ) ? 'liked' : '';

                    if($like_count == ''){
                        $like_count = 0;
                    }

                    $img = '';

                    $composer_portfolio_thumb = composer_get_meta_value( get_the_id(), '_amz_portfolio_image' );

                    $pix_images_gallery = htmlspecialchars_decode( $composer_portfolio_thumb );
                    $images_gallery = json_decode( $pix_images_gallery,true );            
                    
                    $temp_thumb = '';
                    if( !empty( $images_gallery ) ){                
                        
                        $temp_thumb = composer_get_image_by_id( (int)$width, (int)$height, $images_gallery[0]['itemId'], 0, 1, 1 );

                        $img_fullsize = composer_get_image_by_id( (int)$width, (int)$height, $images_gallery[0]['itemId'], 1, 1, 1 );
                    }

                    echo '<div class="load-element '. esc_attr( $class ) .' pix-portfolio-item element '. esc_attr( $hover_style );

                        if( !empty( $terms ) ) {
                            foreach( $terms as $term ) {
                                echo ' ' . esc_attr( strtolower( str_replace( ' ','-',$term->slug ) ) ) . ' '; 
                            }
                        }

                    echo '">';
                

                    echo '<div class="portfolio-container portfolio-'. esc_attr( $hover_style ) .'">'; //portfolio Container

                        //terms
                        $pix_cats = get_the_term_list( get_the_ID() , 'pix_categories','',', ' );
                        $pix_cats = !empty( $pix_cats ) ? strip_tags( $pix_cats ) : '';

                        if( $hover_style == 'style1' ){
                            //portfolio Image
                            echo '<div class="portfolio-img">
                                        '.$temp_thumb.'
                                    </div>';
                                    
                            echo  '<div class="portfolio-hover">';
                            
                                echo '<div class="portfolio-link">';

                                    if( $on_click == 'single_port_link' ) {
                                        echo '<a href="'. esc_url( get_permalink() ) .'" target"'. $link_target .'" class="inner-content">';
                                    } elseif( $on_click == 'single_button_link' ) {
                                        echo '<a href="'. esc_url( composer_get_meta_value( $id, '_amz_project_url', '' ) ) .'" target"'. $link_target .'" class="inner-content">';
                                    }
                                    
                                        echo '<div class="portfolio-content">'; //portfolio Container

                                            echo '<'. composer_title_tag( $title_tag ) .' class="title"'. $title_custom_style .'>'.esc_html( $temp_title ).'</'. composer_title_tag( $title_tag ) .'>'; //title

                                            echo '<p'. $category_custom_style .'>';
                                            
                                            echo $pix_cats; 

                                            echo '</p>';

                                        echo '</div>'; //End of portfolio Content

                                    if( $on_click == 'single_port_link' || $on_click == 'single_button_link' ){
                                        echo '</a>';
                                    }              

                                    //Lightbox icon
                                    if( $lightbox == 'yes' && !empty( $img_fullsize ) ){

                                        echo '<div class="portfolio-icons"><div class="center-wrap">'; //portfolio Container  

                                            echo '<a href="'. esc_url( $img_fullsize ) .'" class="port-icon-hover popup-gallery" data-title="'. esc_attr( get_the_title() ) .'"><i class="pixicon-plus"></i></a>';

                                        echo '</div></div>'; //End of portfolio icons
                                    }

                                echo '</div>';

                            echo  '</div>'; //End of portfolio hover
                        }

                        if($hover_style == 'style2'){
                            echo '<div class="portfolio-style2-img">';
                                //portfolio Image
                                echo '<div class="portfolio-img">
                                                '.$temp_thumb.'
                                            </div>';

                                echo  '<div class="portfolio-hover">';
                                    
                                    if( $style2_click == 'lightbox' ){
                                        echo '<a href="'. esc_url( $img_fullsize ) .'" class="inner-content popup-gallery">';
                                    } elseif( $style2_click == 'single_port_link' ) {
                                        echo '<a href="'. esc_url( get_permalink() ) .'" target"'. $link_target .'" class="inner-content">';
                                    } elseif( $style2_click == 'single_button_link' ) {
                                        echo '<a href="'. esc_url( composer_get_meta_value( get_the_ID(), '_amz_project_url', '' ) ) .'" target"'. $link_target .'" class="inner-content">';
                                    }

                                        echo '<div class="portfolio-link">';
                                        
                                            echo '<div class="portfolio-content">'; //portfolio Container

                                                echo '<div class="portfolio-icons"><div class="center-wrap">'; //portfolio Container                          

                                                    //Lightbox icon
                                                    echo '<span class="port-icon-hover"><i class="pixicon-plus"></i></span>';

                                                echo '</div></div>'; //End of portfolio icons

                                            echo '</div>'; //End of portfolio Content

                                        echo '</div>';

                                    echo '</a>';

                                echo  '</div>'; //End of portfolio hover

                            echo '</div>';
                            
                            echo '<div class="portfolio-style2-content">';
                                    //Author name
                                    if( $on_click == 'single_port_link' ) {
                                        echo '<'. composer_title_tag( $title_tag ) .' class="title"'. $title_custom_style .'><a href="'. esc_url( $temp_link ) .'" target"'. $link_target .'">'.esc_html( $temp_title ).'</a></'. composer_title_tag( $title_tag ) .'>';
                                    } elseif( $on_click == 'single_button_link' ) {
                                        echo '<'. composer_title_tag( $title_tag ) .' class="title"'. $title_custom_style .'><a href="'. esc_url( composer_get_meta_value( $id, '_amz_project_url', '' ) ) .'" target"'. $link_target .'">'.esc_html( $temp_title ).'</a></'. composer_title_tag( $title_tag ) .'>';
                                    } else {
                                        echo '<'. composer_title_tag( $title_tag ) .' class="title"'. $title_custom_style .'>'.esc_html( $temp_title ).'</'. composer_title_tag( $title_tag ) .'>'; //title
                                    }

                                    echo '<p'. $category_custom_style .'>';

                                    echo $pix_cats; 

                                    echo '</p>';
                                    if( $like == 'yes' ){
                                        echo '<div class="portfolio-style2-like">';
                                            $like_count = get_post_meta( get_the_ID(), '_pix_like_me', true );
                                            $like_class = ( isset($_COOKIE['pix_like_me_'. get_the_ID()])) ? 'liked' : '';

                                            if($like_count == ''){
                                                $like_count = 0;
                                            }

                                            echo '<a href="#void" class="pix-like-me '. $like_class .'" data-id="'. get_the_ID() .'"><i class="pixicon-heart-2"></i><span class="like-count">'. $like_count .'</span></a>';
                                        echo '</div>';
                                    }
                            echo '</div>';

                        }

                        if( $hover_style == 'style3' ){

                            echo $temp_thumb;
                            
                            echo '<div class="portfolio-style3-content">';

                                echo '<div class="portfolio-link">';

                                    if( $on_click == 'single_port_link' ) {
                                        echo '<a href="'. esc_url( get_permalink() ) .'" target"'. $link_target .'" class="inner-content">';
                                    } elseif( $on_click == 'single_button_link' ) {
                                        echo '<a href="'. esc_url( composer_get_meta_value( $id, '_amz_project_url', '' ) ) .'" target"'. $link_target .'" class="inner-content">';
                                    }

                                        echo '<div class="portfolio-content">';
                                            //Author name
                                            echo '<'. composer_title_tag( $title_tag ) .' class="title"'. $title_custom_style .'>'.esc_html( $temp_title ).'</'. composer_title_tag( $title_tag ) .'>'; //title

                                            echo '<p'. $category_custom_style .'>';

                                            echo $pix_cats; 

                                            echo '</p>';

                                        echo '</div>';
                                    
                                    if( $on_click == 'single_port_link' || $on_click == 'single_button_link' ){
                                        echo '</a>';
                                    }   

                                echo '</div>';

                            echo '</div>';

                        }

                        if($hover_style == 'style4'){

                            echo $temp_thumb;
                            
                            echo '<div class="portfolio-style4-content">';

                                if( $on_click == 'single_port_link' ) {
                                    echo '<a href="'. esc_url( get_permalink() ) .'" target"'. $link_target .'" class="inner-content">';
                                } elseif( $on_click == 'single_button_link' ) {
                                    echo '<a href="'. esc_url( composer_get_meta_value( $id, '_amz_project_url', '' ) ) .'" target"'. $link_target .'" class="inner-content">';
                                }

                                    echo '<div class="portfolio-link">';

                                        echo '<div class="portfolio-content">';
                                            //Author name
                                            echo '<'. composer_title_tag( $title_tag ) .' class="title"'. $title_custom_style .'>'.esc_html( $temp_title ).'</'. composer_title_tag( $title_tag ) .'>'; //title

                                            echo '<p'. $category_custom_style .'>';

                                            echo $pix_cats; 

                                            echo '</p>';

                                        echo '</div>';

                                    echo '</div>';

                                if( $on_click == 'single_port_link' || $on_click == 'single_button_link' ){
                                    echo '</a>';
                                }   

                                echo '<div class="portfolio-icons"><div class="center-wrap">'; //portfolio Container                          

                                        //Lightbox icon
                                    if( $lightbox == 'yes' && !empty( $img_fullsize ) ){
                                        echo '<a href="'. $img_fullsize .'" class="port-icon-hover popup-gallery" data-title="'. esc_attr( get_the_title() ) .'"><i class="pixicon-plus"></i></a>';
                                    }

                                echo '</div></div>'; //End of portfolio icons

                            echo '</div>';

                        }

                        if( $hover_style == 'style5' ){
                            //portfolio Image
                            echo '<div class="portfolio-img">
                                        '.$temp_thumb.'
                                    </div>';
                                    
                            echo  '<div class="portfolio-hover">';
                            
                                echo '<div class="portfolio-link">';

                                    if( $on_click == 'single_port_link' ) {
                                        echo '<a href="'. esc_url( get_permalink() ) .'" class="inner-content">';
                                    } elseif( $on_click == 'single_button_link' ) {
                                        echo '<a href="'. esc_url( composer_get_meta_value( $id, '_amz_project_url', '' ) ) .'" target"'. $link_target .'" class="inner-content">';
                                    }
                                    
                                        echo '<div class="portfolio-content">'; //portfolio Container

                                            echo '<'. composer_title_tag( $title_tag ) .' class="title"'. $title_custom_style .'>'.esc_html( $temp_title ).'</'. composer_title_tag( $title_tag ) .'>'; //title

                                            echo '<p'. $category_custom_style .'>';
                                            
                                            echo $pix_cats; 

                                            echo '</p>';

                                        echo '</div>'; //End of portfolio Content

                                    if( $on_click == 'single_port_link' || $on_click == 'single_button_link' ){
                                        echo '</a>';
                                    }   

                                echo '</div>';

                            echo  '</div>'; //End of portfolio hover
                        }

                        if( $hover_style == 'style6' ){
                            //portfolio Image
                            echo '<div class="portfolio-img">
                                        '.$temp_thumb.'
                                    </div>';
                                    
                            echo  '<div class="portfolio-hover">';
                            
                                echo '<div class="portfolio-link">';

                                    if( $on_click == 'single_port_link' ) {
                                        echo '<a href="'. esc_url( get_permalink() ) .'" class="inner-content">';
                                    } elseif( $on_click == 'single_button_link' ) {
                                        echo '<a href="'. esc_url( composer_get_meta_value( $id, '_amz_project_url', '' ) ) .'" target"'. $link_target .'" class="inner-content">';
                                    }
                                    
                                        echo '<div class="portfolio-content">'; //portfolio Container

                                            echo '<'. composer_title_tag( $title_tag ) .' class="title"'. $title_custom_style .'>'.esc_html( $temp_title ).'</'. composer_title_tag( $title_tag ) .'>'; //title

                                            echo '<span class="port-line"></span><p'. $category_custom_style .'>';
                                            
                                            echo $pix_cats; 

                                            echo '</p>';

                                        echo '</div>'; //End of portfolio Content

                                    if( $on_click == 'single_port_link' || $on_click == 'single_button_link' ){
                                        echo '</a>';
                                    }   

                                echo '</div>';

                            echo  '</div>'; //End of portfolio hover
                        }

                    echo '</div>'; //End of portfolio Container

                echo '</div>'; //End of pix portfolio Item

                $post_count++; endwhile;

            echo '</div>';
        else:
            echo '<div class="ajax-posts" data-post-found="false">'. esc_html__('Search Results Not Found.', 'composer'). '</div>';
        endif;


    echo '</div>';

    wp_reset_query();

    die();
}

// ajax functions
add_action('wp_ajax_portfolio_loadmore',  'portfolio_loadmore' );
add_action('wp_ajax_nopriv_portfolio_loadmore', 'portfolio_loadmore' );

function composer_ajax_login_form() {

    // Log the current user out, by destroying the current user session.
    if( is_user_logged_in() ) {
        wp_logout();
    }    

    // Get ajax values
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $remember = isset($_POST['remember']) ? $_POST['remember'] : false;

    $error = 0;
    $username_notice = $password_notice = '';

    if( empty( $username ) || empty( $password ) ) {

        $error = 1;

        if( empty( $username ) ) {
            $username_notice = esc_html__( 'Type the username', 'composer' );
        }
        if( !username_exists( $username ) ) {
            $username_notice = esc_html__( 'Username does not exists', 'composer' );
        }
        if( empty( $password ) ) {
            $password_notice = esc_html__( 'Type the password', 'composer' );
        }
    }
    else {

        if( !username_exists( $username ) ) {
            $error = 1;
            $username_notice = esc_html__( 'Username does not exists', 'composer' );
        }
        else {
            $user_obj = get_user_by( 'login', $username );

            if( !wp_check_password( $password, $user_obj->user_pass ) ) {
                $error = 1;
                $password_notice = esc_html__( 'The password you entered for the username is incorrect', 'composer' );
            }
        }
    }

    if( $error ) {
        echo json_encode( array( 
            'error' => 1,
            'username' => esc_html( $username_notice ),
            'password' => esc_html( $password_notice )
        ) );
    }
    else {
        $user_data = array();
        $user_data['user_login'] = $username;
        $user_data['user_password'] = $password;
        $user_data['remember'] = $remember;


        $user = wp_signon( $user_data, true );

        wp_set_current_user( $user->ID, $user->user_login );
        wp_set_auth_cookie( $user->ID );
        do_action( 'wp_login', $user->user_login );

        // Get redirect link
        $redirect = composer_get_option_value( 'login_page_id', '' );

        // Login page url
        if( !empty( $redirect ) ) {
                $url = esc_url( get_permalink( $redirect ) );
        }
        else {
            $url = esc_url( home_url( '/' ) );               
        }

        echo json_encode( array( 
            'error' => 0,
            'success' => esc_html__( 'Login Successfully', 'composer' ),
            'redirect' => $url
        ) );
    }

    die();
}

// ajax functions
add_action('wp_ajax_composer_ajax_login_form',  'composer_ajax_login_form' );
add_action('wp_ajax_nopriv_composer_ajax_login_form', 'composer_ajax_login_form' );


function composer_ajax_forgot_form() {

    // Get ajax values
    $user_login = isset($_POST['user_login']) ? $_POST['user_login'] : '';
    
    $error = '';
    $success = '';
    
    // check if we're in reset form
    $user_login = trim( $user_login );

    $errors = new WP_Error();


 
    if ( empty( $user_login ) ) {

        $errors->add( 'empty_username', __( 'Enter a username or e-mail address.', 'composer' ) );

    }
    else if ( strpos( $user_login, '@' ) ) {
        $user_data = get_user_by( 'email', trim( $user_login ) );

        if ( empty( $user_data ) )
            $errors->add( 'invalid_email', esc_html__( 'There is no user registered with that email address.', 'composer' ) );
    }
    else {
        $login = trim( $user_login );
        $user_data = get_user_by( 'login', $login );
    }

    do_action( 'lostpassword_post', $errors );
 
    // Redefining user_login ensures we return the right case in the email.
    $user_login = $user_data->user_login;
    $user_email = $user_data->user_email;
    $key = get_password_reset_key( $user_data );
 
    if ( is_wp_error( $key ) ) {
        return $key;
    }
 
    $message = esc_html__( 'Someone requested that the password be reset for the following account:','composer' ) . "\r\n\r\n";
    $message .= network_home_url( '/' ) . "\r\n\r\n";
    $message .= sprintf( esc_html__('Username: %s','composer'), $user_login) . "\r\n\r\n";
    $message .= esc_html__( 'If this was a mistake, just ignore this email and nothing will happen.','composer' ) . "\r\n\r\n";
    $message .= esc_html__( 'To reset your password, visit the following address:','composer' ) . "\r\n\r\n";

    $redirect = composer_get_option_value( 'login_redirect', '' );

    if( 'dashboard' != $redirect && !empty( $redirect ) ) {
            $url = esc_url( get_permalink( $redirect ) );
    }
    else if( 'dashboard' == $redirect ) {
        $url = esc_url( get_admin_url() );
    }
    else {
        $url = esc_url( home_url( '/' ) );               
    }

    $params = array( 'action' => 'rp', 'key' => $key, 'login' => rawurlencode( $user_login) );

    $url = add_query_arg( $params, $url );
    
    // replace PAGE_ID with reset page ID
    $message .= $url;
 
    if ( is_multisite() ) {
        $blogname = $GLOBALS['current_site']->site_name;
    }
    else {
        $blogname = wp_specialchars_decode( get_option('blogname'), ENT_QUOTES );
    }
 
    $title = sprintf( __('[%s] Password Reset', 'composer'), $blogname );
    
    
    $title = apply_filters( 'retrieve_password_title', $title, $user_login, $user_data );
     
    $message = apply_filters( 'retrieve_password_message', $message, $key, $user_login, $user_data );
    
    if ( wp_mail( $user_email, wp_specialchars_decode( $title ), $message ) ) {
        $errors->add( 'confirm', esc_html__( 'Check your e-mail for the confirmation link.', 'composer' ), 'message' );
    }
    else {
        $errors->add('could_not_sent', esc_html__( 'The e-mail could not be sent.', 'composer' ) . "<br />\n" . esc_html__( 'Possible reason: your host may have disabled the mail() function.', 'composer' ), 'message');
    }
    
    if( $errors->get_error_code() ) {
        echo json_encode(
            array(
                'error' => 1,
                'notice' => $errors->get_error_message( $errors->get_error_code() )
            )
        );
    }

    if( ! empty( $success_notice ) ) {
        echo json_encode(
            array(
                'error' => 0,
                'notice' => $success_notice
            )
        );
    }
    

    die();
}

// ajax functions
add_action('wp_ajax_composer_ajax_forgot_form',  'composer_ajax_forgot_form' );
add_action('wp_ajax_nopriv_composer_ajax_forgot_form', 'composer_ajax_forgot_form' );

function composer_ajax_reset_form() {

    // Get ajax values
    $login = isset($_POST['login']) ? $_POST['login'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $key = isset($_POST['key']) ? $_POST['key'] : '';
    $errors = new WP_Error();
    
    $user = check_password_reset_key( $key, $login );

    if( !is_wp_error( $user ) ) {
 
        // check to see if user added some string
        if( empty( $password ) ) {
            $errors->add( 'password_required', esc_html__( 'Password is required field', 'composer' ) );
            $error_notice = esc_html__( 'Password is required field', 'composer' );
        }

        do_action( 'validate_password_reset', $errors, $user );
     
        if ( ( ! $errors->get_error_code() ) ) {
            $user_obj = get_user_by( 'login', $login );
            wp_set_password( $password, $user_obj->ID );
            
            $errors->add( 'password_reset', esc_html__( 'Your password has been reset.', 'composer' ) );

            $success_notice = esc_html__( 'Your password has been reset.', 'composer' );
        }

        // Get redirect link
        $redirect = composer_get_option_value( 'login_redirect', '' );

        if( 'dashboard' != $redirect && !empty( $redirect ) ) {
                $url = esc_url( get_permalink( $redirect ) );
        }
        else if( 'dashboard' == $redirect ) {
            $url = esc_url( get_admin_url() );
        }
        else {
            $url = esc_url( home_url( '/' ) );               
        }
        
        // display notice
        if ( empty( $success_notice ) ) {
            echo json_encode( array( 
                'error' => 1,
                'notice' => $error_notice
            ) );
        }
        else {
            echo json_encode( array( 
                'error' => 0,
                'notice' => $success_notice,
                'redirect' => $url
            ) );
        }
    }
    else {

        $errors->add( 'wrong_reset_key', esc_html__( 'Wrong reset key. Please check the mail.', 'composer' ) );
        $error_notice = esc_html__( 'Wrong reset key. Please check the mail.', 'composer' );

        echo json_encode( array( 
            'error' => 1,
            'notice' => $error_notice
        ) );
    }

    die();
}

// ajax functions
add_action('wp_ajax_composer_ajax_reset_form',  'composer_ajax_reset_form' );
add_action('wp_ajax_nopriv_composer_ajax_reset_form', 'composer_ajax_reset_form' );

function composer_ajax_register_form() {

    // Get ajax values
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';

    // Empty assignment
    $username_error_notice = $email_error_notice = $general_error_notice = $success_notice = '';

    $sanitized_user_login = sanitize_user( $username );
    $user_email = apply_filters( 'user_registration_email', $email );

    // Check the username
    if ( $sanitized_user_login == '' ) {
        $username_error_notice = esc_html__( 'Please enter a username.', 'composer' );
    }
    elseif ( ! validate_username( $username ) ) {
        $username_error_notice = esc_html__( 'This username is invalid because it uses illegal characters. Please enter a valid username.', 'composer' );
        $sanitized_user_login = '';
    }
    elseif ( username_exists( $sanitized_user_login ) ) {
        $username_error_notice = esc_html__( 'This username is already registered. Please choose another one.', 'composer' );
    }
    else {
        /** This filter is documented in wp-includes/user.php */
        $illegal_user_logins = array_map( 'strtolower', (array) apply_filters( 'illegal_user_logins', array() ) );
        if ( in_array( strtolower( $sanitized_user_login ), $illegal_user_logins ) ) {
            $username_error_notice = esc_html__( 'Sorry, that username is not allowed.', 'composer' );
        }
    }

    // Check the email address
    if ( $user_email == '' ) {
        $email_error_notice = esc_html__( 'Please type your email address.', 'composer' );
    }
    elseif ( ! is_email( $user_email ) ) {
        $email_error_notice = esc_html__( 'The email address is not correct.', 'composer' );
        $user_email = '';
    }
    elseif ( email_exists( $user_email ) ) {
        $email_error_notice = esc_html__( 'This email is already registered, please choose another one.', 'composer' );
    }

    if ( empty( $username_error_notice ) && empty( $email_error_notice ) ) {
        $user_pass = wp_generate_password( 12, false );
        $user_id = wp_create_user( $sanitized_user_login, $user_pass, $user_email );

        if ( ! $user_id || is_wp_error( $user_id ) ) {
            $general_error_notice = esc_html__( 'Could not register you please contact the', 'composer' ).'<a href="'. sanitize_email( get_option( 'admin_email' ) ).'">'. esc_html__( 'administrator', 'composer' ).'</a>';

            // Set error
            $error = 1;
        }
        else {
            // Set error
            $error = 0;
        }
    }
    else {
        // Set error
        $error = 1;
    }

    if( !$error ) {

        // Get redirect link
        $redirect = composer_get_option_value( 'login_page_id', '' );

        // Login page url
        if( !empty( $redirect ) ) {
                $url = esc_url( get_permalink( $redirect ) );
        }
        else {
            $url = esc_url( home_url( '/' ) );               
        }

        // Send password to the user if its created without any error
        $message = esc_html__( 'Howdy hello,','composer' ) . "\r\n\r\n";
        $message .= esc_html__( 'You can log in with the following information:','composer' ) . "\r\n\r\n";
        $message .= sprintf( esc_html__( 'Username: %s','composer' ), $username ) . "\r\n\r\n";
        $message .= sprintf( esc_html__( 'Password: %s','composer' ), $user_pass ) . "\r\n\r\n";
        $message .= esc_url( $url ) . "\r\n\r\n";
        $message .= esc_html__( 'Thanks!','composer' ) . "\r\n\r\n";

        if ( is_multisite() ) {
            $blogname = $GLOBALS['current_site']->site_name;
        }
        else {
            $blogname = wp_specialchars_decode( get_option('blogname'), ENT_QUOTES );
        }

        $title = sprintf( __('[%s] Register Account', 'composer'), $blogname );

        if ( wp_mail( $user_email, wp_specialchars_decode( $title ), $message ) ) {
            $success_notice = esc_html__( 'Check your e-mail for the password. You can reset it later.', 'composer' );

            // Returns message
            echo json_encode( array( 
                'error' => false,
                'succcess_notice' => $success_notice,
                'redirect' => $url
            ) );

        }
        else {

            $general_error_notice = esc_html__( 'The e-mail could not be sent. Possible reason: your host may have disabled the mail() function.', 'composer' );

            // Returns message
            echo json_encode( array( 
                'error' => true,
                'username_notice' => $username_error_notice,
                'email_notice' => $email_error_notice,
                'general_notice' => $general_error_notice
            ) );
        }
    }
    else {

        // Returns message
        echo json_encode( array( 
            'error' => true,
            'username_notice' => $username_error_notice,
            'email_notice' => $email_error_notice,
            'general_notice' => $general_error_notice
        ) ); 
    }

    die();
}

// ajax functions
add_action('wp_ajax_composer_ajax_register_form',  'composer_ajax_register_form' );
add_action('wp_ajax_nopriv_composer_ajax_register_form', 'composer_ajax_register_form' );


function composer_ajax_update_form() {

    // Get ajax values
    $first_name   = isset($_POST['first_name']) ? $_POST['first_name'] : '';
    $last_name    = isset($_POST['last_name']) ? $_POST['last_name'] : '';
    $email        = isset($_POST['email']) ? $_POST['email'] : '';
    $website      = isset($_POST['website']) ? $_POST['website'] : '';
    $old_password = isset($_POST['old_password']) ? $_POST['old_password'] : '';
    $new_password = isset($_POST['new_password']) ? $_POST['new_password'] : '';

    $current_user_obj = get_userdata( get_current_user_id() );
    $username = $current_user_obj->user_login;

    // Empty assignment
    $username_error_notice = $password_error_notice = $email_error_notice = $success_notice = '';

    $sanitized_user_login = sanitize_user( $username );

    // Check the username
    if ( $sanitized_user_login == '' ) {
        $username_error_notice = esc_html__( 'Please enter a username.', 'composer' );
    }
    elseif ( ! validate_username( $username ) ) {
        $username_error_notice = esc_html__( 'This username is invalid because it uses illegal characters. Please enter a valid username.', 'composer' );
        $sanitized_user_login = '';
    }
    elseif ( !username_exists( $sanitized_user_login ) ) {
        $username_error_notice = esc_html__( 'This username is not registered yet.', 'composer' );
    }
    else {
        /** This filter is documented in wp-includes/user.php */
        $illegal_user_logins = array_map( 'strtolower', (array) apply_filters( 'illegal_user_logins', array() ) );
        if ( in_array( strtolower( $sanitized_user_login ), $illegal_user_logins ) ) {
            $username_error_notice = esc_html__( 'Sorry, that username is not allowed.', 'composer' );
        }
    }

    if( !empty( $new_password ) ) {
        // Check the password
        $user_obj = get_user_by( 'login', $username );
        if ( $old_password == '' ) {
            $password_error_notice = esc_html__( 'Please type your old password.', 'composer' );
        }
        elseif ( !wp_check_password( $old_password, $user_obj->user_pass ) ) {
            $password_error_notice = esc_html__( 'The password you entered for the username is incorrect', 'composer' );
        }
    }    

    // check the email
    if ( !empty( $email ) && ! is_email( $email ) ) {
        $email_error_notice = esc_html__( 'The email format is not correct.', 'composer' );
    }
    elseif ( email_exists( $email ) ) {
        $email_error_notice = esc_html__( 'This email is already registered, please choose another one.', 'composer' );
    }

    if ( empty( $username_error_notice ) && empty( $password_error_notice ) && empty( $email_error_notice ) ) {

        $success_notice = esc_html__( 'Account updated successfully', 'composer' );

        // Set error
        $error = 0;
    }
    else {
        // Set error
        $error = 1;
    }

    if( !$error ) {

        $user_obj = get_user_by( 'login', $username );

        if( !empty( $new_password ) ) {
            wp_set_password( $new_password, $user_obj->ID );
        }

        wp_update_user( array( 
            'ID' => $user_obj->ID, 
            'user_url' => $website,
            'user_email' => $email,
            'first_name' => $first_name,
            'last_name' => $last_name
        ) );

        // Get redirect link
        $redirect = composer_get_option_value( 'login_page_id', '' );

        // Login page url
        if( !empty( $redirect ) ) {
                $url = esc_url( get_permalink( $redirect ) );
        }
        else {
            $url = esc_url( home_url( '/' ) );               
        }

        // Returns message
        echo json_encode( array( 
            'error' => false,
            'succcess_notice' => $success_notice,
            'redirect' => $url
        ) );
    }
    else {

        // Returns message
        echo json_encode( array( 
            'error' => true,
            'username_notice' => $username_error_notice,
            'password_notice' => $password_error_notice
        ) ); 
    }

    die();
}

// ajax functions
add_action('wp_ajax_composer_ajax_update_form',  'composer_ajax_update_form' );
add_action('wp_ajax_nopriv_composer_ajax_update_form', 'composer_ajax_update_form' );

add_filter( 'upload_mimes', 'composer_myme_types', 1, 1 );
function composer_myme_types( $mime_types ) {
  $mime_types['svg'] = 'image/svg+xml'; // Adding .svg extension
  $mime_types['ttf'] = 'application/x-font-ttf'; 
  $mime_types['woff'] = 'application/x-font-woff';
  $mime_types['eot'] = 'application/x-font-eot';
  
  return $mime_types;
}

add_action('nav_menu_css_class', 'composer_add_current_nav_class', 10, 2 );
    
function composer_add_current_nav_class($classes, $item) {
    
    // Getting the current post details
    global $post;
    
    if ( isset($post->ID) ) {
    
        // Getting the post type of the current post
        $current_post_type = get_post_type_object(get_post_type($post->ID));
        $current_post_type_slug = $current_post_type->rewrite['slug'];
            
        // Getting the URL of the menu item
        $menu_slug = strtolower(trim($item->url));
        
        // If the menu item URL contains the current post types slug add the current-menu-item class
        if (strpos($menu_slug,$current_post_type_slug) !== false) {
        
           $classes[] = 'current-menu-item';
        
        }

    }
    
    // Return the corrected set of classes to be added to the menu item
    return $classes;

}

remove_filter('widget_text_content', 'wpautop');

