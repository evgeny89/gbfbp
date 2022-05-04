import React, {useState} from "react";
import ShopListComponent from "./ShopListComponent";
import ProductListComponent from "./ProductListComponent";

function getUserShops() {
    //get user shops by user_id
    //return array of shops
    return [
        {
            id: 1,
            name: 'Shop 1',
            status: 1,
        },
        {
            id: 2,
            name: 'Shop 2',
            status: 1,
        },
    ];
}

function ShopComponent() {
    // Здесь необходимо устанавливать магазин по умолчанию
    const [shopId, setShopId] = useState(1);

    const ShopIdChange = (e) => {
        setShopId(e.target.dataset.shopId);
    };

    return (
        <>
            <ShopListComponent shops={getUserShops()} shopIdChange={ShopIdChange}/>
            <ProductListComponent shopId={shopId}/>
        </>
    );
}

export default ShopComponent;
