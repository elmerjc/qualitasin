<?php
    class blog_blocks {

        public function initialize( $block = 'block1', $options = array(), $post_count, $total_post, $column_count ) {

            return $this->build_blog_blocks( $block, $options, $post_count, $total_post, $column_count );
        }

        public function build_blog_blocks( $block = 'block1', $options = array(), $post_count, $total_post, $column_count ) {
            require_once( COMPOSER_BLOCKS. '/blog-blocks/blocks/'. $block .'.php' );
            $initialize = new $block;
            $output = $initialize->build_blog_post( $block, $options, $post_count, $total_post, $column_count );

            return $output;
        }

        public function blog_modules( $modules = 'module1', $options ) {
            require_once( COMPOSER_BLOCKS. '/blog-blocks/modules/'. $modules .'.php' );
            $initialize = new $modules;
            $output = $initialize->build_module( $options );

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
        public function title( $class = '', $tag = 'h2', $title_length = 20 ) {

            $classes =  !empty( $class ) ? ' class="'. esc_attr( $class ).'"' : '';

            $post_title = $this->shorten_text( get_the_title(), $title_length );

            return '<'. $tag .$classes .'><a href="'. esc_url( get_permalink() ) .'">'. esc_html( $post_title ) .'</a></'. $tag .'>';
        }

        //Blog Title
        public function content( $class = array(), $show_description = 'yes', $limit = '' ) {
            $classes =  !empty( $class ) ? ' class="'. esc_attr( $class ).'"' : '';

            $content = $this->shorten_text( get_the_excerpt(), $limit );

            // Empty assignment
            $output = '';

            if( 'yes' == $show_description ) {
                $output .= '<p' . $classes .'>'. esc_html( $content ) .'</p>';
            }           

            return $output;
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

        // Return shorten text
        public function shorten_text( $text, $limit ) {
            $chars_text = strlen( $text );
            $text = $text . ' ';
            $text = substr( $text, 0, $limit );
            $text = substr( $text, 0, strrpos( $text, ' ' ) );
            if ( $chars_text > $limit ) {
                $text = $text . '...';
            }
            return $text;
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

        // Blog Category
        public function blog_category( $style = '', $show_category = 'yes' ) {

            // Empty assignment
            $output = '';
            if( 'yes' == $show_category ) {
                $category = get_the_category();
                if( !empty( $category ) ) {
                    $output .= '<div class="block-category '. esc_attr( $style ) .'"><a href="' . esc_url( get_category_link( $category[0]->term_id ) ) .'">'. esc_html( $category[0]->cat_name ) .'</a></div>';
                }
            }

            return $output;
        }

        // Blog Blocks Button
        public function button( $style = '', $show_button = 'yes', $btn_text = 'Read More' ) {

            // Empty assignment
            $output = '';
            if( 'yes' == $show_button ) {
                $output .= '<div class="block-button"><a href="' . esc_url( get_permalink() ) .'" class="clear '. esc_attr( $style ) .' btn btn-solid btn-hover-outline btn-oval  btn-front btn-sm color btn-hover-color">'. esc_html( $btn_text ) .'</a></div>';
            }

            return $output;
        }

        // Blog Blocks Meta
        public function blog_meta( $meta = array( 'show_author' => 'no', 'show_date' => 'no' ), $meta_prefix = 'yes', $show_meta = 'on_bottom' ) {

            // Empty assignment
            $output = '';

            if( 'on_bottom' == $show_meta || 'on_top' == $show_meta ) {
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

        // Blog Blocks Share
        public function blog_share( $style = '', $show_share = 'yes', $share = array() ) {

            // Empty assignment
            $output = $social_share = '';

            if( 'yes' == $show_share ) {
                $url = get_permalink();

                $share = !empty( $share ) ? explode( ',', $share ) : array( 'facebook', 'twitter', 'gplus', 'linkedin','pinterest' );

                foreach ( $share as $key => $value ) {
                    $value = trim( $value );
                    if( 'facebook' == $value ) {
                        $social_share .= '<a href="'. esc_url( 'https://www.facebook.com/sharer/sharer.php?u='.$url ) .'" target="_blank" class="facebook pixicon-facebook" ></a>';
                    }

                    if( 'twitter' == $value ) {
                        $social_share .= '<a href="'. esc_url( 'https://twitter.com/home?status='.$url ) .'" target="_blank" class="twitter pixicon-twitter"></a>';
                    }

                    if( 'gplus' == $value ) {
                        $social_share .= '<a href="'. esc_url( 'https://plus.google.com/share?url='.$url ) .'" target="_blank" class="gplus pixicon-gplus"></a>';
                    }

                    if( 'linkedin' == $value ) {
                        $social_share .= '<a href="'. esc_url( 'https://www.linkedin.com/cws/share?url='.$url ) .'" target="_blank" class="linkedin pixicon-linked-in"></a>';
                    }

                    if( 'pinterest' == $value ) {
                        $social_share .= '<a href="'. esc_url('https://pinterest.com/pin/create/button/?url='.$url.'&description='. esc_html( get_the_title() ) ) .'" target="_blank" class="pinterest pixicon-pinterest"></a>';
                    }

                    
                }

                if( !empty( $social_share ) ) {
                    $output .= '<div class="social-share '. esc_attr( $style ) .'"><a href="'. esc_url('#') .'" target="_blank" class="share-bg pixicon-basic-share"></a>'. $social_share .'</div>';
                }
            }

            return $output;
        }

        // Get proper modules for blocks
        public function get_modules( $block = 'block1' ) {

            switch ( $block ) {

                // Block 1
                case 'block1':
                    $modules = array( 'module1' );
                break;

                // Block 2
                case 'block2':
                    $modules = array( 'module2', 'module3' );
                break;

                // Block 3
                case 'block3':
                    $modules = array( 'module2' );
                break;

                // Block 4
                case 'block4':
                    $modules = array( 'module4' );
                break;

                // Block 5
                case 'block5':
                    $modules = array( 'module4', 'module3' );
                break;

                // Block 6
                case 'block6':
                    $modules = array( 'module3' );
                break;

                // Block 7
                case 'block7':
                    $modules = array( 'module5' );
                break;

                // Block 8
                case 'block8':
                    $modules = array( 'module6', 'module3' );
                break;

                // Block 9
                case 'block9':
                    $modules = array( 'module6', 'module7' );
                break;

                // Block 10
                case 'block10':
                    $modules = array( 'module8' );
                break;

                default:
                break;
            }

            return $modules;
        }



        // Return Number of items for blocks
        public function get_post_count( $block = 'block1', $column = 'col1' ) {
            switch ( $block ) {

                // Block 1
                case 'block1':
                    $count = array( '0' => 3 );
                break;

                // Block 2
                case 'block2':
                    if( 'col1' == $column ) {
                        $count = array( '0' => 3 );
                    }
                    elseif( 'col2' == $column ) {
                        $count = array( '0' => 1, '1' => 3 );
                    }
                    elseif( 'col3' == $column ) {
                        $count = array( '0' => 1, '1' => 3, '2' => 3 );
                    }
                break;

                // Block 3
                case 'block3':
                    if( 'col1' == $column ) {
                        $count = array( '0' => 2 );
                    }
                    elseif( 'col2' == $column ) {
                        $count = array( '0' => 2, '1' => 2 );
                    }
                    elseif( 'col3' == $column ) {
                        $count = array( '0' => 1, '1' => 1, '2' => 1 );
                    }
                break;

                // Block 4
                case 'block4':
                    if( 'col1' == $column ) {
                        $count = array( '0' => 2 );
                    }
                    elseif( 'col2' == $column ) {
                        $count = array( '0' => 2, '1' => 2 );
                    }
                    elseif( 'col3' == $column ) {
                        $count = array( '0' => 1, '1' => 1, '2' => 1 );
                    }
                break;

                // Block 5
                case 'block5':
                    if( 'col1' == $column ) {
                        $count = array( '0' => 3 );
                    }
                    elseif( 'col2' == $column ) {
                        $count = array( '0' => 1, '1' => 5 );
                    }
                    elseif( 'col3' == $column ) {
                        $count = array( '0' => 1, '1' => 5, '2' => 5 );
                    }
                break;

                // Block 6
                case 'block6':
                    if( 'col1' == $column ) {
                        $count = array( '0' => 3 );
                    }
                    elseif( 'col2' == $column ) {
                        $count = array( '0' => 3, '1' => 3 );
                    }
                    elseif( 'col3' == $column ) {
                        $count = array( '0' => 3, '1' => 3, '2' => 3 );
                    }
                break;

                // Block 7
                case 'block7':
                    if( 'col1' == $column ) {
                        $count = array( '0' => 3 );
                    }
                    elseif( 'col2' == $column ) {
                        $count = array( '0' => 3, '1' => 3 );
                    }
                    elseif( 'col3' == $column ) {
                        $count = array( '0' => 3, '1' => 3, '2' => 3 );
                    }
                break;

                // Block 8
                case 'block8':
                    if( 'col1' == $column ) {
                        $count = array( '0' => 3 );
                    }
                    elseif( 'col2' == $column ) {
                        $count = array( '0' => 1, '1' => 1 );
                    }
                    elseif( 'col3' == $column ) {
                        $count = array( '0' => 1, '1' => 1, '2' => 1 );
                    }
                break;

                // Block 9
                case 'block9':
                    if( 'col1' == $column ) {
                        $count = array( '0' => 2 );
                    }
                    elseif( 'col2' == $column ) {
                        $count = array( '0' => 2, '1' => 2 );
                    }
                    elseif( 'col3' == $column ) {
                        $count = array( '0' => 1, '1' => 1, '2' => 1 );
                    }
                break;

                // Block 10
                case 'block10':
                    $count = array( '0' => 3 );
                break;
                
                default:
                break;
            }
            return $count;
        }

    }

    // Required Files

    // Blog Block Shortcode
    composer_require_file ( COMPOSER_BLOCKS .          '/blog-blocks/blog-block-shortcode.php' );

    // Blog Block Extend Vc
    composer_require_file ( COMPOSER_BLOCKS .          '/blog-blocks/blog-block-vc.php' );

    // Ajax Blog Block
    composer_require_file ( COMPOSER_BLOCKS .          '/blog-blocks/blog-block-ajax.php' );