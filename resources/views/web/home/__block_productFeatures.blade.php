@if (!empty($productFeatures))
    <div class="product container my-5 ">
        <h3>SẢN PHẨM NỔI BẬT</h3>
        <div class="row mt-3">
            @foreach ($productFeatures as $item)
                @include('web.components.products.items',['item' => $item])
            @endforeach
        </div>
    </div>
@endif
