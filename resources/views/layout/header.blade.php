<header class="header">
    <div class="container">
        <div class="header-wrapper">
            <div class="header__mobile-row">
                <button id="menu_open" class="header__btn-menu">
                    <img class="header__menu-icon" src="{{ asset('/images/svg/menu.svg') }}" alt="burger" width="83" height="75">
                </button>
                <div class="header__logo">
                    <p class="header__tagline">продавайте на hand made</p>
                    <a href="{{ route('home') }}" class="header__link">
                        <img class="header__logo-img" src="{{ asset('/images/logo.png') }}" alt="logo" width="313" height="50">
                    </a>
                </div>
            </div>
            <div class="header__mobile-row" id="search" data-route="{{ route('search') }}">
                <input type="text" class="header__search" placeholder="я ищу...">
            </div>
            <div class="header__mobile-row">
                @if (Route::has('login'))
                    @include('partials.auth_layout')
                @endif
            </div>
        </div>
    </div>
</header>
