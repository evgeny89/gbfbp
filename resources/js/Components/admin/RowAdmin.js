import React from "react";
import CheckBox from './CheckBox';
import EmptyBlock from './EmptyBlock';
import HeaderText from './HeaderText';
import EditButton from './EditButton';
import DeleteButton from './DeleteButton';
import Text from './Text';

const RowAdmin = (props) => {
  /**
   * Возвращает один из компонентов в зависимости от его типа
   * @param {text} type тип элемента
   * @param {text, object} text даные элемента (текс или объект с данными)
   * @param {number} id ключ для безошибочной отрисовки нескольких компонентов
   * @returns {Component} возвращает компонент на основании полученного значения типа
   */
  const createComponents = (type, text, id ) => {
    switch (type) {
      case 'headerText' : 
        return <HeaderText text={text} key={id}/>
      case 'check' : 
        return <CheckBox text={text} key={id}/>
      case 'emptyBlock' :
        return <EmptyBlock key={id}/>
      case 'editButton' :
        return <EditButton data={text} key={id}/>
      case 'deleteButton' :
        return <DeleteButton data={text} key={id}/>
      case 'text' : 
        return <Text text={text} key={id}/>
    }
  }
  const {columns } = props;
  
  return columns.map((column, id) =>  createComponents(column.type, column.text, id));
}

export default RowAdmin;