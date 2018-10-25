<?php
    class style1_sidebar extends single_blog {
        public function build_single_blog_layout( $style = 'style1', $options = array() ) {
            return $this->render( $style, $options );
        }
        public function render( $style = 'style1', $options = array() ) {

            // Empty assignment
            $output = '';

            // Initialize helper class
            $helpers = new helpers;

            $output .= $this->open( 'newsection single-blog-'.$style );

                $output .= $this->open( 'container' );

                    $output .= $this->open( 'row' );

                        $output .= $this->open( 'col-md-9 '.$options['layout'] );

                            if( has_post_thumbnail() && 'yes' == $options['show_feature_image'] ) {
                                $media = new media;

                                $output .= $media->get_media( $options['format'], array( 1360, 550 ), 'media-con' ); // post format, size, class, hide header in post format

                                // Caption
                                $output .= $helpers->caption( $options['caption'] ); // enable/disable
                            }

                            $template = $helpers->template( $style, $options['format'] );

                            // Initialize class for content
                            require_once( COMPOSER_DIR .        '/single-blog/style/'. $style .'/'.$template['file'].'.php' );            
                            $initialize = new $template['class'];
                            

                            $output .= $initialize->build_single_blog_content( $options );

                        $output .= $this->close(); // col-md-9

                        $output .= $this->open( 'col-md-3 sidebar' );

                            $output .= $helpers->sidebar( $options['select_sidebar'], 'blog-sidebar' );

                        $output .= $this->close(); // col-md-3

                    $output .= $this->close(); // row

                $output .= $this->close(); // container

            $output .= $this->close(); // newsection
            
            return $output;
        }
    }