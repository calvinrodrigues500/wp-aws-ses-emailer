<?php

/**
 * WP AWS SES emailer.
 *
 * @package wp-aws-ses-emailer
 */

namespace Calvin\WpAwsSesEmailer;

use Calvin\WpAwsSesEmailer\Admin\EmailerSettingsMenu;

defined('ABSPATH') || die;

class Loader {

	/**
	 * Class instance.
	 *
	 * @var Loader
	 */
	public static $instance;

	/**
	 * Instance loader.
	 */
	public static function get_instance() {
		if (null === self::$instance) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	public function __construct() {

		error_log('loading');

		new EmailerSettingsMenu();
	}
}
