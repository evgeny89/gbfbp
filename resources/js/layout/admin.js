import React from "react";
import ReactDOM from 'react-dom';
import AppAdmin from "../Components/admin/AppAdmin"

const app = document.getElementById('admin-left-field');

ReactDOM.render(
    <React.StrictMode>
        <AppAdmin {...app.dataset }/>
    </React.StrictMode>,
    app
);