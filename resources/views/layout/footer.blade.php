<footer class="footer">
    <div class="container">
        <div class="footer-wrapper">
            <div class="footer-wrapper__container">
                <h2 class="footer-wrapper__title title_buyer">
                    покупателям
                </h2>
                <a href="{{ route('howMakeOrder_page') }}" class="footer-link">как сделать заказ</a>
                <a href="{{ route('payment_page') }}" class="footer-link">способы оплаты</a>
                <a href="{{ route('delivery_page') }}" class="footer-link">доставка</a>
            </div>
            <div class="footer-wrapper__container">
                <h2 class="footer-wrapper__title title_seller">
                    продавцам
                </h2>
                <a href="{{ route('rulesSeller_page') }}" class="footer-link">правила размещения</a>
                <a href="{{ route('rulesSettlements_page') }}" class="footer-link">правила расчётов</a>
            </div>
            <div class="footer-wrapper__container">
                <h2 class="footer-wrapper__title title_company">
                    компания
                </h2>
                <a href="{{ route('about_page') }}" class="footer-link">о нас</a>
                <a href="{{ route('contact_page') }}" class="footer-link">контакты</a>
            </div>
            <div class="footer-wrapper__container">
                <div class="footer__logo">
                    <a href="{{ route('home') }}" class="header__link">
                        <img class="header__logo-img" src="{{ asset('/images/logo.png') }}" alt="logo">
                    </a>
                    <p class="footer-year">@php $year = date('Y'); echo $year === '2022' ? $year : "2022-{$year}"; @endphp</p>
                </div>
            </div>
        </div>
    </div>
</footer>
