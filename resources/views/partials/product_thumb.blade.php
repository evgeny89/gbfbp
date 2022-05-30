@php($show_btn = $favorite ?? true)
<div class="product__thumb" data-product-id="{{ $product->id }}">
    <div class="image__wrapper">
        @if($show_btn)
            <div class="button__remove">
                <div class="remove__icon"></div>
            </div>
        @endif
        <img src="{{ $product->images()->first()->medium_image }}" class="product__image" alt="{{ $product->name }}"/>
    </div>
    <div class="product__caption">
        <div class="product__price">
            {{ $product->price }}
        </div>
        @if($show_btn)
            <div class="product__name">
                {{ $product->name }}
            </div>
            <div class="product__buttons">
                <button class="button__buy">В корзину</button>
            </div>
        @endif
    </div>
</div>
