<article class="videos-container-article">
	<div class="videoContainer">
	<?php
	$videoID = rwmb_meta('rw_videoID');

	if($videoID){
		echo wp_oembed_get('http://www.youtube.com/watch?v='.$videoID );
	}
	?>
	</div>
</article>