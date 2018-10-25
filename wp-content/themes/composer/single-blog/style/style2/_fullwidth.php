<?php
    class style2_fullwidth extends single_blog {
        public function build_single_blog_layout( $style = 'style2', $options = array() ) {
            return $this->render( $style, $options );
        }
        public function render( $style = 'style2', $options = array() ) {

            // Empty assignment
            $output = '';

            // Initialize helper class
            $helpers = new helpers;

            $output .= $this->open( 'newsection single-blog-'.$style );

                // Empty assigment
                $css = '';

                if( has_post_thumbnail() && 'yes' == $options['show_feature_image'] ) {
                    // Feature Image ID
                    $image_id = get_post_thumbnail_id();

                    $bg = $helpers->get_image_by_id( 1920, 550, $image_id, 1, 1 );

                    $css = 'style="';
                    $css .= 'background: url('. esc_url( $bg ) .'); ';
                    $css .= 'background-repeat: no-repeat; ';
                    $css .= 'background-size: cover; ';
                    $css .= 'height: 550px; ';
                    $css .= '"';

                    $no_image_class = '';
                }
                else {
                    $no_image_class = 'no-feature-image';
                }

                $output .= $this->open( 'banner '.$no_image_class, '', $css ); // class, id, inline css style

                    $output .= $this->open( 'single-banner-content' );

                        $output .= $this->open( 'single-banner-center' );

                            // Category
                            $output .= $helpers->category( 'style2', $options['meta']['category'] ); // style, show/hide

                            // For printing title in proper method
                            ob_start();

                            the_title( '<h2 class="title">', '</h2>' );

                            $output .= ob_get_clean(); // It prints title

                            // Meta
                            $output .= $helpers->meta( 'style2', $options ); // style, show/hide

                            // Caption
                            $output .= $helpers->caption( $options['caption'] ); // enable/disable

                        $output .= $this->close(); // single-banner-center

                    $output .= $this->close(); // single-banner-content

                $output .= $this->close(); // banner

                $output .= $this->open( 'container' );

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