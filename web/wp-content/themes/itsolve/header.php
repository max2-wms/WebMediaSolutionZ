<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package itsolve
 */

?><!DOCTYPE html>


<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php global $itsolve_opt; ?>

<!-- MAIN WRAPPER START -->
<div class="wrapper">
	<?php if (!empty($itsolve_opt['itsolve_header_display_none_hide']) && $itsolve_opt['itsolve_header_display_none_hide']==true): ?>	
	<div class="em40_header_area_main hdisplay_none">
	<?php else: ?>
		<div class="em40_header_area_main">
	<?php endif; ?>

<!-- HEADER TOP AREA -->
 <?php  $itsolve_header_topa = get_post_meta( get_the_ID(),'_itsolve_itsolve_header_topa', true );  ?>
 <?php if($itsolve_header_topa==1){?> 

		<div class="itsolve-header-top">
			<div class="<?php if(!empty($itsolve_opt['itsolve_box_layout']) && $itsolve_opt['itsolve_box_layout']=="htopt_full"){echo esc_attr('container-fluid');}else{ echo esc_attr('container'); }?>">
									
				<!-- STYLE 1 LEFT ADDRESS RIGHT ICON  -->
				 <?php if(!empty($itsolve_opt['itsolve_top_right_layout']) && $itsolve_opt['itsolve_top_right_layout']=="header_top_1"){?>			
					<div class="row">
						<!-- TOP LEFT -->
						<div class="col-xs-12 col-md-8 col-sm-8">
							<div class="top-address">
								<p>							
									<?php if (!empty($itsolve_opt['itsolve_header_top_email'])): ?>
										<a href="<?php esc_attr_e('mailto:','itsolve')?><?php echo esc_html($itsolve_opt['itsolve_header_top_email']); ?>"><i class="fa fa-envelope-o"></i><?php echo esc_html($itsolve_opt['itsolve_header_top_email']); ?></a>
									<?php endif; ?>	
									<?php if (!empty($itsolve_opt['itsolve_header_top_road'])): ?>
										<span><i class="fa fa-street-view"></i><?php echo esc_html($itsolve_opt['itsolve_header_top_road']); ?></span>
									<?php endif; ?>	
									<?php if (!empty($itsolve_opt['itsolve_header_top_mobile'])): ?>
										<a href="<?php esc_attr_e('tel:','itsolve')?><?php echo esc_html($itsolve_opt['itsolve_header_top_mobile']); ?>"><i class="fa fa-phone"></i><?php echo esc_html($itsolve_opt['itsolve_header_top_mobile']); ?></a>
									<?php endif; ?>	
								</p>
							</div>
						</div>
						<!-- TOP RIGHT -->
						<div class="col-xs-12 col-md-4 col-sm-4">
							<div class="top-right-menu">
								<ul class="social-icons text-right">
									<?php 
										foreach($itsolve_opt['itsolve_social_icons'] as $key=>$value ) { 
										
											if($value != ''){						
												 echo '<li><a class="'.esc_attr($key).' social-icon" href="'.esc_url($value).'" title="'.ucwords(esc_attr($key)).'" "><i class="fa fa-'.esc_attr($key).'"></i></a></li>';
											}
										}
									?>								
								</ul> 
							</div>						
						</div>	
					</div>	
				<!-- STYLE 2 lEFT ICON RIGHT MENU  -->
				 <?php }elseif(!empty($itsolve_opt['itsolve_top_right_layout']) && $itsolve_opt['itsolve_top_right_layout']=="header_top_2"){?>					
					<div class="row top-both-p0">
						<!-- TOP LEFT -->
						<div class="col-xs-12 col-sm-3 col-md-3">
							<div class="top-right-menu">
									<ul class="social-icons text-left">
										<?php 
											foreach($itsolve_opt['itsolve_social_icons'] as $key=>$value ) { 
											
												if($value != ''){						
													 echo '<li><a class="'.esc_attr($key).' social-icon" href="'.esc_url($value).'" title="'.ucwords(esc_attr($key)).'" "><i class="fa fa-'.esc_attr($key).'"></i></a></li>';
												}
											}
										?>								
									</ul>									 									 				 
							</div>
						</div>					
						<!-- TOP RIGHT -->
						<div class="col-xs-12 col-md-9 col-sm-9">
							<div class="top-address text-right">
								<p>							
									<?php if (!empty($itsolve_opt['itsolve_header_top_road'])): ?>
										<span><i class="fa fa-street-view"></i><?php echo esc_html($itsolve_opt['itsolve_header_top_road']); ?></span>
									<?php endif; ?>	
									<?php if (!empty($itsolve_opt['itsolve_header_top_mobile'])): ?>
										<a href="<?php esc_attr_e('tel:','itsolve')?><?php echo esc_html($itsolve_opt['itsolve_header_top_mobile']); ?>"><i class="fa fa-phone"></i><?php echo esc_html($itsolve_opt['itsolve_header_top_mobile']); ?></a>
									<?php endif; ?>	
									<?php if (!empty($itsolve_opt['itsolve_header_top_email'])): ?>
										<a href="<?php esc_attr_e('mailto:','itsolve')?><?php echo esc_html($itsolve_opt['itsolve_header_top_email']); ?>"><i class="fa fa-envelope-o"></i><?php echo esc_html($itsolve_opt['itsolve_header_top_email']); ?></a>
									<?php endif; ?>	
								</p>
							</div>
						</div>
					</div>	
				<!-- STYLE 3 LEFT OPENING HOUR RIGHT ICON  -->			
				 <?php }elseif(!empty($itsolve_opt['itsolve_top_right_layout']) && $itsolve_opt['itsolve_top_right_layout']=="header_top_3"){?>			
					<div class="row">
						<!-- TOP LEFT -->
						<div class="col-sm-12 col-md-8">
							<div class="top-address">
								<p>							
									<?php if (!empty($itsolve_opt['itsolve_header_top_email'])): ?>
										<a href="<?php esc_attr_e('mailto:','itsolve')?><?php echo esc_html($itsolve_opt['itsolve_header_top_email']); ?>"><i class="fa fa-envelope-o"></i><?php echo esc_html($itsolve_opt['itsolve_header_top_email']); ?></a>
									<?php endif; ?>	
									<?php if (!empty($itsolve_opt['itsolve_header_top_road'])): ?>
										<span><i class="fa fa-street-view"></i><?php echo esc_html($itsolve_opt['itsolve_header_top_road']); ?></span>
									<?php endif; ?>	
									<?php if (!empty($itsolve_opt['itsolve_header_top_mobile'])): ?>
										<a href="<?php esc_attr_e('tel:','itsolve')?><?php echo esc_html($itsolve_opt['itsolve_header_top_mobile']); ?>"><i class="fa fa-phone"></i><?php echo esc_html($itsolve_opt['itsolve_header_top_mobile']); ?></a>
									<?php endif; ?>	
								</p>
							</div>
						</div>
						<!-- TOP MIDDLE -->
						<div class=" col-md-4 col-sm-12">
							<div class="top-right-menu ">
								<p>							
									<?php if (!empty($itsolve_opt['itsolve_header_top_opening'])): ?>
										<span><?php echo esc_html($itsolve_opt['itsolve_header_top_opening']); ?></span>										
									<?php endif; ?>	
								</p>
								<ul class="social-icons text-left menu_18">
									<?php 
										foreach($itsolve_opt['itsolve_social_icons'] as $key=>$value ) { 
											if($value != ''){						
											 echo '<li><a class="'.esc_attr($key).' social-icon" href="'.esc_url($value).'" title="'.ucwords(esc_attr($key)).'" "><i class="fa fa-'.esc_attr($key).'"></i></a></li>';
											}
										}
									?>								
								</ul>									 									 				 
							</div>
						</div>	
					</div>
				<!-- STYLE 4 LEFT ADDRESS RIGHT ICON & SEARCH  -->
				 <?php }elseif(!empty($itsolve_opt['itsolve_top_right_layout']) && $itsolve_opt['itsolve_top_right_layout']=="header_top_4"){?>			
					<div class="row">
						<!-- TOP LEFT // top search menu -->
						<div class="col-xs-12 col-md-9 col-sm-8">
							<div class="top-address">
								<p>							
									<?php if (!empty($itsolve_opt['itsolve_header_top_road'])): ?>
										<span><i class="fa fa-street-view"></i><?php echo esc_html($itsolve_opt['itsolve_header_top_road']); ?></span>
									<?php endif; ?>	
									<?php if (!empty($itsolve_opt['itsolve_header_top_mobile'])): ?>
										<a href="<?php esc_attr_e('tel:','itsolve')?><?php echo esc_html($itsolve_opt['itsolve_header_top_mobile']); ?>"><i class="fa fa-phone"></i><?php echo esc_html($itsolve_opt['itsolve_header_top_mobile']); ?></a>
									<?php endif; ?>	
									<?php if (!empty($itsolve_opt['itsolve_header_top_email'])): ?>
										<a href="<?php esc_attr_e('mailto:','itsolve')?><?php echo esc_html($itsolve_opt['itsolve_header_top_email']); ?>"><i class="fa fa-envelope-o"></i><?php echo esc_html($itsolve_opt['itsolve_header_top_email']); ?></a>
									<?php endif; ?>	
								</p>
							</div>
						</div>
						<!-- TOP RIGHT -->
						<div class="col-xs-12 col-md-3 col-sm-4">
							<div class="top-right-menu litop">
								<ul class="social-icons text-right">
									<?php 
										foreach($itsolve_opt['itsolve_social_icons'] as $key=>$value ) { 
										
											if($value != ''){						
												 echo '<li><a class="'.esc_attr($key).' social-icon" href="'.esc_url($value).'" title="'.ucwords(esc_attr($key)).'" "><i class="fa fa-'.esc_attr($key).'"></i></a></li>';
											}
										}
									?>								
								</ul>								
							</div>
							<div class="top-address em-quearys-top text-right ritop">
								<div class="em-top-quearys-area">
								   <ul class="em-header-quearys">
										<li class="em-quearys-menu">
											<i class="fa fa-search t-quearys"></i>
											 <i class="fa fa-close  t-close em-s-hidden "></i>
										</li>
									</ul>
										<!--Search Form-->
										<div class="em-quearys-inner">
											<div class="em-quearys-form">
												<form class="top-form-control" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
													<input type="text" placeholder="<?php echo esc_attr_e( 'Type Your Keyword', 'itsolve' ) ?>" name="s" value="<?php the_search_query(); ?>" />
													<button class="top-quearys-style" type="submit">
														<i class="fa fa-long-arrow-right"></i>
													</button>
												</form>                                
											</div>
										</div>
										<!--End of Search Form-->									
								</div>
							</div>							
						</div>	
					</div>	
		
				<?php } ?>				
			</div>
		</div>
		
 
 <?php }elseif($itsolve_header_topa==2){
 }else{
 if (!empty($itsolve_opt['itsolve_header_top_hide']) && $itsolve_opt['itsolve_header_top_hide']==true){ ?>	
	<!-- HEADER TOP AREA -->
		<div class="itsolve-header-top">
					
			<div class="<?php if(!empty($itsolve_opt['itsolve_box_layout']) && $itsolve_opt['itsolve_box_layout']=="htopt_full"){echo esc_attr('container-fluid');}else{ echo esc_attr('container'); }?>">
									
				<!-- STYLE 1 RIGHT ICON  -->
				 <?php if(!empty($itsolve_opt['itsolve_top_right_layout']) && $itsolve_opt['itsolve_top_right_layout']=="header_top_1"){?>			
					<div class="row">
						<!-- TOP LEFT -->
						<div class="col-xs-12 col-md-8 col-sm-9">
							<div class="top-address">
								<p>							
									<?php if (!empty($itsolve_opt['itsolve_header_top_road'])): ?>
										<span><i class="fa fa-street-view"></i><?php echo esc_html($itsolve_opt['itsolve_header_top_road']); ?></span>
									<?php endif; ?>	
									<?php if (!empty($itsolve_opt['itsolve_header_top_mobile'])): ?>
										<a href="<?php esc_attr_e('tel:','itsolve')?><?php echo esc_html($itsolve_opt['itsolve_header_top_mobile']); ?>"><i class="fa fa-phone"></i><?php echo esc_html($itsolve_opt['itsolve_header_top_mobile']); ?></a>
									<?php endif; ?>	
									<?php if (!empty($itsolve_opt['itsolve_header_top_email'])): ?>
										<a href="<?php esc_attr_e('mailto:','itsolve')?><?php echo esc_html($itsolve_opt['itsolve_header_top_email']); ?>"><i class="fa fa-envelope-o"></i><?php echo esc_html($itsolve_opt['itsolve_header_top_email']); ?></a>
									<?php endif; ?>	
								</p>
							</div>
						</div>
						<!-- TOP RIGHT -->
						<div class="col-xs-12 col-md-4 col-sm-3">
							<div class="top-right-menu">
								<ul class="social-icons text-right">
									<?php 
										foreach($itsolve_opt['itsolve_social_icons'] as $key=>$value ) { 
											if($value != ''){						
												 echo '<li><a class="'.esc_attr($key).' social-icon" href="'.esc_url($value).'" title="'.ucwords(esc_attr($key)).'" "><i class="fa fa-'.esc_attr($key).'"></i></a></li>';
											}
										}
									?>								
								</ul>									 									 				
							</div>
						</div>	
					</div>	
				<!-- STYLE 2 LEFT ICON RIGHT ADDRESS -->
				 <?php }elseif(!empty($itsolve_opt['itsolve_top_right_layout']) && $itsolve_opt['itsolve_top_right_layout']=="header_top_2"){?>					
					<div class="row top-both-p0">
						<!-- TOP RIGHT -->
						<div class="col-xs-12 col-sm-3 col-md-3">
							<div class="top-right-menu">
								<ul class="social-icons text-left">
									<?php 
										foreach($itsolve_opt['itsolve_social_icons'] as $key=>$value ) { 
											if($value != ''){						
												 echo '<li><a class="'.esc_attr($key).' social-icon" href="'.esc_url($value).'" title="'.ucwords(esc_attr($key)).'" "><i class="fa fa-'.esc_attr($key).'"></i></a></li>';
											}
										}
									?>								
								</ul>									 										 
							</div>
						</div>					
						<!-- TOP LEFT -->
						<div class="col-xs-12 col-md-9 col-sm-9">
							<div class="top-address text-right">
								<p>							
									<?php if (!empty($itsolve_opt['itsolve_header_top_road'])): ?>
										<span><i class="fa fa-street-view"></i><?php echo esc_html($itsolve_opt['itsolve_header_top_road']); ?></span>
									<?php endif; ?>	
									<?php if (!empty($itsolve_opt['itsolve_header_top_mobile'])): ?>
										<a href="<?php esc_attr_e('tel:','itsolve')?><?php echo esc_html($itsolve_opt['itsolve_header_top_mobile']); ?>"><i class="fa fa-phone"></i><?php echo esc_html($itsolve_opt['itsolve_header_top_mobile']); ?></a>
									<?php endif; ?>	
									<?php if (!empty($itsolve_opt['itsolve_header_top_email'])): ?>
										<a href="<?php esc_attr_e('mailto:','itsolve')?><?php echo esc_html($itsolve_opt['itsolve_header_top_email']); ?>"><i class="fa fa-envelope-o"></i><?php echo esc_html($itsolve_opt['itsolve_header_top_email']); ?></a>
									<?php endif; ?>	
								</p>
							</div>
						</div>
					</div>	
				<!-- OPENING ICON AND LOGIN  -->			
				 <?php }elseif(!empty($itsolve_opt['itsolve_top_right_layout']) && $itsolve_opt['itsolve_top_right_layout']=="header_top_3"){?>			
					<div class="row">
						<!-- TOP LEFT -->
						<div class="col-xs-12 col-md-4 col-sm-8">
							<div class="top-address menu_18">
								<p>							
									<?php if (!empty($itsolve_opt['itsolve_header_top_opening'])): ?>
										<span><?php echo esc_html($itsolve_opt['itsolve_header_top_opening']); ?></span>										
									<?php endif; ?>	
								</p>
							</div>
						</div>
						<!-- TOP MIDDLE -->
						<div class="col-xs-12 col-md-4 col-sm-4">
							<div class="top-right-menu ">
								<ul class="social-icons text-left menu_18">
									<?php 
										foreach($itsolve_opt['itsolve_social_icons'] as $key=>$value ) { 
										
											if($value != ''){						
												 echo '<li><a class="'.esc_attr($key).' social-icon" href="'.esc_url($value).'" title="'.ucwords(esc_attr($key)).'" "><i class="fa fa-'.esc_attr($key).'"></i></a></li>';
											}
										}
									?>								
								</ul>									 									 				 
							</div>
						</div>					
						<!-- TOP RIGHT -->
						<div class="col-xs-12 col-md-4 col-sm-12">
							<div class="top-address em-login text-right menu_18">
								<p>							
									<?php itsolve_login();?>
								</p>
							</div>
						</div>	
					</div>
				 <?php }elseif(!empty($itsolve_opt['itsolve_top_right_layout']) && $itsolve_opt['itsolve_top_right_layout']=="header_top_4"){?>			
					<div class="row">
						<!-- TOP LEFT -->
						<div class="col-xs-12 col-md-9 col-sm-8">
							<div class="top-address">
								<p>							
									<?php if (!empty($itsolve_opt['itsolve_header_top_road'])): ?>
										<span><i class="fa fa-street-view"></i><?php echo esc_html($itsolve_opt['itsolve_header_top_road']); ?></span>
									<?php endif; ?>	
									<?php if (!empty($itsolve_opt['itsolve_header_top_mobile'])): ?>
										<a href="<?php esc_attr_e('tel:','itsolve')?><?php echo esc_html($itsolve_opt['itsolve_header_top_mobile']); ?>"><i class="fa fa-phone"></i><?php echo esc_html($itsolve_opt['itsolve_header_top_mobile']); ?></a>
									<?php endif; ?>	
									<?php if (!empty($itsolve_opt['itsolve_header_top_email'])): ?>
										<a href="<?php esc_attr_e('mailto:','itsolve')?><?php echo esc_html($itsolve_opt['itsolve_header_top_email']); ?>"><i class="fa fa-envelope-o"></i><?php echo esc_html($itsolve_opt['itsolve_header_top_email']); ?></a>
									<?php endif; ?>	
								</p>
							</div>
						</div>
						<!-- TOP RIGHT -->
						<div class="col-xs-12 col-md-3 col-sm-4">
							<div class="top-right-menu litop">
								<ul class="social-icons text-right">
									<?php 
										foreach($itsolve_opt['itsolve_social_icons'] as $key=>$value ) { 
										
											if($value != ''){						
												 echo '<li><a class="'.esc_attr($key).' social-icon" href="'.esc_url($value).'" title="'.ucwords(esc_attr($key)).'" "><i class="fa fa-'.esc_attr($key).'"></i></a></li>';
											}
										}
									?>								
								</ul>								
							</div>
							<div class="top-address em-quearys-top text-right ritop">
								<div class="em-top-quearys-area">
								   <ul class="em-header-quearys">
										<li class="em-quearys-menu">
											<i class="fa fa-search t-quearys"></i>
											 <i class="fa fa-close  t-close em-s-hidden "></i>
										</li>
									</ul>
										<!--Search Form-->
										<div class="em-quearys-inner">
											<div class="em-quearys-form">
												<form class="top-form-control" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
													<input type="text" placeholder="<?php echo esc_attr_e( 'Type Your Keyword', 'itsolve' ) ?>" name="s" value="<?php the_search_query(); ?>" />
													<button class="top-quearys-style" type="submit">
														<i class="fa fa-long-arrow-right"></i>
													</button>
												</form>                                
											</div>
										</div>
										<!--End of Search Form-->									
								</div>
							</div>							
						</div>	
					</div>	
				<?php } ?>				
			</div>
		</div>
    <!-- END HEADER TOP AREA -->
 <?php }else{}
	
	
}?>
 
