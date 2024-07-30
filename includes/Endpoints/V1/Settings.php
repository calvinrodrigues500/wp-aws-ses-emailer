<?php

/**
 * Plugin settings API.
 */

namespace Calvin\WpAwsSesEmailer\Endpoints\V1;

defined('ABSPATH') || exit;

use WP_REST_Server;

class Settings {

	/**
	 * Namespace.
	 *
	 * @since 1.0.0
	 * 
	 * @var string namespace
	 */
	protected $namepsace = 'aws-ses/v1';

	/**
	 * Class instance.
	 *
	 * @var Settings
	 */
	private static $instance;

	/**
	 * Settings endpoint.
	 * 
	 * @since 1.0.0
	 * 
	 * @var string $endpoint
	 */
	protected $endpoint = 'settings';

	/**
	 * Settings constructor.
	 */
	public function __construct() {
		add_action('rest_api_init', array($this, 'register_routes'));
	}

	/**
	 * Get class instance.
	 */
	public static function instance() {

		if ( null === self::$instance ) {
			self::$instance = new Settings();
		}

		return self::$instance;
	}

	/**
	 * Register route.
	 */
	public function register_routes() {

			register_rest_route(
				$this->namepsace,
				$this->endpoint,
				array(
					array(
						'methods'	=> WP_REST_Server::CREATABLE,
						'callback'	=> array($this, 'save_settings'),
						'permission_callback'	=> array($this, 'check_permission')
					)
				)
			);
	}

	/**
	 * Permission check.
	 */
	public function check_permission() {
		return __return_true();
	}

	/**
	 * Save settings.
	 */
	public function save_settings($request) {
		error_log('saving '.print_r($request,1));
	}
}
