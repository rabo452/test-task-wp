<?php 

// Enqueue JavaScript file
function bra_size_enqueue_scripts() {
    wp_enqueue_script('bra-size-script', plugin_dir_url(__FILE__) . 'bra-size.js', ['jquery'], null, true);
    wp_localize_script('bra-size-script', 'braSizeAjax', [
        'ajaxurl' => admin_url('admin-ajax.php'),
        'security' => wp_create_nonce('bra_size_nonce')
    ]);
}
add_action('wp_enqueue_scripts', 'bra_size_enqueue_scripts');