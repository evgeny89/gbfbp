import React, { useState, useEffect, useRef } from 'react';
import RowModal from './modal/RowModal';
import TextError from './modal/TextError';
import axios from 'axios';

const Modal = ({ active, setActive, data, actionAfter }) => {
  const [errorsText, setErrorsText] = useState([]);
  const formRef = useRef(undefined);
  useEffect(() => {
    setErrorsText([]);
  }, [active]);
  let textRoutes = data?.textRoutes;
  let countRows = data?.columns.length || null;
  if (data?.entries?.id) {
    textRoutes = textRoutes.replace('=id=', data.entries.id);
  }

  const closeModal = () => {
    setActive(false);
  }

  /**
   * Подготавливает массив объектов для построения элементов окна попапа
   * @param {object} data 
   * @returns {array } - массив объектов для построение окна попапа
   */
  const getPrepareData = (data) => {
    if (data === undefined) return;
    const { columns, entries=undefined, roleUsers } = data;
    countRows = columns.length;
    const readyData = [];
    for (let i = 0; i < columns.length; i++) {
      const objElem = {};
      if (columns[i].name === 'id') {
        objElem.type = 'idText';
      } else if (columns[i].name === 'role') {
        objElem.type = 'select';
        objElem.selectAll = [...roleUsers];
      } else {
        objElem.type = columns[i].type;
      }
      if (columns[i].name === 'role') {
        objElem.name = 'role_id';
      } else {
        objElem.name = columns[i].name;
      }
      if (entries === undefined ) {
        if (objElem.type === 'check') {
          objElem.value = 0;
        } else {
          objElem.value = '';
        }

      } else {
        if (columns[i].name === 'role') {
          objElem.value = entries.role_id || '';
        } else {
          objElem.value = entries[columns[i].name] ?? '';
        }
      }
      objElem.text = columns[i].text;
      readyData.push(objElem);
    }
    return readyData;
  }

  let prepareData = getPrepareData(data) || null;

  /**
   * Get array errors and sets in variable errorsText
   * @param {object} objErrors 
   * @returns void
   */
  const getErrors = (objErrors, textError) => {
    const arrayErrors = [];
    if (objErrors) {
      Object.values(objErrors).forEach((el) => {
        arrayErrors.push(...el);
      });
      setErrorsText(arrayErrors);
    } else {
      arrayErrors.push(textError);
      setErrorsText(arrayErrors);
    }
    
  }

  /**
   * Отправляет изменения (создание) сущности на сервер, в случае успеха изменяет данные 
   * в админке и закрывает модальное окно, в случае неуспеха - отображает ошибку
   */
  const submitForm = async () => {
    setErrorsText([]);
    const elemData = {};
    [...formRef.current.elements].forEach((el) => elemData[el.name] = el.value);
    const fd = new FormData(formRef.current);
    if (Object.keys(elemData).some((el) => el === "published")) {
      fd.append("published", elemData.published);
    }
    await axios({
      method: 'post',
      headers: {
        "ContentType": "multipart/form-data"
      },
      url: textRoutes,
      data: fd
    })
      .then((data) => {
        if (data.data.message === 'ok') {
          if (Number(elemData.id) !== 0) {
            elemData.id = Number(elemData.id);
          } else {
            elemData.id = data.data.id.id;
          }
          actionAfter(elemData);
          setActive(false);
        }
      })
      .catch((error) => {
        getErrors(error.response.data.errors, error.response.data.message);
      });
  }

  return (
    <div className={active ? "modal-view active" : "modal-view"} onClick={closeModal}>
      <div className={active ? "modal-view__content active" : "modal-view__content"} onClick={e => e.stopPropagation()}>
        <h3 className="modal-title">{data?.entries ? "Редактирование" : "Создание"}</h3>
        <form ref={formRef} id="form-modal" className="modal-form" style={{ "gridTemplateRows": `repeat(${countRows - 1}, auto)` }}>
          {prepareData ? prepareData.map((item, id) => <RowModal data={{ ...item }} active={active} key={id} />) : null}
        </form>
        <div className="modal-wrapper-button-errors">
          <button className="modal-button-submit" onClick={submitForm}>Отправить</button>
          <div className="modal-div-errors">
            {errorsText.map((el, id) => <TextError text={el} key={id} />)}
          </div>
        </div>
      </div>
    </div>
  )
}

export default Modal;
