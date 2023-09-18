@extends('adminlte::page')

@section('title', $user->username)
@section('content_header')
    <h1>Thông tin chi tiết</h1>
@stop

@section('content')
    <a href="{{ url('admin/user/') }}" class="btn btn-primary">Trang chủ</a>

    <table class="table table-bordered">
        <tr>
            <th>Id</th>
            <td>{{ $user->id }}</td>
        </tr>
        <tr>
            <th>Tên người dùng</th>
            <td>{{ $user->username }}</td>
        </tr>
        <tr>
            <th>Họ</th>
            <td>{{ $user->first_name }}</td>
        </tr>
        <tr>
            <th>Tên</th>
            <td>{{ $user->last_name }}</td>
        </tr>
        <tr>
            <th>Địa chỉ</th>
            <td>{{ $user->address }}</td>
        </tr>
        <tr>
            <th>Số điện thoại</th>
            <td>{{ $user->phone_number }}</td>
        </tr>
        <tr>
            <th>Giới tính</th>
            <td>{{ $user->getSexLabel() }}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{ $user->email }}</td>
        </tr>
        <tr>
            <th>Thời gian tạo mới</th>
            <td>{{ $user->created_at }}</td>
        </tr>
        <tr>
            <th>Thời gian cập nhật</th>
            <td>{{ $user->updated_at }}</td>
        </tr>
    </table>
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
