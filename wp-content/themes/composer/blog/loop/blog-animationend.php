<?php

    $prefix = ( isset($_POST['values'] ) ) ? $_POST['values']['prefix'] : composer_get_prefix();

    //Get blog animation values from theme option
    $animate = composer_get_option_value( $prefix.'animate', 'enable' );

    if( 'enable' === $animate ){
        echo '</div>';
    }
?>