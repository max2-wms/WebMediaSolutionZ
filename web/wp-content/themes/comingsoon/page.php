<?php include( 'header.php' ); ?>

<section id="content" role="main">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div>
				<h4><?php echo $lang[ 'our web site is' ]; ?></h4>
				<h1><?php echo $lang[ 'coming soon' ]; ?></h1>
				<p><?php echo $lang[ 'stay tuned' ]; ?></p>
			</div>

			<img class="logo" src="<?php bloginfo( 'template_url' ); ?>/images/logo.jpg" />

			<div class="contact-form">
				<p><?php echo $lang[ 'inquiries' ]; ?></p>

				<?php the_content(); ?>
			</div>
		</article>
	<?php endwhile; endif; ?>
</section>

<?php include( 'footer.php' ); ?>