import { __ } from '@wordpress/i18n';

const Nabvbar = () => {

	return <div className='flex flex-col bg-slate-800 text-slate-200 p-5 w-64 rounded-md'>
		<div className='flex justify-between items-center gap-4'>
			<img src='https://img.icons8.com/fluency/48/confluence.png' alt='Plugin Logo' className='mb-10'/>
			<h2 className='text-slate-200'> { __( 'AWS SES Integration', 'wp-aws-ses-emailer') }</h2>
		</div>
		<ul className='flex flex-col gap-5'>
			<li className='hover:bg-white'>Home</li>
			<li>Settings</li>
			<li>Info</li>
		</ul>
	</div>
};

export default Nabvbar;