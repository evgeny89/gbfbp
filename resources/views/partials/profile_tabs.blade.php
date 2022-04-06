{{-- PROFILE TABS --}}
<div class="profile__tabs">
    <div class="tabs__item @if ($active == 'profile') item__active @endif">
        <h2 class="item__title">
            Личные данные
        </h2>
    </div>
    <div class="tabs__item @if ($active == 'favorite') item__active @endif">
        <h2 class="item__title">
            Избранное
        </h2>
    </div>
    <div class="tabs__item">
        <h2 class="item__title">
            Мои покупки
        </h2>
    </div>
    <div class="tabs__item">
        <h2 class="item__title">
            Моя витрина
        </h2>
    </div>
</div>
{{-- PROFILE TABS --}}
