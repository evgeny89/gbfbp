import React from "react";
import CheckBox from './CheckBox';
import EmptyBlock from './EmptyBlock';
import HeaderText from './HeaderText';
import EditButton from './EditButton';
import DeleteButton from './DeleteButton';
import Text from './Text';

const RowAdmin = (props) => {
  const createComponents = (type, text, id ) => {
    switch (type) {
      case 'headerText' : 
        return <HeaderText text={text} key={id}/>
      case 'check' : 
        return <CheckBox text={text} key={id}/>
      case 'emptyBlock' :
        return <EmptyBlock key={id}/>
      case 'editButton' :
        return <EditButton text={text} key={id}/>
      case 'deleteButton' :
        return <DeleteButton text={text} key={id}/>
      case 'text' : 
        return <Text text={text} key={id}/>
    }
    
  }
  const {columns } = props;
  
  return columns.map((column, id) =>  createComponents(column.type, column.text, id));
}

export default RowAdmin;