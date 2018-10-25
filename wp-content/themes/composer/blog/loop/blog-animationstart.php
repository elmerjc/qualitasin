<?php
    $prefix = ( isset($_POST['values'] ) ) ? $_POST['values']['prefix'] : composer_get_prefix();

    //Get blog animation values from theme option
    $animate = composer_get_option_value( $prefix.'animate', 'enable' );
    $transition = composer_get_option_value( $prefix.'transition', 'fadeInUp' );
    $duration = composer_get_option_value( $prefix.'duration', '500ms' );

    //Assign animation values
    if( 'enable' === $animate ){

        $animate_class = 'pix-animate-cre';
        $delay = '200';

        $slide_transition = isset( $transition ) ? ' data-trans="'. esc_attr( $transition ) .'" ' : '';
        $slide_duration = isset( $duration ) ? ' data-duration="'. esc_attr( $duration ) .'" ' : '';
        $slide_delay = ' data-delay="'. esc_attr( $delay ) .'" ';

        echo '<div class="'. esc_attr( $animate_class ) .'"' . $slide_transition . $slide_duration . $slide_delay.'>'; // variable $slide_transition, $slide_duration, $slide_delay are already escaped on above line 15,16,17 respectively
    }
