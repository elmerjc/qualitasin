<?php

/***********************************/
/* Custom Post types and metaboxes */
/***********************************/

function composer_create_menu(){

	$pix_dialog = 	
	'<div id="pix-dialog" class="pix-dialog">
		<div class="pix-content">
			<a class="close" href="#" title="Close"><span class="media-modal-icon"></span></a>
			<div class="title"><h2>'. esc_html__( 'Demo Title', 'composer' ) .'</h2><i class="pixicon-elegant-search" id="input-search-icon"></i><input type="text" id="icon-search" placeholder="'. esc_attr__( 'Enter icon by name', 'composer' ).'"><i class="pixicon-remove" id="reset-search-icon"></i></div>
			<div id="no-icon-result" style="display:none;">'. esc_html__( 'No Results found!', 'composer' ) .'</div>
			<div class="options"></div>
			<div class="footer">
				<a href="#" class="button media-button button-primary button-large media-button-insert">'. esc_html__( 'Insert Shortcode', 'composer' ) .'</a>
			</div>
		<div>
	</div>';
	
	echo "<script type='text/javascript'>\n";
	echo "var composer_dialog_globals = {};\n";
	//echo "siteURL = ".site_url()."\n";
	echo "composer_dialog_globals = " . json_encode( $pix_dialog ) . ";\n";
	echo "\n</script>";
}


function composer_admin_scripts($hook_suffix) {	

	if( 'post.php' == $hook_suffix || 'post-new.php' == $hook_suffix ) {
		/**
		  * Building Menu and submenu array
		  */
		add_filter( 'admin_print_scripts'	, 'composer_create_menu' );

		//Loading Css
		wp_enqueue_style('menu_font_style'	, get_template_directory_uri() ."/_css/pix-icons.css", array(),'3.0');

		//Icon Pop Dialog Css
		wp_enqueue_style('menu_style', COMPOSER_EXTRAS_URI ."/composer-menu-extend/css/style.css", array(),'3.0');
		
	} elseif ( 'nav-menus.php' == $hook_suffix ) {
		add_filter( 'admin_print_scripts'	, 'composer_create_menu' );
	}
	
}
add_action( 'admin_enqueue_scripts', 'composer_admin_scripts' );
