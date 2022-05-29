@extends('layout.index')

@section('content')
    @include('partials.catalog_list', [
                'entries' => $entries,
                'route_name' => $route_name,
                'type' => $type
            ])
@endsection
