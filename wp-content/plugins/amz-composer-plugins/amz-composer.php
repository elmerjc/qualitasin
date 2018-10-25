<?php
/*
	Plugin Name: Composer Core Plugins
	Plugin URI: http://themeforest.net
	Description: Core plugin for the composer theme.
	Version: 3.0.3
	Author: Theme Innwit
	Author URI: http://www.innwithemes.com
	Text Domain: amz-composer-plugins
	Domain Path: /languages/
*/


if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}


/*
 * The Ocean Core Plugins Iniatialize class
 */
class Composer_Base_Plugin {

	public function __construct(){
		//Initialize folders as super global variables
		define( 'AMAZEE_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

		define( 'AMAZEE_PLUGIN_URL', plugins_url( '', __FILE__ ) );

		define( 'AMAZEE_CLASS_DIR', plugin_dir_path( __FILE__ ).'class/' );

		define( 'AMAZEE_INC_DIR', plugin_dir_path( __FILE__ ).'includes/' );

		define( 'AMAZEE_STATUS_DIR', plugin_dir_path( __FILE__ ).'system-status/' );

		define( 'AMAZEE_STATUS_URL', plugins_url( '', __FILE__ ).'/system-status/' );
		
		// call plugin text-domain
		add_action( 'plugins_loaded', array( $this, 'amz_load_plugin_textdomain' ) );

		// call metabox iniatialization
		add_action( 'init', array( $this, 'init_metabox' ) );

		// call posttype iniatialization
		add_action( 'init', array( $this, 'init_posttype' ) );

		// Add admin menus
		add_action( 'admin_menu', array( $this, 'admin_menu' ) );

		add_action( 'admin_enqueue_scripts', array( $this, 'register_system_status' ) );

		// Required Files
		require( AMAZEE_CLASS_DIR . 'class-post-types.php' );
		require( AMAZEE_CLASS_DIR . 'class-metaboxes.php' );

		require( AMAZEE_INC_DIR . 'visual-composer/vc_init.php' );

		require( AMAZEE_PLUGIN_DIR . 'demo-importer/init.php' );
		
		register_activation_hook( __FILE__, array( $this, 'activationHook' ) );

	}

	function activationHook() {

		if ( in_array( 'js_composer/js_composer.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {

			$vc_editor_post_types = vc_editor_post_types();

			if ( ! in_array('pix_portfolio', $vc_editor_post_types) ) {

				array_push( $vc_editor_post_types, 'pix_portfolio' );

				vc_editor_set_post_types( $vc_editor_post_types );
				
			}

		}

	}
	
	/* Load Text Domain */
	function amz_load_plugin_textdomain() {
	    load_plugin_textdomain( 'amz-composer-plugins', false, plugin_basename( dirname( __FILE__ ) ) . '/languages' );
	}

	/* Iniatialize Metaboxes */
	function init_metabox() {

		//Default Page
		require_once( AMAZEE_INC_DIR . 'metaboxes/page-metabox.php' );

		//Post Metabox
		require_once( AMAZEE_INC_DIR . 'metaboxes/post-metabox.php' );

		//Portfolio Metabox
		require_once( AMAZEE_INC_DIR . 'metaboxes/portfolio-metabox.php' );

		if( class_exists( 'Tribe__Events__Main' ) ) {
			// Event Tribe Metabox
			require_once( AMAZEE_INC_DIR . 'metaboxes/event-tribe-metabox.php' );
		}
	}

	/* Iniatialize Post Types */
	function init_posttype() {

		//Staff Post Type Metabox
		require_once( AMAZEE_INC_DIR . 'posttypes/posttypes.php' );
	}

	/* Initialize System Status Menu */
	public function admin_menu() {

		$page = add_submenu_page( 'themes.php', esc_html__( 'System Status', 'amz-composer-plugins' ), esc_html__( 'System Status', 'amz-composer-plugins' ), 'edit_themes', 'system_status', array( $this, 'system_status' ) );
	}

	public function system_status() {

		//System status page
		require_once( AMAZEE_STATUS_DIR . 'system-status.php' );

	}

	/**
	 * Scripts and styles for system status
	 */
	public function register_system_status() {

		wp_enqueue_script( 'system-status-js', AMAZEE_STATUS_URL . '/assets/js/system-status.js', array( 'jquery' ), '1.0', true );
		wp_enqueue_style( 'system-status-css', AMAZEE_STATUS_URL . '/assets/css/system-status.css', null, '1.0' );
	}
	
}

$Composer_Base_Plugin = new Composer_Base_Plugin();
