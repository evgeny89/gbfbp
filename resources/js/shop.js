import React from "react";
import ReactDOM from 'react-dom';
import ShopComponent from "./Components/UserShop/ShopComponent"

const el = document.getElementById('shop')
const json = JSON.parse(el.dataset.data);

ReactDOM.render(
    <React.StrictMode>
        <ShopComponent dataShop={json}/>
    </React.StrictMode>,
    document.getElementById('shop')
);
