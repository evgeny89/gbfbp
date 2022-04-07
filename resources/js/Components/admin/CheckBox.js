import React from "react";

const CheckBox = (props) => {
  let { text } = props;
  return (
    <div className="admin-div-input">
      <input  type="checkbox" className="admin-input" disabled defaultChecked={ text ? true : false }/>
      <span className="admin-input-new">
        
      </span>
    </div>
    
  );
}

export default CheckBox;