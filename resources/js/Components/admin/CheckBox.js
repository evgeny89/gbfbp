import React from "react";
const CheckBox = (props) => {
  let { text } = props;
  return (
    <div className="admin-div-input">
      <input  type="checkbox" className="admin-input" disabled />
      <span className={`admin-input-new ${Number(text) ? "check" : ''}`}></span>
    </div>
    
  );
}

export default CheckBox;
