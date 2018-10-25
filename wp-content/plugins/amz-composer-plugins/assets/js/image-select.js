//triger switch on load
jQuery(document).ready(function($){

	var $imageCon = $('.pix-image-select');

	$imageCon.each(function(){
		var val = $(this).find('.image_select_field').val();
		$(this).find('[data-val="' + val + '"]' ).find('img').addClass('outline');
	});

	$imageCon.on('click', '.amz-image-select', function(e) {
		e.preventDefault();
		
		$(this).find('img').addClass('outline').end().parent('li').siblings().find('img').removeClass('outline');

		$(this).parents('.pix-image-select').find('.image_select_field').val( $(this).data('val') );

	});

});
