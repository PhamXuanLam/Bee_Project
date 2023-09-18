<div class="categories container my-5">
    <h3>DANH MỤC</h3>
    <div class="row mt-3 flex-wrap">
        @foreach ($categories as $category)
            <a href="{{ url("c-{$category->id}-{$category->slug}.html") }} "
               class="col-sm-3 categories-item my-2 d-flex align-items-center ms-4 ">
                <div class="categories-img">
                    <img src="{{ asset($category->image) }}" alt="">
                </div>
                <div class="categories-product d-flex flex-column justify-content-center">
                    <div class="product-name mb-2">
                        {{ $category->name }}
                    </div>
                </div>
            </a>
        @endforeach
    </div>
</div>
