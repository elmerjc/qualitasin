<?php
    class helpers extends single_blog {

        public function caption( $caption = 'disable' ) {

            // Empty assignment
            $output = '';

            if( 'enable' == $caption ) {

                // Caption
                $thumb_img = get_post( get_post_thumbnail_id() );

                $output .= '<p class="caption">'. esc_html( $thumb_img->post_excerpt ) .'</p>';
            }

            return $output;
        }

        public function category( $style = 'style1', $show_category = 'show' ) {

            // Empty assignment
            $output = '';

            if( 'style1' == $style ) {
                // Category
                $category = get_the_category_list( '&ensp;/&ensp;' );
                
                if( 'show' == $show_category ){
                    $output .= '<div class="cats '. esc_attr( $style ) .'"><span class="pull-out uc">'. esc_html__('Categories', 'composer' ) .'</span>' . $category .'</div>'; // it prints wordpress get_the_category_list() function
                }
            }
            else if( 'style2' == $style ) {
                $category = get_the_category();
                if( !empty( $category ) && 'show' == $show_category ) {
                    $output .= '<div class="category '. esc_attr( $style ) .'"><a href="' . esc_url( get_category_link( $category[0]->term_id ) ) .'">'. esc_html( $category[0]->cat_name ) .'</a></div>';
                }
            }
            
            
            return $output;
        }

        public function tags( $style = 'style1', $show_tags = 'show' ) {

            // Empty assignment
            $output = '';

            if( 'style1' == $style ) {

                // Tags
                $tags = get_the_tags();
                
                if( 'show' == $show_tags ){
                    $output .= '<div class="tags '. esc_attr( $style ) .'">';
                        $output .= '<div>';
                            $output .= get_the_tag_list('<p>'. esc_html__( 'Tags:', 'composer' ) .'   ',', ','</p>');
                        $output .= '</div>';
                    $output .= '</div>';
                }
            }            
            
            return $output;
        }

        public function date( $style = 'style1', $show_date = 'show' ) {

            // Empty assignment
            $output = '';
            
            if( 'show' == $show_date ){
                $output .= '<p class="date">'. esc_html( get_the_time( get_option('date_format') ) ) .'</p>';
            }
            
            return $output;
        }

        public function author( $style = 'style1', $show_author = 'show' ) {

            // Empty assignment
            $output = '';
            
            if( 'show' == $show_author ){

                // Author info
                global $post;
                $author_id = $post->post_author;

                $output .= '<div class="author '. esc_attr( $style ) .'">';
                    $output .= '<div class="author-img">';
                        $output .= get_avatar( $author_id, '65' );
                    $output .= '</div>'; // author-img
                    $output .= '<p class="author-name">'. esc_html( 'By ', 'composer' ) . esc_html( get_the_author_meta( 'display_name', $author_id ) ) .'</p>';
                $output .= '</div>'; // author
            }
            
            return $output;
        }

        public function meta( $style = 'style1', $options = array() ){

            // Empty assignment
            $output = '';

            global $post;

            if( 'style1' == $style ) {
                $meta_class = ( 'right-sidebar' == $options['layout'] ) ? 'right' : 'left';

                $output .= '<div class="post-author '. esc_attr( $meta_class ) .'">';

                    // Author info
                    if( 'show' == $options['meta']['author'] ) {
                        $author_id = $post->post_author;
                        $output .= '<div class="author-img">';
                            $output .= get_avatar( $author_id, '65' );
                        $output .= '</div>';
                        $output .= '<p class="author-name">'. esc_html( get_the_author_meta( 'display_name', $author_id ) ) .'</p>';
                    }

                    if( 'show' == $options['meta']['date'] || 'show' == $options['meta']['like'] || 'show' == $options['meta']['comment'] ){

                        if( 'show' == $options['meta']['date'] ){
                            $output .= '<p class="date">'. esc_html( get_the_time( get_option('date_format') ) ) .'</p>';
                        }

                        if( $options['meta']['like'] || $options['meta']['comment'] ){
                            $output .= '<p class="like-comment">';

                                if( 'show' == $options['meta']['like'] ){

                                    $like_count = get_post_meta( $post->ID, '_pix_like_me', true );
                                    $like_class = ( isset($_COOKIE['pix_like_me_'. $post->ID])) ? 'liked' : '';

                                    if($like_count == ''){
                                        $like_count = 0;
                                    }

                                    $output .= '<a href="#void" class="pix-like-me '. esc_attr( $like_class ) .'" data-id="'. esc_attr( get_the_ID() ) .'"><i class="pixicon-heart-2"></i><span class="like-count">'. esc_html( $like_count ) .'</span></a>';
                                }
                                if( 'show' == $options['meta']['comment'] ) {

                                    $output .= '<a href="'. esc_url( get_comments_link( $post->ID ) ).'">';
                                        $output .= '<span class="pix-blog-comments">';
                                            $output .= '<i class="pixicon-comment-1"></i>';
                                            $output .= esc_html( get_comments_number() );
                                        $output .= '</span>';
                                    $output .= '</a>';   

                                }

                            $output .= '</p>';
                        }
                    }

                    // Share
                    $output .= $this->share( 'style1', ' rounded', $options['share'] ); // style, class, show/hide
                    
                $output .= '</div>';
            }

            if( 'style2' == $style ) {

                if( 'show' == $options['meta']['date'] || 'show' == $options['meta']['author'] || 'show' == $options['meta']['comment'] ){

                    $output .= '<div class="post-meta">';

                        if( 'show' == $options['meta']['author'] ){
                            // Author info
                            global $post;
                            $author_id = $post->post_author;
                            $output .= '<p class="author-name">'. esc_html__( 'By ', 'composer' ) . esc_html( get_the_author_meta( 'display_name', $author_id ) ) .'</p>';
                        }

                        if( 'show' == $options['meta']['date'] ){
                            $output .= '<p class="date">'. esc_html( get_the_time( get_option('date_format') ) ) .'</p>';
                        }

                        if( 'show' == $options['meta']['comment'] ) {

                            $output .= '<p class="comment">';

                                $output .= '<a href="'. esc_url( get_comments_link( $post->ID ) ).'">';
                                    $output .= '<span class="pix-blog-comments">';
                                        $output .= '<i class="pixicon-comment-1"></i>';
                                        $output .= esc_html( get_comments_number() );
                                    $output .= '</span>';
                                $output .= '</a>';  

                            $output .= '</p>'; 

                        }
                        
                    $output .= '</div>';
                }
            }

            return $output;
        }

        // Blog Share
        public function share( $style = '', $class = '', $share = array() ) {

            // Empty assignment
            $output = $social_share = '';

            if( 'style1' == $style ) {

                $url = get_permalink();

                foreach ( $share as $key => $value ) {
                    if( 'facebook' == $key ) {
                        $social_share .= '<a href="'. esc_url( 'https://www.facebook.com/sharer/sharer.php?u='.$url ) .'" target="_blank" class="facebook pixicon-facebook" ></a>';
                    }

                    if( 'twitter' == $key ) {
                        $social_share .= '<a href="'. esc_url( 'https://twitter.com/home?status='.$url ) .'" target="_blank" class="twitter pixicon-twitter"></a>';
                    }

                    if( 'gplus' == $key ) {
                        $social_share .= '<a href="'. esc_url( 'https://plus.google.com/share?url='.$url ) .'" target="_blank" class="gplus pixicon-gplus"></a>';
                    }

                    if( 'linkedin' == $key ) {
                        $social_share .= '<a href="'. esc_url( 'https://www.linkedin.com/cws/share?url='.$url ) .'" target="_blank" class="linkedin pixicon-linked-in"></a>';
                    }

                    if( 'pinterest' == $key ) {
                        $social_share .= '<a href="'. esc_url('https://pinterest.com/pin/create/button/?url='.$url.'&description='. esc_html( get_the_title() ) ) .'" target="_blank" class="pinterest pixicon-pinterest"></a>';
                    }
                    
                }

                if( !empty( $social_share ) ) {
                    $output .= '<div class="social-share '. esc_attr( $style . $class ) .'">'. $social_share .'</div>';
                }

            }

            return $output;
        }

        //Related Post
        public function related_post( $style = 'style1', $options = array() ){

            // Empty assignment
            $output = '';
            $slug = array();

            if( !empty( $options['related_post'] ) ) {
                extract( $options['related_post'] );
            }            

            if( 'show' == $show_related_post ){

                if( 'style1' == $style && class_exists( 'Composer_Base_Plugin' ) ){

                    $category = get_the_category();

                    if( !empty( $category ) ) {
                        foreach ( $category as $key => $cat ) {
                            $slug[] = $cat->slug;
                        }
                        $slug = implode( ', ', $slug );
                    }

                    $output .= '<div class="related-post">';
                        $output .= '<h2 class="title pull-out">'. esc_html( $title ).'</h2>';
                            $output .= do_shortcode('[blog show_featured_image="'. esc_attr( $show_featured_image ) .'" columns="'. esc_attr( $columns ) .'" title_length="'. esc_attr( $title_length ) .'" excerpt_length="'. esc_attr( $content_length ) .'" slider="no" no_of_items="'. esc_attr( $items ) .'" insert_type ="category" category="'. esc_attr( $slug ) .'" order_by = "'. esc_attr( $orderby ) .'" order = "'. esc_attr( $order ) .'" show_like="'. esc_attr( $like ) .'" show_comment="'. esc_attr( $comment ) .'" bottom_meta="'. esc_attr( $bottom_meta ) .'"]');

                    $output .= '</div>';
                }
            }

            return $output;
        }

        public function sidebar( $sidebar_name , $default ){

            // Empty assignment
            $output = '';

            if ( is_active_sidebar( $sidebar_name ) ){
                // For printing sidebar in proper method
                ob_start();

                dynamic_sidebar( $sidebar_name );

                $output .= ob_get_clean(); // It prints sidebar
            }
            elseif( $sidebar_name == 0 ){

                if ( is_active_sidebar( $default ) ){
                    // For printing sidebar in proper method
                    ob_start();

                    dynamic_sidebar( $default );

                    $output .= ob_get_clean(); // It prints sidebar
                    
                }
                else{
                    $output .= '<p class="sidebar-info">'. esc_html__('Please active sidebar widget or disable it from theme option.', 'composer' ).'</p>';
                }
            }

            return $output;

        }

        public function get_ad( $class = '', $key = 'ad1', $show_text = 'show' ) {

            // Empty assignment
            $output = '';

            $ad = composer_get_option_value( $key, '' );
            
            if( !empty( $ad ) ){
                $output .= '<div class="'. esc_attr( $class ) .'">';
                    $output .= $ad;
                    if( 'show' == $show_text ) {
                        $output .= '<p>'. esc_html__( 'Advertisement', 'composer' ) .'</p>';
                    }
                $output .= '</div>';
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
                $protocol = is_ssl() ? 'https' : 'http';

                if( $only_src ) {
                    $output = $protocol.'://placehold.it/'.$width.'x'.$height;
                }
                else {
                    $output = '<img src="'.$protocol.'://placehold.it/'.$width.'x'.$height.'" alt="" >';
                }
            }

            return $output;                  

        }

        public function template( $style = 'style1' , $format = 'standard' ){

            // Empty assignment
            $template = '';

            if( 'style1' == $style ) {
                if( 'link' == $format ) {
                    $template = array( 'file' => 'link', 'class' => 'style1_link' );
                }
                else if( 'quote' == $format ) {
                    $template = array( 'file' => 'quote', 'class' => 'style1_quote' );
                }
                else {
                    $template = array( 'file' => 'default', 'class' => 'style1_default' );
                }

            }
            else if( 'style2' == $style ) {
                if( 'link' == $format ) {
                    $template = array( 'file' => 'link', 'class' => 'style2_link' );
                }
                else if( 'quote' == $format ) {
                    $template = array( 'file' => 'quote', 'class' => 'style2_quote' );
                }
                else {
                    $template = array( 'file' => 'default', 'class' => 'style2_default' );
                }

            }
            else if( 'style3' == $style ) {
                if( 'link' == $format ) {
                    $template = array( 'file' => 'link', 'class' => 'style3_link' );
                }
                else if( 'quote' == $format ) {
                    $template = array( 'file' => 'quote', 'class' => 'style3_quote' );
                }
                else {
                    $template = array( 'file' => 'default', 'class' => 'style3_default' );
                }

            }

            return $template;

        }
    }