<?php 
    get_header();
   
    if ( have_posts() ) : while ( have_posts()) : the_post();

        echo '<div id="main-content" class="center portfolio-item-page">';

            $composer_id = get_the_id();

            // Single Porfolio
            $composer_layout = composer_get_meta_value( $composer_id, '_amz_portfolio_layout', 'full_width' );

            $composer_container_class = ( 'visual_composer' != $composer_layout ) ? 'container boxed' : '';

            echo '<div id="portfolio-item" class="'. esc_attr( $composer_layout ) .'">';
                echo '<section class="' . implode( ' ', get_post_class( $composer_container_class, $composer_id ) ) .'" id="post-'. esc_attr( $composer_id ).'">';

                    if( 'visual_composer' == $composer_layout ) {
                        get_template_part( 'templates/portfolio/layout', 'visual_composer' );
                    }
                    else if( 'two_column' == $composer_layout ) {
                        get_template_part( 'templates/portfolio/layout', 'two_column' );
                    }
                    else{
                        get_template_part( 'templates/portfolio/layout', 'full_width' );
                    }

                echo '</section>';

            echo '</div>'; // portfolio-item

        echo '</div>'; // portfolio-item-page

    endwhile; endif;

    get_footer();
?>