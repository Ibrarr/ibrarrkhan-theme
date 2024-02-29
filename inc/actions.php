<?php

add_action('after_setup_theme', 'ibrarrkhan_setup');
function ibrarrkhan_setup() {
	load_theme_textdomain('ibrarrkhan', get_template_directory() . '/languages');
	add_theme_support('title-tag');
	add_theme_support('post-thumbnails');
	add_theme_support('responsive-embeds');
	add_theme_support('automatic-feed-links');
	add_theme_support('html5', array('search-form', 'navigation-widgets'));
	add_theme_support('woocommerce');
	global $content_width;
	if (!isset($content_width)) {
		$content_width = 1920;
	}
	register_nav_menus(array('main-menu-home' => esc_html__('Main Menu Homepage', 'ibrarrkhan')));
	register_nav_menus(array('main-menu-other' => esc_html__('Main Menu Other Pages', 'ibrarrkhan')));
}

add_action('admin_notices', 'ibrarrkhan_notice');
function ibrarrkhan_notice() {
	$user_id = get_current_user_id();
	$admin_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	$param = (count($_GET)) ? '&' : '?';
	if (!get_user_meta($user_id, 'ibrarrkhan_notice_dismissed_7') && current_user_can('manage_options'))
		echo '<div class="notice notice-info"><p><a href="' . esc_url($admin_url), esc_html($param) . 'dismiss" class="alignright" style="text-decoration:none"><big>' . esc_html__('Ⓧ', 'ibrarrkhan') . '</big></a>' . wp_kses_post(__('<big><strong>📝 Thank you for using ibrarrkhan!</strong></big>', 'ibrarrkhan')) . '<br /><br /><a href="https://wordpress.org/support/theme/ibrarrkhan/reviews/#new-post" class="button-primary" target="_blank">' . esc_html__('Review', 'ibrarrkhan') . '</a> <a href="https://github.com/tidythemes/ibrarrkhan/issues" class="button-primary" target="_blank">' . esc_html__('Feature Requests & Support', 'ibrarrkhan') . '</a> <a href="https://calmestghost.com/donate" class="button-primary" target="_blank">' . esc_html__('Donate', 'ibrarrkhan') . '</a></p></div>';
}

add_action('admin_init', 'ibrarrkhan_notice_dismissed');
function ibrarrkhan_notice_dismissed() {
	$user_id = get_current_user_id();
	if (isset($_GET['dismiss']))
		add_user_meta($user_id, 'ibrarrkhan_notice_dismissed_7', 'true', true);
}

add_action('wp_enqueue_scripts', 'ibrarrkhan_enqueue');
function ibrarrkhan_enqueue() {
	wp_enqueue_style('ibrarrkhan-style', get_stylesheet_uri());
	wp_enqueue_script('jquery');
}

add_action('wp_footer', 'ibrarrkhan_footer');
function ibrarrkhan_footer() {
	?>
	<script>
        jQuery(document).ready(function($) {
            var deviceAgent = navigator.userAgent.toLowerCase();
            if (deviceAgent.match(/(iphone|ipod|ipad)/)) {
                $("html").addClass("ios");
                $("html").addClass("mobile");
            }
            if (deviceAgent.match(/(Android)/)) {
                $("html").addClass("android");
                $("html").addClass("mobile");
            }
            if (navigator.userAgent.search("MSIE") >= 0) {
                $("html").addClass("ie");
            } else if (navigator.userAgent.search("Chrome") >= 0) {
                $("html").addClass("chrome");
            } else if (navigator.userAgent.search("Firefox") >= 0) {
                $("html").addClass("firefox");
            } else if (navigator.userAgent.search("Safari") >= 0 && navigator.userAgent.search("Chrome") < 0) {
                $("html").addClass("safari");
            } else if (navigator.userAgent.search("Opera") >= 0) {
                $("html").addClass("opera");
            }
        });
	</script>
	<?php
}

if (!function_exists('ibrarrkhan_wp_body_open')) {
	function ibrarrkhan_wp_body_open() {
		do_action('wp_body_open');
	}
}

add_action('wp_body_open', 'ibrarrkhan_skip_link', 5);
function ibrarrkhan_skip_link() {
	echo '<a href="#content" class="skip-link screen-reader-text">' . esc_html__('Skip to the content', 'ibrarrkhan') . '</a>';
}

add_action('wp_head', 'ibrarrkhan_pingback_header');
function ibrarrkhan_pingback_header() {
	if (is_singular() && pings_open()) {
		printf('<link rel="pingback" href="%s" />' . "\n", esc_url(get_bloginfo('pingback_url')));
	}
}

add_action('comment_form_before', 'ibrarrkhan_enqueue_comment_reply_script');
function ibrarrkhan_enqueue_comment_reply_script() {
	if (get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}