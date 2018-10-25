<?php
    class block6 extends blog_blocks {
        public function build_blog_post( $block = 'block6', $options = array(), $post_count, $total_post, $column_count ) {
            return $this->render( $block, $options, $post_count, $total_post, $column_count );
        }
        public function render( $block = 'block6', $options = array(), $post_count, $total_post, $column_count ) {

            // Empty assignment
            $output = '';

            if( !empty( $column_count ) ) {
                extract( $column_count );
            }

            // Columns
            $column = $options['block_column'];

            switch ( $column ) {
                case 'col1':
                    
                    if( $post_count == $first_col_open ) {
                        $output .= $this->open( 'row' );
                        $output .= $this->open( 'col-md-12' );
                    }

                    $output .= $this->blog_modules( 'module3', $options, $post_count );

                    if( $post_count == $first_col_close || $post_count == $total_post ) {
                        $output .= $this->close(); // col-md-12
                        $output .= $this->close(); // row
                    }

                break;

                case 'col2':
                    
                    if( $post_count == $first_col_open ) {
                        $output .= $this->open( 'row' );
                        $output .= $this->open( 'col-md-6' );
                    }

                    if( $post_count <= $first_col_close  ) {
                        $output .= $this->blog_modules( 'module3', $options, $post_count );
                    }

                    if( $post_count == $first_col_close ) {
                        $output .= $this->close(); // col-md-6
                    }

                    if( $post_count == $second_col_open ) {
                        $output .= $this->open( 'col-md-6' );
                    }

                    if( $post_count > $first_col_close && $post_count <= $second_col_close  ) {
                        $output .= $this->blog_modules( 'module3', $options, $post_count );
                    }

                    if( $post_count == $second_col_close || $post_count == $total_post ) {
                        $output .= $this->close(); // col-md-6
                    }

                    if( $post_count == $second_col_close || $post_count == $total_post ) {
                        $output .= $this->close(); // row
                    }
                    
                break;

                case 'col3':
                    
                    if( $post_count == $first_col_open ) {
                        $output .= $this->open( 'row' );
                        $output .= $this->open( 'col-md-4' );
                    }

                    if( $post_count <= $first_col_close  ) {
                        $output .= $this->blog_modules( 'module3', $options, $post_count );
                    }

                    if( $post_count == $first_col_close ) {
                        $output .= $this->close(); // col-md-4
                    }

                    if( $post_count == $second_col_open ) {
                        $output .= $this->open( 'col-md-4' );
                    }

                    if( $post_count > $first_col_close && $post_count <= $second_col_close  ) {
                        $output .= $this->blog_modules( 'module3', $options, $post_count );
                    }

                    if( $post_count == $second_col_close ) {
                        $output .= $this->close(); // col-md-4
                    }

                    if( $post_count == $third_col_open ) {
                        $output .= $this->open( 'col-md-4' );
                    }

                    if( $post_count > $second_col_close && $post_count <= $third_col_close  ) {
                        $output .= $this->blog_modules( 'module3', $options, $post_count );
                    }

                    if( $post_count == $third_col_close || $post_count == $total_post ) {
                        $output .= $this->close();  // col-md-4
                    }

                    if( $post_count == $third_col_close || $post_count == $total_post ) {
                        $output .= $this->close(); // row
                    }
                    
                break;
                
                default:
                break;
            }
            
            return $output;
        }
    }