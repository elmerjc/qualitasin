/*
 * jQuery load icons
 * http://pixel8es.com
 *
 * Copyright (c) 2013 Shahul Hameed (http://pixel8es.com)
 * 
 * @version 1.0
 *
 */

;(function($, window, document, undefined){
	'use strict';

	$.PixMenuIcons = function($elem){
		this.el = composer_dialog_globals;
		this.$elem = $elem;
		this.selectedIcon = '';
		this.$el = $( this.el );
		this.init();
	};
	
	$.PixMenuIcons.prototype = {

		init: function() {
			var self = this, 
				$el = self.$el, 
				$check_overlay = $('.pix-overlay'),
				$check_dialog = $('.pix-dialog');

			if($check_dialog.length > 0 || $check_dialog > 0 ){
				return;
			}
			
			self.$el.appendTo('body');

			window.setTimeout(function(){self.$el.addClass("pix-show")}, 100);
			
			$('<div>',{
				class: 'pix-overlay'
			}).appendTo('body');
			
			$('body').addClass('pix-hide-scroll');
			
			self.$content = self.$el.find('.options');
			
			//Changing Title
			self.$el.find('h2').html('Insert Icon');

			self.loadScOptions();
		},
		
		loadScOptions : function() {
			var self = this;

			self.bindEvents();
			self.fetch().done(function(options){

				self.$el.css('background-image','none');			
				self.buildFrag(options);
				self.display(self.$content);
				self.icons();
			});
		},

		//Fetch and return json Data
		fetch : function() {
			return $.ajax({
				type: "POST",
				dataType : "json",
				url : ajaxurl,	
				data: { action: 'composer_load_icon_fonts' }
			});
		},
		
		buildFrag : function(options) {
			var self = this;
			self.frag = '';
			var itemCon = $('<div></div>', {class: 'pix-item'} ),
				leftCon	= $('<div></div>', {class: 'pix-left'} ),
				itemCon = $('<div />', { class: 'pix-item'} ),
				iconCon	= $('<div />', { id:'pix-icon-dialog'} );
				
			iconCon.html(options);
			var selIcon = self.$elem.parents('.menu-item-settings').find('.edit-menu-item-icon').val();
			
			if(selIcon != ''){
				iconCon.find('.'+selIcon).addClass('active');
			}else{
				iconCon.find('.no-icon').addClass('active');
			}	
			
			self.frag += itemCon.append(iconCon)[0].outerHTML;
		},
		
		display : function($content) {
			var currentIcon = '';
			$content.append(this.frag);
		},
		
		/*******************
		   EVENT HANDELERS 
		 *******************/
		
		//Bind Event to the buttons
		bindEvents : function() {
			var self = this;
			self.$el.find( '.close' ).on( 'click', $.proxy(this.removeDialog, this));
			self.$el.find( '.media-button-insert' ).on( 'click', $.proxy(this.insertIcon, this));
			self.$el.find( '#icon-search' ).on( 'keyup', $.proxy( this.searchIcon, this ) );
			self.$el.find( '#reset-search-icon' ).on( 'click', $.proxy( this.resetSearchIcon, this ) );
		},

		resetSearchIcon: function(e) {
			e.preventDefault();
			this.$el.find("#icon-search").val('');
			this.$el.find( "#pix-icon-dialog i" ).fadeIn();
			this.$el.find('#no-icon-result').fadeOut(0);
		},

		
		searchIcon: function(e) {
			var  self = this,
				 searchText = self.$el.find("#icon-search").val();
				 searchText.toLowerCase().replace(/ +(?= )/g,'');   	

			   	window.clearTimeout(self.timeout);
			    	self.timeout = window.setTimeout(function(){
			       	if($.trim(searchText)){
			       		
			       		//Hide Nav
			       		self.$el.find( "#pix-icon-dialog i" ).hide();
			   			//Show Search Result
			          		self.showOrHideIcons( searchText );
			       	}else{

			       		//Show all fields and hide no result
			       		self.$el.find( "#pix-icon-dialog i" ).show();
			       		self.$el.find('#no-icon-result').fadeOut(0);

			       	}

			    },500);
		},

		showOrHideIcons: function ( searchText ) {

			var  self = this;
			self.$el.find('#no-result').fadeOut(0);
			var $icons = self.$el.find( "#pix-icon-dialog i" ),
				resultFound = 0;

			$icons.hide();

		    $icons.each(function( index ) {

		    	var iconText = '',
		    		$icon = $(this);

		    	if( $icon.length > 0){

		    		iconText = $icon.attr('class').toLowerCase().replace( 'pixicon-', '' );
		    		iconText = iconText.replace( '-', ' ' );

		    		if( iconText && iconText.search( searchText ) !== -1 ){
		    			
		    			$(this).fadeIn();
		    			self.$el.find('#no-icon-result').fadeOut(0);
		    			resultFound = 1;

		    		}else{
		    			
		    			$(this).fadeOut();
		    		}

		    	}

			});

			if( resultFound == 0 ){
				self.$el.find('#no-icon-result').fadeIn(400);
			}

			resultFound = 0;
		},
		
		//Insert Shortcode
		insertIcon: function(e){
			var self = this, sc, selectedIcon = '', content = '', img='', icon='', dialog_id = '#' + self.$el.attr('id');
			
			icon = $(dialog_id +' #pix-icon-dialog').children('.active').attr('class');
			self.selectedIcon = icon.split(" ",1);
			
			var parent = self.$elem.next('a').addClass('hidden').parents('.menu-item-settings');

			parent.find('.edit-menu-item-icon').val(self.selectedIcon);

			if(self.selectedIcon != '' && self.selectedIcon !="no-icon"){
				parent.find('.pix-inserted-icon').html('<i class="'+ self.selectedIcon +'"></i>');
				parent.find('.pix-remove-menu-icon').removeClass('hidden');
			}
			
			self.removeDialog(e);
		},

		
		//removeDialog
		removeDialog: function(e){
			var self = this;
			self.$overlay = $( '.pix-overlay' );

			//remove Elements
			this.$el.remove();			
			self.$overlay.remove();
			$('body').removeClass('pix-hide-scroll');
			e.preventDefault();
		},
				
		/*
		 *********************
			Helper Methods
		 *********************	
		*/
		
		icons: function(){
			var self = this, icon = self.$el.find('.pix-item i');
			icon.on('click', function(e){
				icon.removeClass('active');
				$(this).addClass('active');
			});
		}		
		/* /END OF EVENT HANDELERS */
	};
	
	var logError = function( message ) {

		if ( window.console ) {

			window.console.error( message );
		
		}

	};
	
	$.fn.pixMenuIcons = function(options){

		return this.each(function() {
		  new $.PixMenuIcons($(this));

	   });
		
	};
	
})(jQuery, window, document);

