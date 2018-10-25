<?php
    /* =============================================================================
     Gallery Blocks Shortcodes
     ========================================================================== */

    function composer_gallery_blocks( $atts, $content = null, $code ){
        extract( shortcode_atts( array(
            //'style'         => 'gallery_style1', // gallery_style1
            'hover_color'   => '', // port-bg-white, port-bg-color
            'onclick'       => 'lightbox', 
            'margin'        => 'margin-no', // margin-no, margin-yes
            'image_id'      => '',
            'custom_links'  => '', 
            'el_class'      => '',
            'custom_links_target' => '_self'
        ), $atts ) );

        // Empty assignment
        $output = $size = '';

        //Gallery blocks class Initialised
        $gallery_blocks = new gallery_blocks();

        // Portfolio Options
        $options = array();

        
        $options['style']       = 'gallery_style1'; // $style
        $options['hover_color'] = $hover_color;
        $options['onclick']     = $onclick;
        $options['margin']      = $margin;
        $options['image_id']    = $image_id;

        $image_id_array = !empty( $image_id ) ? explode( ',', $image_id ) : '';

        // Get number of items value
        $no_of_items = $gallery_blocks->get_post_count( $code );

        // Assign item count
        $post_count = 1; $image_count = 0;

        // Grid Sizer Class
        if( 'grid_block12' == $code ) {
            $grid_sizer = 'vc_col-sm-6';
        }
        else {
            $grid_sizer = 'vc_col-sm-3';
        }

        if ( 'custom_link' === $onclick ) {
            $custom_links = vc_value_from_safe( $custom_links );
            $custom_links = explode( ',', $custom_links );
        }

        $options['custom_links'] = $custom_links;
        $options['custom_links_target'] = $custom_links_target;

        if( !empty( $image_id_array ) && is_array( $image_id_array ) ) {

            // Get ry items count
            $total_post = count( $image_id_array );

            $output .= '<div class="gallery-block-wrap '. esc_attr( $hover_color .' ' . $el_class ) .'">';

                $output .= '<div class="wpb_row vc_row-fluid gallery-block-container">';

                    $output .= '<div class="gallery-contents '. esc_attr( $hover_color . ' ' . $margin ) .'">';

                        $output .= '<div class="gallery-grid-sizer '. esc_attr( $grid_sizer ) .'"></div>';

                        foreach ( $image_id_array as $key => $id ) {

                            if( $post_count > $no_of_items ) {
                                $post_count = 1;
                            }

                            // Get column class for items
                            $class = $gallery_blocks->get_column_class( $code, $post_count );

                            // Set current image id
                            $options['current_image_id'] = $id;
                            $options['image_count'] = $image_count;

                            $output .= '<div class="element gallery-item '. esc_attr( $class ) .'">';

                                $output .= '<div class="portfolio-container portfolio-'. esc_attr( $options['style'] ) .'">';

                                    $output .= $gallery_blocks->initialize( $code, $options, $post_count, $total_post );

                                $output .= '</div>'; // portfolio-container

                            $output .= '</div>'; // element

                            // Increment post count
                            $post_count++; $image_count++;
                        }

                    $output .= '</div>'; // gallery-contents
                $output .= '</div>'; // gallery-block-container

            $output .= '</div>'; // gallery-block-wrap
        }

        return  $output;
    }

    add_shortcode( 'gallery_block1', 'composer_gallery_blocks' );
    add_shortcode( 'gallery_block2', 'composer_gallery_blocks' );
    add_shortcode( 'gallery_block3', 'composer_gallery_blocks' );
    add_shortcode( 'gallery_block4', 'composer_gallery_blocks' );
    add_shortcode( 'gallery_block5', 'composer_gallery_blocks' );
    add_shortcode( 'gallery_block6', 'composer_gallery_blocks' );
    add_shortcode( 'gallery_block7', 'composer_gallery_blocks' );
    add_shortcode( 'gallery_block8', 'composer_gallery_blocks' );
    add_shortcode( 'gallery_block9', 'composer_gallery_blocks' );
    add_shortcode( 'gallery_block10', 'composer_gallery_blocks' );
    add_shortcode( 'gallery_block11', 'composer_gallery_blocks' );
    add_shortcode( 'gallery_block12', 'composer_gallery_blocks' );