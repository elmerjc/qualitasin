<?php

    function grid_blog_blocks_loadmore(){

        // Empty assignment
        $output = '';

        // Grid Blog blocks class Initialised
        $grid_blog_blocks = new grid_blog_blocks();

        // Get ajax values
        $args = isset($_POST['args']) ? $_POST['args'] : '';
        $values = isset($_POST['values']) ? $_POST['values'] : '';
        $options = $values['options'];

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
                    // Get column class for items
                    $class = $grid_blog_blocks->get_column_class( $values['code'], $post_count );

                    echo '<div class="load-element grid-blog-item element '. esc_attr( $options['style'] . ' ' . $class ) .'">';

                        echo '<div class="grid-blog-container grid-blog-'. esc_attr( $options['style'] ) .'">';

                            echo $grid_blog_blocks->initialize( $values['code'], $options, $post_count, $values['total_post'] );

                        echo '</div>'; // grid-blog-container

                    echo '</div>'; // element

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
    add_action('wp_ajax_grid_blog_blocks_loadmore',  'grid_blog_blocks_loadmore' );
    add_action('wp_ajax_nopriv_grid_blog_blocks_loadmore', 'grid_blog_blocks_loadmore' );