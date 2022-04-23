@extends('layout.index')

@section('content')
    <section class="profile">
        <div class="container">
            <div class="profile__wrapper">

                @include('partials.profile_tabs', ['active' => 'profile'])

                {{-- USER DATA --}}
                <div class="profile__data">
                    <form action="{{ route('profile_update_photo') }}" method="post" class="form__user-image" enctype="multipart/form-data">
                        @csrf
                        @error('image')
                            <span class="alert alert-danger">{{ $message }}</span>
                        @enderror
                        <div class="user__photo">
                            <label class="user__photo-input">
                                @if($user->photo)
                                    <img src="{{ $user->small_avatar }}" alt="photo {{ $user->name }}" width="150" height="150">
                                @endif
                                <input type="file" name="image" class="file-input">
                                <img src="{{ asset('/images/svg/camera.svg') }}" class="icon__camera" alt="upload icon" width="53" height="50">
                            </label>
                        </div>
                    </form>
                    <div class="user__data">
                        <form action="{{ route('profile_update_data') }}" method="post" class="form__user-data">
                            @csrf
                            <div class="data__input">
                                <div class="input__title">Имя:</div>
                                <div class="input__text">
                                    <input type="text" value="{{ $user->name }}" name="name" class="input__text-data" oninput="this.size = this.value.length">
                                    <span class="input__text-span">{{ $user->name }}</span>
                                    <svg class="icon__edit" width="22" height="22" viewBox="0 0 22 22" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M1.19866 16.3345L5.55453 20.6904L5.44634 20.9068L0.00292969 22L1.09047 16.5566L1.19866 16.3345ZM1.97303 15.5317L6.36307 19.9217L18.6848 7.60006L14.2947 3.21002L1.97303 15.5317ZM21.3438 1.9573L20.0342 0.653381C19.1631 -0.217794 17.8592 -0.217794 16.988 0.653381L15.1374 2.50391L19.4933 6.85979L21.3438 5.00925C22.215 4.13808 22.215 2.72028 21.3438 1.9573Z"/>
                                    </svg>
                                    @error('name')
                                        <span class="alert alert-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <input type="hidden" name="user_name">
                            </div>
                            <div class="data__input">
                                <div class="input__title">E-mail:</div>
                                <div class="input__text">
                                    <input type="text" value="{{ $user->email }}" name="email" class="input__text-data"  oninput="this.size = this.value.length">
                                    <span class="input__text-span">{{ $user->email }}</span>
                                    <svg class="icon__edit" width="22" height="22" viewBox="0 0 22 22" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M1.19866 16.3345L5.55453 20.6904L5.44634 20.9068L0.00292969 22L1.09047 16.5566L1.19866 16.3345ZM1.97303 15.5317L6.36307 19.9217L18.6848 7.60006L14.2947 3.21002L1.97303 15.5317ZM21.3438 1.9573L20.0342 0.653381C19.1631 -0.217794 17.8592 -0.217794 16.988 0.653381L15.1374 2.50391L19.4933 6.85979L21.3438 5.00925C22.215 4.13808 22.215 2.72028 21.3438 1.9573Z"/>
                                    </svg>
                                    @error('email')
                                        <span class="alert alert-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <input type="hidden" name="user_email">
                            </div>
                            <div class="data__input">
                                <div class="input__title">Телефон:</div>
                                <div class="input__text">
                                    <input type="text" value="{{ $user->phone }}" name="phone" class="input__text-data"  oninput="this.size = this.value.length">
                                    <span class="input__text-span">{{ $user->phone }}</span>
                                    <svg class="icon__edit" width="22" height="22" viewBox="0 0 22 22" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M1.19866 16.3345L5.55453 20.6904L5.44634 20.9068L0.00292969 22L1.09047 16.5566L1.19866 16.3345ZM1.97303 15.5317L6.36307 19.9217L18.6848 7.60006L14.2947 3.21002L1.97303 15.5317ZM21.3438 1.9573L20.0342 0.653381C19.1631 -0.217794 17.8592 -0.217794 16.988 0.653381L15.1374 2.50391L19.4933 6.85979L21.3438 5.00925C22.215 4.13808 22.215 2.72028 21.3438 1.9573Z"/>
                                    </svg>
                                    @error('phone')
                                        <span class="alert alert-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <input type="hidden" name="user_telephone">
                            </div>
                        </form>
                    </div>
                </div>
                {{-- USER DATA --}}

                {{-- USER CARDS --}}
                <div class="profile__cards">
                    <h2 class="cards__title">
                        Банковские карты
                    </h2>
                    <div class="cards__wrapper">
                        @error('set-card')
                            <span class="alert alert-danger">{{ $message }}</span>
                        @enderror
                        @forelse($user->paymentCards as $card)
                            <div class="user__card">
                                <div class="card__title">
                                    @if($card->id === $user->favorite_card_id)
                                        Основная карта
                                    @else
                                        <a href="{{ route('set_favorite_card', ['card' => $card->id]) }}" class="title__button">Сделать основной</a>
                                    @endif
                                </div>
                                <div class="card__body">
                                    <div class="card__number">
                                        {{ $card->numberFroShow }}
                                    </div>
                                    <div class="card__logo">
                                        <img class="card__image" src="{{ $card->paymentIcon }}" alt="">
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p class="empty-cards">No cards</p>
                        @endforelse
                    </div>
                </div>
                {{-- USER CARDS --}}

                {{-- BUTTON LOGOUT --}}
                <div class="profile__buttons">
                    <a href="{{ route('logout') }}" class="button__logout logout__link">
                        Выйти
                        @include('icons.logout')
                    </a>
                </div>
                {{-- BUTTON LOGOUT --}}

            </div>
        </div>
    </section>
@endsection

@push('footer-scripts')
    {{--  change user data  --}}
    <script src="{{ mix('/js/vendors/imask.min.js') }}"></script>
    <script>
        const iconsEdit = document.querySelectorAll('.icon__edit')
        const inputEdit = document.querySelectorAll('.input__text-data')
        const formData = document.querySelector('.form__user-data')
        const phoneInput = document.querySelector('.input__text-data[name="phone"]')

        IMask(phoneInput, {
                mask: '+{7}(000)000-00-00'
            });
        document.querySelector('.input__text-data[name="phone"] + .input__text-span').innerHTML = phoneInput.value

        iconsEdit.forEach(icon => {
            icon.addEventListener('click', (e) => {
                const input = e.target.closest('.input__text').querySelector('.input__text-data')
                input.classList.add('active')
                input.focus()
                input.selectionStart = 0
                input.selectionEnd = input.value.length
            })
        })
        inputEdit.forEach(input => {
            input.addEventListener('input', (e) => {
                e.target.closest('.input__text').querySelector('.input__text-span').innerHTML = e.target.value
            })
            input.addEventListener('blur', (e) => {
                e.target.classList.remove('active')
                formData.submit()
            })
            input.addEventListener('keydown', (e) => {
                if (e.keyCode === 13) {
                    e.target.blur()
                    formData.submit()
                }
            })
        })
        document.querySelector('.file-input').addEventListener('change', (e) => {
            if (e.currentTarget.files.length) {
                document.querySelector('.form__user-image').submit();
            }
        })
    </script>
@endpush
