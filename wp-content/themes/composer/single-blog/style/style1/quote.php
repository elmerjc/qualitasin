<?php
    class style1_quote extends single_blog {
        public function build_single_blog_content( $options = array() ) {
            return $this->render( $options );
        }
        public function render( $options = array() ) {

            // Empty assignment
            $output = '';

            // Post ID
            $id = get_the_ID();

            // Initialize helper class
            $helpers = new helpers;

            $output .= '<article id="post-'. esc_attr( $id ).'" class="' . implode(' ',get_post_class( 'post post-container clearfix', $id ) ) .'">';

                $output .= $this->open( 'entry-content' );

                    $output .= $this->open( 'quote-link-content' );

                        // For printing content and link pages in proper method
                        ob_start();

                        the_content(); 
                        wp_link_pages();

                        $output .= ob_get_clean(); // It prints content and link pages

                        //Get quote meta box values
                        $author = composer_get_meta_value( $id, '_amz_author', '' );
                        if( !empty( $author ) ){
                            $output .= '<span class="quote-author"> &minus;  ' . esc_html( $author ) .'</span>';
                        }

                    $output .= $this->close(); // quote-link-content

                    // For printing comment template in proper method
                    ob_start();

                    comments_template();

                    $output .= ob_get_clean(); // It prints comment template                    

                $output .= $this->close(); // entry-content

            $output .= '</article>';

            return $output;
        }
    }