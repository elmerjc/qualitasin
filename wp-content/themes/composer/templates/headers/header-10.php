<?php
/**
 * Pixel8es Header 10
 *
 * Header 10 Template
 *
 * @author 		Pixel8es
 * @version     1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$composer_prefix = composer_get_prefix();

if ( $composer_prefix != '' ) {

	$composer_id = get_the_ID();

	${'composer_'.$composer_prefix.'display_menu'} = composer_get_meta_value( $composer_id, '_amz_display_menu', 'default', 'display_menu', 'show' ); // id, meta_key, meta_default, themeoption_key, themeoption_default

}
 
?>

<header class="header" role="banner" itemscope itemtype="http://schema.org/WPHeader">

	<div class="container">

		<div id="inner-header" class="wrap clearfix">

			<?php echo composer_get_logo(); ?>

			<?php if( ${'composer_'.$composer_prefix.'display_menu'} != 'hide' ) { ?>
				<div id="overlay-menu-wrap">
					<div class="menu-trigger">
						<span class="overlay-menu">menu</span>
					</div>
				</div>

				<div class="overlay overlay-effect">
					<div class="overlay-inner-wrap">
						<div class="overlay-inner">
							<button type="button" class="overlay-close">Close</button>
							<nav class="main-nav" role="navigation">
								<?php 

								composer_main_nav(); 

								?>

								<?php echo composer_social_icons(); ?>
							</nav>

						</div>
					</div>

				</div>
			<?php } ?>

		</div>

	</div>

</header>