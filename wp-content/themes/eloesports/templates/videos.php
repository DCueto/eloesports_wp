<section class="videos">
	<h2 class="videos-title section-title">Videos</h2>
	<div class="videos-container">

		<?php 
			$last_videos = get_posts(array(
				'order' => 'desc',
				'numberposts' => 1,
				'tax_query' => array(
					array(
						'taxonomy' => 'post_format',
						'field' => 'slug',
						'terms' => array('post-format-video'),
						),
					),
			));
		?>
		<?php if($last_videos){ foreach ($last_videos as $post) : setup_postdata($post); ?>
		<?php get_template_part('post', 'video') ?>
		<!--<?php //include TEMPLATEPATH . '/templates/videos.php' ?>-->
		<?php endforeach; wp_reset_postdata(); }?>
		<?php  ?>
		<div class="video_list">
			<?php $videos = get_posts(array(
				'order' => 'desc',
				'tax_query' => array(
					array(
						'taxonomy' => 'post_format',
						'field' => 'slug',
						'terms' => array('post-format-video'),
						),
					),
				)); ?>
			<?php if($videos){ foreach ($videos as $post) : setup_postdata($post); ?>
			<?php get_template_part('templates/video-list'); ?>
			<?php endforeach; wp_reset_postdata(); }?>
		</div>
	</div>
</section>