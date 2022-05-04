@extends('layout.index')

@section('content')
    <section class="favorite">
        <div class="container">
            <div class="favorite__wrapper">

                @include('partials.profile_tabs', ['active' => 'favorite'])

                {{-- PRODUCTS --}}
                <div class="favorite__products">

                    @include('partials.product_thumb', ['button' => '
                        <span class="button__buy">
                            В корзину
                        </span>
                    '])

                    @include('partials.product_thumb', ['button' => '
                        <span class="button__buy">
                            В корзину
                        </span>
                    '])

                    @include('partials.product_thumb', ['button' => '
                        <span class="button__buy">
                            В корзину
                        </span>
                    '])

                    @include('partials.product_thumb', ['button' => '
                        <span class="button__buy">
                            В корзину
                        </span>
                    '])

                    @include('partials.product_thumb', ['button' => '
                        <span class="button__buy">
                            В корзину
                        </span>
                    '])

                    @include('partials.product_thumb', ['button' => '
                        <span class="button__buy">
                            В корзину
                        </span>
                    '])

                </div>
                {{-- PRODUCTS --}}

            </div>
        </div>
    </section>
@endsection
