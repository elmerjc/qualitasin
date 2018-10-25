;(function($) {
	
	"use strict";
	
	var pluginName = 'composer_shortcodes_button';
		
    tinymce.create('tinymce.plugins.'+ pluginName, {
        

		//Initializes the plugin, this will be executed after the plugin has been created.         
		init : function(ed, url) {
			
			ed.addCommand( "openDialog",function( i, args ){
				new $.PixShortcodes( args );
			});
		},
 
       
		//Creates control instances based in the incomming name.          
        createControl : function( controlName , controlManager ) {
			
			
			if ( controlName !== pluginName ) return null;
			
			var self = this;	
			//Create Button
			var btn = controlManager.createMenuButton( pluginName , {
				title:"Insert Shortcodes"
			}), pix_menu = pix_menu_globals;
			
			//Adding Dropdown Mnenu
			btn.onRenderMenu.add( function ( menuBtn, menu ) {
				var subMenu, mainMenu, fn;
				$.each( pix_menu, function( i, items ) {
					
					switch(items.type){
						
						case 'mainMenu':
							mainMenu = menu.addMenu({title: items.title});
						  break;
						  
						case 'subMenu':
							subMenu = mainMenu.addMenu({title: items.title});
						  break;  
						  
						case 'menuItem':
							(items.insertType === 'instant') ?  
								self.instantInsert(mainMenu, items.title, items.name, items.selText) :
								self.openPopup(mainMenu, items.title, items.name); 
						  break;
						  
						 case 'submenuItem':
						 	(items.insertType === 'instant') ?
								self.instantInsert(subMenu, items.title, items.name, items.selText): 
								self.openPopup(subMenu, items.title, items.name); 
						  break; 
						  
						 case 'separator':
						  	menu.addSeparator();
						  break; 
						  
						default:
							(items.insertType === 'instant') ?
								self.instantInsert(menu, items.title, items.name, items.selText):
								self.openPopup(menu, items.title, items.name);	
					}
				});		
			});
			
			return btn;
            	
        },
		
		/*Insert Content immediately 
			title is shortcode title,
			sc is actual shortcode,
			includeSelectedText is a boolean which put selcted text in editor inbetween shortcodes
		*/
		instantInsert: function( menu, title, sc, includeSelectedText ){

			menu.add({
				title: title,
				onclick:function(){
					var insertSc;
					
					if(includeSelectedText === true){
						var selectedText = ( tinymce.activeEditor.selection.getContent().length > 0 ) ? tinymce.activeEditor.selection.getContent() : '';
						insertSc = '[' + sc + ']' + selectedText + '[/' + sc + ']';
					}else{
						insertSc = sc;
					}
					
					tinyMCE.activeEditor.execCommand("mceInsertContent", false, insertSc);
				}
			});
		},
		
		//Open Popup Window
		openPopup: function( menu, title, sc ){

			menu.add({
				title: title,
				onclick:function(){					
					tinyMCE.activeEditor.execCommand("openDialog",false,{
						title: title,
						sc: sc
					});
				}
			});
		},
		
		
		//getInfo
        getInfo : function() {
            return {
                longname	: 'Pixel8es Shortcodes Buttons',
                author		: 'Shahul Hameed',
                authorurl	: 'http://pixel8es.com',
                infourl		: 'http://pixel8es.com',
                version		: '1.0'
            };
        }
    });
 
    // Register plugin
    tinymce.PluginManager.add( pluginName, tinymce.plugins[pluginName] );


})(jQuery);
