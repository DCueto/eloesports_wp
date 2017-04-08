$(function(){

var $content = $('.ajax_posts');
var $loader = $('#more_posts');
var cat = $loader.data('category');
var ppp = 3;
var offset = $('#last_posts').find('.article').length;

$loader.on('click', load_ajax_posts);

/*$loader.click(function(){
	alert('funciona');
	if (!($loader.hasClass('post_loading_loader') || $loader.hasClass('post_no_more_posts'))) {
		$.ajax({
			type: 'POST',
			dataType: 'html',
			url: ajax_load_posts.ajaxurl,
			data: {
				//'cat': cat,
				'ppp': ppp,
				'offset': offset,
				'action': 'eloesports_more_post_ajax'
			},
			beforeSend : function () {
				$loader.addClass('post_loading_loader').html('');
			},
			success: function (data) {
				var $data = $(data);
				if ($data.length) {
					var $newElements = $data.css({ opacity: 0 });
					$content.append($newElements);
					$newElements.animate({ opacity: 1 });
					$loader.removeClass('post_loading_loader').html(ajax_load_posts.loadmore);
				} else {
					$loader.removeClass('post_loading_loader').addClass('post_no_more_posts').html(ajax_load_posts.noposts);
				}
			},
			error : function (jqXHR, textStatus, errorThrown) {
				$loader.html($.parseJSON(jqXHR.responseText) + ' :: ' + textStatus + ' :: ' + errorThrown);
				console.log(jqXHR);
			},
		});
	}
	offset += ppp;
	return false;
});*/

function load_ajax_posts() {
	//alert(ajax_load_posts.phpvar);
	if (!($loader.hasClass('post_loading_loader') || $loader.hasClass('post_no_more_posts'))) {
		$.ajax({
			type: 'POST',
			dataType: 'html',
			url: ajax_load_posts.ajaxurl,
			data: {
				'cat': cat,
				'ppp': ppp,
				'offset': offset,
				'action': 'eloesports_more_post_ajax',
			},
			beforeSend : function () {
				$loader.addClass('post_loading_loader').html('');
			},
			success: function (data) {
				var $data = $(data);
				if ($data.length) {
					var $newElements = $data.css({ opacity: 0 });
					$content.append($newElements);
					$newElements.animate({ opacity: 1 });
					$loader.removeClass('post_loading_loader').html(ajax_load_posts.loadmore);
				} else {
					$loader.removeClass('post_loading_loader').addClass('post_no_more_posts').html(ajax_load_posts.noposts);
				}
			},
			error : function (jqXHR, textStatus, errorThrown) {
				$loader.html($.parseJSON(jqXHR.responseText) + ' :: ' + textStatus + ' :: ' + errorThrown);
				console.log(jqXHR);
			},
		});
	}
	offset += ppp;
	return false;
}

});