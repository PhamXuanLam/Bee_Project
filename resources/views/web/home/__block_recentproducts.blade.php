<div class="recent-product container my-5 ">
    <h3>SẢN PHẨM GẦN ĐÂY</h3>
    <div class="row mt-3">
        @foreach ($recentProducts as $item)
            @include('web.components.products.items',['item' => $item])
        @endforeach
    </div>
</div>
