import React from "react";

function CatalogProductComponent({link, product, addToCart}) {
    return (
        <a href={link} className="product__thumb" >
            <div className="image__wrapper">
                <img src={product.images[0].medium_image} className="product__image" alt=""/>
            </div>
            <div className="product__caption">
                <div className="product__price">
                    {product.price.toFixed(2)} &#8381;
                </div>
                <div className="product__name">
                    {product.name}
                </div>
                <div className="product__buttons">
                    <button className="button__buy" onClick={() => addToCart(product.id)}>
                        В корзину
                    </button>
                </div>
            </div>
        </a>
    );
}

export default CatalogProductComponent;
