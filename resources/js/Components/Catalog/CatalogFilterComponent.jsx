import React from 'react';

const CatalogFilterComponent = ({sort, sortChange}) => {
    const filterItems = [
        {
            title: 'Популярности',
            sort: 'popularity'
        },
        {
            title: 'Рейтингу',
            sort: 'rating'
        },
        {
            title: 'Цене',
            sort: 'price'
        },
        {
            title: 'Обновлению',
            sort: 'update'
        }
    ];

    return (
        <div className="catalog__filter">
            <div className="filter__title">
                Сортировать по:
            </div>
            <div className="filter__items">
                {
                    filterItems.map(item =>
                        <div
                            className={sort === item.sort ? 'filter__item filter__active' : 'filter__item'}
                            onClick={() => sortChange(item.sort)}>
                            {item.title}
                        </div>
                    )
                }
            </div>
        </div>
    );
};

export default CatalogFilterComponent;
