import React, {useMemo, useState} from 'react';
import CatalogFilterComponent from './CatalogFilterComponent';
import CatalogProductComponent from "./CatalogProductComponent";

const CatalogComponent = ({data, products}) => {
    const [catalogProducts, setCatalogProducts] = useState(products || []);
    const [selectedSort, setSelectedSort] = useState('rating');

    const sortedProducts = useMemo(() => {
        switch(selectedSort) {
            case 'name':
                return [...catalogProducts].sort((a, b) => a[selectedSort].localeCompare(b[selectedSort]));
            case 'rating':
            case 'price':
                return [...catalogProducts].sort((a, b) => b[selectedSort] - a[selectedSort]);
            case 'update':
                return [...catalogProducts].sort((a, b) => new Date(b.updated_at) - new Date(a.updated_at));
            default:
        }
    }, [catalogProducts, selectedSort]);

    const loadMoreProducts = () => {
        setCatalogProducts([...catalogProducts, ...products]);
    };

    const sortChange = (sort) => {
        setSelectedSort(sort);
    };

    const addToCart = (product_id) => {
        console.log(product_id);
    };

    return (
        <div className="catalog__wrapper">
            <CatalogFilterComponent sort={selectedSort} sortChange={sortChange}/>
            <h1 className="catalog__name">{data.name}</h1>
                {
                    sortedProducts.length
                        ?
                        <>
                            <div className="product__list">
                                {
                                    sortedProducts.map((product, index) => <CatalogProductComponent key={index} product={product} addToCart={addToCart}/>)
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
