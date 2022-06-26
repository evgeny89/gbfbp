import React from "react";
import ReactDOM from 'react-dom';
import CatalogComponent from "./Components/Catalog/CatalogComponent"

const el = document.getElementById('catalog');
const route = el.dataset.route;
const data = JSON.parse(el.dataset.data);
const products = JSON.parse(el.dataset.products);

ReactDOM.render(
    <React.StrictMode>
        <CatalogComponent route={route} data={data} products={products}/>
    </React.StrictMode>,
    document.getElementById('catalog')
);
