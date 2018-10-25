<?php
    class module4 extends blog_blocks {
        public function build_module( $options = array() ) {

            if( !empty( $options ) ) {
                extract( $options );
            }

            // Empty assignment
            $output = '';

            // Set module name for variable
            $module = 'module4_';

            // Columns
            $column = $options['block_column'];

            // Featured Image Width and Height
            if( 'col1' == $column ) {
                $width = 380;
                $height = 280;
            }
            elseif( 'col2' == $column ) {
                $width = 585;
                $height = 300;
            }
            elseif( 'col3' == $column ) {
                $width = 380;
                $height = 250;
            }

            // Feature Image ID
            $image_id = get_post_thumbnail_id();

            $output .= $this->open('module-4');

                // Content
                $output .= $this->open();

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

                    // Featured Image
                    if( 'yes' == ${$module.'show_featured_image'} ) {
                        $output .= $this->open('post_thumbnail');
                            $output .= $this->get_image_by_id( $width, $height, $image_id, 0, 1 );
                        $output .= $this->close();
                    }

                    // Content
                    $output .= $this->content( 'desc', ${$module.'show_description'}, ${$module.'excerpt_length'} ); // class, show/hide, content limit

                    // Button
                    $output .= $this->button( '', ${$module.'show_button'}, ${$module.'btn_text'} ); // style, show/hide, button text

                $output .= $this->close();

            $output .= $this->close();

            return $output;
            
        }
    }