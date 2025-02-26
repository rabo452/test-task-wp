<?php 

// Shortcode Function to display the bra size converter form
function bra_size_shortcode() {
    // Start output buffering to capture HTML content
    ob_start();
    ?>
    
    <!-- Bra Size Conversion Form -->
    <form id="bra-size-form">
        <!-- Input field for user to enter bra size -->
        <input type="text" id="bra-size-input" name="size" placeholder="Введите размер (A-J)" required>
        
        <!-- Button to submit the form -->
        <button type="submit">Конвертировать</button>
        
        <!-- Placeholder to display the conversion result -->
        <p id="bra-size-result"></p>
        
        <!-- Security nonce for form validation -->
        <?php wp_nonce_field('bra_size_nonce', 'bra_size_security'); ?>
    </form>
    
    <?php
    // Return the buffered content and clear the buffer
    return ob_get_clean();
}

// Register the shortcode [convert_bra_size] to display the converter form
add_shortcode('convert_bra_size', 'bra_size_shortcode');
