<?php

/**
 * WooThemes Media Library-composer AJAX File Uploader Module (2010-11-05)
 *
 * Slightly modified for use in the Options Framework.
 *
 * @since 1.0.0
 */

/**
 * Forces insert into post
*/

add_filter( 'get_media_item_args', 'force_send' );
function force_send($args){
	$args['send'] = true;
	return $args;
}

/**
 * Adds the Thickbox CSS file and specific loading and button images to the header
 * on the pages where this function is called.
 */

if ( ! function_exists( 'optionsframework_mlu_css' ) ) {

	function optionsframework_mlu_css () {
	
		echo '<link rel="stylesheet" href="' . esc_url(get_option('siteurl')) . '/' . WPINC . '/js/thickbox/thickbox.css" type="text/css" media="screen" />';
		echo "\n";
		echo '<script type="text/javascript">
		var tb_pathToImage = "' . get_option('siteurl') . '/' . WPINC . '/js/thickbox/loadingAnimation.gif";
	    var tb_closeImage = "' . get_option('siteurl') . '/' . WPINC . '/js/thickbox/tb-close.png";
	    </script>';
	    echo "\n";
		
	}

}

/**
 * Registers and enqueues (loads) the necessary JavaScript file for working with the
 * Media Library-composer AJAX File Uploader Module.
 */

if ( ! function_exists( 'optionsframework_mlu_js' ) ) {

	function optionsframework_mlu_js () {
	
		// Registers custom scripts for the Media Library AJAX uploader.
		wp_register_script( 'of-medialibrary-uploader', COMPOSER_ADMIN_DIR .'assets/js/of-medialibrary-uploader.js', array( 'jquery', 'thickbox' ) );
		wp_enqueue_script( 'of-medialibrary-uploader' );
		wp_enqueue_script( 'media-upload' );
	}

}

/**
 * Trigger code inside the Media Library popup.
 */

if ( ! function_exists( 'optionsframework_mlu_insidepopup' ) ) {

	function optionsframework_mlu_insidepopup () {
	
		if ( isset( $_REQUEST['is_optionsframework'] ) && $_REQUEST['is_optionsframework'] == 'yes' ) {
		
			add_action( 'admin_head', 'optionsframework_mlu_js_popup' );
			add_filter( 'media_upload_tabs', 'optionsframework_mlu_modify_tabs' );
		}
	}
}

if ( ! function_exists( 'optionsframework_mlu_js_popup' ) ) {

	function optionsframework_mlu_js_popup () {

		$_of_title = $_REQUEST['of_title'];
		if ( ! $_of_title ) { $_of_title = 'file'; } // End IF Statement
?>
	<script type="text/javascript">
	jQuery(function($) {
		
		jQuery.noConflict();
		
		// Change the title of each tab to use the custom title text instead of "Media File".
		$( 'h3.media-title' ).each ( function () {
			var current_title = $( this ).html();
			var new_title = current_title.replace( 'media file', '<?php echo esc_html( $_of_title ); ?>' );
			$( this ).html( new_title );
		
		} );
		
		// Change the text of the "Insert into Post" buttons to read "Use this File".
		$( '.savesend input.button[value*="Insert into Post"], .media-item #go_button' ).attr( 'value', 'Use this File' );
		
		// Hide the "Insert Gallery" settings box on the "Gallery" tab.
		$( 'div#gallery-settings' ).hide();
		
		// Preserve the "is_optionsframework" parameter on the "delete" confirmation button.
		$( '.savesend a.del-link' ).click ( function () {
		
			var continueButton = $( this ).next( '.del-attachment' ).children( 'a.button[id*="del"]' );
			var continueHref = continueButton.attr( 'href' );
			continueHref = continueHref + '&is_optionsframework=yes';
			continueButton.attr( 'href', continueHref );
		
		} );
		
	});
	</script>
<?php
	}
}

/**
 * Triggered inside the Media Library popup to modify the title of the "Gallery" tab.
 */

if ( ! function_exists( 'optionsframework_mlu_modify_tabs' ) ) {

	function optionsframework_mlu_modify_tabs ( $tabs ) {
		$tabs['gallery'] = str_replace( esc_html__( 'Gallery', 'composer' ), esc_html__( 'Previously Uploaded', 'composer' ), $tabs['gallery'] );
		return $tabs;
	}
}
