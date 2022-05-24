import React from "react";
import ReactDOM from 'react-dom';
import CatalogComponent from "./Components/Catalog/CatalogComponent"

const el = document.getElementById('catalog');
const data = JSON.parse(el.dataset.data);
const products = JSON.parse(el.dataset.products);

ReactDOM.render(
    <React.StrictMode>
        <CatalogComponent data={data} products={products}/>
    </React.StrictMode>,
    document.getElementById('catalog')
);
