import React, {useEffect, useState} from "react";
import axios from 'axios';
import RowAdmin from './RowAdmin';
import Modal from "./Modal";
const AppAdmin = (props) => {
  
  let data = JSON.parse(props.dataadmin);
  const [dataAdmin, setDataAdmin] = useState(data);
  let [modalActive, setModalActive] = useState(false);
  const [dataInModal, setDataInModal] = useState(undefined);
  const countRows = dataAdmin.entries.length + 1;
  const countColumns = dataAdmin.columns.length;
 console.log(dataAdmin);

  /**
   * Формирует массив объектов с данными для построения заголовков таблицы, 
   * в которой отображается информация
   * @param dataAdmin from backend
   * @returns array with header table admin
   */
  const getHeaderColumns = (columns) => {
    const headerColumns = columns.map((item) => {
      const column = {...item};
      column.type = 'headerText';
      return column;
    });
    
    headerColumns.unshift({'name': 'edit', 'text': null, 'type': 'emptyBlock'});
    headerColumns.push({'name': "delete", 'text': null, 'type': 'emptyBlock'});
    return headerColumns; 
  }

  /**
   * Удаляет строку из таблицы (и из БД)
   * @param {string} stringReq 
   * @param {string} id 
   * @returns void
   */
  const deleteData = async (stringReq, id = null) => {
    let stringGet = '';
    if (id) {
      stringGet = stringReq.replace('=id=', id);
    }
    let result = null;
    await axios.post(stringGet)
      .then((data) => {result = data.data.result}) 
      .catch((error) => console.error(error));
    
    if (result) {
      setDataAdmin({...dataAdmin, 'entries': dataAdmin.entries.filter((elem) => elem.id !== Number(id))});
    }
  } 

  /**
   * Изменяет (добавляет) значения данных в таблце, после успешного их изменения 
   * (добавления) в базе данных
   * @param {object} elemData объект с данными измененной (созданной) сущности
   */
  const actionAfter = (elemData) => { 
    if (elemData.id) {
      setDataAdmin({...dataAdmin, 'entries': dataAdmin.entries.map((el) => {
        if (el.id === elemData.id) {
          if (el.role) {
            el.role.id = elemData.role_id;
            let newRole = dataAdmin.roleUsers.filter((item) => item.id === Number(elemData.role_id))[0]['name'];
            el.role.name = newRole;
          }
          return Object.assign(el, elemData);
        }
        return el;
      })});
        
    }
    
  };

  /**
   * Преобразует данные полученные из БД в массив объектов для построчного отображения
   * сущностей (и инструментов для работы над ними) полученных из базы данных
   * @param dataAdmin from backend
   * @returns array with table admin data
   */
   const getRowsData = (dataAdmin) => {
    const rowsDataColumns = [];
    for (let i = 0; i < dataAdmin.entries.length; i++) {
      const entry = dataAdmin.entries[i];
      const rowsElem = [];
      if (dataAdmin.buttons.edit === true) {
        rowsElem.push({
          'name': 'edit', 
          'text': {
              'entries': entry, 
              'columns': dataAdmin.columns,
              'textRoutes': dataAdmin.routes.edit,
              'setActive': setModalActive,
              'setData': setDataInModal,
              'roleUsers': dataAdmin.roleUsers ? dataAdmin.roleUsers : null,
          }, 
          'type': 'editButton'
        });
      } else {
        rowsElem.push({'name': 'edit', 'text': null, 'type': 'emptyBlock'});
      }
      for (let j = 0; j < dataAdmin.columns.length; j++) {
        const column = dataAdmin.columns[j];
        const sectionRow = {
          'name': column.name,
          'type': column.type, 
          'text': column.relation ? entry[column.name][column.relation] : entry[column.name],
        };
        rowsElem.push(sectionRow);
      }
      if (dataAdmin.buttons.delete === true) {
        rowsElem.push({'name': 'delete', 'text': {'id': entry.id, 'text': dataAdmin.routes.delete, 'deleteData': deleteData }, 'type': 'deleteButton'});
      } else {
        rowsElem.push({'name': 'delete', 'text': null, 'type': 'emptyBlock'}); 
      }
      rowsDataColumns.push(rowsElem);
    }
    return rowsDataColumns; 
  }
  
  let headerColumns = getHeaderColumns(dataAdmin.columns);
  let dataRows = getRowsData(dataAdmin);
  return (
    <>
      <h3 className="admin-right-title">{dataAdmin.title}</h3>
      <section className="admin-right-table" style={{"gridTemplateRows": `repeat(${countRows}, 1fr)`, "gridTemplateColumns": `69px repeat(${countColumns}, auto) 69px`}}>
        <RowAdmin columns={headerColumns}/>
        <>
          {dataRows.map((dataRow, id) => <RowAdmin columns={dataRow} key={id}/>)}
        </>
      </section>
      <Modal active={modalActive} setActive={setModalActive} data={dataInModal} setData={setDataAdmin} actionAfter={actionAfter} />
    </>
  )
}

export default AppAdmin;