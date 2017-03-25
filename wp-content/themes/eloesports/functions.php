<?php 	

define('TEMPPATH', get_bloginfo('stylesheet_directory'));
define('IMAGES', TEMPPATH. "/img");

//Activa opción de miniaturas

add_theme_support('post-thumbnails');

add_image_size('my-size', 720, 388, true);


// Menú Header

add_theme_support('nav-menus');
if(function_exists ('register_nav_menus')){
  register_nav_menus(
      array('menu-header' => 'Menú del header')
    );
}

// Logo

function elo_custom_logo_setup(){
    $defaults = array(
            'height' => 300,
            'width' => 300,
         );
    add_theme_support('custom-logo', $defaults);
}
add_action('after_setup_theme', 'elo_custom_logo_setup');



// METABOX FRASE


add_filter( 'rwmb_meta_boxes', 'elo_register_meta_boxes' );
function elo_register_meta_boxes( $meta_boxes ) {
    $prefix = 'rw_';
    // 1st meta box
    $meta_boxes[] = array(
        'id'         => 'frase',
        'title'      => __( 'Frase destacada', 'textdomain' ),
        'post_types' => array( 'post', 'page', 'category' ),
        'context'    => 'normal',
        'priority'   => 'high',
        'fields' => array(
            array(
                'name'  => __( 'Frase destacada', 'textdomain' ),
                'desc'  => 'Introduce la frase destacada del post',
                'id'    => $prefix . 'frased',
                'type'  => 'textarea',
                //'std'   => 'Frase destacada',
                'class' => 'custom-class',
            ),
        )
    );


    $meta_boxes[] = array(
        'id' => 'video',
        'title' => __('Video', 'textdomain'),
        'post_types' => array('post', 'page', 'category'),
        'context' => 'normal',
        'priority' => 'high',
        'fields' => array(
            array(
                'name' => __('VideoID', 'textdomain'),
                'desc' => 'Introduce la ID del video',
                'id' => $prefix . 'videoID',
                'type' => 'text',
                'class' => 'video__custom-class',
            ),
        ),
    );
    return $meta_boxes;
}


// MOST VIEWED POSTS META_TAG

function set_post_views($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if ($count=='') {
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0'); 

        return '0 Views';
    } else{
        $count++;
        update_post_meta($postID, $count_key, $count);

        return $count . ' Views';
    }
}

remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);




// POPULAR POSTS - Wordpress Popular Posts Plugin

// This function setup the output html to template with template tag

/*
 * Builds custom HTML.
 *
 * With this function, I can alter WPP's HTML output from my theme's functions.php.
 * This way, the modification is permanent even if the plugin gets updated.
 *
 * @param   array   $mostpopular
 * @param   array   $instance
 * @return  string
 */
