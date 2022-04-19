@extends('layout.index')

@section('content')
    <section class="shop">
        <div class="container">
            <div class="shop__wrapper">

                @include('partials.profile_tabs', ['active' => 'shop'])

                @if(empty($user->shop))
                    <div class="shop-create">
                        <div class="shop-create__step active">
                            <p class="shop-create__text">У вас еще нет витрины, но вы можете ее создать!</p>
                            <button id="create-shop-btn" class="shop-create__btn">Создать витрину</button>
                        </div>
                        <div class="shop-create__step">
                            <form action="{{ route('create_shop') }}" method="POST">
                                @csrf
                                <span>Название магазина:</span>
                                @error('name')
                                    <span class="alert alert-danger">{{ $message }}</span>
                                @enderror
                                <input type="text" name="name">
                                <button>Сохранить</button>
                            </form>
                        </div>
                    </div>
                @else
                    product
                @endif
            </div>
        </div>
    </section>
@endsection

@push('footer-scripts')
    {{--  change user data  --}}
    <script>
        const steps = document.querySelectorAll('.shop-create__step')
        const createBtn = document.getElementById('create-shop-btn')

        createBtn.addEventListener('click', () => {
            steps.forEach(el => el.classList.toggle('active'));
        });
    </script>
@endpush
