<?php
if ( ! defined('ABSPATH') ) { exit; }

// Helpers are prefixed (sl) to avoid collisions.

// Only define the function if it doesn't exist alerady. Define it if it doesn't (sl_is_dashboard_request).
if ( ! function_exists('sl_is_dashboard_request') ) {
    function sl_is_dashboard_request(): bool {
		
		// If in wp_admin, do not treat it as a front-end dashboard request
        if ( is_admin() ) return false;

        // Detect page by slug or shortcode
        if ( function_exists('is_page') && is_page(SL_DASHBOARD_PAGE_SLUG) ) {
            return true;
        }

		// If the current page also contains [sl_user_dashboard], also treat is as a dashboard
        global $post;
        if ( $post instanceof WP_Post ) {
            return has_shortcode($post->post_content ?? '', 'sl_user_dashboard');
        }

        return false;
    }
}
