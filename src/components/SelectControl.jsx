import { __ } from '@wordpress/i18n';

const SelectControl = ({ id, name, label, options, onChange }) => {

	return <div className='flex flex-col mb-4 mt-4 max-w-md'>
		<label
			htmlFor={id}
			className='mb-2 text-sm font-medium text-gray-700'
		>
			{__( label, 'wp-aws-ses-emailer')}
		</label>
		<select
			name={name}
			id={id}
			className='px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent'
		>
			{Object.entries(options).map(([key, value]) => {
				return <option value={key}>{value}</option>
			})
			}
		</select>
	</div>
};

export default SelectControl;