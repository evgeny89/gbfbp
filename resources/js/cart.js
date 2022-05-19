import React from "react";
import ReactDOM from 'react-dom';
import CartComponent from "./Components/UserCart/CartComponent"

const el = document.getElementById('cart');
const json = {
    total: 12990.00 * 4 * 10,
    items: [
        {
            id: 1,
            name: "Разноцветные часы",
            count: 10,
            price: 12990.00,
            image: 'https://dev.hend-made.space/images/product_image.png'
        },
        {
            id: 2,
            name: "Разноцветные часы",
            count: 10,
            price: 12990.00,
            image: 'https://dev.hend-made.space/images/product_image.png'
        },
        {
            id: 3,
            name: "Разноцветные часы",
            count: 10,
            price: 12990.00,
            image: 'https://dev.hend-made.space/images/product_image.png'
        },
        {
            id: 4,
            name: "Разноцветные часы",
            count: 10,
            price: 12990.00,
            image: 'https://dev.hend-made.space/images/product_image.png'
        },
    ],
}; //JSON.parse(el.dataset.data);

ReactDOM.render(
    <React.StrictMode>
        <CartComponent dataCart={json}/>
    </React.StrictMode>,
    document.getElementById('cart')
);
