<?php
/**
 * The theme's index.php file.
 *
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
	<?php get_template_part( 'templates/blog', 'layout' ); ?>
	</section>
	<?php do_action( 'avada_after_content' ); ?>
<?php get_footer(); ?>
