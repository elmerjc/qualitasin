<?php
    class portfolio_blocks {

        public function initialize( $block = 'portfolio_block1', $options = array(), $post_count, $total_post ) {
            return $this->build_portfolio_blocks( $block, $options, $post_count, $total_post );
        }

        public function build_portfolio_blocks( $block = 'portfolio_block1', $options = array(), $post_count, $total_post ) {
            require_once( COMPOSER_BLOCKS. '/portfolio-blocks/blocks/portfolio-block.php' );
            $initialize = new portfolio_block;
            $output = $initialize->build_portfolio_post( $block, $options, $post_count, $total_post );

            return $output;
        }

        public function portfolio_modules( $style = 'style1', $options, $size ) {
            require_once( COMPOSER_BLOCKS. '/portfolio-blocks/style/'. $style .'.php' );
            $initialize = new $style;
            $output = $initialize->build_style( $options, $size );

            return $output;
        }

        // For Html Structure

        // Div open
        public function open( $class = '', $id = '' ) {
            $classes =  !empty( $class ) ? ' class="'. esc_attr( $class ) .'"': '';
            $id =  !empty( $id ) ? ' id="'. esc_attr( $id ).'"' : '';

            return '<div' . $id . $classes .'>';
        }

        // Div close
        public function close() {
            return '</div>';
        }

        //Blog Title
        public function title( $class = '', $tag = 'h2', $link = 'no' ) {

            $classes =  !empty( $class ) ? ' class="'. esc_attr( $class ).'"' : '';

            if( 'yes' == $link ) {
                return '<'. $tag . $classes .'><a href="'. esc_url( get_permalink() ) .'">'. esc_html( get_the_title() ) .'</a></'. $tag .'>';
            }
            else {
                return '<'. $tag . $classes .'>'. esc_html( get_the_title() ) .'</'. $tag .'>';
            }
        }

        public function get_image_by_id( $width, $height, $image_id, $only_src = true, $placeholder = false ) {

            $image_thumb_url = '';

            if( !empty( $image_id ) ) {

                $image_thumb_url = wp_get_attachment_image_src( $image_id, 'full' ); // full iamge URL
            }

            if( !is_int( $width ) ) {
                $width = 1920;
            } 

            if( !is_int( $height ) ) {
                $height = 1020;
            }

            $output = '';

            if( ! empty( $image_thumb_url ) ) {
                $img = aq_resize( $image_thumb_url[0], $width , $height, true, true );

                if( $only_src ) {
                    if($img){
                        $output = $img;
                    }
                    else{
                        $output = $image_thumb_url[0];
                    }
                }
                else {

                    $img_url = ( $img ) ? $img : $image_thumb_url[0];

                    if( $img ) {
                        $img_url = $img;
                    } else {
                        $img_url = $image_thumb_url[0];
                        $width = $image_thumb_url[1];
                        $height = $image_thumb_url[2];
                    }

                    $output = '<img src="' . esc_url( $img_url ) . '" alt="">';

                }
            }
            else if( empty( $image_thumb_url ) && $placeholder ) {
                $placeholder = composer_get_option_value( 'placeholder', '' );

                if( !empty( $placeholder ) ) {
                    $img_url = aq_resize( $placeholder, $width , $height, true, true );
                }
                else {
                    $protocol = is_ssl() ? 'https' : 'http';
                    $img_url = $protocol.'://placehold.it/'.$width.'x'.$height;             
                }

                if( $only_src ) {
                    $output = $img_url;
                }
                else {
                    $output = '<img src="'.esc_url( $img_url ) .'" alt="">';
                }
            }

            return $output;                  

        }

        public function terms( $show_terms = 'yes' ) {

            // Empty assignment
            $output = '';

            if( 'yes' == $show_terms ) {
                $terms = get_the_term_list( get_the_ID() , 'pix_categories','',', ' );
                $terms = !empty( $terms ) ? strip_tags( $terms ) : '';

                $output .= '<p class="terms">'. $terms .'</p>';
            }

            return $output;
        }

        public function filter( $show_filter = 'yes', $filter_style = 'normal' ) {

            // Empty assignment
            $output = '';

            if( 'yes' == $show_filter ) {
            
                $terms = get_terms( 'pix_categories' ); 
                if( $terms ){
                    $output .= '<div class="sorter '. esc_attr( $filter_style ) .'">';

                        if( $filter_style == 'dropdown' ){
                            $output .= '<div class="top-active"><span class="txt">All </span><span class="pixicon-arrows-down"></span></div>';
                        }

                        $output .= '<ul id="filters" class="option-set '. esc_attr( $filter_style ) .' clearfix" >
                            <li><a href="#" class="selected" data-filter="*">'. esc_html__( 'All', 'composer' ) .'</a></li>';

                            $terms = get_terms( 'pix_categories' );
                            foreach( $terms as $term ){ 
                                $output .= '<li><a href="#" data-filter=".'. esc_attr( strtolower( str_replace( ' ','-',$term->slug ) ) ) .'">'. esc_html( $term->name ) .'</a></li>';    
                            }
                        $output .= '</ul>  
                    </div>';
                }
                
            }
        }

        public function like( $show_like = 'yes' ) {

            // Empty assignment
            $output = '';

            if( 'yes' == $show_like ) {

                $id = get_the_ID();

                $like_count = get_post_meta( get_the_ID(), '_pix_like_me', true );
                $like_class = ( isset($_COOKIE['pix_like_me_'. $id])) ? 'liked' : '';

                $output .= '<div class="portfolio-style2-like">';

                    if($like_count == ''){
                        $like_count = 0;
                    }
                    $output .= '<a href="#void" class="pix-like-me '. esc_attr( $like_class ) .'" data-id="'. esc_attr( $id ) .'"><i class="pixicon-heart-2"></i><span class="like-count">'. esc_html( $like_count ) .'</span></a>';

                $output .= '</div>'; // portfolio-style2-like
            }

            return $output;
        }

        public function lightbox( $img_fullsize = '', $show_lightbox = 'yes' ) {

            // Empty assignment
            $output = '';

            if( 'yes' == $show_lightbox ) { 

                $output .= '<div class="portfolio-icons">';
                    $output .= '<div class="center-wrap">';
                        $output .= '<a href="'. esc_url( $img_fullsize ) .'" class="port-icon-hover popup-gallery" data-title="'. esc_attr( get_the_title() ) .'"><i class="pixicon-plus"></i></a>';

                    $output .= '</div>'; // center-wrap
                $output .= '</div>';  // portfolio-icons
            }

            return $output;
        }

        // Return pagination style
        public function pagination( $args = array(), $values = array() ) {

            //Empty assignment
            $output = '';

            // Set max number of pages
            if( $args == '' ) {
                global $wp_query;
                $max_num_pages = $wp_query->max_num_pages;
                if ( $max_num_pages <= 1 )
                    return;
            }
            else {
                // Assign and call query
                $q = new WP_Query( $args );
                $max_num_pages = $q->max_num_pages;
                if ( $max_num_pages <= 1 )
                    return;
            } 

            // Set page number
            if( get_query_var( 'paged' ) ) {
                $paged = get_query_var( 'paged' );
            }
            elseif( get_query_var( 'page' ) ) {
                $paged = get_query_var( 'page' );
            }
            else {
                $paged = 1;
            }

            // Add max number of pages to the values array
            $values['max']   = $max_num_pages;

            if( 'load_more' == $values['style'] ) {

                $output .= "<div id='block-load-more-btn' class='block-load-more-btn'>
                    <a href='#' data-paged='". esc_attr( $paged ) ."' data-args='". json_encode( $args ) ."' data-values='". json_encode( $values ) ."'>". esc_html( $values['loadmore_text'] ) ."</a>
                    <span class='hide loaded-msg'>". esc_html( $values['allpost_loaded_text'] ) ."</span>
                    <div class='spinner' style='display: none;'>
                        <div class='spinner-inner'>
                            <div class='double-bounce1'></div>
                            <div class='double-bounce2'></div>
                        </div>
                    </div>
                </div>";

            }
            elseif( 'autoload' == $values['style'] ) {
                $output .= "<div id='block-load-more-btn' class='block-load-more-btn amz-autoload'>
                    <a href='#' data-paged='". esc_attr( $paged ) ."' data-args='". json_encode( $args ) ."' data-values='". json_encode( $values ) ."'>". esc_html( $values['loadmore_text'] ) ."</a>
                    <span class='hide loaded-msg'>". esc_html( $values['allpost_loaded_text'] ) ."</span>
                    <div class='spinner' style='display: none;'>
                        <div class='spinner-inner'>
                            <div class='double-bounce1'></div>
                            <div class='double-bounce2'></div>
                        </div>
                    </div>
                </div>";
            }
            elseif( 'number' == $values['style']  ) {

                $bignum = 999999999; 

                $base = str_replace( $bignum, '%#%', esc_url( get_pagenum_link($bignum) ) );
            
                $pagination = paginate_links( array(
                    'base'         => $base,
                    'format'       => '',
                    'current'      => max( 1, $paged ),
                    'total'        => $max_num_pages,
                    'prev_text'    => '&larr;',
                    'next_text'    => '&rarr;',
                    'type'         => 'list',
                    'end_size'     => 3,
                    'mid_size'     => 3
                ) );

                $output .= '<nav class="pagination clearfix">';
                    $output .= $pagination;
                $output .= '</nav>';

            }
            elseif( 'text' == $values['style']  ) {
                if( get_next_posts_link() || get_previous_posts_link() ) {
                    $output .= '<nav class="wp-prev-next ">
                        <ul class="clearfix">';
                        if( get_next_posts_link() ) {
                            $output .= '<li class="prev-link">'.get_next_posts_link( __( '&laquo; Older Entries', 'composer' )).'</li>';
                        }
                        if( get_previous_posts_link() ) {
                            $output .= '<li class="next-link">'.get_previous_posts_link( __( 'Newer Entries &raquo;', 'composer' )).'</li>';
                        }
                        $output .= '</ul>
                    </nav>';
                }
            }

            return $output;
        }

        // Return Image size for portfolio items
        public function get_image_size( $block = 'portfolio_block1', $post_count ) {

            switch ( $block ) {

                // Portfolio Block 1
                case 'portfolio_block1':
                    if( 1 == $post_count || 8 == $post_count  ) {
                        $size = array( 'width' => 952, 'height' => 952 );
                    }
                    else {
                        $size = array( 'width' => 476, 'height' => 476 );
                    }
                break;

                // Portfolio Block 2
                case 'portfolio_block2':
                    if( 3 == $post_count || 4 == $post_count ) {
                        $size = array( 'width' => 952, 'height' => 540 );
                    }
                    elseif( 6 == $post_count ) {
                        $size = array( 'width' => 476, 'height' => 1080 );
                    }
                    else {
                        $size = array( 'width' => 476, 'height' => 540 );
                    }
                break;

                // Portfolio Block 3
                case 'portfolio_block3':
                    if( 1 == $post_count ) {
                        $size = array( 'width' => 952, 'height' => 1080 );
                    }
                    else {
                        $size = array( 'width' => 476, 'height' => 540 );
                    }
                break;

                // Portfolio Block 4
                case 'portfolio_block4':
                    if( 2 == $post_count ) {
                        $size = array( 'width' => 952, 'height' => 1080 );
                    }
                    elseif( 3 == $post_count ) {
                        $size = array( 'width' => 476, 'height' => 1080 );
                    }
                    elseif( 5 == $post_count ) {
                        $size = array( 'width' => 952, 'height' => 540 );
                    }
                    else {
                        $size = array( 'width' => 476, 'height' => 540 );
                    }
                break;

                // Portfolio Block 5
                case 'portfolio_block5':
                    if( 1 == $post_count || 4 == $post_count ) {
                        $size = array( 'width' => 952, 'height' => 476 );
                    }
                    elseif( 2 == $post_count || 3 == $post_count ) {
                        $size = array( 'width' => 476, 'height' => 952 );
                    }
                    else {
                        $size = array( 'width' => 476, 'height' => 476 );
                    }
                break;

                // Portfolio Block 6
                case 'portfolio_block6':
                    if( 1 == $post_count ) {
                        $size = array( 'width' => 952, 'height' => 1080 );
                    }
                    elseif( 2 == $post_count ) {
                        $size = array( 'width' => 476, 'height' => 1080 );
                    }
                    elseif( 10 == $post_count ) {
                        $size = array( 'width' => 952, 'height' => 540 );
                    }
                    else {
                        $size = array( 'width' => 476, 'height' => 540 );
                    }
                break;

                // Portfolio Block 7
                case 'portfolio_block7':
                    if( 5 == $post_count ) {
                        $size = array( 'width' => 952, 'height' => 952 );
                    }
                    else {
                        $size = array( 'width' => 476, 'height' => 476 );
                    }
                break;

                // Portfolio Block 8
                case 'portfolio_block8':
                    if( 3 == $post_count ) {
                        $size = array( 'width' => 952, 'height' => 1080 );
                    }
                    elseif( 4 == $post_count ) {
                        $size = array( 'width' => 952, 'height' => 540 );
                    }
                    else {
                        $size = array( 'width' => 476, 'height' => 540 );
                    }
                break;

                // Portfolio Block 9
                case 'portfolio_block9':
                    if( 4 == $post_count || 5 == $post_count ) {
                        $size = array( 'width' => 476, 'height' => 1080 );
                    }
                    else {
                        $size = array( 'width' => 476, 'height' => 540 );
                    }
                break;

                // Portfolio Block 10
                case 'portfolio_block10':
                    if( 1 == $post_count || 4 == $post_count || 5 == $post_count || 6 == $post_count ) {
                        $size = array( 'width' => 952, 'height' => 1080 );
                    }
                    else {
                        $size = array( 'width' => 476, 'height' => 600 );
                    }
                break;

                // Portfolio Block 11
                case 'portfolio_block11':
                    if( 1 == $post_count || 7 == $post_count ) {
                        $size = array( 'width' => 952, 'height' => 1080 );
                    }
                    else {
                        $size = array( 'width' => 476, 'height' => 540 );
                    }
                break;

                // Portfolio Block 12
                case 'portfolio_block12':
                    if( 4 == $post_count ) {
                        $size = array( 'width' => 1920, 'height' => 1080 );
                    }
                    elseif( 2 == $post_count || 5 == $post_count ) {
                        $size = array( 'width' => 952, 'height' => 1199 );
                    }
                    else {
                        $size = array( 'width' => 952, 'height' => 600 );
                    }
                break;
                
                default:
                break;
            }

            return $size;

        }

        // Return column class for items
        public function get_column_class( $block = 'portfolio_block1', $post_count ) {

            switch ( $block ) {

                // Portfolio Block 1
                case 'portfolio_block1':
                    if( 1 == $post_count || 8 == $post_count  ) {
                        $class = 'vc_col-sm-6';
                    }
                    else {
                        $class = 'vc_col-sm-3';
                    }
                break;

                // Portfolio Block 2
                case 'portfolio_block2':
                    if( 3 == $post_count || 4 == $post_count ) {
                        $class = 'vc_col-sm-6';
                    }
                    else {
                        $class = 'vc_col-sm-3';
                    }
                break;

                // Portfolio Block 3
                case 'portfolio_block3':
                    if( 1 == $post_count ) {
                        $class = 'vc_col-sm-6';
                    }
                    else {
                        $class = 'vc_col-sm-3';
                    }
                break;

                // Portfolio Block 4
                case 'portfolio_block4':
                    if( 2 == $post_count || 5 == $post_count ) {
                        $class = 'vc_col-sm-6';
                    }
                    else {
                        $class = 'vc_col-sm-3';
                    }
                break;

                // Portfolio Block 5
                case 'portfolio_block5':
                    if( 1 == $post_count || 4 == $post_count ) {
                        $class = 'vc_col-sm-6';
                    }
                    else {
                        $class = 'vc_col-sm-3';
                    }
                break;

                // Portfolio Block 6
                case 'portfolio_block6':
                    if( 1 == $post_count || 10 == $post_count ) {
                        $class = 'vc_col-sm-6';
                    }
                    else {
                        $class = 'vc_col-sm-3';
                    }
                break;

                // Portfolio Block 7
                case 'portfolio_block7':
                    if( 5 == $post_count ) {
                        $class = 'vc_col-sm-6';
                    }
                    else {
                        $class = 'vc_col-sm-3';
                    }
                break;

                // Portfolio Block 8
                case 'portfolio_block8':
                    if( 3 == $post_count || 4 == $post_count ) {
                        $class = 'vc_col-sm-6';
                    }
                    else {
                        $class = 'vc_col-sm-3';
                    }
                break; 

                // Portfolio Block 9
                case 'portfolio_block9':
                    $class = 'vc_col-sm-3';
                break;

                // Portfolio Block 10
                case 'portfolio_block10':
                    if( 1 == $post_count || 4 == $post_count || 5 == $post_count || 6 == $post_count ) {
                        $class = 'vc_col-sm-6';
                    }
                    else {
                        $class = 'vc_col-sm-3';
                    }
                break;

                // Portfolio Block 11
                case 'portfolio_block11':
                    if( 1 == $post_count || 7 == $post_count ) {
                        $class = 'vc_col-sm-6';
                    }
                    else {
                        $class = 'vc_col-sm-3';
                    }
                break;

                // Portfolio Block 12
                case 'portfolio_block12':
                    if( 4 == $post_count ) {
                        $class = 'vc_col-sm-12';
                    }
                    else {
                        $class = 'vc_col-sm-6';
                    }
                break;
                
                default:
                break;
            }

            return $class;
            
        }

        // Return Number of items for blocks
        public function get_post_count( $block = 'portfolio_block1' ) {
            switch ( $block ) {

                // Portfolio Block 1
                case 'portfolio_block1':
                    $count = 10;
                break;

                // Portfolio Block 2
                case 'portfolio_block2':
                    $count = 9;
                break;

                // Portfolio Block 3
                case 'portfolio_block3':
                    $count = 9;
                break;

                // Portfolio Block 4
                case 'portfolio_block4':
                    $count = 7;
                break;

                // Portfolio Block 5
                case 'portfolio_block5':
                    $count = 8;
                break;

                // Portfolio Block 6
                case 'portfolio_block6':
                    $count = 11;
                break;

                // Portfolio Block 7
                case 'portfolio_block7':
                    $count = 9;
                break;

                // Portfolio Block 8
                case 'portfolio_block8':
                    $count = 8;
                break;

                // Portfolio Block 9
                case 'portfolio_block9':
                    $count = 10;
                break;

                // Portfolio Block 10
                case 'portfolio_block10':
                    $count = 8;
                break;

                // Portfolio Block 11
                case 'portfolio_block11':
                    $count = 14;
                break;

                // Portfolio Block 12
                case 'portfolio_block12':
                    $count = 7;
                break;
                
                default:
                break;
            }
            return $count;
        }

    }

    // Required Files

    // Portfolio Block Shortcode
    composer_require_file ( COMPOSER_BLOCKS .          '/portfolio-blocks/portfolio-block-shortcode.php' );

    // Portfolio Block Extend Vc
    composer_require_file ( COMPOSER_BLOCKS .          '/portfolio-blocks/portfolio-block-vc.php' );

    // Ajax Portfolio Block
    composer_require_file ( COMPOSER_BLOCKS .          '/portfolio-blocks/portfolio-block-ajax.php' );