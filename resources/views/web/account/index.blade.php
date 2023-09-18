@extends("web.layouts.master")
@section("title", "Thông tin tài khoản")
@section("content")
    <div class="container">
        <div class="row">
            @include('web.account.sidebar')
            <div class="col-sm-9">
                <div class="card">
                    <div class="card-header text-warning text-center">
                        Chỉnh sửa thông tin cá nhân
                    </div>
                    <div class="card-body">
                        <form action="/account" method="POST" enctype='multipart/form-data'>
                            @method("PUT")
                            @csrf
                            <input type="hidden" name="id" value="{{ $user->id }}">
                            @if(session('success'))
                                <input type="hidden" id="alert" value="{{ session('success') }}">
                            @endif
                            <div class="mb-3">
                                <label for="avatar" class="form-label">Avatar</label>
                                <input class="form-control form-control-sm" type="file" id="avatar" name="avatar">
                                @if($errors->has("avatar"))
                                    <p class="text-danger">{{ $errors->first("avatar") }}</p>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control form-control-sm" name="email" id="email" value="{{ $user->email }}">
                                @if($errors->has("email"))
                                    <p class="text-danger">{{ $errors->first("email") }}</p>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="phone_number" class="form-label">Số điện thoại</label>
                                <input type="text" name="phone_number" class="form-control form-control-sm" id="phone_number" value="{{ $user->phone_number }}">
                                @if($errors->has("phone_number"))
                                    <p class="text-danger">{{ $errors->first("phone_number") }}</p>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Địa chỉ</label>
                                <input type="text" name="address" class="form-control form-control-sm" id="address" value="{{ $user->address }}">
                                @if($errors->has("address"))
                                    <p class="text-danger">{{ $errors->first("address") }}</p>
                                @endif
                            </div>
                            <div class="mb-3 text-center">
                                <button type="submit" class="btn btn-sm btn-primary">Cập nhật</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function () {
            const alert = $('#alert').val();
            if (alert) {
                $.alert(alert);
            }
        });
    </script>
@endsection
