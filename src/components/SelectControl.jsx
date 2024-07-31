const SelectControl = ({ id, name, label, options, onChange }) => {

	options = ['hi', 'hello'];

	return <select
		name={name}
		id={id}
		className='px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent w-10'
	>
		{ options.map((value) => {
			return <option value={value}>{value}</option>
		})
		}
	</select>
};

export default SelectControl;