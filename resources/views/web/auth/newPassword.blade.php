@extends("web.layouts.master")
@section("title", "Mật khẩu mới");
@section("content")
<div class="text-center container">
    <div>
        <h1 class="text-success">Mật khẩu mới của bạn là: {{ $newPassword }}</h1>
    </div>
    <div class="d-flex justify-content-center">
        <a href="/login" class="btn btn-primary btn-sm mx-3">Đăng nhập</a>
        <a href="/account/changePassword" class="btn btn-primary btn-sm mx-3">Đổi mật khẩu</a>
    </div>
</div>
@endsection
