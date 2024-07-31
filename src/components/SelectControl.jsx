const SelectControl = ({ id, name, label, options, onChange }) => {

	return <div className='flex flex-col mb-4 mt-4 max-w-md'>
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