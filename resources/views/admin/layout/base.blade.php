@extends('admin.layout.index')

@section('content')
    <div class="container-fluid">
        <div class="row wrapper">
            <aside class="col-2 aside">
                <a href="{{ route('admin.home') }}">Hand Made Admin</a>
                <div class="menu">
                    <a href="{{ route('admin.users') }}" class="menu-link {{ request()->is('admin/users*') ? 'active' : '' }}">Пользователи</a>
                    <a href="{{ route('admin.categories') }}" class="menu-link {{ request()->is('admin/categories*') ? 'active' : '' }}">Категории</a>
                    <a href="{{ route('admin.materials') }}" class="menu-link {{ request()->is('admin/materials*') ? 'active' : '' }}">Материалы</a>
                    <a href="{{ route('admin.logs') }}" class="menu-link {{ request()->is('admin/logs*') ? 'active' : '' }}">Логи</a>
                    @yield('log-files')
                </div>
            </aside>
            <section class="col-10 workspace">
                @yield('workspace')
            </section>
        </div>
    </div>
@endsection

