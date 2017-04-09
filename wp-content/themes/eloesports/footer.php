<footer>
	<div class="copyright">
	<p>Copyright © 2017 Eloesports. Todos los derechos reservados</p>
	<div class="logo_footer">
		<a href="http://eloesports.com">
		<figure>
			<!--<?php /*if(function_exists('the_custom_logo')){
				$custom_logo_id = get_theme_mod('custom_logo');
				$logo = wp_get_attachment_image_src($custom_logo_id, 'full');
				if (has_custom_logo()) {
					echo '<img src="'.esc_url($logo[0]).'">';
				} else {
					echo 'NO LOGO';
				}
				}*/
			?> -->
			<img src="<?php echo get_stylesheet_directory_uri()?>/img/logo_elo_text.png" alt="">
		</figure>
		<canvas>
		
		</canvas>
		</a>
	</div>
	</div>
</footer>
<?php wp_footer(); ?>
