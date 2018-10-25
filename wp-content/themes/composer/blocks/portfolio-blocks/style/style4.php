<?php
    class style4 extends portfolio_blocks {
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

            $img_fullsize = $this->get_image_by_id( 'full', 'full', $image[0]['itemId'], 1, 1 );

            // Image
            $output .= $this->get_image_by_id( $size['width'], $size['height'], $image[0]['itemId'], 0, 1 );
                        
            $output .= '<div class="portfolio-style4-content">';

                $project_url = composer_get_meta_value( get_the_id(), '_amz_project_url', '' );

                if( 'single_port_link' == $options['on_click'] ) {
                    $output .= '<a href="'. esc_url( get_permalink() ) .'" class="inner-content">';
                }
                else if( 'single_button_link' == $options['on_click'] && !empty( $project_url ) ) {
                    $output .= '<a href="'. esc_url( $project_url ) .'" class="inner-content">';
                }

                    $output .= '<div class="portfolio-link">';

                        $output .= '<div class="portfolio-content">';

                            // Title
                            $output .= $this->title( 'title', $title_tag, 'no' ); // title

                            // Terms
                            $output .= $this->terms( $show_terms );

                        $output .= '</div>'; // portfolio-content

                    $output .= '</div>'; // portfolio-link

                if( 'single_port_link' == $options['on_click'] || ( 'single_button_link' == $options['on_click'] && !empty( $project_url ) ) ) {
                    $output .= '</a>'; // .inner-content
                }

                // Lightbox
                $output .= $this->lightbox( $img_fullsize, $show_lightbox );

            $output .= '</div>'; // portfolio-style4-content

            return $output;
            
        }
    }