<?php
/**
 * Avada Options.
 *
 * @author     ThemeFusion
 * @copyright  (c) Copyright by ThemeFusion
 * @link       https://theme-fusion.com
 * @package    Avada
 * @subpackage Core
 * @since      7.9
 */

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

/**
 * Maintenance
 *
 * @since 7.9
 * @param array $sections An array of our sections.
 * @return array
 */
function avada_options_section_maintenance( $sections ) {
	$user_roles = AWB_Maintenance_Mode()->get_user_role_names();
	$templates  = AWB_Maintenance_Mode()->get_library_templates();

	$sections['maintenance'] = [
		'label'    => esc_html__( 'Maintenance Mode', 'Avada' ),
		'id'       => 'heading_maintenance',
		'priority' => 26,
		'icon'     => 'el-icon-off',
		'alt_icon' => 'fusiona-power-off',
		'fields'   => [
			'maintenance_mode'         => [
				'label'       => esc_html__( 'Mode', 'Avada' ),
				'description' => esc_html__( 'Set your site to Maintenance Mode to take it offline temporarily (status code 503), or to Coming Soon mode (status code 200), taking it offline until it is ready to be launched.', 'Avada' ),
				'id'          => 'maintenance_mode',
				'default'     => '',
				'type'        => 'radio-buttonset',
				'choices'     => [
					''            => esc_html__( 'Off', 'Avada' ),
					'maintenance' => esc_html__( 'Maintenance', 'Avada' ),
					'coming_soon' => esc_html__( 'Coming Soon', 'Avada' ),
				],
			],
			'maintenance_redirect_url' => [
				'label'       => esc_html__( 'URL Redirect', 'Avada' ),
				'description' => esc_html__( 'If set, this option will redirect users without access to the URL given. Enter with protocol (e.g. https://).', 'Avada' ),
				'id'          => 'maintenance_redirect_url',
				'default'     => '',
				'type'        => 'text',
				'required'    => [
					[
						'setting'  => 'maintenance_mode',
						'operator' => '!=',
						'value'    => '',
					],
				],
			],
			'maintenance_template'     => [
				'label'       => esc_html__( 'Page Template', 'Avada' ),
				'description' => esc_html__( 'Select an Avada Library template for the Maintenance or Coming Soon page.', 'Avada' ),
				'id'          => 'maintenance_template',
				'default'     => '0',
				'type'        => 'select',
				'choices'     => $templates['titles'],
				'quick_edit'  => [
					'label' => esc_html__( 'Edit Template', 'Avada' ),
					'type'  => 'template',
					'items' => $templates['permalinks'],
				],
				'required'    => [
					[
						'setting'  => 'maintenance_mode',
						'operator' => '!=',
						'value'    => '',
					],
					[
						'setting'  => 'maintenance_redirect_url',
						'operator' => '=',
						'value'    => '',
					],                  
				],
			],
			'maintenance_user_roles'   => [
				'label'       => esc_html__( 'User Roles For Access', 'Avada' ),
				'description' => __( 'Select the user roles that should be able to access the site when. <strong>NOTE:</strong> Administrators will always have access.', 'Avada' ),
				'id'          => 'maintenance_user_roles',
				'default'     => '',
				'type'        => 'select',
				'multi'       => true,
				'choices'     => $user_roles,
				'required'    => [
					[
						'setting'  => 'maintenance_mode',
						'operator' => '!=',
						'value'    => '',
					],
				],
			],
			'maintenance_exclude'      => [
				'label'       => esc_html__( 'Exclude', 'Avada' ),
				'description' => esc_html__( 'Exclude parts of your site like feed, pages, or archives from Maintenance or Coming Soon mode. Add one slug per line.', 'Avada' ),
				'id'          => 'maintenance_exclude',
				'default'     => '',
				'type'        => 'textarea',
				'required'    => [
					[
						'setting'  => 'maintenance_mode',
						'operator' => '!=',
						'value'    => '',
					],
				],
			],
			'maintenance_page_title'   => [
				'label'       => esc_html__( 'Page Title HTML Tag', 'Avada' ),
				'description' => esc_html__( 'This will also be used in the default page template. Leave empty for default title.', 'Avada' ),
				'id'          => 'maintenance_page_title',
				'default'     => '',
				'type'        => 'text',
				'required'    => [
					[
						'setting'  => 'maintenance_mode',
						'operator' => '!=',
						'value'    => '',
					],
					[
						'setting'  => 'maintenance_redirect_url',
						'operator' => '=',
						'value'    => '',
					],
				],
			],
			'maintenance_robots_meta'  => [
				'label'       => esc_html__( 'Robots Meta Tag', 'Avada' ),
				'description' => esc_html__( 'Decide whether the Maintenance or Coming Soon page should get indexed by search engines.', 'Avada' ),
				'id'          => 'maintenance_robots_meta',
				'default'     => 'noindex',
				'type'        => 'radio-buttonset',
				'choices'     => [
					'index'   => esc_html__( 'Index/Follow', 'Avada' ),
					'noindex' => esc_html__( 'Noindex/Nofollow', 'Avada' ),
				],
				'required'    => [
					[
						'setting'  => 'maintenance_mode',
						'operator' => '!=',
						'value'    => '',
					],
					[
						'setting'  => 'maintenance_redirect_url',
						'operator' => '=',
						'value'    => '',
					],
				],
			],
		],
	];

	return $sections;

}
