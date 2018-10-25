/*
pixel8es Scripts File
Author: Shahul Hameed

This file should contain any js scripts you want to add to the site.
Instead of calling it in the header or throwing it inside wp_head()
this file will be called automatically in the footer so as not to
slow the page load.

*/

// IE8 ployfill for GetComputed Style (for Responsive Script below)
if (!window.getComputedStyle) {
	window.getComputedStyle = function(el, pseudo) {
		this.el = el;
		this.getPropertyValue = function(prop) {
			var re = /(\-([a-z]){1})/g;
			if (prop == 'float') prop = 'styleFloat';
			if (re.test(prop)) {
				prop = prop.replace(re, function () {
					return arguments[2].toUpperCase();
				});
			}
			return el.currentStyle[prop] ? el.currentStyle[prop] : null;
		}
		return this;
	}
}

/* Theme Scripts */
(function($){
	'use strict';

	//WOO DROP DOWN
	function woo_drop_down(){
		/* WOO COMMERCE Cart */
		var $cartBtn = $('.cart-trigger'),
			$cartDropdown = $('.cart-trigger').find('.woo-cart-dropdown');

		if($cartBtn.length > 0 && $cartDropdown.length > 0){

			$cartBtn.mouseover(function(){
				$(this).find('.woo-cart-dropdown').stop().fadeIn();
			}).mouseout(function(){
				$(this).find('.woo-cart-dropdown').stop().fadeOut();
			});

		}
	}

	/* Make pie Responsive */
	function pieChartResponsive(options, $self, $border, size){
		if($self.hasClass('style2') && $self.hasClass('style4')){

			$border.css({
				'line-height': (size + options.style4) +'px',
				'height': (size + options.style4) +'px',
				'width': (size + (options.style4)) +'px'
			});

		}else if($self.hasClass('style2') && $self.hasClass('style5')){

			$border.css({
				'line-height': (size - options.style5) +'px',
				'height': (size - options.style5) +'px',
				'width': (size - (options.style5)) +'px'
			});

		}
		else if($self.hasClass('style2') && $self.hasClass('style6')){

			$border.css({
				'line-height': (size + options.style6) +'px',
				'height': (size + options.style6) +'px',
				'width': (size + options.style6) +'px'
			});

		}
		else if($self.hasClass('style2')){

			$border.css({
				'line-height': (size + options.style2) +'px',
				'height': (size + options.style2) +'px',
				'width': (size + options.style2) +'px'
			});

		}
	}

	/* getting viewport width */
	var responsive_viewport = $(window).width();
	
	if (responsive_viewport >= 768) {
	
		/* load gravatars */
		$('.comment img[data-gravatar]').each(function(){
			$(this).attr('src',$(this).attr('data-gravatar'));
		});
		
	}

	/* WPML Language Menu */
	var $langBtn = $('#lang-list.lang-dropdown.translated');
		;

	if($langBtn.length > 0){

		$langBtn.mouseover(function(){
                        var $langDropdown = $(this).find('.lang-dropdown-inner');
			$langDropdown.stop().slideDown();
		}).mouseout(function(){
                        var $langDropdown = $(this).find('.lang-dropdown-inner');
			$langDropdown.stop().slideUp();
		});

	}

	//Back To Top
	$("#back-top").hide();

	$(window).scroll(function(){

		var scrollTopVal = $(this).scrollTop();
		
		if($(this).scrollTop()>100){
			$("#back-top").fadeIn();
		}else{
			$("#back-top").fadeOut();
		}
	});

	$("#back-top a").click(function(){
		$("body,html").animate({
			scrollTop:0},800);
			return false;
	});


	// Header Widget
	var $headerWidgetCon = $("#headerWidgetCon"),
		$toggleBtn = $headerWidgetCon.find('.toggleBtn'),
		headerWidgetStatus = 0;
	
	if($headerWidgetCon.length > 0 ){

		$toggleBtn.on('click', function(e) {
			e.preventDefault();
			
			if(headerWidgetStatus == 0){
				$headerWidgetCon.animate({bottom: -$headerWidgetCon.outerHeight()});
				$toggleBtn.addClass('close').removeClass('open');
				headerWidgetStatus = 1;
			}else{
				$headerWidgetCon.animate({bottom: -2});         
				$toggleBtn.addClass('open').removeClass('close');
				headerWidgetStatus = 0;
			}
			
		});
	}

	/* End of Header Scripts */

	//parallax
	$('.parallax').parallax('50%', -0.3, true);

	/* Responsive video */
	$(".container, .posts, .pix-blog-video,.wp-video, .pix-post-video").fitVids();

	/* open share in popup window */
	$('.port-share-btn a').on('click', function(){
		newwindow=window.open($(this).attr('href'),'','height=450,width=700');
		if (window.focus) {newwindow.focus()}
			return false;
	});

	//Magnific Popup
	$('.popup-video').magnificPopup({
			disableOn: 700,
			type: 'iframe',
			mainClass: 'mfp-fade',
			removalDelay: 160,
			preloader: false,
			fixedContentPos: true
		});

	/* Pie Chart Used in Skills */
	$('.pix-chart').each(function(index, el) {

		var $self = $(this);
			$self.width($self.data('size')).height($self.data('size')).css('line-height', $self.data('size') +'px');

		$self.waypoint(function() {

			$(this).easyPieChart({  
				onStart: function(from, to){
					var canvas = $(this.el).find('canvas'),
						size = canvas.width(),
						$border = $(this.el).find('.border-bg'), 
						$bg = $(this.el).find('.bg'),
						$self = $(this.el);

					$self.css({
						'line-height': (size) +'px',
						'height': (size) +'px',
						'width': (size) +'px'
					});

				},      
				onStep: function(from, to, percent) {
					$(this.el).find('.percent-text').text(Math.round(percent));
				}
			});

		},
		{
			offset: '90%',
			triggerOnce: true
		});

	});


	$(window).resize(function(event) {

		var responsive_viewport = $(window).width();
		
		/* PIE CHART */
		$('.pix-chart').each(function(index, el) {

			var $self = $(this),
				canvas = $self.find('canvas'), 
				size = canvas.width(),
				$border = $self.find('.border-bg'), 
				$bg = $self.find('.bg');

			$self.css({
				'line-height': (size) +'px',
				'height': (size) +'px'
			});

		});
		
	});



	$(window).load(function() {

		//Woo DropDown
		woo_drop_down();


		/* Sticky Header */
		if($simplemenu.length == 0){
			var $headerCon = $('.header-con.pix-sticky-header');
			if($headerCon.length > 0){
				$headerCon.waypoint('sticky', {
					offset: -($('.header-wrap').height()+30)
				});
			}
		}

		//Blog Playlist
		var $playlist = $('.wp-playlist-tracks'),
			$playlist_trigger = $('<div />', {class: 'show-playlist' }).prepend('<div class="open-playlist pix-icons pix-plus"></div>');

		if( $playlist.length > 0){
			$playlist.wrap($playlist_trigger);

			var $showPlaylist = $('.show-playlist')

			$showPlaylist.mouseover(function(event) {
				var $thisPlaylist = $(this).find('.wp-playlist-tracks');
				$thisPlaylist.stop().slideDown('fast');

				event.stopPropagation();
			});

			$showPlaylist.mouseleave(function(event) {
				var $thisPlaylist = $(this).find('.wp-playlist-tracks');
				$thisPlaylist.stop().slideUp('fast');
				event.stopPropagation();
			});

		}
		
		/* Isotope js */ 
		// cache container
		var $container = $('.portfolio-contents'),
			$portExtend = $('#portfolio-page.container-extend');
		// initialize isotope
		
		if($portExtend.length > 0 ){
			$portExtend.css('max-width', $(window).width());
		}

		$container.isotope({
			itemSelector : '.element',
			masonry : {
				columnWidth : 1
			}
		});

		// Blog
		var  $masonryContainer = $('.isotopeCon'), $filterCon = $("#filters");
		$masonryContainer.isotope({
			itemSelector : '.element',
			masonry : {
				columnWidth : 1
			}
		});

		if($filterCon.hasClass('dropdown')){
			$filterCon.find('.selected').parent('li').css('display', 'none');
		}
		
		/* Portfolio Filter - Dropdown Style */
		$('.top-active').on('click', function(e) {
			e.preventDefault();
			
			$(this).next('#filters').slideToggle('400');

		});


		// filter items when filter link is clicked
		$('#filters a').click(function(){
			var $this = $(this),
				$filter = $this.parents('#filters');

			if($filter.hasClass('dropdown')){
				$filter.slideUp(400, function(){
					$this.parent('li').css('display', 'none');
					$this.parent('li').siblings().css('display', 'block');
				});
				$filter.prev('.top-active').find('.txt').text($this.text());
			}

			// don't proceed if already selected
			if ( $this.hasClass('selected') ) {
				return false;
			}
			
			var $optionSet = $this.parents('.option-set');
			$optionSet.find('.selected').removeClass('selected');
			$this.addClass('selected');



			var selector = $(this).attr('data-filter');
			$container.isotope({ filter: selector });
			$masonryContainer.isotope({ filter: selector });
			return false;
		});


	});
	
})(jQuery);
