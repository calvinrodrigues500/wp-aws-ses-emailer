<?php

/**
 * AWS SES emailer constants.
 *
 * @package wp-aws-ses-emailer
 */

namespace Calvin\WpAwsSesEmailer\Helpers;

defined('ABSPATH') || die;

class Constants {

	public static $aws_regions = array(
		'us-east-2' => 'US East (Ohio)',
		'us-virgin'			=> 'US East (N. Virginia)',
		'us-west'			=> 'US West (N. California)'
	);
}


