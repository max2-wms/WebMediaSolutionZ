<?php
/**
 * The template for displaying post archives
 *
 */
get_header();
get_template_part( 'includes/header' , 'page-title' ); ?>
<!-- SEARCH AREA START -->
<div class="itsolve-blog-area itsolve-blog-page itsolve-search-page">
	<div class="container">		
		<div class="row">
			<div class="col-md-8 col-sm-6 col-xs-12 bgimgload">
					<?php if( have_posts() ) : ?>
						<div class="row">
							<?php while( have_posts() ) : the_post(); ?>
								<?php get_template_part( 'template-parts/content' , 'search' ); ?>
							<?php endwhile; // while has_post(); ?>
						</div>
						<!-- START PAGINATION -->
						<div class="row">
							<div class="col-md-12">									
								<?php itsolve_pagination();?>
							</div>
						</div>
						<!-- END START PAGINATION -->	
					<?php else : ?>
						<!-- NOT FOUND SEARCH  -->
						<div class="col-md-12">
							<div class="search-error">
								<h3><?php esc_html_e( 'Nothing Found', 'itsolve' ); ?></h3>
								<p><?php esc_html_e( 'Sorry, but nothing matched your search terms, please try a different search term.', 'itsolve' ); ?></p>
								<?php echo get_search_form(); ?>
							</div>
						</div>
					<?php endif; // if has_post() ?>
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
		</div><!-- /row -->
	</div>
</div>
<?php get_footer();