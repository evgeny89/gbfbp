@extends('layout.index')

@section('content')
    <div class="container">
        @include('partials.slider')
        {!! $categories !!}
        {!! $materials !!}
        <div class="favorite__products">
            @foreach($products as $product)
                @include('partials.product_thumb', ['product' => $product, 'favorite' => false])
            @endforeach
        </div>
    </div>
@endsection
