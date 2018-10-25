<?php
    
    // Post Format Icon
    if( !function_exists( 'composer_post_format_icon' ) ){
        function composer_post_format_icon( $format = '', $style = '' ) {

            // Empty assignment
            $output = $icon = '';

            if( 'image' == $format ) {
                $icon = 'pixicon-elegant-search';
            }
            elseif( 'gallery' == $format ) {
                $icon = 'pixicon-elegant-search';
            }
            elseif( 'link' == $format ) {
                $icon = 'pixicon-elegant-search';
            }
            elseif( 'quote' == $format ) {
                $icon = 'pixicon-elegant-search';
            }
            elseif( 'audio' == $format ) {
                $icon = 'pixicon-elegant-search';
            }
            elseif( 'video' == $format ) {
                $icon = 'pixicon-elegant-search';
            }
            else {
                $icon = 'pixicon-elegant-search';
            }

            $output .= '<div class="post-format-icon '. esc_attr( $style ) .'"><i class="'. esc_attr( $icon ) .'"></i></div>';

            return $output;
        }
    }

    // Blog Blocks Category
    if( !function_exists( 'composer_blog_blocks_category' ) ){
        function composer_blog_blocks_category( $style = '' ) {

            // Empty assignment
            $output = '';

            $category = get_the_category();
            if( !empty( $category ) ) {
                $output .= '<div class="block-category '. esc_attr( $style ) .'"><a href="' . esc_url( get_category_link( $category[0]->term_id ) ) .'">'. esc_html( $category[0]->cat_name ) .'</a></div>';
            }

            return $output;
        }
    }

    // Blog Blocks Meta
    if( !function_exists( 'composer_blog_blocks_meta' ) ){
        function composer_blog_blocks_meta( $meta = 'author' ) {

            // Empty assignment
            $output = '';

            if( 'author' == $meta ) {
                global $post;
                $author_id = $post->post_author;
                $output .= '<div class="meta">';
                    $output .= '<p class="author-name">'.
                        esc_html__( 'By ', 'composer' ) .
                        '<a href="'. esc_url( get_the_author_posts_link() ) .'">' .
                        esc_html( get_the_author_meta( 'display_name', $author_id ) ) .
                        '</a>
                    </p>';
                $output .= '</div>';
            }
            elseif( 'date' == $meta ) {
                global $post;
                $author_id = $post->post_author;
                $output .= '<div class="meta">';
                    $output .= '<p class="date">'. esc_html( get_the_time( get_option( 'date_format' ) ) ) .'</p>';
                $output .= '</div>';
            }


            return $output;
        }
    }

    // Blog Blocks Share
    if( !function_exists( 'composer_blog_blocks_share' ) ){
        function composer_blog_blocks_share( $style = '', $share = array() ) {

            // Empty assignment
            $output = $social_share = '';
            $url = get_permalink();

            foreach ( $share as $key => $value ) {
                $value = trim( $value );
                if( 'facebook' == $value ) {
                    $social_share .= '<a href="'. esc_url( 'https://www.facebook.com/sharer/sharer.php?u='.$url ) .'" target="_blank" class="facebook"><i class="pixicon-elegant-search"></i></a>';
                }

                if( 'twitter' == $value ) {
                    $social_share .= '<a href="'. esc_url( 'https://twitter.com/home?status='.$url ) .'" target="_blank" class="twitter"><i class="pixicon-elegant-search"></i></a>';
                }

                if( 'gplus' == $value ) {
                    $social_share .= '<a href="'. esc_url( 'https://plus.google.com/share?url='.$url ) .'" target="_blank" class="gplus"><i class="pixicon-elegant-search"></i></a>';
                }

                if( 'gplus' == $value ) {
                    $social_share .= '<a href="'. esc_url( 'https://www.linkedin.com/cws/share?url='.$url ) .'" target="_blank" class="linkedin"><i class="pixicon-elegant-search"></i></a>';
                }
            }

            if( !empty( $social_share ) ) {
                $output .= '<div class="social-share">'. $social_share .'</div>';
            }

            return $output;
        }
    }

    //Like Comment Link
    if( !function_exists( 'composer_like_comment_link' ) ){

        function composer_like_comment_link( $like, $comment, $link ){

            $like_count = get_post_meta( get_the_ID(), '_pix_like_me', true );
            $like_class = ( isset($_COOKIE['pix_like_me_'. get_the_ID()])) ? 'liked' : '';
            if($like_count == ''){
                $like_count = 0;
            }
            
            if( 'show' === $like || 'show' === $comment || 'show' === $link ){
                $output = '<div class="pix-recent-meta">';
                    if( 'show' === $like ){
                        $output .= '<a href="#void" class="pix-like-me '. esc_attr( $like_class ) .'" data-id="'. esc_attr( get_the_ID() ) .'"><i class="pixicon-heart-2"></i><span class="like-count">'. esc_html( $like_count ) .'</span></a>';
                    }
                    if( 'show' === $comment ){
                        $output .= '<a href="'. esc_url( get_comments_link() ).'">';
                            $output .= '<span class="pix-blog-comments">';
                                $output .= '<i class="pixicon-comments"></i>';
                                $output .= '<span>'. esc_html( get_comments_number() ) .'</span>'; //comments_number( '0', '1', '%' )
                            $output .= '</span>';
                        $output .= '</a>';
                    }
                    if( 'show' === $link ){
                        $output .= '<a href="'. esc_url( get_permalink() ) .'" class="pix-recent-single pull-right"><i class="pixicon-arrow-right"></i></a>';
                    }
                $output .= '</div>';                     
            }

            return $output;
        }
    }

    //Post Category
    if( !function_exists( 'composer_post_category' ) ){

        function composer_post_category( $type = 'single' ){ //single or multiple
            $output = '';
            if( $type == 'single' ){
                $category = get_the_category();
                if( !empty( $category ) ) {
                    $output = '<p class="category"><a href="' . esc_url( get_category_link( $category[0]->term_id ) ) .'">'. esc_html( $category[0]->cat_name ) .'</a></p>';
                }
            }
            else{
                $category = get_the_category_list(', ');
                if( !empty( $category ) ) {
                    $output = '<p class="category">'. $category .'</p>';
                }
                
            }

            return $output;
        }
    }
    
    if( !function_exists( 'composer_single_blog_meta' ) ){
        function composer_single_blog_meta( $date = 'show' , $like = 'show' , $comment = 'show' ){

            global $smof_data;

            //Sidebar position
            $sidebar_position = composer_get_option_value( 'single_sidebar', 'right-sidebar' );

            if( $sidebar_position == 'right-sidebar' ){
                $meta_class = 'right';
            }
            else{
                $meta_class = 'left';
            }

            if( 'show' === $date || 'show' === $like || 'show' === $comment ){
                echo '<div class="post-author '.$meta_class.'">';
                    global $post;
                    $author_id = $post->post_author;
                    echo '<div class="author-img">';
                        echo get_avatar( $author_id, '65' );
                    echo '</div>';
                    echo '<p class="author-name">'. esc_html( get_the_author_meta( 'display_name', $author_id ) ) .'</p>';

                    if( 'show' === $date){
                        echo '<p class="date">'. esc_html( get_the_time( get_option('date_format') ) ) .'</p>';
                    }

                    if( 'show' === $like || 'show' === $comment ){
                        echo '<p class="like-comment">';
                            $like_count = get_post_meta( $post->ID, '_pix_like_me', true );
                            $like_class = ( isset($_COOKIE['pix_like_me_'. $post->ID])) ? 'liked' : '';

                            if($like_count == ''){
                                $like_count = 0;
                            }

                            if( 'show' === $like){
                                echo '<a href="#void" class="pix-like-me '. esc_attr( $like_class ) .'" data-id="'. esc_attr( get_the_ID() ) .'"><i class="pixicon-heart-2"></i><span class="like-count">'. esc_html( $like_count ) .'</span></a>';
                            }
                            if( 'show' === $comment) { 
                                echo '<a href="'. esc_url( get_comments_link( $post->ID ) ).'">';
                                    echo '<span class="pix-blog-comments">';
                                        echo '<i class="pixicon-comments"></i>';
                                        esc_html( comments_number( '0', '1', '%' ) );
                                    echo '</span>';
                                echo '</a>';                                
                            }
                        echo '</p>';
                    }
                    
                echo '</div>';
            }
        }
        
    }

    // Search Form
    function composer_wpsearch( $form ) {

        $search_text = composer_get_option_value( 'search_text', esc_html__( 'Search', 'composer' ) );

        $form = '<form method="get" class="searchform" action="' . esc_url( home_url( '/' ) ) . '" >
            <input type="text" value="' . esc_attr( get_search_query() ) . '" name="s" class="s" placeholder="' . esc_attr( $search_text ) . '" />
            <button type="submit" class="searchsubmit"></button>
        </form>';
        return $form;
    }

