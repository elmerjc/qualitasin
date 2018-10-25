;(function($, window, document, undefined){
	'use strict';

	$.pixMediaInsert = function( el, options ){
		this.el = el;
		this.$el = $(el);
		this.selectedItems = '';
		this.selectedUrl = [];
		this.init( options );
	};
	
	$.pixMediaInsert.prototype = {

		//Default Options
		defaults : {
			title: 'Select Files',
			fileType: undefined, //video, audio, image
			multiSelect: false,
			insertItems: false, //this option will insert images above the button
		},

		init: function( options ) {
			var self = this,
				title = self.$el.data('title'),
				fileType = self.$el.data('file-type'),
				multiSelect = self.$el.data('multi-select'),
				insertItems = self.$el.data('insert'),
				container = $('<div>', {class:'selected-con'});

			//Merge options
			self.options = $.extend({}, self.defaults, options);
			
			//Check data attributes set and override current options.
			self.options.title 			= (title != undefined) 		? title 		: self.options.title;
			self.options.fileType 		= (fileType != undefined && (fileType=="image" || fileType=="video" || fileType=="audio")) ? fileType	: self.options.fileType;
			self.options.multiSelect 	= (multiSelect != undefined && multiSelect == true ) ? 'add' 	: self.options.multiSelect;
			self.options.insertItems 	= (insertItems != undefined && insertItems == true ) ? true 	: false;
			
			//retrive and insert Items and build array if images

			//insert div before btn
			this.$el.before(container);


			self.insertSavedItems();
			self.openMedia();
			self.bindEvents();
		},

		insertSavedItems:function() {
			var self = this, 
				con = self.$el.parent('.pix-container'),
			 	savedItems = $.parseJSON(con.find('.pix-saved-val').val()),
			 	savedItems = (savedItems) ? savedItems : [],
			 	itemsCon = self.$el.prev('.selected-con');

			if(savedItems.length > 0){
				if(self.options.fileType == "image"){

					for (var i in savedItems){
						var selectedImages;
						selectedImages = {"thumb": savedItems[i]['thumb'], "full": savedItems[i]['full'], "itemId": savedItems[i]['itemId']};
						self.selectedUrl.push(selectedImages);

						//self.selectedUrl
						itemsCon.append('<div class="selected-image" id="img-'+ i +'"><img src="'+ savedItems[i]['thumb'] +'" class="pix_images" data-full="'+ savedItems[i]['full'] +'" data-itemid="'+ savedItems[i]['itemId'] +'" data-id="'+ [i] +'" alt=""><a href="#" class="remove">Remove</a></div>');
					}

				}else if(self.options.fileType == "video" || self.options.fileType == "audio"){
					var selVideo;
					for (var i in savedItems){
						var attachment = savedItems[i];
						selVideo = {"url": attachment.url, "mime": attachment.mime, "format":  attachment.format, "itemId": attachment.itemId };
						this.selectedUrl.push(selVideo);
						this.selectedItems += '<source src="'+ attachment.url +'" type="'+ attachment.mime +'">';

						self.insertHTML();
					}

				}
			}


		},

		openMedia: function(){
			var pix_file_frame, attachment, self = this, container = this.$el.prev('.selected-con');
			
			//Upload Image
			this.$el.on('click',function(e){

				// If the media frame already exists, reopen it.
				var btn = $(this), uploaderBtnText = uploaderTitle = self.options.title;
				if ( pix_file_frame ) {
					pix_file_frame.open();
					return;
				}
				var uploaderTitle = (uploaderTitle) ? uploaderTitle : 'Insert Media',
					uploaderBtnText = (uploaderBtnText) ? uploaderBtnText : 'Select';
					
				// Create the media frame.
				pix_file_frame = wp.media.frames.pix_file_frame = wp.media({
					title: uploaderTitle,
					button: {
						text: uploaderBtnText,
					},
				  	multiple: self.options.multiSelect,  // Set to true to allow multiple files to be selected
				  	library: {
				  		type: self.options.fileType
					},
				});

				pix_file_frame.on('open',function() {
					var selection = pix_file_frame.state().get('selection');

					for (var i in self.selectedUrl){
						var selImg = wp.media.attachment(self.selectedUrl[i]['itemId']);
						selection.add( selImg ? [ selImg ] : [] );
					}

				});

				// When an image is selected, run a callback.
				pix_file_frame.on( 'select', function() {

					var selection = pix_file_frame.state().get('selection'),
						selectedItems, attachment;

					container.html('');					
					self.selectedItems = '';
					self.i = 0;
					if(!self.options.multiSelect){
						attachment = pix_file_frame.state().get('selection').first().toJSON();
						self.selectedUrl = [];
						//self.selectedUrl = attachment.url;
						self.getItems(attachment, btn);

					}else{				
						self.selectedUrl = [];

						//if video add some items in dom before call .map						
						selection.map( function( attachment ) {
							attachment = attachment.toJSON();
							self.getItems(attachment, btn);
						});
					}

					//save and insert html
					self.insertAndSaveData();
					
				});

				// Finally, open the modal
				pix_file_frame.open();				

				e.preventDefault();
			});
		},

		getItems: function(attachment, btn){
			var self = this,
			container = btn.prev('.selected-con');
			//container.prev('input').val(attachment);

			//If Image call insertImages function
			if( self.options.fileType == 'image' ){
				self.selectedImage(attachment, btn);
			}
			//If Video call selectedvideo function
			else if( self.options.fileType == 'video' || self.options.fileType == 'audio'){
				self.selectedVideoORAudio(attachment);
			}
			//or simply selected everything selected
			else{
				self.selectedAllItems(attachment, btn);
			}

		},
		
		selectedImage: function(attachment, btn){
			this.buildImageFrag(attachment, btn);
		},

		buildImageFrag: function(attachment, btn){
			var fullSize = attachment.url,
				imgUrl, selectedImages = {},
				img,
				removebtn = $('<a>', {href:'#', class:'remove', text:'Remove'}),
				container; //selected image container

			if( "sizes" in attachment && "thumbnail" in attachment.sizes){
				imgUrl = attachment.sizes.thumbnail.url;
			}else{
				imgUrl = fullSize;
			}

			selectedImages = {"thumb": imgUrl, "full": fullSize, "itemId": attachment.id};
			this.selectedUrl.push(selectedImages);

			container = $('<div>', {class:'selected-image', id:'img-'+this.i});
			img = $('<img>',{ src: imgUrl, class: 'pix_images', 'data-full': fullSize, 'data-id':this.i, 'data-itemid':attachment.id});

			this.selectedItems += container.append([img,removebtn])[0].outerHTML;

			this.i++;
		},

		selectedVideoORAudio: function(attachment){
			var selVideo;
			selVideo = {"url": attachment.url, "mime": attachment.mime, "format":  attachment.subtype, "itemId": attachment.id };
			this.selectedUrl.push(selVideo);

			this.selectedItems += '<source src="'+ attachment.url +'" type="'+ attachment.mime +'">';
		},

		selectedAllItems: function(attachment, btn){

		},

		insertAndSaveData: function(){
			var self= this;
			self.insertHTML();
			self.saveData();

			//reset Selected item html
			self.selectedItems = '';
			self.bindEvents();
		},

		insertHTML: function(){
			var self= this, con = self.$el.prev('.selected-con');

			con.find('.selected-image').remove();

			if(self.options.fileType == "image"){
				con.html(self.selectedItems);
			}
			else if(self.options.fileType == "video" || self.options.fileType == "audio"){
				
				var subCon = $('<div>', {class:'selected-image'}),
					selVideo, removebtn = $('<a>', {href:'#', class:'remove', text:'Remove'});

				con.append(subCon);
				if(self.options.fileType == "video"){
					subCon.append('<video width="500" class="selected-video" controls></video>');
				}else if(self.options.fileType == "audio"){
					subCon.append('<audio class="selected-video" controls></audio>');
				}
				subCon.append(removebtn)[0].outerHTML;
				subCon.find('.selected-video').append(self.selectedItems);
				
			}

		},

		saveData:function(){
			var self= this, con = self.$el.prev('.selected-con');
			con.prev('input').val(JSON.stringify(self.selectedUrl));
		},

		//EventHandlers()
		bindEvents: function(){
			var self = this,
				btn = self.$el,
				con = btn.prev('.selected-con');

			$('.remove').on('click',function(e){
				var $this = $(this), selImage = $this.parent('.selected-image'), id;
				
				if(self.options.fileType == "image"){
					//get removed image id
					id = selImage.find('.pix_images').data(id);
					self.selectedUrl.splice(id, 1);

					//update hidden input and remove hidden image
					con.prev('input').val(JSON.stringify(self.selectedUrl));
				}else if(self.options.fileType == "video" || self.options.fileType == "audio"){
					self.selectedUrl = [];
					con.prev('input').val('[]');
				}
				
				selImage.remove();

				e.preventDefault();
			});

			if(this.options.fileType == 'image' && this.options.multiSelect != false){
				this.imageSortable();
			}
		},

		imageSortable: function(){
			var self = this;
			this.$el.prev('.selected-con').sortable({
				items: '.selected-image',
				opacity: '0.6',
				cursor: 'move',
				//axis: 'x',
				update: function(){
					var newOrder = $(this).sortable('toArray'), oldOrder = self.selectedUrl, reOrder = [];
					$.each(newOrder, function(i, item) {
						var id = $('#'+item).find('.pix_images').data('id');
						if(oldOrder[id]){
							reOrder[i] = oldOrder[id];
						}
					});
					self.selectedUrl = reOrder;
					$(this).prev('input').val(JSON.stringify(self.selectedUrl));
				}
			});
		}
	};

	$.fn.pixMediaInsert = function(options){
		
		return this.each(function() {
			// prevent multiple instantiation
			if (!$(this).data('pixmediainsert'))
				$(this).data('pixmediainsert', new $.pixMediaInsert(this, options));
		});
	};

})(jQuery, window, document);

jQuery(document).ready(function($) {
	'use strict';

	$('.select-files').pixMediaInsert();

});