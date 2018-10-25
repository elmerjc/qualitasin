<?php
    class style3 extends portfolio_blocks {
        public function build_style( $options = array(), $size = array() ) {

            if( !empty( $options ) ) {
                extract( $options );
            }

            // Empty assignment
            $output = '';

            // Portfolio gallery meta value
            $portfolio_thumb = composer_get_meta_value( get_the_id(), '_amz_portfolio_image' );
            $image_gallery = htmlspecialchars_decode( $portfolio_thumb );
            $image = json_decode( $image_gallery, true );

            // Image
            $output .= $this->get_image_by_id( $size['width'], $size['height'], $image[0]['itemId'], 0, 1 );
                        
            $output .= '<div class="portfolio-style3-content">';

                $output .= '<div class="portfolio-link">';

                    $project_url = composer_get_meta_value( get_the_id(), '_amz_project_url', '' );

                    if( 'single_port_link' == $options['on_click'] ) {
                        $output .= '<a href="'. esc_url( get_permalink() ) .'" class="inner-content">';
                    }
                    else if( 'single_button_link' == $options['on_click'] && !empty( $project_url ) ) {
                        $output .= '<a href="'. esc_url( $project_url ) .'" class="inner-content">';
                    }

                        $output .= '<div class="portfolio-content">';

                            // Title
                            $output .= $this->title( 'title', $title_tag, 'no' ); // title

                            // Terms
                            $output .= $this->terms( $show_terms );


                        $output .= '</div>'; // portfolio-content

                    if( 'single_port_link' == $options['on_click'] || ( 'single_button_link' == $options['on_click'] && !empty( $project_url ) ) ) {
                        $output .= '</a>'; // .inner-content
                    }

                $output .= '</div>'; // portfolio-link

            $output .= '</div>'; // portfolio-style3-content

            return $output;
            
        }
    }