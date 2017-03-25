<?php 
// ESTO TE IMPRIME SOLO LOS ARTICULOS EN CONCRETO

function my_custom_single_popular_post( $post_html, $p, $instance ){

    var_dump($p);    
    // AQUÍ SE FILTRAN LAS CATEGORIAS DE LOS POSTS PARA SACAR 1 SOLA CATEGORIA - Añadir más categorias cuando se introduzcan más juegos

        $category = get_the_category($p->id);
        foreach ($category as $cat) {
            if (($cat->slug == "vainglory") or ($cat->slug == "lol") or ($cat->slug == "overwatch") or ($cat->slug == "csgo") or ($cat->slug == "hearthstone") or ($cat->slug == "dota") or ($cat->slug == "noticias")){
                    $category_name = $cat->name;
                    $category_slug = $cat->slug;
            }
        }

    $permalink_article = "<article class='article'> <a href='". get_the_permalink($p->id) . "'>";

    $article_info = "<div class='article-info'> <p class='last_posts-post-info-date'>" . get_the_date($p->id) . "</p>" . "<p class='last_posts-post-info-cat'>" . $category_name . "</p> </div>";

    $article_content = "<div class='article-content'> <h3 class='article-content-title'>" . $p->title . "</h3> <div class='article-content-container'> <p class='article-content-container-description'>" . rwmb_meta('rw_frased') . "</p> </div> </div>";

    $article_author = "<div class='article-author'> <span>by</span><p>" . $p->author . "</p> </div>";

    if( has_post_thumbnail($p->id)){
        $thumbnail_img = get_the_post_thumbnail($p->id, 'my-size');
        $thumbnail_string = "<figure class='article-thumb'>" . $thumbnail_img . "</figure>";
    }

    $output .= $permalink_article;
    $output .= "<div class='blur-bottom'></div>";
    $output .= $article_info;
    $output .= $thumbnail_string;
    $output .= $article_content;
    $output .= $article_author;

    //$output .= "<h2 class=\"entry-title\"><a href=\"" . get_the_permalink( $p->id ) . "\" title=\"" . esc_attr( $p->title ) . "\">" . $p->title . "</a></h2>";
    //$output .= $stats;
    //$output .= $excerpt;
    $output .= "</a></article>" . "\n"; 
    return $output;
}
add_filter( 'wpp_post', 'my_custom_single_popular_post', 10, 3 );


 ?>