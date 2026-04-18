<?php
/**
 * Plugin Name: Easy Content Restriction for Elementor
 * Description: Restrict your content simply with just 1 click. Professional content restriction with glassmorphism blur effect.
 * Version: 1.0.1
 * Author: Shifkat
 * Author URI: https://shifkat.com
 * Text Domain: easy-content-restriction
 */

if ( ! defined( 'ABSPATH' ) ) exit;

define( 'ECR_PATH', plugin_dir_path( __FILE__ ) );
define( 'ECR_URL', plugin_dir_url( __FILE__ ) );

require_once ECR_PATH . 'includes/controls.php';
require_once ECR_PATH . 'includes/filter-logic.php';

// Load the CSS
add_action( 'wp_enqueue_scripts', function() {
    wp_enqueue_style( 'ecr-style', ECR_URL . 'assets/css/premium-ui.css', [], '1.0' );
});

// Allow iFrame loading
add_action( 'login_init', function() {
    header_remove( 'X-Frame-Options' );
    header( 'X-Frame-Options: SAMEORIGIN' );
});