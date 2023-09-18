@extends('adminlte::auth.auth-page')

@section('adminlte_css_pre')
    <link rel="stylesheet" href="{{ asset('vendor/icheck-bootstrap/icheck-bootstrap.min.css') }}">
@stop

@php($login_url = View::getSection('login_url') ?? config('adminlte.login_url', 'login'))
@php($register_url = View::getSection('register_url') ?? config('adminlte.register_url', 'register'))
@php($password_reset_url = View::getSection('password_reset_url') ?? config('adminlte.password_reset_url', 'password/reset'))

@if (config('adminlte.use_route_url', false))
    @php($login_url = $login_url ? route($login_url) : '')
    @php($register_url = $register_url ? route($register_url) : '')
    @php($password_reset_url = $password_reset_url ? route($password_reset_url) : '')
@else
    @php($login_url = $login_url ? url($login_url) : '')
    @php($register_url = $register_url ? url($register_url) : '')
    @php($password_reset_url = $password_reset_url ? url($password_reset_url) : '')
@endif

@section('auth_header', __('adminlte::adminlte.login_message'))

@section('auth_body')
    <form action="{{ route('admin.postLogin') }}" method="post">
        @csrf
        @if (session('statusError'))
            <div class=" alert alert-danger">
                {{ session('statusError') }}
            </div>
        @elseif ($errors->any())
            <div class="alert alert-danger">
                Tên đăng nhập hoặc mật khẩu không chính xác
            </div>
        @endif


        <div class="form-group">
            <label for="username">Admin</label>
            <input value="{{ old('username') }}" name="username" type="text"
                class="form-control  @error('username') is-invalid @enderror" id="username" placeholder="EnterAdmin">

            @error('username')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input name="password" type="password" class="form-control  @error('password') is-invalid @enderror"
                id="password" placeholder="Password">
            @error('password')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">GHi nhớ</label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>


    </form>
@stop
