<?php include TEMPLATEPATH . '/templates/category_filter.php' ?>

<article class="video_listed">
	<figure class="video_listed-thumb">
		<?php if(has_post_thumbnail()){ ?>
			<?php the_post_thumbnail('my-size'); ?>
		<?php }else{ $videoID = rwmb_meta('rw_videoID'); ?>
			<img src="https://img.youtube.com/vi/<?php echo $videoID ?>/default.jpg" alt="miniatura">
		<?php } ?>
	</figure>
	<div class="video_listed-content">
		<p class="video_listed-content-title"><?php echo get_the_title(); ?></p>
		<div class="video_listed-content-info">
			<p class="video_listed-content-info-date"><?php echo get_the_date(); ?></p>
			<p class="video_listed-content-info-category"><?php echo $category_name ?></p>
		</div>
	</div>
</article>