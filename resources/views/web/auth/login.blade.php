@extends('web.layouts.master')
@section('title', 'Đăng Nhập')
@section('content')
    <div class="container d-flex justify-content-center">

        {!! Form::open(['url' => url('/login'), 'class' => 'col-4']) !!}
        <div class="card col-12">
            <div class="card-header">
                <div class="title">Đăng <Span style="color: rgb(224, 224, 55);">Nhập</Span></div>
            </div>
            <div class="card-body">
                <div class="form-group mt-3">
                    {!! Form::label('User Name') !!}
                    {!! Form::text('username', old('username'), [
                        'class' => 'form-control my-1' . ($errors->has('username') ? ' is-invalid' : null),
                        'id' => 'username',
                        'placeholder' => 'Nhập Email hoặc tên đăng nhâp',
                    ]) !!}
                    @if ($errors->has('username'))
                        <p class="text-danger">{{ $errors->first('username') }}</p>
                    @endif
                </div>
                <div class="form-group my-3">
                    {!! Form::label('Password') !!}
                    <div class="password">
                        {!! Form::password('password', [
                            'class' => 'form-control my-1' . ($errors->has('password') ? ' is-invalid' : null),
                            'id' => 'password',
                            'placeholder' => 'Nhập password',
                        ]) !!}
                        <i class="fa-solid fa-eye-slash"></i>
                    </div>
                    @if ($errors->has('password'))
                        <p class="text-danger">{{ $errors->first('password') }}</p>
                    @endif
                </div>
                <div class="check-box my-3">
                    {!! Form::checkbox('note', null, false, ['id' => 'note']) !!}
                    {!! Form::label('note', 'Ghi nhớ', ['for' => 'note']) !!}
                </div>
                {!! Form::submit('Đăng Nhập', ['class' => 'btn btn-primary w-100', 'style' => 'height:40px;']) !!}
                <a href="{{ url('/forgotPassword') }}" class="forgot mt-3"> Quên mật khẩu</a>
                <div class="form-group my-3 d-flex justify-content-center align-items-center">
                    <hr width="35%" color="black" align="left" size="px">
                    <div class="d-inline mx-3">Hoặc</div>
                    <hr width="35%" color="black" align="left" size="2px">
                </div>
                <div class="form-login__plus">
                    <a class="form-login__facebook">
                        <img src="{{ asset('asset/img/logo/facebook.jpg') }}" alt="">
                        <p> Facebook</p>
                    </a>
                    <a class="form-login__google">
                        <img src="{{ asset('asset/img/logo/google.png') }}" alt="">
                        <p> Google</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection