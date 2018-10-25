<?php

    /*
     * Blog Post Format: Video
     */

    //Get video meta box values
    $video_methods = composer_get_meta_value( get_the_ID(), '_amz_video_methods', 'normal' );
    $video_normal = composer_get_meta_value( get_the_ID(), '_amz_video_normal', '' );
    $poster = composer_get_meta_value( get_the_ID(), '_amz_poster', '' );
    $video_autoplay = composer_get_meta_value( get_the_ID(), '_amz_video_autoplay', 'no' );
    $video_iframe = composer_get_meta_value( get_the_ID(), '_amz_video_iframe', '' );

    /*
     * If you want add any blog style top part in video post format, Check condition here
     */

    /*
     * For: Grid, Masonry & Normal
     */

    //Top Section
    if( !empty( $video_normal ) || !empty( $video_iframe ) ){

    	//Feature section video player content
        echo '<div class="post-format post-video">';

            //Video Normal Section
            if( $video_methods == 'normal' ){

                if( !empty( $video_normal ) ){
                    $video_normal = htmlspecialchars_decode( $video_normal );
                    $vid_arr = json_decode( $video_normal,true );

                    $poster = htmlspecialchars_decode( $poster );
                    $poster = json_decode( $poster,false );

                    $poster = isset( $poster[0]->full ) ? $poster[0]->full : '';


                    $vid_sc = '';
                    $vid_sc .= '[video ';
                    foreach($vid_arr as $vid){
                        $vid_sc .= $vid['format'] . '="' . esc_url( $vid['url'] ) . '" ';
                    }

                    $vid_sc .= 'poster = "' . esc_attr( $poster ) . '" ';
                    if( $video_autoplay == 'yes' ){
                        $vid_sc .= 'autoplay = "autoplay" ';
                    }
                    $vid_sc .= ']';

                    echo '<div class="post-video-normal video">'. do_shortcode( esc_html( $vid_sc ) ) .'</div>';
                }
            }

            //Video Iframe Section
            if( $video_methods == 'iframe' ){
                if( !empty( $video_iframe ) ){
                    echo '<div class="post-video-iframe video">'. $video_iframe .'</div>'; // $video_iframe is user can save any video embed code from other websites, eg: youtube, dailymotion etc that why didn't escape this.
                }
            }

        echo '</div>';
    }


    //Bottom Section

	get_template_part( 'blog/includes/blog', 'entrycontent');
get_template_part( 'blog/loop/blog', 'articleend');
