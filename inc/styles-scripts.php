<?php

function add_custom_scripts()
{
	wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;700;900&display=swap', false);
	wp_enqueue_style('site', IBRARR_TEMPLATE_URI.'/dist/css/app.css', [], filemtime(  IBRARR_TEMPLATE_DIR.'/dist/css/app.css' ), 'all');

	wp_enqueue_script('site', IBRARR_TEMPLATE_URI.'/dist/js/app.js', ['jquery'], filemtime(  IBRARR_TEMPLATE_DIR.'/dist/js/app.js' ), true);
	wp_localize_script( 'site', 'frontendajax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
}
add_action('wp_enqueue_scripts', 'add_custom_scripts');