import React, {useEffect, useState} from "react";
import axios from "axios";
import routes from "../routes";

function PopupUserComponent() {
    const [outLink, setOutLink] = useState('#');
    const [profileLink, setProfileLink] = useState('#');
    const [favoriteLink, setFavoriteLink] = useState('#');
    const [purchasesLink, setPurchasesLink] = useState('#');
    const [shopLink, setShopLink] = useState('#');
    const [heartIcon, setHeartIcon] = useState('#');
    const [packageIcon, setPackageIcon] = useState('#');
    const [showcaseIcon, setShowcaseIcon] = useState('#');
    const [userName, setUserName] = useState('');

    useEffect(async () => {
        const data = await axios.get(routes.popup).then(r => r.data);
        setOutLink(data.logoutLink)
        setProfileLink(data.profileLink)
        setFavoriteLink(data.favoriteLink)
        setPurchasesLink(data.purchasesLink)
        setShopLink(data.shopLink)
        setHeartIcon(data.heartIcon)
        setPackageIcon(data.packageIcon)
        setShowcaseIcon(data.showcaseIcon)
        setUserName(data.userName)
    }, []);

    return (
        <div className="react-popup">
            <header className="user-popup">
                <div className="user-popup__avatar"/>
                <div className="user-popup__info">
                    <p className="user-popup__name">{userName}</p>
                    <a href={profileLink} className="user-popup__profile-link">Личные данные</a>
                </div>
            </header>
            <ul className="user-popup__links">
                <a href={favoriteLink} className="user-popup__link">
                    <img src={heartIcon} alt="избранное" className="user-popup__icon"/>
                    избранное
                </a>
                <a href={purchasesLink} className="user-popup__link">
                    <img src={packageIcon} alt="Покупки" className="user-popup__icon"/>
                    Покупки
                </a>
                <a href={shopLink} className="user-popup__link">
                    <img src={showcaseIcon} alt="витрина" className="user-popup__icon"/>
                    моя витрина
                </a>
            </ul>
            <a href={outLink} className="user-popup__logout-link">выйти</a>
        </div>
    );
}

export default PopupUserComponent;
