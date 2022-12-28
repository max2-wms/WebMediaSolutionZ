<?php
/**
 * Handles layouts.
 *
 * @author     ThemeFusion
 * @copyright  (c) Copyright by ThemeFusion
 * @link       https://theme-fusion.com
 * @package    Avada
 * @subpackage Core
 * @since      3.8
 */

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

/**
 * Handles layouts.
 */
class Avada_Layout {

	/**
	 * The content-width.
	 *
	 * @static
	 * @access private
	 * @since 5.0.0
	 * @var int|null
	 */
	private static $content_width = null;

	/**
	 * The class constructor
	 */
	public function __construct() {

		add_filter( 'is_hundred_percent_template', [ $this, 'is_hundred_percent_template' ], 10, 2 );
		add_filter( 'fusion_is_hundred_percent_template', [ $this, 'is_hundred_percent_template' ], 10, 2 );

	}

	/**
	 * Get column width of the current page.
	 *
	 * @param integer|string $site_width     A custom site width.
	 * @return integer
	 */
	public function get_content_width( $site_width = 0 ) {
		global $fusion_fwc_type;

		/**
		 * The content width.
		 */
		$options      = get_option( Avada::get_option_name() );
		$c_page_id    = Avada()->fusion_library->get_page_id();
		$page_padding = 0;

		if ( ! $site_width ) {
			$site_width = ( isset( $options['site_width'] ) ) ? $options['site_width'] : '1200px';

			if ( $this->is_current_wrapper_hundred_percent() ) {

				$site_width = '100%';

				// Get 100% Width Left/Right Padding.
				$page_padding = fusion_get_option( 'hundredp_padding' );
				$page_padding = ! $page_padding ? '0' : $page_padding;

				// Section shortcode padding.
				if ( isset( $fusion_fwc_type ) && ! empty( $fusion_fwc_type ) ) {
					if ( Fusion_Sanitize::get_unit( $fusion_fwc_type['padding']['left'] ) === Fusion_Sanitize::get_unit( $fusion_fwc_type['padding']['right'] ) ) {
						$page_padding = ( Fusion_Sanitize::number( $fusion_fwc_type['padding']['left'] ) + Fusion_Sanitize::number( $fusion_fwc_type['padding']['right'] ) ) / 2 . Fusion_Sanitize::get_unit( $fusion_fwc_type['padding']['left'] );
					}
				}

				if ( false !== strpos( $page_padding, '%' ) ) {
					// 100% Width Left/Right Padding is using %.
					$page_padding = Avada_Helper::percent_to_pixels( $page_padding );
				} elseif ( false !== strpos( $page_padding, 'rem' ) ) {
					// 100% Width Left/Right Padding is using rems.
					// Default browser font-size is 16px.
					$page_padding = Fusion_Sanitize::number( $page_padding ) * 16;
				} elseif ( false !== strpos( $page_padding, 'em' ) ) {
					// 100% Width Left/Right Padding is using ems.
					$page_padding = Avada_Helper::ems_to_pixels( $page_padding );
				}
			}
		}

		if ( intval( $site_width ) ) {
			// Site width is using %.
			if ( false !== strpos( $site_width, '%' ) ) {
				$site_width = Avada_Helper::percent_to_pixels( $site_width );
			} elseif ( false !== strpos( $site_width, 'rem' ) ) {
				// Site width is using rems.
				$site_width = Fusion_Sanitize::number( $site_width ) * 16;
			} elseif ( false !== strpos( $site_width, 'em' ) ) {
				// Site width is using ems.
				$site_width = Avada_Helper::ems_to_pixels( $site_width );
			}

			// Subtract side header width from remaining content width.
			if ( 'boxed' === fusion_get_option( 'layout' ) && 'top' !== fusion_get_option( 'header_position' ) ) {
				$site_width = intval( $site_width ) - intval( Avada()->settings->get( 'side_header_width' ) );
			}
		} else {
			// Fallback to 1200px.
			$site_width = 1200;
		}

		$site_width = intval( $site_width ) - 2 * intval( $page_padding );

		/**
		 * Sidebars width.
		 */
		$sidebar_1_width = 0;
		$sidebar_2_width = 0;

		if ( AWB_Widget_Framework()->has_sidebar() && ! AWB_Widget_Framework()->has_double_sidebars() ) {
			if ( 'tribe_events' === get_post_type( $c_page_id ) ) {
				$sidebar_1_width = Avada()->settings->get( 'ec_sidebar_width' );
			} else {
				$sidebar_1_width = Avada()->settings->get( 'sidebar_width' );
			}
		} elseif ( AWB_Widget_Framework()->has_double_sidebars() ) {
			if ( 'tribe_events' === get_post_type( $c_page_id ) ) {
				$sidebar_1_width = Avada()->settings->get( 'ec_sidebar_2_1_width' );
				$sidebar_2_width = Avada()->settings->get( 'ec_sidebar_2_2_width' );
			} else {
				$sidebar_1_width = Avada()->settings->get( 'sidebar_2_1_width' );
				$sidebar_2_width = Avada()->settings->get( 'sidebar_2_2_width' );
			}
		} elseif ( ! AWB_Widget_Framework()->has_sidebar() && ( is_page_template( 'side-navigation.php' ) || ( is_singular( 'tribe_events' ) && 'sidebar' === Avada()->settings->get( 'ec_meta_layout' ) ) ) ) {
			if ( 'tribe_events' === get_post_type( $c_page_id ) ) {
				$sidebar_1_width = Avada()->settings->get( 'ec_sidebar_width' );
			} else {
				$sidebar_1_width = Avada()->settings->get( 'sidebar_width' );
			}
		}

		$body_font_size      = 16;
		$real_body_font_size = Avada()->settings->get( 'body_typography', 'font-size' );
		if ( 'px' === Fusion_Sanitize::get_unit( $real_body_font_size ) ) {
			$body_font_size = (int) $real_body_font_size;
		}

		if ( 0 != $sidebar_1_width ) {
			$sidebar_1_width = Fusion_Sanitize::number( Fusion_Sanitize::units_to_px( $sidebar_1_width, $body_font_size, $site_width ) );
		}

		if ( 0 != $sidebar_2_width ) {
			$sidebar_2_width = Fusion_Sanitize::number( Fusion_Sanitize::units_to_px( $sidebar_2_width, $body_font_size, $site_width ) );
		}

		$columns = 1;
		if ( $site_width && $sidebar_1_width && $sidebar_2_width ) {
			$columns = 3;
		} elseif ( $site_width && $sidebar_1_width ) {
			$columns = 2;
		}

		$gutter = ( 1 < $columns ) ? 80 : 0;

		// If we're not using calc() and we've got more than 1 columns, get the gutter from theme-options.
		if ( $gutter && false === strpos( Avada()->settings->get( 'sidebar_gutter' ), 'calc' ) ) {

			// Only single sidebar user single sidebar gutter.
			if ( 2 === $columns ) {
				$gutter = Fusion_Sanitize::number( Fusion_Sanitize::units_to_px( Avada()->settings->get( 'sidebar_gutter' ), $body_font_size, $site_width ) );
			} elseif ( 3 === $columns ) {
				$gutter = Fusion_Sanitize::number( Fusion_Sanitize::units_to_px( Avada()->settings->get( 'dual_sidebar_gutter' ), $body_font_size, $site_width ) );
			}
		}

		// If dual sidebar, we need to multiply gutter by 2.
		if ( 3 === $columns ) {
			$gutter = $gutter * 2;
		}

		self::$content_width = $site_width - $sidebar_1_width - $sidebar_2_width - $gutter;

		return self::$content_width;
	}

