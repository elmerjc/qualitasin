<?php

	/* Visual Composer: Initialize
	================================================== */
	
	// Include external shortcodes
	function amz_external_shortcodes() {
		require_once( AMAZEE_INC_DIR . 'visual-composer/shortcodes/external_shortcodes.php' );
	}
	add_action( 'init', 'amz_external_shortcodes' );

	if ( in_array( 'js_composer/js_composer.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
		
		
		if ( is_admin() ) {
			// Include external elements
			function amz_external_vc_elements() {             

				require_once( AMAZEE_INC_DIR . 'visual-composer/vc_templates/extend_vc/extend_vc.php' );

			}
			add_action( 'vc_build_admin_page', 'amz_external_vc_elements' );
		}

	}
