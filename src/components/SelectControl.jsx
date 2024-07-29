const SelectControl = ({ name, id, options = ['hi', 'hello'] }) => {

	return <select name={name} id={id}>
		{ options.map((value) => {
			<options value={value}>{value}</options>
		})
		}
	</select>
};

export default SelectControl;