<?php
/**
 * Plugin Name: Bra Size Converter
 * Plugin URI: https://example.com
 * Description: Converts bra sizes from letter format (A, B, C, etc.) to numeric format (1, 2, 3, etc.).
 * Version: 1.0
 * Author: Your Name
 * Author URI: https://yourwebsite.com
 */

if (!defined('ABSPATH')) {
    exit; // Prevent direct access
}

// include the plugin files
require_once plugin_dir_path(__FILE__) . 'functions.php';
require_once plugin_dir_path(__FILE__) . 'js-scripts.php';
require_once plugin_dir_path(__FILE__) . 'ajax.php';
require_once plugin_dir_path(__FILE__) . 'admin-page.php';
require_once plugin_dir_path(__FILE__) . 'short-codes.php';