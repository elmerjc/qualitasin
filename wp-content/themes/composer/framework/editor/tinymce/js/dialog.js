/*
 * jQuery Fetch Json And DISPLAY SHORTCODE OPTIONS
 * http://pixel8es.com
 *
 * Copyright (c) 2013 Shahul Hameed (http://pixel8es.com)
 * 
 * @version 0.1
 *
 */
 
/*
* usefull infos: 
* http://wordpress.org/support/topic/new-media-manager-closeunload-event?replies=2
* http://mikejolley.com/2012/12/using-the-new-wordpress-3-5-media-uploader-in-plugins/
* http://codestag.com/how-to-use-wordpress-3-5-media-uploader-in-theme-options/
* file wp-includes/js/media-view.js as reference
* https://gist.github.com/4476771 - custom filter
* tuts+ backbone.js lessons: https://tutsplus.com/course/connected-to-the-backbone/
* remove/change sidebar links: http://sumtips.com/2012/12/add-remove-tab-wordpress-3-5-media-upload-page.html
*
* https://gist.github.com/thomasgriffin/4953041 <-- own attach vies- not tried yet
*/

;(function($, window, document, undefined){
	'use strict';

	$.PixShortcodes = function( options ){
		this.el = composer_dialog_globals;
		this.$el = $( this.el );
		this.init( options );
	};
	
	$.PixShortcodes.prototype = {
		
		//Default Options if needed
		defaults : {
			title: 'Shortcode Title',
			sc: 'ShortcodeName',
		},

		init: function( options ) {
			var self = this, $el = self.$el;
			
			self.$el.appendTo('body');

			window.setTimeout(function(){self.$el.addClass("pix-show")}, 100);
			
			$('<div>',{
				class: 'pix-overlay'
			}).appendTo('body');
			
			$('body').addClass('pix-hide-scroll');
			
			self.$content = self.$el.find('.options');
			
			self.options = $.extend({}, self.defaults, options );		
			
			//Changing Title
			self.$el.find('h2').html('Insert ' + self.options.title);

			self.loadScOptions();
		},
		
		loadScOptions : function() {
			var self = this;
			self.bindEvents();
			self.fetch().done(function(options){

				self.scData = options;

				self.$el.css('background-image','none');			
				self.buildFrag(options);
				self.display(self.$content);
				self.helpers();
			});
		},
		
		//Fetch and return json Data
		fetch : function() {
			var sc_name = this.options.sc;

			return $.ajax({
				type: "POST",
				dataType : "json",
				url : ajaxurl,	
				data: { action: 'pix_sc_options', pix_sc: sc_name}
			});
		},
		
		buildFrag : function(options) {
			var self = this;
			self.frag = '';
			$.each( options, function( i, item ) {
				var itemCon = $('<div></div>', {class: 'pix-item'} ),
					leftCon	= $('<div></div>', {class: 'pix-left'} );
					
				switch(item.type){

					case 'text':
											
						var itemCon = $('<div />', {class: 'pix-item'} ),
							leftCon	= $('<div />', {class: 'pix-left'} ),						
							itemVal = (item.std) ? item.std : '',
							label	= $('<label />', {for: item.id,text: item.name}),							
							rightCon= $('<p />', {text: item.desc}), 
							field	= $('<input>', {class: 'textfield', id: item.id, name: item.id, value: itemVal, type:'text'}).appendTo(leftCon);
						
						self.frag += itemCon.append([label,leftCon,rightCon])[0].outerHTML;
						
					break;

					case 'textarea':
						
						var itemCon = $('<div />', {class: 'pix-item'} ),
							leftCon	= $('<div />', {class: 'pix-left'} ),						
							itemVal = (item.std) ? item.std : '',
							label	= $('<label />', {for: item.id,text: item.name}),							
							rightCon= $('<p />', {text: item.desc}), 
							field	= $('<textarea />', {id: item.id, name: item.id, text: itemVal}).appendTo(leftCon);
						
						self.frag += itemCon.append([label,leftCon,rightCon])[0].outerHTML;
						
					break;

					case 'select':
					
						var itemCon = $('<div />', {class: 'pix-item'} ),
							leftCon	= $('<div />', {class: 'pix-left'} ),
							label	= $('<label />', {for: item.id,text: item.name}),							
							rightCon= $('<p />', {text: item.desc}),
							fieldWrapper = $('<div />', {class: 'select-wrapper'} ).append('<span></span>');
						
						var field = $('<select />', {id: item.id, name: item.id}).appendTo(fieldWrapper);
						
						fieldWrapper.appendTo(leftCon);
						
						for( var option in item.options){
							var opn = item.options[option];
							var sel = ((item.std) && (item.std === opn)) ? true : false;
							$("<option />", {value: opn, text: opn, selected: sel}).appendTo(field);
						}
									
						self.frag += itemCon.append([label,leftCon,rightCon])[0].outerHTML;
						
					break;

					case 'checkbox':
						
						var itemCon = $('<div />', {class: 'pix-item'} ),
							leftCon	= $('<div />', {class: 'pix-left'} ),						
							itemVal = (item.std) ? item.std : false,
							label	= $('<label />', {for: item.id,text: item.name}),
							rightCon= $('<p />', {text: item.desc});

							if(item.val){
								var fieldWrapper = $('<div />', {class: 'switch-light switch-candy',onclick: ''} ),
									field	= $('<input>', {id: item.id, name: item.id, value: itemVal, checked: itemVal, type: 'checkbox'}).appendTo(fieldWrapper);

								fieldWrapper.append('<span><span>'+ item.val[0] +'</span><span>'+ item.val[1] +'</span></span><a></a>');
								fieldWrapper.appendTo(leftCon).wrap(label);

								self.frag += itemCon.append([leftCon,rightCon])[0].outerHTML;	
							}else{
								$('<input>', {id: item.id, name: item.id, value: itemVal, checked: itemVal, type: 'checkbox'}).appendTo(leftCon);
								self.frag += itemCon.append([label,leftCon,rightCon])[0].outerHTML;
							}
	
					break;
					
					case 'icons':
						
						var itemCon = $('<div />', { class: 'pix-item'} ),
							iconCon	= $('<div />', { id: item.id, class: 'pix-icon'} ),
							label	= $('<label />', {for: item.id,text: item.name});
							
							iconCon.html('<i class="fa fa-glass"></i> <i class="fa fa-music"></i> <i class="fa fa-search"></i> <i class="fa fa-envelope-o"></i> <i class="fa fa-heart"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-user"></i> <i class="fa fa-film"></i> <i class="fa fa-th-large"></i> <i class="fa fa-th"></i> <i class="fa fa-th-list"></i> <i class="fa fa-check"></i> <i class="fa fa-times"></i> <i class="fa fa-search-plus"></i> <i class="fa fa-search-minus"></i> <i class="fa fa-power-off"></i> <i class="fa fa-signal"></i> <i class="fa fa-cog"></i> <i class="fa fa-trash-o"></i> <i class="fa fa-home"></i> <i class="fa fa-file-o"></i> <i class="fa fa-clock-o"></i> <i class="fa fa-road "></i> <i class="fa fa-download"></i> <i class="fa fa-arrow-circle-o-down"></i> <i class="fa fa-arrow-circle-o-up"></i> <i class="fa fa-inbox"></i> <i class="fa fa-play-circle-o"></i> <i class="fa fa-repeat"></i> <i class="fa fa-refresh"></i> <i class="fa fa-list-alt"></i> <i class="fa fa-lock"></i> <i class="fa fa-flag"></i> <i class="fa fa-headphones"></i> <i class="fa fa-volume-off"></i> <i class="fa fa-volume-down"></i> <i class="fa fa-volume-up"></i> <i class="fa fa-qrcode"></i> <i class="fa fa-barcode"></i> <i class="fa fa-tag"></i> <i class="fa fa-tags"></i> <i class="fa fa-book"></i> <i class="fa fa-bookmark"></i> <i class="fa fa-print"></i> <i class="fa fa-camera"></i> <i class="fa fa-font"></i> <i class="fa fa-bold"></i> <i class="fa fa-italic"></i> <i class="fa fa-text-height"></i> <i class="fa fa-text-width"></i> <i class="fa fa-align-left"></i> <i class="fa fa-align-center"></i> <i class="fa fa-align-right"></i> <i class="fa fa-align-justify"></i> <i class="fa fa-list"></i> <i class="fa fa-outdent"></i> <i class="fa fa-indent"></i> <i class="fa fa-video-camera"></i> <i class="fa fa-picture-o"></i> <i class="fa fa-pencil"></i> <i class="fa fa-map-marker"></i> <i class="fa fa-adjust"></i> <i class="fa fa-tint"></i> <i class="fa fa-pencil-square-o"></i> <i class="fa fa-share-square-o"></i> <i class="fa fa-check-square-o"></i> <i class="fa fa-arrows"></i> <i class="fa fa-step-backward"></i> <i class="fa fa-fast-backward"></i> <i class="fa fa-backward"></i> <i class="fa fa-play"></i> <i class="fa fa-pause"></i> <i class="fa fa-stop"></i> <i class="fa fa-forward"></i> <i class="fa fa-fast-forward"></i> <i class="fa fa-step-forward"></i> <i class="fa fa-eject"></i> <i class="fa fa-chevron-left"></i> <i class="fa fa-chevron-right"></i> <i class="fa fa-plus-circle"></i> <i class="fa fa-minus-circle"></i> <i class="fa fa-times-circle"></i> <i class="fa fa-check-circle"></i> <i class="fa fa-question-circle"></i> <i class="fa fa-info-circle"></i> <i class="fa fa-crosshairs"></i> <i class="fa fa-times-circle-o"></i> <i class="fa fa-check-circle-o"></i> <i class="fa fa-ban"></i> <i class="fa fa-arrow-left"></i> <i class="fa fa-arrow-right"></i> <i class="fa fa-arrow-up"></i> <i class="fa fa-arrow-down"></i> <i class="fa fa-share"></i> <i class="fa fa-expand"></i> <i class="fa fa-compress"></i> <i class="fa fa-plus"></i> <i class="fa fa-minus"></i> <i class="fa fa-asterisk"></i> <i class="fa fa-exclamation-circle"></i> <i class="fa fa-gift"></i> <i class="fa fa-leaf"></i> <i class="fa fa-fire"></i> <i class="fa fa-eye"></i> <i class="fa fa-eye-slash"></i> <i class="fa fa-exclamation-triangle"></i> <i class="fa fa-plane"></i> <i class="fa fa-calendar"></i> <i class="fa fa-random"></i> <i class="fa fa-comment"></i> <i class="fa fa-magnet"></i> <i class="fa fa-chevron-up"></i> <i class="fa fa-chevron-down"></i> <i class="fa fa-retweet"></i> <i class="fa fa-shopping-cart"></i> <i class="fa fa-folder"></i> <i class="fa fa-folder-open"></i> <i class="fa fa-arrows-v"></i> <i class="fa fa-arrows-h"></i> <i class="fa fa-bar-chart-o"></i> <i class="fa fa-twitter-square"></i> <i class="fa fa-facebook-square"></i> <i class="fa fa-camera-retro"></i> <i class="fa fa-key"></i> <i class="fa fa-cogs"></i> <i class="fa fa-comments"></i> <i class="fa fa-thumbs-o-up"></i> <i class="fa fa-thumbs-o-down"></i> <i class="fa fa-star-half"></i> <i class="fa fa-heart-o"></i> <i class="fa fa-sign-out"></i> <i class="fa fa-linkedin-square"></i> <i class="fa fa-thumb-tack"></i> <i class="fa fa-external-link"></i> <i class="fa fa-sign-in"></i> <i class="fa fa-trophy"></i> <i class="fa fa-github-square"></i> <i class="fa fa-upload"></i> <i class="fa fa-lemon-o"></i> <i class="fa fa-phone"></i> <i class="fa fa-square-o"></i> <i class="fa fa-bookmark-o"></i> <i class="fa fa-phone-square"></i> <i class="fa fa-twitter"></i> <i class="fa fa-facebook"></i> <i class="fa fa-github"></i> <i class="fa fa-unlock"></i> <i class="fa fa-credit-card"></i> <i class="fa fa-rss"></i> <i class="fa fa-hdd-o"></i> <i class="fa fa-bullhorn"></i> <i class="fa fa-bell"></i> <i class="fa fa-certificate"></i> <i class="fa fa-hand-o-right"></i> <i class="fa fa-hand-o-left"></i> <i class="fa fa-hand-o-up"></i> <i class="fa fa-hand-o-down"></i> <i class="fa fa-arrow-circle-left"></i> <i class="fa fa-arrow-circle-right"></i> <i class="fa fa-arrow-circle-up"></i> <i class="fa fa-arrow-circle-down"></i> <i class="fa fa-globe"></i> <i class="fa fa-wrench"></i> <i class="fa fa-tasks"></i> <i class="fa fa-filter"></i> <i class="fa fa-briefcase"></i> <i class="fa fa-arrows-alt"></i> <i class="fa fa-group"></i> <i class="fa fa-link"></i> <i class="fa fa-cloud"></i> <i class="fa fa-flask"></i> <i class="fa fa-scissors"></i> <i class="fa fa-files-o"></i> <i class="fa fa-paperclip"></i> <i class="fa fa-floppy-o"></i> <i class="fa fa-square"></i> <i class="fa fa-bars"></i> <i class="fa fa-list-ul"></i> <i class="fa fa-list-ol"></i> <i class="fa fa-strikethrough"></i> <i class="fa fa-underline"></i> <i class="fa fa-table"></i> <i class="fa fa-magic"></i> <i class="fa fa-truck"></i> <i class="fa fa-pinterest"></i> <i class="fa fa-pinterest-square"></i> <i class="fa fa-google-plus-square"></i> <i class="fa fa-google-plus"></i> <i class="fa fa-money"></i> <i class="fa fa-caret-down"></i> <i class="fa fa-caret-up"></i> <i class="fa fa-caret-left"></i> <i class="fa fa-caret-right"></i> <i class="fa fa-columns"></i> <i class="fa fa-sort"></i> <i class="fa fa-sort-asc"></i> <i class="fa fa-sort-desc"></i> <i class="fa fa-envelope"></i> <i class="fa fa-linkedin"></i> <i class="fa fa-undo"></i> <i class="fa fa-gavel"></i> <i class="fa fa-tachometer"></i> <i class="fa fa-comment-o"></i> <i class="fa fa-comments-o"></i> <i class="fa fa-bolt"></i> <i class="fa fa-sitemap"></i> <i class="fa fa-umbrella"></i> <i class="fa fa-clipboard"></i> <i class="fa fa-lightbulb-o"></i> <i class="fa fa-exchange"></i> <i class="fa fa-cloud-download"></i> <i class="fa fa-cloud-upload"></i> <i class="fa fa-user-md"></i> <i class="fa fa-stethoscope"></i> <i class="fa fa-suitcase"></i> <i class="fa fa-bell-o"></i> <i class="fa fa-coffee"></i> <i class="fa fa-cutlery"></i> <i class="fa fa-file-text-o"></i> <i class="fa fa-building-o"></i> <i class="fa fa-hospital-o"></i> <i class="fa fa-ambulance"></i> <i class="fa fa-medkit"></i> <i class="fa fa-fighter-jet"></i> <i class="fa fa-beer"></i> <i class="fa fa-h-square"></i> <i class="fa fa-plus-square"></i> <i class="fa fa-angle-double-left"></i> <i class="fa fa-angle-double-right"></i> <i class="fa fa-angle-double-up"></i> <i class="fa fa-angle-double-down"></i> <i class="fa fa-angle-left"></i> <i class="fa fa-angle-right"></i> <i class="fa fa-angle-up"></i> <i class="fa fa-angle-down"></i> <i class="fa fa-desktop"></i> <i class="fa fa-laptop"></i> <i class="fa fa-tablet"></i> <i class="fa fa-mobile"></i> <i class="fa fa-circle-o"></i> <i class="fa fa-quote-left"></i> <i class="fa fa-quote-right"></i> <i class="fa fa-spinner"></i> <i class="fa fa-circle"></i> <i class="fa fa-reply"></i> <i class="fa fa-github-alt"></i> <i class="fa fa-folder-o"></i> <i class="fa fa-folder-open-o"></i> <i class="fa fa-plus-square-o"></i> <i class="fa fa-minus-square-o"></i> <i class="fa fa-smile-o"></i> <i class="fa fa-frown-o"></i> <i class="fa fa-meh-o"></i> <i class="fa fa-gamepad"></i> <i class="fa fa-keyboard-o"></i> <i class="fa fa-flag-o"></i> <i class="fa fa-flag-checkered"></i> <i class="fa fa-terminal"></i> <i class="fa fa-code"></i> <i class="fa fa-reply-all"></i> <i class="fa fa-mail-reply-all"></i> <i class="fa fa-star-half-o"></i> <i class="fa fa-location-arrow"></i> <i class="fa fa-crop"></i> <i class="fa fa-code-fork"></i> <i class="fa fa-chain-broken"></i> <i class="fa fa-question"></i> <i class="fa fa-info"></i> <i class="fa fa-exclamation"></i> <i class="fa fa-superscript"></i> <i class="fa fa-subscript"></i> <i class="fa fa-eraser"></i> <i class="fa fa-puzzle-piece"></i> <i class="fa fa-microphone"></i> <i class="fa fa-microphone-slash"></i> <i class="fa fa-shield"></i> <i class="fa fa-calendar-o"></i> <i class="fa fa-fire-extinguisher"></i> <i class="fa fa-rocket"></i> <i class="fa fa-maxcdn"></i> <i class="fa fa-chevron-circle-left"></i> <i class="fa fa-chevron-circle-right"></i> <i class="fa fa-chevron-circle-up"></i> <i class="fa fa-chevron-circle-down"></i> <i class="fa fa-html5"></i> <i class="fa fa-css3"></i> <i class="fa fa-anchor"></i> <i class="fa fa-unlock-alt"></i> <i class="fa fa-bullseye"></i> <i class="fa fa-ellipsis-h"></i> <i class="fa fa-ellipsis-v"></i> <i class="fa fa-rss-square"></i> <i class="fa fa-play-circle"></i> <i class="fa fa-ticket"></i> <i class="fa fa-minus-square"></i> <i class="fa fa-minus-square-o"></i> <i class="fa fa-level-up"></i> <i class="fa fa-level-down"></i> <i class="fa fa-check-square"></i> <i class="fa fa-pencil-square"></i> <i class="fa fa-external-link-square"></i> <i class="fa fa-share-square"></i> <i class="fa fa-compass"></i> <i class="fa fa-caret-square-o-down"></i> <i class="fa fa-caret-square-o-up"></i> <i class="fa fa-caret-square-o-right"></i> <i class="fa fa-eur"></i> <i class="fa fa-gbp"></i> <i class="fa fa-usd"></i> <i class="fa fa-inr"></i> <i class="fa fa-jpy"></i> <i class="fa fa-rub"></i> <i class="fa fa-krw"></i> <i class="fa fa-btc"></i> <i class="fa fa-file"></i> <i class="fa fa-file-text"></i> <i class="fa fa-sort-alpha-asc"></i> <i class="fa fa-sort-alpha-desc"></i> <i class="fa fa-sort-amount-asc"></i> <i class="fa fa-sort-amount-desc"></i> <i class="fa fa-sort-numeric-asc"></i> <i class="fa fa-sort-numeric-desc"></i> <i class="fa fa-thumbs-up"></i> <i class="fa fa-thumbs-down"></i> <i class="fa fa-youtube-square"></i> <i class="fa fa-youtube"></i> <i class="fa fa-xing"></i> <i class="fa fa-xing-square"></i> <i class="fa fa-youtube-play"></i> <i class="fa fa-dropbox"></i> <i class="fa fa-stack-overflow"></i> <i class="fa fa-instagram"></i> <i class="fa fa-flickr"></i> <i class="fa fa-adn"></i> <i class="fa fa-bitbucket"></i> <i class="fa fa-bitbucket-square"></i> <i class="fa fa-tumblr"></i> <i class="fa fa-tumblr-square"></i> <i class="fa fa-long-arrow-down"></i> <i class="fa fa-long-arrow-up"></i> <i class="fa fa-long-arrow-left"></i> <i class="fa fa-long-arrow-right"></i> <i class="fa fa-apple"></i> <i class="fa fa-windows"></i> <i class="fa fa-android"></i> <i class="fa fa-dribbble"></i> <i class="fa fa-skype"></i> <i class="fa fa-foursquare"></i> <i class="fa fa-trello"></i> <i class="fa fa-female"></i> <i class="fa fa-male"></i> <i class="fa fa-gittip"></i> <i class="fa fa-sun-o"></i> <i class="fa fa-moon-o"></i> <i class="fa fa-archive"></i> <i class="fa fa-bug"></i> <i class="fa fa-vk"></i> <i class="fa fa-weibo"></i> <i class="fa fa-renren"></i> <i class="fa fa-pagelines"></i> <i class="fa fa-stack-exchange"></i> <i class="fa fa-arrow-circle-o-right"></i> <i class="fa fa-arrow-circle-o-left"></i> <i class="fa fa-caret-square-o-left"></i> <i class="fa fa-dot-circle-o"></i> <i class="fa fa-wheelchair"></i> <i class="fa fa-vimeo-square"></i> <i class="fa fa-try"></i>');						
						iconCon.find('.fa-'+item.std).addClass('active');
						//field.childrens('.fa-'+item.std).addClass('active');
						self.frag += itemCon.append([label,iconCon])[0].outerHTML;
						
					break;

					case 'upload':
						
						var itemCon = $('<div />', {class: 'pix-item'} ),
							leftCon	= $('<div />', {class: 'pix-left'} ),						
							itemVal = (item.std) ? item.std : '',
							label	= $('<label />', {text: item.name}),							
							rightCon= $('<p />', {text: item.desc}),
							field	= $('<input>', {name: item.id, value: 'Upload', type: 'button','data-title': item.uploadTitle, 'data-button_text': item.buttonText, class:'pix-upload button button-default'}).appendTo(leftCon),
							imgCon = $('<div />', {id:item.id, class: 'selected-image-con'}).appendTo(leftCon);
							$('<div />', {class: 'remove-image-btn'}).appendTo(imgCon);
							$('<div />', {class: 'selected-image'}).appendTo(imgCon);
						self.frag += itemCon.append([label,leftCon,rightCon])[0].outerHTML;
						
					break;
				}


			});
		},
		
		display : function($content) {
			$content.append(this.frag);	
			$content.find('input:first').focus();
		},
		
		/*******************
		   EVENT HANDELERS 
		 *******************/
		
		//Bind Event to the buttons
		bindEvents : function() {
			var self = this;
			self.$el.find( '.close' ).on( 'click', $.proxy(this.removeDialog, this));
			self.$el.find( '.media-button-insert' ).on( 'click', $.proxy(this.insertShortcode, this));
		},
		
		//Insert Shortcode
		insertShortcode: function(e){
			var self = this, sc, attr = '', content = '', img='', icon='', dialog_id = '#' + self.$el.attr('id');
			
			//Buildup Shortcode

			$.each( self.scData, function( i, item ) {
					
				switch(item.type){

					case 'text':
					case 'select':
						if(item.con == true){
							content = $(dialog_id +' #'+item.id).val();
						}else{
							attr += ' ' + item.id +'="'+ $(dialog_id +' #'+item.id).val() +'"';
						}
					break;

					case 'textarea':
						content = $(dialog_id +' #'+item.id).val();
					break;

					case 'checkbox':
						if(item.val){
							attr += ' ' + item.id +'="'+ (($(dialog_id +' #'+item.id).prop('checked')) ? item.val[1] : item.val[0]) +'"';
						}else{
							attr += ' ' + item.id +'="'+ $(dialog_id +' #'+item.id).prop('checked') +'"';
						}
						
					break;
					
					case 'icons':
						icon = $(dialog_id +' #'+item.id).children('.active').attr('class').split(' ')[1];					
						attr += ' ' + item.id +'="'+ icon +'"';
					break;

					case 'upload':
						//.selected-image img
						img = $(dialog_id +' #'+item.id + ' .selected-image img').attr('src');
						attr += ' ' + item.id +'="'+ ((img) ? img : ' ') +'"';
					break;
				}
			});

			if(self.scData[0].break == false ){
				sc = '[' + self.options.sc + ((attr) ? attr : '') +']';
				if(content){
					sc += content + '[/' + self.options.sc + ']';
				}
			}else{				
				sc = '[' + self.options.sc + ((attr) ? attr : '') +']<br>';
				if(content){
					sc += content + '<br>[/' + self.options.sc + ']<br>';
				}
				sc += '<br><br>';
			}
			

			//Insert Shortcode
			tinyMCE.activeEditor.execCommand("mceInsertContent", false, sc);
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
		
		helpers: function(){
			this.icons();
			this.selects();
			this.upload();
		},

		upload: function(){
			var file_frame,attachment,self = this;		
			
			//Upload Image
			this.$el.find('.pix-upload').on('click',function(e){
				// If the media frame already exists, reopen it.
				var btn = $(this), uploaderTitle = btn.data( 'title' ), uploaderBtnText = btn.data( 'title' );
				if ( file_frame ) {
					file_frame.open();
					return;
				}
				var uploaderTitle = (uploaderTitle) ? uploaderTitle : 'Insert Media',
					uploaderBtnText = (uploaderBtnText) ? uploaderBtnText : 'Select';
					
				// Create the media frame.
				file_frame = wp.media.frames.file_frame = wp.media({
					title: uploaderTitle,
					button: {
						text: uploaderBtnText,
					},
				  multiple: false  // Set to true to allow multiple files to be selected
				});

				// When an image is selected, run a callback.
				file_frame.on( 'select', function() {
				  // We set multiple to false so only get one image from the uploader
					attachment = file_frame.state().get('selection').first().toJSON();					
					
					btn.next('.selected-image-con').children('.remove-image-btn').html($('<a>', {href: '#', class:'remove-img', text:'Remove'}));
					btn.next('.selected-image-con').children('.selected-image').html($('<img>',{src:  attachment.url}));
					// Do something with attachment.id and/or attachment.url here
					
					//Remove Image
					self.$el.find('.remove-img').on('click',function(e){
						var $this = $(this);
						$this.show();
						$this.parent().next('.selected-image').html('');
						$this.hide();
						
						e.preventDefault();
					});
				});

				// Finally, open the modal
				file_frame.open();
				e.preventDefault();
			});
		},
		
		icons: function(){
			var self = this, icon = self.$el.find('.pix-icon .fa');
			icon.on('click', function(e){
				icon.removeClass('active');
				$(this).addClass('active');
			});	
		},
		
		selects: function(){
			var self = this;
			//fieldWrapper.find('span').text(field.val());
			var selectWrap = self.$el.find('.select-wrapper').children('span'),
				select = selectWrap.next('select');
			
			selectWrap.each(function(){
				$(this).text($(this).next('select').val());
			});

			select.on('change', function(e){
				$(this).prev('span').text($(this).val());
			});
		}
		
		/* /END OF EVENT HANDELERS */
	};
	
	var logError = function( message ) {

		if ( window.console ) {

			window.console.error( message );
		
		}

	};
	
	/*$.fn.pixShortcodes = function(options){

		return this.each(function() {
		  new PixShortcodes(this, options);            
	   });
		
	};*/
	
})(jQuery, window, document);