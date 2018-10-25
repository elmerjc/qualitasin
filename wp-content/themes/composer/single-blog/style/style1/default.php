<?php
    class style1_default extends single_blog {
        public function build_single_blog_content( $options = array() ) {
            return $this->render( $options );
        }
        public function render( $options = array() ) {

            // Empty assignment
            $output = '';

            // Post Id
            $id = get_the_ID();

            // Initialize helper class
            $helpers = new helpers;

            $output .= $this->open( 'single-blog' );

                $output .= '<article id="post-'. esc_attr( $id ).'" class="' . implode(' ',get_post_class( 'post post-container clearfix', $id ) ) .'">';

                    $output .= $this->open( 'entry-content' );

                        $output .= $this->open( 'move-up heading' );

                            // For printing title in proper method
                            ob_start();

                            the_title( '<h2 class="title">', '</h2>' );

                            $output .= ob_get_clean(); // It prints title

                            $output .= $helpers->get_ad( '', 'ad1' ); // class, themeoption key

                            $output .= $helpers->category( 'style1', $options['meta']['category'] ); // style, show/hide

                            $output .= $helpers->meta( 'style1', $options ); // style, options

                        $output .= $this->close(); // heading

                        // For printing content and link pages in proper method
                        ob_start();

                        the_content(); 
                        wp_link_pages();

                        $output .= ob_get_clean(); // It prints content and link pages

                        $output .= $helpers->tags( 'style1', $options['meta']['tags'] ); // style, show/hide

                    $output .= $this->close(); // entry-content

                    $output .= $helpers->related_post( 'style1', $options ); // style, options

                    // For printing comment template in proper method
                    ob_start();

                    comments_template();

                    $output .= ob_get_clean(); // It prints comment template

                $output .= '</article>';

            $output .= $this->close(); // single-blog

            return $output;
        }
    }