@extends('adminlte::page')

@section('title', 'Blog - Categories')

@section('content_header')
    <h1>Danh sách bài viết</h1>
@stop

@section('content')
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <a href="/admin/blog/categories/create" class="btn btn-primary my-3"> Thêm mới</a>
        <table class="table table-bordered">
            <thead>
                <th>Id</th>
                <th>Tên bài viết</th>
                <th>Slug</th>
                <th>Nội dung</th>
                <th>Trạng thái</th>
                <th>Thời gian tạo</th>
                <th>Thời gian cập nhật</th>
                <th>Hành động</th>
            </thead>

            <tbody>

                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->slug }}</td>
                        <td>{{ $category->content }}</td>
                        <td>
                            @switch($category->status)
                                @case(1)
                                    Active
                                @break

                                @case(2)
                                    InActive
                                @break

                                @default
                                    N/A
                            @endswitch

                        </td>
                        <td>{{ $category->created_at }}</td>
                        <td>{{ $category->updated_at }}</td>
                        <td>
                            <form action="{{ route('blog.categories.destoy', ['id' => $category->id]) }}" method="POST">
                                @csrf
                                {{ Form::hidden('_method', 'DELETE') }}
                                {{ Form::hidden('id', $category->id) }}
                                <a href="/admin/blog/categories/show/{{ $category->id }}" class="btn btn-info">Xem</a>
                                <a href="/admin/blog/categories/edit/{{ $category->id }}" class="btn btn-primary">Sửa</a>
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
