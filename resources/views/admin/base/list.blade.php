@extends('admin.layout.base')

@section('workspace')
    @include('admin.base.title')
    @if(empty($entries->count()))
        <h3>Записей нет в базе данных</h3>
    @else
        <table>
            <thead>
                <tr>
                    <td></td>
                    @foreach($columns as $column)
                        <td>{{ $column['text'] }}</td>
                    @endforeach
                    <td></td>
                </tr>
            </thead>
            <tbody>
                @foreach($entries as $entry)
                    <tr>
                        <td>
                            <a href="{{ route('admin.user', ['id' => $entry->id]) }}">edit</a>
                        </td>
                        @foreach($columns as $column)
                            @if(isset($column['relation']))
                                @include($column['type'], ['name' => $entry->{$column['name']}->{$column['relation']}])
                            @else
                                @include($column['type'], ['name' => $entry->{$column['name']}])
                            @endif
                        @endforeach
                        <td>del</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
