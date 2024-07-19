<?php

/**
 * AWS SES Emailer Admin Settings Menu.
 *
 * @package wp-ses-aws-emailer
 */

namespace Calvin\WpAwsSesEmailer\Admin;

defined('ABSPATH') || die;

class EmailerSettingsMenu {

	/**
	 * Instance.
	 *
	 * @var EmailerSettingsMenu
	 */
	private static $instance;

	/**
	 * Page title.
	 *
	 * @var string
	 */
	protected $page_title;

	/**
	 * Menu title.
	 *
	 * @var string
	 */
	protected $menu_title;

	/**
	 * Menu capability.
	 *
	 * @var string
	 */
	private $menu_capability = 'manage_options';

	/**
	 * Menu slug.
	 *
	 * @var string
	 */
	protected $menu_slug = 'wp_aws_ses_emailer_settings';

	/**
	 * Emailer settings constructor.
	 */
	public function __construct() {
		$this->page_title = __('AWS SES Settings', 'wp-aws-ses-emailer');
		$this->menu_title = __('AWS SES Emailer Settings', 'wp-aws-ses-emailer');
		add_action('admin_menu', array($this, 'aws_ses_emailer_settings_page'));
	}

	/**
	 * Load instance.
	 */
	public static function instance() {

		if (null == self::$instance) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * Add admin menu.
	 */
	public function aws_ses_emailer_settings_page() {
		add_options_page(
			$this->page_title,
			$this->menu_title,
			$this->menu_capability,
			$this->menu_slug,
			array($this, 'render_view')
		);
	}

	/**
	 * Render page view.
	 */
	public function render_view() {
		echo "<h1>Hello Settings</h1>";
	}
}
