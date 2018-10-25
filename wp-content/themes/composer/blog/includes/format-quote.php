<?php

	$prefix = ( isset($_POST['values'] ) ) ? $_POST['values']['prefix'] : composer_get_prefix();

    /*
     * Blog Post Format: Quote
     */

    //Get quote meta box values
    $author = composer_get_meta_value( get_the_ID(), '_amz_author', '' );

    //Shorten Blog Content
	$content_limit = composer_get_option_value( $prefix.'content_limit', '90' );
	$content = composer_shorten_text( get_the_excerpt(), $content_limit );

    /*
     * If you want add any blog style top part in link post format, Check condition here
     */ 

    /*
     * For: Grid, Masonry & Normal
     */

    //Top Section
    if( !empty( $content ) && !empty( $author ) ){
	    echo '<div class="post-quote">';
		    if( !empty( $content ) ){
		    	echo '<p>'. esc_html( $content ) .'</p>';
		    }
		    if( !empty( $author ) ){
		    	echo '<span class="quote-author"> &minus;  ' . esc_html( $author ) .'</span>';
		    }
	    echo '</div>';
	}

get_template_part( 'blog/loop/blog', 'articleend'); 
