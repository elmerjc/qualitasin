<?php
    class block1 extends blog_blocks {
        public function build_blog_post( $block = 'block1', $options = array(), $post_count, $total_post, $column_count ) {
            return $this->render( $block, $options, $post_count, $total_post, $column_count );
        }
        public function render( $block = 'block1', $options = array(), $post_count, $total_post, $column_count ) {

            // Empty assignment
            $output = '';

            $output .= $this->blog_modules( 'module1', $options );
            
            return $output;
        }
    }