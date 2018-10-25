<?php
    get_header();

    $prefix = composer_get_prefix();

    $composer_id = get_the_ID();

    // Single blog style
    $composer_style = composer_get_meta_value( $composer_id, '_amz_style', 'default', $prefix.'style', 'style1' ); // id, meta_key, meta_default, themeoption_key, themeoption_default
    $composer_feature_image = composer_get_meta_value( $composer_id, '_amz_show_feature_image', 'yes' ); // id, meta_key, meta_default

    // Get post format
    $composer_format = get_post_format();
    $composer_format = ( '' == $composer_format ) ? 'standard' : $composer_format;

    // Get single blog options

    //Width and height for background images
    $composer_width = 1360;
    $composer_height = 460;

    //Get single blog values from theme option
    $composer_select_sidebar    = composer_get_option_value( $prefix.'select_sidebar', 0 );
    $composer_layout            = composer_get_option_value( $prefix.'sidebar', 'right-sidebar' );
    
    //Get meta values from theme options
    $composer_date     = composer_get_option_value( $prefix.'date', 'show' );
    $composer_like     = composer_get_option_value( $prefix.'like', 'show' );
    $composer_comment  = composer_get_option_value( $prefix.'comment', 'show' );
    $composer_author   = composer_get_option_value( $prefix.'author', 'show' );    
    $composer_category = composer_get_option_value( $prefix.'category', 'show' );
    $composer_tags     = composer_get_option_value( $prefix.'tags', 'show' );
    $composer_caption  = composer_get_option_value( $prefix.'caption', 'disable' );

    $share_default = array(  
        "enabled" => array (
            "facebook"  => esc_html__( 'Facebook', 'composer' ),
            "twitter"   => esc_html__( 'twitter', 'composer' ),
            "gplus"     => esc_html__( 'Google Plus', 'composer' ),
            "linkedin"  => esc_html__( 'Linkedin', 'composer' ),
            "pinterest" => esc_html__( 'Pinterest', 'composer' ),
        )
    );

    $composer_share             = composer_get_option_value( $prefix.'share', $share_default );
    
    //Get related values from theme options
    $composer_show_related_post      = composer_get_option_value( $prefix.'related', 'show' );
    $composer_related_title          = composer_get_option_value( $prefix.'related_title', esc_html__( 'Related Posts', 'composer' ) );
    $composer_related_columns          = composer_get_option_value( $prefix.'related_columns', 'col1' );
    $composer_related_title_length   = composer_get_option_value( $prefix.'related_title_length', 30 );
    $composer_related_content_length = composer_get_option_value( $prefix.'related_content_length', 90 );
    $composer_related_no             = composer_get_option_value( $prefix.'related_no', 2 );
    $composer_orderby                = composer_get_option_value( $prefix.'related_orderby', 'random' );
    $composer_order                  = composer_get_option_value( $prefix.'related_order', 'asc' );
    $composer_related_bottom_meta    = composer_get_option_value( $prefix.'related_bottom_meta', 'like_comment' );
    $composer_related_like           = composer_get_option_value( $prefix.'related_like', 'yes' );
    $composer_related_comment        = composer_get_option_value( $prefix.'related_comment', 'yes' );
    $composer_related_featured_image = composer_get_option_value( $prefix.'related_featured_image', 'no' );

    // Its only for require the correct file and initialize the correct class
    $composer_layout_file = ( 'full-width' != $composer_layout ) ? '_sidebar' : '_fullwidth';
    $composer_layout_class = ( 'full-width' != $composer_layout ) ? $composer_style.'_sidebar' : $composer_style.'_fullwidth';

    // Build options as array
    $composer_options = array();

    $composer_options['width']              = $composer_width;
    $composer_options['height']             = $composer_height;
    $composer_options['format']             = $composer_format;
    $composer_options['select_sidebar']     = $composer_select_sidebar;
    $composer_options['layout']             = $composer_layout;
    $composer_options['show_feature_image'] = $composer_feature_image;
    $composer_options['caption']            = $composer_caption;
    
    $composer_options['meta']           = array( 'date' => $composer_date, 'like' => $composer_like, 'comment' => $composer_comment, 'author' => $composer_author, 'category' => $composer_category, 'tags' => $composer_tags );
    
    $composer_options['share']          = $composer_share['enabled'];
    
    $composer_options['related_post']   = array( 'show_related_post' => $composer_show_related_post, 'show_featured_image' => $composer_related_featured_image, 'title' => $composer_related_title, 'columns' => $composer_related_columns, 'title_length' => $composer_related_title_length, 'content_length' => $composer_related_content_length, 'items' => $composer_related_no, 'orderby' => $composer_orderby, 'order' => $composer_order, 'like' => $composer_related_like, 'comment' => $composer_related_comment, 'bottom_meta' => $composer_related_bottom_meta );    
    
    $composer_options['layout_file']    = $composer_layout_file;
    $composer_options['layout_class']   = $composer_layout_class;

    // Single blog class Initialised
    $single_blog = new single_blog();

    if ( have_posts() ) : 
        while ( have_posts() ) : the_post();

            echo $single_blog->initialize( $composer_style, $composer_options );

        endwhile;
    endif;

get_footer();