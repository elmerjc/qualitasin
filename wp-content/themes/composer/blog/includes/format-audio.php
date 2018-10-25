<?php

    /*
     * Blog Post Format: Audio
     */

    //Get audio meta values
    $audio_methods = composer_get_meta_value( get_the_ID(), '_amz_audio_methods', 'normal' );
    $audio_normal = composer_get_meta_value( get_the_ID(), '_amz_audio_normal', '' );
    $audio_autoplay = composer_get_meta_value( get_the_ID(), '_amz_audio_autoplay', 'no' );
    $audio_iframe = composer_get_meta_value( get_the_ID(), '_amz_audio_iframe', '' );

    /*
     * If you want add any blog style top part in audio post format, Check condition here
     */

    /*
     * Grid, Masonry & Normal Style
     */

    //Top Section
    if( !empty( $audio_normal ) || !empty( $audio_iframe ) ){

	    //Feature section audio player content
	    echo '<div class="post-audio post-format">';

	        //Audio Normal Section
	        if( $audio_methods == 'normal' ){

	            if( !empty( $audio_normal ) ){

	                $audio_normal = htmlspecialchars_decode( $audio_normal );
	                $audio_arr = json_decode( $audio_normal,true );

	                $aud_sc = '';
	                $aud_sc .= '[audio ';
	                foreach( $audio_arr as $aud ){
	                    $ext = substr( strrchr( $aud['url'],'.' ),1 );
	                    $aud_sc .= $ext . '="' . esc_url( $aud['url'] ) . '" ';
	                }
	                if( $audio_autoplay == 'y' ){
	                    $aud_sc .= 'autoplay = "autoplay" ';
	                }
	                $aud_sc .= ']';

	                echo '<div class="post-audio-normal audio">'. do_shortcode( esc_html( $aud_sc ) ) .'</div>';

	            }
	        }

	        //Audio Iframe Section
	        if( $audio_methods == 'iframe' ){
	            if( !empty( $audio_iframe ) ){
	                echo '<div class="post-audio-iframe audio">'. do_shortcode( $audio_iframe ) .'</div>'; // $audio_iframe is user can save any audio embed code from other websites, eg: soundcloud that why didn't escape this.
	            }
	        }
	    echo '</div>';
	}


    //Bottom Section

	get_template_part( 'blog/includes/blog', 'entrycontent');

get_template_part( 'blog/loop/blog', 'articleend');
