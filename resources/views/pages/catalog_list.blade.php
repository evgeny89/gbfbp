@extends('layout.index')

@section('content')
    <section class="catalog__list {{$type == 'category' ? 'catalog__category' : 'catalog__material'}}">
        <div class="container">
            <div class="catalog__title">
                {{$type == 'category' ? 'Категории' : 'Материалы'}}
            </div>
            <div class="catalog__list-wrapper">
                @foreach($entries as $entry)
                    <div class="catalog__item">
                        <a class="item__link" href="{{ route($route_name, [$type => $entry->slug]) }}">
                            <div class="item__image">
                                <img src="{{ $entry->home }}" alt="">
                            </div>
                            <span class="link__text">
                                {{ $entry->name }}
                            </span>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
