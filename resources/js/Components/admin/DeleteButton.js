import React from "react";

const DeleteButton = (props) => {
  //let { published } = props;
  const deleteData = (props) => {
    //TODO реазилуй функцию вызова попап окна для удаления или не нужно попап?
  }
  return (
    <div className="admin-button-delete" onClick={deleteData}>
      <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg" className="admin-button-delete__cross">
        <path d="M1.96875 1.96875L16.0312 16.0312" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round"/>
        <path d="M1.96875 16.0312L16.0312 1.96875" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round"/>
      </svg>
    </div>
    
  );
}

export default DeleteButton;