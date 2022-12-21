<?php
/**
 * Standard blog single page
 *
 */

get_header(); 
itsolve_signle_case_breadcrumb(); ?>
			
			<!-- BLOG AREA START -->
			<div class="itsolve-blog-area itsolve-blog-single single-blog-details">
				<div class="container">				
					<div class="row">


						<?php if( have_posts() ) : ?>

							<?php while( have_posts() ) : the_post(); 	
							$casedesc  = get_post_meta( get_the_ID(),'_itsolve_casedesc', true );	?>						
							
										<div class="portfolio_details">
											<div class="col-md-6  col-sm-12 col-xs-12 blog-lr">
												<div class="pimgs">
													<?php the_post_thumbnail('itsolve-single-portfolio');?>
												</div>
											</div>
											<div class="col-md-6  col-sm-12 col-xs-12 blog-lr">
												<div class="portfolio-content portfolio-details-box">											
													<div class="portfolio_info">
														<?php the_content(); ?>
													</div>
												</div>
											</div>	
										</div>	
										<div class="col-md-12  col-sm-12 col-xs-12 blog-lr">
											<div class="pr-title"><h2><?php the_title();?></h2></div>										
											<div class="portfolio-content portfolio-details-box">
												<div class="prots-contentg">
													<?php						
														echo wp_kses($casedesc, array(
														'blockquote' => array(),
														'a' => array(
															'href' => array(),
															'title' => array()										
														),
														'span' => array(),
														'h1' => array(),
														'h1' => array(),
														'h3' => array(),
														'b' => array(),
														'p' => array(),
														'strong' => array(),
														'em' => array(),
														'br' => array(),
														));	
													?>
													
												</div>
											</div>
										</div>			

						<?php endwhile; // while has_post(); ?>
					<?php endif; // if has_post() ?>
									
					</div>	
				</div>
			</div>
			<!-- END BLOG AREA START -->						
<?php
get_footer();