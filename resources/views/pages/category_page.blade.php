@extends('layout.index')

@section('content')
    <section class="category">
        <div class="container">
            <div id="category" data-category="{{$category}}" data-products="{{$products}}"></div>
            @push('footer-scripts')
                <script src="{{ mix('/js/category.js') }}"></script>
            @endpush
        </div>
    </section>
@endsection
