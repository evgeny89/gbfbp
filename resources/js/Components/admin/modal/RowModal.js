import React from "react";
import CheckBox from './CheckBox';
import Text from './Text';
import IdText from './IdText';
import Select from './Select';

const RowModal = (props) => {
  /**
   * Возвращает нужный компонент согласно полученного типа
   * @param {text} type тип компонента который должен вернуть данный компонент
   * @param {text} text текст выводящий описание для поля инпута или селекта
   * @param {text} name текст подставляемы в аргумент name инпута или селекта
   * @param {text} value текст подставляемый в значение аргумента value инпута или селекта
   * @param {array} selectAll массив объектов для построения списка тегов <option></option>
   * @returns {Component} возвращает компонент на основании полученного значения типа
   */
  const createComponents = ({type, text, name, value, selectAll}) => {
    switch (type) {
      case 'idText' : 
        return <IdText text={text} name={name} value={value}/>
      case 'check' : 
        return <CheckBox text={text} name={name} value={value}/>
      case 'text' : 
        return <Text text={text} name={name} value={value}/>
      case 'select' :
        return <Select text={text} name={name} value={value} selectAll={selectAll} />
    }
  }
  
  return createComponents(props.data);
}

export default RowModal;
