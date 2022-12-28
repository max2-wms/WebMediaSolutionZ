<?php
/**
 * Page Metabox options.
 *
 * @author     ThemeFusion
 * @copyright  (c) Copyright by ThemeFusion
 * @link       https://theme-fusion.com
 * @package    Avada
 * @subpackage Core
 */

/**
 * Page page settings
 *
 * @param array $sections An array of our sections.
 * @return array
 */
function avada_page_options_tab_page( $sections ) {
	$override = function_exists( 'Fusion_Template_Builder' ) ? Fusion_Template_Builder()->get_override( 'content' ) : false;
	$override = ( $override && 'global' === $override->ID ) ? false : $override;

	$page_bg_color = Fusion_Color::new_color(
		[
			'color'    => Avada()->settings->get( 'bg_color' ),
			'fallback' => '#ffffff',
		]
	);

	$sections['page'] = [
		'label'    => esc_html__( 'Layout', 'Avada' ),
		'id'       => 'page',
		'alt_icon' => 'fusiona-file',
		'fields'   => [],
	];

	// Template override, add notice.
	if ( $override && 'fusion_template' !== get_post_type() ) {
		$sections['page']['fields']['page_override_info'] = [
			'id'          => 'content_info',
			'label'       => '',
			/* translators: The edit link. Text of link is the title. */
			'description' => '<div class="fusion-redux-important-notice">' . Fusion_Template_Builder()->get_override_text( $override, 'content' ) . '</div>',
			'dependency'  => [],
			'type'        => 'custom',
		];
		return $sections;
	}

	$sections['page']['fields']['layout'] = [
		'id'          => 'layout',
		'label'       => esc_attr__( 'Layout', 'Avada' ),
		'choices'     => [
			'default' => esc_attr__( 'Default', 'Avada' ),
			'wide'    => esc_attr__( 'Wide', 'Avada' ),
			'boxed'   => esc_attr__( 'Boxed', 'Avada' ),
		],
		/* translators: Additional description (defaults). */
		'description' => sprintf( esc_attr__( 'Select boxed or wide layout. %s', 'Avada' ), Avada()->settings->get_default_description( 'layout', '', 'select' ) ),
		'dependency'  => [],
		'type'        => 'radio-buttonset',
		'default'     => 'default',
	];

	// Background page options.
	$sections['page']['fields']['bg_color']  = [
		'id'          => 'bg_color',
		'label'       => esc_attr__( 'Background Color For Page', 'Avada' ),
		/* translators: Additional description (defaults). */
		'description' => sprintf( esc_html__( 'Controls the background color for the page. When the color value is set to anything below 100&#37; opacity, the color will overlay the background image if one is uploaded. Hex code, ex: #000. %s', 'Avada' ), Avada()->settings->get_default_description( 'bg_color' ) ),
		'dependency'  => [],
		'default'     => $page_bg_color->color,
		'type'        => 'color-alpha',
	];
	$sections['page']['fields']['bg_image']  = [
		'id'          => 'bg_image',
		'label'       => esc_attr__( 'Background Image For Page', 'Avada' ),
		'alpha'       => true,
		/* translators: Additional description (defaults). */
		'description' => sprintf( esc_attr__( 'Select an image to use for a full page background. %s', 'Avada' ), Avada()->settings->get_default_description( 'bg_image', 'url' ) ),
		'dependency'  => [],
		'type'        => 'media',
	];
	$sections['page']['fields']['bg_full']   = [
		'id'          => 'bg_full',
		'label'       => esc_attr__( '100% Background Image', 'Avada' ),
		/* translators: Additional description (defaults). */
		'description' => sprintf( esc_html__( 'Choose to have the background image display at 100&#37;. %s', 'Avada' ), Avada()->settings->get_default_description( 'bg_full', '', 'yesno' ) ),
		'choices'     => [
			'default' => esc_attr__( 'Default', 'Avada' ),
			'no'      => esc_attr__( 'No', 'Avada' ),
			'yes'     => esc_attr__( 'Yes', 'Avada' ),
		],
		'dependency'  => [
			[
				'field'      => 'bg_image',
				'value'      => '',
				'comparison' => '!=',
			],
		],
		'type'        => 'radio-buttonset',
		'map'         => 'yesno',
		'default'     => 'no',
	];
	$sections['page']['fields']['bg_repeat'] = [
		'id'          => 'bg_repeat',
		'label'       => esc_attr__( 'Background Repeat', 'Avada' ),
		/* translators: Additional description (defaults). */
		'description' => sprintf( esc_html__( 'Select how the background image repeats. %s', 'Avada' ), Avada()->settings->get_default_description( 'bg_repeat', '', 'select' ) ),
		'choices'     => [
			'default'   => esc_attr__( 'Default', 'Avada' ),
			'repeat'    => esc_attr__( 'Tile', 'Avada' ),
			'repeat-x'  => esc_attr__( 'Tile Horizontally', 'Avada' ),
			'repeat-y'  => esc_attr__( 'Tile Vertically', 'Avada' ),
			'no-repeat' => esc_attr__( 'No Repeat', 'Avada' ),
		],
		'dependency'  => [
			[
				'field'      => 'bg_image',
				'value'      => '',
				'comparison' => '!=',
			],
		],
		'type'        => 'select',
	];

	
	$sections['page']['fields']['container_hundred_percent_animation'] = [
		'id'          => 'container_hundred_percent_animation',
		'label'       => esc_attr__( 'Container 100% Height Animation', 'Avada' ),
		'description' => sprintf( esc_html__( 'Select the animation of the scrolling transition on 100%% height scrolling sections. %s', 'Avada' ), Avada()->settings->get_default_description( 'container_hundred_percent_animation', '', 'select' ) ),
		'choices'     => [
			''               => esc_html__( 'Default', 'fusion-builder' ),
			'fade'           => esc_html__( 'Fade', 'fusion-builder' ),
			'slide'          => esc_html__( 'Slide', 'fusion-builder' ),
			'stack'          => esc_html__( 'Stack', 'fusion-builder' ),
			'zoom'           => esc_html__( 'Zoom', 'fusion-builder' ),
			'slide-zoom-in'  => esc_html__( 'Slide Zoom In', 'fusion-builder' ),
			'slide-zoom-out' => esc_html__( 'Slide Zoom Out', 'fusion-builder' ),
		],
		'type'        => 'select',
		'transport'   => 'postMessage',
	];

	$sections['page']['fields']['container_hundred_percent_scroll_sensitivity'] = [
		'id'          => 'container_hundred_percent_scroll_sensitivity',
		'label'       => esc_attr__( 'Container 100% Height Scroll Sensitivity', 'Avada' ),
		'description' => esc_html__( 'Controls the sensitivity of the scrolling transition on 100% height scrolling sections. In milliseconds.', 'Avada' ),
		'type'        => 'slider',
		'default'     => Avada()->settings->get( 'container_hundred_percent_scroll_sensitivity' ),
		'choices'     => [
			'min'  => '200',
			'max'  => '1500',
			'step' => '10',
		],
		'transport'   => 'postMessage',
		'dependency'  => [
			[
				'field'      => 'container_hundred_percent_animation',
				'comparison' => '==',
				'value'      => 'fade',
			],
		],
	];

	$sections['page']['fields']['container_hundred_percent_animation_speed'] = [
		'id'          => 'container_hundred_percent_animation_speed',
		'label'       => esc_attr__( 'Container 100% Height Scroll Speed', 'Avada' ),
		'description' => esc_html__( 'Controls the speed of the scrolling transition on 100% height scrolling sections. In milliseconds.', 'Avada' ),
		'type'        => 'slider',
		'default'     => Avada()->settings->get( 'container_hundred_percent_animation_speed' ),
		'choices'     => [
			'min'  => '10',
			'max'  => '2000',
			'step' => '10',
		],
		'transport'   => 'postMessage',
		'dependency'  => [
			[
				'field'      => 'container_hundred_percent_animation',
				'comparison' => '!=',
				'value'      => 'fade',
			],
			[
				'field'      => 'container_hundred_percent_animation',
				'comparison' => '!=',
				'value'      => '',
			],
		],
	];
	$sections['page']['fields']['container_hundred_percent_dots_navigation'] = [
		'id'          => 'container_hundred_percent_dots_navigation',
		'label'       => esc_attr__( 'Container 100% Height Dots Navigation', 'Avada' ),
		'description' => sprintf( esc_html__( 'Enable / Disable the dots navigation for 100%% height containers. Disabling dots navigation may be useful if using custom navigation. %s', 'Avada' ), Avada()->settings->get_default_description( 'container_hundred_percent_dots_navigation', '', 'onoff' ) ),
		'choices'     => [
			'default' => esc_attr__( 'Default', 'Avada' ),
			'on'      => esc_attr__( 'On', 'Avada' ),
			'off'     => esc_attr__( 'Off', 'Avada' ),
		],
		'transport'   => 'postMessage',
		'type'        => 'radio-buttonset',
		'map'         => 'yesno',
		'default'     => 'default',
	];

	return $sections;
}

/* Omit closing PHP tag to avoid "Headers already sent" issues. */
