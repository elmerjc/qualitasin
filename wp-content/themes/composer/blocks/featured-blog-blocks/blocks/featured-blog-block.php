<?php
    class featured_blog_block extends featured_blog_blocks {
        public function build_grid_blog_post( $block = 'featured_block1', $options = array(), $post_count, $total_post ) {
            return $this->render( $block, $options, $post_count, $total_post );
        }
        public function render( $block = 'featured_block1', $options = array(), $post_count, $total_post ) {

            // Empty assignment
            $output = '';

            // Image Size
            $size = $this->get_image_size( $block, $post_count );

            $output .= $this->grid_blog_modules( $options['style'], $options, $size ); // Grid Blog Style, Grid Blog Options, Grid Blog Image Size
            
            return $output;
        }
    }