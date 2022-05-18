import React, {useState} from 'react';

const CartItemComponent = ({item, updateSum, removeItem}) => {
    const [count, setCount] = useState(item.count);

    const countPlus = () => {
        setCount(count + 1);
        updateSum(item.price);
    };

    const countMinus = () => {
        if(count !== 1) {
            setCount(count - 1);
            updateSum(-item.price);
        }
        // или реализовать удаление товара если count станет = 0
    };

    const deleteItem = () => {
        removeItem(item);
        updateSum(-item.price * count);
    };

    return (
        <div className="cart__item">
            <div className="item__image">
                <img src={item.image} alt="" />
            </div>
            <div className="item__description">
                <div className="description__row">
                    <div className="button__remove" onClick={deleteItem}>
                        <div className="remove__icon"></div>
                    </div>
                    <div className="item__name">
                        {item.name}
                    </div>
                    <div className="item__buttons">
                        <button className="button__plus" onClick={countPlus}>
                            +
                        </button>
                        <div className="item__count">
                            {count}
                        </div>
                        <button className="button__minus" onClick={countMinus}>
                            -
                        </button>
                    </div>
                </div>
                <div className="description__row">
                    <div className="item__price">
                        {item.price.toFixed(2)} РУБ.
                    </div>
                </div>
            </div>
        </div>
    );
};

export default CartItemComponent;
