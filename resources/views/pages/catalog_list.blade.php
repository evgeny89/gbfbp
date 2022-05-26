@extends('layout.index')

@section('content')
    <section class="catalog">
        <div class="container">
            @foreach($entries as $entry)
                <div>
                    <a href="{{ route($route_name, [$type => $entry->slug]) }}">{{ $entry->name }}</a>
                </div>
            @endforeach
        </div>
    </section>
@endsection
