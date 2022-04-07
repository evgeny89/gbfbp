import React from "react";

const EditButton = (props) => {
  //let { published } = props;
  const editData = () => {
    //TODO реазилуй функцию вызова попап окна для редактирования
  }
  return (
    <div className="admin-button-edit" onClick={editData}>
      <div className="admin-button-edit__point"></div>
      <div className="admin-button-edit__point"></div>
      <div className="admin-button-edit__point"></div>
    </div>
    
  );
}

export default EditButton;