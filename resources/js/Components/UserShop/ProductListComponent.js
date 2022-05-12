import React, {useState} from "react";
import ProductThumbComponent from "./ProductThumbComponent";
import ProductFormComponent from "./ProductFormComponent";
import axios from "axios";

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

    const updateProduct = (product) => {
        setProducts([...products.map(item => item.id === product.id ? product : item)])
    }

    const deleteProduct = (product) => {
        const deleteRoute = routes.deleteItem.replace('=product=', product.id)
        axios.get(deleteRoute)
            .then(r => {
                if (r.data) {
                    setProducts([...products.filter(item => item.id !== product.id)])
                } else {
                    console.error("Ошбка удаления товара");
                }
            })
    }

    const addProduct = (product) => {
        setProducts([...products, product])
    }

    return (
        <>
            {!products.length && <p> No products in this shop yet! </p>}
            <div className="products__wrapper">
                {products.map((item) => <ProductThumbComponent key={item.id} product={item} edit={editProduct} remove={deleteProduct}/>)}
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
            {formStatus &&
                <ProductFormComponent product={currentProduct} close={toggleModal} routes={routes} save={addProduct} update={updateProduct}/>}
        </>
    );
}

export default ProductListComponent;
