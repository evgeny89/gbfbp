import React from 'react';

const Image = (props) => {
  const { text, home } = props;
  return (
    <div className="image-wrapper">
      <img className="image-row" src={home ? home : '/images/svg/camera-img.svg'}/>
    </div>
  )
};

export default Image;
