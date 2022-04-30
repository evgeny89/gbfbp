import React, { useState, useEffect} from 'react';

const Select = ({ name, value, text, selectAll }) => {
  let [val, setVal] = useState(value);
  const changeOption = (e) => {
    setVal(Number(e.target.value));
  };
  useEffect(() => {
    setVal(value);
  }, [value])
  return (
    <>
      <label className="modal-text" htmlFor={name}>{text}:</label>
      <select id={name} value={val} name={name} className="modal-select" onChange={changeOption}>
        { selectAll.map((item, id) => 
          <option value={item.id} key={id}>
            {item.name}
          </option>)
        }
      </select>
    </>

  )
}

export default Select;







