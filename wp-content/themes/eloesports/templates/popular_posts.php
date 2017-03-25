<?php 
	$popular_posts = array(
		//'header' => 'Articulos Populares',
		'limit' => 6,
		'range' => 'weekly',
		//'freshness' => 1,
		'order_by' => 'avg',
		'stats_date' => 1,
		'stats_date_format' => 'F j, Y',
		'excerpt_length' => 100,
		'excerpt_format' => 1,
	);
	
	if (function_exists('wpp_get_mostpopular')){
		//$print_posts = wpp_post($popular_posts);
		wpp_get_mostpopular($popular_posts);
	}
?>