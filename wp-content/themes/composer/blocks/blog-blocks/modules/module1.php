<?php
    class module1 extends blog_blocks {
        public function build_module( $options = array() ) {

            if( !empty( $options ) ) {
                extract( $options );
            }

            // Empty assignment
            $output = '';

            // Set module name for variable
            $module = 'module1_';

            // Featured Image Width and Height
            $width = 615;
            $height = 425;

            // if( $margin == 'margin-yes' ){
            //     $width = 585;
            //     $height = 395;                
            // }

            // Feature Image ID
            $image_id = get_post_thumbnail_id();

            $output .= $this->open( 'module-1 row' );

                // Featured Image
                $output .= $this->open( 'col-md-6' );
                    $output .= $this->get_image_by_id( $width, $height, $image_id, 0, 1 );
                $output .= $this->close();

                // Content
                $output .= $this->open( 'col-md-6 content_blog' );

                    // Top Meta
                    $output .= $this->open( 'meta-info' );
                        $output .= $this->post_format_icon( '', ${$module.'show_post_format_icon'} ); // style, show/hide
                        $output .= $this->blog_category( '', ${$module.'show_category'} ); // style, show/hide
                    $output .= $this->close(); // top-meta

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

                    // Share
                    $output .= $this->blog_share( '', ${$module.'show_share'}, ${$module.'share'} ); // style, show/hide, share option ( facebook, twitter, gplus, linkedin.. )

                $output .= $this->close(); // col-md-6
            $output .= $this->close(); // block1

            return $output;
            
        }
    }