@extends('adminlte::page')

@section('title', 'Admin')

@section('content_header')
    <h1>Quản trị viên</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <strong>
                Danh sách người quản trị
            </strong>
        </div>
        <div class="card-body">
            <table class="table-bordered table text-center">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên</th>
                        <th>Tên hệ thống</th>
                        <th>Trạng thái</th>
                        <th>Thời gian tạo</th>
                        <th>Thời gian hoạt động</th>
                        <th>Chi tiết</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($adminList as $admin)
                        <tr>
                            <td>{{ $admin->id }}</td>
                            <td>{{ $admin->name }}</td>
                            <td>{{ $admin->username }}</td>
                            <td>{{ $admin->getStatusLabel() }}</td>
                            <td>{{ $admin->created_at->format('Y-m-d H:i') }}</td>
                            <td>{{ $admin->updated_at->format('Y-m-d H:i') }}</td>
                            <td><a href="/admin/admins/{{ $admin->id }}" class="btn btn-sm btn-success">View</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                {{ $adminList->links() }}
            </div>
        </div>
    </div>
@stop
@section('js')
    <script> console.log('Hi!'); </script>
@stop
