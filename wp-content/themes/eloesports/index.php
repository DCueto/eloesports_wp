<?php get_header(); ?>

<main class="container">
	<div class="click-block"></div>
	<?php rewind_posts(); ?>

	<?php include TEMPLATEPATH . '/templates/relevant.php' ?>
	<div class="wrap">
		<section class="featured-articles">
			<h2 class="featured-articles-title section-title">Relevantes</h2>
			<div class="article-wrapper">
				<?php include TEMPLATEPATH . '/templates/popular_posts.php'?>
			</div>
		</section>
		<section class="videos">
			<h2 class="videos-title section-title">Videos</h2>
			<div class="videos-container">
				<?php 
					$last_videos = get_posts(array(
						'category' => 11,
						'order' => 'desc',
						'numberposts' => 3,
					));
				?>
				<?php if($last_videos){ foreach ($last_videos as $post) : setup_postdata($post); ?>
				<?php include TEMPLATEPATH . '/templates/videos.php' ?>
				<?php endforeach; wp_reset_postdata(); }?>
			</div>
		</section>
		<section class="last-articles">
			<h2 class="last-articles-title section-title">Últimos Posts</h2>
			<div class="article-wrapper ajax_posts" id="last_posts">
				<?php
					$last_posts = get_posts(array(
						'order' => 'desc',
						'numberposts' => 3,
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
