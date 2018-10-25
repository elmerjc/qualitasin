<?php
    /* =============================================================================
     Featured Blog Blocks Shortcodes
     ========================================================================== */

    function composer_featured_blog_blocks( $atts, $content = null, $code ){
        extract( shortcode_atts( array(
            // General
            'el_class'              => '',
            'style'                 => 'feature_style1', // feature_style1, feature_style2 ...
            'background_style'      => '', // background-style1, background-style2 ..
            'title_tag'             => 'h2',
            'margin'                => 'margin-no', // margin-no, margin-yes
            'show_post_format_icon' => 'yes', // yes, no
            'show_category'         => 'yes', // yes, no
            'show_meta'             => 'yes', // yes, no
            'meta_prefix'           => 'yes', // yes, no
            
            // Query Builder
            'insert_type'           => 'posts', //posts, id, category
            'order_by'              => 'date', //'none', ID', 'author' , 'title', 'name', 'date', 'modified', 'parent', 'rand'
            'order'                 => 'DESC', //DESC, ASC
            'id'                    => '',
            'category'              => '',
            'exclude_id'            => '',
            'exclude_category'      => '',
            'offset'                => ''
        ), $atts ) );

        // Empty assignment
        $output = '';

        //Blog blocks class Initialised
        $featured_blog_blocks = new featured_blog_blocks();

        // Get number of items value
        $no_of_items = $featured_blog_blocks->get_post_count( $code );

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
                'offset'              => (int)$offset,
                'ignore_sticky_posts' => 1,
                'paged'               => $paged
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
                'offset'              => (int)$offset,
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
                'offset'              => (int)$offset,
                'ignore_sticky_posts' => 1,
                'paged'               => $paged, 
                'post_status'         => 'publish'
            );
        }

        // Assign and call query
        $query = new WP_Query( $args );
        query_posts( $args );

        // Total Post
        $total_post = $query->post_count;

        // Portfolio Options
        $options = array();
        
        $options['style']                 = $style;
        $options['title_tag']             = $title_tag;
        $options['show_category']         = $show_category;
        $options['show_post_format_icon'] = $show_post_format_icon;
        $options['show_meta']             = $show_meta;
        $options['meta_prefix']           = $meta_prefix;
        $options['margin']                = $margin;
        $options['background_style']      = $background_style;

        // Assign Post count
        $post_count = 1;

        // Grid Sizer Class
        if( 'featured_block6' == $code || 'featured_block8' == $code || 'featured_block11' == $code ) {
            $grid_sizer = 'vc_col-sm-4';
        }
        elseif( 'featured_block9' == $code ) {
            $grid_sizer = 'vc_col-sm-6';
        }
        else {
            $grid_sizer = 'vc_col-sm-3';
        }

        if ( have_posts() ) : 

            $output .= '<div class="grid-blog-block-container '. esc_attr( $el_class  ) .'">';

                $output .= '<div class="wpb_row vc_row-fluid grid-blog-block">';

                    $output .= '<div class="load-container '. esc_attr( $margin ) .'">';

                        while ( have_posts() ) : the_post();

                            // Get column class for items
                            $class = $featured_blog_blocks->get_column_class( $code, $post_count );

                            $output .= '<div class="load-element grid-blog-item element '. esc_attr( $style . ' ' . $class ) .'">';

                                $output .= '<div class="grid-blog-container grid-blog-'. esc_attr( $style .' ' . $background_style ) .'">';

                                    $output .= $featured_blog_blocks->initialize( $code, $options, $post_count, $total_post );

                                $output .= '</div>'; // portfolio-container

                            $output .= '</div>'; // element

                        $post_count++; endwhile;
        
        else:
            $output .= '<div>'. esc_html__( 'No Blog Post Found.', 'composer' ) .'</div>';
        endif;
        
        $output .= '</div>'; // grid-blog-contents
        $output .= '</div>'; // grid-blog-block
        $output .= '</div>'; // grid-blog-block-container

        wp_reset_query();
        return  $output;
    }

    add_shortcode( 'featured_block1', 'composer_featured_blog_blocks' );
    add_shortcode( 'featured_block2', 'composer_featured_blog_blocks' );
    add_shortcode( 'featured_block3', 'composer_featured_blog_blocks' );
    add_shortcode( 'featured_block4', 'composer_featured_blog_blocks' );
    add_shortcode( 'featured_block5', 'composer_featured_blog_blocks' );
    add_shortcode( 'featured_block6', 'composer_featured_blog_blocks' );
    add_shortcode( 'featured_block7', 'composer_featured_blog_blocks' );
    add_shortcode( 'featured_block8', 'composer_featured_blog_blocks' );
    add_shortcode( 'featured_block9', 'composer_featured_blog_blocks' );
    add_shortcode( 'featured_block10', 'composer_featured_blog_blocks' );