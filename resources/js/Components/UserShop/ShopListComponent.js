import React, {useRef, useState} from "react";
import axios from "axios";

function ShopListComponent({shop, save, routes}) {
    const [showForm, setShowForm] = useState(false);
    const [err, setErr] = useState('');
    const form = useRef(null);

    const showFormMethod = () => {
        setShowForm(true);
    }

    const submitForm = () => {
        if (form.current.elements.name.value === shop.name) {
            setShowForm(false);
        } else {
            const route = shop ? routes.updateShop : routes.createShop
            if (form.current.elements.name.value.length) {
                axios({
                    method: "POST",
                    url: route,
                    headers: {"Content-Type": "multipart/form-data"},
                    data: new FormData(form.current)
                })
                    .then(r => {
                        setShowForm(false);
                        save(r.data)
                    })
                    .catch(e => setErr(e.message))
            }
        }
    }

    const handleKey = (e) => {
        if (e.key === 'Enter') {
            e.preventDefault();
            submitForm();
        }
    }

    return (
        <div className="user__shops">
            {!showForm && shop &&
                <div className="shop__item">
                    <div className="shop__name">
                        {shop.name}
                    </div>
                    <svg onClick={showFormMethod} className="icon__edit" viewBox="0 0 22 22" fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M1.19866 16.3345L5.55453 20.6904L5.44634 20.9068L0.00292969 22L1.09047 16.5566L1.19866 16.3345ZM1.97303 15.5317L6.36307 19.9217L18.6848 7.60006L14.2947 3.21002L1.97303 15.5317ZM21.3438 1.9573L20.0342 0.653381C19.1631 -0.217794 17.8592 -0.217794 16.988 0.653381L15.1374 2.50391L19.4933 6.85979L21.3438 5.00925C22.215 4.13808 22.215 2.72028 21.3438 1.9573Z"/>
                    </svg>
                </div>
            }
            {!showForm && !shop &&
                <div className="shop-create">
                    <div>
                        <p className="shop-create__text">У вас еще нет витрины, но вы можете ее создать!</p>
                        <button className="shop-create__btn" onClick={showFormMethod}>Создать витрину</button>
                    </div>
                </div>
            }
            {showForm &&
                <div>
                    <form ref={form}>
                        <span className="shop-create__title">Название магазина:</span>
                        <input className="shop-create__input" type="text" name="name" defaultValue={shop?.name || ''}  onKeyDown={handleKey}/>
                        <button className="shop-save__btn" type="button" onClick={submitForm}>Сохранить</button>
                    </form>
                    {err && <div className="alert alert-danger">{err}</div>}
                </div>
            }
        </div>
    );
}

export default ShopListComponent;
