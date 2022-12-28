<?php
/**
 * Content wrappers
 *
 * @author 		WooThemes
 * @package 	Sensei/Templates
 * @version	 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit;

$template = get_option('template');
?>
<div class="sensei-container">
	<section id="content" class="<?php esc_attr_e( apply_filters( 'awb_content_tag_class', '' ) ); ?>" style="<?php esc_attr_e( apply_filters( 'awb_content_tag_style', '' ) ); ?>">
