@extends("web.layouts.master")
@section("title", "Đổi mật khẩu")
@section("content")
    <div class="container">
        <div class="row">
            @include('web.account.sidebar')
            <div class="col-sm-9">
                <div class="card">
                    <div class="card-header text-warning text-center">
                        Đổi mật khẩu
                        @if(session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                    </div>
                    <div class="card-body">
                        <form action="/account/changePassword" method="POST">
                            @csrf
                            @method("PUT")
                            <div class="mb-3">
                                <label for="current_password" class="form-label">Mật khẩu cũ</label>
                                <input class="form-control form-control-sm" type="password" id="current_password" name="current_password">
                                @if($errors->has("current_password"))
                                    <p class="text-danger">{{ $errors->first("current_password") }}</p>
                                @endif
                                @if(session('current_password'))
                                    <p class="text-danger">{{ session('current_password') }}</p>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Mật khẩu mới</label>
                                <input class="form-control form-control-sm" type="password" id="password" name="password">
                                @if($errors->has("password"))
                                    <p class="text-danger">{{ $errors->first("password") }}</p>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">Xác nhận mật khẩu mới</label>
                                <input class="form-control form-control-sm" type="password" id="password_confirmation" name="password_confirmation">
                                @if($errors->has("password_confirmation"))
                                    <p class="text-danger">{{ $errors->first("password_confirmation") }}</p>
                                @endif
                                @if(session('password_confirmation'))
                                    <p class="text-danger">{{ session('password_confirmation') }}</p>
                                @endif
                            </div>
                            <div class="mb-3 text-center">
                                <button type="submit" class="btn btn-sm btn-primary">Đổi mật khẩu</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
