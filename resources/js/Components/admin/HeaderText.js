import React, { useState, useEffect } from "react";

const HeaderText = (props) => {
  const { text, name, sortFunc, status } = props;
  const [classSvg, setSvgClass] = useState("admin-header-svg");

  useEffect(() => {
    switch (status) {
      case null :
        setSvgClass("admin-header-svg");
        break;
      case "ASC" :
        setSvgClass("admin-header-svg admin-header-svg_green");
        break;
      case "DESC" :
        setSvgClass("admin-header-svg admin-header-svg_red");
        break;
    }
  }, [status]);
 
  const arrStatusSort = [null, "ASC", "DESC"];
   
  /**
   * Отрабатывает клик по интерактивному элементу сортировки
   */
  const clickSvg = () => {
    let indSort = arrStatusSort.indexOf(status);
    indSort++;
    if (indSort === arrStatusSort.length) {
      indSort = 1;
    }
    sortFunc(name, arrStatusSort[indSort]);
  }

  return (
    <p className="admin-header-text">
      {text}
      <svg width="20" onClick={clickSvg} height="24" viewBox="0 0 20 24"  xmlns="http://www.w3.org/2000/svg" 
          className={classSvg}
      >
        <path d="M14 10H20L10 0L0 10H6V14H0L10 24L20 14H14V10ZM12 16H15L10 21L5 16H8V8H5L10 3L15 8H12V16Z" />
      </svg>
    </p>
  );
}

export default HeaderText;
