import React, { useState, useEffect } from 'react';

const Text = ({name, value, text}) => {
  const [ val, setVal] = useState(value);
  const changeValue = (e) => {
    setVal(e.target.value);
  };
  useEffect(() => {
    setVal(value);
  }, [value]);
  return (
    <>
      <label className="modal-text" htmlFor={name}>{text}:</label>
      <input id={name} name={name} value={val} onChange={changeValue} className="modal-input-text"/>
    </>
    
  )
}

export default Text;