//Comment Layout
function composer_comments( $comment, $args, $depth ) {
    $GLOBALS['comment'] = $comment; ?>
    <li id="comment-<?php esc_attr( comment_ID() ); ?>" <?php comment_class('cf'); ?>>
        <article class="cf">
            <header class="comment-author vcard">

                <?php 
                    $comment_author_email = get_comment_author_email();
                    echo get_avatar( $comment_author_email, 65 );
                ?>
            </header>

            <?php if ($comment->comment_approved == '0') : ?>
                <div class="alert alert-info">
                    <p><?php esc_html_e( 'Your comment is awaiting moderation.', 'composer' ) ?></p>
                </div>
            <?php endif; ?>

            <section class="comment_content cf">
                <div class="comment_author_details">
                    <?php printf( '<cite class="fn">%1$s</cite> %2$s', get_comment_author_link(), edit_comment_link(esc_html__( 'Edit', 'composer' ),'  ','') ) ?>

                    <time datetime="<?php echo esc_attr( comment_time('Y-m-j') ); ?>"><a href="<?php echo esc_url( htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ); ?>"><?php comment_time( esc_html__( 'F jS, Y', 'composer' ) ); ?> </a></time>
                </div>

                <?php comment_text() ?>

                <?php comment_reply_link( array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ) ?>
            </section>
     
        </article>
  <?php // </li> is added by WordPress automatically 

}

function composer_excerpt_more($more) {
        return '...';
    }
add_filter('excerpt_more', 'composer_excerpt_more');

//New Excerpt
function composer_excerpt_length( $length ) {  

    $prefix = ( isset($_POST['values'] ) ) ? $_POST['values']['prefix'] : composer_get_prefix();

    //Shorten Blog Content
    $content_limit = composer_get_option_value( $prefix.'content_limit', '40' );
    
    return $content_limit;
}
add_filter( 'excerpt_length', 'composer_excerpt_length', 999 );

add_action( 'init', 'composer_update_search_exlude', 99 );

function composer_update_search_exlude() {
    global $wp_post_types;

    //Search Exclude
    $search_exclude = composer_get_option_value( 'search_exclude', '' );

    if( !empty( $search_exclude ) ){
        $array = array();

        foreach ( $search_exclude as $key => $value ) {
            if( $value == 1 ){
                $array [] = $key;
            }
        }

        $arr = array_filter( array_unique( $array ) );
        if( !empty( $arr ) ) {
            foreach ( $arr as $key => $value ) {
                $wp_post_types[$value]->exclude_from_search = true;
            }
        }
    }
}