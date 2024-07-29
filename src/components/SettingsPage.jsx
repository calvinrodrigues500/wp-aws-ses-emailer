import { __ } from '@wordpress/i18n';
import { InputControl } from './';
import { useState } from '@wordpress/element';
import apiFetch from '@wordpress/api-fetch';

const SettingsPage = () => {

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

		// apiFetch({
		// 	path: 'aws-ses/v1/settings',
		// 	method: 'POST',
		// 	data: formData
		// }).then((response) => {
		// 	console.log('==== ', response)
		// });

		apiFetch({ path: '/wp/v2/posts' })
    .then((posts) => {
        console.log(posts);
    })
    .catch((error) => {
        console.error('Error fetching posts:', error);
    });
		
	};

	return <>
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
		<InputControl
			id='aws-ses-secret-access-key'
			name='awsSesSecretAccessKey'
			label='Secret Access Key'
			onChange={handleFormData}
		/>
		<InputControl
			id='aws-ses-region'
			name='awsSesRegion'
			label='Region'
			onChange={handleFormData}
		/>
		<button type='submit' className='bg-slate-800 text-slate-200 px-6 py-3 font-semibold text-md rounded-md' onClick={saveSettings}>
			{ __('Save', 'wp-aws-ses-emailer') }
		</button>
	</>
};

export default SettingsPage;