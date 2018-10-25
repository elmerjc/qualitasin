<?php

	$prefix = ( isset($_POST['values'] ) ) ? $_POST['values']['prefix'] : composer_get_prefix();

    /*
     * Blog Post Format: Gallery
     */

    //Get gallery meta values
    $gallery = json_decode( composer_get_meta_value( get_the_ID(), '_amz_gallery', '' ) );
    $gallery_auto_slide = composer_get_meta_value( get_the_ID(), '_amz_auto_slide', 'true' );
    $gallery_auto_slide_time = composer_get_meta_value( get_the_ID(), '_amz_auto_slide_time', '5000' );

    $type = composer_get_option_value( $prefix.'styles', 'normal' );
    $sidebar_position = composer_get_option_value( $prefix.'sidebar', 'right-sidebar' );

    //Set gallery image width and height here, If you want to modify width or height in particular styles check condition here

    /*
     * For: Grid & Masonry
     */

    if( $type == 'grid' || $type == 'masonry' ){
    	$width = 282;
    	$height = 200;
	}

	/*
     * For: Normal Style
     */
	if( $type == 'normal' ){
		$width = 1140;
		$height = 350;

		if( 'full-width' != $sidebar_position ){
			$width = 892;
			$height = 350;
		}
	}
    	
    /*
     * If you want add any blog style top part in gallery post format, Check condition here
     */

    /*
     * For: Grid, Masonry & Normal
     */

    //Top Section
    if( !empty( $gallery ) || has_post_thumbnail() ){
	    echo '<div class="post-gallery">';

	    	//Gallery Section
		    if( !empty( $gallery ) ) {

		    	$slider_data = 'data-items="1" data-loop="false" data-margin="0" data-center="false" data-stage-padding="0" data-start-position="0" data-dots="false" data-touch-drag="true" data-mouse-drag="true" data-autoplay-hover-pause="true" data-nav="true" data-autoplay-timeout="'. esc_attr( $gallery_auto_slide_time ) .'" data-autoplay="'. esc_attr( $gallery_auto_slide ) .'" data-animate-in="false" data-animate-out="false"';

            	echo '<div class="post-format owl-carousel" '. $slider_data .'>'; // $slider_data Already Escaped on above line
	                foreach( $gallery as $src ){
	                	$full_src = composer_get_image_by_id( $width, $height, $src->itemId, 1, 1, 1 );
                        
                        echo '<div class=""><img src="' .  esc_url( $full_src ) . '" alt=""></div>';
	                }
	            echo '</div>'; // owl-carousel
            }
            else if ( has_post_thumbnail() ) {
            	echo composer_featured_thumbnail( $width, $height, 0, 0, 1 );
            }
		echo '</div>';
	}


    //Bottom Section

	get_template_part( 'blog/includes/blog', 'entrycontent');

get_template_part( 'blog/loop/blog', 'articleend');
