<div class="header__personal">
    <a href="#" class="header__cart">
        <img class="header__cart-image" src="{{ asset('/images/svg/cart.svg') }}" alt="cart" width="50" height="50">
    </a>
    <a @auth
            href="{{ route('logout') }}" class="header__auth header__auth_logout"
       @else
            href="{{ route('login') }}" class="header__auth"
       @endauth
    >
        @include('icons.person')
    </a>
</div>
