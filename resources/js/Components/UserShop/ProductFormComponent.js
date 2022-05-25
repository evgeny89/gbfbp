import React, {useEffect, useRef, useState} from "react";
import axios from "axios";

function ProductFormComponent({product, close, routes, save, update}) {
    const [materials, setMaterials] = useState([]);
    const [categories, setCategories] = useState([]);
    const [category, setCategory] = useState(product.category_id);
    const [material, setMaterial] = useState(product.material_id);
    const [images, setImages] = useState([]);
    const [removeImagesIds, setRemoveImagesIds] = useState([]);
    const [imageName, setImageName] = useState("");
    const [err, setErr] = useState({})
    const form = useRef(null);
    const file = useRef(null);

    const saveProduct = (e) => {
        e.preventDefault();
        const fd = new FormData(form.current);
        removeImagesIds.forEach(img => fd.append('delete_images[]', img));
        images.forEach(img => fd.append('file_name[]', img));
        axios({
            method: "POST",
            url: getCurrentRoute(),
            headers: {"Content-Type": "multipart/form-data"},
            data: fd
        })
            .then(r => {
                if (product.id) {
                    update(r.data)
                } else {
                    save(r.data)
                }
                close();
            })
            .catch(e => {
                setErr(e.response.data.errors);
            })
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

    const addImage = () => {
        if (file.current.files.length) {
            const image = file.current.files[0];
            setImages([...images, image]);
            file.current.value = "";
            setImageName("")
        }
    }

    const currentName = () => {
        setImageName(file.current.files[0].name);
    }

    const removeFileImage = (name) => {
        setImages([...images.filter(img => img.name !== name)]);
    }

    const removeServerImage = (imageId) => {
        setRemoveImagesIds([...removeImagesIds, imageId])
    }

    const restoreServerImage = (imageId) => {
        setRemoveImagesIds([...removeImagesIds.filter(i => i !== imageId)])
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
                            <label htmlFor="product_name" className={err?.name ? "product__form-row-title error" : "product__form-row-title"}>Наименование:</label>
                            <input defaultValue={product.name} id="product_name" name="name" type="text"
                                   className="product__data"/>
                        </div>
                        <div className="product__form-row">
                            <label htmlFor="product_price" className={err?.price ? "product__form-row-title error" : "product__form-row-title"}>Цена:</label>
                            <input defaultValue={product.price} id="product_price" name="price" type="text"
                                   className="product__data"/>
                        </div>
                        <div className="product__form-row">
                            <label htmlFor="product_weight" className={err?.weight ? "product__form-row-title error" : "product__form-row-title"}>Вес:</label>
                            <input defaultValue={product.weight} id="product_weight" name="weight" type="text"
                                   className="product__data"/>
                        </div>
                        {
                            materials &&
                            <div className="product__form-row">
                                <label htmlFor="product_material" className={err['material_id'] ? "product__form-row-title error" : "product__form-row-title"}>Материал:</label>
                                <select name="material_id" id="product_material" value={material}
                                        onChange={(e) => setMaterial(e.target.value)}>
                                    {materials.map(material => <option key={material.id} value={material.id}>{material.name}</option>)}
                                </select>
                            </div>
                        }
                        {
                            categories &&
                            <div className="product__form-row">
                                <label htmlFor="product_material" className={err['category_id'] ? "product__form-row-title error" : "product__form-row-title"}>Категория:</label>
                                <select name="category_id" id="product_material" value={category}
                                        onChange={(e) => setCategory(e.target.value)}>
                                    {categories.map(category => <option key={category.id} value={category.id}>{category.name}</option>)}
                                </select>
                            </div>
                        }
                        <div className="product__form-column">
                            <label htmlFor="product_description" className={err?.description ? "product__form-row-title error" : "product__form-row-title"}>Описание:</label>
                            <textarea defaultValue={product.description} id="product_description"
                                      name="description"
                                      className="product__data" rows="8"/>
                        </div>
                        <div className="product__form-row">
                            <div>
                                <label htmlFor="product_photo" className={err['file_name'] ? "product__form-row-title product_photo error" : "product__form-row-title product_photo"}>Добавить фото товара</label>
                                <input ref={file} id="product_photo" type="file" className="image-product-input" onChange={currentName}/>
                            </div>
                            <div className="upload-wrapper">
                                <span>{imageName}</span>
                                {
                                    imageName.length > 0 &&
                                    <button className="upload-btn" type="button" onClick={addImage}>Загрузить</button>
                                }
                            </div>
                        </div>
                        <div className="product__form-row">
                            <div className="product__photos">
                                {
                                    product.images &&
                                    product.images.map(item => {
                                            return (
                                                <div className="photo__preview" key={item.id}>
                                                    {
                                                        removeImagesIds.includes(item.id)
                                                            ? <button type="button" className="button__remove"
                                                                      onClick={() => restoreServerImage(item.id)}>
                                                                <span className="restore__icon"></span>
                                                            </button>
                                                            : <button type="button" className="button__remove"
                                                                      onClick={() => removeServerImage(item.id)}>
                                                                <span className="remove__icon"></span>
                                                            </button>
                                                    }
                                                    <img className={removeImagesIds.includes(item.id) ? "server-image delete-mark" : "server-image"} src={item.small_image} alt={item.file_name} width="150" height="198"/>
                                                </div>
                                            )
                                        }
                                    )
                                }
                                {
                                    images && images.map(item => {
                                        return (
                                            <div className="photo__preview" key={item.name}>
                                                <button type="button" className="button__remove" onClick={() => removeFileImage(item.name)}>
                                                    <span className="remove__icon"></span>
                                                </button>
                                                <img className="local-image" src={URL.createObjectURL(item)} alt={item.name} width="150" height="198"/>
                                            </div>
                                        )
                                    })
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
