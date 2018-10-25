<?php
/**
 * The Template for displaying all single products.
 *
 * Override this template by copying it to yourtheme/woocommerce/single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

get_header( 'shop' );

$page_layout = composer_get_option_value( 'single_shop_sidebar', 'full-width' );
$selected_sidebar_replacement = composer_get_option_value( 'single_shop_select_sidebar', 0 );

		/**
		 * woocommerce_before_main_content hook
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		do_action( 'woocommerce_before_main_content' );
		
		if ( $page_layout == 'right-sidebar' || $page_layout == 'left-sidebar' ) {
			echo '<div class="row padding-top">';

			echo '<div class="col-md-9 '. esc_attr($page_layout ).'">';
		}
	?>

		<?php while ( have_posts() ) : the_post(); ?>

			<?php wc_get_template_part( 'content', 'single-product' ); ?>

		<?php endwhile; // end of the loop. ?>

	<?php

		if ( $page_layout == 'right-sidebar' || $page_layout == 'left-sidebar' ) {

			echo '</div>'; //col-md-9

			//If the sidebar position is right or left sidebar, it ll apply
			if( 'full-width' != $page_layout ){
				composer_sidebar( $selected_sidebar_replacement , 'single-shop' );
			}

			echo '</div>'; //row
		}
		
		/**
		 * woocommerce_after_main_content hook
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' );
	?>

<?php get_footer( 'shop' ); ?>