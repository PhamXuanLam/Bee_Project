<div class="col-3 product-item py-2 px-2">
    <a href="/p{{ $item->id }}-{{ $item->slug }}.html" class="product-item_content d-flex flex-column align-items-center">
        <img src="{{ asset($item->image) }}" title="{{ $item->name }}" alt="{{ $item->slug }}" class="product-img mt-3">
        <div class="product-infor d-flex flex-column align-items-center mt mt-3">
            <div class="info-name">
                {{ $item->name }}
            </div>
            <div class="product_price mt-2 d-flex ">
                <span> {{ number_format($item->price, 0, ',', '.') }}VND </span>
            </div>
            <div class="rates mt-2 d-flex">
                <div class="rates-stars">
                    @include('web.components.rates_star.star', ['item' => $item])
                </div>
                <div class="rates-total ms-1">
                    <span class="total-review" style="color:rgb(136, 132, 132); ;"> ({{ $item->rate_count }})</span>
                </div>
            </div>
        </div>
    </a>
</div>
