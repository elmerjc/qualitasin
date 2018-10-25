<?php
    class media extends single_blog {
        public function get_media( $format = '', $size = array( 1360, 550 ), $class = '', $hide = array() ) {

            // Empty assignment
            $output = '';

            // Post ID
            $id = get_the_ID();

            // Initialize helper class
            $helpers = new helpers;

            // Standard
            if( 'standard' == $format && !in_array( 'standard', $hide ) ) {

            	// Feature Image ID
            	$image_id = get_post_thumbnail_id();

            	$output .= $this->open( $class );

            		$output .= $helpers->get_image_by_id( $size[0], $size[1], $image_id, 0, 1 );

            	$output .= $this->close();

            }
            else if( 'image' == $format && !in_array( 'image', $hide ) ) {

            	// Feature Image ID
            	$image_id = get_post_thumbnail_id();

            	$output .= $this->open( $class );

            		$output .= $helpers->get_image_by_id( $size[0], $size[1], $image_id, 0, 1 );

            	$output .= $this->close();
            	
            }
            else if( 'gallery' == $format && !in_array( 'gallery', $hide ) ) {

                //Get gallery meta values
                $gallery = json_decode( composer_get_meta_value( $id, '_amz_gallery', '' ) );

                // Empty assignment
                $gallery_item = '';

                if( !empty( $gallery ) ) {

                    foreach( $gallery as $src ){

                        $gallery_item .= $this->open( $class );

                            $gallery_item .= $helpers->get_image_by_id( $size[0], $size[1], $src->itemId, 0, 1 );

                        $gallery_item .= $this->close();
                    }

                    $auto_slide = composer_get_meta_value( $id, '_amz_auto_slide', 'true' );
                    $auto_slide_time = composer_get_meta_value( $id, '_amz_auto_slide_time', '2000' );

                    //Set auto slide value
                    if( $auto_slide == 'true' || is_numeric( $auto_slide ) ){
                        $autoslide = 'data-autoplay="'. esc_attr( $auto_slide ) .'"';
                        $autoslide_time = ' data-autoplay-timeout="'. esc_attr( $auto_slide_time ) .'"';
                    }
                    elseif( $auto_slide == 'false' ){
                        $autoslide = '';
                        $autoslide_time = '';
                    }
                    else{
                        $autoslide = 'data-auto-play= "true"';
                        $autoslide_time = ' data-autoplay-timeout="5000"';
                    }

                    if( !empty( $gallery_item ) ) {
                        $output .= '<div class="single-gallery-carousel owl-carousel" data-nav="true" data-items="1" data-auto-height="true" data-dots="false" '. $autoslide .''. $autoslide_time .' data-transition-style="fade">';

                            $output .= $gallery_item; // it's escaped properly
                        
                        $output .= '</div>';
                    }
                }
                else {
                    // Feature Image ID
                    $image_id = get_post_thumbnail_id();

                    if( $image_id ) {
                        $output .= $this->open( $class );

                            $output .= $helpers->get_image_by_id( $size[0], $size[1], $image_id, 0, 1 );

                        $output .= $this->close();
                    }
                    
                }
            	
            }
            else if( 'audio' == $format && !in_array( 'audio', $hide ) ) {

                //Get audio meta values
                $audio_methods  = composer_get_meta_value( $id, '_amz_audio_methods', 'normal' );
                $audio_normal   = composer_get_meta_value( $id, '_amz_audio_normal', '' );
                $audio_autoplay = composer_get_meta_value( $id, '_amz_audio_autoplay', 'no' );
                $audio_iframe   = composer_get_meta_value( $id, '_amz_audio_iframe', '' );

                //Feature section audio player content
                if( !empty( $audio_normal ) || !empty( $audio_iframe ) ){

                    //Feature section audio player content
                    $output .= $this->open( 'post-audio post-format' );

                        //Audio Normal Section
                        if( 'normal' == $audio_methods ){

                            if( !empty( $audio_normal ) ){

                                $audio_normal = htmlspecialchars_decode( $audio_normal );
                                $audio_arr = json_decode( $audio_normal, true );

                                $aud_sc = '';
                                $aud_sc .= '[audio ';
                                foreach( $audio_arr as $aud ){
                                    $ext = substr( strrchr( $aud['url'],'.' ), 1 );
                                    $aud_sc .= $ext . '="' . esc_url( $aud['url'] ) . '" ';
                                }
                                if( $audio_autoplay == 'y' ){
                                    $aud_sc .= 'autoplay = "autoplay" ';
                                }
                                $aud_sc .= ']';

                                $output .= $this->open( 'post-audio-normal audio' );

                                    $output .= do_shortcode( $aud_sc ); // it's escaped properly

                                $output .= $this->close();

                            }
                        }

                        //Audio Iframe Section
                        if( 'iframe' == $audio_methods ){
                            if( !empty( $audio_iframe ) ){

                                $output .= $this->open( 'post-audio-iframe audio' );

                                    $output .= do_shortcode( $audio_iframe ); // it's escaped properly

                                $output .= $this->close();
                            }
                        }

                    $output .= $this->close();
                }

            }
            else if( 'video' == $format && !in_array( 'video', $hide ) ) {

                //Get video meta values from meta box
                $video_methods  = composer_get_meta_value( $id, '_amz_video_methods', 'normal' );
                $video_normal   = composer_get_meta_value( $id, '_amz_video_normal', '' );
                $poster         = composer_get_meta_value( $id, '_amz_poster', '' );
                $video_autoplay = composer_get_meta_value( $id, '_amz_video_autoplay', 'no' );
                $video_iframe   = composer_get_meta_value( $id, '_amz_video_iframe', '' );

                if( !empty( $video_normal ) || !empty( $video_iframe ) ) {

                    //Feature section video player content
                    $output .= $this->open( 'post-video post-format' );

                        //Video Normal Section
                        if( 'normal' == $video_methods ) {

                            if( !empty( $video_normal ) ) {
                                $video_normal = htmlspecialchars_decode( $video_normal );
                                $vid_arr = json_decode( $video_normal,true );

                                $poster = htmlspecialchars_decode( $poster );
                                $poster = json_decode( $poster,false );
                                $poster = isset( $poster[0]->full ) ? $poster[0]->full : '';

                                $vid_sc = '';
                                $vid_sc .= '[video ';
                                foreach( $vid_arr as $vid ){
                                    $vid_sc .= $vid['format'] . '="' . esc_url( $vid['url'] ) . '" ';
                                }

                                $vid_sc .= 'poster = "' . esc_url( $poster ) . '" ';
                                if( $video_autoplay == 'yes' ){
                                    $vid_sc .= 'autoplay = "autoplay" ';
                                }
                                $vid_sc .= ']';

                                $output .= $this->open( 'post-video-normal video' );

                                    $output .= do_shortcode( $vid_sc ); // it's escaped properly

                                $output .= $this->close();
                            }
                        }

                        //Video Iframe Section
                        if( 'iframe' == $video_methods ) {
                            if( !empty( $video_iframe ) ) {

                                $output .= $this->open( 'post-video-iframe video' );

                                    $output .= do_shortcode( $video_iframe ); // it's escaped properly

                                $output .= $this->close();
                            }
                        }

                    $output .= $this->close();
                }
            	
            }
            else if( 'link' == $format && !in_array( 'link', $hide ) ) {
            	
            }
            else if( 'quote' == $format && !in_array( 'quote', $hide ) ) {
            	
            }
            
            return $output;
        }
    }