jQuery(document).ready(function($) {
	'use strict';
	
	// Add saved icon class in small iconbox
	$('.edit-menu-item-icon').each(function(index, el) {
		var self = $(this);
		var currentIcon = self.val(),
			iconDiv = self.next('.pix-inserted-icon'),
			removeBtn = self.parents('.menu-item-settings').find('.pix-remove-menu-icon');

		if(currentIcon != '' && currentIcon !="no-icon"){
			iconDiv.html('<i class="'+ currentIcon +'"></i>');
			removeBtn.removeClass('hidden');
		}else{
			iconDiv.html(' ');
		}
	});

	function menuSettingOnLoad(){

		var $pixMenus = $('#menu-management-liquid'), $vc = $('#visual_composer_content'), $vcf = $('#vc-inline-frame-wrapper'), $vcfnew = $('#vc_inline-frame-wrapper');

		//Icon manager plugin for vc
		if( $vc.length > 0 || $vcf.length > 0 || $vcfnew.length > 0){

			//Add Trigger to small inserted icon.
			$('.pix-inserted-icon').on('click', function(e){
				$(this).next('.pix-insert-menu-icon').trigger('click');
			});

			//Call icon inserter plugin
			$('.pix-insert-menu-icon').on('click', function(e){
				
				$(this).pixMenuIcons();
				e.preventDefault();
			});

			//Remove icons
			$('.pix-remove-menu-icon').on('click', function(e){

				var self = $(this), 
					parent = self.parents('.menu-item-settings');

				parent.find('.edit-menu-item-icon').val('');	
				parent.find('.pix-inserted-icon').html('');
				self.addClass('hidden');
				e.preventDefault();
			});

		}

		//Add Trigger to small inserted icon for menu.
		$pixMenus.on('click', '.pix-inserted-icon', function(e){
			$(this).next('.pix-insert-menu-icon').trigger('click');
		});

		//Call icon inserter plugin
		$pixMenus.on('click','.pix-insert-menu-icon',function(e){
			
			$(this).pixMenuIcons();
			e.preventDefault();
		});

		//Remove icons
		$pixMenus.on('click', '.pix-remove-menu-icon',function(e){

			var self = $(this), 
				parent = self.parents('.menu-item-settings');

			parent.find('.edit-menu-item-icon').val('');	
			parent.find('.pix-inserted-icon').html('');
			self.addClass('hidden');
			e.preventDefault();
		});
		
		$('#menu-settings-column').on('click', '.submit-add-to-menu', function(e) {
			$(document).ajaxStop(function () { 
				$('.select-files').pixMediaInsert();
			});
		});

		//Hide MegaMenu Columns if mega menu checkbox false
		$pixMenus.on('change', '.pix-field-custom-megamenu input',function(){
			var $this = $(this),
				megaMenu = $this.prop('checked'),
				megaMenuCol = $this.parents('.pix-field-custom-megamenu').next('.pix-field-custom-megamenucol-div');
				
			if(!megaMenu){
				$this.closest('li').addClass('pix-megamenu-active');
				megaMenuCol.hide("slow");
			}else{
				$this.closest('li').removeClass('pix-megamenu-active');
				megaMenuCol.show("slow");
			}

		});


		//Hide MegaMenu Position if mega menu col checkbox false
		$pixMenus.on('change', '.pix-field-custom-megamenucol input',function(){
			var $this = $(this),
				megaMenuColVal = $this.val(),
				megaMenuPos = $this.parents('.pix-field-custom-megamenucol').next('.pix-field-custom-megamenupos');

			if(megaMenuColVal != 2){
				megaMenuPos.hide("slow");
			}else{
				megaMenuPos.show("slow");
			}

		});

		//MegaMenu yes show column settings on load
		$('.pix-field-custom-megamenu').each(function(index, el) {
			
			var $this = $(this),
				megaMenuInput = $this.find('input'),
				megaMenu = megaMenuInput.prop('checked'),
				megaMenuCol = $this.next('.pix-field-custom-megamenucol-div');
				
				if(!megaMenu){
					megaMenuCol.css('display','none');
				}else{
					megaMenuCol.css('display','block');
				}
		});

		//Hide MegaMenu Position if mega menu col checkbox false onload
		$('.pix-field-custom-megamenucol').each(function(index, el) {
			
			var $this = $(this),
				megaMenuColInput = $this.find('input').first(),
				megaMenuColVal,
				megaMenuPos = $this.next('.pix-field-custom-megamenupos');

			if(megaMenuColInput.prop('checked')){
				megaMenuColVal = megaMenuColInput.val();
			}else{
				megaMenuColVal = 0;
			}

			if(megaMenuColVal != 2){
				megaMenuPos.css('display','none');
			}else{
				megaMenuPos.css('display','block');
			}
		});
	}

	menuSettingOnLoad();
});
