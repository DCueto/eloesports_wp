
	
	<?php include TEMPLATEPATH . '/templates/category_filter.php' ?>

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
				<p class="article-content-container-description"><?php echo rwmb_meta('rw_frased'); ?></p>
			</div>
		</div>
		<div class="article-author">
			<span>by</span><p><?php the_author(); ?></p>
		</div>
		</a>
	</article>