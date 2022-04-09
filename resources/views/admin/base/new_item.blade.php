@extends('admin.layout.base')

@section('workspace')
    <form action="{{ route($routes['save']) }}" method="post">
        @csrf
        @foreach($fields as $field)
            @include($field['type'], ['field' => $field])
        @endforeach
        <button type="submit">save</button>
    </form>
@endsection
