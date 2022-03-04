@extends('layout.index')

@section('content')
    <div class="form-register px-6 py-4 max-w-6xl">
        <form action="{{ route('register') }}" method="POST" class="grid grid-cols-1">
            @csrf
            <div class="form-register__wrapper px-6 py-4">
                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <input type="text" name="name" placeholder="name" class="h-8" value="{{old('name')}}">
            </div>

            <div class="form-register__wrapper px-6 py-4">
                @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <input type="text" name="email" placeholder="e-mail адрес" class="h-8" value="{{old('email')}}">
            </div>

            <div class="form-register__wrapper px-6 py-4">
                @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <input type="text" name="password" placeholder="пароль" class="h-8">
            </div>

            <div class="form-register__wrapper px-6 py-4">
                @error('password_confirmation')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <input type="text" name="password_confirmation" placeholder="подтвердите пароль" class="h-8">
            </div>

            <div class="form-register__wrapper px-6 py-4">
                <button class="h-8">зарегистрироваться</button>
            </div>
        </form>
    </div>
@endsection
