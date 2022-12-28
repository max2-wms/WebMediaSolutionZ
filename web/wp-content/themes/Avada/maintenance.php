<?php

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="<?php avada_the_html_class(); ?>">
	<head>
		<?php do_action( 'awb_maintenance_head' ); ?>
	</head>
	<body <?php echo apply_filters( 'awb_maintenance_body_classes', body_class( 'fusion-body awb-maintenance-page' ) ); ?> <?php fusion_element_attributes( 'body' ); ?>>
		<div id="boxed-wrapper">
			<div id="wrapper" class="fusion-wrapper">
				<main id="main" class="width-100 clearfix">
					<div class="fusion-row" style="max-width:100%;">
						<section id="content" class="awb-maintenance-content">
							<div class="post-content">
								<?php do_action( 'awb_maintenance_content' ); ?>
							</div>
						</section>
					</div>
				</main>
			</div>
		</div>
		<?php do_action( 'awb_maintenance_footer' ); ?>
	</body>
</html>
