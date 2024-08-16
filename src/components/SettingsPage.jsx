import { __ } from '@wordpress/i18n';
import { InputControl, SelectControl } from './';
import { useState } from '@wordpress/element';
import apiFetch from '@wordpress/api-fetch';

const SettingsPage = () => {

	const { awsRegions } = window?.wp_aws_ses_data;

	const [formData, setFormData] = useState({
		awsSesAccessKeyId: '',
		awsSesSecretAccessKey: '',
		awsSesRegion: ''
	});

	const handleFormData = (event) => {
		const { name, value } = event.target;
		setFormData({
			...formData,
			[name]: value
		});
	};

	const saveSettings = () => {

		console.log('====')

		apiFetch({
			path: '/wp-json/aws-ses/v1/settings',
			method: 'POST',
			data: formData
		}).then((response) => {
			console.log('==== ', response)
		});

		// apiFetch.use((options, next) => {
		// 	console.log('apiFetch options:', options);
		// 	return next(options);
		// });

	};

	return <div className='flex flex-col gap-4'>
		<div className='bg-white p-4 rounded-md'>
			<div className='mb-5'>
				<h2 className='font-semibold text-lg'> {__('AWS Configuration', 'wp-aws-ses-emailer')} </h2>
			</div>
			<hr />
			<InputControl
				id='aws-ses-access-key-id'
				name='awsSesAccessKeyId'
				label='Access Key ID'
				onChange={handleFormData}
			/>
			<a href="#">Get AWS Access Key ID</a>
			<InputControl
				id='aws-ses-secret-access-key'
				name='awsSesSecretAccessKey'
				label='Secret Access Key'
				onChange={handleFormData}
			/>
			<a href="#">Get AWS Secret Access Key</a>
			<SelectControl
				id='aws-ses-region'
				name='awsSesRegion'
				label='Region'
				onChange={handleFormData}
				options={awsRegions}
			/>
			<hr />
			<br />
			<button type='submit' className='bg-slate-800 text-slate-200 px-6 py-3 font-semibold text-md rounded-md' onClick={saveSettings}>
				{__('Save', 'wp-aws-ses-emailer')}
			</button>
		</div>

		<div className='bg-white p-4 rounded-md'>
			<div className='mb-5'>
				<h2 className='font-semibold text-lg'> {__('Sender Configuration', 'wp-aws-ses-emailer')} </h2>
			</div>
			<hr />
			<InputControl
				id='aws-ses-from--email'
				name='fromEmail'
				label='From Email'
				onChange={handleFormData}
			/>
			<InputControl
				id='aws-ses-from-name'
				name='awsSesFromName'
				label='From Name'
				onChange={handleFormData}
			/>
			<SelectControl
				id='aws-ses-region'
				name='awsSesRegion'
				label='Region'
				onChange={handleFormData}
				options={awsRegions}
			/>
			<hr />
			<br />
			<button type='submit' className='bg-slate-800 text-slate-200 px-6 py-3 font-semibold text-md rounded-md' onClick={saveSettings}>
				{__('Save', 'wp-aws-ses-emailer')}
			</button>
		</div>
	</div>
};

export default SettingsPage;