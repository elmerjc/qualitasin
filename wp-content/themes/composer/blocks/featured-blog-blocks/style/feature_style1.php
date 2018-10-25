<?php
    class feature_style1 extends featured_blog_blocks {
        public function build_style( $options = array(), $size = array() ) {

            if( !empty( $options ) ) {
                extract( $options );
            }

            // Empty assignment
            $output = '';

            // Feature Image ID
            $image_id = get_post_thumbnail_id();

            // Grid Blog Block Image
            $output .= '<div class="grid-blog-img">';
                $output .= $this->get_image_by_id( $size['width'], $size['height'], $image_id, 0, 1 );
            $output .= '</div>';

            // Top Meta
            $output .= $this->open( 'meta-info' );
                $output .= $this->post_format_icon( '', $show_post_format_icon ); // style, show/hide
                $output .= $this->category( $show_category ); // show/hide
            $output .= $this->close(); // meta-info
                    
            $output .=  '<div class="grid-blog-hover">';
            
                // Title
                $output .= $this->title( 'title', $title_tag, 'yes' ); // class, title tag, covered with link

                // Blog Meta
                $output .= $this->blog_meta( array( 'author' => 'yes', 'date' => 'yes' ), $meta_prefix, $show_meta ); // meta array, meta prefix, show/hide

            $output .=  '</div>'; // grid-blog-hover

            return $output;
            
        }
    }