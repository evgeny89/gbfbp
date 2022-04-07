@extends('layout.index')

@section('content')
    <section class="profile">
        <div class="container">
            <div class="profile__wrapper">

                @include('partials.profile_tabs', ['active' => 'profile'])

                {{-- USER DATA --}}
                <div class="profile__data">
                    <div class="user__photo">
                        <div class="photo__wrapper">
                            <img src="{{ asset('/images/svg/camera.svg') }}" class="icon__camera" alt="user_photo">
                        </div>
                    </div>
                    <div class="user__data">
                        <div class="data__input">
                            <div class="input__title">Имя: </div>
                            <div class="input__text">
                                Иванов Иван Иванович
                                <img class="icon__edit" src="{{ asset('/images/svg/pencil.svg') }}"/>
                            </div>
                            <input type="hidden" name="user_name">
                        </div>
                        <div class="data__input">
                            <div class="input__title">E-mail: </div>
                            <div class="input__text">
                                test@test.com
                                <img class="icon__edit" src="{{ asset('/images/svg/pencil.svg') }}"/>
                            </div>
                            <input type="hidden" name="user_email">
                        </div>
                        <div class="data__input">
                            <div class="input__title">Телефон: </div>
                            <div class="input__text">
                                +7(123)4567890
                                <img class="icon__edit" src="{{ asset('/images/svg/pencil.svg') }}"/>
                            </div>
                            <input type="hidden" name="user_telephone">
                        </div>
                    </div>
                </div>
                {{-- USER DATA --}}

                {{-- USER CARDS --}}
                <div class="profile__cards">
                    <h2 class="cards__title">
                        Банковские карты
                    </h2>
                    <div class="cards__wrapper">
                        <div class="user__card">
                            <div class="card__title title__button">
                                Сделать основной
                            </div>
                            <div class="card__body">
                                <div class="card__number">
                                    1234********6789
                                </div>
                                <div class="card__logo">
                                    <img class="card__image" src="{{ asset('/images/svg/card_visa.svg') }}" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="user__card">
                            <div class="card__title">
                                Основная карта
                            </div>
                            <div class="card__body">
                                <div class="card__number">
                                    1234********6789
                                </div>
                                <div class="card__logo">
                                    <img class="card__image" src="{{ asset('/images/svg/card_mir.svg') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- USER CARDS --}}

                {{-- BUTTON LOGOUT --}}
                <div class="profile__buttons">
                    <span class="button__logout">
                        <span>Выйти</span>
                        <img class="icon__logout" src="{{ asset('/images/svg/logout.svg') }}" alt="logout"/>
                    </span>
                </div>
                {{-- BUTTON LOGOUT --}}

            </div>
        </div>
    </section>
@endsection
