<?php

    $prefix = ( isset($_POST['values'] ) ) ? $_POST['values']['prefix'] : composer_get_prefix();

    $type = composer_get_option_value( $prefix.'styles', 'normal' );
    $sidebar_position = composer_get_option_value( $prefix.'sidebar', 'right-sidebar' );

	//Add isotope and column classes
    if( $type == 'masonry' || $type == 'grid' ){
        $isotope_col = ' col-md-3 ';
        $isotope_element = ' element ';

        if( 'full-width' != $sidebar_position ){
            $isotope_col = ' col-md-4 ';
        }
    }

    if( $type != 'masonry' && $type != 'grid' ){
        echo '<div class="load-element">';
    }

        if( $type == 'masonry' || $type == 'grid' ){

            echo '<div class="load-element '. esc_attr( $isotope_col . $isotope_element ).'">';
        }

            get_template_part('blog/loop/blog' , 'animationstart');

                echo '<article id="post-'. esc_attr( get_the_ID() ).'" class="' . implode(' ',get_post_class( 'post post-container clearfix', get_the_ID() ) ) .'">';
?>