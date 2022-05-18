@extends('layout.index')

@section('content')
    <section class="cart">
        <div class="container">
            <div id="cart" class="cart__wrapper" data-data=""></div>
            @push('footer-scripts')
                <script src="{{ mix('/js/cart.js') }}"></script>
            @endpush
        </div>
    </section>
@endsection
