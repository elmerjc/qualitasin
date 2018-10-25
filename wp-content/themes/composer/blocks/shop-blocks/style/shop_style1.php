<?php
    class shop_style1 extends shop_blocks {
        public function build_style( $options = array(), $size = array() ) {

            if( !empty( $options ) ) {
                extract( $options );
            }

            // Empty assignment
            $output = '';

            // Feature Image ID
            $image_id = get_post_thumbnail_id();

            // Shop Block Image
            $output .= $this->open( 'shop-img' );
                $output .= $this->get_image_by_id( $size['width'], $size['height'], $image_id, 0, 1 );
            $output .= $this->close(); // shop-img

            // Batch
            $output .= $this->batch(); // sale batch
                    
            $output .= $this->open( 'shop-hover' );

                // Title
                $output .= $this->title( 'title', $title_tag, 'yes' ); // class, title tag, covered with link

                // Price
                $output .= $this->price(); // price

                $output .= $this->single(); // view product

            $output .=  $this->close(); // shop-hover

            return $output;
            
        }
    }