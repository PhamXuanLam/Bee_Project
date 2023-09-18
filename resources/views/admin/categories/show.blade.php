@extends('adminlte::page')

@section('title', 'Categories-Show')

@section('content_header')
    <h1>Categories-Show</h1>
@stop

@section('content')
    <div class="container">
        <table class="table table-bordered text-center">
            <tr class=row>
                <th class="col-4">ID</th>
                <td class="col-8">{{ $category->id }}</td>
            </tr>
            <tr class=row>
                <th class="col-4">Tên danh mục</th>
                <td class="col-8">{{ $category->name }}</td>
            </tr>
            <tr class=row>
                <th class="col-4">Slug</th>
                <td class="col-8">{{ $category->slug }}</td>
            </tr>
            <tr class=row>
                <th class="col-4">Trạng thái</th>
                <td class="col-8">{{ $category->status }}</td>
            </tr>
            <tr class=row>
                <th class="col-4">Seq</th>
                <td class="col-8">{{ $category->seq }}</td>
            </tr>
            <tr class=row>
                <th class="col-4">Thời gian tạo </th>
                <td class="col-8">{{ $category->created_at }}</td>
            </tr>
            <tr class=row>
                <th class="col-4">Thời gian cập nhập</th>
                <td class="col-8">{{ $category->updated_at }}</td>
            </tr>
            <tr class=row>
                <th class="col-4">Hành động</th>
                <td class="col-8 d-flex align-items-center justify-content-center">
                    {!! Form::open(['url' => url("admin/categories/{$category->id}"), 'id' => 'form', 'class' => 'form']) !!}
                    {!! Form::hidden('_method', 'DELETE') !!}
                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                        <button type="button" class="btn btn-warning"><a
                                href="/admin/categories/{{ $category->id }}/edit">Sửa</a></button>
                        {!! Form::submit('Xóa', ['class' => 'btn btn-danger']) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        </table>
    </div>
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
