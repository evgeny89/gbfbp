<div id="burger_menu">
    <div id="backdrop-menu" class="burger__menu-backdrop"></div>
    <div class="burger__menu">
        <div class="burger__menu-wrapper">
            <div class="menu__hide">
                <button id="menu_hide" class="menu__hide-btn"></button>
            </div>
            @foreach($categories as $category)
                <div class="menu__item">
                    <a href="{{ route('category_page', ['category' => $category->id]) }}" class="item__link">
                        <div class="item__title">
                            {{ $category->name }}
                        </div>
                    </a>
                </div>
            @endforeach
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
