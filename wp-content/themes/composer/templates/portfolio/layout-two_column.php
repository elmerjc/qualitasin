<?php 

    $prefix = 'single_porfolio_';

    $id = get_the_id();

    //Useful variables
    $title = get_the_title();
    $link = get_permalink();

    echo '<div class="single-portfolio-item row">';

        $portfolio_fixed_position = composer_get_meta_value( $id, '_amz_portfolio_fixed_position', 'fixed_on_right' );
        $portfolio_fixed_content = composer_get_meta_value( $id, '_amz_portfolio_fixed_content', 'not_fixed' );

        if( 'fixed' === $portfolio_fixed_content ) {

            $fixed_class = 'single-portfolio-affix-container';
            $fixed_container_open = '<div class="single-portfolio-affix-wrap"><div class="single-portfolio-affix clearfix">';
            $fixed_container_close = '</div></div>';

            if( $portfolio_fixed_position == 'fixed_on_right' ){
                $right = array( $fixed_class, $fixed_container_open, $fixed_container_close, 'single-portfolio-affix-content' );
                $left[0] = $left[1] = $left[2] = $left[3] = '';
            }
            else if( $portfolio_fixed_position == 'fixed_on_left' ){
                $left = array( $fixed_class, $fixed_container_open, $fixed_container_close, 'single-portfolio-affix-media' );
                $right[0] = $right[1] = $right[2] = $right[3] = '';
            }
        }
        else {
            $left[0] = $left[1] = $left[2] = $left[3] = '';
            $right[0] = $right[1] = $right[2] = $right[3] = '';
        }


        //Image
        echo '<div class="col-md-8 '. esc_attr( $left[0] ) . '">';

            echo '<div class="' . esc_attr( $left[3] ) .'">';

                $portfolio_style = composer_get_meta_value( $id, '_amz_single_portfolio_style', 'image' );
                echo $left[1]; // no need escape, its simply a wrapper div opening

                    get_template_part( 'templates/portfolio/media', $portfolio_style );

                echo $left[2]; // no need escape, its simply a wrapper div closing

            echo '</div>';

        echo '</div>'; // col-md-8

        echo '<div class="col-md-4 '. esc_attr( $right[0] ) .'">';

            echo '<div class="' . esc_attr( $right[3] ) .'">';

                echo $right[1]; // no need escape, its simply a wrapper div opening

                    echo '<div class="portfolio-description">';
                        echo '<h2 class="portfolio-title">'. esc_html( $title ) .'</h2>';
                        $terms = get_the_term_list( $id, 'pix_categories',' ','&ensp;/&ensp;');
                        if( !empty( $terms ) ) { 
                            echo "<p class='portfolio-terms'>" . strip_tags( $terms ) . "</p>";
                        }
                        
                        the_content(); // Can't escape, it prints html tag

                    echo '</div>'; // portfolio-description

                    echo '<aside class="portfolio-info">';
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
                    echo '</aside>';

                echo $right[2]; // no need escape, its simply a wrapper div closing

            echo '</div>';
            
        echo '</div>'; // col-md-4

    echo '</div>'; // single-portfolio-item
?>