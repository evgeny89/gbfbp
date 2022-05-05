import React, {useRef} from "react";

function getProduct(productId) {
    let default_data = {
        name: '',
        price: '',
        weight: '',
        material: '',
        category: '',
        description: '',
        photos: '',
        product_id: '',
        store_id: '',
    };

    if (productId) {
        //get product data here
        default_data.product_id = productId;
        default_data.name = 'test';
    }

    return default_data;
}

function ProductFormComponent({productId, formStatus, formStatusChange}) {
    const productData = getProduct(productId);
    const form = useRef(null);

    const saveProduct = (e) => {
        e.preventDefault();
        const data = new FormData(form.current);
        //send data to backend
    };

    return (
        formStatus && <>
            <div className="form__backdrop"></div>
            <div className="product__form-popup">
                <form ref={form} id="product_form" className="product__form" onSubmit={saveProduct}>
                    <div className="product__form-wrapper">
                        <div className="product__form-header">
                            {productData.product_id ?
                                <p className="header__title">Изменить товар</p>
                                : <p className="header__title">Новый товар</p>
                            }
                            <div className="form__close" onClick={formStatusChange}>x</div>
                            <input defaultValue={productData.product_id} id="product_id" name="product_id" type="hidden"/>
                            <input defaultValue={productData.store_id} id="store_id" name="store_id" type="hidden"/>
                        </div>
                        <div className="product__form-row">
                            <label htmlFor="product_name">Наименование:</label>
                            <input defaultValue={productData.name} id="product_name" name="product_name" type="text"
                                   className="product__data"/>
                        </div>
                        <div className="product__form-row">
                            <label htmlFor="product_price">Цена:</label>
                            <input defaultValue={productData.price} id="product_price" name="product_price" type="text"
                                   className="product__data"/>
                        </div>
                        <div className="product__form-row">
                            <label htmlFor="product_weight">Вес:</label>
                            <input defaultValue={productData.weight} id="product_weight" name="product_weight" type="text"
                                   className="product__data"/>
                        </div>
                        <div className="product__form-row">
                            <label htmlFor="product_material">Материал:</label>
                            <input defaultValue={productData.material} id="product_material" name="product_material"
                                   type="text"
                                   className="product__data"/>
                        </div>
                        <div className="product__form-row">
                            <label htmlFor="product_category">Категория:</label>
                            <input defaultValue={productData.category} id="product_category" name="product_category"
                                   type="text"
                                   className="product__data"/>
                        </div>
                        <div className="product__form-column">
                            <label htmlFor="product_description">Описание:</label>
                            <textarea defaultValue={productData.description} id="product_description"
                                      name="product_description"
                                      className="product__data" rows="8"/>
                        </div>
                        <div className="product__form-row">
                            <label htmlFor="product_photo">Фото:</label>
                            <input id="product_photo" name="product_photo" type="file" className="product__data"/>
                        </div>
                        <div className="product__form-row">
                            <div className="product__photos">
                                {
                                    productData.photos ?
                                        productData.photos.map((item, index) => {
                                                return (
                                                    <div className="photo__preview">
                                                        <img key={index} src={item}/>
                                                    </div>
                                                )
                                            }
                                        )
                                        : ''
                                }
                            </div>
                        </div>
                        <div className="form__buttons">
                            {productData.product_id ?
                                <button type="submit" className="button__save">
                                    Сохранить
                                </button>
                                : <button type="submit" className="button__add">
                                    Добваить товар
                                </button>
                            }
                            <button onClick={formStatusChange} className="button__cancel">
                                Отмена
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </>
    );
}

export default ProductFormComponent;
