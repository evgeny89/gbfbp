<div id="burger_menu">
    <div id="backdrop-menu" class="burger__menu-backdrop"></div>
    <div class="burger__menu">
        <div class="burger__menu-wrapper">
            <div class="menu__hide">
                <button id="menu_hide" class="menu__hide-btn"></button>
            </div>
            <div class="menu__item">
                <a href="" class="item__link">
                    <div class="item__icon">
                        <img class="item__image" src="{{ asset('/images/menu_icons/accessories.svg') }}">
                    </div>
                    <div class="item__title">
                        Аксесуары
                    </div>
                </a>
            </div>
            <div class="menu__item">
                <a href="" class="item__link">
                    <div class="item__icon">
                        <img class="item__image" src="{{ asset('/images/menu_icons/clothes.svg') }}">
                    </div>
                    <div class="item__title">
                        Одежда и обувь
                    </div>
                </a>
            </div>
            <div class="menu__item">
                <a href="" class="item__link">
                    <div class="item__icon">
                        <img class="item__image" src="{{ asset('/images/menu_icons/interior.svg') }}">
                    </div>
                    <div class="item__title">
                        Предметы интерьера
                    </div>
                </a>
            </div>
            <div class="menu__item">
                <a href="" class="item__link">
                    <div class="item__icon">
                        <img class="item__image" src="{{ asset('/images/menu_icons/party.svg') }}">
                    </div>
                    <div class="item__title">
                        Свадьбы и вечеринки
                    </div>
                </a>
            </div>
            <div class="menu__item">
                <a href="" class="item__link link__active">
                    <div class="item__icon">
                        <img class="item__image" src="{{ asset('/images/menu_icons/toy.svg') }}">
                    </div>
                    <div class="item__title">
                        Игрушки
                    </div>
                </a>
                <div class="item__child">
                    <a href="" class="item__link">
                        <div class="item__title">
                            Для младенцев
                        </div>
                    </a>
                    <a href="" class="item__link link__active">
                        <div class="item__title">
                            Мягкая игрушка
                        </div>
                    </a>
                    <a href="" class="item__link">
                        <div class="item__title">
                            Куклы и фигурки
                        </div>
                    </a>
                    <a href="" class="item__link">
                        <div class="item__title">
                            Головоломки
                        </div>
                    </a>
                </div>
            </div>
            <div class="menu__item">
                <a href="" class="item__link">
                    <div class="item__icon">
                        <img class="item__image" src="{{ asset('/images/menu_icons/gift.svg') }}">
                    </div>
                    <div class="item__title">
                        Подарки
                    </div>
                </a>
            </div>
            <div class="menu__item">
                <a href="" class="item__link">
                    <div class="item__icon">
                        <img class="item__image" src="{{ asset('/images/menu_icons/materials.svg') }}">
                    </div>
                    <div class="item__title">
                        Материалы для творчества
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
@push('footer-scripts')
    <script type="text/javascript">
        const menu = document.getElementById('burger_menu');
        const button_open = document.getElementById('menu_open');
        const button_close = document.getElementById('menu_hide');
        const backdrop_menu = document.getElementById('backdrop-menu');

        const hide_menu = () => {
            menu.querySelector('.burger__menu').classList.remove('open');
            menu.querySelector('.burger__menu-backdrop').classList.remove('open');
        }

        button_open.addEventListener('click', () => {
           menu.querySelector('.burger__menu').classList.add('open');
           menu.querySelector('.burger__menu-backdrop').classList.add('open');
        });

        button_close.addEventListener('click', hide_menu);
        backdrop_menu.addEventListener('click', hide_menu);
    </script>
@endpush
