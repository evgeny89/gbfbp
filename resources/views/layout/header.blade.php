<header class="header">
    <div class="container">
        <div class="header-wrapper">
            <button class="header__btn-menu">
                <img src="{{ asset('/images/svg/menu.svg') }}" alt="burger" width="83" height="75">
            </button>
            <div class="header__logo">
                <p class="header__tagline">продавайте на hand made</p>
                <a href="{{ route('home') }}" class="header__link">
                    <img src="{{ asset('/images/logo.png') }}" alt="logo" width="313" height="50">
                </a>
            </div>
            <input type="text" class="header__search" placeholder="я ищу...">
            @if (Route::has('login'))
                @include('partials.auth_layout')
            @endif
        </div>
    </div>
</header>
