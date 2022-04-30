import React from 'react';

const IdText = ({name, value, text}) => {
  return (
    <>
      <input id={name} name={name} value={value} readOnly className="modal-input-id"/>
    </>
    
  )
}

export default IdText;