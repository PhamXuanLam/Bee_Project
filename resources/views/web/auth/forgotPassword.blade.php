@extends("web.layouts.master")
@section("title", "Quên mật khẩu");
@section("content")
<div class="container d-flex justify-content-center">
    {!! Form::open(["url" => url("/confirmEmail"), "class" => "form-container"]) !!}
        @method("POST")
        @csrf
        <div class="title">Confirm <Span style="color: rgb(224, 224, 55);">Email</Span></div>
        @if (session('error'))
            <div class="alert alert-danger text-center">
                {{ session('error') }}
            </div>
        @endif
        <div class="form-group my-3">
            {!! Form::label("Email đăng ký") !!}
            {!! Form::text("email", null, ["class" => "form-control my-1", "id" => "email", "placeholder" => "Nhập Email đăng ký tài khoản"])!!}
        </div>
        {!! Form::submit('Xác nhận', ["class" => "btn btn-primary"]) !!}
    {!! Form::close() !!}
</div>
@endsection
