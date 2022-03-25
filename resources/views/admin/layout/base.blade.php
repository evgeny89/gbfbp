@extends('admin.layout.index')

@section('content')
    <div class="container">
        <div class="row wrapper">
            <aside class="col-4 aside">
                <a href="{{ route('admin.home') }}">Hand Made Admin</a>
                <div class="menu">
                    <a href="{{ route('admin.users') }}" class="menu-link {{ request()->routeIs('admin.users') ? 'active' : '' }}">Пользователи</a>
                    <a href="{{ route('admin.categories') }}" class="menu-link {{ request()->routeIs('admin.categories') ? 'active' : '' }}">Категории</a>
                    <a href="{{ route('admin.materials') }}" class="menu-link {{ request()->routeIs('admin.materials') ? 'active' : '' }}">Материалы</a>
                </div>
            </aside>
            <section class="col-8 workspace">
                @yield('workspace')
            </section>
        </div>
    </div>
@endsection

