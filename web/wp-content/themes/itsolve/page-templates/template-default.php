<?php
/**
 * Template Name: Default itsolve Template
 *
 * Description: A page template that provides a key component of WordPress as a CMS
 * by meeting the need for a carefully crafted introductory page. The front page template
 * in Twenty Twelve consists of a page content area for adding text, images, video --
 * anything you'd like -- followed by front-page-only widgets in one or two columns.
 *
 * @package WordPress
 * @since Zackas 1.0
 */
get_header();		

get_template_part( 'includes/header' , 'page-title' ); ?>
<div class="template-home-wrapper">

	<div class="page-content-home-page">										
		<?php while ( have_posts() ) : the_post(); ?>
				<?php the_content(); ?>
		<?php endwhile; ?>	
	</div>
	
</div>
<?php 
get_footer();		
 