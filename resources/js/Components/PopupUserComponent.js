import React from "react";

function PopupUserComponent({logout = '/logout'}) {
    return (
        <div className="app">
            <a href={logout} className="header__auth header__auth_logout">выйти</a>
        </div>
    );
}

export default PopupUserComponent;
