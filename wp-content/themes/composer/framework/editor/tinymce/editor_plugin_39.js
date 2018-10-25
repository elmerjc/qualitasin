;(function($) {
	
	"use strict";
	
	window.menu = [];

	var pluginName = 'composer_shortcodes_button', pix_menu = pix_menu_globals;

    // Register plugin
    tinymce.PluginManager.add( pluginName, function( ed, url ) {

    	var j = -1, z=-1, checkSub = false, checkMain = false;
    	window.s = ed;
    	$.each( pix_menu, function( i, items ) {
    		
    		switch(items.type){
    			
    			case 'mainMenu':
    				checkMain = true;
    				j++;
    				window.menu.push({text: items.title});
    				window.menu[j]['menu'] = [];
    			  break;
    			  
    			case 'subMenu':
    				checkSub = true;
    				z++;
    				//subMenu = mainMenu.addMenu({title: items.title});
    				window.menu[j]['menu'].push({text: items.title});
    				window.menu[j]['menu'][z]['menu'] = [];
    			  break;  
    			  
    			case 'menuItem':    				

    				if (checkSub) {
    					z++;
    					checkSub = false;
    				}

    				window.menu[j]['menu'].push({
						text: items.title,
						onclick: function() {

							//items.title, items.name, items.selText
							if(items.insertType === 'instant'){
								ed.execCommand( 'instantInsert', false, { 
										title: items.title,
										sc: items.name,											
										includeSelectedText: items.selText
								} );
							}else{
								ed.execCommand( 'openDialog', false, {
									title: items.title,
									sc: items.name
								});
							}

						}
					});

    			  break;
    			  
    			 case 'submenuItem':
    			 	window.menu[j]['menu'][z]['menu'].push({
			 			text: items.title,
			 			onclick: function() {

			 				//items.title, items.name, items.selText
			 				if(items.insertType === 'instant'){
			 					ed.execCommand( 'instantInsert', false, { 
			 							title: items.title,
			 							sc: items.name,											
			 							includeSelectedText: items.selText
			 					} );
			 				}else{
			 					ed.execCommand( 'openDialog', false, {
			 						title: items.title,
			 						sc: items.name
			 					});
			 				}

			 			}
			 		});
    			  break; 
    			  
    			default:
    				j++;    					
    				window.menu.push({
    					text: items.title,
    					onclick: function() {

    						//items.title, items.name, items.selText
    						if(items.insertType === 'instant'){
    							ed.execCommand( 'instantInsert', false, { 
    									title: items.title,
    									sc: items.name,											
    									includeSelectedText: items.selText
    							} );
    						}else{
    							ed.execCommand( 'openDialog', false, {
    								title: items.title,
    								sc: items.name
    							});
    						}

    					}
    				});
    		}
    	});

		//Register a command to open the dialog.
		ed.addCommand( "openDialog", function( ui, args ){
			new $.PixShortcodes( args );
		});

		//Register a command to Instant Insert the dialog.
		ed.addCommand( "instantInsert", function( ui, val ){
			var insertSc;
			
			if(val.includeSelectedText === true){
				var selectedText = ( ed.selection.getContent({format: 'text'}).length > 0 ) ? ed.selection.getContent({format: 'text'}) : '';
				insertSc = '[' + val.sc + ']' + selectedText + '[/' + val.sc + ']';
			}else{
				insertSc = val.sc;
			}
			
			ed.insertContent( insertSc );
		});

        // Adding a button
		ed.addButton( pluginName, {
			type: 'menubutton',
			text: 'Shortcodes',
			icon: 'px-sc-icon',
			classes: 'btn mce_pixel8es_shortcodes_button',
			tooltip: 'Insert Shortcode',
			menu: window.menu
		});
		

    });


})(jQuery);
