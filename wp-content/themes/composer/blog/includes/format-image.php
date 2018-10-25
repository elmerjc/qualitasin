<?php

	$prefix = ( isset($_POST['values'] ) ) ? $_POST['values']['prefix'] : composer_get_prefix();

    /*
     * Blog Post Format: Image
     */

    $type = composer_get_option_value( $prefix.'styles', 'normal' );
    $sidebar_position = composer_get_option_value( $prefix.'sidebar', 'right-sidebar' );

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
	if($type == 'normal'){
		$width = 1140;
		$height = 350;

		if( 'full-width' != $sidebar_position ){
			$width = 848;
			$height = 350;
		}
	}
    
    /*
     * If you want add any blog style top part in image post format, Check condition here
     */

	/*
     * For: Grid, Masonry & Normal
     */

    //Top Section
    echo '<div class="post-standard">';
        echo composer_featured_thumbnail( $width, $height, 0, 0, 1 );
    echo '</div>';


    //Bottom Section

	get_template_part( 'blog/includes/blog', 'entrycontent');

get_template_part( 'blog/loop/blog', 'articleend');
