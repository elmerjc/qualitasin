<?php
    class shop_blocks {

        public function initialize( $block = 'shop_block1', $options = array(), $post_count, $total_post ) {

            return $this->build_shop_blocks( $block, $options, $post_count, $total_post );
        }

        public function build_shop_blocks( $block = 'shop_block1', $options = array(), $post_count, $total_post ) {
            require_once( COMPOSER_BLOCKS. '/shop-blocks/blocks/shop-block.php' );
            $initialize = new shop_block;
            $output = $initialize->build_shop_post( $block, $options, $post_count, $total_post );

            return $output;
        }

        public function shop_modules( $style = 'style1', $options, $size ) {
            require_once( COMPOSER_BLOCKS. '/shop-blocks/style/'. $style .'.php' );
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

                    $output = '<img src="' . esc_url( $img_url ) . '" width="'. esc_attr( $width ) .'" height="'. esc_attr( $height ) .'" alt="">';

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

        // Return Product Prize
        public function price() {

            //Empty assignment
            $output = '';

            global $product;

            $output .= '<p class="price">'. esc_html( get_woocommerce_currency_symbol() . $product->get_price() ) .'</p>';

            return $output;

        }

        // Return Batch
        public function batch() {

            //Empty assignment
            $output = '';

            global $post, $product;

            if ( $product->is_on_sale() ) {

                $output .= apply_filters( 'woocommerce_sale_flash', '<span class="batch">' . esc_html__( 'Sale', 'composer' ) . '</span>', $post, $product );

            }

            return $output;

        }

        // Return Single Post Link
        public function single() {

            //Empty assignment
            $output = '';

            $output .= '<a href="'. esc_url( get_permalink() ) .'" target="_blank" class="cart-btn" ><i class="pixicon-cart"></i></a>';

            return $output;

        }

        // Return Image size for blog items
        public function get_image_size( $block = 'shop_block1', $post_count ) {

            switch ( $block ) {

                // Shop Block 1
                case 'shop_block1':
                    if( 1 == $post_count || 4 == $post_count ) {
                        $size = array( 'width' => 1200, 'height' => 550 );
                    }
                    else {
                        $size = array( 'width' => 600, 'height' => 550 );
                    }
                break;

                // Shop Block 2
                case 'shop_block2':
                    if( 1 == $post_count ) {
                        $size = array( 'width' => 900, 'height' => 600 );
                    }
                    else if( 2 == $post_count ) {
                        $size = array( 'width' => 300, 'height' => 600 );
                    }
                    else {
                        $size = array( 'width' => 300, 'height' => 425 );
                    }
                break;

                // Shop Block 3
                case 'shop_block3':
                    if( 1 == $post_count ) {
                        $size = array( 'width' => 600, 'height' => 600 );
                    }
                    else if( 2 == $post_count || 3 == $post_count ) {
                        $size = array( 'width' => 300, 'height' => 600 );
                    }
                    else {
                        $size = array( 'width' => 300, 'height' => 425 );
                    }
                break;

                // Shop Block 4
                case 'shop_block4':
                    if( 1 == $post_count || 7 == $post_count ) {
                        $size = array( 'width' => 800, 'height' => 550 );
                    }
                    else if( 2 == $post_count || 6 == $post_count ) {
                        $size = array( 'width' => 400, 'height' => 550 );
                    }
                    else {
                        $size = array( 'width' => 400, 'height' => 550 );
                    }
                break;

                // Shop Block 5
                case 'shop_block5':
                    if( 1 == $post_count || 4 == $post_count ) {
                        $size = array( 'width' => 600, 'height' => 550 );
                    }
                    else {
                        $size = array( 'width' => 300, 'height' => 425 );
                    }
                break;
                
                default:
                break;
            }

            return $size;

        }

        // Return column class for items
        public function get_column_class( $block = 'shop_block1', $post_count ) {

            switch ( $block ) {

                // Shop Block 1
                case 'shop_block1':
                    if( 1 == $post_count || 4 == $post_count ) {
                        $class = 'vc_col-sm-12';
                    }
                    else {
                        $class = 'vc_col-sm-6';
                    }
                break;

                // Shop Block 2
                case 'shop_block2':
                    if( 1 == $post_count ) {
                        $class = 'vc_col-sm-9';
                    }
                    else {
                        $class = 'vc_col-sm-3';
                    }
                break;

                // Shop Block 3
                case 'shop_block3':
                    if( 1 == $post_count ) {
                        $class = 'vc_col-sm-6';
                    }
                    else {
                        $class = 'vc_col-sm-3';
                    }
                break;

                // Shop Block 3
                case 'shop_block3':
                    if( 1 == $post_count ) {
                        $class = 'vc_col-sm-6';
                    }
                    else {
                        $class = 'vc_col-sm-3';
                    }
                break;

                // Shop Block 4
                case 'shop_block4':
                    if( 1 == $post_count || 7 == $post_count ) {
                        $class = 'vc_col-sm-8';
                    }
                    else {
                        $class = 'vc_col-sm-4';
                    }
                break;

                // Shop Block 5
                case 'shop_block5':
                    if( 1 == $post_count || 4 == $post_count ) {
                        $class = 'vc_col-sm-6';
                    }
                    else {
                        $class = 'vc_col-sm-3';
                    }
                break;
                
                default:
                break;
            }

            return $class;
            
        }

        // Return Number of items for blocks
        public function get_post_count( $block = 'shop_block1' ) {
            switch ( $block ) {

                // Shop Block 1
                case 'shop_block1':
                    $count = 6;
                break;

                // Shop Block 2
                case 'shop_block2':
                    $count = 6;
                break;

                // Shop Block 3
                case 'shop_block3':
                    $count = 7;
                break;

                // Shop Block 4
                case 'shop_block4':
                    $count = 10;
                break;

                // Shop Block 5
                case 'shop_block5':
                    $count = 10;
                break;
                
                default:
                break;
            }
            return $count;
        }

    }

    // Required Files

    // Shop Block Shortcode
    composer_require_file ( COMPOSER_BLOCKS .          '/shop-blocks/shop-block-shortcode.php' );

    // Shop Block Extend Vc
    composer_require_file ( COMPOSER_BLOCKS .          '/shop-blocks/shop-block-vc.php' );

    // Ajax Shop Block
    composer_require_file ( COMPOSER_BLOCKS .          '/shop-blocks/shop-block-ajax.php' );