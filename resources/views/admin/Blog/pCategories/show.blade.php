@extends('adminlte::page')

@section('title', 'Thông tin chi tiết')

@section('content_header')
    <h1>Thông tin chi tiết</h1>
@stop

@section('content')
    <div class="container">


        <a href="/admin/blog/categories/" class="btn btn-primary my-3"> Trang chủ</a>
        <table class="table table-bordered text-center">
            <tr>
                <th>
                    Id
                </th>
                <td>
                    {{ $category->id }}
                </td>
            </tr>

            <tr>
                <th>
                    Tên bài viết
                </th>
                <td>
                    {{ $category->name }}
                </td>
            </tr>

            <tr>
                <th>
                    Slug
                </th>
                <td>
                    {{ $category->slug }}
                </td>
            </tr>

            <tr>
                <th>
                    Nội dung
                </th>
                <td>
                    {{ $category->content }}
                </td>
            </tr>

            <tr>
                <th>
                    Trạng thái
                </th>
                <td>
                    {{ $category->status }}
                </td>
            </tr>

            <tr>
                <th>
                    Thời gian tạo
                </th>
                <td>
                    {{ $category->created_at }}
                </td>
            </tr>

            <tr>
                <th>
                    Thời gian cập nhậ
                </th>
                <td>
                    {{ $category->updated_at }}
                </td>
            </tr>
            <tr>
                <th>Hành động</th>
                <td>
                    <form action="{{ route('blog.categories.destoy', ['id' => $category->id]) }}" method="POST">
                        @csrf
                        {{ Form::hidden('_method', 'DELETE') }}
                        {{ Form::hidden('id', $category->id) }}
                        <a href="/admin/blog/categories/edit/{{ $category->id }}" class="btn btn-primary">Sửa</a>
                        <button class="btn btn-danger" type="submit"> Xóa</button>
                    </form>
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
