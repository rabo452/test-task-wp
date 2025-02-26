<?php 

// AJAX Handler function to process the bra size conversion request
function bra_size_ajax_handler() {
    // Verify the AJAX request using the security nonce to prevent unauthorized access
    check_ajax_referer('bra_size_nonce', 'security');

    // Retrieve the bra size from the AJAX request, ensuring it is set
    $size = isset($_POST['size']) ? $_POST['size'] : '';
    // Sanitize the input and convert it to uppercase for consistency
    $size = strtoupper(sanitize_text_field($size));

    // Send the JSON response with the converted bust size
    wp_send_json(['bustSize' => convert_bra_size($size)]);
}

// Register the AJAX handler for logged-in users
add_action('wp_ajax_convert_bra_size', 'bra_size_ajax_handler');

// Register the AJAX handler for non-logged-in users
add_action('wp_ajax_nopriv_convert_bra_size', 'bra_size_ajax_handler');
