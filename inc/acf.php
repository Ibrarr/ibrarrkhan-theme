<?php

add_action( 'acf/save_post', 'update_author_to_acf_field', 20 );
function update_author_to_acf_field( $post_id ) {
	$user = get_field( 'author', $post_id );
	if ( $user ) {
		wp_update_post( array( 'ID' => $post_id, 'post_author' => $user['ID'] ) );
	}
}

add_filter( 'acf/settings/save_json', 'my_acf_json_save_point' );
function my_acf_json_save_point( $path ) {
	return IBRARR_TEMPLATE_DIR . '/acf-json';
}

add_filter( 'acf/json/save_file_name', 'custom_acf_json_filename', 10, 3 );
function custom_acf_json_filename( $filename, $post, $load_path ) {
	$filename = str_replace(
		array(
			' ',
			'_',
		),
		array(
			'-',
			'-'
		),
		$post['title']
	);

	$filename = strtolower( $filename ) . '.json';

	return $filename;
}

add_filter( 'acf/settings/load_json', 'my_acf_json_load_point' );
function my_acf_json_load_point( $paths ) {
	// Remove the original path (optional).
	unset( $paths[0] );

	// Append the new path and return it.
	$paths[] = IBRARR_TEMPLATE_DIR . '/acf-json';

	return $paths;
}