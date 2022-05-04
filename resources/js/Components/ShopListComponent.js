import React from "react";

function ShopListComponent({shops, shopIdChange}) {
    return (
        <div className="user__shops">
            {
                shops.map((item) => {
                    return (
                        <div className="shop__item" key={item.id}>
                            <div className="shop__name" data-shop-id={item.id} onClick={shopIdChange}>
                                {item.name}
                            </div>
                            <svg className="icon__edit" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M1.19866 16.3345L5.55453 20.6904L5.44634 20.9068L0.00292969 22L1.09047 16.5566L1.19866 16.3345ZM1.97303 15.5317L6.36307 19.9217L18.6848 7.60006L14.2947 3.21002L1.97303 15.5317ZM21.3438 1.9573L20.0342 0.653381C19.1631 -0.217794 17.8592 -0.217794 16.988 0.653381L15.1374 2.50391L19.4933 6.85979L21.3438 5.00925C22.215 4.13808 22.215 2.72028 21.3438 1.9573Z"/>
                            </svg>
                        </div>
                    );
                })
            }
        </div>
    );
}

export default ShopListComponent;
