import React, {useEffect, useRef, useState} from "react";
import axios from "axios";

function ProductFormComponent({product, close, routes, save, update}) {
    const [materials, setMaterials] = useState([]);
    const [categories, setCategories] = useState([]);
    const [err, setErr] = useState({})
    const form = useRef(null);

    const saveProduct = (e) => {
        e.preventDefault();
        axios({
            method: "POST",
            url: getCurrentRoute(),
            headers: {"Content-Type": "multipart/form-data"},
            data: new FormData(form.current)
        })
            .then(r => {
                if (product.id) {
                    update(r.data)
                } else {
                    save(r.data)
                }
                close();
            })
            .catch(e => console.log(e.message))
    };

    useEffect(() => {
        getSelectedValues();
    }, []);

    const getSelectedValues = () => {
        axios.get(routes.getSelectValues)
            .then(r => {
                setCategories(r.data.categories);
                setMaterials(r.data.materials);
            })
            .catch(e => console.log(e.message));
    }

    const getCurrentRoute = () => {
        return product.id ? routes.updateItem.replace('=product=', product.id) : routes.createItem;
    }

    return (
        <>
            <div className="form__backdrop"></div>
            <div className="product__form-popup">
                <form ref={form} id="product_form" className="product__form" onSubmit={saveProduct}>
                    <div className="product__form-wrapper">
                        <div className="product__form-header">
                            {product.id ?
                                <p className="header__title">Изменить товар</p>
                                : <p className="header__title">Новый товар</p>
                            }
                            <div className="form__close" onClick={close}>x</div>
                        </div>
                        <div className="product__form-row">
                            <label htmlFor="product_name">Наименование:</label>
                            <input defaultValue={product.name} id="product_name" name="name" type="text"
                                   className="product__data"/>
                        </div>
                        <div className="product__form-row">
                            <label htmlFor="product_price">Цена:</label>
                            <input defaultValue={product.price} id="product_price" name="price" type="text"
                                   className="product__data"/>
                        </div>
                        <div className="product__form-row">
                            <label htmlFor="product_weight">Вес:</label>
                            <input defaultValue={product.weight} id="product_weight" name="weight" type="text"
                                   className="product__data"/>
                        </div>
                        {
                            materials &&
                            <div className="product__form-row">
                                <label htmlFor="product_material">Материал:</label>
                                <select name="material_id" id="product_material" value={product.material_id}>
                                    {materials.map(material => <option key={material.id} value={material.id}>{material.name}</option>)}
                                </select>
                            </div>
                        }
                        {
                            categories &&
                            <div className="product__form-row">
                                <label htmlFor="product_material">Категория:</label>
                                <select name="category_id" id="product_material" value={product.category_id}>
                                    {categories.map(category => <option key={category.id} value={category.id}>{category.name}</option>)}
                                </select>
                            </div>
                        }
                        <div className="product__form-column">
                            <label htmlFor="product_description">Описание:</label>
                            <textarea defaultValue={product.description} id="product_description"
                                      name="description"
                                      className="product__data" rows="8"/>
                        </div>
                        <div className="product__form-row">
                            <label htmlFor="product_photo1">Фото:</label>
                            <input id="product_photo1" name="file_name[]" type="file" className="product__data"/>
                        </div>
                        <div className="product__form-row">
                            <label htmlFor="product_photo2">Фото:</label>
                            <input id="product_photo2" name="file_name[]" type="file" className="product__data"/>
                        </div>
                        <div className="product__form-row">
                            <div className="product__photos">
                                {
                                    product.images &&
                                    product.images.map((item) => {
                                            return (
                                                <div className="photo__preview">
                                                    <img key={item.id} src={item.small_image} alt={item.file_name}/>
                                                </div>
                                            )
                                        }
                                    )
                                }
                            </div>
                        </div>
                        <div className="form__buttons">
                            {product.id ?
                                <button type="submit" className="button__save">
                                    Сохранить
                                </button>
                                : <button type="submit" className="button__add">
                                    Добавить товар
                                </button>
                            }
                            <button onClick={close} className="button__cancel">
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
