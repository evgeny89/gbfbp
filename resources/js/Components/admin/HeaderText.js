import React from "react";

const HeaderText = (props) => {
  return (
    <p className="admin-header-text">
      {props.text}
      <svg width="20" height="24" viewBox="0 0 20 24"  xmlns="http://www.w3.org/2000/svg" className="admin-header-svg">
        <path d="M14 10H20L10 0L0 10H6V14H0L10 24L20 14H14V10ZM12 16H15L10 21L5 16H8V8H5L10 3L15 8H12V16Z" />
      </svg>
    </p>
  );
}

export default HeaderText;
