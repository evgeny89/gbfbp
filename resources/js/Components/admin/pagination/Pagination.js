import React from 'react';
import NumberElem from './NumberElem';
import MiddleElem from './MiddleElem';

const Pagination = (props) => {
  const {number, setNumber, countNumber} = props;
  const paginationArr = [];
  const viewNum = 4;
  let indActive = null;
  for (let i = 0; i < countNumber; i++) {
    if (i + 1 !== number) {
      paginationArr.push({number: i + 1, active: false, type: "numElem"}); 
    } else {
      paginationArr.push({number: i + 1, active: true, type: "numElem"});
      indActive = i;
    }
  }

  if (paginationArr.length > viewNum) {
    let lnArr = paginationArr.length;
    if (indActive < viewNum) {
      paginationArr[viewNum].type = "pointElem";
      paginationArr.splice(viewNum + 1, lnArr);
    } else if (indActive >= lnArr - viewNum) {
      paginationArr[lnArr - viewNum - 1].type = "pointElem";
      if (indActive - viewNum <= 0) {
        paginationArr[lnArr - viewNum - 1].number = 1;
      } else if (indActive - viewNum >= viewNum) {
        paginationArr[lnArr - viewNum - 1].number -= (viewNum - 1);
      } 
      paginationArr.splice(0, lnArr - viewNum - 1);
    } else {
      paginationArr[indActive - 1].type = "pointElem";
      if (indActive - viewNum < 0) {
        paginationArr[indActive - 1].number = 1;
      } else if (indActive - viewNum >= viewNum) {
        paginationArr[indActive - 1].number -= (viewNum - 1);
      } else if (indActive - viewNum > 1) {
        paginationArr[indActive - 1].number = viewNum + 1;
      }
      paginationArr.splice(0, indActive - 1);

      paginationArr[viewNum + 1].type = "pointElem";
      paginationArr.splice(viewNum + 2, lnArr);
    }
  }
    
  return (
    <div className="pagination-content">
      {paginationArr.map((el, ind) => {
        if (el.type === "numElem") {
          return <NumberElem number={el.number} active={el.active} setNumber={setNumber} key={ind + 1} />
        } else {
          return <MiddleElem number={el.number} setNumber={setNumber} key={ind + 1}/>
        }
      })}
    </div>
  )
};

export default Pagination;
