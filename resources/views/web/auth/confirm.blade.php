@extends("web.layouts.master")
@section("title", "Xác nhận");
@section("content")
<div class="container d-flex justify-content-center">
    {!! Form::open(["url" => url("/codeConfirm"), "class" => "form-container"]) !!}
        @method("POST")
        @csrf
        <div class="title">Code <Span style="color: rgb(224, 224, 55);">Confirm</Span></div>
        @if (session('error'))
            <div class="alert alert-danger text-center">
                {{ session('error') }}
            </div>
        @endif
        <div class="form-group my-3">
            <label for="code-confirm" class="form-label">Mã xác nhận</label>
            <input type="text" name="code_confirm" class="form-control my-1" id="code-confirm" placeholder="Nhập mã xác nhận">
            <input type="hidden" name="email" value="{{ $email }}">
        </div>
        <button class="btn btn-primary btn-sm code-confirm" type="submit">Xác nhận</button>
    {!! Form::close() !!}
</div>
@endsection
