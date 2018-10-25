<?php
    class gallery_style1 extends gallery_blocks {
        public function build_style( $options = array(), $size = array() ) {

            if( !empty( $options ) ) {
                extract( $options );
            }

            // Empty assignment
            $output = $lightbox = '';

            // Full Image src
            $img_fullsize = $this->get_image_by_id( 'full', 'full', $current_image_id, 1, 1 );

            $size['width'] = ( 'margin-yes' == $margin ) ? $size['width'] - 30 : $size['width'];
            $size['height'] = ( 'margin-yes' == $margin ) ? $size['height'] - 30 : $size['height'];

            
            if( 'lightbox' == $onclick ) {
                $lightbox = $this->lightbox( $img_fullsize );
            }


            // Image
            $output .= '<div class="portfolio-img">';

                if ( ! empty( $custom_links[ $image_count ] ) ) {
                    $output .= '<a href="' . esc_url( $custom_links[ $image_count ] ) . '" target="'. esc_attr( $custom_links_target ) .'">';
                        $output .= $this->get_image_by_id( $size['width'], $size['height'], $current_image_id, 0, 1 );
                    $output .= '</a>';
                }
                else {
                    $output .= $this->get_image_by_id( $size['width'], $size['height'], $current_image_id, 0, 1 );
                }
            $output .= '</div>'; // portfolio-img
            
            // Lightbox
            $output .= $lightbox;

            return $output;
            
        }
    }