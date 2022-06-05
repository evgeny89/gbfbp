@extends('layout.index')

@section('content')
    <section class="product">
        <div class="container">
            <div class="product__wrapper">
                <div class="product__header">
                    <div class="header__row">
                        <h1 class="product__name">{{ $product->name }}</h1>
                        <div class="product__price">
                            <div class="product__price-new">
                                {{ $product->price }}
                            </div>
                            <div class="product__price-old">
                                {{ $product->price }}
                            </div>
                        </div>
                    </div>
                    <div class="header__row">
                        <div class="product__model">
                            Артикул: 25687
                        </div>
                        <div class="product__rating">
                            <svg class="rating__icon rating__icon-star" viewBox="0 0 23 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11.5 0L14.0819 7.9463H22.4371L15.6776 12.8574L18.2595 20.8037L11.5 15.8926L4.74047 20.8037L7.32238 12.8574L0.56285 7.9463H8.91809L11.5 0Z" fill="#F731A3"/>
                            </svg>
                            <svg class="rating__icon rating__icon-star" viewBox="0 0 23 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11.5 0L14.0819 7.9463H22.4371L15.6776 12.8574L18.2595 20.8037L11.5 15.8926L4.74047 20.8037L7.32238 12.8574L0.56285 7.9463H8.91809L11.5 0Z" fill="#F731A3"/>
                            </svg>
                            <svg class="rating__icon rating__icon-star" viewBox="0 0 23 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11.5 0L14.0819 7.9463H22.4371L15.6776 12.8574L18.2595 20.8037L11.5 15.8926L4.74047 20.8037L7.32238 12.8574L0.56285 7.9463H8.91809L11.5 0Z" fill="#F731A3"/>
                            </svg>
                            <svg class="rating__icon rating__icon-star" viewBox="0 0 23 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11.5 0L14.0819 7.9463H22.4371L15.6776 12.8574L18.2595 20.8037L11.5 15.8926L4.74047 20.8037L7.32238 12.8574L0.56285 7.9463H8.91809L11.5 0Z" fill="#F731A3"/>
                            </svg>
                            <svg class="rating__icon" viewBox="0 0 23 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11.5 0L14.0819 7.9463H22.4371L15.6776 12.8574L18.2595 20.8037L11.5 15.8926L4.74047 20.8037L7.32238 12.8574L0.56285 7.9463H8.91809L11.5 0Z" fill="#F731A3"/>
                            </svg>
                        </div>
                        <div class="product__reviews">
                            <span class="reviews__text">
                                2 отзыва
                            </span>
                        </div>
                    </div>
                </div>
                <div class="product__images">
                    <div class="main__image">
                        <img src="{{ asset('/images/product_main_image.png') }}" alt="Разноцветные часы" />
                    </div>
                    <div class="sub__images">
                        <div class="sub__image">
                            <img src="{{ asset('/images/product_main_image.png') }}" alt="Разноцветные часы" />
                        </div>
                        <div class="sub__image">
                            <img src="{{ asset('/images/product_main_image.png') }}" alt="Разноцветные часы" />
                        </div>
                        <div class="sub__image">
                            <img src="{{ asset('/images/product_main_image.png') }}" alt="Разноцветные часы" />
                        </div>
                    </div>
                </div>
                <div class="product__buttons">
                    <button class="button__add">
                        додбавить в корзину
                    </button>
                    <button class="button__favorite">
                        <svg viewBox="0 0 45 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M33.75 0C29.063 0 25.5164 2.62961 22.5 5.37745C19.6257 2.46153 15.9371 0 11.25 0C4.64904 0 0 5.42581 0 11.3424C0 14.5164 1.35985 16.8032 2.84904 18.9501L20.3329 38.9892C22.2961 40.9748 22.666 40.9748 24.629 38.9892L42.1523 18.9501C43.9031 16.8032 45 14.5164 45 11.3424C45 5.42588 40.3509 0 33.75 0ZM39.375 18.3936L22.5 37.6421L5.625 18.3142C3.60706 15.6323 2.8125 13.8228 2.8125 11.3424C2.8125 6.72047 6.26485 2.55966 11.25 2.52065C15.3507 2.48839 19.9983 6.49188 22.5 9.51C24.9357 6.59676 29.6493 2.52065 33.75 2.52065C38.6029 2.52065 42.1875 6.72047 42.1875 11.3424C42.1875 13.8228 41.5589 15.7667 39.375 18.3936Z" fill="#AC89DB"/>
                        </svg>
                    </button>
                </div>
                <div class="product__manufacturer">
                    <div class="manufacturer__title">
                        Продавец:
                    </div>
                    <div class="manufacturer__name">
                        {{ $product->shop->name }}
                    </div>
                </div>
                <div class="product__description">
                    <div class="description__title">
                        Описание
                    </div>
                    <div class="description__item">
                        {{ $product->description }}
                    </div>
                    <div class="description__item">
                        <div class="item__title">
                            Вес изделия:
                        </div>
                        {{ $product->weight }}
                    </div>
                    <div class="description__item">
                        <div class="item__title">
                            Материал изделия:
                        </div>
                        {{ $product->material->name }}
                    </div>
                </div>
                <div class="product__reviews">
                    <h3 class="reviews__title">
                        Отзывы
                    </h3>
                    <div class="reviews__wrapper">
                        @foreach($reviews as $review)
                        <div class="review__item">
                            <div class="item__header">
                                <div class="item__author">
                                    {{ $review->user->name }}
                                </div>
                                <div class="item__date">
                                    {{ $review->created_at }}
                                </div>
                            </div>
                            <div class="item__rating">
                                <svg class="rating__icon rating__icon-star" viewBox="0 0 23 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M11.5 0L14.0819 7.9463H22.4371L15.6776 12.8574L18.2595 20.8037L11.5 15.8926L4.74047 20.8037L7.32238 12.8574L0.56285 7.9463H8.91809L11.5 0Z" fill="#F731A3"/>
                                </svg>
                                <svg class="rating__icon rating__icon-star" viewBox="0 0 23 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M11.5 0L14.0819 7.9463H22.4371L15.6776 12.8574L18.2595 20.8037L11.5 15.8926L4.74047 20.8037L7.32238 12.8574L0.56285 7.9463H8.91809L11.5 0Z" fill="#F731A3"/>
                                </svg>
                                <svg class="rating__icon rating__icon-star" viewBox="0 0 23 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M11.5 0L14.0819 7.9463H22.4371L15.6776 12.8574L18.2595 20.8037L11.5 15.8926L4.74047 20.8037L7.32238 12.8574L0.56285 7.9463H8.91809L11.5 0Z" fill="#F731A3"/>
                                </svg>
                                <svg class="rating__icon rating__icon-star" viewBox="0 0 23 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M11.5 0L14.0819 7.9463H22.4371L15.6776 12.8574L18.2595 20.8037L11.5 15.8926L4.74047 20.8037L7.32238 12.8574L0.56285 7.9463H8.91809L11.5 0Z" fill="#F731A3"/>
                                </svg>
                                <svg class="rating__icon" viewBox="0 0 23 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M11.5 0L14.0819 7.9463H22.4371L15.6776 12.8574L18.2595 20.8037L11.5 15.8926L4.74047 20.8037L7.32238 12.8574L0.56285 7.9463H8.91809L11.5 0Z" fill="#F731A3"/>
                                </svg>
                            </div>
                            <div class="item__text">
                                {{ $review->review }}
                            </div>
                        </div>
                        @endforeach
                        </div>
                        <div class="reviews__button">
                            <button class="button__show">
                                показать еще
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
