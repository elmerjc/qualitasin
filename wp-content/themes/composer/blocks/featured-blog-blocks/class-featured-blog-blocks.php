<?php
    class featured_blog_blocks {

        public function initialize( $block = 'featured_block1', $options = array(), $post_count, $total_post ) {
            return $this->build_grid_blog_blocks( $block, $options, $post_count, $total_post );
        }

        public function build_grid_blog_blocks( $block = 'featured_block1', $options = array(), $post_count, $total_post ) {
            require_once( COMPOSER_BLOCKS. '/featured-blog-blocks/blocks/featured-blog-block.php' );
            $initialize = new featured_blog_block;
            $output = $initialize->build_grid_blog_post( $block, $options, $post_count, $total_post );

            return $output;
        }

        public function grid_blog_modules( $style = 'style1', $options, $size ) {
            require_once( COMPOSER_BLOCKS. '/featured-blog-blocks/style/'. $style .'.php' );
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
                    $icon = '';
                }

                if( !empty( $icon ) ) {
                    $output .= '<div class="post-format-icon '. esc_attr( $style ) .'"><i class="'. esc_attr( $icon ) .'"></i></div>';
                }
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
        public function get_image_size( $block = 'featured_block1', $post_count ) {

            switch ( $block ) {

                // Featured Blog Block 1
                case 'featured_block1':
                    if( 1 == $post_count ) {
                        $size = array( 'width' => 600, 'height' => 600 );
                    }
                    else {
                        $size = array( 'width' => 300, 'height' => 300 );
                    }
                break;

                // Featured Blog Block 2
                case 'featured_block2':
                    if( 1 == $post_count ) {
                        $size = array( 'width' => 600, 'height' => 600 );
                    }
                    elseif( 2 == $post_count ) {
                        $size = array( 'width' => 600, 'height' => 300 );
                    }
                    else {
                        $size = array( 'width' => 300, 'height' => 300 );
                    }
                break;

                // Featured Blog Block 3
                case 'featured_block3':
                    $size = array( 'width' => 300, 'height' => 600 );
                break;

                // Featured Blog Block 4
                case 'featured_block4':
                    if( 1 == $post_count ) {
                        $size = array( 'width' => 600, 'height' => 600 );
                    }
                    else {
                        $size = array( 'width' => 300, 'height' => 600 );
                    }
                break;

                // Featured Blog Block 5
                case 'featured_block5':
                    $size = array( 'width' => 600, 'height' => 600 );
                break;

                // Featured Blog Block 6
                case 'featured_block6':
                    if( 1 == $post_count ) {
                        $size = array( 'width' => 800, 'height' => 600 );
                    }
                    else {
                        $size = array( 'width' => 400, 'height' => 200 );
                    }
                break;

                // Featured Blog Block 7
                case 'featured_block7':
                    if( 2 == $post_count ) {
                        $size = array( 'width' => 600, 'height' => 600 );
                    }
                    else {
                        $size = array( 'width' => 300, 'height' => 600 );
                    }
                break;

                // Featured Blog Block 8
                case 'featured_block8':
                    $size = array( 'width' => 400, 'height' => 300 );
                break;

                // Featured Blog Block 9
                case 'featured_block9':
                    if( 1 == $post_count ) {
                        $size = array( 'width' => 600, 'height' => 600 );
                    }
                    else {
                        $size = array( 'width' => 600, 'height' => 300 );
                    }
                break;

                // Featured Blog Block 10
                case 'featured_block10':
                    if( 1 == $post_count ) {
                        $size = array( 'width' => 1200, 'height' => 500 );
                    }
                    else {
                        $size = array( 'width' => 300, 'height' => 300 );
                    }
                break;
                
                default:
                break;
            }

            return $size;

        }

        // Return column class for items
        public function get_column_class( $block = 'featured_block1', $post_count ) {

            switch ( $block ) {

                // Featured Blog Block 1
                case 'featured_block1':
                    if( 1 == $post_count ) {
                        $class = 'vc_col-sm-6';
                    }
                    else {
                        $class = 'vc_col-sm-3';
                    }
                break;

                // Featured Blog Block 2
                case 'featured_block2':
                    if( 1 == $post_count || 2 == $post_count ) {
                        $class = 'vc_col-sm-6';
                    }
                    else {
                        $class = 'vc_col-sm-3';
                    }
                break;

                // Featured Blog Block 3
                case 'featured_block3':
                    $class = 'vc_col-sm-3';
                break;

                case 'featured_block4':
                    if( 1 == $post_count ) {
                        $class = 'vc_col-sm-6';
                    }
                    else {
                        $class = 'vc_col-sm-3';
                    }
                break;

                case 'featured_block5':
                    $class = 'vc_col-sm-6';
                break;

                case 'featured_block6':
                    if( 1 == $post_count ) {
                        $class = 'vc_col-sm-8';
                    }
                    else {
                        $class = 'vc_col-sm-4';
                    }
                break;

                case 'featured_block7':
                    if( 2 == $post_count ) {
                        $class = 'vc_col-sm-6';
                    }
                    else {
                        $class = 'vc_col-sm-3';
                    }
                break;

                case 'featured_block8':
                    $class = 'vc_col-sm-4';
                break;

                case 'featured_block9':
                    $class = 'vc_col-sm-6';
                break;

                case 'featured_block10':
                    if( 1 == $post_count ) {
                        $class = 'vc_col-sm-12';
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
        public function get_post_count( $block = 'featured_block1' ) {
            switch ( $block ) {

                // Featured Blog Block 1
                case 'featured_block1':
                    $count = 5;
                break;

                // Featured Blog Block 2
                case 'featured_block2':
                    $count = 4;
                break;

                // Featured Blog Block 3
                case 'featured_block3':
                    $count = 4;
                break;

                // Featured Blog Block 4
                case 'featured_block4':
                    $count = 3;
                break;

                // Featured Blog Block 5
                case 'featured_block5':
                    $count = 2;
                break;

                // Featured Blog Block 6
                case 'featured_block6':
                    $count = 4;
                break;

                // Featured Blog Block 7
                case 'featured_block7':
                    $count = 3;
                break;

                // Featured Blog Block 8
                case 'featured_block8':
                    $count = 3;
                break;

                // Featured Blog Block 9
                case 'featured_block9':
                    $count = 3;
                break;

                // Featured Blog Block 10
                case 'featured_block10':
                    $count = 5;
                break;
                
                default:
                break;
            }
            return $count;
        }

    }

    // Required Files

    // Featured Blog Block Shortcode
    composer_require_file ( COMPOSER_BLOCKS .          '/featured-blog-blocks/featured-blog-block-shortcode.php' );

    // Featured Blog Block Extend Vc
    composer_require_file ( COMPOSER_BLOCKS .          '/featured-blog-blocks/featured-blog-block-vc.php' );