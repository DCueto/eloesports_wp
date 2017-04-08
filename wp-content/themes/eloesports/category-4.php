<?php get_header(); $cat_id = get_query_var('cat'); ?>


<main class="container">
	<div class="click-block"></div>
	<div class="banner"></div>
	<?php rewind_posts(); ?>
	
	<?php include TEMPLATEPATH . '/templates/relevant/relevant-vg.php' ?>
	<div class="wrap">
		<section class="featured-articles">
			<h2 class="featured-articles-title section-title">Relevantes</h2>
			<div class="article-wrapper">
				<?php 
					$args_rp = array(
						'tag' => 'destacado',
						'offset' => 3,
						//'post_per_page' => 6,
						'category' => 4,
						//'numberposts' => 6,
						'order' => 'desc',
						);
					$relevant_posts = get_posts($args_rp);
					if($relevant_posts){ foreach ($relevant_posts as $post) : setup_postdata($post); ?>
				<?php include TEMPLATEPATH . '/templates/popular_posts.php'?>
				<?php endforeach; wp_reset_postdata(); } ?>
			</div>
		</section>
		<section class="last-articles">
			<h2 class="last-articles-title section-title">Últimos Posts</h2>
			<div class="article-wrapper ajax_posts" id="last_posts">
				<?php
					$last_posts = get_posts(array(
						'order' => 'desc',
						'numberposts' => 3,
						'category' => 4,
						'category__not_in' => array(11,),
					));
			 	?>
				<?php if($last_posts){ foreach ($last_posts as $post) : setup_postdata( $post ); ?>
				<?php include TEMPLATEPATH . '/templates/theloop.php'?>
				<?php endforeach; wp_reset_postdata(); }?>
			</div>
			<div id="more_posts" data-category="<?php echo esc_attr($cat_id); ?>"><?php esc_html_e('Ver Más', 'eloesports') ?></div>
		</section>
	</div>

</main>


<?php get_footer(); ?>
</body>
</html>
