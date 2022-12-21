<?php 
/*
single details page

*/

?>							
		<div class="itsolve-single-blog-details">
			<?php if(has_post_thumbnail()){?>
				<div class="itsolve-single-blog--thumb">
					<?php the_post_thumbnail('itsolve-blog-single'); ?>
				</div>									
			<?php } ?>
			<div class="itsolve-single-blog-details-inner">
			<?php if( 'post' == get_post_type() ) { ?>
				<div class="appco-single-blog-title blog-page-title">
					<h1 class="single-blog-title"><?php the_title();?></h1>	
				</div>
				<!-- BLOG POST META  -->
				<div class="itsolve-blog-meta txp-meta">
					<div class="itsolve-blog-meta-left">
                        <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"> <?php the_author(); ?></a>	
                        <span><?php echo get_the_time(get_option('date_format')); ?></span>
						<a class="meta_comments" href="<?php comments_link(); ?>">
							<?php comments_number( esc_html__('0 Comments','itsolve'), esc_html__('1 Comments','itsolve'), esc_html__('% Comments','itsolve') );?>
						</a>
					</div>	
				</div>
			<?php } // if post ?>
			
			<?php if ( '' != get_the_content() ) { ?>
			<div class="itsolve-single-blog-content">
				<div class="single-blog-content">
					<?php the_content(); ?>
					<div class="page-list-single">						
						<?php 
						/**
						* Display In-Post Pagination
						*/
						wp_link_pages( array(
							'link_before'   => '<span>',
							'link_after'    => '</span>',
							'before'        => '<p class="inner-post-pagination"><span>' . esc_html__('Pages:', 'itsolve'),
							'after'     => '</span></p>'
						)); ?>					
											
					</div>
				</div>
			</div>
			<?php } ?>
			<?php if( 'post' == get_post_type() ) { ?>	
				
				<div class="itsolve-blog-social">
					<div class="itsolve-single-icon">
					<?php
						if( function_exists('itsolve_blog_sharing') ){						
							itsolve_blog_sharing();
						}
						?>
					</div>
				</div>
				
			<?php } ?>

		</div>
		</div>
		<?php get_template_part( 'template-parts/biography');?>

	<?php comments_template();