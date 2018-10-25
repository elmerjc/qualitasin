/**
 * SMOF js
 *
 * contains the core functionalities to be used
 * inside SMOF
 */

jQuery.noConflict();

String.prototype.capitalize = function() {
    return this.charAt(0).toUpperCase() + this.slice(1);
}

/** Fire up jQuery - let's dance! 
 */
jQuery(document).ready(function($){
 	
	
	//(un)fold options in a checkbox-group
  	jQuery('.fld').click(function() {
    	var $fold='.f_'+this.id;
    	$($fold).slideToggle('normal', "swing");
  	});

  	//Color picker
  	$( '.of-color' ).alphaColorPicker();
	
	//hides warning if js is enabled			
	$('#js-warning').hide();
	
	//Tabify Options			
	$('.group').hide();

	Array.prototype.containsSubString = function( text ){
		for ( var i in this )
		{
			if ( this[i].toString().indexOf( text ) != -1 )
				return i;
		}
		return -1;
	}

    Array.prototype.hasSubStringOf = function( text ){
    	for ( var i in this )
    	{
    		if ( text.toString().indexOf( this[i].toString() ) != -1 )
    			return i;
    	}
    	return -1;
    }

	var timeout;
	$("#search").on('keyup',  function(event) {
		var searchText = $("#search").val().toLowerCase().replace(/ +(?= )/g,'');

		window.clearTimeout(timeout);
	    timeout = window.setTimeout(function(){
	    	if($.trim(searchText)){

	    		//Hide Nav
	    		$('#of_container #of-nav').hide();
				$('#of_container #content').removeClass('sidebar').addClass('no-sidebar');
				$('#of_container .group').show();
				//Show Search Result
	       		search(searchText);
	    	}else{

	    		//Show Nav and set tabs current
	    		$('#of_container #of-nav').show();
	    		$('#of_container #content').removeClass('no-sidebar').addClass('sidebar');
	    		$('#of_container .group').add('#of_container .group h2').hide();
	    		$('#of_container .group:first').show();
	    		$('#of_container #of-nav li').removeClass('current');
	    		$('#of_container #of-nav li:first').addClass('current');

	    		//Show all fields and hide no result
	    		$( "#content .group .section" ).show();
	    		$('#no-result').fadeOut(0);

	    	}
	    },500);

	});

	function search(searchText) {
		$('#no-result').fadeOut(0);
		var section = $( "#content .group .section" ),
			resultFound = 0;

		section.hide();

	    section.each(function( index ) {

	    	var titleText = '',
	    		$heading = $(this).find('.heading');

	    	if( $heading.length > 0){

	    		titleText = $heading.text().toLowerCase().split(" ");

	    		if( titleText && titleText.hasSubStringOf( searchText ) !== -1 ){
	    			
	    			$(this).fadeIn();
	    			resultFound = 1;

	    		}else{
	    			
	    			$(this).fadeOut();
	    		}

	    	}			

		});

		if( resultFound == 0 ){
			$('#no-result').fadeIn(400);
		}

		resultFound = 0;
	}
	
	// Get the URL parameter for tab
	function getURLParameter(name) {
	    return decodeURI(
	        (RegExp(name + '=' + '(.+?)(&|$)').exec(location.search)||[,''])[1]
	    );
	}
	
	// If the $_GET param of tab is set, use that for the tab that should be open
	if (getURLParameter('tab') != "") {
		$.cookie('of_current_opt', '#'+getURLParameter('tab'), { expires: 7, path: '/' });
	}

	// Display last current tab	
	if ($.cookie("of_current_opt") === null) {
		$('.group:first').fadeIn('fast');	
		$('#of-nav li:first').addClass('current');
	} else {
	
		var hooks = $('#hooks').html();
		hooks = jQuery.parseJSON(hooks);
		
		$.each(hooks, function(key, value) { 
		
			if ($.cookie("of_current_opt") == '#of-option-'+ value) {
				$('.group#of-option-' + value).fadeIn();
				$('#of-nav li.' + value).addClass('current');
			}
			
		});
	
	}
				
	//Current Menu Class
	$('#of-nav li a').click(function(evt){
		$('#of-nav li').removeClass('current');
		$(this).parent().addClass('current');
							
		var clicked_group = $(this).attr('href');
		
		$.cookie('of_current_opt', clicked_group, { expires: 7, path: '/' });
			
		$('.group').hide();
							
		$(clicked_group).fadeIn('fast');
		return false;
						
	});

	//Expand Options 
	var flip = 0;
				
	$('#expand_options').click(function(){
		if(flip == 0){
			flip = 1;
			$('#of_container #of-nav').hide();
			$('#of_container #content').removeClass('sidebar').addClass('no-sidebar');
			$('#of_container .group').add('#of_container .group h2').show();
	
			$(this).removeClass('expand');
			$(this).addClass('close');
			$(this).text('Close');
					
		} else {
			flip = 0;
			$('#of_container #of-nav').show();
			$('#of_container #content').removeClass('no-sidebar').addClass('sidebar');
			$('#of_container .group').add('#of_container .group h2').hide();
			$('#of_container .group:first').show();
			$('#of_container #of-nav li').removeClass('current');
			$('#of_container #of-nav li:first').addClass('current');
					
			$(this).removeClass('close');
			$(this).addClass('expand');
			$(this).text('Expand');
				
		}
			
	});			

	//Masked Inputs (images as radio buttons)
	$('.of-radio-img-img').click(function(){
		$(this).parent().parent().parent().find('.of-radio-img-img').removeClass('of-radio-img-selected');
		$(this).addClass('of-radio-img-selected');
		$(this).parent().parent().parent().find('.select-image-wrap').removeClass('pix-of-radio-img-selected');
		$(this).parent().addClass('pix-of-radio-img-selected');
	});
	$('.of-radio-img-label').hide();
	$('.of-radio-img-img').show();
	$('.of-radio-img-radio').hide();
	
	//Masked Inputs (background images as radio buttons)
	$('.of-radio-tile-img').click(function(){
		$(this).parent().parent().find('.of-radio-tile-img').removeClass('of-radio-tile-selected');
		$(this).addClass('of-radio-tile-selected');
	});
	$('.of-radio-tile-label').hide();
	$('.of-radio-tile-img').show();
	$('.of-radio-tile-radio').hide();

	// Style Select
	(function ($) {
	styleSelect = {
		init: function () {
		$('.select_wrapper').each(function () {
			$(this).prepend('<span>' + $(this).find('.select option:selected').text() + '</span>');
		});
		$('.select').live('change', function () {
			$(this).prev('span').replaceWith('<span>' + $(this).find('option:selected').text() + '</span>');
		});
		$('.select').bind($.browser.msie ? 'click' : 'change', function(event) {
			$(this).prev('span').replaceWith('<span>' + $(this).find('option:selected').text() + '</span>');
		}); 
		}
	};
	$(document).ready(function () {
		styleSelect.init()
	})
	})(jQuery);
	
	
	/** Aquagraphite Slider MOD */
	
	//Hide (Collapse) the toggle containers on load
	$(".slide_body").hide(); 

	//Switch the "Open" and "Close" state per click then slide up/down (depending on open/close state)
	$(".slide_edit_button").live( 'click', function(){		
		//toggle for each
		$(this).parent().toggleClass("active").next().slideToggle("fast");
		return false; //Prevent the browser jump to the link anchor
	});	
	
	// Update slide title upon typing		
	function update_slider_title(e) {
		var element = e;
		if ( this.timer ) {
			clearTimeout( element.timer );
		}
		this.timer = setTimeout( function() {
			$(element).parent().prev().find('strong').text( element.value );
		}, 100);
		return true;
	}
	
	$('.of-slider-title').live('keyup', function(){
		update_slider_title(this);
	});

	//Remove individual font
	$('.font_delete_button').live('click', function(){
	var agree = confirm("Are you sure you wish to delete this slide?");
		if (agree) {
			var $trash = $(this).parents('li');
			$trash.animate({
					opacity: 0.25,
					height: 0,
				}, 500, function() {
					$(this).remove();
			});
			return false; //Prevent the browser jump to the link anchor
		} else {
		return false;
		}	
	});
	
	//Add new font
	$(".font_add_button").live('click', function(){		
		var fontsContainer = $(this).prev();
		var sliderId = fontsContainer.attr('id');
		
		var numArr = $('#'+sliderId +' li').find('.order').map(function() { 
			var str = this.id; 
			str = str.replace(/\D/g,'');
			str = parseFloat(str);
			return str;			
		}).get();
		
		var maxNum = Math.max.apply(Math, numArr);
		if (maxNum < 1 ) { maxNum = 0};
		var newNum = maxNum + 1;

		var newSlide = '<li class="temphide"><div class="slide_header"><strong>Slide ' + newNum + '</strong><input type="hidden" class="slide of-input order" name="custom_fonts[' + newNum + '][order]" id="' + sliderId + '_' + newNum + '_slide_order" value="' + newNum + '"><a class="slide_edit_button" href="#">Edit</a></div><div class="slide_body" style="display: block;"><label>Font Title</label><input class="slide of-input of-slider-title" name="' + sliderId + '[' + newNum + '][font_title]" id="' + sliderId + '_' + newNum + '_slide_title" value=""><h4>Font Formats</h4><label>WOFF</label><div class="upload_button_div media-wrap"><input class="upload slide of-input" name="' + sliderId + '[' + newNum + '][woff]" id="' + sliderId + '_' + newNum + '_slide_woff" value=""><span class="button media_upload_button" id="' + sliderId + '_' + newNum + '">Upload</span><span class="button remove-image hide" id="reset_' + sliderId + '_' + newNum + '" title="' + sliderId + '_' + newNum + '">Remove</span></div><div class="desc">Recommended, works in all modern browsers</div><label>TTF</label><div class="upload_button_div media-wrap"><input class="upload slide of-input" name="' + sliderId + '[' + newNum + '][ttf]" id="' + sliderId + '_' + newNum + '_slide_ttf" value=""><span class="button media_upload_button" id="' + sliderId + '_' + newNum + '">Upload</span><span class="button remove-image hide" id="reset_' + sliderId + '_' + newNum + '" title="' + sliderId + '_' + newNum + '">Remove</span></div><div class="desc">Not Recommended, but required by older of works webkit browsers (like chrome)</div><label>EOT</label><div class="upload_button_div media-wrap"><input class="upload slide of-input" name="' + sliderId + '[' + newNum + '][eot]" id="' + sliderId + '_' + newNum + '_slide_eot" value=""><span class="button media_upload_button" id="' + sliderId + '_' + newNum + '">Upload</span><span class="button remove-image hide" id="reset_' + sliderId + '_' + newNum + '" title="' + sliderId + '_' + newNum + '">Remove</span></div><div class="desc">Only necessary for IE older than IE9</div><label>SVG</label><div class="upload_button_div media-wrap"><input class="upload slide of-input" name="' + sliderId + '[' + newNum + '][svg]" id="' + sliderId + '_' + newNum + '_slide_svg" value=""><span class="button media_upload_button" id="' + sliderId + '_' + newNum + '">Upload</span><span class="button remove-image hide" id="reset_' + sliderId + '_' + newNum + '" title="' + sliderId + '_' + newNum + '">Remove</span></div><div class="desc">No longer supported or required for any browser. But required for Legacy iOS</div><a class="slide_delete_button" href="#">Delete</a><div class="clear"></div></div></li>';
		
		fontsContainer.append(newSlide);
		var nSlide = fontsContainer.find('.temphide');
		nSlide.fadeIn('fast', function() {
			$(this).removeClass('temphide');
		});
				
		optionsframework_file_bindings(); // re-initialise upload image..
		
		return false; //prevent jumps, as always..
	});		
	
	//Remove individual slide
	$('.slide_delete_button').live('click', function(){
	var agree = confirm("Are you sure you wish to delete this slide?");
		if (agree) {
			var $trash = $(this).parents('li');
			$trash.animate({
					opacity: 0.25,
					height: 0,
				}, 500, function() {
					$(this).remove();
			});
			return false; //Prevent the browser jump to the link anchor
		} else {
		return false;
		}	
	});
	
	//Add new slide
	$(".slide_add_button").live('click', function(){		
		var slidesContainer = $(this).prev();
		var sliderId = slidesContainer.attr('id');
		
		var numArr = $('#'+sliderId +' li').find('.order').map(function() { 
			var str = this.id; 
			str = str.replace(/\D/g,'');
			str = parseFloat(str);
			return str;			
		}).get();
		
		var maxNum = Math.max.apply(Math, numArr);
		if (maxNum < 1 ) { maxNum = 0};
		var newNum = maxNum + 1;
		
		var newSlide = '<li class="temphide"><div class="slide_header"><strong>Slide ' + newNum + '</strong><input type="hidden" class="slide of-input order" name="' + sliderId + '[' + newNum + '][order]" id="' + sliderId + '_slide_order-' + newNum + '" value="' + newNum + '"><a class="slide_edit_button" href="#">Edit</a></div><div class="slide_body" style="display: none; "><label>Title</label><input class="slide of-input of-slider-title" name="' + sliderId + '[' + newNum + '][title]" id="' + sliderId + '_' + newNum + '_slide_title" value=""><label>Image URL</label><div class="upload_button_div media-wrap"><input class="upload slide of-input" name="' + sliderId + '[' + newNum + '][url]" id="' + sliderId + '_' + newNum + '_slide_url" value=""><span class="button media_upload_button" id="' + sliderId + '_' + newNum + '">Upload</span><span class="button remove-image hide" id="reset_' + sliderId + '_' + newNum + '" title="' + sliderId + '_' + newNum + '">Remove</span></div><div class="screenshot"></div><label>Link URL (optional)</label><input class="slide of-input" name="' + sliderId + '[' + newNum + '][link]" id="' + sliderId + '_' + newNum + '_slide_link" value=""><label>Description (optional)</label><textarea class="slide of-input" name="' + sliderId + '[' + newNum + '][description]" id="' + sliderId + '_' + newNum + '_slide_description" cols="8" rows="8"></textarea><a class="slide_delete_button" href="#">Delete</a><div class="clear"></div></div></li>';
		
		slidesContainer.append(newSlide);
		var nSlide = slidesContainer.find('.temphide');
		nSlide.fadeIn('fast', function() {
			$(this).removeClass('temphide');
		});
				
		optionsframework_file_bindings(); // re-initialise upload image..
		
		return false; //prevent jumps, as always..
	});
	
	//Sort slides
	jQuery('.slider').find('ul').each( function() {
		var id = jQuery(this).attr('id');
		$('#'+ id).sortable({
			placeholder: "placeholder",
			opacity: 0.6,
			handle: ".slide_header",
			cancel: "a"
		});	
	});
	
	
	/**	Sorter (Layout Manager) */
	jQuery('.sorter').each( function() {
		var id = jQuery(this).attr('id');
		$('#'+ id).find('ul').sortable({
			items: 'li',
			placeholder: "placeholder",
			connectWith: '.sortlist_' + id,
			opacity: 0.6,
			update: function() {
				$(this).find('.position').each( function() {
				
					var listID = $(this).parent().attr('id');
					var parentID = $(this).parent().parent().attr('id');
					parentID = parentID.replace(id + '_', '')
					var optionID = $(this).parent().parent().parent().attr('id');
					$(this).prop("name", optionID + '[' + parentID + '][' + listID + ']');
					
				});
			}
		});	
	});
	
	
	/**	Ajax Backup & Restore MOD */
	//backup button
	$('#of_backup_button').live('click', function(){
	
		var answer = confirm("Click OK to backup your current saved options.")
		
		

		if (answer){
	
			var clickedObject = $(this);
			var clickedID = $(this).attr('id');
					
			var nonce = $('#security').val();
		
			var data = {
				action: 'of_ajax_post_action',
				type: 'backup_options',
				security: nonce
			};
						
			$.post(ajaxurl, data, function(response) {
							
				//check nonce
				if(response==-1){ //failed
								
					var fail_popup = $('#of-popup-fail');
					fail_popup.fadeIn();
					window.setTimeout(function(){
						fail_popup.fadeOut();                        
					}, 2000);
				}
							
				else {
							
					var success_popup = $('#of-popup-save');
					success_popup.fadeIn();
					window.setTimeout(function(){
						location.reload();                        
					}, 1000);
				}
							
			});
			
		}
		
	return false;
					
	}); 
	
	//restore button
	$('#of_restore_button').live('click', function(){
	
		var answer = confirm("'Warning: All of your current options will be replaced with the data from your last backup! Proceed?")
		
		if (answer){
	
			var clickedObject = $(this);
			var clickedID = $(this).attr('id');
					
			var nonce = $('#security').val();
		
			var data = {
				action: 'of_ajax_post_action',
				type: 'restore_options',
				security: nonce
			};
						
			$.post(ajaxurl, data, function(response) {
			
				//check nonce
				if(response==-1){ //failed
								
					var fail_popup = $('#of-popup-fail');
					fail_popup.fadeIn();
					window.setTimeout(function(){
						fail_popup.fadeOut();                        
					}, 2000);
				}
							
				else {
							
					var success_popup = $('#of-popup-save');
					success_popup.fadeIn();
					window.setTimeout(function(){
						location.reload();                        
					}, 1000);
				}	
						
			});
	
		}
	
	return false;
					
	});
	
	/**	Ajax Transfer (Import/Export) Option */
	$('#of_import_button').live('click', function(){
	
		var answer = confirm("Click OK to import options.")
		
		if (answer){
	
			var clickedObject = $(this);
			var clickedID = $(this).attr('id');
					
			var nonce = $('#security').val();
			
			var import_data = $('#export_data').val();
		
			var data = {
				action: 'of_ajax_post_action',
				type: 'import_options',
				security: nonce,
				data: import_data
			};
						
			$.post(ajaxurl, data, function(response) {
				var fail_popup = $('#of-popup-fail');
				var success_popup = $('#of-popup-save');
				
				//check nonce
				if(response==-1){ //failed
					fail_popup.fadeIn();
					window.setTimeout(function(){
						fail_popup.fadeOut();                        
					}, 2000);
				}		
				else 
				{
					success_popup.fadeIn();
					window.setTimeout(function(){
						location.reload();                        
					}, 1000);
				}
							
			});
			
		}
		
	return false;
					
	});
	
	/** AJAX Save Options */
	$('#of_save').live('click',function() {
			
		var nonce = $('#security').val();
					
		$('.ajax-loading-img').fadeIn();
		
		//get serialized data from all our option fields			
		var serializedReturn = $('#of_form :input[name][name!="security"][name!="of_reset"]').serialize();

		$('#of_form :input[type=checkbox]').each(function() {     
		    if (!this.checked) {
		        serializedReturn += '&'+this.name+'=0';
		    }
		});
						
		var data = {
			type: 'save',
			action: 'of_ajax_post_action',
			security: nonce,
			data: serializedReturn
		};
					
		$.post(ajaxurl, data, function(response) {
			var success = $('#of-popup-save');
			var fail = $('#of-popup-fail');
			var loading = $('.ajax-loading-img');
			loading.fadeOut();  
			if (response == 1) {
				success.fadeIn();
			} else if( response == 2 ) {
				success.fadeIn();
				console.log( 'Custom.css not created, because WordPress doesn\'t have permission to create file! Please add ftp credential to your wp-config.php (Please contact support for more info.)' );
			} else { 
				fail.fadeIn();
			}
						
			window.setTimeout(function(){
				success.fadeOut(); 
				fail.fadeOut();				
			}, 2000);
		});
			
	return false; 
					
	});   
	
	
	/* AJAX Options Reset */	
	$('#of_reset').click(function() {
		
		//confirm reset
		var answer = confirm("Click OK to reset. All settings will be lost and replaced with default settings!");
		
		//ajax reset
		if (answer){
			
			var nonce = $('#security').val();
						
			$('.ajax-reset-loading-img').fadeIn();
							
			var data = {
			
				type: 'reset',
				action: 'of_ajax_post_action',
				security: nonce,
			};
						
			$.post(ajaxurl, data, function(response) {
				var success = $('#of-popup-reset');
				var fail = $('#of-popup-fail');
				var loading = $('.ajax-reset-loading-img');
				loading.fadeOut();  
							
				if (response==1)
				{
					success.fadeIn();
					window.setTimeout(function(){
						location.reload();                        
					}, 1000);
				} 
				else 
				{ 
					fail.fadeIn();
					window.setTimeout(function(){
						fail.fadeOut();				
					}, 2000);
				}
							

			});
			
		}
			
	return false;
		
	});


	/**	Tipsy @since v1.3 */
	if (jQuery().tipsy) {
		$('.tooltip, .typography-size, .typography-height, .typography-face, .typography-style, .of-typography-color').tipsy({
			fade: true,
			gravity: 's',
			opacity: 0.7,
		});
	}
	
	
	/**
	  * JQuery UI Slider function
	  * Dependencies 	 : jquery, jquery-ui-slider
	  * Feature added by : Smartik - http://smartik.ws/
	  * Date 			 : 03.17.2013
	  */
	jQuery('.smof_sliderui').each(function() {
		
		var obj   = jQuery(this);
		var sId   = "#" + obj.data('id');
		var val   = parseInt(obj.data('val'));
		var min   = parseInt(obj.data('min'));
		var max   = parseInt(obj.data('max'));
		var step  = parseInt(obj.data('step'));
		
		//slider init
		obj.slider({
			value: val,
			min: min,
			max: max,
			step: step,
			range: "min",
			slide: function( event, ui ) {
				jQuery(sId).val( ui.value );
			}
		});
		
	});


	/**
	  * Switch
	  * Dependencies 	 : jquery
	  * Feature added by : Smartik - http://smartik.ws/
	  * Date 			 : 03.17.2013
	  */
	jQuery(".switch-options label").click(function(){
		var $switchVal = $(this).data('id'),
			$hiddenInput = $(this).parent('.switch-options').find('.pix-switch-value');
		$(this).addClass('selected').siblings('label').removeClass('selected');
		$hiddenInput.val($switchVal);
		
		//fold/unfold related options
		if ( $hiddenInput.hasClass('fld-switch') ) {

			var $fold = $('.f_'+ $hiddenInput.data('id'));
			$.each($fold, function( index, value ) {
				if( $(value).hasClass($switchVal) ){
					$(value).slideDown('normal', "swing");
				}else {
					$(value).slideUp('normal', "swing");
				}
			});
			
		}

	});
	//disable text select(for modern chrome, safari and firefox is done via CSS)
	if (($.browser.msie && $.browser.version < 10) || $.browser.opera) { 
		$('.cb-enable span').find().attr('unselectable', 'on');
	}
	
	
	/**
	  * Google Fonts
	  * Dependencies 	 : google.com, jquery
	  * Feature added by : Smartik - http://smartik.ws/
	  * And Changed by 	 : Shahul Hameed - http://pixel8es.com
	  * Date 			 : 03.17.2013
	  */
	function GoogleFontSelect( slctr, mainID ){
		
		var _selected = $(slctr).val(); 						//get current value - selected and saved
		var _linkclass = 'style_link_'+ mainID;
		var _previewer = mainID +'_ggf_previewer';
		
		if( _selected ){ //if var exists and isset

			$('.'+ _previewer ).fadeIn();
			
			//Check if selected is not equal with "Select a font" and execute the script.
			if ( _selected !== 'none' && _selected !== 'Select a font' ) {
				
				//remove other elements crested in <head>
				$( '.'+ _linkclass ).remove();
				
				//replace spaces with "+" sign
				var the_font = _selected.replace(/\s+/g, '+');
				
				//add reference to google font family
				$('head').append('<link href="//fonts.googleapis.com/css?family='+ the_font +'" rel="stylesheet" type="text/css" class="'+ _linkclass +'">');
				
				//show in the preview box the font
				$('.'+ _previewer ).css('font-family', _selected +', sans-serif' );
				
			}else{
				
				//if selected is not a font remove style "font-family" at preview box
				$('.'+ _previewer ).css('font-family', '' );
				$('.'+ _previewer ).fadeOut();
				
			}
		
		}
	
	}
	
	//init for each element
	jQuery( '.google_font_select' ).each(function(){ 
		var mainID = jQuery(this).attr('id');

		var opt = jQuery(this).find(':selected');
		var sel = opt.text();
		var ogClass = opt.closest('optgroup').attr('class');

		if( ogClass == 'user-fonts' ) {			
			jQuery('.'+mainID+'_ggf_previewer').fadeOut();
		} else {
			GoogleFontSelect( this, mainID );
		}

	});
	
	//init when value is changed
	jQuery( '.google_font_select' ).change(function(){ 
		var mainID = jQuery(this).attr('id'), val = $(this).val(), $styleSelect = $('#'+mainID+'_style'), newOption = '';

		var opt = jQuery(this).find(':selected');
		var sel = opt.text();
		var ogClass = opt.closest('optgroup').attr('class');

		if( ogClass != 'user-fonts' ) {
			GoogleFontSelect( this, mainID );

			//Change font variant on change
			$.ajax({
				type: 'post',
				url: ajaxurl,
				data: {
					action: 'composer_change_gfont_weight',
					font: val
				},
				beforeSend: function()
				{
					$('#'+mainID+'_style').html('<option value="regular">Loading...</option>').prev('span').text('Loading');
				},
			})
			.done(function(res) {
				res = $.parseJSON(res);
				if(res != 'regular'){
					for( i in res){
						newOption += '<option value="'+ res[i] +'">'+ res[i].capitalize() +'</option>';
						if(i == ( res.length - 1 )){
							break;
						}
					}
					$('#'+mainID+'_style').html(newOption).val("regular").prev('span').text('Regular');
					newOption = '';
				}else{
					$('#'+mainID+'_style').html('<option value="regular">Regular</option>').prev('span').text('Regular');
				}
			})
			.fail(function() {
				alert('Font Style not loaded, Please refresh your page and try again!');
			});

		} else {
			$('#'+mainID+'_style').html('<option value="regular">Regular</option>').prev('span').text('Regular');
			$('.'+mainID+'_ggf_previewer').fadeOut();
		}

		
		
	});


	/**
	  * Media Uploader
	  * Dependencies 	 : jquery, wp media uploader
	  * Feature added by : Smartik - http://smartik.ws/
	  * Date 			 : 05.28.2013
	  */
	function optionsframework_add_file(event, selector) {
	
		var upload = $(".uploaded-file"), frame;
		var $el = $(this),
			fileType = $el.data('file-type');

		event.preventDefault();

		// If the media frame already exists, reopen it.
		if ( frame ) {
			frame.open();
			return;
		}
	  	
		var args = {
			// Set the title of the modal.
			title: $el.data('choose'),

			// Customize the submit button.
			button: {
				// Set the text of the button.
				text: $el.data('update'),
				// Tell the button not to close the modal, since we're
				// going to refresh the page when the image is selected.
				close: false
			}
		};

		if( fileType ) {
		  	args.library = {
		  		type: fileType
			}
		}

		// Create the media frame.
		frame = wp.media(args);

		// When an image is selected, run a callback.
		frame.on( 'select', function() {
			// Grab the selected attachment.
			var attachment = frame.state().get('selection').first();
			frame.close();
			selector.find('.upload').val(attachment.attributes.url);
			if ( attachment.attributes.type == 'image' ) {
				selector.find('.screenshot').empty().hide().append('<img class="of-option-image" src="' + attachment.attributes.url + '">').slideDown('fast');
			}
			selector.find('.media_upload_button').unbind();
			selector.find('.remove-image').removeClass('hide');//show "Remove" button
			selector.find('.of-background-properties').slideDown();
			optionsframework_file_bindings();
		});

		// Finally, open the modal.
		frame.open();
	}
    
	function optionsframework_remove_file(selector) {
		selector.find('.remove-image').addClass('hide');//hide "Remove" button
		selector.find('.upload').val('');
		selector.find('.of-background-properties').hide();
		selector.find('.screenshot').slideUp();
		selector.find('.remove-file').unbind();
		// We don't display the upload button if .upload-notice is present
		// This means the user doesn't have the WordPress 3.5 Media Library Support
		if ( $('.section-upload .upload-notice').length > 0 ) {
			$('.media_upload_button').remove();
		}
		optionsframework_file_bindings();
	}
	
	function optionsframework_file_bindings() {
		$('.remove-image, .remove-file').on('click', function() {
			optionsframework_remove_file( $(this).parents('.section-upload, .section-media, .media-wrap') );
        });
        
        $('.media_upload_button').unbind('click').click( function( event ) {
        	optionsframework_add_file(event, $(this).parents('.section-upload, .section-media, .media-wrap'));
        });
    }
    
    optionsframework_file_bindings();

    /* one click demo install */
	$('.demo_import').on('click', function(e){
		var nonce = $(this).data('nonce'), 
			$el = $(this),
			demoXml = $el.data('file'),
			$par = $el.parent('.pix-demo-button'),
			$con = $par.parent('.of-info'),
			$spinner = $par.next('.spinner'),
			$msg = $spinner.next('.import-messages');
		$.ajax({
			type: 'post',
			url: ajaxurl,
			data: {
				action: 'pix_import_demo',
				file: demoXml,
				security: nonce
			},
			beforeSend: function()
			{
				//Show loader
				$par.addClass('disabled');
				$spinner.removeClass('hidden');
				$msg.find('.info').show('400').siblings('span').hide();
				$el.html('<i class="icon-refresh"></i> Importing...');
			},
		})
		.done(function(response) {
			$par.removeClass('disabled');
			var alertMsg = response.replace( "pix_demo_import", '' );
			if(response.match('pix_demo_import')){
				$msg.find('.success').show('400').siblings('span').hide();
				$el.html('Import Success!');
				$con.css({
					background: '#d5efa8',
					borderColor: '#bce580',
					color: '#6a7f2f'
				});
			}else{
				$par.addClass('disabled');

				$con.css({
					background: '#fde9ea',
					borderColor: '#eaacb2',
					color: '#c46a77'
				});
				$msg.find('.import-error').show('400').siblings('span').hide();
				$el.html('<i class="icon-remove"></i> Import Failed :(');
			}			
		})
		.fail(function() {
			$par.addClass('disabled');
			$el.addClass('import-failed');
			$con.css({
				background: '#fde9ea',
				borderColor: '#eaacb2',
				color: '#c46a77'
			});
			$msg.find('.import-error').show('400').siblings('span').hide();
			$el.html('<i class="icon-remove"></i> Import Failed :(');
		})
		.always(function() {
			//remove loader
			//fade out sucess message after 10 sec.		
			$spinner.addClass('hidden');
			setTimeout(function(){
				$msg.find('span.msg').hide();
				$con.css({
					background: '#EFF9FF',
					borderColor: '#D6F0FF',
					color: '#eaacb2'
				});
				$el.text('Import Demo');
			},20000);
		});

		e.preventDefault();
	});	
	

}); //end doc ready

