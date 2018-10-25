<?php
    class grid_blog_blocks {

        public function initialize( $block = 'grid_block1', $options = array(), $post_count, $total_post ) {
            return $this->build_grid_blog_blocks( $block, $options, $post_count, $total_post );
        }

        public function build_grid_blog_blocks( $block = 'grid_block1', $options = array(), $post_count, $total_post ) {
            require_once( COMPOSER_BLOCKS. '/grid-blog-blocks/blocks/grid-blog-block.php' );
            $initialize = new grid_blog_block;
            $output = $initialize->build_grid_blog_post( $block, $options, $post_count, $total_post );

            return $output;
        }

        public function grid_blog_modules( $style = 'style1', $options, $size ) {
            require_once( COMPOSER_BLOCKS. '/grid-blog-blocks/style/'. $style .'.php' );
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

        // Blog Blocks Meta
        public function blog_meta( $meta = array( 'show_author' => 'no', 'show_date' => 'no' ), $meta_prefix = 'yes', $show_meta = 'yes' ) {

            // Empty assignment
            $output = '';

            if( 'yes' == $show_meta ) {
                $output .= '<div class="block-meta">';
                    foreach ( $meta as $key => $value ) {
                        if( $key == 'author' && $value == 'yes' ) {
                            // Author Link
                            global $post;
                            $author_id = $post->post_author;
                            $output .= '<span class="author-name">';

                                if( 'yes' == $meta_prefix ) {
                                    $output .= esc_html__( 'By ', 'composer' );
                                }

                                $output .= '<a href="'. esc_url( get_the_author_posts_link() ) .'">' . esc_html( get_the_author_meta( 'display_name', $author_id ) ) .'</a>';

                            $output .= '</span>';
                        }
                        elseif( $key == 'date' && $value == 'yes' ) {
                            // Date
                            $output .= '<span class="date">';
                                if( 'yes' == $meta_prefix ) {
                                    $output .= esc_html__( 'On ', 'composer' );
                                }
                                $output .= esc_html( get_the_time( get_option( 'date_format' ) ) );
                            $output .= '</span>';
                        }
                    }

                $output .= '</div>';
            }

            return $output;
        }

        // Post Format Icon
        public function post_format_icon( $style = '', $show_post_format_icon = 'yes' ) {

            // Empty assignment
            $output = $icon = '';

            if( 'yes' == $show_post_format_icon ) {
                //Post Format
                $format = get_post_format();

                if( 'image' == $format ) {
                    $icon = 'pixicon-image';
                }
                elseif( 'gallery' == $format ) {
                    $icon = 'pixicon-images';
                }
                elseif( 'link' == $format ) {
                    $icon = 'pixicon-link-2';
                }
                elseif( 'quote' == $format ) {
                    $icon = 'pixicon-quote';
                }
                elseif( 'audio' == $format ) {
                    $icon = 'pixicon-audio';
                }
                elseif( 'video' == $format ) {
                    $icon = 'pixicon-video';
                }
                else {
                    $icon = 'pixicon-pinned';
                }

                $output .= '<div class="post-format-icon '. esc_attr( $style ) .'"><i class="'. esc_attr( $icon ) .'"></i></div>';
            }

            return $output;
        }

        public function category( $show_category = 'yes' ) {

            // Empty assignment
            $output = '';

            if( 'yes' == $show_category ) {
                $category = get_the_category();
                if( !empty( $category ) ) {
                    $output .= '<div class="grid-block-category"><a href="' . esc_url( get_category_link( $category[0]->term_id ) ) .'">'. esc_html( $category[0]->cat_name ) .'</a></div>';
                }
            }

            return $output;
        }

        // Return Image size for blog items
        public function get_image_size( $block = 'grid_block1', $post_count ) {

            switch ( $block ) {

                // Grid Blog Block 1
                case 'grid_block1':
                    if( 1 == $post_count || 8 == $post_count  ) {
                        $size = array( 'width' => 600, 'height' => 600 );
                    }
                    else {
                        $size = array( 'width' => 300, 'height' => 300 );
                    }
                break;

                // Grid Blog Block 2
                case 'grid_block2':
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

                // Grid Blog Block 3
                case 'grid_block3':
                    if( 1 == $post_count ) {
                        $size = array( 'width' => 600, 'height' => 700 );
                    }
                    else {
                        $size = array( 'width' => 300, 'height' => 350 );
                    }
                break;

                // Grid Blog Block 4
                case 'grid_block4':
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

                // Grid Blog Block 5
                case 'grid_block5':
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

                // Grid Blog Block 6
                case 'grid_block6':
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

                // Grid Blog Block 7
                case 'grid_block7':
                    if( 5 == $post_count ) {
                        $size = array( 'width' => 600, 'height' => 600 );
                    }
                    else {
                        $size = array( 'width' => 300, 'height' => 300 );
                    }
                break;

                // Grid Blog Block 8
                case 'grid_block8':
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

                // Grid Blog Block 9
                case 'grid_block9':
                    if( 4 == $post_count || 5 == $post_count ) {
                        $size = array( 'width' => 300, 'height' => 700 );
                    }
                    else {
                        $size = array( 'width' => 300, 'height' => 350 );
                    }
                break;

                // Grid Blog Block 10
                case 'grid_block10':
                    if( 1 == $post_count || 4 == $post_count || 5 == $post_count || 6 == $post_count) {
                        $size = array( 'width' => 600, 'height' => 500 );
                    }
                    else {
                        $size = array( 'width' => 300, 'height' => 400 );
                    }
                break;

                // Grid Blog Block 11
                case 'grid_block11':
                    if( 1 == $post_count || 7 == $post_count ) {
                        $size = array( 'width' => 600, 'height' => 700 );
                    }
                    else {
                        $size = array( 'width' => 300, 'height' => 350 );
                    }
                break;

                // Grid Blog Block 12
                case 'grid_block12':
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
        public function get_column_class( $block = 'grid_block1', $post_count ) {

            switch ( $block ) {

                // Grid Block 1
                case 'grid_block1':
                    if( 1 == $post_count || 8 == $post_count  ) {
                        $class = 'vc_col-sm-6';
                    }
                    else {
                        $class = 'vc_col-sm-3';
                    }
                break;

                // Grid Block 2
                case 'grid_block2':
                    if( 3 == $post_count || 4 == $post_count ) {
                        $class = 'vc_col-sm-6';
                    }
                    else {
                        $class = 'vc_col-sm-3';
                    }
                break;

                // Grid Block 3
                case 'grid_block3':
                    if( 1 == $post_count ) {
                        $class = 'vc_col-sm-6';
                    }
                    else {
                        $class = 'vc_col-sm-3';
                    }
                break;

                // Grid Block 4
                case 'grid_block4':
                    if( 2 == $post_count || 5 == $post_count ) {
                        $class = 'vc_col-sm-6';
                    }
                    else {
                        $class = 'vc_col-sm-3';
                    }
                break;

                // Grid Block 5
                case 'grid_block5':
                    if( 1 == $post_count || 4 == $post_count ) {
                        $class = 'vc_col-sm-6';
                    }
                    else {
                        $class = 'vc_col-sm-3';
                    }
                break;

                // Grid Block 6
                case 'grid_block6':
                    if( 1 == $post_count || 10 == $post_count ) {
                        $class = 'vc_col-sm-6';
                    }
                    else {
                        $class = 'vc_col-sm-3';
                    }
                break;

                // Grid Block 7
                case 'grid_block7':
                    if( 5 == $post_count ) {
                        $class = 'vc_col-sm-6';
                    }
                    else {
                        $class = 'vc_col-sm-3';
                    }
                break;

                // Grid Block 8
                case 'grid_block8':
                    if( 3 == $post_count || 4 == $post_count ) {
                        $class = 'vc_col-sm-6';
                    }
                    else {
                        $class = 'vc_col-sm-3';
                    }
                break; 

                // Grid Block 9
                case 'grid_block9':
                    $class = 'vc_col-sm-3';
                break;

                // Grid Block 10
                case 'grid_block10':
                    if( 1 == $post_count || 4 == $post_count || 5 == $post_count || 6 == $post_count) {
                        $class = 'vc_col-sm-6';
                    }
                    else {
                        $class = 'vc_col-sm-3';
                    }
                break;

                // Grid Block 11
                case 'grid_block11':
                    if( 1 == $post_count || 7 == $post_count ) {
                        $class = 'vc_col-sm-6';
                    }
                    else {
                        $class = 'vc_col-sm-3';
                    }
                break;

                // Grid Block 12
                case 'grid_block12':
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
        public function get_post_count( $block = 'grid_block1' ) {
            switch ( $block ) {

                // Grid Block 1
                case 'grid_block1':
                    $count = 10;
                break;

                // Grid Block 2
                case 'grid_block2':
                    $count = 9;
                break;

                // Grid Block 3
                case 'grid_block3':
                    $count = 9;
                break;

                // Grid Block 4
                case 'grid_block4':
                    $count = 7;
                break;

                // Grid Block 5
                case 'grid_block5':
                    $count = 8;
                break;

                // Grid Block 6
                case 'grid_block6':
                    $count = 11;
                break;

                // Grid Block 7
                case 'grid_block7':
                    $count = 9;
                break;

                // Grid Block 8
                case 'grid_block8':
                    $count = 8;
                break;

                // Grid Block 9
                case 'grid_block9':
                    $count = 10;
                break;

                // Grid Block 10
                case 'grid_block10':
                    $count = 8;
                break;

                // Grid Block 11
                case 'grid_block11':
                    $count = 14;
                break;

                // Grid Block 12
                case 'grid_block12':
                    $count = 7;
                break;
                
                default:
                break;
            }
            return $count;
        }

    }

    // Required Files

    // Grid Blog Block Shortcode
    composer_require_file ( COMPOSER_BLOCKS .          '/grid-blog-blocks/grid-blog-block-shortcode.php' );

    // Grid Blog Block Extend Vc
    composer_require_file ( COMPOSER_BLOCKS .          '/grid-blog-blocks/grid-blog-block-vc.php' );

    // Ajax Grid Blog Block
    composer_require_file ( COMPOSER_BLOCKS .          '/grid-blog-blocks/grid-blog-block-ajax.php' );