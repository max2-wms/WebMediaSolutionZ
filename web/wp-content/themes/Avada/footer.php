<?php
/**
 * The footer template.
 *
 * @package Avada
 * @subpackage Templates
 */

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

$is_builder = ( function_exists( 'fusion_is_preview_frame' ) && fusion_is_preview_frame() ) || ( function_exists( 'fusion_is_builder_frame' ) && fusion_is_builder_frame() );
?>
						<?php do_action( 'avada_after_main_content' ); ?>

					</div>  <!-- fusion-row -->
				</main>  <!-- #main -->
				<?php do_action( 'avada_after_main_container' ); ?>

				<?php
				/**
				 * Get the correct page ID.
				 */
				$c_page_id = Avada()->fusion_library->get_page_id();
				?>

				<?php
				/**
				 * Only include the footer.
				 */
				?>
				<?php if ( ! is_page_template( 'blank.php' ) && apply_filters( 'awb_should_render_footer', true, $c_page_id ) ) : ?>

					<?php
					if ( has_action( 'avada_render_footer' ) ) {
						do_action( 'avada_render_footer' );
					} else {
						Avada()->template->render_footer();
					}
					?>

					<?php if ( Avada()->settings->get( 'slidingbar_widgets' ) || $is_builder ) : ?>
						<div class="fusion-sliding-bar-wrapper">
							<?php
							/**
							 * Add sliding bar.
							 */
							if ( Avada()->settings->get( 'slidingbar_widgets' ) ) {
								get_template_part( 'sliding_bar' );
							}
							?>
						</div>
					<?php endif; ?>

					<?php do_action( 'avada_before_wrapper_container_close' ); ?>
				<?php endif; // End is not blank page check. ?>
			</div> <!-- wrapper -->
		</div> <!-- #boxed-wrapper -->
		<?php if ( 'boxed' === Avada()->settings->get( 'layout' ) ) : ?>
			<?php if ( 'framed' === Avada()->settings->get( 'scroll_offset' ) ) : ?>
				<div class="fusion-top-frame"></div>
				<div class="fusion-bottom-frame"></div>
			<?php endif; ?>

			<?php if ( 'none' !== Avada()->settings->get( 'boxed_modal_shadow' ) ) : ?>
				<div class="fusion-boxed-shadow"></div>
			<?php endif; ?>
		<?php endif; // End of boxed mode check. ?>
		<a class="fusion-one-page-text-link fusion-page-load-link" tabindex="-1" href="#" aria-hidden="true"><?php esc_html_e( 'Page load link', 'Avada' ); ?></a>

		<div class="avada-footer-scripts">
			<?php wp_footer(); ?>
		</div>

		<?php get_template_part( 'templates/to-top' ); ?>
	</body>
</html>
