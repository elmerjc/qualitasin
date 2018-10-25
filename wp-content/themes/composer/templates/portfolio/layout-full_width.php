<?php 

    $prefix = 'single_porfolio_';

    $id = get_the_id();

    //Useful variables
    $title = get_the_title();
    $link = get_permalink();

    //Empty Assignment
    $slider_class = $slider_data = '';

    $portfolio_details_position = composer_get_meta_value( $id, '_amz_portfolio_details_position', 'media_on_top' );

    echo '<div class="single-portfolio-item '. esc_attr( $portfolio_details_position ) .'">';

        $portfolio_details = array();
        if( $portfolio_details_position == 'media_on_top' ){
            $portfolio_details = array('media', 'details');
        }
        else {
            $portfolio_details = array('details', 'media');
        }

        foreach ( $portfolio_details as $key => $value ) {
            if( 'media' == $value ) {
                //Image
                echo '<div>';

                    $portfolio_style = composer_get_meta_value( $id, '_amz_single_portfolio_style', 'image' );

                    get_template_part( 'templates/portfolio/media', $portfolio_style );

                echo '</div>';
            }
            else {
                echo '<div class="row">';

                    echo '<div class="col-md-8">';
                        echo '<div class="portfolio-description">';
                            echo '<h2 class="portfolio-title">'. esc_html( $title ) .'</h2>';
                            $terms = get_the_term_list( $id, 'pix_categories',' ','&ensp;/&ensp;');
                            if( !empty( $terms ) ) { 
                                echo "<p class='portfolio-terms'>" . strip_tags( $terms ) . "</p>";
                            }
                            
                            the_content();

                            //Assign Like / Share / Next & Previous
                            echo '<div id="portfolio-item-bottom">';
                            
                                //Like Count
                                $like = composer_get_option_value( $prefix.'like', 'show' );

                                if( 'show' === $like ){
                                    $like_count = get_post_meta( $post->ID, '_pix_like_me', true );
                                    $like_class = ( isset( $_COOKIE['pix_like_me_'. $id] ) ) ? 'liked' : '';

                                    if( $like_count == '' ){
                                        $like_count = 0;
                                    }

                                    echo '<a href="#void" class="single-port-like pix-like-me '. $like_class .'" data-id="'. esc_attr( $id ) .'">
                                        <i class="pixicon-heart-2"></i>
                                        <span class="like-count">'. esc_html( $like_count ) .'</span>
                                        <span class="already-liked">'. esc_html__('You already liked!', 'composer' ) .'</span>
                                    </a>';

                                }

                                //Share
                                $share = composer_get_option_value( $prefix.'share', 'show' );

                                if( 'show' === $share ) {
                                    echo '<div class="portfolio-icons">';

                                        echo '<div class="port-icon-hover share-btn">';

                                            echo '<div class="share-top">';
                                                echo '<i class="pixicon-share"></i>';
                                            echo '</div>';

                                            echo '<div class="port-share-btn">';

                                                echo '<a href="https://plus.google.com/share?url='. esc_url( $link ) .'" target="_blank" class="gplus"><i class="pixicon-gplus"></i></a>';                                

                                                echo '<a href="http://twitter.com/share?url='. esc_url( $link ) .'&amp;text=Check out this Project '. esc_attr( $link ) .'" target="_blank" class="twitter"><i class="pixicon-twitter"></i></a>';

                                                echo '<a href="http://www.facebook.com/sharer.php?u='. esc_url( $link ) .'" target="_blank" class="facebook"><i class="pixicon-facebook"></i></a>';

                                            echo '</div>'; // port-share-btn
                                        echo '</div>'; // port-icon-hover
                                    echo '</div>'; // portfolio-icons
                                }

                                //Next and previous item
                                $next_prev = composer_get_option_value( $prefix.'next_prev', 'show' );

                                if( 'show' === $next_prev ){
                                    echo '<div class="pull-right single-port-nav">';
                                        previous_post_link( '%link', '<span class="pixicon-arrow-left"></span>', false );
                                        next_post_link( '%link', '<span class="pixicon-arrow-right"></span>', false );
                                    echo '</div>'; 
                                }

                            echo '</div>'; // portfolio-item-bottom

                        echo '</div>'; // portfolio-description
                    echo '</div>'; // col-md-8

                    echo '<aside class="col-md-4 portfolio-info">';
                        //Assign Portfolio Info
                        $project_detail_title = composer_get_option_value( $prefix.'project_detail_title', esc_html( 'Project Details', 'composer' ) );

                        echo '<div class="portfolio-info-inner">';
                            echo '<h2 class="side-title">'. esc_html( $project_detail_title ) .'</h2>';

                            echo '<ul>';

                                //Author Name
                                $client_name = composer_get_meta_value( $id, '_amz_client_name', '' ); // id, meta_key, meta_default
                                if( !empty( $client_name ) ){
                                    $client_title = composer_get_option_value( $prefix.'client_title', esc_html( 'Client', 'composer' ) );
                                    echo '<li>';
                                    echo '<span class="portfolio-info-title">'. esc_html( $client_title ) .'</span>';
                                    echo '<span class="portfolio-info-content author">'. esc_html( $client_name ) .'</span>';
                                    echo '</li>';
                                }

                                //Skills
                                 $skills = composer_get_meta_value( $id, '_amz_skills', '' );
                                if( !empty( $skills ) ){
                                    $skill_title = composer_get_option_value( $prefix.'skill_title', esc_html( 'Skills', 'composer' ) );
                                    echo '<li>';
                                    echo '<span class="portfolio-info-title">'. esc_html( $skill_title ) .'</span>';
                                    echo '<span class="portfolio-info-content skills">'. esc_html( $skills ) .'</span>';
                                    echo '</li>';
                                }

                                //Tasks
                                $tasks = composer_get_meta_value( $id, '_amz_tasks');
                                if( !empty( $tasks ) ){
                                    $task_title = composer_get_option_value( $prefix.'task_title', esc_html( 'Tasks', 'composer' ) );
                                    echo '<li>';
                                    echo '<span class="portfolio-info-title">'. esc_html( $task_title ) .'</span>';
                                    echo '<span class="portfolio-info-content skills">'. esc_html( $tasks ) .'</span>';
                                    echo '</li>';
                                }                  
                            echo '</ul>';

                            //Project Launch Button
                            $project_url = composer_get_meta_value( $id, '_amz_project_url', '' );                
                            $target = composer_get_meta_value( $id, '_amz_target', '_blank');

                            if( !empty( $project_url ) ){
                                $launch_btn_text = composer_get_option_value( $prefix.'launch_btn_text', esc_html( 'Launch Project', 'composer' ) );

                                echo '<a href="'. esc_url( $project_url ) .'" target="'. esc_attr( $target ) .'" class="clear btn btn-outline btn-hover-solid single-portfolio-btn btn-md color">'. esc_html( $launch_btn_text ) .'</a>';
                            }

                        echo '</div>'; // portfolio-info-inner
                    echo '</aside>'; // col-md-4
                    
                echo '</div>';
            }
        }

    echo '</div>'; // single-portfolio-item
?>