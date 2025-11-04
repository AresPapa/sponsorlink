<?php
if ( ! defined('ABSPATH') ) { exit; }

add_action('wp_enqueue_scripts', function () {
    if ( ! sl_is_dashboard_request() ) {
        return; // Only load assets when the dashboard is actually in use
    }

    // CSS
    $css_rel = '/assets/css/dashboard.css';
    $css_path = get_stylesheet_directory() . $css_rel;
    wp_enqueue_style(
        'sl-dashboard',
        get_stylesheet_directory_uri() . $css_rel,
        [],
        file_exists($css_path) ? filemtime($css_path) : null
    );

    // JS
    $js_rel = '/assets/js/dashboard.js';
    $js_path = get_stylesheet_directory() . $js_rel;
    wp_enqueue_script(
        'sl-dashboard',
        get_stylesheet_directory_uri() . $js_rel,
        [],
        file_exists($js_path) ? filemtime($js_path) : null,
        true
    );

    // Nonce + Ajax URL
    wp_localize_script('sl-dashboard', 'SL_DASHBOARD_VARS', [
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce'    => wp_create_nonce('sl_dashboard_nonce'),
    ]);
});
