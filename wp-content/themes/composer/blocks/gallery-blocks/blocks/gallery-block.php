<?php
    class gallery_block extends gallery_blocks {
        public function build_gallery_post( $block = 'gallery_block1', $options = array(), $post_count, $total_post ) {
            return $this->render( $block, $options, $post_count, $total_post );
        }
        public function render( $block = 'gallery_block1', $options = array(), $post_count, $total_post ) {

            // Empty assignment
            $output = '';

            // Image Size
            $size = $this->get_image_size( $block, $post_count );

            $output .= $this->gallery_modules( $options['style'], $options, $size ); // Portfolio Style, Portfolio Options, Portfolio Image Size
            
            return $output;
        }
    }