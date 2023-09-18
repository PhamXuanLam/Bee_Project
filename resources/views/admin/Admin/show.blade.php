@extends('adminlte::page')

@section('title', 'Admin')

@section('content_header')
    <h1>Thông tin chi tiết tài khoản Admin</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <strong>
                Chi tiết người quản trị {{ $admin->name }}
            </strong>
        </div>
        <div class="card-body">
            <table class="table table-bordered text-center">
                <tr class=row>
                    <th class="col-4">ID</th>
                    <td class="col-8">{{ $admin->id }}</td>
                </tr>
                <tr class=row>
                    <th class="col-4">Tên</th>
                    <td class="col-8">{{ $admin->name }}</td>
                </tr>
                <tr class=row>
                    <th class="col-4">Tên hệ thống</th>
                    <td class="col-8">{{ $admin->username }}</td>
                </tr>
                <tr class=row>
                    <th class="col-4">Trạng thái</th>
                    <td class="col-8">{{ $admin->getStatusLabel() }}</td>
                </tr>
                <tr class=row>
                    <th class="col-4">Thời gian tạo</th>
                    <td class="col-8">{{ $admin->created_at->format('Y-m-d H:i') }}</td>
                </tr>
                <tr class=row>
                    <th class="col-4">Thời gian cập nhật</th>
                    <td class="col-8">{{ $admin->updated_at->format('Y-m-d H:i') }}</td>
                </tr>
            </table>
        </div>
    </div>
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
