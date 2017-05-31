$(function(){

var $content = $('.ajax_posts');
var $loader = $('#more_posts');
var cat = $loader.data('category');
var ppp = 8;
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
$(document).ready(function(){


// Animación hover sobre articulos

// Articulos
$('body').on('mouseenter', '.article', function(e){
	$(this).css({'border': '1px solid cornflowerblue'});
	$('.play-icon', this).css({'color': 'cornflowerblue'});
	$('.article-content-title', this).css({color: '#144794'});
	$('.article-author p', this).css({color: '#144794'});
});

$('body').on('mouseleave', '.article', function(e){
	$(this).css({'border': '1px solid lightgrey'});
	$('.play-icon', this).css({'color': 'white'});
	$('.article-content-title', this).css({color: 'black'});
	$('.article-author p', this).css({color: '#4d4d4d'});
});

// Lista de videos

$('.video_list').on('mouseenter', '.video_listed', function(e){
	$(this).css({'background-color': 'rgb(62, 62, 62)'});
	//$(this).css({'border': '2px solid cornflowerblue'});
	//$('p', this).css({'color': 'cornflowerblue'});
});

$('.video_list').on('mouseleave', '.video_listed', function(e){
	$(this).css({'background-color': '#252525'});
	//$(this).css({'border': '0px solid lightgrey'});
	//$('.video_listed-content-info', this).find('p').css({'color': 'lightgrey'});
	//$('.video_listed-content-title', this).css({'color': 'lightgrey'});
});


// Show & hide scrollbar last_post in Single.php

var parent = $('.scroll-container');
var child = $('.scroll-container2');
var paddingRight = child.offsetWidth - child.clientWidth + "px";
child.css({'padding-right': paddingRight});

// Animación hover sobre articulos en single.php sidebar
$('.last_posts').on('mouseenter', '.last_posts-post', function(e){
	$(this).css({'border': '2px solid cornflowerblue'});
	$('.last_posts-post').css({'width': 'auto'});
	$('p', this).css({'color': 'cornflowerblue'});
	$(this).parent('.scroll-container2').css({'padding-right': '0'});
});

$('.last_posts').on('mouseleave', '.last_posts-post', function(e){
	$(this).css({'border': '0px solid lightgrey', 'border-bottom': '1px solid lightgrey'});
	$('.last_posts-post').css({'width': '98%'});
	$('p', this).css({'color': '#4d4d4d'});
	$('.last_posts-post-title', this).css({'color': 'black'});
	$(this).parent().css('padding-right', '17px');
});

// Animación en el slider de Relevantes

$('.hover-opacity').hover(function(){
	$(this).find('.hover-opacity-image').css({opacity:'0.5'}, 100);
	$('.featured-title', this).css({color: 'cornflowerblue'}, 100);
}, function(){
	$(this).find('.hover-opacity-image').css({opacity:'1'}, 100);
	$('.featured-title', this).css({color: 'white'}, 100);
});


// CLICK NAV MOBILE

$('.menu-icon').click(function(event) {
	event.preventDefault();
	if($('.nav-mobile').hasClass('nav-mobile-off')){
		$('.nav-mobile').addClass('nav-mobile-on');
		$('.click-block').css({display: 'block'});
		$('.nav-mobile').animate({left: '0'}, 200, function() {});
		$('.click-block').animate({left: '0'}, 200, function() {});
		$('.nav-mobile').removeClass('nav-mobile-off');

		$('.container').click(function(event) {
			event.preventDefault();
			$('.nav-mobile').animate({left: '-100%'}, 200, function() {});
			$('.click-block').animate({left: '-100%'}, 200, function() {});
			$('.click-block').css({display: 'none'});
			$('.nav-mobile').addClass('nav-mobile-off');
			$('.nav-mobile').removeClass('nav-mobile-on');
		});
	} else if ($('.nav-mobile').hasClass('nav-mobile-on')) {
		$('.nav-mobile').animate({left: '-100%'}, 200, function() {});
		$('.click-block').animate({left: '-100%'}, 200, function() {});
		$('.click-block').css({display: 'none'});
		$('.nav-mobile').addClass('nav-mobile-off');
		$('.nav-mobile').removeClass('nav-mobile-on');
	}
});

$(window).scroll(function() {
	//$('.main-header').css({opacity: '0.98'});
	//$('header').css({position: 'fixed'});
});


// CHECK FOR THUMBNAIL
/*
if ($('.article figure').hasClass('article-thumb')){
	$('.article').has('.article-thumb').css({width: '48%'});
}*/

//$('.article-tumb').css({width: '49%'});



// MEDIA QUERIES

// No event resize
	
	// Media query - Tablet screen

	if ($('body').width() < 1080 ){
		$(".header_author-info-bio").detach().appendTo('.header_author');
		$('.header_author-info-bio h4').css({background: '#1B1C25', color: 'white', padding: '3px'});
	}

	if ($('body').width() >= 1080 ){
		$(".header_author-info-bio").detach().appendTo('.header_author-info');
		$('.header_author-info-bio h4').css({background: 'white', color: 'black', padding: '0'});
	}

	// Media query - Smartphone screen

if ($('body').width() < 730 ){
	if ($('.article figure').hasClass('article-thumb')){
		$('.article').has('.article-thumb').css({width: '100%', 'min-height': '300px'});

	}
}
	// Media query - Tablet screen
if ($('body').width() >= 730 ){
	if ($('.article figure').hasClass('article-thumb')){
		$('.article').has('.article-thumb').css({width: '48%', height: '440px', 'min-height': '130px'});
	}
}

/*
if ($('body').width() >= 1150) {
	$('.article').css({width: '355px'});

}*/


// With resize event

$(window).resize(function(){


	// Media query - Tablet screen

	if ($('body').width() < 1080 ){
		$(".header_author-info-bio").detach().appendTo('.header_author');
		$('.header_author-info-bio h4').css({background: '#1B1C25', color: 'white', padding: '3px'});
	}

	if ($('body').width() >= 1080 ){
		$(".header_author-info-bio").detach().appendTo('.header_author-info');
		$('.header_author-info-bio h4').css({background: 'white', color: 'black', padding: '0'});
	}

	// Media query - Smartphone screen

	if ($('body').width() < 730 ){
		if ($('.article figure').hasClass('article-thumb')){
			$('.article').has('.article-thumb').css({width: '100%', 'min-height': '300px'});
		}
	}

	// Media query - Tablet screen

	if ($('body').width() >= 730 ){
		if ($('.article figure').hasClass('article-thumb')){
			$('.article').has('.article-thumb').css({width: '48%', height: '440px', 'min-height': '130px'});
		}
    }
    /*
    if ($('body').width() >= 1150) {
    	$('.article').css({width: '355px'});

    }*/

    

});

});