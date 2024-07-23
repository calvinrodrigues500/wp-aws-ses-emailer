import { __ } from '@wordpress/i18n';

const InputControl = ({ id, name, label, value, onChange, type= 'text' }) => {
	return <div className='flex flex-col mb-4 mt-4 max-w-md'>
		<label
			htmlFor={id}
			className='mb-2 text-sm font-medium text-gray-700'
		>
			{__( label, 'wp-aws-ses-emailer')}
		</label>
		<input
			type={type}
			id={id}
			name={name}
			onChange={onChange}
			value={value}
			className='px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent'
		/>
	</div>
};

export default InputControl;