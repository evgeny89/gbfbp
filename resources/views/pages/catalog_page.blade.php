@extends('layout.index')

@section('content')
    <section class="catalog">
        <div class="container">
            <div id="catalog" data-data="{{$data}}" data-products="{{$products}}"></div>
            @push('footer-scripts')
                <script src="{{ mix('/js/catalog.js') }}"></script>
            @endpush
        </div>
    </section>
@endsection
