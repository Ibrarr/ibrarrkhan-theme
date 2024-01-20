<?php

add_filter('document_title_separator', 'ibrarrkhan_document_title_separator');
function ibrarrkhan_document_title_separator($sep) {
	$sep = esc_html('|');
	return $sep;
}

add_filter('the_title', 'ibrarrkhan_title');
function ibrarrkhan_title($title) {
	if ($title == '') {
		return esc_html('...');
	} else {
		return wp_kses_post($title);
	}
}

function ibrarrkhan_schema_type() {
	$schema = 'https://schema.org/';
	if (is_single()) {
		$type = "Article";
	} elseif (is_author()) {
		$type = 'ProfilePage';
	} elseif (is_search()) {
		$type = 'SearchResultsPage';
	} else {
		$type = 'WebPage';
	}
	echo 'itemscope itemtype="' . esc_url($schema) . esc_attr($type) . '"';
}

add_filter('nav_menu_link_attributes', 'ibrarrkhan_schema_url', 10);
function ibrarrkhan_schema_url($atts) {
	$atts['itemprop'] = 'url';
	return $atts;
}

add_filter('the_content_more_link', 'ibrarrkhan_read_more_link');
function ibrarrkhan_read_more_link() {
	if (!is_admin()) {
		return ' <a href="' . esc_url(get_permalink()) . '" class="more-link">' . sprintf(__('...%s', 'ibrarrkhan'), '<span class="screen-reader-text">  ' . esc_html(get_the_title()) . '</span>') . '</a>';
	}
}

add_filter('excerpt_more', 'ibrarrkhan_excerpt_read_more_link');
function ibrarrkhan_excerpt_read_more_link($more) {
	if (!is_admin()) {
		global $post;
		return ' <a href="' . esc_url(get_permalink($post->ID)) . '" class="more-link">' . sprintf(__('...%s', 'ibrarrkhan'), '<span class="screen-reader-text">  ' . esc_html(get_the_title()) . '</span>') . '</a>';
	}
}

add_filter('big_image_size_threshold', '__return_false');
add_filter('intermediate_image_sizes_advanced', 'ibrarrkhan_image_insert_override');
function ibrarrkhan_image_insert_override($sizes) {
	unset($sizes['medium_large']);
	unset($sizes['1536x1536']);
	unset($sizes['2048x2048']);
	return $sizes;
}

add_filter('get_comments_number', 'ibrarrkhan_comment_count', 0);
function ibrarrkhan_comment_count($count) {
	if (!is_admin()) {
		global $id;
		$get_comments = get_comments('status=approve&post_id=' . $id);
		$comments_by_type = separate_comments($get_comments);
		return count($comments_by_type['comment']);
	} else {
		return $count;
	}
}

add_filter( 'acf/load_field/name=contact_form', 'acf_populate_gf_forms_ids' );
function acf_populate_gf_forms_ids( $field ) {
	if ( class_exists( 'GFFormsModel' ) ) {
		$choices = [];

		foreach ( \GFFormsModel::get_forms() as $form ) {
			$choices[ $form->id ] = $form->title;
		}

		$field['choices'] = $choices;
	}

	return $field;
}