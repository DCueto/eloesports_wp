<?php

	// AQUÍ SE FILTRAN LAS CATEGORIAS DE LOS POSTS PARA SACAR 1 SOLA CATEGORIA - Añadir más categorias cuando se introduzcan más juegos

	$category = get_the_category();
	foreach ($category as $cat) {
		//var_dump($cat);
		if (($cat->slug == "vainglory") or ($cat->slug == "lol") or ($cat->slug == "overwatch") or ($cat->slug == "csgo") or ($cat->slug == "hearthstone") or ($cat->slug == "dota") or ($cat->slug == "noticias")){
			$category_name = $cat->name;
			$category_slug = $cat->slug;
		}
	}

?>