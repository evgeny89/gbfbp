import React, { useState, useEffect } from "react";

const CheckBox = (props) => {
  let { name, value, text } = props;
  const [val, setVal] = useState(value);
  let classSpan = `admin-input-new ${Number(val) ? "check" : ''}`;
  
  /**
   * Добавляет или удаляет тегу <span></span> класс 'check' 
   * @param {object} e объект события передаются при клике на тег <span></span>
   */
  const changeCheckBox = (e) => {
    val ? e.target.classList.remove('check') : e.target.classList.add('check');
    setVal(Number(!val));
  };
  useEffect(() => {
    setVal(value);
  }, [value]);
  return (
    <>
    <label className="modal-text" htmlFor={name}>{text}</label>
    <div className="admin-div-input_modal">
      <input id={name} type="checkbox" name={name}  value={val} className="admin-input" defaultChecked={ val ? true : false }/>
      <span className={classSpan} onClick={changeCheckBox}></span>
    </div>
    </>
  );
}

export default CheckBox;