<div class="header__personal">
    <a href="#" class="header__cart">
        <img src="{{ asset('/images/svg/cart.svg') }}" alt="cart" width="50" height="50">
    </a>
    @auth
        <a href="{{ route('logout') }}">Log out</a>
    @else
        <a href="{{ route('login') }}">
            <img src="{{ asset('/images/svg/login.svg') }}" alt="login" width="41" height="41">
        </a>
    @endauth
</div>
