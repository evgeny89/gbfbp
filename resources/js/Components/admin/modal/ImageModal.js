import React, { useRef, useEffect } from 'react';

const ImageModal = (props) => {
  const { text, name, value, active } = props;
  
  const imgRef = useRef(undefined);
  const inputRef = useRef(undefined);
  
  useEffect(() => {
    if (!active) {
      imgRef.current.src = value || "/images/svg/camera-img.svg";
      inputRef.current.value = '';
    }
  }, [active])

  const changeFile = (e) => {
    const input = e.target;
    previewFile(imgRef.current, input.files[0]);
  };
  
  const previewFile = (preview, file) => {
    
    const reader  = new FileReader();
  
    reader.onloadend = function () {
      preview.src = reader.result;
    }
  
    if (file) {
      reader.readAsDataURL(file);
    } else {
      preview.src = "/images/svg/camera-img.svg";
    }
  };

  return (
    <>
      <div className="modal-text" >{text}:</div>
      <div className="image-modal-wrapper">
        <img ref={imgRef} className="image-modal-img" src={value ? value : '/images/svg/camera-img.svg'} />
        <input ref={inputRef} id="input__file" name={name} onChange={changeFile} type="file"  className="admin-input-file"/>
        <label htmlFor="input__file" className="button-image-file">{"Выберите файл"}</label>
      </div>
      
    </>
  )
};

export default ImageModal;
