<?php get_header(); ?>


<main class="container">
	<div class="click-block"></div>
	<div class="wrap">
		<section class="main__single">
			<div class="single">
				<?php 

					// AQUÍ SE FILTRAN LAS CATEGORIAS DE LOS POSTS PARA SACAR 1 SOLA CATEGORIA - Añadir más categorias cuando se introduzcan más juegos

					$category = get_the_category();
					foreach ($category as $cat) {
						if (($cat->slug == "vainglory") or ($cat->slug == "lol") or ($cat->slug == "overwatch") or ($cat->slug == "csgo") or ($cat->slug == "hearthstone") or ($cat->slug == "dota") or ($cat->slug == "noticias")){
							$category_name = $cat->name;
							$category_slug = $cat->slug;
						}
					}

					//$category_name = $wp_query->get_queried_object();
					
					//var_dump($category); 
					//$categorysingle = the_category();

					/*
					$category_post;
					
					if (($category[0]->cat_name == "Relevantes") or ($category[0]->cat_name == "Top News")) {
						if(($category[1]->cat_name == "Relevantes") or ($category[1]->cat_name == "Top News")){


						}
						$category_post = $category[1]->cat_name;
						echo $category_post;

					} elseif ($category[0]->cat_name == "Top News") {
						# code...
					}{
						$category_post = $category[0]->cat_name;

						echo $category_post;
					}*/

				 ?>
				<?php the_post(); ?>
				<article class="single-article">
					<h2 class="single-article-title"><?php the_title(); ?></h2>
					<div class="single-article-info">
						<p class="by">Por</p>
						<a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" ><p class="single-article-info-author"><?php the_author(); ?></p></a>
						<p class="single-article-info-date"><?php the_date(); ?></p>
						<p><?php //echo $category_name; ?></p>
					</div>
					<div class="single-article-description">
						<p><?php echo rwmb_meta('rw_frased'); ?></p>
					</div>
					<div class="single-article-content">
						<?php the_content(); ?>
					</div>
				</article>
				<div class="comments">
					<?php 
						// If comments are open or we have at least one comment, load up the comment template.
						 if ( comments_open() || get_comments_number() ) :
						     comments_template();
						 endif;
					 ?>
				</div>
			</div>
			<section class="last_posts">
				<div class="last_posts-container">
					<h3 class="last_posts-title">Últimos Posts</h3>
					<div class="scroll-container">
					<?php
					$last_posts = get_posts(array(
						//'order' => 'Desc',
						'nopaging' => true,
						'post_type' => 'post',
						'category_name' => $category_slug
						));
					?>
					<?php if($last_posts){ foreach ($last_posts as $post): setup_postdata( $post ); ?>
					<article class="last_posts-post">
						<a href="<?php the_permalink(); ?>">
						<div class="last_posts-post-info">
							<p class="last_posts-post-info-date"><?php the_date(); ?></p>
							<p class="last_posts-post-info-cat"><?php echo $category_name; ?></p>
						</div>
						<p class="last_posts-post-title"><?php the_title(); ?></p>
						</a>
					</article>
					<?php 
					endforeach;
					wp_reset_postdata();
					}
					?>
					</div>
				</div>
			</section>
		</section>
	</div>
</main>
<footer class="footer-single">
	<div class="copyright">
	<p>Copyright © 2017 Eloesports. Todos los derechos reservados</p>
	<div class="logo_footer">
		<a href="http://localhost/eloesports">
		<figure>
			<?php if(function_exists('the_custom_logo')){
				$custom_logo_id = get_theme_mod('custom_logo');
				$logo = wp_get_attachment_image_src($custom_logo_id, 'full');
				if (has_custom_logo()) {
					echo '<img src="'.esc_url($logo[0]).'">';
				} else {
					echo 'NO LOGO';
				}
				} 
			?>
			<!-- <img src="" alt=""> -->
		</figure>
		<p class="logo_footer-title">LOESPORTS</p>
		</a>
	</div>
	</div>
</footer>


<?php wp_footer(); ?>
</body>
</html>
