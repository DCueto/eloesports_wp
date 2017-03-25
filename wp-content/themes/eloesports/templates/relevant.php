<section class="featured">
	<div class="featured-main">
		<?php
			$latests_posts = get_posts( array(
				'numberposts' => 1,
				'order' => 'Asc',
				'category' => 3,
				)
			);

			$id1 = $latests_posts[0]->ID;

			//var_dump($id1);

			if ($latests_posts) {
				foreach ($latests_posts as $post):
					setup_postdata( $post ); ?>
					<a href="<?php the_permalink(); ?>">
					<article class="featured-main-article hover-opacity">
						<figure class="featured-main-article-image hover-opacity-image">
							<?php the_post_thumbnail(); ?>
						</figure>
						<div class="featured-main-article-bottom">
							<p class="featured-title"><?php the_title(); ?></p>
						</div>
					</article>
					</a>
				<?php 
				endforeach;
				wp_reset_postdata();
			}
		?>
	</div>
	<div class="featured-secondary">
		<?php 
			$latests_posts = get_posts( array(
				'numberposts' => 2,
				'order' => 'Asc',
				'offset' => 1,
				'category' => 3,
				)
			);

			if ($latests_posts) {
				foreach ($latests_posts as $post):
					setup_postdata( $post ); ?>
					<a href="<?php the_permalink(); ?>">
					<article class="featured-secondary-article hover-opacity">
						<figure class="featured-secondary-article-image hover-opacity-image">
							<?php the_post_thumbnail(); ?>
						</figure>
						<div class="featured-secondary-article-bottom">
							<p class="featured-title"><?php the_title(); ?></p>
						</div>
					</article>
					</a>
				<?php 
				endforeach;
				wp_reset_postdata();
			}
		?>
	</div>
</section>
