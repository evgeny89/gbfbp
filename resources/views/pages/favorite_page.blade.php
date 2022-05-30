@extends('layout.index')

@section('content')
    <section class="favorite">
        <div class="container">
            <div class="favorite__wrapper">

                @include('partials.profile_tabs', ['active' => 'favorite'])

                {{-- PRODUCTS --}}
                <div class="favorite__products">
                    @foreach(\App\Models\Product::take(5)->get() as $product)
                        @include('partials.product_thumb', ['product' => $product])
                    @endforeach
                </div>
                {{-- PRODUCTS --}}

            </div>
        </div>
    </section>
@endsection
