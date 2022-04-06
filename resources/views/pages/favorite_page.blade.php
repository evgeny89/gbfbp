@extends('layout.index')

@section('content')
    <section class="favorite">
        <div class="container">
            <div class="favorite__wrapper">

                @include('partials.profile_tabs', ['active' => 'favorite'])

                {{-- PRODUCTS --}}
                <div class="favorite__products">

                    @include('partials.product_thumb')

                    @include('partials.product_thumb')

                    @include('partials.product_thumb')

                    @include('partials.product_thumb')

                    @include('partials.product_thumb')

                    @include('partials.product_thumb')

                </div>
                {{-- PRODUCTS --}}

            </div>
        </div>
    </section>
@endsection
