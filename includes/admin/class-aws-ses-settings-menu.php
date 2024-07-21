<?php

/**
 * AWS SES Emailer Admin Settings Menu.
 *
 * @package wp-ses-aws-emailer
 */

namespace Calvin\WpAwsSesEmailer\Admin;

use GMP;

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

		add_action('admin_enqueue_scripts', array($this, 'aws_ses_emailer_scripts') );
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
	 * Initialize page scripts.
	 */
	public function aws_ses_emailer_scripts() {

		wp_enqueue_script(
			'wp-aws-ses-emailer',
			WP_AWS_SES_EMAILER_PLUGIN_DIR_URL . 'build/index.js',
			array('react', 'wp-element', 'wp-components'),
			WP_AWS_SES_PLUGIN_VERSION,
			true
		);

		// Since adding tailwind is affecting other WP pages, enqueuing it only for the plugin settings page.
		if ( !isset($_GET) || !isset( $_GET['page']) || $_GET['page'] !== 'wp_aws_ses_emailer_settings') {
			return;
		}

		wp_enqueue_style(
			'wp-aws-ses-emailer-styles',
			WP_AWS_SES_EMAILER_PLUGIN_DIR_URL . 'build/style.css',
			array(),
			WP_AWS_SES_PLUGIN_VERSION
		);
	}

	/**
	 * Render page view.
	 */
	public function render_view() {
		echo "<div class='wrap' id='wp-aws-ses-emailer-settings'>heya</div>";
	}
}
