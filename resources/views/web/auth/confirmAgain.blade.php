@extends("web.layouts.master")
@section("title", "Xác nhận lại");
@section("content")
<div class="container d-flex justify-content-center">
    {!! Form::open(["url" => url("/confirmAgain"), "class" => "form-container"]) !!}
        @method("POST")
        @csrf
        <div class="title">Confirm <Span style="color: rgb(224, 224, 55);">Again</Span></div>
        <div class="alert alert-danger text-center">
            {{ $error }}
        </div>
        <input type="hidden" name="email" value="{{ $email }}">
        <button type="submit" class="btn btn-warning btn-sm confirm-again my-3">Gửi lại mã</button>
    {!! Form::close() !!}
</div>
@endsection
