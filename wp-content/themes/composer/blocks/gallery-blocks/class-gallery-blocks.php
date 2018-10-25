<?php
    class gallery_blocks {

        public function initialize( $block = 'gallery_block1', $options = array(), $post_count, $total_post ) {
            return $this->build_gallery_blocks( $block, $options, $post_count, $total_post );
        }

        public function build_gallery_blocks( $block = 'gallery_block1', $options = array(), $post_count, $total_post ) {
            require_once( COMPOSER_BLOCKS. '/gallery-blocks/blocks/gallery-block.php' );
            $initialize = new gallery_block;
            $output = $initialize->build_gallery_post( $block, $options, $post_count, $total_post );

            return $output;
        }

        public function gallery_modules( $style = 'style1', $options, $size ) {
            require_once( COMPOSER_BLOCKS. '/gallery-blocks/style/'. $style .'.php' );
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

                $output .= '<div class="gallery-style2-like">';

                    if($like_count == ''){
                        $like_count = 0;
                    }
                    $output .= '<a href="#void" class="pix-like-me '. esc_attr( $like_class ) .'" data-id="'. esc_attr( $id ) .'"><i class="pixicon-heart-2"></i><span class="like-count">'. esc_html( $like_count ) .'</span></a>';

                $output .= '</div>'; // gallery-style2-like
            }

            return $output;
        }

        public function lightbox( $img_fullsize = '' ) {

            // Empty assignment
            $output = '';

            $output .=  '<div class="portfolio-hover">';

            $output .= '<div class="gallery-icons">';
                $output .= '<div class="center-wrap">';
                    $output .= '<a href="'. esc_url( $img_fullsize ) .'" class="port-icon-hover popup-gallery" data-title="'. esc_attr( get_the_title() ) .'"><i class="pixicon-plus"></i></a>';

                $output .= '</div>'; // center-wrap
            $output .= '</div>';  // gallery-icons

            $output .=  '</div>'; // portfolio-hover        

            return $output;
        }

        // Return pagination style
        public function pagination( $q = '', $style = 'default', $loadmore_text = 'Load More', $allpost_loaded_text = 'All Posts Loaded', $show_pagination = 'yes' ) {

            //Empty assignment
            $output = '';

            if( 'yes' == $show_pagination ) {
                $next_page_link = get_next_posts_link( $loadmore_text );

                if( $next_page_link != null ) {

                    if( 'load_more' == $style ) {
                        
                        $output .= '<div id="block-load-more-btn" class="block-load-more-btn">'
                            . $next_page_link . // It prints get_next_posts_link() function
                            '<span class="hide loaded-msg">'. esc_html( $allpost_loaded_text ) .'</span>
                            <div class="spinner" style="display: none;">
                                <div class="spinner-inner">
                                    <div class="double-bounce1"></div>
                                    <div class="double-bounce2"></div>
                                </div>
                            </div>
                        </div>';

                    }
                    elseif( 'autoload' == $style ) {
                        $output .= '<div id="block-load-more-btn" class="block-load-more-btn amz-autoload">
                            <div class="hide">'
                            . $next_page_link . // It prints get_next_posts_link() function
                            '</div> 
                            <span class="hide loaded-msg">'. esc_html( $allpost_loaded_text ) .'</span>
                            <div class="spinner">
                                <div class="spinner-inner">
                                    <div class="double-bounce1"></div>
                                    <div class="double-bounce2"></div>
                                </div>
                            </div>
                        </div>';
                    }
                    elseif( 'number' == $style  ) {

                        if( $q == '' ) {
                            global $wp_query;
                            $max_num_pages = $wp_query->max_num_pages;
                            if ( $max_num_pages <= 1 )
                                return;
                        } else {
                            $max_num_pages = $q->max_num_pages;
                            if ( $max_num_pages <= 1 )
                                return;
                        }           

                        $bignum = 999999999;
                        if ( get_query_var( 'paged' ) ) { $paged = get_query_var( 'paged' ); }
                        elseif ( get_query_var( 'page' ) ) { $paged = get_query_var( 'page' ); }
                        else { $paged = 1; } 

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
                    else {
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

                }
            }

            return $output;
        }

        // Return Image size for gallery items
        public function get_image_size( $block = 'gallery_block1', $post_count ) {

            switch ( $block ) {

                // Portfolio Block 1
                case 'gallery_block1':
                    if( 1 == $post_count || 8 == $post_count  ) {
                        $size = array( 'width' => 600, 'height' => 600 );
                    }
                    else {
                        $size = array( 'width' => 300, 'height' => 300 );
                    }
                break;

                // Portfolio Block 2
                case 'gallery_block2':
                    if( 3 == $post_count || 4 == $post_count ) {
                        $size = array( 'width' => 600, 'height' => 350 );
                    }
                    elseif( 6 == $post_count ) {
                        $size = array( 'width' => 300, 'height' => 700 );
                    }
                    else {
                        $size = array( 'width' => 300, 'height' => 350 );
                    }
                break;

                // Portfolio Block 3
                case 'gallery_block3':
                    if( 1 == $post_count ) {
                        $size = array( 'width' => 600, 'height' => 700 );
                    }
                    else {
                        $size = array( 'width' => 300, 'height' => 350 );
                    }
                break;

                // Portfolio Block 4
                case 'gallery_block4':
                    if( 2 == $post_count ) {
                        $size = array( 'width' => 600, 'height' => 700 );
                    }
                    elseif( 3 == $post_count ) {
                        $size = array( 'width' => 300, 'height' => 700 );
                    }
                    elseif( 5 == $post_count ) {
                        $size = array( 'width' => 600, 'height' => 350 );
                    }
                    else {
                        $size = array( 'width' => 300, 'height' => 350 );
                    }
                break;

                // Portfolio Block 5
                case 'gallery_block5':
                    if( 1 == $post_count || 4 == $post_count ) {
                        $size = array( 'width' => 600, 'height' => 300 );
                    }
                    elseif( 2 == $post_count || 3 == $post_count ) {
                        $size = array( 'width' => 300, 'height' => 600 );
                    }
                    else {
                        $size = array( 'width' => 300, 'height' => 300 );
                    }
                break;

                // Portfolio Block 6
                case 'gallery_block6':
                    if( 1 == $post_count ) {
                        $size = array( 'width' => 600, 'height' => 700 );
                    }
                    elseif( 2 == $post_count ) {
                        $size = array( 'width' => 300, 'height' => 700 );
                    }
                    elseif( 10 == $post_count ) {
                        $size = array( 'width' => 600, 'height' => 350 );
                    }
                    else {
                        $size = array( 'width' => 300, 'height' => 350 );
                    }
                break;

                // Portfolio Block 7
                case 'gallery_block7':
                    if( 5 == $post_count ) {
                        $size = array( 'width' => 600, 'height' => 600 );
                    }
                    else {
                        $size = array( 'width' => 300, 'height' => 300 );
                    }
                break;

                // Portfolio Block 8
                case 'gallery_block8':
                    if( 3 == $post_count ) {
                        $size = array( 'width' => 600, 'height' => 700 );
                    }
                    elseif( 4 == $post_count ) {
                        $size = array( 'width' => 600, 'height' => 350 );
                    }
                    else {
                        $size = array( 'width' => 300, 'height' => 350 );
                    }
                break;

                // Portfolio Block 9
                case 'gallery_block9':
                    if( 4 == $post_count || 5 == $post_count ) {
                        $size = array( 'width' => 300, 'height' => 700 );
                    }
                    else {
                        $size = array( 'width' => 300, 'height' => 350 );
                    }
                break;

                // Portfolio Block 10
                case 'gallery_block10':
                    if( 1 == $post_count || 4 == $post_count || 5 == $post_count || 6 == $post_count ) {
                        $size = array( 'width' => 600, 'height' => 500 );
                    }
                    else {
                        $size = array( 'width' => 300, 'height' => 400 );
                    }
                break;

                // Portfolio Block 11
                case 'gallery_block11':
                    if( 1 == $post_count || 7 == $post_count ) {
                        $size = array( 'width' => 600, 'height' => 700 );
                    }
                    else {
                        $size = array( 'width' => 300, 'height' => 350 );
                    }
                break;

                // Portfolio Block 12
                case 'gallery_block12':
                    if( 4 == $post_count ) {
                        $size = array( 'width' => 1200, 'height' => 500 );
                    }
                    elseif( 2 == $post_count || 5 == $post_count ) {
                        $size = array( 'width' => 600, 'height' => 800 );
                    }
                    else {
                        $size = array( 'width' => 600, 'height' => 400 );
                    }
                break;
                
                default:
                break;
            }

            return $size;

        }

        // Return column class for items
        public function get_column_class( $block = 'gallery_block1', $post_count ) {

            switch ( $block ) {

                // Portfolio Block 1
                case 'gallery_block1':
                    if( 1 == $post_count || 8 == $post_count  ) {
                        $class = 'vc_col-sm-6';
                    }
                    else {
                        $class = 'vc_col-sm-3';
                    }
                break;

                // Portfolio Block 2
                case 'gallery_block2':
                    if( 3 == $post_count || 4 == $post_count ) {
                        $class = 'vc_col-sm-6';
                    }
                    else {
                        $class = 'vc_col-sm-3';
                    }
                break;

                // Portfolio Block 3
                case 'gallery_block3':
                    if( 1 == $post_count ) {
                        $class = 'vc_col-sm-6';
                    }
                    else {
                        $class = 'vc_col-sm-3';
                    }
                break;

                // Portfolio Block 4
                case 'gallery_block4':
                    if( 2 == $post_count || 5 == $post_count ) {
                        $class = 'vc_col-sm-6';
                    }
                    else {
                        $class = 'vc_col-sm-3';
                    }
                break;

                // Portfolio Block 5
                case 'gallery_block5':
                    if( 1 == $post_count || 4 == $post_count ) {
                        $class = 'vc_col-sm-6';
                    }
                    else {
                        $class = 'vc_col-sm-3';
                    }
                break;

                // Portfolio Block 6
                case 'gallery_block6':
                    if( 1 == $post_count || 10 == $post_count ) {
                        $class = 'vc_col-sm-6';
                    }
                    else {
                        $class = 'vc_col-sm-3';
                    }
                break;

                // Portfolio Block 7
                case 'gallery_block7':
                    if( 5 == $post_count ) {
                        $class = 'vc_col-sm-6';
                    }
                    else {
                        $class = 'vc_col-sm-3';
                    }
                break;

                // Portfolio Block 8
                case 'gallery_block8':
                    if( 3 == $post_count || 4 == $post_count ) {
                        $class = 'vc_col-sm-6';
                    }
                    else {
                        $class = 'vc_col-sm-3';
                    }
                break; 

                // Portfolio Block 9
                case 'gallery_block9':
                    $class = 'vc_col-sm-3';
                break;

                // Portfolio Block 10
                case 'gallery_block10':
                    if( 1 == $post_count || 4 == $post_count || 5 == $post_count || 6 == $post_count ) {
                        $class = 'vc_col-sm-6';
                    }
                    else {
                        $class = 'vc_col-sm-3';
                    }
                break;

                // Portfolio Block 11
                case 'gallery_block11':
                    if( 1 == $post_count || 7 == $post_count ) {
                        $class = 'vc_col-sm-6';
                    }
                    else {
                        $class = 'vc_col-sm-3';
                    }
                break;

                // Portfolio Block 12
                case 'gallery_block12':
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
        public function get_post_count( $block = 'gallery_block1' ) {
            switch ( $block ) {

                // Portfolio Block 1
                case 'gallery_block1':
                    $count = 10;
                break;

                // Portfolio Block 2
                case 'gallery_block2':
                    $count = 9;
                break;

                // Portfolio Block 3
                case 'gallery_block3':
                    $count = 9;
                break;

                // Portfolio Block 4
                case 'gallery_block4':
                    $count = 7;
                break;

                // Portfolio Block 5
                case 'gallery_block5':
                    $count = 8;
                break;

                // Portfolio Block 6
                case 'gallery_block6':
                    $count = 11;
                break;

                // Portfolio Block 7
                case 'gallery_block7':
                    $count = 9;
                break;

                // Portfolio Block 8
                case 'gallery_block8':
                    $count = 8;
                break;

                // Portfolio Block 9
                case 'gallery_block9':
                    $count = 10;
                break;

                // Portfolio Block 10
                case 'gallery_block10':
                    $count = 8;
                break;

                // Portfolio Block 11
                case 'gallery_block11':
                    $count = 14;
                break;

                // Portfolio Block 12
                case 'gallery_block12':
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
    composer_require_file ( COMPOSER_BLOCKS .          '/gallery-blocks/gallery-block-shortcode.php' );

    // Portfolio Block Extend Vc
    composer_require_file ( COMPOSER_BLOCKS .          '/gallery-blocks/gallery-block-vc.php' );