import React, {useState} from 'react';
import CartItemComponent from "./CartItemComponent"

const CartComponent = ({dataCart}) => {
    const [totalSum, setTotalSum] = useState(dataCart.total);
    const [cartItems, setCartItems] = useState(dataCart.items || []);

    const updateSum = (sum) => {
        setTotalSum(totalSum + sum)
    };

    const removeItem = (cartItem) => {
        setCartItems([...cartItems.filter(item => item.id !== cartItem.id)]);
    };

    const handlePayment = () => {
        // complete payment
        console.log('payment button clicked');
    };

    return (
        <div>
            <h1 className="cart__header"> Корзина </h1>
            {
                cartItems.length
                    ?
                        <>
                            <div className="cart__items">
                                {cartItems.map((item) => <CartItemComponent key={item.id} item={item} updateSum={updateSum} removeItem={removeItem}/>)}
                            </div>
                            <div className="cart__total">
                                <div className="total__title">
                                    Общая сумма:
                                </div>
                                <div className="total_sum">
                                    {totalSum.toFixed(2)} руб.
                                </div>
                            </div>
                            <div className="cart__buttons">
                                <button className="button__pay" onClick={handlePayment}>
                                    Оплатить
                                </button>
                            </div>
                        </>
                    :   <h2> Корзина пуста! </h2>
            }
        </div>
    );
};

export default CartComponent;
