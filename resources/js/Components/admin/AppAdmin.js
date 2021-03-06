import React, { useState, useEffect} from "react";
import axios from 'axios';
import RowAdmin from './RowAdmin';
import Modal from "./Modal";
import CreateButtons from "./CreateButton";
import Pagination from "./pagination/Pagination";

const AppAdmin = (props) => {
  
  let data = JSON.parse(props.dataadmin);
  const [dataAdmin, setDataAdmin] = useState(data);
  const [sortData, setSortData] = useState(dataAdmin.columns.map((el) => ({name: el.name, sortStatus: null, type: el.type})));
  let [modalActive, setModalActive] = useState(false);
  const [dataInModal, setDataInModal] = useState(undefined);
  const rowsFromPage = 10;
  const [numberPage, setNumberPage] = useState(1);
  const countColumns = dataAdmin.columns.length;
  let countRows = dataAdmin.entries.length + 1;
  
  /**
   * Изменяет стейт касающийся сортировки
   * @param {string} name имя сортируемого столбца 
   * @param {string} sortName - название способа сортировки: null, ASK или DESK
   */
  const sortDataFunc = (name, sortName) => {
    setSortData([...sortData.map((el) => {
      if(el.name !== name) {
        return {
          ...el, 
          sortStatus: null,
        }
      } else {
        return {
          ...el,
          sortStatus: sortName,
        }
      }
    })]);
  }

  /**
   * Сортирует строки для вывода в порядке указанном в стейте для сортировки
   */
  useEffect(() => {
    if(sortData.some((el) => el.sortStatus !== null)) {
      let sortElem = sortData.find((el) => el.sortStatus !== null);
      if (sortElem.name === 'image') {
        if (sortElem.sortStatus === "ASC") {
          setDataAdmin(Object.assign({...dataAdmin}, {entries: [...dataAdmin.entries].sort((a, b) => {
            a[sortElem.name] = a[sortElem.name] === null ? '' : a[sortElem.name];
            b[sortElem.name] = b[sortElem.name] === null ? '' : b[sortElem.name];
            return a[sortElem.name].localeCompare(b[sortElem.name]);
          })}));
          
        } else if (sortElem.sortStatus === "DESC") {
          setDataAdmin(Object.assign({...dataAdmin}, {entries: [...dataAdmin.entries].sort((a, b) => {
            a[sortElem.name] = a[sortElem.name] === null ? '' : a[sortElem.name];
            b[sortElem.name] = b[sortElem.name] === null ? '' : b[sortElem.name];
            return b[sortElem.name].localeCompare(a[sortElem.name])
          })}));
        }
      } else if (sortElem.name === 'role') {
        if (sortElem.sortStatus === "ASC") {
          setDataAdmin(Object.assign({...dataAdmin}, {entries: [...dataAdmin.entries].sort((a, b) => a[sortElem.name].id - b[sortElem.name].id)}));
        } else if (sortElem.sortStatus === "DESC") {
          setDataAdmin(Object.assign({...dataAdmin}, {entries: [...dataAdmin.entries].sort((a, b) => b[sortElem.name].id - a[sortElem.name].id)}));
        }
      } else if (sortElem.name === 'id') {
        if (sortElem.sortStatus === "ASC") {
          setDataAdmin(Object.assign({...dataAdmin}, {entries: [...dataAdmin.entries].sort((a, b) => a[sortElem.name] - b[sortElem.name])}));
        } else if (sortElem.sortStatus === "DESC") {
          setDataAdmin(Object.assign({...dataAdmin}, {entries: [...dataAdmin.entries].sort((a, b) => b[sortElem.name] - a[sortElem.name])}));
        }
      } else if (sortElem.name === 'published') {
        if (sortElem.sortStatus === "ASC") {
          setDataAdmin(Object.assign({...dataAdmin}, {entries: [...dataAdmin.entries].sort((a, b) => a[sortElem.name] - b[sortElem.name])}));
        } else if (sortElem.sortStatus === "DESC") {
          setDataAdmin(Object.assign({...dataAdmin}, {entries: [...dataAdmin.entries].sort((a, b) => b[sortElem.name] - a[sortElem.name])}));
        }
      } else if (sortElem.type === 'text') {
        if (sortElem.sortStatus === "ASC") {
          setDataAdmin(Object.assign({...dataAdmin}, {entries: [...dataAdmin.entries].sort((a, b) => {
            a[sortElem.name] = a[sortElem.name] === null ? '' : a[sortElem.name];
            b[sortElem.name] = b[sortElem.name] === null ? '' : b[sortElem.name];
            return a[sortElem.name].localeCompare(b[sortElem.name]);
          })}));
          
        } else if (sortElem.sortStatus === "DESC") {
          setDataAdmin(Object.assign({...dataAdmin}, {entries: [...dataAdmin.entries].sort((a, b) => {
            a[sortElem.name] = a[sortElem.name] === null ? '' : a[sortElem.name];
            b[sortElem.name] = b[sortElem.name] === null ? '' : b[sortElem.name];
            return b[sortElem.name].localeCompare(a[sortElem.name])
          })}));
        }
      }
    }
  }, [sortData]);

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
    if (dataAdmin.entries.find(el => el.id === elemData.id)) {
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
    } else {
      setDataAdmin({...dataAdmin, 'entries': [...dataAdmin.entries, elemData]});
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
        if (column.type === 'upload') {
          sectionRow.home = entry.home;
        }
        rowsElem.push(sectionRow);
      }
      if (dataAdmin.buttons.delete === true) {
        rowsElem.push({'name': 'delete', 'text': {'id': entry.id, 'text': dataAdmin.routes.delete, 'deleteData': deleteData }, 'type': 'deleteButton'});
      } else {
        rowsElem.push({'name': 'delete', 'text': null, 'type': 'emptyBlock'}); 
      }
      rowsDataColumns.push(rowsElem);
    }
    if (rowsDataColumns.length > rowsFromPage) {
      let firstElem = (numberPage - 1) * rowsFromPage;
      let lastElem =  rowsDataColumns.length <= numberPage * rowsFromPage ? rowsDataColumns.length : numberPage * rowsFromPage;
      countRows = lastElem + 1;
      const rowsColumns = rowsDataColumns.slice(firstElem, lastElem);
      countRows = rowsColumns.length + 1;
      return rowsColumns;
    } else {
      return rowsDataColumns; 
    }
  }
  
  // Формирование данных для отображения
   
  let headerColumns = getHeaderColumns(dataAdmin.columns);
  let dataRows = getRowsData(dataAdmin);

  return (
    <>
      <h3 className="admin-right-title">{dataAdmin.title}</h3>
      <section className="admin-right-table" style={{"gridTemplateRows": `repeat(${countRows}, 1fr)`, "gridTemplateColumns": `69px repeat(${countColumns}, auto) 69px`}}>
        <RowAdmin columns={headerColumns} sortFunc={sortDataFunc} sortData={sortData}/>
        <>
          {dataRows.map((dataRow, id) => <RowAdmin columns={dataRow} key={id} sortFunc={null} sortData={null}/>)}
        </>
      </section>
      <div className="admin-right-button-pag">
        <div className="wrapper-create-button">
          {dataAdmin.buttons.add ? 
              <CreateButtons 
                columns={dataAdmin.columns}  
                textRoutes={dataAdmin.routes.save}
                setActive={setModalActive}
                setData={setDataInModal}
                roleUsers={dataAdmin.roleUsers ? dataAdmin.roleUsers : null}
              /> 
              : 
              ''
          }
        </div>
        <div className="admin-right-pagination">
          <Pagination 
            number={numberPage} 
            setNumber={setNumberPage} 
            countNumber={Math.ceil(dataAdmin.entries.length / rowsFromPage)} 
          />
        </div>
      </div>
      <Modal  
        active={modalActive} 
        setActive={setModalActive} 
        data={dataInModal} 
        setData={setDataAdmin} 
        actionAfter={actionAfter}
      />
    </>
  )
}

export default AppAdmin;
