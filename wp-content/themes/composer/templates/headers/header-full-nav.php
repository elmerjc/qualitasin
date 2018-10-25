<?php
/**
 * Header Main
 *
 * Main Header with logo left and Nav Right
 *
 * @author 		Theme Innwit
 * @version     1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$flyin_sidebar = composer_get_option_value( 'flyin_sidebar', 'off' );

$composer_prefix = composer_get_prefix();

if ( $composer_prefix != '' ) {

	$composer_id = get_the_ID();

	${'composer_'.$composer_prefix.'display_menu'} = composer_get_meta_value( $composer_id, '_amz_display_menu', 'default', 'display_menu', 'show' ); // id, meta_key, meta_default, themeoption_key, themeoption_default

}
 
?>

<header class="header">

	<div class="container">

		<div id="inner-header" class="wrap clearfix">

			<?php echo composer_get_logo(); ?>

			<?php if( ${'composer_'.$composer_prefix.'display_menu'} != 'hide' ) { ?>
			<div class="pix-menu">
				<div class="pix-menu-trigger">
					<span class="mobile-menu"><?php esc_html_e( 'Menu', 'composer' ); ?></span>
				</div>
			</div>
			<?php } ?>
			
			<div class="right-side-wrap">
				<div class="right-side-inner clearfix">
					<?php
						$main_sorter = array( 
							"left" => array (
								"placebo" 		=> "placebo", //REQUIRED!
								"email"		=> "Email",
								"tel"		=> "Telephone",		
							),
							"right" => array (
								"placebo" 		=> "placebo", //REQUIRED!
								"lang"		=> "WPML Language Selector",
								"search_icon"	=> "Search Icon",
								"cart"		=> "WooCommerce cart"
							)
						);

						$main_sorter_right = composer_get_option_array_value('main_sorter','right', $main_sorter['right'] );
						foreach ( $main_sorter_right as $key => $value ) {
							composer_display_header_elements( $key, 'lang-list-wrap', 'page-top-main' );
						} 
					?>
				</div>

				<?php if( 'on' === $flyin_sidebar ){ ?>
					<div class="pix-flyin-sidebar">
						<div class="pix-flyin-trigger">
							<span><?php esc_html_e( 'Flyin Sidebar', 'composer' ); ?></span>
						</div>
					</div>
				<?php } ?>
			</div>

		</div>

	</div>

</header>


<div class="menu-wrap">

	<div class="container">
		<div class="menu-inner-wrap">	
			<nav class="main-nav">
				<?php composer_main_nav(); ?>
			</nav>

		</div>
	</div>

</div>