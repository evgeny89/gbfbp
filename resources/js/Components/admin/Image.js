import React from 'react';

const Image = (props) => {
  const { text } = props;
  return (
    <div className="image-wrapper">
      <img className="image-row" src={text ? text : '/images/svg/camera-img.svg'}/>
    </div>
  )
};

export default Image;
