import React from 'react';

const MiddleElem = (props) => {
  const {number, setNumber} = props;
  const clickElem = () => {
    setNumber(number);
  }
  return(
    <div className="middle-elem" onClick={clickElem}>
      <div className="middle-point"></div>
      <div className="middle-point"></div>
      <div className="middle-point"></div>
    </div>
  )
};

export default MiddleElem;
