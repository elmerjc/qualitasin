<?php
    class style1_fullwidth extends single_blog {
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

                $output .= $this->close(); // container

            $output .= $this->close(); // newsection
            
            return $output;
        }
    }