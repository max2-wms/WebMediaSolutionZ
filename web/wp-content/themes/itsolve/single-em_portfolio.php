<?php
/**
 * Standard blog single page
 *
 */

get_header(); 
get_template_part( 'includes/header' , 'page-title' ); ?>
			
			<!-- BLOG AREA START -->
			<div class="itsolve-blog-area itsolve-blog-single single-blog-details">
				<div class="container">				
					<div class="row">


						<?php if( have_posts() ) : ?>

							<?php while( have_posts() ) : the_post(); ?>					
								
								<?php $portdesc  = get_post_meta( get_the_ID(),'_itsolve_portdesc', true ); 
								$pgellaryu  = get_post_meta( get_the_ID(),'_itsolve_pgellaryu', true ); 
								
								if( isset($pgellaryu) && !empty($pgellaryu)){?>
								<div class="col-md-6">
									<div class="pimgs">
										<div class="single_gallery owl-carousel  curosel-style">										
											<?php
												itsolve_slider_o('_itsolve_pgellaryu','full');									
											?>																				
										</div>			
									</div>
								</div>

							
								<div class="col-md-6  col-sm-12 col-xs-12 blog-lr">
									<div class="portfolio-content portfolio-details-box">
									<div class="pr-title"><h2><?php the_title();?></h2><</div>
										<div class="prots-content">
											<?php the_content(); ?>
										</div>
									</div>
								</div>	
								<div class="col-md-12  col-sm-12 col-xs-12 blog-lr">
									<div class="portfolio-content portfolio-details-box">
										<div class="prots-content">
													<?php						
														echo wp_kses($portdesc, array(
														'blockquote' => array(),
														'a' => array(
															'href' => array(),
															'title' => array()										
														),
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
								

								<?php }else{ ?>
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
														echo wp_kses($portdesc, array(
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
			
			
								<?php } ?>					

						<?php endwhile; // while has_post(); ?>
					<?php endif; // if has_post() ?>
									
					</div>	
				</div>
			</div>
			<!-- END BLOG AREA START -->						
<?php
get_footer();