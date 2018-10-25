<?php
    class module8 extends blog_blocks {
        public function build_module( $options = array() ) {

            if( !empty( $options ) ) {
                extract( $options );
            }

            // Empty assignment
            $output = '';

            // Set module name for variable
            $module = 'module8_';

            // Featured Image Width and Height
            $width = 278;
            $height = 220;

            // Feature Image ID
            $image_id = get_post_thumbnail_id();

            $output .= $this->open( 'module-8 row' );

                // Featured Image
                $output .= $this->open( 'col-md-3' );
                    $output .= $this->get_image_by_id( $width, $height, $image_id, 0, 1 );
                $output .= $this->close();  // col-md-3

                // Content
                $output .= $this->open( 'col-md-9' );

                    // Top Meta
                    if( 'on_top' == ${$module.'show_meta'} ) {
                        $output .= $this->open( 'top-meta meta' );
                            $output .= $this->blog_meta( array( 'author' => 'yes', 'date' => 'yes' ), ${$module.'meta_prefix'}, ${$module.'show_meta'} ); // meta array, meta prefix, show/hide
                        $output .= $this->close(); // top-meta
                    }

                    // Title
                    $output .= $this->title( 'title', $title_tag, ${$module.'title_length'} ); // class, title tag, title length

                    // Bottom Meta
                    if( 'on_bottom' == ${$module.'show_meta'} ) {
                        $output .= $this->open( 'bottom-meta meta' );
                            $output .= $this->blog_meta( array( 'author' => 'yes', 'date' => 'yes' ), ${$module.'meta_prefix'}, ${$module.'show_meta'} ); // meta array, meta prefix, show/hide
                        $output .= $this->close(); // bottom-meta
                    }

                    // Content
                    $output .= $this->content( 'desc', ${$module.'show_description'}, ${$module.'excerpt_length'} ); // class, show/hide, content limit

                    // Button
                    $output .= $this->button( '', ${$module.'show_button'}, ${$module.'btn_text'} ); // style, show/hide, button text

                $output .= $this->close(); // col-md-9
            $output .= $this->close(); // block1

            return $output;
            
        }
    }