<?php
/*
Plugin Name: Extreme Vc Copy Paster Basic
Plugin URI: http://amazee.co
Description: Extreme Addons consists of lots useful elements like icon box, info box, pricing table, Team, anything carusel etc
Version: 1.0.2
Author: Amazee
Author URI: http://amazee.co
License: http://codecanyon.net/licenses
Text Domain: vc_extreme
*/

// don't load directly
if ( ! defined( 'ABSPATH' ) ) die('-1');

if(!defined('AMZ_VC_CP_REQUIRED_VERSION')){
    define('AMZ_VC_CP_REQUIRED_VERSION', '4.12');
}
if(!defined('AMZ_VC_CP_VERSION')){
    define('AMZ_VC_CP_VERSION', '1.0.2');
}

if( ! function_exists( 'amz_is_multisite_admin' ) ) {
    function amz_is_multisite_admin() {
        $is_multisite = is_multisite();
        $is_network_admin = is_network_admin();
        if ( $is_multisite && $is_network_admin ) {
            return true;
        } else {
            return false;
        }
    }
}


function vc_extreme_copy_paste_notice() {
    $plugin_data = get_plugin_data(__FILE__);
    echo '<div class="updated"><p>' . sprintf(__( '<strong>%s</strong> requires <strong><a href="http://bit.ly/vcomposer" target="_blank">Visual Composer</a></strong> plugin to be installed and activated on your site.', 'vc_extreme'), $plugin_data['Name'] ) . '</p></div>';

}

function vc_extreme_copy_paste_notice_version() {
    $plugin_data = get_plugin_data(__FILE__);
    echo '<div class="updated"><p>' . sprintf( __('<strong>%s</strong> requires <strong>%s</strong> version of <strong><a href="http://bit.ly/vcomposer" target="_blank">Visual Composer</a></strong> plugin to be installed and activated on your site. Current version is %s.', 'vc_extreme'), $plugin_data['Name'], AMZ_VC_CP_REQUIRED_VERSION, WPB_VC_VERSION ) . '</p></div>';
}


// Get directory path of this plugin.
$dir = dirname(__FILE__);
$plugins_url = plugins_url( '', __FILE__ );

if( ! defined( 'VC_COPY_PASTE_DIR' ) ) {
    define('VC_COPY_PASTE_DIR', $dir);
}

if( ! defined( 'VC_COPY_PASTE_DIR_URL' ) ) {
    define('VC_COPY_PASTE_DIR_URL', $plugins_url);
}

/**
 * Registry hooks
 */

register_activation_hook(__FILE__, 'vcext_plugin_activated' );

function vcext_plugin_activated() {

}


if( class_exists( 'AmzVcCopyPaster' ) ) {
    return;  
} 

add_action('admin_init', 'vc_extreme_copy_paste_init');
/**
 * Initialize Templatera with init action.
 */
function vc_extreme_copy_paste_init() {
    /*
        Display notice if Visual Composer is not installed or activated.
    */
    $dir = dirname(__FILE__);
    
    if ( defined('WPB_VC_VERSION') ) {

        if( version_compare( WPB_VC_VERSION, AMZ_VC_CP_REQUIRED_VERSION ) < 0 ) {
            if ( amz_is_multisite_admin() ) {
                add_action('network_admin_notices','vc_extreme_copy_paste_notice_version');
            } else {
                add_action('admin_notices', 'vc_extreme_copy_paste_notice_version');
            }
            return;
        } else {

            require_once ( $dir. '/includes/helpers.php' );
            require_once ( $dir. '/includes/class.vc.extreme.copy.paster.php' );
            AmzVcCopyPaster::get_instance( $dir );

        }

    } else {
        
        if ( amz_is_multisite_admin() ) {
            add_action('network_admin_notices','vc_extreme_copy_paste_notice');
        } else {
            add_action('admin_notices', 'vc_extreme_copy_paste_notice');
        }
        return;
    }
    
}

