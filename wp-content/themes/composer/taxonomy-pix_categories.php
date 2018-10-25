<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

get_header();

$class = composer_check_vc_active();

$current_term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
$parent_term = ( $current_term->parent != 0 ) ? get_term_by( 'id', $current_term->parent, get_query_var( 'taxonomy' ) ) : '';

if( isset( $current_term->slug ) ) :

	$composer_no_of_items     = composer_get_option_value( 'portfolio_cat_no_of_items', 6 );
	$composer_portfolio_style = composer_get_option_value( 'portfolio_cat_portfolio_style', 'grid' );
	$composer_style           = composer_get_option_value( 'portfolio_cat_style', 'style1' );
	$composer_show_menu       = composer_get_option_value( 'portfolio_cat_show_menu', 'sub_cat' );
	$composer_filter          = composer_get_option_value( 'portfolio_cat_filter', 'yes' );
	$composer_sub_category    = composer_get_option_value( 'portfolio_cat_show_sub_category_only', 'yes' );
	$composer_search          = composer_get_option_value( 'portfolio_cat_search', 'no' );

?>
	
	<div id="primary" class="content-area">
		
		<main id="main" class="no-portfolio-carousel site-main portfolio-category-page<?php echo esc_attr( $class ); ?>">

			<?php

			echo do_shortcode('[portfolio insert_type="category" portfolio_category="'. esc_attr( $current_term->slug ) .'" no_of_items="'. esc_attr( $composer_no_of_items ) .'" portfolio_style="'. esc_attr( $composer_portfolio_style ) .'" style="'. esc_attr( $composer_style ) .'" pix_filterable="'. esc_attr( $composer_filter ) .'" show_sub_category_only="'. esc_attr( $composer_sub_category ) .'" show_search="'. esc_attr( $composer_search ) .'"]' );
			?>

		</main> <!-- #main -->

	</div> <!-- #primary -->

<?php endif; // if( isset( $term->slug ) ) :

get_footer();

