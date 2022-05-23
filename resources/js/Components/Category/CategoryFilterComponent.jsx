import React from 'react';

const CategoryFilterComponent = ({sort, sortChange}) => {
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
        <div className="category__filter">
            <div className="filter__title">
                Сортировать по:
            </div>
            <div className="filter__items">
                {
                    filterItems.map(item =>
                        <div className={sort === item.sort ? 'filter__item filter__active' : 'filter__item'} data-sort={item.sort} onClick={e => sortChange(e.target.dataset.sort)}>
                            {item.title}
                        </div>
                    )
                }
            </div>
        </div>
    );
};

export default CategoryFilterComponent;
