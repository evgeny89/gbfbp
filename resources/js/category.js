import React from "react";
import ReactDOM from 'react-dom';
import CategoryComponent from "./Components/Category/CategoryComponent"

const el = document.getElementById('category');
const dataCategory = JSON.parse(el.dataset.category);
const dataProducts = JSON.parse(el.dataset.products);

ReactDOM.render(
    <React.StrictMode>
        <CategoryComponent dataCategory={dataCategory} dataProducts={dataProducts}/>
    </React.StrictMode>,
    document.getElementById('category')
);
