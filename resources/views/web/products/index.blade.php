@extends("web.layouts.master")
@section("title", "Products Page")
@section("content")
    <div class="container categories p-0">
        <div class="path mt-4">
            Trang chủ / {{ $category->name }}
        </div>
        <div class="row">
            <div class="filter col-sm-3">
                <div class="title mt-4 d-flex justify-content-between">
                    <div>LỌC THEO GIÁ</div>
                    <span></span>
                </div>
                <form action="{{ url("/c-$category->id-$category->slug.html") }}" class="form-control border-0" style="background: #f8f8f8">
                    <div class="option mt-4">
                        <div class="d-flex justify-content-between">
                            <div class="choose">
                                <input id="choose1" type="checkbox" name="price" value="{{ \App\Models\Categories::KeyPrice[0] }}">
                                <label for="choose1">{{ \App\Models\Categories::PriceRange['all'] }}</label>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div class="choose">
                                <input id="choose2" type="checkbox" name="price" value="{{ \App\Models\Categories::KeyPrice[1] }}">
                                <label for="choose2">{{ \App\Models\Categories::PriceRange['0-5'] }}</label>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div class="choose">
                                <input id="choose3" type="checkbox" name="price" value="{{ \App\Models\Categories::KeyPrice[2] }}">
                                <label for="choose3">{{ \App\Models\Categories::PriceRange['5-10'] }}</label>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div class="choose">
                                <input id="choose4" type="checkbox" name="price" value="{{ \App\Models\Categories::KeyPrice[3] }}">
                                <label for="choose4">{{ \App\Models\Categories::PriceRange['10-20'] }}</label>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div class="choose">
                                <input id="choose5" type="checkbox" name="price" value="{{ \App\Models\Categories::KeyPrice[4] }}">
                                <label for="choose5">{{ \App\Models\Categories::PriceRange['20-30'] }}</label>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div class="choose">
                                <input id="choose6" type="checkbox" name="price" value="{{ \App\Models\Categories::KeyPrice[5] }}">
                                <label for="choose6">{{ \App\Models\Categories::PriceRange['30-max'] }}</label>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="products col-sm-9 row">
                <div class="function d-flex justify-content-end mt-3">
                    <form action="/c-{{$category->id}}-{{$category->slug}}.html" class="search-sort form-control d-flex border-0" style="width: 50%; background: #f8f8f8">
                        @csrf
                        @method("GET")
                        <select style="height: 30px" name="sort" id="" class="form-select form-control form-control-sm mx-3">
                            <option value="asc">Giá từ thấp lên cao</option>
                            <option value="desc">Giá từ cao xuống thấp</option>
                        </select>
                        <button style="width: 30%; height: 30px" type="submit" id="search"
                                class="form-control form-control-sm btn-primary btn btn-sm">Tìm kiếm</button>
                    </form>
                </div>
                @foreach($products as $product)
                        <div class="col-sm-4 product-item px-2 py-2">
                            <a href="/p{{ $product->id }}-{{ $product->slug }}.html" class="product-item_content d-flex flex-column align-items-center">
                                <img src="{{ asset($product->image) }}"
                                     alt="{{ $product->slug }}"
                                     title="{{ $product->name }}"
                                     class="product-img mt-3">
                                <div class="product-infor d-flex flex-column align-items-center mt mt-3">
                                    <div class="info-name">
                                        {{ $product->name }}
                                    </div>
                                    <div class="product_price mt-2 d-flex ">
                                        <span>{{ number_format($product->price,0,",",".") }}VND</span>
                                        <div class="old-price ms-3 disabled">
                                            <span>{{ number_format($product->price,0,",",".") }}VND</span>
                                        </div>
                                    </div>
                                    <div class="rates mt-2">
                                        @include('web.components.rates_star.star', ['item' => $product])
                                        <span class="total-review" style="color:rgb(136, 132, 132); ;"> ({{ $product->rate_count }})</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                @endforeach
                <div class="d-flex justify-content-center">
                    {{$products->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function () {
            let price = []
            for (let i = 1; i <= 6; i++) {
                $('#choose' + i).on('click', function () {
                    const that = this;
                    if ($(this).prop('checked') === true) {
                        price.push($(that).val());
                    } else {
                        price = price.filter(item => item !== $(that).val());
                    }
                });
            }
            $('#search').on('click', function () {
                $('.search-sort').append('<input type="hidden" name="price" value=' + price + '>');
            });
        });
    </script>
@endsection
