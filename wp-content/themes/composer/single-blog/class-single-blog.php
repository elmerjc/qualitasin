<?php
    class single_blog {

        public function initialize( $style = 'style1', $options = array() ) {

            return $this->build_single_blog( $style, $options );
        }

        public function build_single_blog( $style = 'style1', $options = array() ) {

            require_once( COMPOSER_DIR . 		'/single-blog/style/'. $style .'/'.$options['layout_file'].'.php' );
            
            $initialize = new $options['layout_class'];

            $output = $initialize->build_single_blog_layout( $style, $options );

            return $output;

        }

        // For Html Structure

        // Div open
        public function open( $class = '', $id = '', $style = '' ) {
            $classes =  !empty( $class ) ? ' class="'. esc_attr( $class ) .'" ': '';
            $id =  !empty( $id ) ? ' id="'. esc_attr( $id ).'" ' : '';

            return '<div' . $id . $classes . $style .'>';
        }

        // Div close
        public function close() {
            return '</div>';
        }

    }

    // Required File
    require_once ( COMPOSER_DIR .       '/single-blog/class-media.php' );
    require_once ( COMPOSER_DIR .       '/single-blog/class-helpers.php' );