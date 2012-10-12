$(function(){
	if ($('#quick-login').length > 0) {
		$('#quick-login').dialog({
			autoOpen: false,
		    show: 'fade',
		    modal: true,
		    draggable: false,
		    resizable: false,
		    width: 540,
		    height:280,
		    dialogClass: 'quick-login'
		});
	}
});


var Waduanzi = {
	IncreasePostViewNums: function(postid, url){
		var xhr = $.ajax({
			url: url,
			type: 'post',
			dataType: 'jsonp',
			data: {id:postid}
		});
	},
	RatingPost: function(event){
		event.preventDefault();
		var tthis = $(this);
		var pid = parseInt(tthis.attr('data-id'));
		var score = parseInt(tthis.attr('data-value'));
		var url = tthis.attr('data-url');

		var this_pushed = tthis.hasClass('pushed');
		var up_pushed = tthis.parent().find('a.arrow-up').hasClass('pushed');
		var down_pushed = tthis.parent().find('a.arrow-down').hasClass('pushed');
		var score_step = like_step = 0;
		if (up_pushed || down_pushed) {
			if (this_pushed) {
				tthis.toggleClass('pushed');
				score_step = (score > 0) ? -1 : 1;
				like_step = (score > 0) ? -1 : 0;
			}
			else {
				tthis.parent().find('a').toggleClass('pushed');
				score_step = (score > 0) ? 2 : -2;
				like_step = (score > 0) ? 1 : -1;
			}
		}
		else {
			tthis.toggleClass('pushed');
			if (score > 0)
				score_step = like_step = 1;
			else {
				score_step = -1;
				like_step = 0;
			}
		}

		// 此处先更新页面数字，不管成功与否
		$('#score-count').text(parseInt($('#score-count').text()) + score_step);
		$('#like-count').text(parseInt($('#like-count').text()) + like_step);

		var xhr = $.ajax({
			url: url,
			type: 'post',
			dataType: 'text',
			data: {id:pid, score:score}
		});
		xhr.done(function(data){
			if (parseInt(data) > 0) {
				// success
			}
		});
	},
	RatingComment: function(event){
		event.preventDefault();
		var tthis = $(this);
		var pid = parseInt(tthis.attr('data-id'));
		var score = parseInt(tthis.attr('data-value'));
		var scoreEl = tthis.parents('.comment-item').find('.comment-score');
		var url = tthis.attr('data-url');

		var this_pushed = tthis.hasClass('pushed');
		var up_pushed = tthis.parent().find('a.arrow-up').hasClass('pushed');
		var down_pushed = tthis.parent().find('a.arrow-down').hasClass('pushed');
		var score_step = 0;
		if (up_pushed || down_pushed) {
			if (this_pushed) {
				tthis.toggleClass('pushed');
				score_step = (score > 0) ? -1 : 1;
			}
			else {
				tthis.parent().find('a').toggleClass('pushed');
				score_step = (score > 0) ? 2 : -2;
			}
		}
		else {
			tthis.toggleClass('pushed');
			if (score > 0)
				score_step = 1;
			else {
				score_step = -1;
			}
		}

		// 此处先更新页面数字，不管成功与否
		scoreEl.text(parseInt(scoreEl.text()) + score_step);

		var xhr = $.ajax({
			url: url,
			type: 'post',
			dataType: 'text',
			data: {id:pid, score:score}
		});
		xhr.done(function(data){
			if (parseInt(data) > 0) {
				// success
			}
		});
	},
	AjustImgWidth: function(selector, max){
		if ($.browser.msie && parseInt($.browser.version) < 7) {
			if (selector.width() > max)
				selector.css('width', max);
		}
	},
	PostComment: function(event) {
		event.preventDefault();
		var content = $.trim($('#comment-content').val());
		var postid = parseInt($('input[name=postid]').val());
		if (postid <= 0 || content.length <= 0)
			return false;
		var form = $(this).parents('form');

		var xhr = $.ajax({
			url: form.attr('action'),
			type: 'post',
			dataType: 'json',
			data: $('#comment-form').serialize(),
			beforeSend: function(){
				$('#caption-error').empty().hide();
				form.find('.save-caption-loader').show();
			}
		});
		xhr.done(function(data){
			form.find('.save-caption-loader').hide();
			if (data.errno == 0) {
				$('#comments').prepend(data.html);
				$('#comment-content').val('');
				$('#comment-content').removeClass('expand');
			}
			else
				$('#caption-error').html(data.error).show();
		});
		xhr.fail(function(){
			form.find('.save-caption-loader').hide();
			$('#caption-error').html('发送请求错误！').show();
		});
	}
};

Waduanzi.switchImageSize = function(event){
    event.preventDefault();
    var itemDiv = $(this).parents('.post-item');
    itemDiv.find('.post-image .thumbnail-more').toggle();
    itemDiv.find('.post-image .thumbnail a .thumb').toggle();
    itemDiv.find('.post-image .thumb-pall').toggle();
    var originalUrl = itemDiv.find('.post-image .thumbnail a').attr('href');
    itemDiv.find('.post-image .thumbnail a .original').attr('src', originalUrl).toggle();
    var itemPos = itemDiv.position();
    $('body').scrollTop(itemPos.top);
};

Waduanzi.postUpDownScore = function(event){
	event.preventDefault();
	$('#quick-login').dialog('open');
	var tthis = $(this);
	var itemDiv = tthis.parents('.post-item');
	var pid = itemDiv.attr('data-id');
	var score = tthis.attr('data-score');
	var url = tthis.attr('data-url');
	
	var jqXhr = $.ajax({
		type: 'POST',
		url: url,
		data: {pid: pid, score: score},
		dataType: 'text'
	});
	
	jqXhr.done(function(data){
		if (data > 0) {
			var old = parseInt(tthis.text());
			var newScore = 0;
			if (tthis.hasClass('upscore'))
				newScore = old + 1;
			else if (tthis.hasClass('downscore'))
				newScore = old - 1;
				
			tthis.text(newScore);
			tthis.addClass('voted disabled');
			itemDiv.find('a.downscore').addClass('disabled');
			itemDiv.find('.item-toolbar').off('click', 'a.upscore, a.downscore');
		}
		else
			alert('x');
	});
	
	jqXhr.fail(function(){
		alert('x');
	});
};


