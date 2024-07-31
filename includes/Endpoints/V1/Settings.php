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
	 * Settings option name.
	 *
	 * @var string $option_name
	 */
	private $option_name = 'wp_aws_ses_emailer_settings';

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
					'permission_callback'	=> array($this, 'check_permission'),
					'args'		=> array(
						'awsSesAccessKeyId'	=> array(
							'required'		=> true,
							'description'	=> __('AWS Access Key ID associated with the IAM user.', 'wp-aws-ses-emailer'),
							'type'			=> 'string',
							'sanitize_callback'		=> array(__CLASS__, 'sanitize_data')
						),
						'awsSesSecretAccessKey'	=> array(
							'required'			=> true,
							'description'		=> __('AWS Secret Key ID associated with the IAM user.', 'wp-aws-ses-emailer'),
							'type'				=> 'string',
							'sanitize_callback'	=> array(__CLASS__, 'sanitize_data')
						),
						'awsSesRegion'			=> array(
							'required'			=> true,
							'description'		=> __('AWS region', 'wp-aws-ses-emalier'),
							'type'				=> 'string',
							'sanitize_callback'	=> array(__CLASS__, 'sanitize_data')
						)
					),
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

		$params = $request->get_params();
		extract($params);

		if (empty($awsSesAccessKeyId) || empty($awsSesSecretAccessKey)) {
			wp_send_json_error(
				array(
					'message'	=> __('Missing access key or secret access key', 'wp-aws-ses-emailer')
				),
				400
			);
		}

		update_option($this->option_name, array(
			'access_key'		=> $awsSesAccessKeyId,
			'secret_access_key'	=> $awsSesSecretAccessKey,
			'aws_region'		=> $awsSesRegion
		));
	}

	/**
	 * Sanitze input.
	 *
	 * @param mixed.
	 */
	public static function sanitize_data($data) {
		return $data; //@todo Add sanitization.
	}
}
