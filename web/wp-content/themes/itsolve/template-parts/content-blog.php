<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package itsolve
 */
?>
	<!-- BLOG QUERY -->
	<!-- SINGLE BLOG -->
	<div class="col-lg-4 col-md-6 col-sm-12 grid-item">
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="itsolve-single-blog">				
				<!-- BLOG THUMB -->
				<?php if(has_post_thumbnail()){?>
					<div class="itsolve-blog-thumb ">
						<a href="<?php the_permalink(); ?>"> <?php the_post_thumbnail('itsolve-blog-default'); ?> </a>
						<div class="itsolve-blog-meta-top">
							<?php the_category();?>
						</div>
					</div>									
				<?php } ?>
				<!-- BLOG CONTENT -->
				<div class="em-blog-content-area ">												
					<div class="itsolve-blog-meta-left">
					<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"> <?php the_author(); ?></a>	
                        <span><?php echo get_the_time(get_option('date_format')); ?></span>
					</div>	
					<!-- BLOG TITLE -->
					<div class="blog-page-title ">
						<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>			
					</div>
					<!-- BLOG TITLE AND CONTENT -->
					<div class="blog-inner">
						<div class="blog-content ">					
							<p><?php echo wp_trim_words( get_the_content(), 14, ' ' ); ?></p>
						</div>
					</div>
				</div>	
				
			</div>
			
			
		</div> <!--  END SINGLE BLOG -->
	</div><!-- #post-## -->
