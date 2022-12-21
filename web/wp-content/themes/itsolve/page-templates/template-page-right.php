<?php
/**
 * Template Name: Page Right Sidebar
 */

get_header();		

get_template_part( 'includes/header' , 'page-title' ); ?>
			<!-- BLOG AREA START -->
			<div class="itsolve-blog-area itsolve-blog-page em-theme-main-page single-blog-details">
				<div class="container">				
					<div class="row">
										
						<?php if ( is_active_sidebar( 'sidebar-4' ) ) {?>	
							
							<div class="col-md-8 col-sm-12 col-xs-12 blog-lr">
								<?php if (have_posts() ) : ?>

										<?php while ( have_posts() ) : the_post();
										
											global $post; ?>
											
											<?php get_template_part( 'template-parts/content' , 'page' ); ?>
											
										<?php endwhile; // while has_post(); ?>									
															
								<?php endif; // if has_post() ?>
									
							</div>							
							<div class="col-md-4 col-xs-12  sidebar-right content-widget">
								<div class="blog-left-side widget">								
									<?php dynamic_sidebar( 'sidebar-4' ); ?>
								</div>
							</div>
						<?php }else{ ?>
						
							<div class="col-md-12  col-sm-12 col-xs-12 blog-lr">
								<?php if (have_posts() ) : ?>

										<?php while ( have_posts() ) : the_post();
										
											global $post; ?>
											
											<?php get_template_part( 'template-parts/content' , 'page' ); ?>
											
										<?php endwhile; // while has_post(); ?>									
															
								<?php endif; // if has_post() ?>
									
							</div>
						<?php } ?>


					</div>	
				</div>
			</div>
			<!-- END BLOG AREA START -->
						
<?php
	get_footer();		
