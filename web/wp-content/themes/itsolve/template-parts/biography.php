<?php
$author_data =  get_the_author_meta('description',get_query_var('author') );
$author_bio_avatar_size = 120;
if($author_data !=''):
?>

	<div class="author mt-120">
		<div class="author-img text-center">
			<a href="<?php print esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) ?>">
				<?php print get_avatar( get_the_author_meta( 'user_email' ), $author_bio_avatar_size,'','',array('class'=>'media-object img-circle') ); ?>
			</a>
		</div>
		<div class="author-text">
			<h3><span class="media-heading"><a href="<?php print esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) ?>"><?php print get_the_author(); ?></a></span></h3>
			<p><?php the_author_meta( 'description' ); ?> </p>
		</div>
	</div>

<?php endif; ?>

