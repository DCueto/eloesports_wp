<?php
	/*
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
	*/
	
	$args_rp = array(
		'tag' => 'destacado',
		'offset' => 3,
		'post_per_page' => 6,
		//'numberposts' => 6,
		);

	$relevant_posts = get_posts($args_rp);

	if($relevant_posts){ foreach ($relevant_posts as $post) : setup_postdata($post);
	include TEMPLATEPATH . '/templates/category_filter.php';
?>

	<article class="article">
		<a href="<?php the_permalink(); ?>">
		<div class="blur-bottom"></div>
		<div class="article-info">
			<p class="last_posts-post-info-date"><?php the_date(); ?></p>
			<p class="last_posts-post-info-cat"><?php echo $category_name; ?></p>
		</div>
		<?php if ( has_post_thumbnail() ) { ?>
			<figure class="article-thumb">
				<?php the_post_thumbnail('my-size'); ?> 
			</figure>
            <?php 
            }else{ 
            ?>
            <?php
            }
            ?>

		<div class="article-content">
			<h3 class="article-content-title"><?php the_title(); ?></h3>
			<div class="article-content-container">
				<p class="article-content-container-description"><?php the_excerpt(); ?></p>
			</div>
		</div>
		<div class="article-author">
			<span>by</span><p><?php the_author(); ?></p>
		</div>
		</a>
	</article>

<?php endforeach; wp_reset_postdata(); } ?>