<?php
    class portfolio_block extends portfolio_blocks {
        public function build_portfolio_post( $block = 'portfolio_block1', $options = array(), $post_count, $total_post ) {
            return $this->render( $block, $options, $post_count, $total_post );
        }
        public function render( $block = 'portfolio_block1', $options = array(), $post_count, $total_post ) {

            // Empty assignment
            $output = '';

            // Image Size
            $size = $this->get_image_size( $block, $post_count );

            $output .= $this->portfolio_modules( $options['style'], $options, $size ); // Portfolio Style, Portfolio Options, Portfolio Image Size
            
            return $output;
        }
    }