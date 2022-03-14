<div class="register-block container">
    <h1 class="register-block__title" >Войти</h1>
    <div class="register-form px-6">
        <form action="{{ route('login') }}" method="POST" class="px-4">
            @csrf
            <div class="register-form__wrapper">
                <input type="text" name="email" placeholder="e-mail адрес" class="register-form__input" value="{{old('email')}}">
                @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="register-form__wrapper">
                <input type="password" name="password" placeholder="пароль" class="register-form__input">
                @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <button class="register-form__button fs-5">войти</button>
            
            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="register-form__button_link ">регистрация</a> 
            @endif
        </form>
    </div>
</div>