	/**
	 * Checks is the current page is a 100% width page.
	 *
	 * @param bool          $value   The value from the filter.
	 * @param integer|false $page_id A custom page ID.
	 * @return bool
	 */
	public function is_hundred_percent_template( $value = false, $page_id = false ) {
		if ( ! $page_id ) {
			$page_id = fusion_library()->get_page_id();
		}

		$page_template = '';

		if ( Fusion_Helper::is_woocommerce() ) {
			$custom_fields = get_post_custom_values( '_wp_page_template', $page_id );
			$page_template = ( is_array( $custom_fields ) && ! empty( $custom_fields ) ) ? $custom_fields[0] : '';
		}
		if ( 'tribe_events' === get_post_type( $page_id ) && function_exists( 'tribe_get_option' ) && '100-width.php' === tribe_get_option( 'tribeEventsTemplate', 'default' ) ) {
			$page_template = '100-width.php';
		}

		if ( 'fusion_template' === get_post_type( $page_id ) && ( empty( fusion_data()->post_meta( $page_id )->get( 'blog_width_100' ) ) || 'yes' === fusion_data()->post_meta( $page_id )->get( 'blog_width_100' ) ) ) {
			$page_template = '100-width.php';
		}

		if (
			'100%' === fusion_library()->get_option( 'site_width' ) ||
			( is_page_template( '100-width.php' ) && $page_id ) ||
			is_page_template( 'blank.php' ) ||
			( '100-width.php' === $page_template && $page_id ) ||
			( fusion_get_option( 'portfolio_width_100' ) && is_singular( 'avada_portfolio' ) ) ||
			( fusion_get_option( 'blog_width_100' ) && is_singular( 'post' ) ) ||
			( fusion_get_option( 'product_width_100' ) && is_singular( 'product' ) ) ||
			(
				is_numeric( $page_id ) &&
				! in_array( get_post_type( $page_id ), [ 'product', 'post', 'avada_portfolio' ], true ) &&
				'yes' === fusion_data()->post_meta( $page_id )->get( 'blog_width_100' )
			)
		) {
			return true;
		}
		return false;
	}

	/**
	 * Determine if the current wrapper is 100%-wide or not.
	 *
	 * @access public
	 * @return bool
	 */
	public function is_current_wrapper_hundred_percent() {
		if ( apply_filters( 'fusion_is_hundred_percent_template', false ) ) {
			global $fusion_fwc_type;

			if ( ! isset( $fusion_fwc_type ) || ( isset( $fusion_fwc_type ) && is_array( $fusion_fwc_type ) && ( empty( $fusion_fwc_type ) || 'fullwidth' === $fusion_fwc_type['content'] ) ) ) {
				return true;
			}
		}
		return false;
	}
}

/* Omit closing PHP tag to avoid "Headers already sent" issues. */
