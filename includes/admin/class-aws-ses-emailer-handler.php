<?php
/**
 * AWS SES Email Handler.
 *
 * @package wp-aws-ses-emailer
 */

namespace Calvin\WpAwsSesEmailer\Admin;

defined('ABSPATH') || die;

use Aws\S3\S3Client;
use Aws\Credentials\Credentials;
use Exception;

class EmailHandler {

	public function __construct() {

		$credentials = new Credentials(
			$_ENV['AWS_ACCESS_KEY_ID'],
			$_ENV['AWS_SECRET_ACCESS_KEY']
		);

		$s3Client = new S3Client([
			'region'	=> 'us-west-2',
			'version'	=> '2006-03-01',
			'credentials'	=> $credentials
		]);



		//Listing all S3 Bucket
		// try {
		// 	$buckets = $s3Client->listBuckets();

		// 	error_log('buckets '.print_r($buckets,1));

		// 	foreach ($buckets['Buckets'] as $bucket) {
		// 		error_log( '----bucket '.print_r( $bucket['Name'] . "\n", 1));
		// 	}

		// }catch (Exception $e) {
		// 	error_log('Exception-------------  '. print_r($e->getMessage(),1));
		// }
	}



}
