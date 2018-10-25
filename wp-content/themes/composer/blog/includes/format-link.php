<?php

	$prefix = ( isset($_POST['values'] ) ) ? $_POST['values']['prefix'] : composer_get_prefix();

    /*
     * Blog Post Format: Link
     */

    //Get link meta box values
    $link = composer_get_meta_value( get_the_ID(), '_amz_link', '' );

    //Shorten Blog Title
    $title_limit = composer_get_option_value( $prefix.'title_limit', '20' );
    $post_title = composer_shorten_text( get_the_title(), $title_limit );

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
    echo '<div class="post-link">';
    	echo '<h3 class="title">'. esc_html( $post_title ) .'</h3>';

	    if( !empty( $content ) ){
	    	echo '<p>'. esc_html( $content ) .'</p>';
	    }
	    if ( !empty( $link ) ) {
	    	echo '<a href="'.esc_url( $link ).'" class="link-post">'.esc_html( $link ).'</a>';
	    }
    echo '</div>';


    //Bottom Section

	//get_template_part( 'blog/includes/blog', 'entrycontent');

get_template_part( 'blog/loop/blog', 'articleend'); 
