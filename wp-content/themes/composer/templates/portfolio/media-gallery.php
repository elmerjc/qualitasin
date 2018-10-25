<?php

    $prefix = composer_get_prefix();

    $id = get_the_id();

    //Empty Assignment
    $slider_class = $slider_data = '';

    //Assign Image
    $gallery = json_decode( composer_get_meta_value( $id, '_amz_portfolio_gallery' ), true );

    if( !empty( $gallery ) ) { 

        $slider = composer_get_meta_value( $id, '_amz_portfolio_slider', 'yes' );

        if( 'yes' == $slider ) {
            $slides_per_view = composer_get_meta_value( $id, '_amz_slides_per_view', '1' );
            $loop = composer_get_meta_value( $id, '_amz_loop', 'false' );
            $margin = composer_get_meta_value( $id, '_amz_margin', '0' );
            $center = composer_get_meta_value( $id, '_amz_center', 'false' );
            $stage_padding = composer_get_meta_value( $id, '_amz_stage_padding', '0' );
            $start_position = composer_get_meta_value( $id, '_amz_start_position', '0' );
            $pagination = composer_get_meta_value( $id, '_amz_pagination', 'false' );
            $touch_drag = composer_get_meta_value( $id, '_amz_touch_drag', 'true' );
            $mouse_drag = composer_get_meta_value( $id, '_amz_mouse_drag', 'true' );
            $stop_on_hover = composer_get_meta_value( $id, '_amz_stop_on_hover', 'true' );
            $slide_arrow = composer_get_meta_value( $id, '_amz_slide_arrow', 'true' );
            $slide_speed = composer_get_meta_value( $id, '_amz_slide_speed', '5000' );
            $autoplay = composer_get_meta_value( $id, '_amz_autoplay', 'false' );
            $animate_out = composer_get_meta_value( $id, '_amz_animate_out', 'false' );
            $animate_in = composer_get_meta_value( $id, '_amz_animate_in', 'false' );

            $slider_data = 'data-items="'. esc_attr( $slides_per_view ) .'" data-loop="'. esc_attr( $loop ) .'" data-margin="'. esc_attr( $margin ) .'" data-center="'. esc_attr( $center ) .'" data-stage-padding="'. esc_attr( $stage_padding ) .'" data-start-position="'. esc_attr( $start_position ) .'" data-dots="'. esc_attr( $pagination ) .'" data-touch-drag="'. esc_attr( $touch_drag ) .'" data-mouse-drag="'. esc_attr( $mouse_drag ) .'" data-autoplay-hover-pause="'. esc_attr( $stop_on_hover ) .'" data-nav="'. esc_attr( $slide_arrow ) .'" data-autoplay-timeout="'. esc_attr( $slide_speed ) .'" data-autoplay="'. esc_attr( $autoplay ) . '" data-animate-in="'. esc_attr( $animate_in ) .'" data-animate-out="'. esc_attr( $animate_out ) .'"';

            $slider_class = 'owl-carousel';
        }

        // Assign width and height
        $layout = composer_get_meta_value( $id, '_amz_portfolio_layout', 'full_width' );
        if( 'full_width' === $layout ) {

            $width = composer_get_meta_value( $id, '_amz_width', 1200 );
            $height = composer_get_meta_value( $id, '_amz_height', 500 );

            if( 'yes' == $slider ) {
                $width = (int) round( $width / (int) $slides_per_view );
            }
        }
        else {
            
            $width = composer_get_meta_value( $id, '_amz_width', 790 );
            $height = composer_get_meta_value( $id, '_amz_height', 400 );

            if( 'yes' == $slider ) {
                $width = (int) round( $width / (int) $slides_per_view );
            }

        }

        //Assign Image
        echo '<div class="portfolio-img pix-post-gallery '. esc_attr( $slider_class ).'" '. $slider_data .'>';
                                  
            foreach( $gallery as $src ){

                echo '<div class="portfolio-image-gallery">';
                    echo composer_get_image_by_id( (int)$width, (int)$height, $src['itemId'], 0, 0, 1 );
                echo '</div>';
            }

        echo '</div>';
    }
?>