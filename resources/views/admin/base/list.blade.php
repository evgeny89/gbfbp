@extends('admin.layout.base')

@section('workspace')
    @include('admin.base.title')
    @if(empty($entries->count()))
        <h3>Записей нет в базе данных</h3>
    @else
        <table>
            <thead>
                <tr>
                    @if($buttons['edit'])
                        <td></td>
                    @endif
                    @foreach($columns as $column)
                        <td>{{ $column['text'] }}</td>
                    @endforeach
                    @if($buttons['delete'])
                        <td></td>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach($entries as $entry)
                    <tr>
                        @if($buttons['edit'])
                            <td>
                                <a href="{{ route($routes['get'], ['id' => $entry->id]) }}">edit</a>
                            </td>
                        @endif
                        @foreach($columns as $column)
                            @if(isset($column['relation']))
                                @include($column['type'], ['name' => $entry->{$column['name']}->{$column['relation']}])
                            @else
                                @include($column['type'], ['name' => $entry->{$column['name']}])
                            @endif
                        @endforeach
                        @if($buttons['delete'])
                            <td>
                                <a href="{{ route($routes['delete'], ['id' => $entry->id]) }}">del</a>
                            </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
    @if($buttons['add'])
        <td>
            <a href="{{ route($routes['create']) }}">new</a>
        </td>
    @endif
@endsection
