{{-- PROFILE TABS --}}
<div class="profile__tabs">
    <div class="tabs__item @if ($active == 'profile') item__active @endif">
        <a href="{{ route('profile_page') }}" class="item__title">
            Личные данные
        </a>
    </div>
    <div class="tabs__item @if ($active == 'favorite') item__active @endif">
        <a href="{{ route('favorite_page') }}" class="item__title">
            Избранное
        </a>
    </div>
    <div class="tabs__item @if ($active == 'orders') item__active @endif">
        <a href="{{ route('orders_page') }}" class="item__title">
            Мои покупки
        </a>
    </div>
    <div class="tabs__item @if ($active == 'shop') item__active @endif">
        <a href="{{ route('shop_page') }}" class="item__title">
            Моя витрина
        </a>
    </div>
</div>
{{-- PROFILE TABS --}}
