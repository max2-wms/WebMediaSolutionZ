<?php
/**
 * Standard blog index page
 *
 * @package Layers
 * @since Layers 1.0.0
 */

get_header();?>
<!-- BLOG AREA START -->
<div class="itsolve-blog-index blog-area itsolve-blog-area">
	<div class="container">				
		<div class="row d-flex">
			<?php
			if ( have_posts() ) : ?>		
					<div class="col-lg-8 col-md-8 col-sm-7 col-xs-12 bgimgload">
						<div class="row blog-messonary">								
							<?php while (have_posts() ) : the_post();
								global $post; ?>
								<?php get_template_part( 'template-parts/content' , 'list' ); ?>
							<?php endwhile; // while has_post(); ?>								
						</div>
						<!-- START PAGINATION -->
						<div class="row">
							<div class="col-md-12">
								<?php itsolve_pagination();?>
							</div>
						</div>
						<!-- END START PAGINATION -->								
					</div>
					<div class="col-md-4  col-sm-5 col-xs-12  sidebar-right content-widget pdsr">
						<div class="blog-left-side">
							<?php 
								 if ( is_active_sidebar( 'sidebar-1' ) ) {
								 	dynamic_sidebar( 'sidebar-1' ); 
								 }	
							?>
						</div>
					</div>					
			<?php endif; // if has_post() ?>													
		</div>
	</div>
</div>
<!-- END BLOG AREA START -->	
<?php
get_footer();







