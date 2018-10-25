<?php
    class shop_block extends shop_blocks {
        public function build_shop_post( $block = 'shop_block1', $options = array(), $post_count, $total_post ) {
            return $this->render( $block, $options, $post_count, $total_post );
        }
        public function render( $block = 'shop_block1', $options = array(), $post_count, $total_post ) {

            // Empty assignment
            $output = '';

            // Image Size
            $size = $this->get_image_size( $block, $post_count );

            $output .= $this->shop_modules( $options['style'], $options, $size ); // Grid Blog Style, Grid Blog Options, Grid Blog Image Size
            
            return $output;
        }
    }