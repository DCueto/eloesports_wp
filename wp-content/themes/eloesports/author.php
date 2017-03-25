<?php get_header(); ?>

<main class="container">
    <div class="click-block"></div>
<div class="wrap">
<div id="content" class="narrowcolumn" style="color:black;">

<!-- This sets the $curauth variable -->

    <?php
    $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
    ?>
    <header class="header_author">
        <div class="header_author-container">
        <div class="header_author-main">
            <figure class="header_author-avatar">
                <?php echo get_avatar($curauth->ID, 250); ?>
            </figure>
            <div class="header_author-info">
                <h3><?php echo $curauth->nickname ?></h3>
                <a href="<?php echo $curauth->user_url; ?>">Página Web</a>
                <div class="header_author-info-bio">
                    <h4>Biografía: </h4>
                    <p><?php echo $curauth->user_description; ?></p>
                </div>

            </div>
        </div>
        <div class="header_author-biomobile">
            
        </div>
        </div>
        
    </header>

    <h2 class="last-articles-title section-title">Últimos Posts</h2>
    <div class="article-wrapper">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <?php include TEMPLATEPATH . '/templates/theloop.php' ?>
        <?php endwhile; else: ?>
            <p><?php _e('No hay articulos de este autor'); ?></p>

        <?php endif; ?>
    </div>
</div>
</main>

<?php get_footer(); ?>