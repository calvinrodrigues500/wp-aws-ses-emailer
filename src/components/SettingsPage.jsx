import { __ } from '@wordpress/i18n';
import { InputControl } from './';

const SettingsPage = () => {
	return <>
		<div className='mb-5'>
			<h2 className='font-semibold text-lg'> {__('AWS Configuration', 'wp-aws-ses-emailer')} </h2>
		</div>
		<hr />
		<InputControl
			id='aws-ses-access-key-id'
			name='aws-ses-access-key-id'
			label='Access Key ID'
		/>
		<InputControl
			id='aws-ses-secret-access-key'
			name='aws-ses-secret-access-key'
			label='Secret Access Key'
		/>
		<InputControl
			id='aws-ses-region'
			name={'aws-ses-region'}
			label='Region'
			type='email'
		/>
		<button type='submit' className='bg-slate-800 text-slate-200 px-6 py-3 font-semibold text-md rounded-md'>
			Save
		</button>
	</>
};

export default SettingsPage;