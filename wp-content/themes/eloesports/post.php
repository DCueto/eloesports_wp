<?php include TEMPLATEPATH . '/templates/category_filter.php'; ?>

	<article class="article">
		<a href="<?php the_permalink(); ?>">
		<div class="blur-bottom"></div>
		<div class="article-info">
			<p class="last_posts-post-info-date"><?php echo get_the_date(); ?></p>
			<p class="last_posts-post-info-cat"><?php echo $category_name; ?></p>
		</div>
		<?php if ( has_post_thumbnail() ) { ?>
			<figure class="article-thumb">
				<?php the_post_thumbnail('my-size'); ?>
				<?php if (has_post_format('video')){ ?>
				<span class="icon-play play-icon"></span>
				<?php } ?>
			</figure>
            <?php 
            }else{ 
            ?>
            <?php
            }
            ?>

		<div class="article-content">
			<h3 class="article-content-title"><?php echo get_the_title(); ?></h3>
			<div class="article-content-container">
				<p class="article-content-container-description"><?php echo get_the_excerpt(); ?></p>
			</div>
		</div>
		<div class="article-author">
			<span>por</span><p><?php the_author(); ?></p>
		</div>
		</a>
	</article>
