<?php
/**
 * Fusion Template Metabox options.
 *
 * @author     ThemeFusion
 * @copyright  (c) Copyright by ThemeFusion
 * @link       https://theme-fusion.com
 * @package    Avada
 * @subpackage Core
 */

/**
 * Footer page settings.
 *
 * @param array $sections An array of our sections.
 * @return array
 */
function avada_page_options_tab_fusion_template( $sections ) {

	$sections['fusion_template'] = [
		'label'    => esc_html__( 'Template', 'Avada' ),
		'id'       => 'fusion_template',
		'alt_icon' => 'fusiona-template',
		'fields'   => [
			'live_header' => [
				'id'          => 'live_header',
				'label'       => esc_html__( 'Show Header in Live Editor', 'Avada' ),
				'choices'     => [
					'yes' => esc_attr__( 'Yes', 'Avada' ),
					'no'  => esc_attr__( 'No', 'Avada' ),
				],
				'description' => esc_html__( 'Choose to show or hide the header in Live Editor.', 'Avada' ),
				'type'        => 'radio-buttonset',
				'map'         => 'yesno',
				'default'     => 'no',
			],
			'live_ptb'    => [
				'id'          => 'live_ptb',
				'label'       => esc_html__( 'Show Page Title Bar in Live Editor', 'Avada' ),
				'choices'     => [
					'yes' => esc_attr__( 'Yes', 'Avada' ),
					'no'  => esc_attr__( 'No', 'Avada' ),
				],
				'description' => esc_html__( 'Choose to show or hide the page title bar in Live Editor.', 'Avada' ),
				'type'        => 'radio-buttonset',
				'map'         => 'yesno',
				'default'     => 'no',
			],
			'live_footer' => [
				'id'          => 'live_footer',
				'label'       => esc_html__( 'Show Footer in Live Editor', 'Avada' ),
				'choices'     => [
					'yes' => esc_attr__( 'Yes', 'Avada' ),
					'no'  => esc_attr__( 'No', 'Avada' ),
				],
				'description' => esc_html__( 'Choose to show or hide the footer in Live Editor.', 'Avada' ),
				'type'        => 'radio-buttonset',
				'map'         => 'yesno',
				'default'     => 'no',
			],
		],
	];

	return $sections;
}

/* Omit closing PHP tag to avoid "Headers already sent" issues. */
