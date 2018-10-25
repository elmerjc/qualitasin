<?php 
    get_header();

    $prefix = composer_get_prefix();

    //Slider    
    $composer_slider = composer_get_option_value( $prefix.'slider', '' );

    if( !empty( $composer_slider ) ){
        echo do_shortcode( esc_html( $composer_slider ) );
    }

    get_template_part( 'blog/loop/blog', 'containerstart' );

        //Get blog sidebar values from theme option
        $composer_select_sidebar = composer_get_option_value( $prefix.'select_sidebar', 0 );
        $composer_sidebar_position = composer_get_option_value( $prefix.'sidebar', 'right-sidebar' );

        get_template_part( 'blog/loop/blog', 'loopstart' );

            if (have_posts()) : while (have_posts()) : the_post();

                get_template_part( 'blog/blog', 'content' );

                endwhile;

                else :
                    get_template_part( 'blog/post', 'error' );

            endif;


        get_template_part( 'blog/loop/blog', 'loopend' );

        //If the sidebar position is right or left sidebar, it ll apply
        if( 'full-width' != $composer_sidebar_position ){

            composer_sidebar( $composer_select_sidebar, 'blog-sidebar' );
        }

    get_template_part( 'blog/loop/blog', 'containerend' );

    get_footer();
?>