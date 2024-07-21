<?php

/**
 * Plugin Name: WP AWS SES Integration
 * Plugin URI: https://calvinrodrigues.in
 * Description: AWS SES Integration for WordPress
 * Version: 1.0.0
 * Requires PHP 7.4
 * Author: Calvin Rodrigues
 * Author URI: https://calvinrodrigues.in
 */

defined('ABSPATH') || die;

// Autoload classes.
require __DIR__ . '/vendor/autoload.php';

// Plugin Version.
defined('WP_AWS_SES_PLUGIN_VERSION') || define('WP_AWS_SES_PLUGIN_VERSION', '1.0.0');

// Plugin DIR URL.
defined('WP_AWS_SES_EMAILER_PLUGIN_DIR_URL') || define('WP_AWS_SES_EMAILER_PLUGIN_DIR_URL', plugin_dir_url(__FILE__));

// Load classes.
add_action('plugins_loaded', function() {
	\Calvin\WpAwsSesEmailer\Loader::instance();
});
