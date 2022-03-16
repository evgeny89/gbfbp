import React from "react";
import ReactDOM from 'react-dom';
import PopupUserComponent from "../Components/PopupUserComponent"

ReactDOM.render(
    <React.StrictMode>
        <PopupUserComponent/>
    </React.StrictMode>,
    document.getElementById('header-user-popup')
);

document.querySelector('.header__auth_logout')
    .addEventListener('click', () => {
        document.querySelector('#header-user-popup').classList.toggle('header-popup_active');
    })