function my_custom_popular_posts_html_list( $mostpopular, $instance ){

    // loop the array of popular posts objects
    foreach( $mostpopular as $popular ) {

        $stats = array(); // placeholder for the stats tag

        // Comment count option active, display comments
        if ( $instance['stats_tag']['comment_count'] ) {
            // display text in singular or plural, according to comments count
            $stats[] = '<span class="wpp-comments">' . sprintf(
                _n( '1 comment', '%s comments', $popular->comment_count, 'wordpress-popular-posts' ),
                number_format_i18n( $popular->comment_count )
            ) . '</span>';
        }

        // Pageviews option checked, display views
        if ( $instance['stats_tag']['views'] ) {

            // If sorting posts by average views
            if ($instance['order_by'] == 'avg') {
                // display text in singular or plural, according to views count
                $stats[] = '<span class="wpp-views">' . sprintf(
                    _n( '1 view per day', '%s views per day', intval($popular->pageviews), 'wordpress-popular-posts' ),
                    number_format_i18n( $popular->pageviews, 2 )
                ) . '</span>';
            } else { // Sorting posts by views
                // display text in singular or plural, according to views count
                $stats[] = '<span class="wpp-views">' . sprintf(
                    _n( '1 view', '%s views', intval($popular->pageviews), 'wordpress-popular-posts' ),
                    number_format_i18n( $popular->pageviews )
                ) . '</span>';
            }
        }

        // Author option checked
        if ( $instance['stats_tag']['author'] ) {
            $author = get_the_author_meta( 'display_name', $popular->uid );
            $display_name = '<a href="' . get_author_posts_url( $popular->uid ) . '">' . $author . '</a>';
            $stats[] = '<span class="wpp-author">' . sprintf( __( 'by %s', 'wordpress-popular-posts' ), $display_name ). '</span>';
        }

        // Date option checked
        if ( $instance['stats_tag']['date']['active'] ) {
            $date = date_i18n( $instance['stats_tag']['date']['format'], strtotime( $popular->date ) );
            $stats[] = '<span class="wpp-date">' . sprintf( __( 'posted on %s', 'wordpress-popular-posts' ), $date ) . '</span>';
        }

        // Category option checked
        if ( $instance['stats_tag']['category'] ) {
            $post_cat = get_the_category( $popular->id );
            $post_cat = ( isset( $post_cat[0] ) )
              ? '<a href="' . get_category_link( $post_cat[0]->term_id ) . '">' . $post_cat[0]->cat_name . '</a>'
              : '';

            if ( $post_cat != '' ) {
                $stats[] = '<span class="wpp-category">' . sprintf( __( 'under %s', 'wordpress-popular-posts' ), $post_cat ) . '</span>';
            }
        }

        // Build stats tag
        if ( !empty( $stats ) ) {
            $stats = '<div class="wpp-stats">' . join( ' | ', $stats ) . '</div>';
        }

        $excerpt = ''; // Excerpt placeholder

        // Excerpt option checked, build excerpt tag
        if ( $instance['post-excerpt']['active'] ) {

            $excerpt = get_the_excerpt( $popular->id );
            if ( !empty( $excerpt ) ) {
                $excerpt = $excerpt ;
            }

        }

        // AQUÍ SE FILTRAN LAS CATEGORIAS DE LOS POSTS PARA SACAR 1 SOLA CATEGORIA - Añadir más categorias cuando se introduzcan más juegos

            $category = get_the_category($popular->id);
            foreach ($category as $cat) {
                if (($cat->slug == "vainglory") or ($cat->slug == "lol") or ($cat->slug == "overwatch") or ($cat->slug == "csgo") or ($cat->slug == "hearthstone") or ($cat->slug == "dota") or ($cat->slug == "noticias")){
                        $category_name = $cat->name;
                        $category_slug = $cat->slug;
                }
            }

        $permalink_article = "<article class='article'> <a href='". get_the_permalink($popular->id) . "'>";

        $article_info = "<div class='article-info'> <p class='last_posts-post-info-date'>" . $date . "</p>" . "<p class='last_posts-post-info-cat'>" . $category_name . "</p> </div>";

        $article_content = "<div class='article-content'> <h3 class='article-content-title'>" . $popular->title . "</h3> <div class='article-content-container'> <p class='article-content-container-description'>" . $excerpt . "</p> </div> </div>";

        $author_query = get_user_by('ID', $popular->uid);

        $author_name = $author_query->display_name
;
        $article_author = "<div class='article-author'> <span>by</span><p>" . $author_name . "</p> </div>";

        //$test = var_dump($popular);

        if( has_post_thumbnail($popular->id)){
            $thumbnail_img = get_the_post_thumbnail($popular->id, 'my-size');
            $thumbnail_string = "<figure class='article-thumb'>" . $thumbnail_img . "</figure>";
        }

        $output .= $permalink_article;
        $output .= "<div class='blur-bottom'></div>";
        $output .= $article_info;
        $output .= $thumbnail_string;
        $output .= $article_content;
        $output .= $article_author;
        //$output .= $stats;
        //$output .= $excerpt;
        $output .= "</a></article>" . "\n";

    }

    return $output;
}


add_filter( 'wpp_custom_html', 'my_custom_popular_posts_html_list', 10, 2 );





// AJAX FOR LOAD MORE POSTS
/*
$ajaxurl = '';

if(in_array('sitepress-multilingual-cms/sitepress.php', get_option('active_plugins')) ){
    $ajaxurl .= admin_url('admin-ajaxx.php?lang=' . ICL_LANGUAGE_CODE);
} else{
    $ajaxurl .= admin_url('admin-ajax.php');
}

wp_localize_script('eloesports-script', 'screenReaderText', array(
    'expand' => __('expand child menu', 'eloesports'),
    'collapse' => __('collapse child menu', 'eloesports'),
    'ajaxurl' => $ajaxurl,
    'noposts' =>
    ) );


*/


?>