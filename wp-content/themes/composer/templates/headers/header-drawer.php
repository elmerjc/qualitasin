<?php
/**
 * Header Drawer
 *
 * Header Drawer Template
 *
 * @author 		Theme Innwit
 * @version     1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$prefix = composer_get_prefix();

if( is_home() || is_search() || is_archive() || is_404() || composer_is_shop() ) {

	${$prefix.'header_layout'} = composer_get_option_value( $prefix.'header_layout', 'header-1' );
}
else{
	${$prefix.'header_layout'} = composer_get_meta_value( $id, '_amz_header_layout', 'default', 'page_header_layout', 'header-1' ); // id, meta_key, meta_default, themeoption_key, themeoption_default
}

// Check its not equal to Left or Right Header
if( 'left-header' != ${$prefix.'header_layout'}  || 'right-header' != ${$prefix.'header_layout'} ){
	
	//Check Header Drawer Enabled?
	$header_widget = composer_get_option_value( 'header_widget', 'hide' );

	if( 'show' === $header_widget ){ 

		//Get Header Widget Columns Settings
		$header_widget_col = composer_get_option_value( 'header_widget_col', 'col3' );

		//Header Widget Sidebar Name
		$sidebar_name = composer_get_option_value( 'header_select_sidebar', '0' );
		$sidebar_name = ( '0' == $sidebar_name ) ? 'header-widgets' : $sidebar_name;

		?>

		<div class="top-header-widget">
			<div id="headerWidgetCon" class="pageFooterCon">
				<div id="headerWidget" class="container  <?php echo esc_attr( $header_widget_col );  ?>">
					<!-- widgets -->
					<div class="row">

						<?php if ( is_active_sidebar( $sidebar_name ) ) : ?>

							<?php dynamic_sidebar( $sidebar_name ); ?>

						<?php else : ?>

							<!-- This content shows up if there are no widgets defined in the backend. -->

							<div>
								<p><?php esc_html_e( 'Please activate some Widgets Or disable it from theme option', 'composer' );  ?></p>
							</div>

						<?php endif; ?>
					</div><!-- widgets -->
				</div>
				<div class="toggleBtnCon"><a href="#" data-btn="close" class="toggleBtn open"><?php esc_html_e( 'Open', 'composer' ); ?></a></div>
			</div>
		</div>	

	<?php } // End of Header Drawer Condition

} // End of != Left or Right Header Condition