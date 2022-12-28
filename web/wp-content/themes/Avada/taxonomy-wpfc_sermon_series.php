<?php
/**
 * The template used by the Sermon Manager plugin.
 * Used for the wpfc_sermon_series taxonomy.
 *
 * @see https://wordpress.org/plugins/sermon-manager-for-wordpress/
 * @package Avada
 * @subpackage Templates
 */

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}
?>
<?php get_header(); ?>
<section id="content" class="<?php esc_attr_e( apply_filters( 'awb_content_tag_class', '' ) ); ?>" style="<?php esc_attr_e( apply_filters( 'awb_content_tag_style', '' ) ); ?>">
		<?php Avada()->sermon_manager->render_wpfc_sorting(); ?>
		<?php get_template_part( 'templates/blog', 'layout' ); ?>
	</section>
	<?php do_action( 'avada_after_content' ); ?>
<?php get_footer(); ?>
