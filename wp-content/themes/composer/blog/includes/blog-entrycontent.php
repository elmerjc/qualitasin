<?php

    $prefix = ( isset($_POST['values'] ) ) ? $_POST['values']['prefix'] : composer_get_prefix();

    $type = composer_get_option_value( $prefix.'styles', 'normal' );

    //Shorten Blog Title
    $title_limit = composer_get_option_value( $prefix.'title_limit', '80' );
    $post_title = composer_shorten_text( get_the_title(), $title_limit );

    $caption = composer_get_option_value( $prefix.'caption', 'disable' );
    
    $content_type = composer_get_option_value( $prefix.'content_type', 'excerpt' );

    //Blog Page Meta
    $show_category = composer_get_option_value( $prefix.'category', 'show' );
    $meta_like = composer_get_option_value( $prefix.'meta_like', 'show' );
    $meta_comment = composer_get_option_value( $prefix.'meta_comment', 'show' );
    $single_link = composer_get_option_value( $prefix.'single_link', 'show' );
    $single_link_text = composer_get_option_value( $prefix.'single_link_text', esc_html__( 'Continue Reading...', 'composer' ) );
?>

<?php
    /*
     * If you want add any blog style, Check condition here
     */
?>

<!-- For: Grid & Masonry Style -->

<?php if( $type == 'grid' || $type == 'masonry' ){ ?>

    <div class="entry-content cf content">
        <?php

            $thumb_img = get_post( get_post_thumbnail_id() ); // Get post by ID
            if( 'enable' == $caption && isset( $thumb_img->post_excerpt ) ) {
                echo '<p class="caption">'. esc_html( $thumb_img->post_excerpt ) .'</p>'; // Display Caption
            }
            
            if( 'show' === $show_category ){
                echo composer_post_category('single');  //single or multiple
            }
        
            echo '<h3 class="title"><a href="'. esc_url( get_permalink() ) .'">'. esc_html( $post_title ) .'</a></h3>';
        ?>

        <?php        
  
            if( is_search() ) {

                $content_limit = composer_get_option_value( 'search_content_limit', '40' );

                echo wp_trim_words( do_shortcode( get_the_content() ), $content_limit, '...' );

            } else {

                if ($content_type == 'content') {
                    the_content();
                } else {
                    the_excerpt();                
                }
            } 
            
            echo composer_like_comment_link( $meta_like, $meta_comment, $single_link );
        ?> 
        
    </div>

<?php } ?>

<!-- For: Normal Style -->

<?php if( $type == 'normal' ){ ?>

    <div class="entry-content cf content">
        <?php

            $thumb_img = get_post( get_post_thumbnail_id() ); // Get post by ID
            if( 'enable' == $caption && isset( $thumb_img->post_excerpt ) ) {
                echo '<p class="caption">'. esc_html( $thumb_img->post_excerpt ) .'</p>'; // Display Caption
            }            

            if( 'show' === $show_category ){
                echo composer_post_category('single');  //single or multiple
            }   
        
            echo '<h3 class="title"><a href="'. esc_url( get_permalink() ) .'">'. esc_html( $post_title ) .'</a></h3>';
        ?>

        <?php        

            if( is_search() ) {

                $content_limit = composer_get_option_value( 'search_content_limit', '40' );

                echo wp_trim_words( do_shortcode( get_the_content() ), $content_limit, '...' );

            } else {

                if ($content_type == 'content') {
                    the_content();
                } else {
                    the_excerpt();                
                }
            } 
            
            if( 'show' === $single_link ){
                echo '<div class="link-btn"><a href="'. esc_url( get_permalink() ) .'" class="link-text">'.esc_html( $single_link_text ).'</a></div>';
            }            
        ?> 
        
    </div>
<?php } 
