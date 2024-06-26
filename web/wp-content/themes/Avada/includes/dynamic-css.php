<?php
/**
 * Dynamic-css.
 *
 * @author     ThemeFusion
 * @copyright  (c) Copyright by ThemeFusion
 * @link       https://theme-fusion.com
 * @package    Avada
 * @subpackage Core
 */

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

/**
 * Format of the $css array:
 * $css['media-query']['element']['property'] = value
 *
 * If no media query is required then set it to 'global'
 *
 * If we want to add multiple values for the same property then we have to make it an array like this:
 * $css[media-query][element]['property'][] = value1
 * $css[media-query][element]['property'][] = value2
 *
 * Multiple values defined as an array above will be parsed separately.
 *
 * @param array $original_css The existing CSS.
 */
function avada_dynamic_css_array( $original_css = [] ) {
	global $avada_dynamic_css_array_added;

	if ( true === $avada_dynamic_css_array_added ) {
		return $original_css;
	}

	$css = [];

	$c_page_id = Avada()->fusion_library->get_page_id();

	$dynamic_css_helpers = Fusion_Dynamic_CSS::get_instance()->get_helpers();

	$side_header_width = ( 'top' === fusion_get_option( 'header_position' ) ) ? 0 : intval( Avada()->settings->get( 'side_header_width' ) );

	/**
	 * Single Post Slideshow.
	 */
	if ( Avada()->settings->get( 'slideshow_smooth_height' ) || ( 'auto' === fusion_get_option( 'fimg[width]', $c_page_id ) && 'half' === fusion_get_option( 'portfolio_featured_image_width' ) ) ) {
		$css['global']['.fusion-post-slider.fusion-flexslider,.fusion-post-slideshow.fusion-flexslider']['overflow'] = 'hidden';
	}

	// Responsive mode.
	if ( fusion_get_option( 'responsive' ) ) {
		/*
		 * Top Header Only Responsive Styles.
		 */
		$sidebar_order = apply_filters( 'fusion_responsive_sidebar_order', explode( ',', fusion_get_option( 'responsive_sidebar_order' ) ) );

		$sidebar_break_point = '@media only screen and (max-width: ' . ( intval( $side_header_width ) + intval( Avada()->settings->get( 'sidebar_break_point' ) ) ) . 'px)';
		foreach ( $sidebar_order as $key => $element ) {
			$css[ $sidebar_break_point ][ '.has-sidebar #' . $element ]['order'] = $key + 1;

			if ( 0 < $key ) {
				$css[ $sidebar_break_point ][ '.has-sidebar #' . $element ]['margin-top'] = '50px';
			}
		}

		/*
		@media only screen and ( max-width: $content_break_point )
		*/
		$mq_max_sh_cbp = '@media only screen and (max-width: ' . ( intval( $side_header_width ) + intval( Avada()->settings->get( 'content_break_point' ) ) ) . 'px)';

		$sliding_bar_position = Avada()->settings->get( 'slidingbar_position' );

		if ( fusion_get_page_option( 'fallback', $c_page_id ) ) {
			$css[ $mq_max_sh_cbp ]['#sliders-container']['display'] = 'none';
			$css[ $mq_max_sh_cbp ]['#fallback-slide']['display']    = 'block';
		}

		// Mobile Logo.
		if ( Avada()->settings->get( 'mobile_logo', 'url' ) ) {
			$mq_max_shbp = '@media only screen and (max-width: ' . intval( Avada()->settings->get( 'side_header_break_point' ) ) . 'px)';
			$css[ $mq_max_shbp ]['#side-header .fusion-mobile-logo-1 .fusion-standard-logo,.fusion-mobile-logo-1 .fusion-standard-logo']['display'] = 'none';
			$css[ $mq_max_shbp ]['#side-header .fusion-mobile-logo,.fusion-mobile-logo']['display'] = 'inline-block';
		}

		// Sliding bar position already set above for sliding bar desktop calcs.
		if ( Avada()->settings->get( 'slidingbar_widgets' ) && Avada()->settings->get( 'mobile_slidingbar_widgets' ) ) {

			// On mobile for left/right sliding bar the width should be 100vw - triangle toggle width.
			$sliding_bar_width           = '100vw';
			$sliding_bar_closed_position = '-' . $sliding_bar_width;
			$sliding_bar_toggle_width    = '56px'; // 20px added for scroll bar.

			if ( 'menu' === Avada()->settings->get( 'slidingbar_toggle_style' ) ) {
				$sliding_bar_toggle_width = '0';
			}

			if ( $sliding_bar_toggle_width ) {
				$sliding_bar_closed_position = 'calc(' . $sliding_bar_toggle_width . ' - ' . $sliding_bar_width . ')';
				$sliding_bar_width           = 'calc(' . $sliding_bar_width . ' - ' . $sliding_bar_toggle_width . ')';
			}

			$css[ $mq_max_sh_cbp ]['.fusion-sliding-bar-position-left .fusion-sliding-bar,.fusion-sliding-bar-position-right .fusion-sliding-bar']['width'] = $sliding_bar_width;

			$css[ $mq_max_sh_cbp ]['.fusion-sliding-bar-position-left,.fusion-sliding-bar-position-right '][ $sliding_bar_position ] = $sliding_bar_closed_position;
		}
	}

	if ( is_single() && fusion_get_page_option( 'fimg[width]', $c_page_id ) ) {

		if ( 'auto' !== fusion_get_page_option( 'fimg[width]', $c_page_id ) ) {
			$css['global'][ '#post-' . $c_page_id . ' .fusion-post-slideshow' ]['max-width'] = fusion_get_page_option( 'fimg[width]', $c_page_id );
		} else {
			$css['global']['.fusion-post-slideshow .flex-control-nav']['position']   = 'relative';
			$css['global']['.fusion-post-slideshow .flex-control-nav']['text-align'] = 'center';
			$css['global']['.fusion-post-slideshow .flex-control-nav']['margin-top'] = '10px';

			$css['global'][ '#post-' . $c_page_id . ' .fusion-post-slideshow img' ]['width'] = Fusion_Sanitize::size( fusion_get_page_option( 'fimg[width]', $c_page_id ) );
		}

		if ( false === strpos( fusion_get_page_option( 'fimg[width]', $c_page_id ), '%' ) ) {
			$css['global'][ '#post-' . $c_page_id . ' .fusion-post-slideshow img' ]['max-width'] = Fusion_Sanitize::size( fusion_get_page_option( 'fimg[width]', $c_page_id ) );
		}
	}

	if ( is_single() && fusion_get_page_option( 'fimg[height]', $c_page_id ) ) {
		$css['global'][ '#post-' . $c_page_id . ' .fusion-post-slideshow img,#post-' . $c_page_id . ' .fusion-post-slideshow' ]['max-height'] = fusion_get_page_option( 'fimg[height]', $c_page_id );
		$css['global'][ '#post-' . $c_page_id . ' .fusion-post-slideshow .slides' ]['max-height'] = '100%';
	}

	if ( class_exists( 'WooCommerce' ) ) {
		$css['global']['.woocommerce-invalid:after']['content'] = "'" . wp_strip_all_tags( __( 'Please enter correct details for this required field.', 'Avada' ), true ) . "'";
	}

	if ( is_page_template( 'contact.php' ) && Avada()->settings->get( 'gmap_address' ) && Avada()->settings->get( 'status_gmap' ) ) {

		$css['global']['.avada-google-map']['width']  = Fusion_Sanitize::size( Avada()->settings->get( 'gmap_dimensions', 'width' ) );
		$css['global']['.avada-google-map']['margin'] = '0 auto';

		$gmap_height                                  = ( Avada()->settings->get( 'gmap_dimensions', 'height' ) ) ? Avada()->settings->get( 'gmap_dimensions', 'height' ) : '415px';
		$css['global']['.avada-google-map']['height'] = Fusion_Sanitize::size( $gmap_height );

	} elseif ( is_page_template( 'contact-2.php' ) && Avada()->settings->get( 'gmap_address' ) && Avada()->settings->get( 'status_gmap' ) ) {

		$css['global']['.avada-google-map']['margin']     = '0 auto';
		$css['global']['.avada-google-map']['margin-top'] = '55px';
		$css['global']['.avada-google-map']['height']     = '415px !important';
		$css['global']['.avada-google-map']['width']      = '940px !important';

	}

	/**
	 * Hack to fix font-names using '+' instead of ' '.
	 * This happens when using WPML coupled with the string-translation plugin.
	 * FIxes #3309
	 */
	if ( defined( 'WPML_PLUGIN_FILE' ) || defined( 'ICL_PLUGIN_FILE' ) || class_exists( 'SitePress' ) ) {
		foreach ( $css as $media_query => $elements ) {
			foreach ( $elements as $element => $properties ) {
				foreach ( $properties as $property => $value ) {
					if ( 'font-family' === $property ) {
						$css[ $media_query ][ $element ][ $property ] = str_replace( '+', ' ', $value );
					}
				}
			}
		}
	}

	if ( Avada()->settings->get( 'link_decoration' ) ) {
		$exclusions    = Avada()->settings->get( 'link_decoration_exclusion' );
		$base_celector = '.awb-link-decoration #wrapper a';
		$end_selector  = ':not(.awb-no-decoration,.fusion-builder-module-control):not([data-filter], .pagination *, .flex-next, .flex-prev, .awb-image-hotspots-hotspot, .fusion-social-network-icon, .fb-icon-element, .avada-button-select, .fusion-countdown-link, .fusion-button-bar, .tag-cloud-link)';
		$end_selector  = Avada()->settings->get( 'image_rollover' ) ? $end_selector . ':not(.fusion-rollover-link, .fusion-rollover-gallery, .fusion-rollover-title-link)' : $end_selector;
		$end_selector  = class_exists( 'Woocommerce' ) ? $end_selector . ':not([class^="star"], [role="tab"] *, .catalog-ordering *, .view-cart *, .woocommerce-side-nav *, .wc-forward, .remove, .add_to_cart_button, .show_details_button, .product_type_external, .fusion-view-cart, .fusion-quick-view)' : $end_selector;
		$end_selector  = class_exists( 'Tribe__Events__Main' ) ? $end_selector . ':not(.tribe-common-c-btn-icon, .tribe-common-c-btn-border-small, .tribe-events-c-view-selector__list-item-link, .tribe-events-c-nav__list-item *)' : $end_selector;
		$end_selector  = in_array( 'breadcrumbs', $exclusions ) ? $end_selector . ':not(.fusion-breadcrumb-link)' : $end_selector;
		$end_selector  = in_array( 'breadcrumbs', $exclusions ) && function_exists( 'yoast_breadcrumb' ) ? $end_selector . ':not(.awb-yoast-breadcrumbs *)' : $end_selector;
		$end_selector  = in_array( 'breadcrumbs', $exclusions ) && function_exists( 'rank_math_get_breadcrumbs' ) ? $end_selector . ':not(.awb-rankmath-breadcrumbs *)' : $end_selector;
		$end_selector  = in_array( 'buttons', $exclusions ) ? $end_selector . ':not(.fusion-button, .tribe-button)' : $end_selector;
		$end_selector  = in_array( 'headings', $exclusions ) ? $end_selector . ':not(:where(h1 *, h2 *, h3 *, h4 *, h5 *, h6 *), .heading-link)' : $end_selector;
		$end_selector  = in_array( 'menus', $exclusions ) ? $end_selector . ':not(.awb-menu__main-a, .awb-menu__sub-a, .awb-submenu__main-a, .awb-submenu__sub-a)' : $end_selector;
		$end_selector  = in_array( 'tabstoggles', $exclusions ) ? $end_selector . ':not([role="tab"], [role="button"])' : $end_selector;
		$end_selector  = in_array( 'tocs', $exclusions ) ? $end_selector . ':not(.awb-toc-el__item-anchor)' : $end_selector;
		$selector      = $base_celector . $end_selector;

		$css['global'][ $selector ]['text-decoration-line']      = 'var(--awb-link_decoration_line)';
		$css['global'][ $selector ]['text-decoration-style']     = 'var(--awb-link_decoration_style)';
		$css['global'][ $selector ]['text-decoration-thickness'] = 'var(--awb-link_decoration_thickness)';
		$css['global'][ $selector ]['transition-property']       = 'text-decoration,color,background-color,border-color';

		$selector = $selector . ':hover,' . $selector . ':focus';
		$css['global'][ $selector ]['text-decoration-line']      = 'var(--awb-link_decoration_line_hover)';
		$css['global'][ $selector ]['text-decoration-style']     = 'var(--awb-link_decoration_style_hover)';
		$css['global'][ $selector ]['text-decoration-thickness'] = 'var(--awb-link_decoration_thickness_hover)';

	}

	$avada_dynamic_css_array_added = true;

	$css = array_replace_recursive( $css, $original_css );

	return apply_filters( 'avada_dynamic_css_array', $css );
}
add_filter( 'fusion_dynamic_css_array', 'avada_dynamic_css_array', 999 );
