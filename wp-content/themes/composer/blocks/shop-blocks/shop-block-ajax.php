<?php

    function shop_blocks_loadmore(){

        // Empty assignment
        $output = '';

        // Shop blocks class Initialised
        $shop_blocks = new shop_blocks();

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
                    $class = $shop_blocks->get_column_class( $values['code'], $post_count );

                    echo '<div class="load-element shop-item element '. esc_attr( $values['style'] . ' ' . $class ) .'">';

                        echo '<div class="shop-container shop-'. esc_attr( $values['style'] ) .'">';

                            echo $shop_blocks->initialize( $values['code'], $options, $post_count, $values['total_post'] );

                        echo '</div>'; // shop-container

                    echo '</div>'; // element

                $post_count++; endwhile;

            echo '</div>';
            echo '</div>';
        else:
            echo '<div>'. esc_html__('Products Not Found.', 'composer'). '</div>';
        endif;

        wp_reset_query();

        die();
    }

    // ajax functions
    add_action('wp_ajax_shop_blocks_loadmore',  'shop_blocks_loadmore' );
    add_action('wp_ajax_nopriv_shop_blocks_loadmore', 'shop_blocks_loadmore' );