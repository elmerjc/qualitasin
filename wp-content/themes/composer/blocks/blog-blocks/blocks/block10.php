<?php
    class block10 extends blog_blocks {
        public function build_blog_post( $block = 'block10', $options = array(), $post_count, $total_post, $column_count ) {
            return $this->render( $block, $options, $post_count, $total_post, $column_count );
        }
        public function render( $block = 'block10', $options = array(), $post_count, $total_post, $column_count ) {

            // Empty assignment
            $output = '';

            $output .= $this->blog_modules( 'module8', $options );
            
            return $output;
        }
    }