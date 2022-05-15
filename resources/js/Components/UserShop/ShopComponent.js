import React, {useState} from "react";
import ShopListComponent from "./ShopListComponent";
import ProductListComponent from "./ProductListComponent";

function ShopComponent({dataShop}) {
    const [shop, setShop] = useState(dataShop.shop);

    return (
        <>
            <ShopListComponent shop={shop} save={setShop} routes={dataShop.routes}/>
            {shop && <ProductListComponent shop={shop} routes={dataShop.routes}/>}
        </>
    );
}

export default ShopComponent;
