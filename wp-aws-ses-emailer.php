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

require __DIR__ . '/vendor/autoload.php';

add_action('plugins_loaded', function() {
	\Calvin\WpAwsSesEmailer\Loader::get_instance();
});
