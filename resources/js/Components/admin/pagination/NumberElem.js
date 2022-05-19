import React from 'react';

const NumberElem = (props) => {
  const {active, setNumber, number} = props;
  const clickElem = () => {
    setNumber(number);
  }
  return(
    <div onClick={clickElem} className={active ? "number-elem number-elem_active": "number-elem"}>{number}</div>
  )
};

export default NumberElem;
