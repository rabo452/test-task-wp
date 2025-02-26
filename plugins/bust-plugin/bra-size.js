jQuery(document).ready(function($) {
    // Wait for the DOM to be fully loaded before executing the script
    $('#bra-size-form').on('submit', function(e) {
        e.preventDefault(); // Prevent the default form submission behavior

        // Get the value entered in the input field
        let size = $('#bra-size-input').val();
        
        // Retrieve the security nonce for validation
        let security = $('#bra_size_security').val();
        
        // Select the element where the conversion result will be displayed
        let resultBlock = $('#bra-size-result');
        
        // Send an AJAX POST request to the WordPress backend
        $.post(braSizeAjax.ajaxurl, { // Uses the localized script variable 'braSizeAjax' for the AJAX URL
            action: 'convert_bra_size', // Action name for handling the request in PHP
            size, // The bra size input value
            security // Security nonce for verification
        })
        .then(res => 
            // Display the conversion result or an error message if the input is invalid
            resultBlock.text(res.bustSize && Number.isInteger(res.bustSize) 
                ? `Размер бюстгалтера: ${res.bustSize}` // If a valid bust size is returned
                : 'Недопустимый размер.' // If the input size is invalid
            )
        );
    });
});
