<?php
	
	/********************/
	/* Define Constants */
	/********************/
	define('COMPOSER_NAME', 'composer');

	define('COMPOSER_DIR', get_template_directory());
	define('COMPOSER_URI', get_template_directory_uri());
		
	define('COMPOSER_FRAMEWORK',     COMPOSER_DIR . '/framework');
	define('COMPOSER_FRAMEWORK_URI', COMPOSER_URI . '/framework');

	//Wordpress Admin
	define( 'COMPOSER_ADMIN',			COMPOSER_FRAMEWORK . 		'/admin' );
	define( 'COMPOSER_ADMIN_URI',		COMPOSER_FRAMEWORK_URI . 	'/admin' );

	define( 'COMPOSER_CUSTOMIZER',			COMPOSER_FRAMEWORK . 		'/customizer' );
	define( 'COMPOSER_CUSTOMIZER_URI',		COMPOSER_FRAMEWORK_URI . 	'/customizer' );

	define('COMPOSER_CUSTOM_STYLES',		COMPOSER_FRAMEWORK . 		'/custom_styles');
	define('COMPOSER_CUSTOM_STYLES_URI', 	COMPOSER_FRAMEWORK_URI . 	'/custom_styles');
		
	define('COMPOSER_PLUGINS', 		 COMPOSER_FRAMEWORK . 		'/plugins');
	define('COMPOSER_PLUGINS_URI', 	 COMPOSER_FRAMEWORK_URI . 	'/plugins');	
	define( 'COMPOSER_HELPERS',				COMPOSER_FRAMEWORK . 		'/helpers' );
	define( 'COMPOSER_HELPERS_URI',			COMPOSER_FRAMEWORK_URI .   '/helpers' );
	define('COMPOSER_FUNCTIONS', 		 COMPOSER_FRAMEWORK . 		'/required-functions');
	define('COMPOSER_FUNCTIONS_URI',	 COMPOSER_FRAMEWORK_URI .  '/required-functions');
	define('COMPOSER_WIDGETS', 		 COMPOSER_FRAMEWORK . 		'/widgets');
	define('COMPOSER_ADMIN_EDITOR', 	 COMPOSER_FRAMEWORK . 		'/editor');
	define('COMPOSER_ADMIN_EDITOR_URI', COMPOSER_FRAMEWORK_URI .  '/editor');
	define('COMPOSER_ADMIN_OPTION',	 COMPOSER_FRAMEWORK .		'/theme-options');
	define( 'COMPOSER_EXTRAS',			COMPOSER_FRAMEWORK . 		'/extras' );
	define( 'COMPOSER_EXTRAS_URI',		COMPOSER_FRAMEWORK_URI . 	'/extras' );
	
	composer_require_file(COMPOSER_FRAMEWORK. '/tgm-config.php'); //Install required plugins

	composer_require_file (COMPOSER_ADMIN_OPTION . 	'/theme-option.php'); //Theme Option Page
	
	composer_require_file ( COMPOSER_HELPERS .			'/helpers.php' ); //Helper ThemeFuntion
	
	composer_require_file ( COMPOSER_HELPERS .			'/header-helpers.php' ); //Theme Header functions

	composer_require_file ( COMPOSER_HELPERS .			'/blog-helpers.php' ); //Theme Header functions

	composer_require_file ( COMPOSER_HELPERS .			'/customizer-helpers.php' ); //Theme Customizer Helper functions
	

	if ( class_exists( 'WooCommerce' ) ) {
		composer_require_file ( COMPOSER_HELPERS .			'/woo-helpers.php' ); //Theme Header functions
	}

	if ( class_exists( 'WPBakeryVisualComposerAbstract' ) ) {

	    vc_set_shortcodes_templates_dir(  COMPOSER_FRAMEWORK . '/vc_templates/' );

	    require_once ( COMPOSER_DIR .		'/blocks/blocks.php' );

	    require_once( COMPOSER_FRAMEWORK . '/vc_templates/extend_vc/extend_vc.php' );

		require_once locate_template('/framework/vc_templates/extend_vc/templates.php');
	        
	}

	// Single Blog
	require_once ( COMPOSER_DIR .		'/single-blog/class-single-blog.php' );

	composer_require_file( COMPOSER_EXTRAS. 		'/extras.php' ); //Install required plugins
	
	composer_require_file (COMPOSER_ADMIN_EDITOR . 	'/init_button.php'); //Shortcode Insert Button	

	/* Admin File */
	composer_require_file ( COMPOSER_ADMIN . '/admin.php' );
	
	if( is_customize_preview() ){
		composer_require_file ( COMPOSER_CUSTOMIZER . '/customizer.php' );
	}
	

	composer_require_file ( COMPOSER_WIDGETS . '/widgets.php' ); //All Widgets
	
	/*******************/
	/* Include Plugins */
	/*******************/
	composer_require_file ( COMPOSER_PLUGINS . '/plugins.php' );

