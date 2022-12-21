<?php

if(!function_exists('itsolve_blog_breadcrumb')){
	function itsolve_blog_breadcrumb(){?>
		<!-- BLOG BREADCUMB START -->
		<div class="breadcumb-area">
			<div class="container">				
				<div class="row">
					<div class="col-md-12">						
						<div class="breadcumb-inner">
							<h2><?php esc_html_e('Blog Standerd','itsolve'); ?></h2>
							<?php itsolve_breadcrumbs(); ?>								
						</div>	
					</div>
				</div>
			</div>
		</div>		
	<?php }	
}
 
if(!function_exists('itsolve_signle_blog_breadcrumb')){
	function itsolve_signle_blog_breadcrumb(){?>
		<!-- BLOG BREADCUMB START -->
		<div class="breadcumb-area">
			<div class="container">				
				<div class="row">
					<div class="col-md-12">						
						<div class="breadcumb-inner">
							<h2><?php esc_html_e('Single Blog','itsolve'); ?></h2>
							<?php itsolve_breadcrumbs(); ?>							
						</div>	
					</div>
				</div>
			</div>
		</div>		
	<?php }	
}

if(!function_exists('itsolve_signle_case_breadcrumb')){
	function itsolve_signle_case_breadcrumb(){?>
		<!-- BLOG BREADCUMB START -->
		<div class="breadcumb-area">
			<div class="container">				
				<div class="row">
					<div class="col-md-12">						
						<div class="breadcumb-inner">
							<h2><?php esc_html_e('Case Study Details','itsolve'); ?></h2>
							<?php itsolve_breadcrumbs(); ?>							
						</div>	
					</div>
				</div>
			</div>
		</div>		
	<?php }	
}


// itsolve breadcrumb
if(!function_exists('itsolve_breadcrumbs')){
	function itsolve_breadcrumbs() {
		echo '<ul>';
		//if (!is_home()) {
					echo '<li><a href="';
					echo esc_url( home_url( '/' ) );
					echo '">';
					echo esc_html__('Home','itsolve');
					echo "</a></li>";
					echo '<li><i class="fa fa-angle-right"></i></li>';		

			if (is_category()) {	
					echo "<li>";
					echo single_cat_title( '', false );
					echo '</li>';
			}
			elseif( is_archive() ) {
				the_archive_title( '<li>', '</li>' );
			}			
			elseif (is_page()) {			
					echo '<li>';
					echo get_the_title();
					echo '</li>';
			}
			elseif (is_single()) {	
					echo "<li>";
					the_title();
					echo '</li>';
			}		
			elseif (is_tag()) {
				single_tag_title();
			}

			elseif (is_day()) {
				echo"<li>";
					echo esc_html__('Archive for','itsolve');
				echo'</li>';				
			}
			elseif (is_month()) {
				echo"<li>";
					echo esc_html__('Archive for','itsolve');
				echo'</li>';				
			}
			elseif (is_year()) {
				echo"<li>";
					echo esc_html__('Archive for','itsolve');
				echo'</li>';				
			}
			elseif (is_author()) {
				echo"<li>";
					echo esc_html__('Author','itsolve');
				echo'</li>';			
			}
			elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {
				echo"<li>";
					echo esc_html__('Blog Archives','itsolve');
				echo'</li>';			
			}
			elseif (is_search()) {
				echo"<li>";
					echo esc_html__('Search Results','itsolve');
				echo'</li>';
			}
			elseif (is_404()) {
				echo"<li>";
					echo esc_html__('404','itsolve');
				echo'</li>';
			}
			
			
			
		//}
		echo '</ul>';
		
	
	}
}
// end itsolve breadcrumb

