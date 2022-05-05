import React, {useState} from "react";
import ProductThumbComponent from "./ProductThumbComponent";
import ProductFormComponent from "./ProductFormComponent";

import product_image from '../../images/product_image.png'

function getShopProducts(shop_id) {
    //get user shops by user_id
    //return array of shops
    return [
        {
            id: 1,
            name: 'Разноцветные часы',
            price: 1299,
            image: product_image,
        },
        {
            id: 2,
            name: 'Разноцветные часы',
            price: 2222,
            image: product_image,
        },
        {
            id: 3,
            name: 'Разноцветные часы',
            price: 3333,
            image: product_image,
        },
        {
            id: 4,
            name: 'Разноцветные часы',
            price: 4444,
            image: product_image,
        },
        {
            id: 5,
            name: 'Разноцветные часы',
            price: 1299,
            image: product_image,
        },
        {
            id: 6,
            name: 'Разноцветные часы',
            price: 1299,
            image: product_image,
        },
        {
            id: 7,
            name: 'Разноцветные часы',
            price: 1299,
            image: product_image,
        },
        {
            id: 8,
            name: 'Разноцветные часы',
            price: 1299,
            image: product_image,
        },
    ];
}

function ProductListComponent({shopId}) {
    const [productId, setProductId] = useState(0);
    const [formStatus, setFormStatus] = useState(false);

    const productIdChange = (e) => {
        const productId = typeof e.currentTarget.dataset.productId !== 'undefined' ? e.currentTarget.dataset.productId : 0;
        setProductId(productId);
        setFormStatus(!formStatus);
    };

    const products = getShopProducts(shopId);

    return (
        <>
            <div className="products__wrapper">
                {
                    products ?
                        products.map((item, index) => <ProductThumbComponent key={index} productData={item} productIdChange={productIdChange}/>)
                        : <p> No products in this shop yet! </p>
                }
                <div className="product__new" onClick={productIdChange}>
                    <div className="button__wrapper">
                        <div className="button__add">
                            <div className="icon__plus"></div>
                        </div>
                    </div>
                    <div className="product__caption">
                        <div className="caption__text">
                            Добавить товар
                        </div>
                    </div>
                </div>
            </div>
            <ProductFormComponent productId={productId} formStatus={formStatus} formStatusChange={productIdChange}/>
        </>
    );
}

export default ProductListComponent;
