<?php
/**
 * Standard blog single page
 *
 */

get_header();		
get_template_part( 'includes/header' , 'page-title' ); ?>
<!-- BLOG AREA START -->
<div class="itsolve-blog-area itsolve-blog-page single-blog-details em-theme-main-page">
	<div class="container">				
		<div class="row">					
			<div class="col-lg-12 col-md-12  col-sm-12 col-xs-12 blog-lr">
				<?php if (have_posts() ) : ?>
					<?php while ( have_posts() ) : the_post();
						global $post; ?>
						<?php get_template_part( 'template-parts/content' , 'page' ); ?>
					<?php endwhile; // while has_post(); ?>											
				<?php endif; // if has_post() ?>	
			</div>
		</div>	
	</div>
</div>
<!-- END BLOG AREA START -->						
<?php
get_footer();		