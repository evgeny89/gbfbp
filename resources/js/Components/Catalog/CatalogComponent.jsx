import React, {useState} from 'react';
import CatalogFilterComponent from './CatalogFilterComponent';
import CatalogProductComponent from "./CatalogProductComponent";

const CatalogComponent = ({data, products}) => {
    const [catalogProducts, setCatalogProducts] = useState(products || []);
    const [selectedSort, setSelectedSort] = useState('rating');

    const sortProducts = (sort) => {
        switch(sort) {
            case 'name':
                setCatalogProducts([...catalogProducts].sort((a, b) => a[sort].localeCompare(b[sort])));
                break;
            case 'popularity':
            case 'rating':
            case 'price':
                setCatalogProducts([...catalogProducts].sort((a, b) => b[sort] - a[sort]));
                break;
            case 'update':
                setCatalogProducts([...catalogProducts].sort((a, b) => new Date(b.updated_at) - new Date(a.updated_at)));
                break;
            default:
        }
    };

    const loadMoreProducts = () => {
        setCatalogProducts([...catalogProducts, ...products]);
    };

    const sortChange = (sort) => {
        setSelectedSort(sort);
        sortProducts(sort);
    };

    const addToCart = (product_id) => {
        console.log(product_id);
    };

    const removeFromCart = (e) => {
        console.log(e.target.dataset.id);
    };

    return (
        <div className="catalog__wrapper">
            <CatalogFilterComponent sort={selectedSort} sortChange={sortChange}/>
            <h1 className="catalog__name">{data.name}</h1>
                {
                    catalogProducts.length
                        ?
                        <>
                            <div className="product__list">
                                {
                                    catalogProducts.map(product => <CatalogProductComponent product={product} addToCart={addToCart}/>)
                                }
                            </div>
                            <div className="catalog__buttons">
                                <button className="load__products" onClick={loadMoreProducts}>
                                    Загрузить еще
                                </button>
                            </div>
                        </>
                        :
                        <h2 className="no_products">Здесь еще нет товаров!</h2>
                }

        </div>
    );
};

export default CatalogComponent;
