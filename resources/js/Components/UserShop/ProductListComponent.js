import React, {useState} from "react";
import ProductThumbComponent from "./ProductThumbComponent";
import ProductFormComponent from "./ProductFormComponent";

function ProductListComponent({shop, routes}) {
    const [formStatus, setFormStatus] = useState(false);
    const [currentProduct, setCurrentProduct] = useState({});
    const [products, setProducts] = useState(shop.products || [])

    const toggleModal = () => {
        setFormStatus(!formStatus);
    }

    const createProduct = () => {
        setCurrentProduct({});
        toggleModal();
    };

    const editProduct = (product) => {
        setCurrentProduct(product);
        toggleModal();
    }

    const addProduct = (product) => {
        setProducts([...products, product])
    }

    return (
        <>
            {!products.length && <p> No products in this shop yet! </p>}
            <div className="products__wrapper">
                {products.map((item) => <ProductThumbComponent key={item.id} product={item} edit={editProduct}/>)}
                <div className="product__new" onClick={createProduct}>
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
            {formStatus && <ProductFormComponent product={currentProduct} close={toggleModal} routes={routes} save={addProduct}/>}
        </>
    );
}

export default ProductListComponent;
