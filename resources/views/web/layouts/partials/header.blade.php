<div class="container header">
    <div class="row justify-content-between overflow-hidden header-top">
        <div class="header-left d-flex justify-content-sm-between align-items-center">
            <a href="" class="header_left-link">About</a>
            <a href="/contact" class="header_left-link ">Contact</a>
            <a href="" class="header_left-link ">Help</a>
            <a href="" class="header_left-link ">FAQs</a>
        </div>
        <div class="header-right d-flex justify-content-between align-items-center ">
            @if(\Illuminate\Support\Facades\Auth::check())
                <a href="/account" class="header_right-link">
                    Tài khoản: {{ \Illuminate\Support\Facades\Auth::user()->name }}
                </a>
                {!! Form::open(["url" =>url("/logout"), "id" => "form-logout", "class" => "form-logout"]) !!}
                    {!! Form::submit("Đăng xuất", ['class' => 'btn header_right-link']) !!}
                {!! Form::close() !!}
            @else
                <a href="{{ url("/login") }}" class="header_right-link">Đăng nhập</a>
                <a href="{{ url("/register")}}" class="header_right-link">Đăng ký tài khoản</a>
            @endif
        </div>
    </div>
</div>
<div class="container header-content my-3">
    <div class="row justify-content-between align-items-center">
        <div class="logo col-sm-3 ps-0">
            <a href="{{ url("/") }}" class="header-content_left col-3 ps-0">
                <img src={{ url("/asset/img/logo.jpg") }} alt="" class="content-left_logo">
            </a>
        </div>
        <div class="number-phone col-sm-2 text-center">
            <i class="fa-solid fa-phone"></i>
            0901.633.313
        </div>
    </div>
</div>
