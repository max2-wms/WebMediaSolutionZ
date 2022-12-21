<?php
// blog bradcrumb style
$show_page  = get_post_meta( get_the_ID(),'_itsolve_breadcrumbs', true );  
$pageimagess  = get_post_meta( get_the_ID(),'_itsolve_pageimagess', true );  
$page_text_align  = get_post_meta( get_the_ID(),'_itsolve_page_text_align', true );  
$page_text_transform  = get_post_meta( get_the_ID(),'_itsolve_page_text_transform', true );  
$btitle  = get_post_meta( get_the_ID(),'_itsolve_btitle', true );  
 if(!is_front_page()):  
   if( $show_page == 0 ) { ?>
	<!-- BLOG BREADCUMB START -->
	<div class="breadcumb-area" <?php if($pageimagess){?> style="background-image:url(<?php echo esc_url($pageimagess)?>)" <?php } ?>>
		<div class="container">				
			<div class="row">
				<div class="col-md-12 txtc  <?php echo esc_attr( $page_text_align );?> <?php echo esc_attr( $page_text_transform );?>">
					<?php if( $btitle == 'btitles' ) { ?>
					<div class="brpt">
						<h2><?php wp_title(' '); ?></h2>
					</div>
					<?php } ?>
					<div class="breadcumb-inner">
						<?php itsolve_breadcrumbs(); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php } ?>
<?php else : ?>
<?php endif; 