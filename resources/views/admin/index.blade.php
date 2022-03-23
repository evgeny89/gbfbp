@extends('admin.layout.index')

@section('content')
    <div class="container">
        <div class="row wrapper">
            <aside class="col-4 aside">
                <a href="{{ route('home') }}">Hand Made Admin</a>
                <menu class="menu">
                    <li class="menu-link active">Пользователи</li>
                    <li class="menu-link">Категории</li>
                    <li class="menu-link">Материалы</li>
                </menu>
            </aside>
            <section class="col-8">
                <h3 class="title">Пользователи</h3>
            </section>
        </div>
    </div>
@endsection

