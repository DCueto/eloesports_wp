<?php
//Get only the approved comments 
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains comments and the comment form.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

if(comments_open()){

?>

<h4>Publica tu comentario</h4>
<form action="<?php echo site_url(wp-comments-post.php); ?>" method="post" id="commentform">
	<input type="hidden" name="comment_post_ID" value="<?php echo $post->ID; ?>" id="comment_post_ID" />
	<div class="form-group">
		<label>Nombre / Apodo (requerido)</label>
		<input type="text" name="author" class="form-control">
	</div>
	<div class="form-group">
		<label>Email (requerido, no se va a ver)</label >
		<input type="text" name="email" class="form-control">
	</div>
	<div class="form-group">
		<label>Página Web</label>
		<input type="text" name="url" class="form-control">
	</div>
	<div class="form-group">
		<label>Comentario</label>
		<textarea name="comment" cols="60" rows="7" class="form-control"></textarea>
	</div>
	<div class="form-group">
		<button type="submit" class="btn btn-primary">Añadir comentario</button>
	</div>
</form>


<?php } ?>




<div class="comments-wrap">

<?php
/*
$args = array(
    'status' => 'approve'
);
 
// The comment Query
$comments_query = new WP_Comment_Query;
$comments = $comments_query->query( $args ); */
 
// Comment Loop
if ( $comments ) {
    foreach ( $comments as $comment ) {
    	?>
		<h4><a href="<?php comment_author_url(); ?>"><?php comment_author(); ?></a> - <small><?php comment_date(); ?></small></h4>
		<div class="comment-body">
			<p><?php comment_text(); ?></p>
		</div>

		<?php

        //echo '<p>' . $comment->comment_content . '</p>';
    }
} else {
    echo 'No comments found.';
}

?>

</div>