<?php
/**
 * Upgrades Handler.
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
 * Handle migrations for Avada 7.9
 *
 * @since 7.9
 */
class Avada_Upgrade_790 extends Avada_Upgrade_Abstract {

	/**
	 * The version.
	 *
	 * @access protected
	 * @since 7.2
	 * @var string
	 */
	protected $version = '7.9.0';

	/**
	 * An array of all available languages.
	 *
	 * @static
	 * @access private
	 * @since 7.9
	 * @var array
	 */
	private static $available_languages = [];

	/**
	 * The actual migration process.
	 *
	 * @access protected
	 * @since 7.9
	 * @return void
	 */
	protected function migration_process() {
		$available_languages       = Fusion_Multilingual::get_available_languages();
		self::$available_languages = ( ! empty( $available_languages ) ) ? $available_languages : [ '' ];

		$this->migrate_options();
	}

	/**
	 * Migrate options.
	 *
	 * @since 7.9
	 * @access protected
	 */
	protected function migrate_options() {
		$available_langs = self::$available_languages;

		$options = get_option( $this->option_name, [] );
		$options = $this->add_link_hover_color( $options );
		$options = $this->migrate_legacy_widget_option( $options );
		$options = $this->migrate_social_sharing_padding( $options );
		$options = $this->migrate_tabs_mobile_breakpoint( $options );

		update_option( $this->option_name, $options );

		foreach ( $available_langs as $language ) {

			// Skip langs that are already done.
			if ( '' === $language ) {
				continue;
			}

			$options = get_option( $this->option_name . '_' . $language, [] );
			$options = $this->add_link_hover_color( $options );
			$options = $this->migrate_legacy_widget_option( $options );
			$options = $this->migrate_social_sharing_padding( $options );
			$options = $this->migrate_tabs_mobile_breakpoint( $options );

			update_option( $this->option_name . '_' . $language, $options );
		}
	}

	/**
	 * Sets link hover color option.
	 *
	 * @access private
	 * @since 7.9
	 * @param array $options The Global Options array.
	 * @return array         The updated Global Options array.
	 */
	private function add_link_hover_color( $options ) {
		if ( isset( $options['primary_color'] ) ) {
			$options['link_hover_color'] = $options['primary_color'];
		}

		return $options;
	}

	/**
	 * Migrate the legacy widget option.
	 *
	 * @access private
	 * @since 7.9
	 * @param array $options The Global Options array.
	 * @return array         The updated Global Options array.
	 */
	private function migrate_legacy_widget_option( $options ) {
		$options['status_widget_areas'] = '1';

		return $options;
	}

	/**
	 * Migrate the social sharing padding option.
	 *
	 * @access private
	 * @since 7.9
	 * @param array $options The Global Options array.
	 * @return array         The updated Global Options array.
	 */
	private function migrate_social_sharing_padding( $options ) {

		$margin_top    = ! empty( $options['h4_typography']['margin-top'] ) ? $options['h4_typography']['margin-top'] : '0px';
		$margin_bottom = ! empty( $options['h4_typography']['margin-bottom'] ) ? $options['h4_typography']['margin-bottom'] : '0px';

		$options['social_sharing_padding'] = [
			'top'    => $margin_top,
			'right'  => '20px',
			'bottom' => $margin_bottom,
			'left'   => '20px',
		];

		return $options;
	}

	/**
	 * Migrate Tabs breakpoint option.
	 *
	 * @access private
	 * @since 7.0
	 * @param array $options The Global Options array.
	 * @return array         The updated Global Options array.
	 */
	private function migrate_tabs_mobile_breakpoint( $options ) {
		if ( isset( $options['content_break_point'] ) ) {
			$header_position   = isset( $options['header_position'] ) ? $options['header_position'] : 'top';
			$side_header_width = isset( $options['side_header_width'] ) ? $options['side_header_width'] : 280;
			$side_header_width = 'top' === $header_position ? 0 : $side_header_width;

			$old_breakpoint = (int) $options['content_break_point'] + (int) $side_header_width;
			$medium_break   = isset( $options['visibility_medium'] ) ? (int) $options['visibility_medium'] : 1024;
			$small_break    = isset( $options['visibility_small'] ) ? (int) $options['visibility_small'] : 640;

			if ( abs( $old_breakpoint - $medium_break ) > abs( $old_breakpoint - $small_break ) ) {
				$options['tabs_mobile_breakpoint'] = 'small';
			} else {
				$options['tabs_mobile_breakpoint'] = 'medium';
			}
		}
		return $options;
	}
}
