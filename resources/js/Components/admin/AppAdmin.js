import React, {useEffect, useState} from "react";
import RowAdmin from './RowAdmin';
const AppAdmin = (props) => {
  
  let dataAdmin = JSON.parse(props.dataadmin);
  const countRows = dataAdmin.entries.length + 1;
  
  /**
   * @param dataAdmin from backend
   * @returns array with header table admin
   */
  const getHeaderColumns = (columns) => {
    const headerColumns = [];
    for (let i = 0; i < columns.length; i++) {
      headerColumns.push({...columns[i]});
      if (headerColumns[i].type === 'text') {
        headerColumns[i].type = 'headerText';
      }
      if (headerColumns[i].type === 'check') {
        headerColumns[i].type = 'headerText';
      }
    }
    headerColumns.unshift({'name': 'edit', 'text': null, 'type': 'emptyBlock'});
    headerColumns.push({'name': "delete", 'text': null, 'type': 'emptyBlock'});
    return headerColumns; 
  }

  /**
   * @param dataAdmin from backend
   * @returns array with table admin data
   */
   const getRowsData = (dataAdmin) => {
    const rowsDataColumns = [];
    for (let i = 0; i < dataAdmin.entries.length; i++) {
      const rowsElem = [];
      if (dataAdmin.buttons.edit === true) {
        rowsElem.push({'name': 'edit', 'text': null, 'type': 'editButton'}); //TODO доделай передачу нужных параметров в кнопку 
      } else {
        rowsElem.push({'name': 'edit', 'text': null, 'type': 'emptyBlock'});
      }
      for (let j = 0; j < dataAdmin.columns.length; j++) {
        const sectionRow = {
          'name': dataAdmin.columns[j].name,
          'type': dataAdmin.columns[j].type, 
          'text': dataAdmin.entries[i][dataAdmin.columns[j].name] || dataAdmin.entries[i].role_id //TODO убери когда будет приходить роль
        };
        rowsElem.push(sectionRow);
      }
      if (dataAdmin.buttons.delete === true) {
        rowsElem.push({'name': 'delete', 'text': null, 'type': 'deleteButton'}); //TODO доделай передачу нужных параметров в кнопку 
      } else {
        rowsElem.push({'name': 'delete', 'text': null, 'type': 'emptyBlock'}); //TODO доделай передачу нужных параметров в кнопку 
      }
      rowsDataColumns.push(rowsElem);
    }
    return rowsDataColumns; 
  }

  let headerColumns = getHeaderColumns(dataAdmin.columns);
  let dataRows = getRowsData(dataAdmin);
  console.log(dataAdmin, headerColumns, dataRows);

  return (
    <>
      <h3 className="admin-right-title">{dataAdmin.title}</h3>
      <section className="admin-right-table" style={{"gridTemplateRows": `repeat(${countRows}, 1fr)`}}>
        <RowAdmin columns={headerColumns}/>
        <>
          {dataRows.map((dataRow, id) => <RowAdmin columns={dataRow} key={id}/>)}
        </>
      </section>
    </>
  )
}

export default AppAdmin;