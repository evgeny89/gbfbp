@extends('layout.index')

@section('content')
    <div class="form-register px-6 py-4 max-w-6xl">
        <form action="{{ route('login') }}" method="POST" class="grid grid-cols-1">
            @csrf
            <div class="form-register__wrapper px-6 py-4">
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">{{ $error }}</div>
                @endforeach
            </div>

            <div class="form-register__wrapper px-6 py-4">
                <input type="text" name="email" placeholder="e-mail адрес" class="h-8" value="{{old('email')}}">
            </div>

            <div class="form-register__wrapper px-6 py-4">
                <input type="password" name="password" placeholder="пароль" class="h-8">
            </div>

            <div class="form-register__wrapper px-6 py-4">
                <button class="h-8">войти</button>
            </div>
        </form>
    </div>
@endsection
