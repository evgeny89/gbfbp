import React from 'react';

const CreateButtons = (props) => {
  const { columns, textRoutes, setActive, roleUsers, setData } = props;

  const viewModal = () => {
    setData({columns, textRoutes, roleUsers});
    setActive(true);
  }
  return <div className="admin-button-create" onClick={viewModal}></div>
}

export default CreateButtons;