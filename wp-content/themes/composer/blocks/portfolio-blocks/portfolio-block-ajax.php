<?php

    function portfolio_blocks_loadmore(){

        // Empty assignment
        $output = '';

        // Portfolio blocks class Initialised
        $portfolio_blocks = new portfolio_blocks();

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
                    $class = $portfolio_blocks->get_column_class( $values['code'], $post_count );

                    echo '<div class="load-element pix-portfolio-item element '. esc_attr( $options['style'] . ' ' . $class . ' ' . $post_count );

                        $terms = get_the_terms( get_the_ID(),'pix_categories' );

                        if( !empty( $terms ) ) {
                            foreach( $terms as $term ) {
                                echo ' ' . esc_attr( strtolower( str_replace( ' ','-',$term->slug ) ) ) . ' '; 
                            }
                        }

                        echo '">';

                        echo '<div class="portfolio-container portfolio-'. esc_attr( $options['style'] ) .'">';

                            echo $portfolio_blocks->initialize( $values['code'], $options, $post_count, $values['total_post'] );

                        echo '</div>'; // portfolio-container

                    echo '</div>'; // element

                $post_count++; endwhile;

            echo '</div>';
            echo '</div>';
        else:
            echo '<div>'. esc_html__('Portfolio Not Found.', 'composer'). '</div>';
        endif;

        wp_reset_query();

        die();
    }

    // ajax functions
    add_action('wp_ajax_portfolio_blocks_loadmore',  'portfolio_blocks_loadmore' );
    add_action('wp_ajax_nopriv_portfolio_blocks_loadmore', 'portfolio_blocks_loadmore' );