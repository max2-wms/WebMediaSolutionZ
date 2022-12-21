<?php
/**
 * The template for displaying 404 page
 *
 */

get_header();
get_template_part( 'includes/header' , 'page-title' ); ?>
<div class="not-found-area">
	<div class="container">
		<div class="col-md-12">		
			<!-- 404 PAGE -->
			<div class="not-found">
				<div class="not-found-inner">
					<?php global $itsolve_opt; ?>
					<?php if (!empty($itsolve_opt['404_info'])): ?>
						<?php 
							echo wp_kses($itsolve_opt['404_info'], array(
								'br' => array(),
								'h2' => array(),
								'a' => array(
										'href' => array(),
										'title' => array()										
									),
								'strong' => array(),
								'em' => array(),
								'p' => array(),
								'span' => array(),
							));
						?>
					<?php else: ?>
						<h2><?php esc_html_e('404','itsolve')?></h2>
						<p><?php esc_html_e('Oops! The page you are looking for does not exist.','itsolve')?></p>							
					<?php endif; ?>	

				<div class="nf"><a href="<?php echo esc_url(home_url('/'));?>"><?php esc_html_e('Go Home','itsolve')?></a></div>
				</div>
			</div>
			
		
		</div>
	</div>
</div>
<?php get_footer();