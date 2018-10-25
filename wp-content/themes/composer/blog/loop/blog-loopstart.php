<?php

    $prefix = ( isset($_POST['values'] ) ) ? $_POST['values']['prefix'] : composer_get_prefix();

    //Blog 
    $type = composer_get_option_value( $prefix.'styles', 'normal' );
    $sidebar_position = composer_get_option_value( $prefix.'sidebar', 'right-sidebar' );

    //Assign blog style column settings
    if( 'full-width' != $sidebar_position ){
        $columns = ' col-md-9 ';
    }
    else{
        $columns = ' col-md-12 ';
    }

    $type = composer_get_option_value( $prefix.'styles', 'normal' );

    $load_class = ( 'masonry' != $type ) ? 'load-container' : '';

    echo '<div id="style-'. esc_attr( $type ) .'" class="blog '. esc_attr( $columns .' '. $sidebar_position .' '. $load_class ) .'">';

        get_template_part( 'blog/loop/blog', 'isotopestart');
?>