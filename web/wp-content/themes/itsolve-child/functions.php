<?php 

add_action( 'wp_enqueue_scripts', 'itsolve_enqueue_styles' );
function itsolve_enqueue_styles() {
    wp_enqueue_style( 'itsolve-parent-style', get_template_directory_uri() . '/style.css' );

}