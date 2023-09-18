@extends('adminlte::page')

@section('title', 'Nhà cung cấp')

@section('content_header')
    <h1>Danh sách nhà cung cấp</h1>
@stop

@section('content')
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('supplier.create') }}" class="btn btn-primary my-3"> Thêm mới</a>
        <table class="table table-bordered">
            <thead>
                <th>Id</th>
                <th>Tên nhà cung cấp</th>
                <th>Địa chỉ</th>
                <th>Email</th>
                <th>Số điện thoại</th>
                <th>Thời gian tạo</th>
                <th>Thời gian cập nhật</th>
                <th>Hành động</th>
            </thead>

            <tbody>
                @foreach ($suppliers as $supplier)
                    <tr>
                        <td>{{ $supplier->id }}</td>
                        <td>{{ $supplier->name }}</td>
                        <td>{{ $supplier->email }}</td>
                        <td>{{ $supplier->addres }}</td>
                        <td>{{ $supplier->phone_number }}</td>
                        <td>{{ $supplier->created_at }}</td>
                        <td>{{ $supplier->updated_at }}</td>
                        <td>

                            <form action="{{ route('supplier.destroy', ['id' => $supplier->id]) }}" method="POST">
                                @csrf
                                {{ Form::hidden('_method', 'DELETE') }}
                                {{ Form::hidden('id', $supplier->id) }}

                                <a href="{{ route('supplier.edit', ['id' => $supplier->id]) }}"
                                    class="btn btn-primary">Sửa</a>
                                <button class="btn btn-danger" type="submit"> Xóa</button>

                            </form>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
