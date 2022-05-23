import React, {useState} from 'react';
import CategoryFilterComponent from './CategoryFilterComponent';
import CategoryProductComponent from "./CategoryProductComponent";

const CategoryComponent = ({dataCategory, dataProducts}) => {
    const [products, setProducts] = useState(dataProducts || []);
    const [selectedSort, setSelectedSort] = useState('rating');

    const sortProducts = (sort) => {
        switch(sort) {
            case 'name':
                setProducts([...products].sort((a, b) => a[sort].localeCompare(b[sort])));
                break;
            case 'popularity':
            case 'rating':
            case 'price':
                setProducts([...products].sort((a, b) => b[sort] - a[sort]));
                break;
            case 'update':
                setProducts([...products].sort((a, b) => new Date(b.updated_at) - new Date(a.updated_at)));
                break;
            default:
        }
    };

    const loadMoreProducts = () => {
        setProducts([...products, ...dataProducts]);
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
        <div className="category__wrapper">
            <CategoryFilterComponent sort={selectedSort} sortChange={sortChange}/>
            <h1 className="category__name">{dataCategory.name}</h1>
                {
                    products.length
                        ?
                        <>
                            <div className="product__list">
                                {
                                    products.map(product => <CategoryProductComponent product={product} addToCart={addToCart}/>)
                                }
                            </div>
                            <div className="category__buttons">
                                <button className="load__products" onClick={loadMoreProducts}>
                                    Загрузить еще
                                </button>
                            </div>
                        </>
                        :
                        <h2 className="no_products">В категории нет товаров!</h2>
                }

        </div>
    );
};

export default CategoryComponent;
