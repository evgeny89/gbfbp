@extends('layout.index')

@section('content')
    <div class="container">
        @include('partials.slider')
        {!! $categories !!}
        {!! $materials !!}
    </div>
@endsection
