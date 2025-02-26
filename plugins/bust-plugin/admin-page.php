<?php

// Admin Menu Page
function bra_size_admin_menu() {
    // Adds a new admin menu page to the WordPress dashboard
    add_menu_page(
        'Bra Size Converter', // Page title displayed in the browser tab
        'Bra Size Converter', // Menu title displayed in the WordPress admin menu
        'manage_options', // Capability required to access this page (admin only)
        'bra-size-converter', // Menu slug (unique identifier for the page)
        'bra_size_admin_page', // Function that renders the page content
        'dashicons-calculator' // Icon for the menu item in the admin dashboard
    );
}
// Hooks the function to the 'admin_menu' action to add the menu page
add_action('admin_menu', 'bra_size_admin_menu');

// Enqueue JavaScript file for admin page
function bra_size_admin_enqueue_scripts($hook) {
    // Ensures the script is only loaded on the specific admin page
    if ($hook !== 'toplevel_page_bra-size-converter') {
        return;
    }
    // Enqueue the JavaScript file for handling conversions
    wp_enqueue_script('bra-size-script', plugin_dir_url(__FILE__) . 'bra-size.js', ['jquery'], null, true);
    
    // Localizes script to pass PHP variables to JavaScript
    wp_localize_script('bra-size-script', 'braSizeAjax', [
        'ajaxurl' => admin_url('admin-ajax.php'), // URL for AJAX requests
        'security' => wp_create_nonce('bra_size_nonce') // Nonce for security verification
    ]);
}
// Hooks the function to enqueue scripts only when the admin page is loaded
add_action('admin_enqueue_scripts', 'bra_size_admin_enqueue_scripts');

// Admin Page Content
function bra_size_admin_page() {
    ?>
    <div class="wrap">
        <h1>Bra Size Converter</h1>
        <p>Введите буквенный размер бюстгальтера (A-J), чтобы получить числовое значение.</p>
        
        <!-- Form for bra size conversion -->
        <form id="bra-size-form" method="post">
            <!-- Input field for the user to enter a bra size -->
            <input type="text" id="bra-size-input" name="bra_size" placeholder="Введите размер (A-J)" required>
            
            <!-- Submit button to trigger conversion -->
            <button type="submit">Конвертировать</button>
            
            <!-- Placeholder to display the conversion result -->
            <p id="bra-size-result"></p>
            
            <!-- Security nonce for form validation -->
            <?php wp_nonce_field('bra_size_nonce', 'bra_size_security'); ?>
        </form>
    </div>
    <?php
}
?>
