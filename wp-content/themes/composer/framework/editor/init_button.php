<?php

$pluginname = 'composer_shortcodes_button';
$pix_base_dir = get_template_directory_uri() . '/framework/editor';

function composer_shortcodes_button() 
{	
   // Only add hooks when the current user has permissions AND is in Rich Text editor mode
   if ( current_user_can('edit_posts') && current_user_can('edit_pages') && get_user_option('rich_editing') == 'true' )
	{
		//Loading necessary Files
		add_action( 'admin_enqueue_scripts'	, 'composer_admin_enqueue' );

		add_filter('mce_external_plugins'	, 'composer_shortcodes_tinymce_plugin');
		add_filter('mce_buttons'			, 'composer_register_buttons');
		add_filter( 'admin_print_scripts'	, 'composer_tinymce_create_menu', 99 ); 
		add_action('wp_ajax_pix_sc_options'	, 'composer_sc_options');
	}
}

function composer_admin_enqueue($hook_suffix){
	if( 'post.php' == $hook_suffix || 'post-new.php' == $hook_suffix ){
		//Shortcode Generator Required Files
		wp_enqueue_style('tinymce_style'	, COMPOSER_ADMIN_EDITOR_URI ."/tinymce/css/style.css");
		wp_enqueue_script('composer_tinymce', COMPOSER_ADMIN_EDITOR_URI ."/tinymce/js/dialog.js", array('jquery'), '0.1');
	}
}

function composer_tinymce_create_menu(){
	
	/**
	  * Building Menu and submenu array
	  */
	$pix_dialog = 	
	'<div id="pix-dialog" class="pix-dialog">
		<div class="pix-content">
			<a class="close" href="#" title="Close"><span class="media-modal-icon"></span></a>
			<div class="title"><h2>Demo Title</h2><i class="pixicon-elegant-search" id="input-search-icon"></i><input type="text" id="icon-search" placeholder="Enter icon by name"><i class="pixicon-remove" id="reset-search-icon"></i></div>
			<div id="no-icon-result" style="display:none;">'. esc_html__('No Results found!', 'composer') .'</div>
			<div class="options"></div>
			<div class="footer">
				<a href="#" class="button media-button button-primary button-large media-button-insert">Insert Shortcode</a>
			</div>
		<div>
	</div>';

	$pix_menu = array();


	$pix_menu[] = array( 	
					"title"		=> "Emphasis",	//Menu Title
					"name"		=> "emphasis",		//shortcode Name
					"insertType" => "popup"	
						);			
						
	$pix_menu[] = array( 	
					"title"		=> "Dropcaps",	
					"name"		=> "dropcaps",		
					"insertType" => "popup"
						);	

	$pix_menu[] = array( 	
					"title"		=> "BlockQuote",	//Menu Title
					"name"		=> "quote",		//shortcode Name
					"insertType" => "popup"	
						);

	$pix_menu[] = array( 	
					"title"		=> "ToolTip",	//Menu Title
					"name"		=> "tooltip",		//shortcode Name
					"insertType" => "popup"	
						);

	$pix_menu[] = array( 	
					"title"		=> "Highlight",	
					"name"		=> "highlight",		
					"insertType" => "instant",
					"selText" 	=> true
						);
	
	echo "<script type='text/javascript'>\n";
	echo "var pix_menu_globals = {}, composer_dialog_globals = {};\n";
	echo "composer_dialog_globals = " . json_encode($pix_dialog) . ";\n";
	echo "pix_menu_globals = " . json_encode($pix_menu) . ";\n";
	echo "\n</script>";	
}
 
function composer_register_buttons($buttons) {
   array_push($buttons, "separator", "composer_shortcodes_button");
   return $buttons;
}
 
// Load the TinyMCE plugin
function composer_shortcodes_tinymce_plugin($plugin_array) {
   global $pix_base_dir;
   global $wp_version;
	$suffix = '';
	if ( '3.9' <= $wp_version ) {
		$suffix = '_39';
	}
   $plugin_array['composer_shortcodes_button'] = get_template_directory_uri() . '/framework/editor/tinymce/editor_plugin'. $suffix .'.js';
   return $plugin_array;
}

function composer_sc_options(){
	$pix_options = 'Options Not Set';
	$sc_file_name = isset($_REQUEST['pix_sc']) ? $_REQUEST['pix_sc'] : 'Not set';
	require_once( COMPOSER_ADMIN_EDITOR .'/shortcodes/' . $sc_file_name .'.php');
    echo json_encode( $pix_options );
	
	die();
}
 
// init process for button control
add_action('init', 'composer_shortcodes_button');

?>