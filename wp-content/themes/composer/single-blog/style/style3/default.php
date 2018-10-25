<?php
    class style3_default extends single_blog {
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

                    // Share
                    $output .= $helpers->share( 'style1', '', $options['share'] ); // style, show/hide

                    $output .= $this->open( 'entry-content' );

                        $output .= $this->open( 'move-up heading' );

                            $media = new media;

                            $output .= $media->get_media( $options['format'], array( 1360, 550 ), 'media-con', array( 'standard', 'image', 'link', 'quote' ) ); // post format, size, class, hide header in post format

                        $output .= $this->close(); // heading

                        $output .= $this->open( 'content-details' );

                            $output .= $this->open( 'share' );

                            $output .= $this->close(); // share

                            $output .= $this->open( 'content' );

                                $output .= $helpers->get_ad( '', 'ad1' ); // class, themeoption key

                                // For printing content and link pages in proper method
                                ob_start();

                                the_content(); 
                                wp_link_pages();

                                $output .= ob_get_clean(); // It prints content and link pages

                                $output .= $helpers->tags( 'style1', $options['meta']['tags'] ); // style, show/hide

                            $output .= $this->close(); // content

                        $output .= $this->close(); // content-details

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