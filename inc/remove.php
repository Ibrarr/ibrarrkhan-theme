<?php

add_filter('use_block_editor_for_post', '__return_false', 10);

/**
 * Remove default tag taxonomy
 */
add_action('init', 'remove_taxonomy');
function remove_taxonomy(){
	unregister_taxonomy_for_object_type('post_tag', 'post');
}

/**
 * Remove comments
 */
add_action('admin_init', 'disable_comments_support');
function disable_comments_support() {
	// Post types for which to disable comments
	$post_types = get_post_types();
	foreach ($post_types as $post_type) {
		if(post_type_supports($post_type, 'comments')) {
			remove_post_type_support($post_type, 'comments');
			remove_post_type_support($post_type, 'trackbacks');
		}
	}
}