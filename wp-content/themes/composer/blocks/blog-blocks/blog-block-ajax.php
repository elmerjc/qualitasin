<?php

    function blog_blocks_loadmore(){

        // Empty assignment
        $output = '';

        //Blog blocks class Initialised
        $blog_blocks = new blog_blocks();

        // Get ajax values
        $args = isset($_POST['args']) ? $_POST['args'] : '';
        $values = isset($_POST['values']) ? $_POST['values'] : '';
        $options = $values['options'];
        $column_count = $values['column_count'];

        // Add next paged number in a query
        $args['paged'] = isset($_POST['paged']) ? $_POST['paged'] : 1;

        //Assign and call query
        $query = new WP_Query( $args );
        query_posts( $args );

        if ( have_posts() ) :
            $post_count = 1;
            echo '<div class="ajax-posts-wrap">';
            echo '<div class="ajax-posts" data-paged="'. esc_attr( $args['paged'] ) .'">';

                while ( have_posts() ) : the_post();
                    if( 1 == $post_count ) {
                        echo '<div class="load-element">';
                    }

                        echo $blog_blocks->initialize( $values['code'], $options, $post_count, $values['total_post'], $column_count );

                    if( $values['total_post'] == $post_count ) {
                        echo '</div>'; // load-element
                    }

                $post_count++; endwhile;

            echo '</div>';
            echo '</div>';
        else:
            echo '<div>'. esc_html__('Post Not Found.', 'composer'). '</div>';
        endif;

        wp_reset_query();

        die();
    }

    // ajax functions
    add_action('wp_ajax_blog_blocks_loadmore',  'blog_blocks_loadmore' );
    add_action('wp_ajax_nopriv_blog_blocks_loadmore', 'blog_blocks_loadmore' );