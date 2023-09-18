@extends('web.layouts.master')
@section('title', 'Đăng Kí')
@section('content')
    <div class="container d-flex justify-content-center">
        <div class="card" style="width: 400px;">
            <div class="card-header d-flex justify-content-center align-items-center">
                <h4 class="m-0" >Đăng Kí</h4>
            </div>

            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger"> Dữ Liệu Bị Lỗi </div>
                @endif
                {!! Form::open(['route' => 'postRegister']) !!}
                <div class="form-group my-3">
                    {{ Form::label('name', 'Họ và Tên', ['class' => 'control-label my-1']) }}
                    {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Vui lòng nhập họ và tên của bạn']) }}
                </div>
                @error('name')
                    <div class="text-danger"> {{ $message }}</div>
                @enderror
                <div class="form-group my-3">
                    {{ Form::label('username', 'Tên đăng nhập', ['class' => 'control-label my-1']) }}
                    {{ Form::text('username', null, ['class' => 'form-control', 'placeholder' => 'Vui lòng nhập tên đăng nhập ']) }}
                </div>
                @error('username')
                    <div class="text-danger"> {{ $message }}</div>
                @enderror
                <div class="form-group my-3">
                    {{ Form::label('password', 'Mật Khẩu', ['class' => 'control-label ']) }}
                    {{ Form::password('password', ['class' => 'form-control ', 'placeholder' => 'Vui lòng nhập mật khẩu của bạn']) }}
                </div>
                @error('password')
                    <div class="text-danger"> {{ $message }}</div>
                @enderror
                <div class="form-group my-3">
                    {{ Form::label('email', 'Email', ['class' => 'control-label my-1']) }}
                    {{ Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Vui lòng nhập email của bạn']) }}
                </div>
                @error('email')
                    <div class="text-danger"> {{ $message }}</div>
                @enderror
                <div class="form-group my-3 d-flex align-items-center ">
                    {{ Form::label('title', 'Giới tính :', ['class' => 'control-label my-1 me-3']) }}
                    <div class="form-froup d-flex align-items-center mx-3">
                        {{ Form::radio('sex', 'male', null, ['id' => 'male']) }}
                        {{ Form::label('male', 'Nam', ['class' => 'control-label mx-1']) }}
                    </div>
                    <div class="form-froup d-flex align-items-center mx-3">
                        {{ Form::radio('sex', 'feemale', null, ['id' => 'feemale']) }}
                        {{ Form::label('feemale', 'Nữ', ['class' => 'control-label mx-1']) }}
                    </div>
                </div>
                @error('sex')
                    <div class="text-danger"> {{ $message }}</div>
                @enderror

                <div class="form-group my-3 d-flex justify-content-center align-items-center">
                    {{ Form::submit('Đăng kí', ['class' => 'btn btn-primary w-100','style'=>'height:40px;']) }}

                </div>
                <div class="form-group my-3 d-flex justify-content-center align-items-center">
                    <hr width="35%" color="black" align="left" size="px">
                    <div class="d-inline mx-3">Hoặc</div>
                    <hr width="35%" color="black" align="left" size="2px">
                </div>

                <div class="form-login__plus">
                    <a class="form-login__facebook">
                        <img src="{{asset('asset/img/logo/facebook.jpg')}}"
                            alt="">
                        <p> Facebook</p>
                    </a>
                    <a class="form-login__google">
                        <img src="{{asset('asset/img/logo/google.png')}}" alt="">
                        <p> Google</p>
                    </a>


                </div>

                <div class="form-group my-5 d-flex justify-content-center ">
                    <label class="text-center" for="name">Bằng Việc Đăng Kí bạn đã đồng ý với chúng tối về </br> <a
                            href="">Chính sách và bảo mật</a></label>
                </div>

                {!! Form::close() !!}

            </div>
        </div>
    </div>
@endsection
