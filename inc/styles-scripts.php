<?php

function add_custom_scripts()
{
	wp_enqueue_style('site', IBRARR_TEMPLATE_URI.'/dist/css/app.css', [], filemtime(  IBRARR_TEMPLATE_DIR.'/dist/css/app.css' ), 'all');

	wp_enqueue_script('header', IBRARR_TEMPLATE_URI.'/dist/js/header.js', ['jquery'], filemtime(  IBRARR_TEMPLATE_DIR.'/dist/js/header.js' ), true);

	if ( is_front_page() ) {
		wp_enqueue_script( 'homepage', IBRARR_TEMPLATE_URI . '/dist/js/homepage.js', [ 'jquery' ], filemtime( IBRARR_TEMPLATE_DIR . '/dist/js/homepage.js' ), true );
		wp_localize_script( 'homepage', 'frontendajax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
	}
}
add_action('wp_enqueue_scripts', 'add_custom_scripts');