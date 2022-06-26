import React from "react";

function ProductThumbComponent({link, product, edit, remove}) {
    const editProduct = (e) => {
        e.preventDefault();
        edit(product);
    }

    const deleteProduct = (e) => {
        e.preventDefault();
        remove(product);
    }

    return (
        <a href={link} className="product__thumb" >
            <div className="image__wrapper">
                <div className="button__remove">
                    <div className="remove__icon" onClick={deleteProduct}></div>
                </div>
                <img src={product.images[0].medium_image} className="product__image" alt=""/>
            </div>
            <div className="product__caption">
                <div className="product__price">
                    {product.price}&#8381;
                </div>
                <div className="product__name">
                    {product.name}
                </div>
                <div className="product__buttons">
                    <button className="button__edit" data-product-id={product.id} onClick={editProduct}>
                        <svg className="icon__edit" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M1.19866 16.3345L5.55453 20.6904L5.44634 20.9068L0.00292969 22L1.09047 16.5566L1.19866 16.3345ZM1.97303 15.5317L6.36307 19.9217L18.6848 7.60006L14.2947 3.21002L1.97303 15.5317ZM21.3438 1.9573L20.0342 0.653381C19.1631 -0.217794 17.8592 -0.217794 16.988 0.653381L15.1374 2.50391L19.4933 6.85979L21.3438 5.00925C22.215 4.13808 22.215 2.72028 21.3438 1.9573Z"/>
                        </svg>
                        <span className="text__edit">Редактировать</span>
                    </button>
                </div>
            </div>
        </a>
    );
}

export default ProductThumbComponent;
