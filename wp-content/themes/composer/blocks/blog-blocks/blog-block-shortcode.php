<?php

    /* =============================================================================
     Blog Blocks Shortcodes
     ========================================================================== */

    function composer_blog_blocks( $atts, $content = null, $code ){

        //Build Shortcode Array
        $shortcode_array = array(

            // General
            'el_class'                      => '',
            'title_tag'                     => 'h2',
            'block_column'                  => 'col1', // col1, col2, col3
            'column1_count'                 => '',
            'column2_count'                 => '',
            'column3_count'                 => '',           
            'pagination'                    => 'none', // none, load_more, autoload, number, text
            'loadmore_text'                 => esc_html__( 'Load More', 'composer' ),
            'allpost_loaded_text'           => esc_html__( 'All Post Loaded', 'composer' ),
            'margin'                        => 'margin-no', // margin-no, margin-yes
            
            // Query Builder
            'insert_type'                   => 'posts', //posts, id, category
            'order_by'                      => 'date', //'none', ID', 'author' , 'title', 'name', 'date', 'modified', 'parent', 'rand'
            'order'                         => 'DESC', //DESC, ASC
            'id'                            => '',
            'category'                      => '',
            'exclude_id'                    => '',
            'exclude_category'              => '',
            'offset'                        => '',
            
            // Module 1
            'module1_show_post_format_icon' => 'yes',
            'module1_show_category'         => 'yes',
            'module1_meta_prefix'           => 'yes',           
            'module1_show_meta'             => 'on_bottom', // on_bottom, on_top, hide
            'module1_title_length'          => '30',
            'module1_excerpt_length'        => '180',
            'module1_show_description'      => 'yes',
            'module1_show_share'            => 'yes',
            'module1_share'                 => 'facebook, twitter, gplus, linkedin, pinterest',
            
            // Module 2
            'module2_show_featured_image'   => 'yes',
            'module2_show_post_format_icon' => 'yes',
            'module2_show_category'         => 'yes',
            'module2_meta_prefix'           => 'yes',           
            'module2_show_meta'             => 'on_bottom', // on_bottom, on_top, hide
            'module2_title_length'          => '30',
            'module2_excerpt_length'        => '180',
            'module2_show_button'           => 'yes',
            'module2_btn_text'              => esc_html__( 'Read More', 'composer' ),
            'module2_show_description'      => 'yes',
            
            // Module 3
            'module3_show_featured_image'   => 'yes',
            'module3_meta_prefix'           => 'yes',           
            'module3_show_meta'             => 'on_bottom', // on_bottom, on_top, hide
            'module3_title_length'          => '30',
            
            // Module 4
            'module4_show_featured_image'   => 'yes',
            'module4_show_post_format_icon' => 'yes',
            'module4_show_category'         => 'yes',
            'module4_meta_prefix'           => 'yes',           
            'module4_show_meta'             => 'on_bottom', // on_bottom, on_top, hide
            'module4_title_length'          => '30',
            'module4_excerpt_length'        => '180',
            'module4_show_button'           => 'yes',
            'module4_btn_text'              => esc_html__( 'Read More', 'composer' ),
            'module4_show_description'      => 'yes',
            
            // Module 5
            'module5_show_featured_image'   => 'yes',
            'module5_show_post_format_icon' => 'yes',
            'module5_show_category'         => 'yes',
            'module5_meta_prefix'           => 'yes',           
            'module5_show_meta'             => 'on_bottom', // on_bottom, on_top, hide
            'module5_title_length'          => '30',
            'module5_excerpt_length'        => '180',
            'module5_show_button'           => 'yes',
            'module5_btn_text'              => esc_html__( 'Read More', 'composer' ),
            'module5_show_description'      => 'yes',
            
            // Module 6
            'module6_show_featured_image'   => 'yes',
            'module6_show_post_format_icon' => 'yes',
            'module6_show_category'         => 'yes',
            'module6_meta_prefix'           => 'yes',           
            'module6_show_meta'             => 'on_bottom', // on_bottom, on_top, hide
            'module6_title_length'          => '30',
            'module6_excerpt_length'        => '180',
            'module6_show_button'           => 'yes',
            'module6_btn_text'              => esc_html__( 'Read More', 'composer' ),
            'module6_show_description'      => 'yes',
            
            // Module 7
            'module7_show_featured_image'   => 'yes',
            'module7_show_post_format_icon' => 'yes',
            'module7_show_category'         => 'yes',
            'module7_meta_prefix'           => 'yes',           
            'module7_show_meta'             => 'on_bottom', // on_bottom, on_top, hide
            'module7_title_length'          => '30',
            'module7_excerpt_length'        => '180',
            'module7_show_button'           => 'yes',
            'module7_btn_text'              => esc_html__( 'Read More', 'composer' ),
            'module7_show_description'      => 'yes',
            
            // Module 8
            'module8_show_post_format_icon' => 'yes',
            'module8_show_category'         => 'yes',
            'module8_meta_prefix'           => 'yes',           
            'module8_show_meta'             => 'on_bottom', // on_bottom, on_top, hide
            'module8_title_length'          => '30',
            'module8_excerpt_length'        => '180',
            'module8_show_button'           => 'yes',
            'module8_btn_text'              => esc_html__( 'Read More', 'composer' ),
            'module8_show_description'      => 'yes',

        );

        extract( shortcode_atts( $shortcode_array, $atts ) );

        // Empty assignment
        $output = '';

        //Blog blocks class Initialised
        $blog_blocks = new blog_blocks();

        // Get default number of items per column
        $count = $blog_blocks->get_post_count( $code, $block_column );
        $column1 = isset( $count[0] ) ? $count[0] : '';
        $column2 = isset( $count[1] ) ? $count[1] : '';
        $column3 = isset( $count[2] ) ? $count[2] : '';

        // Get custom number of items per column
        $column1 = !empty( $column1_count ) ? (int)$column1_count : $column1;
        $column2 = !empty( $column2_count ) ? (int)$column2_count : $column2;
        $column3 = !empty( $column3_count ) ? (int)$column3_count : $column3;

        // Set number of items
        if( 'col1' == $block_column ) {
            $no_of_items = (int)$column1;
        }
        elseif( 'col2' == $block_column ) {
            $no_of_items = (int)$column1 + (int)$column2;
        }
        elseif( 'col3' == $block_column ) {
            $no_of_items = (int)$column1 + (int)$column2 + (int)$column3;
        }

        // Set count for open and close div for posts
        $first_col_open   = 1;
        $first_col_close  = $column1;
        $second_col_open  = $column1 + 1;
        $second_col_close = $column1 + $column2;
        $third_col_open   = $column1 + $column2 + 1;
        $third_col_close  = $column1 + $column2 + $column3;

        // Set paged
        if( get_query_var( 'paged' ) ) {
            $paged = get_query_var( 'paged' );
        }
        elseif( get_query_var( 'page' ) ) {
            $paged = get_query_var( 'page' );
        }
        else{
            $paged = 1;
        }

        //Build id and category as array
        $post_in = array_filter( explode( ",", $id ) );
        $category = array_filter( explode( ",", $category ) );

        //convert category slug into category id
        $term = $term_id = array();
        if( !empty( $category ) ) {
            foreach ( $category as $key => $cat ) {
                $term[] = get_category_by_slug( $cat );
                $term_id[] = $term[$key]->term_id;
            }
        }

        //Build post__not_in and category__not_in as array
        $id = get_the_ID();
        $post_not_in = array_filter( explode( ",", $exclude_id ) );
        $post_not_in = array_merge( ( array )$id, $post_not_in );
        $category_not_in = array_filter( explode( ",", $exclude_category ) );

        //convert exclude category slug into category id
        $exclude_term = $exclude_term_id = array();
        if(!empty($category_not_in)) {
            foreach ($category_not_in as $key => $exclude_cat) {
                $exclude_term[] = get_category_by_slug($exclude_cat);
                $exclude_term_id[] = $exclude_term[$key]->term_id;
            }
        }

        //Query arguement for Insert type: Posts, Category, ID
        if( $insert_type == 'id' && !empty( $post_in ) ){
            $args = array(              
                'order'               => $order,
                'orderby'             => 'post__in',
                'posts_per_page'      => $no_of_items,
                'post__in'            => $post_in,
                'post__not_in'        => $post_not_in,
                'ignore_sticky_posts' => 1,
                'paged'               => $paged, 
                'post_status'         => 'publish'
            );
        }

        else if( $insert_type == 'category' && !empty( $category ) ){
            $args = array(
                'orderby'             => $order_by,
                'order'               => $order,
                'posts_per_page'      => $no_of_items,
                'post__not_in'        => $post_not_in,
                'category__in'        => $term_id,
                'category__not_in'    => $exclude_term_id,
                'ignore_sticky_posts' => 1,
                'paged'               => $paged, 
                'post_status'         => 'publish'
            );
        }
        else{
            $args = array(
                'orderby'             => $order_by,
                'order'               => $order,
                'posts_per_page'      => $no_of_items,
                'post__not_in'        => $post_not_in,
                'ignore_sticky_posts' => 1,
                'paged'               => $paged, 
                'post_status'         => 'publish'
            );
        }

        if( !empty( $offset ) ) {
            $args = array_merge( $args, array( 'offset' => $offset ) );
        }

        // Assign and call query
        $query = new WP_Query( $args );
        query_posts( $args );

        // Total Post
        $total_post = $query->post_count;

        // Blocks Options
        $options = array();
        
        // General
        $options['title_tag']                     = $title_tag;
        $options['block_column']                  = $block_column;

        $modules = $blog_blocks->get_modules( $code );

        if( in_array( 'module1', $modules ) ) {
            
            // Module 1
            $options['module1_show_post_format_icon'] = $module1_show_post_format_icon;
            $options['module1_show_category']         = $module1_show_category;
            $options['module1_show_meta']             = $module1_show_meta;
            $options['module1_meta_prefix']           = $module1_meta_prefix;
            $options['module1_title_length']          = $module1_title_length;      
            $options['module1_show_description']      = $module1_show_description;
            $options['module1_excerpt_length']        = $module1_excerpt_length;
            $options['module1_show_share']            = $module1_show_share;
            $options['module1_share']                 = $module1_share;
            $options['margin']                        = $margin;

        }

        if( in_array( 'module2', $modules ) ) {
            
            // Module 2
            $options['module2_show_featured_image']   = $module2_show_featured_image;
            $options['module2_show_post_format_icon'] = $module2_show_post_format_icon;
            $options['module2_show_category']         = $module2_show_category;
            $options['module2_show_meta']             = $module2_show_meta;
            $options['module2_meta_prefix']           = $module2_meta_prefix;
            $options['module2_title_length']          = $module2_title_length;      
            $options['module2_show_description']      = $module2_show_description;
            $options['module2_excerpt_length']        = $module2_excerpt_length;
            $options['module2_show_button']           = $module2_show_button;
            $options['module2_btn_text']              = $module2_btn_text;
            $options['margin']                        = $margin;

        }
        if( in_array( 'module3', $modules ) ) {
            
            // Module 3
            $options['module3_show_featured_image'] = $module3_show_featured_image;
            $options['module3_show_meta']           = $module3_show_meta;
            $options['module3_meta_prefix']         = $module3_meta_prefix;
            $options['module3_title_length']        = $module3_title_length;
            $options['margin']                      = $margin;

        }
        if( in_array( 'module4', $modules ) ) {
            
            // Module 4
            $options['module4_show_featured_image']   = $module4_show_featured_image;
            $options['module4_show_post_format_icon'] = $module4_show_post_format_icon;
            $options['module4_show_category']         = $module4_show_category;
            $options['module4_show_meta']             = $module4_show_meta;
            $options['module4_meta_prefix']           = $module4_meta_prefix;
            $options['module4_title_length']          = $module4_title_length;      
            $options['module4_show_description']      = $module4_show_description;
            $options['module4_excerpt_length']        = $module4_excerpt_length;
            $options['module4_show_button']           = $module4_show_button;
            $options['module4_btn_text']              = $module4_btn_text;
            $options['margin']                        = $margin;

        }
        if( in_array( 'module5', $modules ) ) {
            
            // Module 5
            $options['module5_show_featured_image']   = $module5_show_featured_image;
            $options['module5_show_post_format_icon'] = $module5_show_post_format_icon;
            $options['module5_show_category']         = $module5_show_category;
            $options['module5_show_meta']             = $module5_show_meta;
            $options['module5_meta_prefix']           = $module5_meta_prefix;
            $options['module5_title_length']          = $module5_title_length;      
            $options['module5_show_description']      = $module5_show_description;
            $options['module5_excerpt_length']        = $module5_excerpt_length;
            $options['module5_show_button']           = $module5_show_button;
            $options['module5_btn_text']              = $module5_btn_text;
            $options['margin']                        = $margin;

        }
        if( in_array( 'module6', $modules ) ) {
            
            // Module 6
            $options['module6_show_featured_image']   = $module6_show_featured_image;
            $options['module6_show_post_format_icon'] = $module6_show_post_format_icon;
            $options['module6_show_category']         = $module6_show_category;
            $options['module6_show_meta']             = $module6_show_meta;
            $options['module6_meta_prefix']           = $module6_meta_prefix;
            $options['module6_title_length']          = $module6_title_length;      
            $options['module6_show_description']      = $module6_show_description;
            $options['module6_excerpt_length']        = $module6_excerpt_length;
            $options['module6_show_button']           = $module6_show_button;
            $options['module6_btn_text']              = $module6_btn_text;
            $options['margin']                        = $margin;

        }
        if( in_array( 'module7', $modules ) ) {
            
            // Module 7
            $options['module7_show_featured_image']   = $module7_show_featured_image;
            $options['module7_show_post_format_icon'] = $module7_show_post_format_icon;
            $options['module7_show_category']         = $module7_show_category;
            $options['module7_show_meta']             = $module7_show_meta;
            $options['module7_meta_prefix']           = $module7_meta_prefix;
            $options['module7_title_length']          = $module7_title_length;      
            $options['module7_show_description']      = $module7_show_description;
            $options['module7_excerpt_length']        = $module7_excerpt_length;
            $options['module7_show_button']           = $module7_show_button;
            $options['module7_btn_text']              = $module7_btn_text;
            $options['margin']                        = $margin;

        }
        if( in_array( 'module8', $modules ) ) {
            
            // Module 8
            $options['module8_show_post_format_icon'] = $module8_show_post_format_icon;
            $options['module8_show_category']         = $module8_show_category;
            $options['module8_show_meta']             = $module8_show_meta;
            $options['module8_meta_prefix']           = $module8_meta_prefix;
            $options['module8_title_length']          = $module8_title_length;      
            $options['module8_show_description']      = $module8_show_description;
            $options['module8_excerpt_length']        = $module8_excerpt_length;
            $options['module8_show_button']           = $module8_show_button;
            $options['module8_btn_text']              = $module8_btn_text;
            $options['margin']                        = $margin;

        }


        // Set count for open and close div for posts
        $column_count = array();

        $column_count['first_col_open']                = $first_col_open;
        $column_count['first_col_close']               = $first_col_close;
        $column_count['second_col_open']               = $second_col_open;
        $column_count['second_col_close']              = $second_col_close;
        $column_count['third_col_open']                = $third_col_open;
        $column_count['third_col_close']               = $third_col_close;

        if ( have_posts() ) :
            $post_count = 1;
            $output .= '<div class="loadmore-wrap '. esc_attr( $el_class  ) .'">';
                $output .= '<div class="load-container blog-blocks">';

                    $output .= '<div class="'. esc_attr( $code ) .'">';

                        while ( have_posts() ) : the_post();
                            if( 1 == $post_count ) {
                                $output .= '<div class="load-element">';
                            }

                                $output .= $blog_blocks->initialize( $code, $options, $post_count, $total_post, $column_count );

                            if( $total_post == $post_count ) {
                                $output .= '</div>'; // load-element
                            }

                        $post_count++; endwhile;

                    $output .= '</div>';

                    // Blog Pagination
                    if( empty( $offset ) ) {
                        // Values array
                        $values = array();

                        $values['style']               = $pagination;
                        $values['loadmore_text']       = $loadmore_text;
                        $values['allpost_loaded_text'] = $allpost_loaded_text;
                        $values['action']              = 'blog_blocks_loadmore';
                        $values['code']                = $code;
                        $values['options']             = $options;
                        $values['total_post']          = $total_post;
                        $values['column_count']        = $column_count; 

                        $output .= $blog_blocks->pagination( $args, $values );
                    }

                $output .= '</div>';
            $output .= '</div>';
        else:
            $output .= '<div>'. esc_html__('Post Not Found.', 'composer'). '</div>';
        endif;

        wp_reset_query();
        return $output;
    }

    add_shortcode( 'block1', 'composer_blog_blocks' );
    add_shortcode( 'block2', 'composer_blog_blocks' );
    add_shortcode( 'block3', 'composer_blog_blocks' );
    add_shortcode( 'block4', 'composer_blog_blocks' );
    add_shortcode( 'block5', 'composer_blog_blocks' );
    add_shortcode( 'block6', 'composer_blog_blocks' );
    add_shortcode( 'block7', 'composer_blog_blocks' );
    add_shortcode( 'block8', 'composer_blog_blocks' );
    add_shortcode( 'block9', 'composer_blog_blocks' );
    add_shortcode( 'block10', 'composer_blog_blocks' );