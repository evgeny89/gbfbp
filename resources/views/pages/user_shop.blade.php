@extends('layout.index')

@section('content')
    <section class="shop">
        <div class="container">
            <div class="shop__wrapper">
                @include('partials.profile_tabs', ['active' => 'shop'])

                <div id="shop" data-data="{{$data}}"></div>
                @push('footer-scripts')
                    <script src="{{ mix('/js/shop.js') }}"></script>
                @endpush
            </div>
        </div>
    </section>
@endsection
