<?php
/**
 * The template for displaying post archives
 *
 */
get_header();
get_template_part( 'includes/header' , 'page-title' ); ?>
<!-- BLOG AREA START -->
<div class="itsolve-blog-area itsolve-blog-archive">
	<div class="container">				
		<div class="row">			
			<?php if (have_posts() ) : ?>										
				<div class="col-md-8 col-sm-6 col-xs-12">
					<div class="row">					
					<?php while ( have_posts() ) : the_post();
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
			<?php endif; // if has_post() ?>				

			<div class="col-md-4  col-sm-5 col-xs-12  sidebar-right content-widget pdsr">
				<div class="blog-left-side">
					<?php 
						 if ( is_active_sidebar( 'sidebar-1' ) ) {
						 	dynamic_sidebar( 'sidebar-1' ); 
						 }	
					?>
				</div>
			</div>																			
		</div>
	</div>
</div>
<!-- END BLOG AREA START -->			
<?php
get_footer();