<?php
if ( ! defined('ABSPATH') ) { exit; }

// AJAX loader for sections (logged-in only)
add_action('wp_ajax_sl_load_dashboard_section', function () {
    if ( ! is_user_logged_in() ) {
        wp_send_json_error(['message' => 'Not logged in'], 401);
    }

    // Nonce check
    $nonce = $_POST['nonce'] ?? '';
    if ( ! wp_verify_nonce($nonce, 'sl_dashboard_nonce') ) {
        wp_send_json_error(['message' => 'Bad nonce'], 403);
    }

    $section = isset($_POST['section']) ? sanitize_key($_POST['section']) : '';
    $allowed = ['overview', 'profile', 'negotiations', 'settings'];

    if ( ! in_array($section, $allowed, true) ) {
        wp_send_json_error(['message' => 'Invalid section'], 400);
    }

    $file = get_stylesheet_directory() . '/includes/dashboard/sections/' . $section . '.php';
    if ( ! file_exists($file) ) {
        wp_send_json_error(['message' => 'Section missing'], 404);
    }

    ob_start();
    include $file; // section templates are self-contained
    wp_send_json_success(['html' => ob_get_clean()]);
});
