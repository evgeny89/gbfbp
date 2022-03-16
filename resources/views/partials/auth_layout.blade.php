<div class="header__personal">
    <a href="#" class="header__cart">
        <img class="header__cart-image" src="{{ asset('/images/svg/cart.svg') }}" alt="cart" width="50" height="50">
    </a>
    <div class="header__user">
        @auth
            <button class="header__auth header__auth_logout">@include('icons.person')</button>
            <div id="header-user-popup" class="header-popup"></div>
            @push('footer-scripts')
                <script src="{{ mix('/js/popup.js') }}"></script>
            @endpush
        @else
            <a href="{{ route('login') }}" class="header__auth">@include('icons.person')</a>
        @endauth
    </div>
</div>
