import React from "react";

const EditButton = (props) => {
  const { data } = props;
  const {setActive, columns, entries, textRoutes, setData, roleUsers} = data;
  
  const createModal = () => {
    setData({columns, entries, textRoutes, roleUsers});
    setActive(true);
  }
  return (
    <div className="admin-button-edit" onClick={createModal}>
      <div className="admin-button-edit__point"></div>
      <div className="admin-button-edit__point"></div>
      <div className="admin-button-edit__point"></div>
    </div>
    
  );
}

export default EditButton;