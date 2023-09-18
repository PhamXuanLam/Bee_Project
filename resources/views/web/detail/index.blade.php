@extends('web.layouts.master')
@section('title', 'Sản phẩm : '. $product->name)
@section('content')
    <div class="detail container my-5">
        <input type="hidden" id="login" value={{ \Illuminate\Support\Facades\Auth::check() ? 'true' : 'false' }}>
        <div class="row">
            <div id="productImageCarousel" class="carousel slide detail-img col-sm-6 text-center" data-bs-ride="carousel">
                @if($product->images->count() > 1)
                <div class="carousel-inner">
                    @foreach($product->images as $image)
                        <div class="carousel-item active">
                            <img src="{{ asset($image->path) }}" class="img" title="{{ $image->name }}"
                                 alt="{{ $image->name }}">
                        </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#productImageCarousel"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true" style="background-color: #333;"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#productImageCarousel"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true" style="background-color: #333;"></span>
                    <span class="visually-hidden">Next</span>
                </button>
                @else
                    <div class="carousel-item active">
                        <img src="{{ asset($product->image) }}" class="img" title="{{ $product->name }}"
                             alt="{{ $product->slug }}">
                    </div>
                @endif
            </div>
            <div class="product-detail col-6">
                <div class="detail-name  my-3">
                    {{ $product->name }}
                </div>
                <div class="detal-reating  my-3">
                    @include('web.components.rates_star.star', ['item' => $product])
                    <span class="total-review" style="color:rgb(136, 132, 132);"> ({{$reviews->count()}} lượt đánh giá)</span>
                </div>
                <div class="detail-price  my-3">
                    {{ number_format($product->price, 0, ',', '.') }} VND
                </div>
                <p>
                    {{ $product->description }}
                </p>
                <form action="/cart" method="post">
                    @csrf
                    <div class="detail-qty d-flex">
                        <input type="hidden" name="productId" value="{{ $product->id }}">
                        <button type="button" class="less">-</button>
                        <span class="qty">1</span>
                        <button type="button" class="add">+</button>
                        <button type="submit" class="add-to-cart mx-4" style="width: 40%">
                            <i class="fa-solid fa-cart-shopping"></i>
                            Thêm vào giỏ hàng
                        </button>
                        <input type="hidden" name="qty" id="qty">
                        <button id="btn-favourite" type="button" class="btn btn-info"
                                style="background: #ffd334; border-radius: 0; border: none; width: 30%">
                            <i class="fa-solid fa-heart"></i>
                            Yêu thích
                        </button>
                    </div>
                </form>
                    <input id="productId" type="hidden" name="productId" value="{{ $product->id }}">

                <div class="detal-share d-flex my-3 ">
                    Share on :
                    <div class="shaer-link ms-3"><i class="fa-brands fa-facebook-f"></i></div>
                    <div class="shaer-link ms-3"><i class="fa-brands fa-twitter"></i></div>
                    <div class="shaer-link ms-3"><i class="fa-brands fa-instagram"></i></div>
                    <div class="shaer-link ms-3"><i class="fa-brands fa-tiktok"></i></div>

                </div>
            </div>
        </div>
    </div>
    <div class="review container p-0">
        <div class="review-header ">
            <button class="description">Mô tả sản phẩm</button>
            <button class="reviews">Đánh giá ({{ $reviews->count() }})</button>
        </div>
        <div class="review-container my-5">
            <div id="reviews" class="left row">
                <div class="left col-sm-7">
                    <div class="qty-review mb-3"><span>{{ $reviews->count() }}</span> Đánh giá cho
                        <span>{{ $product->name }}</span>
                    </div>
                    @foreach ($reviews as $review)
                        <div class="review-info d-flex">
                            <div class="review-info-avt">
                                <img src="{{ asset($review->user->avatar) }}" alt="avatar">
                            </div>
                            <div class="review-info-detail ms-3">
                                <div class="name">{{ $review->user->name }}</div>
                                <div class="rates-stars">
                                    @include('web.components.rates_star.star', ['item' => $review])
                                </div>
                                <div class="comment">
                                    {{ $review->content }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="right col-sm-5">
                    <form class="border p-5" action="">
                        <span class="a">Nhận xét của bạn</span>
                        <div class="rating my-3">
                            Đánh giá * :
                            @for ($i = 1; $i <= 5; $i++)
                                <i class="fa-regular fa-star" id="star-{{ $i }}"
                                    data-rate="{{ $i }}"></i>
                            @endfor
                        </div>
                        <div class="form-group">
                            <textarea name="content" id="message" placeholder="Nhận xét của bạn" cols="80" rows="10"
                                class="form-control mt-3"></textarea>
                            <button type="button" id="rate" class="btn btn-primary mt-3">Gửi đánh giá</button>
                        </div>
                    </form>
                </div>
            </div>
            <div id="description" class="left row">
                <span>
                    {{ $product->content}}
                </span>
            </div>
        </div>
    </div>
    <div class="product container my-5 ">
        <span style="color :#333"> Có thể bạn sẽ thích</span>
        <div class="row mt-3">
            @foreach ($products as $item)
                @include('web.components.products.items', ['item' => $item])
            @endforeach
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function() {

            function rate(star) {
                for (let i = 1; i <= 5; i++) {
                    if (i <= star) {
                        $('#star-' + i).removeClass('fa-regular').addClass('fa-solid');
                    } else {
                        $('#star-' + i).removeClass('fa-solid').addClass('fa-regular');
                    }
                }
            }

            $('.less').on('click', function() {
                let qty = parseInt($('.qty').html());
                if (qty > 1) {
                    $('.qty').html(qty - 1);
                }
            });

            $('.add').on('click', function() {
                let qty = parseInt($('.qty').html());
                $('.qty').html(qty + 1);
            });

            $('.add-to-cart').on('click', function() {
                let qty = parseInt($('.qty').html());
                $('#qty').val(qty);
            });

            let totalStar;
            for (let i = 1; i <= 5; i++) {
                $('#star-' + i).on('click', function() {
                    let star = parseInt($(this).attr('data-rate'));
                    totalStar = star;
                    rate(star);
                });
            }

            $("#rate").on('click', function() {
                const login = $('#login').val();
                if (login === "false") {
                    $.confirm({
                        title: 'Chưa đăng nhập !',
                        content: 'Bạn cần đăng nhập để đánh giá sản phẩm !',
                        buttons: {
                            okay: function() {
                                location.href = "/login";
                            },
                        }
                    });
                } else {
                    $.ajax({
                        url: "/products/reviews",
                        method: "POST",
                        data: {
                            rate: totalStar,
                            content: $('#message').val(),
                            product_id: {{ $product->id }}
                        },
                        success: function(response) {
                            $.alert(response.success);
                        },
                    });
                }
            });

            $('.reviews').attr('style', 'border: 1.6px solid; border-bottom: none; background: #f0f0f0');
            $('#description').hide();

            $('.description').on('click', function () {
                $(this).attr('style', 'border: 1.6px solid; border-bottom: none; background: #f0f0f0');
                $('#description').show();
                $('#reviews').hide();
                $('.reviews').removeAttr('style');
            });

            $('.reviews').on('click', function () {
                $(this).attr('style', 'border: 1.6px solid; border-bottom: none; background: #f0f0f0');
                $('#reviews').show();
                $('.description').removeAttr('style');
                $('#description').hide();
            });
        });

        $('#btn-favourite').on('click', function() {
            const login = $('#login').val();
            if (login === "false") {
                $.confirm({
                    title: 'Chưa đăng nhập !',
                    content: 'Bạn cần đăng nhập để yêu thích sản phẩm !',
                    buttons: {
                        okay: function() {
                            location.href = "/login";
                        },
                    }
                });
            } else {
                $.confirm({
                    title: 'Thêm sản phẩm yêu thích',
                    content: 'Bạn có chắc muốn thêm sản phẩm này không?',
                    buttons: {
                        Yes: function() {
                            $.ajax({
                                url: '/favourite',
                                method: 'POST',
                                data: {
                                    productId: $('#productId').val(),

                                },
                                success: function(response) {
                                    if (response.status === true) {
                                        $.alert(response.message);
                                    }
                                },
                            });
                        },
                        No: function() {
                            return;
                        },
                    }
                });
            }

        });
    </script>
@endsection
