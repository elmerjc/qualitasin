<?php
    /* =============================================================================
     Portfolio Blocks Shortcodes
     ========================================================================== */

    function composer_portfolio_blocks( $atts, $content = null, $code ){
        extract( shortcode_atts( array(
            'el_class'             => '',
            'insert_type'          => 'posts', //posts, id
            'id'                   => '',
            'filter'               => 'yes',
            'filter_style'         => 'normal simple',  //normal, dropdown, simple
            'order_by'             => 'modified', //'none', ID', 'author' , 'title', 'name', 'date', 'modified', 'parent', 'rand', 'menu_order'
            'order'                => 'desc', //desc, asc
            'exclude_portfolio'    => '',
            'style'                => 'style1', // style1, style2, style3, style4, style5, style6
            'title_tag'            => 'h2',
            'show_terms'           => 'yes', // yes, no    
            'show_like'            => 'yes', // yes, no    
            'port_hover_color'     => '', // port-bg-white, port-bg-color
            'show_lightbox'        => 'yes', // yes, no
            'on_click'             => 'single_port_link', // single_port_link, single_button_link, none
            'margin'               => 'margin-no', // margin-no, margin-yes            
            'append_content'       => 'no', // yes, no
            'append_content_pos'   => '1',
            'append_content_align' => 'left', // left, right, center
            'append_title'         => esc_html__( 'Our Work', 'composer' ),
            'append_button_link'   => '',           
            'pagination'           => 'none', // none, load_more, autoload, number, text
            'loadmore_text'        => esc_html__( 'Load More', 'composer' ),            
            'allpost_loaded_text'  => esc_html__( 'All Portfolio Loaded', 'composer' )
        ), $atts ) );

        // Empty assignment
        $output = $size = '';

        //Portfolio blocks class Initialised
        $portfolio_blocks = new portfolio_blocks();

        // Get number of items value
        $no_of_items = $portfolio_blocks->get_post_count( $code );

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

        // Portfolio Arguements
        if( !empty( $exclude_portfolio ) ){
            $exclude_portfolio = explode( ',', $exclude_portfolio );
        }
        else{
            $exclude_portfolio = '';
        }

        //Query arguement for Insert type: Posts, Category, ID
        if( $insert_type == 'id' && !empty( $post_in ) ){
            $args = array( 
                'post_type'           => 'pix_portfolio',             
                'order'               => $order,
                'orderby'             => 'post__in',
                'posts_per_page'      => $no_of_items,
                'post__in'            => $post_in,
                'post__not_in'        => $exclude_portfolio,
                'ignore_sticky_posts' => 1,
                'paged'               => $paged, 
                'post_status'         => 'publish'
            );
        }
        else{
            $args = array(
                'post_type'           => 'pix_portfolio',
                'orderby'             => $order_by,
                'order'               => $order,
                'posts_per_page'      => $no_of_items,
                'post__not_in'        => $exclude_portfolio,
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
        $total_post = ( 'yes' == $append_content ) ? $total_post - 1 : $total_post;

        // Portfolio Options
        $options = array();
        
        $options['style']            = $style;
        $options['filter']           = $filter;
        $options['filter_style']     = $filter_style;
        $options['title_tag']        = $title_tag;
        $options['show_terms']       = $show_terms;
        $options['show_like']        = $show_like;
        $options['port_hover_color'] = $port_hover_color;
        $options['show_lightbox']    = $show_lightbox;
        $options['on_click']         = $on_click;
        $options['margin']           = $margin;

        // Assign Post count
        $post_count = 1;

        // Grid Sizer Class
        if( 'grid_block12' == $code ) {
            $grid_sizer = 'vc_col-sm-6';
        }
        else {
            $grid_sizer = 'vc_col-sm-3';
        }

        if($filter == 'yes' ) {
            
            $terms = get_terms( 'pix_categories' ); 
            if( $terms ){
                $output .= '<div class="sorter no-portfolio-carousel '. esc_attr( $filter_style ) .'">';

                    if( $filter_style == 'dropdown' ){
                        $output .= '<div class="top-active"><span class="txt">All </span><span class="pixicon-arrows-down"></span></div>';
                    }

                    $output .= '<ul id="filters" class="option-set '. esc_attr( $filter_style ) .' clearfix" >
                                     <li><a href="#" class="selected" data-filter="*">'. esc_html__( 'All', 'amz-composer-plugins' ) .'</a></li>';
                                        $terms = get_terms( 'pix_categories' ); 
                                        foreach( $terms as $term ){ 
                                            $output .= '<li><a href="#" data-filter=".'. esc_attr( strtolower( str_replace( ' ','-',$term->slug ) ) ) .'">'. esc_html( $term->name ) .'</a></li>';    
                                        }
                                    $output .= '</ul>  
                            </div>';
            }
            
        }

        // Adjust append content position
        $append_content_pos = ( 'no' == $append_content ) ? 0 : $append_content_pos;

        if ( have_posts() ) : 

            $output .= '<div class="loadmore-wrap no-portfolio-carousel '. esc_attr( $port_hover_color .' '. $el_class ) .'">';

                $output .= $portfolio_blocks->filter( $options['filter'], $options['filter_style'] );

                $output .= '<div class="wpb_row vc_row-fluid portfolio-block-container">';

                    $output .= '<div class="load-container portfolio-contents '. esc_attr( $port_hover_color . ' ' . $margin ) .'">';

                        $output .= '<div class="portfolio-grid-sizer '. esc_attr( $grid_sizer ) .'"></div>';

                            while ( have_posts() ) : the_post();

                                // Get column class for items
                                $class = $portfolio_blocks->get_column_class( $code, $post_count );

                                // Add apend content
                                if( 'yes' == $append_content && ( int )$append_content_pos === $post_count ){ 

                                    // Get append content box size
                                    $size = $portfolio_blocks->get_image_size( $code, $post_count );

                                    $output .= '<div class="'. esc_attr( $class ) .' pix-portfolio-item portfolio-text-content '. esc_attr( $style ) .' append-'. esc_attr( $append_content_align ) .'" style="min-height:'. esc_attr( $size['height'] ) .'px;">';
                                        $output .= '<div class="portfolio-inner-text">';
                                            $output .= '<h2>'. esc_html( $append_title ) .'</h2>';
                                            $output .= '<p>'. esc_html( $content ). '</p>';

                                            $btn_att = vc_build_link( $append_button_link );
                                            $btn_att['href'] = ( isset( $btn_att['url']) && !empty( $btn_att['url'] ) ) ? $btn_att['url'] : '#';
                                            $btn_att['title'] = ( isset($btn_att['title'] ) && !empty( $btn_att['title'] ) ) ? $btn_att['title'] : esc_html__('Read More','composer' );
                                            $btn_att['target'] = ( isset( $btn_att['target'] ) ) ? $btn_att['target'] : ''; 

                                            if( !empty( $btn_att['href'] ) && !empty( $btn_att['title'] ) ){
                                                $output .= '<div class="pix_button"><a href="'. esc_url( $btn_att['href'] ) .'" '. ( ( !empty( $btn_att['target'] ) ) ? ' target="'. esc_attr( $btn_att['target'] ) .'"' : '' ).' class="clear btn btn-solid btn-oval color btn-hover-solid">'. esc_html( $btn_att['title'] ) .'</a></div>';
                                            }
                                        $output .= '</div>';
                                    $output .= '</div>';
                                }

                                if( ( int )$append_content_pos != $post_count ){ // skip append position portfolio item
                                    $output .= '<div class="load-element pix-portfolio-item element '. esc_attr( $style . ' ' . $class . ' ' . $post_count );

                                    $terms = get_the_terms( get_the_ID(),'pix_categories' );

                                    if( !empty( $terms ) ) {
                                        foreach( $terms as $term ) {
                                            $output .= ' ' . esc_attr( strtolower( str_replace( ' ','-',$term->slug ) ) ) . ' '; 
                                        }
                                    }

                                    $output .= '">';

                                        $output .= '<div class="portfolio-container portfolio-'. esc_attr( $style ) .'">';

                                            $output .= $portfolio_blocks->initialize( $code, $options, $post_count, $total_post );

                                        $output .= '</div>'; // portfolio-container

                                    $output .= '</div>'; // element
                                }

                            $post_count++; endwhile;
        
        else:
            $output .= '<div>'. esc_html__( 'No Portfolio Items Found.', 'composer' ) .'</div>';
        endif;
        
        $output .= '</div>'; // portfolio-contents
        $output .= '</div>'; // portfolio-block-container

        // Portfolio Pagination
        if( empty( $offset ) ) {
            // Values array
            $values = array();

            $values['style']               = $pagination;
            $values['loadmore_text']       = $loadmore_text;
            $values['allpost_loaded_text'] = $allpost_loaded_text;
            $values['action']              = 'portfolio_blocks_loadmore';
            $values['code']                = $code;
            $values['options']             = $options;
            $values['total_post']          = $total_post;

            $output .= $portfolio_blocks->pagination( $args, $values );
        }

        $output .= '</div>'; // no-portfolio-carousel

        wp_reset_query();
        return  $output;
    }

    add_shortcode( 'portfolio_block1', 'composer_portfolio_blocks' );
    add_shortcode( 'portfolio_block2', 'composer_portfolio_blocks' );
    add_shortcode( 'portfolio_block3', 'composer_portfolio_blocks' );
    add_shortcode( 'portfolio_block4', 'composer_portfolio_blocks' );
    add_shortcode( 'portfolio_block5', 'composer_portfolio_blocks' );
    add_shortcode( 'portfolio_block6', 'composer_portfolio_blocks' );
    add_shortcode( 'portfolio_block7', 'composer_portfolio_blocks' );
    add_shortcode( 'portfolio_block8', 'composer_portfolio_blocks' );
    add_shortcode( 'portfolio_block9', 'composer_portfolio_blocks' );
    add_shortcode( 'portfolio_block10', 'composer_portfolio_blocks' );
    add_shortcode( 'portfolio_block11', 'composer_portfolio_blocks' );
    add_shortcode( 'portfolio_block12', 'composer_portfolio_blocks' );
    add_shortcode( 'portfolio_block13', 'composer_portfolio_blocks' );