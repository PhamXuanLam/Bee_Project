@php
    use App\Models\Categories;

    $categories = Categories::categories();

@endphp
<div class="container header-bottom my-md-3">
    <div class="header-bottom_container row align-items-center justify-content-between ">
        <div class="col-sm-3 px-0 mx-0 header-bottom_left row justify-content-center">
            <div class="header-mobile-left">

                <div class="header-bottom_left-container col-sm-8 d-flex justify-content-between">
                    <div>
                        <button class="navigation">
                            <i class="navigation-icon fa-solid fa-bars"></i>
                        </button>
                        <span class="menu" style="font-weight: bold; color: #3d464d;">Danh Mục</span>
                    </div>
                </div>
                <div class="logo-mobile">
                    <img src="./asset/img/logo.jpg" alt="">
                </div>
            </div>
            <div class="header-mobile-right">
                <div class="contact-mobile d-md-none">
                    <span> Gọi miễn phí</span>
                    <span> 0123456789</span>
                </div>
                <div class="cart-mobile d-md-none d-flex align-items-center">
                    <i class="fa-solid fa-cart-shopping"></i>
                </div>
            </div>
        </div>
        <div class="header-content_right col-sm-5 ms-sm-3 d-flex align-items-center">

            <form action="{{route('products-search')}}" method="GET" style="width : 100%;">
            <div class="header-serch">
                    <input name="q" value="{{request()->get('q')}}" class="content-right_search" type="text" placeholder="Tìm kiếm sản phẩm">
                    <button type="submit" class="search">
                        <i class="fa-solid fa-magnifying-glass search-logo"></i>
                        Tìm kiếm
                    </button>
                </div>
            </form>
        </div>
        <div class="icon col-sm-3 d-flex align-items-center position-relative">
            <div class="position-absolute favourite">
                <i style="color: #ffd334;" class="fa-solid fa-heart"></i> <span class="px-2">Yêu Thích</span>
            </div>
            <a href="/cart" class="position-absolute end-0 cart text-decoration-none">
                <i style="color: #ffd334;" class="fa-solid fa-cart-shopping"></i> <span class="px-2">Giỏ Hàng</span>
            </a>
        </div>
    </div>
    <ul class="drop-down ">
        <li class="d-flex justify-content-between drop-down_header d-md-none align-items-center">
            <a href=""><img src="./asset/img/logo.jpg" alt=""></a>
            <div class="drop-down_close">
                <i class="fa-solid fa-xmark"></i>
            </div>
        </li>
        <li class="d-flex drop-down_account d-md-none align-items-center">
            <i class="fa-solid fa-user"></i>
            <span class="mx-3"> Tài khoản của tôi</span>
        </li>
        <div class="drop-down_product">
            <ul>
                @foreach ($categories as $category)
                    <li class="d-flex justify-content-between">
                        <a href="{{ url("c-{$category->id}-{$category->slug}.html") }}">{{ $category->name }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </ul>
</div>
