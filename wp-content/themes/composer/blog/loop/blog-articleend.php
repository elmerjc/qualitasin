<?php
	$prefix = ( isset($_POST['values'] ) ) ? $_POST['values']['prefix'] : composer_get_prefix();
	
	$type = composer_get_option_value( $prefix.'styles', 'normal' );
	
	echo '</article>';

	get_template_part('blog/loop/blog' , 'animationend');

	if( $type == 'masonry' || $type == 'grid' ){

        echo '</div>';
    }

    if( $type != 'masonry' && $type != 'grid' ){
    	echo '</div>'; // load-element
    }
?>