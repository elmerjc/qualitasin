<?php

    //Woo cart
    if( !function_exists( 'composer_woo_cart' ) ) {
        function composer_woo_cart(){
            global $woocommerce; 

            echo '<div class="header-elem">';
                echo '<div class="pix-cart">';

                    echo '<div class="cart-trigger">';
                        echo '<div class="pix-cart-contents-con">';                 
                            echo '<a class="pix-cart-contents" href="'. esc_url( $woocommerce->cart->get_cart_url() ) .'" title="'. esc_html__( 'View your shopping cart', 'composer' ) .'">';
                                echo '<span class="pixicon-handbag pix-cart-icon"></span><span class="pix-item-icon">'. esc_html( $woocommerce->cart->cart_contents_count ) .'</span>';
                            echo '</a>';
                        echo '</div>';

                        if( !is_cart() && !is_checkout()){
                            //Dropwon widget 
                            echo '<div class="woo-cart-dropdown">';
                                echo '<div class="woo-cart-content">';
                                    woocommerce_mini_cart();
                                echo '</div>';
                            echo '</div>';
                        }

                    echo '</div>';

                echo '</div>';
            echo '</div>';

        }
    }

    add_filter( 'loop_shop_per_page', 'composer_products_per_page');
    if( !function_exists( 'composer_products_per_page' ) ) {
        function composer_products_per_page() {

            $shop_count = composer_get_option_value( 'shop_count', 8 );
            
            return $shop_count;
        }
    }

    // Disable woocommerce css
    add_filter( 'woocommerce_enqueue_styles', '__return_false' );

    add_filter( 'woocommerce_output_related_products_args', 'composer_related_products_args' );
    if( !function_exists( 'composer_related_products_args' ) ) {
        function composer_related_products_args( $args ) {
            $args['posts_per_page'] = 3; // 4 related products
            $args['columns'] = 3; // arranged in 2 columns
            return $args;
        }
    }

    //Reposition WooCommerce breadcrumb
    if( !function_exists( 'composer_woocommerce_remove_breadcrumb' ) ) { 
        function composer_woocommerce_remove_breadcrumb(){
            remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
        }
    }
    add_action('woocommerce_before_main_content', 'composer_woocommerce_remove_breadcrumb');

    if( !function_exists( 'composer_woocommerce_custom_breadcrumb' ) ) { 
        function composer_woocommerce_custom_breadcrumb(){
            woocommerce_breadcrumb();
        }
    }
    add_action( 'woo_custom_breadcrumb', 'composer_woocommerce_custom_breadcrumb' );

    remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);

    remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);

    remove_action( 'woocommerce_after_single_product', 'woocommerce_template_loop_add_to_cart', 10);
    
    remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );

    remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar',10);

    // Ensure cart contents update when products are added to the cart via AJAX (place the following in functions.php)
    add_filter('woocommerce_add_to_cart_fragments', 'composer_woocommerce_header_add_to_cart_fragment');
    if( !function_exists( 'composer_woocommerce_header_add_to_cart_fragment' ) ) { 
        function composer_woocommerce_header_add_to_cart_fragment( $fragments ) {
            global $woocommerce;
            
            ob_start();

            echo '<div class="pix-cart-contents-con">';             
                echo '<a class="pix-cart-contents" href="'. esc_url( $woocommerce->cart->get_cart_url() ) .'" title="'. esc_html__('View your shopping cart', 'composer' ) .'"><span class="pixicon-handbag pix-cart-icon"></span><span class="pix-item-icon">'. esc_html( $woocommerce->cart->cart_contents_count ) .'</span></a>';
            echo '</div>';
            
            $fragments['div.pix-cart-contents-con'] = ob_get_clean();
            
            return $fragments;
            
        }
    }

    add_filter( 'loop_shop_columns', 'composer_loop_columns' );
    if ( !function_exists( 'composer_loop_columns' ) ) {
        function composer_loop_columns() {
            return 4; // 3 products per row
        }
    }

		// Ajax Remove cart
	if ( ! function_exists( 'composer_flyin_cart_remove_item' ) ) {
		function composer_cart_remove_item() {

			$item_key = $_POST['item_key'];
			$cart = WC()->instance()->cart;
			$removed = $cart->remove_cart_item( $item_key );

			if( $removed ) {

				echo '<div>';
					// status
					echo '<div id="status">1</div>';

					// Woo Notice
					echo '<div id="amz-wc-notice">';
						wc_print_notices();
					echo '</div>';

					// Header Cart Count
					echo '<div id="amz-cart-count">'. intval( WC()->cart->cart_contents_count ) .'</div>';

					// Updated mini cart
					echo '<div id="amz-mini-cart">';
						woocommerce_mini_cart();
					echo '</div>';
				echo '</div>';

			} else {	
				// status
				echo '<div><div id="status">0</div></div>';
			}

			die();

		}
	}
	add_action( 'wp_ajax_nopriv_composer_cart_remove_item', 'composer_cart_remove_item' );
	add_action( 'wp_ajax_composer_cart_remove_item', 'composer_cart_remove_item' );

	function composer_update_mini_cart() {
		woocommerce_mini_cart();

		die();
	}
	add_filter( 'wp_ajax_nopriv_composer_update_mini_cart', 'composer_update_mini_cart' );
	add_filter( 'wp_ajax_composer_update_mini_cart', 'composer_update_mini_cart' );


    function composer_woocommerce_breadcrumbs() {
        return array(
                'delimiter'   => '',
                'wrap_before' => '<nav class="pix-breadcrumbs" itemprop="breadcrumb">',
                'wrap_after'  => '</nav>',
                'before'      => '',
                'after'       => '',
                'home'        => _x( 'Home', 'breadcrumb', 'woocommerce' ),
            );
    }
    add_filter( 'woocommerce_breadcrumb_defaults', 'composer_woocommerce_breadcrumbs' );
