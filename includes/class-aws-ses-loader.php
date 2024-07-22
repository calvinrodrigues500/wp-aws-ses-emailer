<?php

/**
 * WP AWS SES emailer.
 *
 * @package wp-aws-ses-emailer
 */

namespace Calvin\WpAwsSesEmailer;

defined('ABSPATH') || die;

class Loader {

	/**
	 * Class instance.
	 *
	 * @var Loader
	 */
	public static $instance;

	/**
	 * Class loader.
	 */
	public function __construct() {
		$this->init();
	}

	/**
	 * Instance loader.
	 */
	public static function instance() {

		if (null === self::$instance) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	public function init() {
		\Dotenv\Dotenv::createImmutable(WP_AWS_SES_EMAILER_PLUGIN_DIR_URL)->load();
		\Calvin\WpAwsSesEmailer\Admin\EmailerSettingsMenu::instance();
	}
}
