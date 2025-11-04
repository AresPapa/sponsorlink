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