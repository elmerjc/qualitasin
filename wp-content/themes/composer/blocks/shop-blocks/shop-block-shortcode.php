<?php
    /* =============================================================================
     Grid Blog Blocks Shortcodes
     ========================================================================== */

    function composer_shop_blocks( $atts, $content = null, $code ){
        extract( shortcode_atts( array(
            // General
            'el_class'            => '',
            'style'               => 'shop_style1',
            'title_tag'           => 'h2',
            'margin'              => 'margin-no', // margin-no, margin-yes
            'pagination'          => 'none', // none, load_more, autoload, number, text
            'loadmore_text'       => esc_html__( 'Load More', 'composer' ),
            'allpost_loaded_text' => esc_html__( 'All Post Loaded', 'composer' ),
            
            // Query Builder
            'insert_type'         => 'posts', //posts, id
            'order_by'            => 'date', //'none', ID', 'author' , 'title', 'name', 'date', 'modified', 'parent', 'rand'
            'order'               => 'DESC', //desc, asc
            'id'                  => '',
            'exclude_id'          => ''
        ), $atts ) );

        // Empty assignment
        $output = '';

        // Shop blocks class Initialised
        $shop_blocks = new shop_blocks();

        // Get number of items value
        $no_of_items = $shop_blocks->get_post_count( $code );

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

        //Build id as array
        $post_in = array_filter( explode( ",", $id ) );

        //Build post__not_in as array
        $id = get_the_ID();
        $post_not_in = array_filter( explode( ",", $exclude_id ) );
        $post_not_in = array_merge( ( array )$id, $post_not_in );

        //Query arguement for Insert type: Posts and ID
        if( $insert_type == 'id' && !empty( $post_in ) ){
            $args = array(  
                'post_type'           => 'product',            
                'order'               => $order,
                'orderby'             => $order_by,
                'posts_per_page'      => $no_of_items,
                'post__in'            => $post_in,
                'post__not_in'        => $post_not_in,
                'ignore_sticky_posts' => 1,
                'paged'               => $paged, 
                'post_status'         => 'publish'
            );
        }
        else{
            $args = array(
                'post_type'           => 'product',
                'orderby'             => $order_by,
                'order'               => $order,
                'posts_per_page'      => $no_of_items,
                'post__not_in'        => $post_not_in,
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

        // Assign Post count
        $post_count = 1;

        // Grid Sizer Class
        if( 'shop_block4' == $code ) {
            $grid_sizer = 'vc_col-sm-4';
        }
        else {
            $grid_sizer = 'vc_col-sm-3';
        }

        if ( have_posts() ) : 

            $output .= '<div class="loadmore-wrap shop-block-container '. esc_attr( $el_class  ) .'">';

                $output .= '<div class="wpb_row vc_row-fluid shop-block">';

                    $output .= '<div class="load-container shop-contents row '. esc_attr( $margin ) .'">';

                        $output .= '<div class="shop-grid-sizer '. esc_attr( $grid_sizer ) .'"></div>';

                        while ( have_posts() ) : the_post();

                            // Get column class for items
                            $class = $shop_blocks->get_column_class( $code, $post_count );

                            $output .= '<div class="load-element shop-item element '. esc_attr( $style . ' ' . $class ) .'">';

                                $output .= '<div class="shop-container shop-'. esc_attr( $style ) .'">';

                                    $output .= $shop_blocks->initialize( $code, $options, $post_count, $total_post );

                                $output .= '</div>'; // shop-container

                            $output .= '</div>'; // element

                        $post_count++; endwhile;
        
        else:
            $output .= '<div>'. esc_html__( 'No Products Found.', 'composer' ) .'</div>';
        endif;
        
        $output .= '</div>'; // shop-contents
        $output .= '</div>'; // shop-block

        // Shop Pagination
        if( empty( $offset ) ) {
            // Values array
            $values = array();

            $values['style']               = $pagination;
            $values['loadmore_text']       = $loadmore_text;
            $values['allpost_loaded_text'] = $allpost_loaded_text;
            $values['action']              = 'shop_blocks_loadmore';
            $values['code']                = $code;
            $values['options']             = $options;
            $values['total_post']          = $total_post;

            $output .= $shop_blocks->pagination( $args, $values );
        }
        
        $output .= '</div>'; // shop-block-container

        wp_reset_query();
        return  $output;
    }

    add_shortcode( 'shop_block1', 'composer_shop_blocks' );
    add_shortcode( 'shop_block2', 'composer_shop_blocks' );
    add_shortcode( 'shop_block3', 'composer_shop_blocks' );
    add_shortcode( 'shop_block4', 'composer_shop_blocks' );
    add_shortcode( 'shop_block5', 'composer_shop_blocks' );