$(document).ready(function(){


// Animación hover sobre articulos

$('.article').hover(function(){
	$(this).css({'border': '1px solid cornflowerblue'});
	$('.article-content-title', this).css({color: '#144794'});
	$('.article-author p', this).css({color: '#144794'});
}, function(){
	$(this).css({'border': '1px solid lightgrey'});
	$('.article-content-title', this).css({color: 'black'});
	$('.article-author p', this).css({color: '#4d4d4d'});
});

// Animación hover sobre articulos en single.php sidebar
$('.last_posts-post').hover(function(){
	$(this).css({'border': '2px solid cornflowerblue'});
	$('p', this).css({'color': 'cornflowerblue'});
}, function(){
	$(this).css({'border': '0px solid lightgrey', 'border-bottom': '1px solid lightgrey'});
	$('p', this).css({'color': '#4d4d4d'});
	$('.last_posts-post-title', this).css({'color': 'black'});
});

$('.hover-opacity').hover(function(){
	$(this).find('.hover-opacity-image').css({opacity:'0.5'}, 100);
	$('.featured-title', this).css({color: 'cornflowerblue'}, 100);
}, function(){
	$(this).find('.hover-opacity-image').css({opacity:'1'}, 100);
	$('.featured-title', this).css({color: 'white'}, 100);
});


// CLICK NAV MOBILE

$('.header-left').click(function() {
	if($('.nav-mobile').hasClass('nav-mobile-off')){
		$('.nav-mobile').addClass('nav-mobile-on');
		$('.click-block').css({display: 'block'});
		$('.nav-mobile').animate({left: '0'}, 200, function() {});
		$('.click-block').animate({left: '0'}, 200, function() {});
		$('.nav-mobile').removeClass('nav-mobile-off');

		$('.container').click(function() {
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