<div class="mobile_logo_area d-sm-block d-md-block d-lg-none">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<?php itsolve_mobile_top_logo(); ?>
			</div>
		</div>
	</div>
</div>

  <!-- START HEADER MAIN MENU AREA -->
  <?php  $itsolve_header_style = get_post_meta( get_the_ID(),'_itsolve_itsolve_header_style', true ); ?>
  <?php  $itsolve_logo_menu_style = get_post_meta( get_the_ID(),'_itsolve_itsolve_logo_menu_style', true ); ?>
  
	<!-- HEADER TRANSPARENT MENU -->
   <?php if($itsolve_header_style==2){?>
 	<div class="itsolve-main-menu transprent-menu heading_style_4 d-md-none d-lg-block d-sm-none d-none">
		<div class="trp_nav_area">
			<div class="<?php if(!empty($itsolve_opt['itsolve_main_box_layout']) && $itsolve_opt['itsolve_main_box_layout']=="hmenu_full"){echo esc_attr('container-fluid');}else{ echo esc_attr('container'); }?>">
				   <?php if($itsolve_logo_menu_style==1){?>	
				<div class="row logo-left">				
					<div class="col-md-3 col-sm-3 col-xs-4">
						<?php itsolve_ts_logo(); ?>
					</div>
					<div class="col-md-9 col-sm-9 col-xs-8">
						<nav class="itsolve_menu">						
							<?php itsolve_main_menu(); ?>
						</nav>				
					</div>
				</div>
				 <?php } ?>
			</div>
		</div>				
	</div>	
	
	<!-- TRANSPARENT WITH STYKY MENU -->
   <?php }elseif($itsolve_header_style==3){?>
 	<div class="itsolve-main-menu one_page menu4 transprent-menu heading_style_5 d-md-none d-lg-block d-sm-none d-none">
		<div class="itsolve_nav_area scroll_fixed bdbar">
			<div class="<?php if(!empty($itsolve_opt['itsolve_main_box_layout']) && $itsolve_opt['itsolve_main_box_layout']=="hmenu_full"){echo esc_attr('container-fluid');}else{ echo esc_attr('container'); }?>">	
				<div class="row logo-left">				
					<div class="col-md-3 col-sm-3 col-xs-4">
						<?php itsolve_ts_logo(); ?>
					</div>
					<div class="col-md-9 col-sm-9 col-xs-8">
						<nav class="itsolve_menu">						
							<?php itsolve_main_menu(); ?>
						</nav>				
					</div>
				</div> 
			</div>
		</div>			
	</div>	

   <!-- ONE PAGE MANU -->
  <?php }elseif($itsolve_header_style==4){?>
   <!-- HEADER MANU AREA -->
 	<div class="itsolve-main-menu one_page d-md-none d-lg-block d-sm-none d-none">
		<div class="itsolve_nav_area scroll_fixed">
			<div class="<?php if(!empty($itsolve_opt['itsolve_main_box_layout']) && $itsolve_opt['itsolve_main_box_layout']=="hmenu_full"){echo esc_attr('container-fluid');}else{ echo esc_attr('container'); }?>">			
				<div class="row logo-left">				
					<div class="col-md-3 col-sm-3 col-xs-4">
						<?php itsolve_onepage_logo(); ?>
					</div>
					<div class="col-md-9 col-sm-9 col-xs-8">
						<nav class="itsolve_menu">						
							<?php itsolve_one_page_menu(); ?>
						</nav>				
					</div>
				</div>
			</div>	
		</div>				
	</div>	
	
	<!-- HEADER ONEPAGE TRANSPARENT MENU -->
    <?php }elseif($itsolve_header_style==5){?>
 	<div class="itsolve-main-menu d-md-none d-lg-block d-sm-none d-none one_page transprent-menu">
		<div class="trp_nav_area">
			<div class="<?php if(!empty($itsolve_opt['itsolve_main_box_layout']) && $itsolve_opt['itsolve_main_box_layout']=="hmenu_full"){echo esc_attr('container-fluid');}else{ echo esc_attr('container'); }?>">	
				<div class="row logo-left">				
					<div class="col-md-3 col-sm-3 col-xs-4">
						<?php itsolve_ts_logo(); ?>
					</div>
					<div class="col-md-9 col-sm-9 col-xs-8">
						<nav class="itsolve_menu">						
							<?php itsolve_one_page_menu(); ?>
						</nav>				
					</div>
				</div>
			
			</div>	
		</div>				
	</div>	
	
	<!-- ONEPAGE TRANSPRENT WITH STYKY MENU -->
    <?php }	elseif($itsolve_header_style==6){?>  
 	<div class="itsolve-main-menu one_page menu4 d-md-none d-lg-block d-sm-none d-none transprent-menu">
		<div class="itsolve_nav_area scroll_fixed bdbar">
			<div class="<?php if(!empty($itsolve_opt['itsolve_main_box_layout']) && $itsolve_opt['itsolve_main_box_layout']=="hmenu_full"){echo esc_attr('container-fluid');}else{ echo esc_attr('container'); }?>">		
				<div class="row logo-left">				
					<div class="col-md-3 col-sm-3 col-xs-4">
						<?php itsolve_ts_logo(); ?>
					</div>
					<div class="col-md-9 col-sm-9 col-xs-8">
						<nav class="itsolve_menu">						
							<?php itsolve_one_page_menu(); ?>
						</nav>				
					</div>
				</div>
			</div>
		</div>			
	</div>	

	<!-- HEADER MAIN MENU WITH STICKY -->
    <?php }elseif($itsolve_header_style==7){?>  
 	<div class="itsolve-main-menu one_page d-md-none d-lg-block d-sm-none d-none">
		<div class="itsolve_nav_area scroll_fixed">
			<div class="<?php if(!empty($itsolve_opt['itsolve_main_box_layout']) && $itsolve_opt['itsolve_main_box_layout']=="hmenu_full"){echo esc_attr('container-fluid');}else{ echo esc_attr('container'); }?>">	
				<div class="row logo-left">				
					<div class="col-md-3 col-sm-3 col-xs-4">
						<?php itsolve_main_logo(); ?>
					</div>
					<div class="col-md-9 col-sm-9 col-xs-8">
						<nav class="itsolve_menu">						
							<?php itsolve_main_menu(); ?>
						</nav>				
					</div>
				</div>
			</div>
		</div> 			
	</div>	
				
	<!-- HEADER WITH SEARCH -->
    <?php }elseif($itsolve_header_style==8){?>  
 	<div class="itsolve-main-menu search-menu one_page d-md-none d-lg-block d-sm-none d-none">
		<div class="itsolve_nav_area scroll_fixed">
			<div class="<?php if(!empty($itsolve_opt['itsolve_main_box_layout']) && $itsolve_opt['itsolve_main_box_layout']=="hmenu_full"){echo esc_attr('container-fluid');}else{ echo esc_attr('container'); }?>">			
				<div class="row logo-left">				
					<div class="col-md-3 col-sm-3 col-xs-4">
						<?php itsolve_main_logo(); ?>
					</div>
					<div class="col-md-9 col-sm-9 col-xs-8">
						<nav class="itsolve_menu main-search-menu">						
							<?php itsolve_main_menu(); ?>
							<?php itsolve_search_code(); ?>											
						</nav>				
					</div>
				</div>
				
			</div>
		</div>				
	</div>	
   
   <!-- HEADER TRANSPARENT WITH SEARCH -->
    <?php }elseif($itsolve_header_style==9){?>
 	<div class="itsolve-main-menu d-md-none d-lg-block d-sm-none d-none transprent-menu heading_style_4 tr_search">
		<div class="trp_nav_area">
			<div class="<?php if(!empty($itsolve_opt['itsolve_main_box_layout']) && $itsolve_opt['itsolve_main_box_layout']=="hmenu_full"){echo esc_attr('container-fluid');}else{ echo esc_attr('container'); }?>">
				<div class="row logo-left">				
					<div class="col-md-3 col-sm-3 col-xs-4">
						<?php itsolve_ts_logo(); ?>
					</div>
					
					<div class="col-md-9 col-sm-9 col-xs-8">
						<nav class="itsolve_menu main-search-menu">						
							<?php itsolve_main_menu(); ?>
							<?php itsolve_search_code(); ?>	
						</nav>
					</div>
				</div>
			</div>	
		</div>				
	</div>
	
	
	<!-- HEADER MENU WITH BUTTON -->
   <?php }elseif($itsolve_header_style==10){?>  
 	<div class="itsolve-main-menu one_page d-md-none d-lg-block d-sm-none d-none">
		<div class="itsolve_nav_area scroll_fixed">
			<div class="<?php if(!empty($itsolve_opt['itsolve_main_box_layout']) && $itsolve_opt['itsolve_main_box_layout']=="hmenu_full"){echo esc_attr('container-fluid');}else{ echo esc_attr('container'); }?>">		
				<div class="row logo-left">				
					<div class="col-md-3 col-sm-3 col-xs-4">
						<?php itsolve_main_logo(); ?>
					</div>
					<div class="col-md-9 col-sm-9 col-xs-8">
						<nav class="itsolve_menu main-search-menu">						
							<?php itsolve_main_menu(); ?>
							<?php if (!empty($itsolve_opt['itsolve_header_button'])): ?>
								<div class="donate-btn-header">
									<a class="dtbtn" href="<?php if (!empty($itsolve_opt['itsolve_header_button_url'])){echo esc_url($itsolve_opt['itsolve_header_button_url']);}?>"><?php echo esc_html($itsolve_opt['itsolve_header_button']); ?></a>	
								</div>	
							<?php endif; ?>		
						</nav>				
					</div>
				</div>
			</div>	
		</div>				
	</div>

	
	<!-- HEADER MENU WITHOUT LOGO -->	
    <?php }elseif($itsolve_header_style==14){?>  
 	<div class="itsolve-main-menu one_page d-md-none d-lg-block d-sm-none d-none">
		<div class="itsolve_nav_area scroll_fixed">
			<div class="<?php if(!empty($itsolve_opt['itsolve_main_box_layout']) && $itsolve_opt['itsolve_main_box_layout']=="hmenu_full"){echo esc_attr('container-fluid');}else{ echo esc_attr('container'); }?>">		
				<div class="row logo-left">				
					<div class="col-md-3 col-sm-3 col-xs-4">
						<?php itsolve_main_logo(); ?>
					</div>
					<div class="col-md-9 col-sm-9 col-xs-8">
						<nav class="itsolve_menu main-search-menu">						
							<?php itsolve_one_page_menu(); ?>
							<?php itsolve_search_code(); ?>																		
						</nav>				
					</div>
				</div>
			</div>
		</div>				
	</div>		
 
 <!-- DEFAULT MANU CONDITION  = 1  -->
 <?php }elseif($itsolve_header_style==16){?>	
 	<div class="itsolve-main-menu one_page menu4 transprent-menu d-md-none d-lg-block d-sm-none d-none">
		<div class="trp_nav_area">
			<div class="<?php if(!empty($itsolve_opt['itsolve_main_box_layout']) && $itsolve_opt['itsolve_main_box_layout']=="hmenu_full"){echo esc_attr('container-fluid');}else{ echo esc_attr('container'); }?>">	
				<div class="row logo-left">				
					<div class="col-md-3 col-sm-3 col-xs-4">
						<?php itsolve_ts_logo(); ?>
					</div>
					<div class="col-md-9 col-sm-9 col-xs-8">
						<nav class="itsolve_menu">						
							<?php itsolve_main_menu(); ?>
							<?php if (!empty($itsolve_opt['itsolve_header_button'])): ?>
								<div class="donate-btn-header">
									<a class="dtbtn" href="<?php if (!empty($itsolve_opt['itsolve_header_button_url'])){echo esc_url($itsolve_opt['itsolve_header_button_url']);}?>"><?php echo esc_html($itsolve_opt['itsolve_header_button']); ?></a>	
								</div>	
							<?php endif; ?>
						</nav>				
					</div>
				</div> 
			</div>
		</div>			
	</div>
   <?php }elseif($itsolve_header_style==15){?>
 	<div class="itsolve-main-menu one_page tr-black-menu d-md-none d-lg-block d-sm-none d-none">
		<div class="trp_nav_area">
			<div class="<?php if(!empty($itsolve_opt['itsolve_main_box_layout']) && $itsolve_opt['itsolve_main_box_layout']=="hmenu_full"){echo esc_attr('container-fluid');}else{ echo esc_attr('container'); }?>">	
				<div class="row logo-left">				
					<div class="col-md-3 col-sm-3 col-xs-4">
						<?php itsolve_main_logo(); ?>
					</div>
					<div class="col-md-9 col-sm-9 col-xs-8">
						<nav class="itsolve_menu">						
							<?php itsolve_main_menu(); ?>
							<?php if (!empty($itsolve_opt['itsolve_header_button'])): ?>
								<div class="donate-btn-header">
									<a class="dtbtn" href="<?php if (!empty($itsolve_opt['itsolve_header_button_url'])){echo esc_url($itsolve_opt['itsolve_header_button_url']);}?>"><?php echo esc_html($itsolve_opt['itsolve_header_button']); ?></a>	
								</div>	
							<?php endif; ?>
						</nav>				
					</div>
				</div> 
			</div>
		</div>			
	</div>
   <?php } elseif($itsolve_header_style==17){?>
 	<div class="itsolve-main-menu d-md-none d-lg-block d-sm-none d-none one_page transprent-menu">
		<div class="trp_nav_area">
			<div class="<?php if(!empty($itsolve_opt['itsolve_main_box_layout']) && $itsolve_opt['itsolve_main_box_layout']=="hmenu_full"){echo esc_attr('container-fluid');}else{ echo esc_attr('container'); }?>">	
				<div class="row logo-left">				
					<div class="col-md-3 col-sm-3 col-xs-4">
						<?php itsolve_ts_logo(); ?>
					</div>
					<div class="col-md-9 col-sm-9 col-xs-8">
						<nav class="itsolve_menu main-search-menu">						
							<?php itsolve_one_page_menu(); ?>
							<?php itsolve_search_code(); ?>																		
						</nav>					
					</div>
				</div>
			</div>
		</div>			
	</div>	
	
    <?php } elseif($itsolve_header_style==18){?>
 	<div class="itsolve-main-menu d-md-none d-lg-block d-sm-none d-none one_page  menu-18 ">
		<div class="trp_nav_area">
			<div class="<?php if(!empty($itsolve_opt['itsolve_main_box_layout']) && $itsolve_opt['itsolve_main_box_layout']=="hmenu_full"){echo esc_attr('container-fluid');}else{ echo esc_attr('container'); }?>">	
				<div class="row logo-left">				
					<div class="col-md-3 col-sm-3 col-xs-4">
						<?php itsolve_onepage_logo(); ?>
					</div>
					<div class="col-md-9 col-sm-9 col-xs-8">
						<nav class="itsolve_menu main-search-menu">						
							<?php itsolve_one_page_menu(); ?>
							<?php if (!empty($itsolve_opt['itsolve_header_button'])): ?>
								<div class="donate-btn-header">
									<a class="dtbtn" href="<?php if (!empty($itsolve_opt['itsolve_header_button_url'])){echo esc_url($itsolve_opt['itsolve_header_button_url']);}?>"><?php echo esc_html($itsolve_opt['itsolve_header_button']); ?></a>	
								</div>	
							<?php endif; ?>																			
						</nav>					
					</div>
				</div>
			</div>	
		</div>			
	</div>	
    <?php }else{ ?>
	
	
<!-- ================ REDUX strat ================ -->
	<?php if(!empty($itsolve_opt['itsolve_defaulth_menu_layout']) && $itsolve_opt['itsolve_defaulth_menu_layout']==2 ){?>	
   <!-- HEADER TRANSPARENT MENU -->
 	<div class="itsolve-main-menu d-md-none d-lg-block d-sm-none d-none transprent-menu">
		<div class="trp_nav_area">
			<div class="<?php if(!empty($itsolve_opt['itsolve_main_box_layout']) && $itsolve_opt['itsolve_main_box_layout']=="hmenu_full"){echo esc_attr('container-fluid');}else{ echo esc_attr('container'); }?>">
				<div class="row logo-left">				
					<div class="col-md-3 col-sm-3 col-xs-4">
						<?php itsolve_ts_logo(); ?>
					</div>
					<div class="col-md-9 col-sm-9 col-xs-8">
						<nav class="itsolve_menu">						
							<?php itsolve_main_menu(); ?>
						</nav>				
					</div>
				</div>
			</div>	
		</div>			
	</div>	
 	<?php }elseif(!empty($itsolve_opt['itsolve_defaulth_menu_layout']) && $itsolve_opt['itsolve_defaulth_menu_layout']==3 ){?>	
	<!-- TRANSPARENT MANU WITH SKITY -->
 	<div class="itsolve-main-menu one_page menu4 d-md-none d-lg-block d-sm-none d-none transprent-menu ">
		<div class="itsolve_nav_area scroll_fixed bdbar">
			<div class="<?php if(!empty($itsolve_opt['itsolve_main_box_layout']) && $itsolve_opt['itsolve_main_box_layout']=="hmenu_full"){echo esc_attr('container-fluid');}else{ echo esc_attr('container'); }?>">		
				<div class="row logo-left">				
					<div class="col-md-3 col-sm-3 col-xs-4">
						<?php itsolve_ts_logo(); ?>
					</div>
					<div class="col-md-9 col-sm-9 col-xs-8">
						<nav class="itsolve_menu">						
							<?php itsolve_main_menu(); ?>
						</nav>				
					</div>
				</div>
			</div>	
		</div>		
	</div>	

	<!-- MAIN HEADER MENU WITH STIKY -->
 	<?php }elseif(!empty($itsolve_opt['itsolve_defaulth_menu_layout']) && $itsolve_opt['itsolve_defaulth_menu_layout']==1 ){?>	
 	<div class="itsolve-main-menu one_page d-md-none d-lg-block d-sm-none d-none">
		<div class="itsolve_nav_area scroll_fixed">
			<div class="<?php if(!empty($itsolve_opt['itsolve_main_box_layout']) && $itsolve_opt['itsolve_main_box_layout']=="hmenu_full"){echo esc_attr('container-fluid');}else{ echo esc_attr('container'); }?>">			
				<div class="row logo-left">				
					<div class="col-md-3 col-sm-3 col-xs-4">
						<?php itsolve_main_logo(); ?>
					</div>
					<div class="col-md-9 col-sm-9 col-xs-8">
						<nav class="itsolve_menu">						
							<?php itsolve_main_menu(); ?>
						</nav>				
					</div>
				</div>
			</div>
		</div>				
	</div>	
 	<?php }else{ ?>
   <!-- HEADER DEFAULT MANU AREA -->
 	<div class="itsolve-main-menu d-md-none d-lg-block d-sm-none d-none">
		<div class="itsolve_nav_area">
			<div class="<?php if(!empty($itsolve_opt['itsolve_main_box_layout']) && $itsolve_opt['itsolve_main_box_layout']=="hmenu_full"){echo esc_attr('container-fluid');}else{ echo esc_attr('container'); }?>">			
				<div class="row logo-left">				
					<div class="col-md-3 col-sm-3 col-xs-4">
						<?php itsolve_main_logo(); ?>
					</div>
					<div class="col-md-9 col-sm-9 col-xs-8">
						<nav class="itsolve_menu">						
							<?php itsolve_main_menu(); ?>
						</nav>				
					</div>
				</div>
			</div>	
		</div>			
	</div>	
   <?php } ?>
   
   <?php } ?>	 
	<!-- MOBILE MENU AREA -->
	<div class="home-2 mbm d-sm-block d-md-block d-lg-none header_area main-menu-area">
		<div class="menu_area mobile-menu trp_nav_area">
			<nav>
				<?php itsolve_mobile_menu(); ?>
			</nav>
		</div>					
	</div>			
	<!-- END MOBILE MENU AREA  -->
</div>	