<?php
/**
 * sponsorlink Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package sponsorlink
 * @since 1.0.0
 */

/**
 * Define Constants
 */
define( 'CHILD_THEME_SPONSORLINK_VERSION', '1.0.0' );

/**
 * Enqueue styles
 */
function child_enqueue_styles() {

	wp_enqueue_style( 'sponsorlink-theme-css', get_stylesheet_directory_uri() . '/style.css', array('astra-theme-css'), CHILD_THEME_SPONSORLINK_VERSION, 'all' );

}

add_action( 'wp_enqueue_scripts', 'child_enqueue_styles', 15 );

// 1. Add custom fields to variation edit screen
add_action('woocommerce_product_after_variable_attributes', 'add_sponsorship_tier_fields', 10, 3);
function add_sponsorship_tier_fields($loop, $variation_data, $variation) {
    woocommerce_wp_text_input(array(
        'id' => '_tier_benefits[' . $variation->ID . ']',
        'label' => __('Sponsorship Benefits', 'woocommerce'),
        'desc_tip' => true,
        'description' => __('List the benefits for this sponsorship tier (comma separated).', 'woocommerce'),
        'value' => get_post_meta($variation->ID, '_tier_benefits', true)
    ));
}

// 2. Save custom fields
add_action('woocommerce_save_product_variation', 'save_sponsorship_tier_fields', 10, 2);
function save_sponsorship_tier_fields($variation_id, $i) {
    if (isset($_POST['_tier_benefits'][$variation_id])) {
        update_post_meta($variation_id, '_tier_benefits', sanitize_text_field($_POST['_tier_benefits'][$variation_id]));
    }
}

///////////////
// DASHBOARD //
///////////////

if ( ! defined('ABSPATH') ) { exit; }

if ( ! defined('SL_DASHBOARD_PAGE_SLUG') ) {
    define('SL_DASHBOARD_PAGE_SLUG', 'user-dashboard'); // Define the dashboard slug as a constant. If we rename the page, change the slug in here.
}

// Create an array with all files to be included. Just add a file path here and it will be loaded automatically by the loop bellow the array.
$sl_includes = [
	
	// General includes

    '/includes/helpers.php',
    '/includes/enqueue-scripts.php',
	
	// Dashboard includes

    '/includes/dashboard/dashboard-shortcode.php',
    '/includes/dashboard/dashboard-ajax.php',
	
	// Ultimate Member includes will be added in the future.
];

// A loop that loads each relative path from the array and converts it into and absolute path ($rel_path -> $path). Using file_exists keeps errors from showing up if a file has not been created yet.
foreach ($sl_includes as $rel_path) {
    $path = get_stylesheet_directory() . $rel_path;
    if ( file_exists($path) ) {
        require_once $path;
    }
}




