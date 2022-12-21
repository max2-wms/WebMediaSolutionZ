<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package itsolve
 */

?>
	<?php global $itsolve_opt; ?>	
<?php if (!empty($itsolve_opt['itsolve_address_hide']) && $itsolve_opt['itsolve_address_hide']==true): ?>				
			
			<!-- FOOTER TOP ADDRESS AREA -->
				<div class="top-address-area">
					<div class="<?php if(!empty($itsolve_opt['itsolve_footer_box_layout']) && $itsolve_opt['itsolve_footer_box_layout']=="footer_full"){echo esc_attr('container-fluid');}else{ echo esc_attr('container'); }?>">
						<div class="row">
							<div class="col-md-12">
							
								<div class="footer-top-address">
								<?php if(!empty($itsolve_opt['itsolve_address_logo_style']) && $itsolve_opt['itsolve_address_logo_style']=="s_logo_s2"){?>
									<!-- ADDRESS IMAGE LOGO -->
									<?php if (!empty($itsolve_opt['itsolve_address_logo'])): ?>
										<div class="top_address_logo text-center">
											<img src="<?php echo esc_url($itsolve_opt['itsolve_address_logo']['url']); ?>" alt="<?php bloginfo( 'name' ); ?>" />
										</div>					
									<?php endif ?>
								<?php }else{?>
									<!-- SOCIAL TEXT LOGO -->
									<?php if (!empty($itsolve_opt['itsolve_address_title_text'])): ?>					
										<h2 class="text-center">													
											<?php 
												echo wp_kses($itsolve_opt['itsolve_address_title_text'], array(
													'span' => array(),
												));
											?>														
										</h2>
									<?php endif ?>	
								<?php } ?>					
								</div>
									
								<div class="top_address_content">
									<div class="row">
										<div class="col-md-4">
											<div class="single_footer_address">
												
												<?php if (!empty($itsolve_opt['itsolve_address_title'])): ?>
														<i class="fa fa-map-marker-alt"></i>
														<h3><?php echo esc_html($itsolve_opt['itsolve_address_title']); ?></h3>
													<?php endif; ?>
													<?php if (!empty($itsolve_opt['itsolve_address_road'])): ?>
														<span><?php echo esc_html($itsolve_opt['itsolve_address_road']); ?></span>
												<?php endif; ?>
											</div>
										</div>
										<div class="col-md-4">
											<div class="single_footer_address">
												<?php if (!empty($itsolve_opt['itsolve_email_title'])): ?>
													<i class="fa fa-envelope"></i>
													<h3><?php echo esc_html($itsolve_opt['itsolve_email_title']); ?></h3>
													<?php endif; ?>
													<?php if (!empty($itsolve_opt['itsolve_address_email'])): ?>
														<a href="<?php esc_attr_e('mailto:','itsolve')?><?php echo esc_html($itsolve_opt['itsolve_address_email']); ?>"><?php echo esc_html($itsolve_opt['itsolve_address_email']); ?></a>
												<?php endif; ?>	
											</div>
										</div>
										<div class="col-md-4">
											<div class="single_footer_address">
												<?php if (!empty($itsolve_opt['itsolve_address_telephone_title'])): ?>
													<i class="fa fa-phone"></i>
													<h3><?php echo esc_html($itsolve_opt['itsolve_address_telephone_title']); ?></h3>
													<?php endif; ?>
													<?php if (!empty($itsolve_opt['itsolve_address_mobile'])): ?>						
														<a href="<?php esc_attr_e('tel:','itsolve')?><?php echo esc_html($itsolve_opt['itsolve_address_mobile']); ?>"><?php echo esc_html($itsolve_opt['itsolve_address_mobile']); ?></a>
												<?php endif; ?>	
											</div>
										</div>
										
									</div>
									
									
									
									
									
									
									
															
								</div>
							</div>
						</div>
					</div>
				</div>
			<!-- END FOOTER TOP ADDRESS AREA -->
			<?php endif; ?>		
		
		<?php if (!empty($itsolve_opt['itsolve_social_hide']) && $itsolve_opt['itsolve_social_hide']==true): ?>	
			
			<!-- FOOTER TOP AREA -->
				<div class="footer-top">
					<div class="<?php if(!empty($itsolve_opt['itsolve_footer_box_layout']) && $itsolve_opt['itsolve_footer_box_layout']=="footer_full"){echo esc_attr('container-fluid');}else{ echo esc_attr('container'); }?>">
						<div class="row">
							<div class="col-md-12">
								<div class="footer-top-inner">
								
								<?php if(!empty($itsolve_opt['itsolve_social_logo_style']) && $itsolve_opt['itsolve_social_logo_style']=="s_logo_s2"){?>
								<!-- SOCIAL IMAGE LOGO -->
								<?php if (!empty($itsolve_opt['itsolve_social_logo'])): ?>
									<div class="social_logo text-center">
										<img src="<?php echo esc_url($itsolve_opt['itsolve_social_logo']['url']); ?>" alt="<?php bloginfo( 'name' ); ?>" />
									</div>					
								<?php endif ?>
								<?php }else{?>
								<!-- SOCIAL TEXT LOGO -->
								<?php if (!empty($itsolve_opt['itsolve_social_title_text'])): ?>					
									<h2 class="text-center">													
										<?php 
											echo wp_kses($itsolve_opt['itsolve_social_title_text'], array(
												'span' => array(),
											));
										?>														
									</h2>
								<?php endif ?>	
								<?php } ?>	
									
									
								<!-- FOOTER COPYRIGHT TEXT -->
								<?php if (!empty($itsolve_opt['itsolve_social_text'])): ?>
									<p class="text-center">
										<?php						
											echo wp_kses($itsolve_opt['itsolve_social_text'], array(
												'span' => array(),
												'a' => array(
													'href' => array(),
													'title' => array()										
												),
												'b' => array(),
												'p' => array(),
												'strong' => array(),
												'em' => array(),
												'br' => array(),
											));	
										?>						
									</p>
								<?php endif ?>							
				
									<div class="footer-social-icon">					
										<?php 
											foreach($itsolve_opt['itsolve_social_icons'] as $key=>$value ) { 
											
												if($value != ''){						
													 echo '<a class="'.esc_attr($key).' social-icon" href="'.esc_url($value).'" title="'.ucwords(esc_attr($key)).'" "><i class="fa fa-'.esc_attr($key).'"></i></a>';
												}
											}
										?>							
					
									</div>
								</div>
							</div>
						</div>		
					</div>
				</div>
			<!-- END FOOTER TOP AREA -->
			<?php endif; ?>	
	
	
	<?php if (!empty($itsolve_opt['itsolve_widget_hide']) && $itsolve_opt['itsolve_widget_hide']==true): ?>				
		<!-- FOOTER MIDDLE AREA -->
			<?php $footer_sidebar_count = $itsolve_opt['itsolve_widget_column_count']; ?>
				<?php if( 0 != $footer_sidebar_count ) { ?>
					<div class="footer-middle"> 
						<div class="<?php if(!empty($itsolve_opt['itsolve_footer_box_layout']) && $itsolve_opt['itsolve_footer_box_layout']=="footer_full"){echo esc_attr('container-fluid');}else{ echo esc_attr('container'); }?>">
							<div class="row">
								<?php // Default Sidebar count to 4
								if( '' == $footer_sidebar_count ) $footer_sidebar_count = 4;
								// Get the sidebar class
								$footer_sidebar_class = floor( 12/$footer_sidebar_count ); ?>
								<?php for( $footer = 1; $footer <= $footer_sidebar_count; $footer++ ) { ?>
									<?php if ( is_active_sidebar( 'itsolve-footer-' . $footer ) ) { ?>
										<div class="col-sm-12 col-md-6 col-lg-<?php echo esc_attr( $footer_sidebar_class ); ?> <?php if( $footer == $footer_sidebar_count ) echo esc_attr('last'); ?>">
											<?php dynamic_sidebar( 'itsolve-footer-' . $footer ); ?>
										</div>
										
									<?php } ?>
								<?php } ?>
							</div>
						</div>
					</div>
				<?php } // if 0 != sidebars ?>	
		<?php endif; ?>
	<!-- FOOTER COPPYRIGHT SECTION -->		
	<?php if (!empty($itsolve_opt['itsolve_copyright_hide']) && $itsolve_opt['itsolve_copyright_hide']==true): ?>				
		<div class="footer-bottom">
			<div class="<?php if(!empty($itsolve_opt['itsolve_footer_box_layout']) && $itsolve_opt['itsolve_footer_box_layout']=="footer_full"){echo esc_attr('container-fluid');}else{ echo esc_attr('container'); }?>">
		<div class="row">
		<?php if(!empty($itsolve_opt['itsolve_footer_copyright_style']) && $itsolve_opt['itsolve_footer_copyright_style']=="copy_s1"){?>
				<div class="col-md-12 footer_style_1">			
					<div class="copy-right-text text-center">
						<!-- FOOTER COPYRIGHT TEXT -->
						<?php if (!empty($itsolve_opt['itsolve_copyright_text'])): ?>
							<p>
								<?php						
									echo wp_kses($itsolve_opt['itsolve_copyright_text'], array(
										'span' => array(),
										'a' => array(
											'href' => array(),
											'title' => array()										
										),
										'b' => array(),
										'p' => array(),
										'strong' => array(),
										'em' => array(),
										'br' => array(),
									));	
								?>
							</p>
						<?php endif ?>					
					</div>
				</div>
		<!-- FOOTER COPYRIGHT STYLE 2 -->		
		<?php }elseif(!empty($itsolve_opt['itsolve_footer_copyright_style']) && $itsolve_opt['itsolve_footer_copyright_style']=="copy_s2"){?>
				<div class="col-md-12  col-sm-12">				
					<div class="footer-menu">
						<!-- FOOTER COPYRIGHT MENU -->
						 <?php if ( has_nav_menu( 'menu-4' ) ) {
								wp_nav_menu( array(
								'theme_location' => 'menu-4',
								'menu_class' => 'text-center',
								'fallback_cb' => false,
								'container' => '',
								) );
						 } ?> 				
					</div>
				</div>
				<div class="col-md-12  col-sm-12">
					<div class="copy-right-text text-center">
						<!-- FOOTER COPYRIGHT TEXT -->
						<?php if (!empty($itsolve_opt['itsolve_copyright_text'])): ?>
							<p>
								<?php						
									echo wp_kses($itsolve_opt['itsolve_copyright_text'], array(
										'span' => array(),
										'a' => array(
											'href' => array(),
											'title' => array()										
										),
										'b' => array(),
										'p' => array(),
										'strong' => array(),
										'em' => array(),
										'br' => array(),
									));	
								?>
							</p>
						<?php endif ?>	
					</div>
				</div>
				<div class="col-md-12 col-sm-12">				
					<div class="footer-menu">
						<!-- FOOTER COPYRIGHT SOCIAL MENU -->
						<ul class="text-center">
							<?php 
								foreach($itsolve_opt['itsolve_social_icons'] as $key=>$value ) { 
								
									if($value != ''){						
										 echo '<li><a class="'.esc_attr($key).' social-icon" href="'.esc_url($value).'" title="'.ucwords(esc_attr($key)).'" ><i class="fa fa-'.esc_attr($key).'"></i></a></li>';
									}
								}
							?>							
						</ul>				
					</div>
				</div>
		<!-- FOOTER COPYRIGHT STYLE 3 -->		
		<?php }elseif(!empty($itsolve_opt['itsolve_footer_copyright_style']) && $itsolve_opt['itsolve_footer_copyright_style']=="copy_s3"){?>
				<div class="col-md-6  col-sm-12 footer_style_3">
					<div class="footer-menu">
						<!-- FOOTER COPYRIGHT MENU -->				
						 <?php if ( has_nav_menu( 'menu-4' ) ) {
								wp_nav_menu( array(
								'theme_location' => 'menu-4',
								'menu_class' => 'text-left',
								'fallback_cb' => false,
								'container' => '',
								) );
						 } ?> 
					</div>
				</div>		
				<div class="col-md-6  col-sm-12 footer_style_3">
					<div class="copy-right-text text-right">
						<!-- FOOTER COPYRIGHT TEXT -->
						<?php if (!empty($itsolve_opt['itsolve_copyright_text'])): ?>
							<p>
								<?php						
									echo wp_kses($itsolve_opt['itsolve_copyright_text'], array(
										'span' => array(),
										'a' => array(
											'href' => array(),
											'title' => array()										
										),
										'b' => array(),
										'p' => array(),
										'strong' => array(),
										'em' => array(),
										'br' => array(),
									));	
								?>
							</p>
						<?php endif ?>	
					</div>
				</div>
				
		<!-- FOOTER COPYRIGHT STYLE 4 -->		
		<?php }elseif(!empty($itsolve_opt['itsolve_footer_copyright_style']) && $itsolve_opt['itsolve_footer_copyright_style']=="copy_s4"){?>
				<div class="col-md-6 col-sm-12">
					<div class="copy-right-text">
						<!-- FOOTER COPYRIGHT TEXT -->
						<?php if (!empty($itsolve_opt['itsolve_copyright_text'])): ?>
							<p>
								<?php						
									echo wp_kses($itsolve_opt['itsolve_copyright_text'], array(
										'span' => array(),
										'a' => array(
											'href' => array(),
											'title' => array()										
										),
										'b' => array(),
										'p' => array(),
										'strong' => array(),
										'em' => array(),
										'br' => array(),
									));	
								?>
							</p>
						<?php endif ?>	
					</div>
				</div>
				<div class="col-md-6 col-sm-12">				
					<div class="footer-menu">
						<!-- FOOTER COPYRIGHT SOCIAL MENU -->
						<ul class="text-right">
							<?php 
								foreach($itsolve_opt['itsolve_social_icons'] as $key=>$value ) { 
								
									if($value != ''){						
										 echo '<li><a class="'.esc_attr($key).' social-icon" href="'.esc_url($value).'" title="'.ucwords(esc_attr($key)).'" ><i class="fa fa-'.esc_attr($key).'"></i></a></li>';
									}
								}
							?>							
						
						</ul>				
					</div>
				</div>
			<?php } ?>			
		</div>	
	</div>
	</div>
	<!-- DEFAULT STYLE IF NOT ACTIVE THEME OPTION  -->
	<?php else: ?>
	<?php $footer_sidebar_count =4; ?>
		<?php if( 0 != $footer_sidebar_count ) { ?>
			<div class="footer-middle wpfd"> 
				<div class="container">
					<div class="row">
						<?php // Default Sidebar count to 4
						if( '' == $footer_sidebar_count ) $footer_sidebar_count = 4;
						// Get the sidebar class
						$footer_sidebar_class = floor( 12/$footer_sidebar_count ); ?>
						<?php for( $footer = 1; $footer <= $footer_sidebar_count; $footer++ ) { ?>
							<?php if ( is_active_sidebar( 'itsolve-footer-' . $footer ) ) { ?>
								<div class="wpfdp col-sm-12 col-md-<?php echo esc_attr( $footer_sidebar_class ); ?> <?php if( $footer == $footer_sidebar_count ) echo esc_attr('last'); ?>">
									<?php dynamic_sidebar( 'itsolve-footer-' . $footer ); ?>
								</div>
							<?php } ?>
						<?php } ?>
					</div>
				</div>
			</div>
		<?php } ?>	
		<div class="footer-bottom">
			<div class="<?php if(!empty($itsolve_opt['itsolve_footer_box_layout']) && $itsolve_opt['itsolve_footer_box_layout']=="footer_full"){echo esc_attr('container-fluid');}else{ echo esc_attr('container'); }?>">
				<div class="row">			
					<div class="col-md-12">
						<div class="copy-right-text text-center">
							<!-- FOOTER COPYRIGHT TEXT -->
								<p>
									<?php						
										echo esc_html_e("Copyright &copy; itsolve 2019 all right reserved.","itsolve"); 
									?>
								</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php endif; ?>
	</div>
<?php wp_footer(); ?>
</body>
</html>
