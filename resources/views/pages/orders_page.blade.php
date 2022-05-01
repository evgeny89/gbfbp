@extends('layout.index')

@section('content')
    <section class="orders">
        <div class="container">
            <div class="orders__wrapper">

                @include('partials.profile_tabs', ['active' => 'orders'])

                {{-- ORDERS --}}
                <div class="orders__row">

                    <div class="order__details">
                        <div class="order__number">
                            № 220328-12
                        </div>
                        <div class="order__status delivered">
                            Доставлен 29 марта
                        </div>
                        <div class="order__total">
                            Сумма к оплате 3700 руб.
                        </div>
                    </div>

                    <div class="order__products">
                        <div class="order__products-item">
                            <div class="item__image">
                                <img src="{{ asset('/images/product_image.png') }}" alt="Разноцветные часы" />
                            </div>
                            <div class="item__name">
                                Разноцветные часы
                            </div>
                        </div>
                        <div class="order__products-item">
                            <div class="item__image">
                                <img src="{{ asset('/images/product_image.png') }}" alt="Разноцветные часы" />
                            </div>
                            <div class="item__name">
                                Разноцветные часы
                            </div>
                        </div>
                        <div class="order__products-item">
                            <div class="item__image">
                                <img src="{{ asset('/images/product_image.png') }}" alt="Разноцветные часы" />
                            </div>
                            <div class="item__name">
                                Разноцветные часы
                            </div>
                        </div>
                        <div class="order__products-item">
                            <div class="item__image">
                                <img src="{{ asset('/images/product_image.png') }}" alt="Разноцветные часы" />
                            </div>
                            <div class="item__name">
                                Разноцветные часы
                            </div>
                        </div>
                        <div class="order__products-item">
                            <div class="item__image">
                                <img src="{{ asset('/images/product_image.png') }}" alt="Разноцветные часы" />
                            </div>
                            <div class="item__name">
                                Разноцветные часы
                            </div>
                        </div>
                        <div class="order__products-item">
                            <div class="item__image">
                                <img src="{{ asset('/images/product_image.png') }}" alt="Разноцветные часы" />
                            </div>
                            <div class="item__name">
                                Разноцветные часы
                            </div>
                        </div>
                        <div class="order__products-item">
                            <div class="item__image">
                                <img src="{{ asset('/images/product_image.png') }}" alt="Разноцветные часы" />
                            </div>
                            <div class="item__name">
                                Разноцветные часы
                            </div>
                        </div>
                        <div class="order__products-item">
                            <div class="item__image">
                                <img src="{{ asset('/images/product_image.png') }}" alt="Разноцветные часы" />
                            </div>
                            <div class="item__name">
                                Разноцветные часы
                            </div>
                        </div>
                    </div>

                </div>

                <div class="orders__row">

                    <div class="order__details">
                        <div class="order__number">
                            № 220328-13
                        </div>
                        <div class="order__status cancelled">
                            Отменен 21 марта
                        </div>
                        <div class="order__total">
                            Сумма к оплате 3700 руб.
                        </div>
                    </div>

                    <div class="order__products">
                        <div class="order__products-item">
                            <div class="item__image">
                                <img src="{{ asset('/images/product_image.png') }}" alt="Разноцветные часы" />
                            </div>
                            <div class="item__name">
                                Разноцветные часы
                            </div>
                        </div>
                        <div class="order__products-item">
                            <div class="item__image">
                                <img src="{{ asset('/images/product_image.png') }}" alt="Разноцветные часы" />
                            </div>
                            <div class="item__name">
                                Разноцветные часы
                            </div>
                        </div>
                        <div class="order__products-item">
                            <div class="item__image">
                                <img src="{{ asset('/images/product_image.png') }}" alt="Разноцветные часы" />
                            </div>
                            <div class="item__name">
                                Разноцветные часы
                            </div>
                        </div>
                        <div class="order__products-item">
                            <div class="item__image">
                                <img src="{{ asset('/images/product_image.png') }}" alt="Разноцветные часы" />
                            </div>
                            <div class="item__name">
                                Разноцветные часы
                            </div>
                        </div>
                        <div class="order__products-item">
                            <div class="item__image">
                                <img src="{{ asset('/images/product_image.png') }}" alt="Разноцветные часы" />
                            </div>
                            <div class="item__name">
                                Разноцветные часы
                            </div>
                        </div>
                        <div class="order__products-item">
                            <div class="item__image">
                                <img src="{{ asset('/images/product_image.png') }}" alt="Разноцветные часы" />
                            </div>
                            <div class="item__name">
                                Разноцветные часы
                            </div>
                        </div>
                    </div>
                </div>
                {{-- ORDERS --}}

            </div>
        </div>
    </section>
@endsection
