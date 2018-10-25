_.templateSettings.interpolate = /\{\{(.*?)\}\}/g;

var AmzVcpTemplates = {},
	AmzVcpHTML = {};

AmzVcpHTML.Buttons = {

			copy: {
				classname: 'vc_control-btn amz_control_copy vc_control-btn-copy',
				html: '<span class="vc_btn-content"><span class="icon"></span></span>',
				title: 'Copy'
			},

			copyPlus: {
				classname: 'vc_control-btn amz_control_copyplus vc_control-btn-copy',
				html: '<span class="vc_btn-content"><span class="icon"></span></span>',
				title: 'Copy +'
			},

			pasteBelow: {
				classname: 'amz-vcp-row-bottom-btn',
				html: 'Paste Below',
				title: 'Paste Below this Row'
			},
			
			viewScString: {
				classname: 'vc_control-btn amz_control_view_sc vc_control-btn-copy',
				html: '<span class="vc_btn-content"><span class="icon"></span></span>',
				title: 'View Shortcode'
			}

		};

/* View shortcode dialog */
AmzVcpHTML.ViewShortcodeDialog = [
	'<div class="vc_ui-panel-window-inner">',

		// window header
		'<div class="vc_ui-post-settings-header-container vc_ui-panel-header-container vc_ui-panel-header-o-stacked-bottom ui-draggable-handle">',
			'<div class="vc_ui-panel-header">',
				'<div class="vc_ui-panel-header-controls">',
					'<button type="button" class="close vc_general vc_ui-control-button vc_ui-close-button">',
						'<i class="vc_ui-icon-pixel vc_ui-icon-pixel-close"> </i>',
					'</button>',
				'</div>',
				'<div class="vc_ui-panel-header-header vc_ui-grid-gap">',
					'<h3 id="amz-vcp-title" class="vc_ui-panel-header-heading"></h3>',
				'</div>',
			'</div>',
		'</div>',

			// window footer
		'<div class="vc_ui-panel-content-container">',
			'<div class="vc_ui-panel-content vc_properties-list vc_edit_form_elements">',
				'<textarea id="amz-sc-string-textarea"></textarea>',
			'</div>',
		'</div>',

			//"<!-- param window footer-->",
		'<div class="vc_ui-panel-footer-container">',
			'<div class="vc_ui-panel-footer">',
				'<div class="vc_ui-button-group">',
						'<span class="vc_general close vc_ui-button vc_ui-button-default vc_ui-button-shape-rounded vc_ui-button-fw">Close</span>',
				'</div>',
			'</div>',
		'</div>',
	'</div>'

].join("");

/*for ( var temp in AmzVcpTemplates ) {
	if( AmzVcpTemplates.hasOwnProperty( temp ) ) {
		AmzVcpTemplates[temp] = _.template( AmzVcpTemplates[temp] );
	}
}*/
