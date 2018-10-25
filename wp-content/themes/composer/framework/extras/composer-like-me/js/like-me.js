(function($){

	var pixLikeMe = function (e){

		e.preventDefault();

		var self = $(this),
			postID = self.data('id');

		if(self.hasClass('liked')){
			alert(pixLike.liked);
			return;
		};

		self.off('click');

		$.ajax({
			type: 'post',
				url: pixLike.ajaxurl,
				beforeSend: function(){
					self.addClass('like-loading');
				},
				data: {
					action	:	'pix_like_me',
					postid	:	postID,
				},
		}).done(function(response) {
			self.addClass('liked').find('.like-count').text(response);
		}).always(function(){
			self.removeClass('like-loading');
			self.on('click',pixLikeMe);
		});
	};

	$('.pix-like-me').on('click',pixLikeMe);

})(jQuery);