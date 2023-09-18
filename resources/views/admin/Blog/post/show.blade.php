@extends('adminlte::page')

@section('title', 'Thông tin chi tiết')

@section('content_header')
    <h1>Thông tin chi tiết</h1>
@stop

@section('content')
    <div class="container">


        <a href="/admin/blog/post/" class="btn btn-primary my-3"> Trang chủ</a>
        <table class="table table-bordered text-center">
            <tr>
                <th>
                    Id
                </th>
                <td>
                    {{ $post->id }}
                </td>
            </tr>

            <tr>
                <th>
                    Tên bài viết
                </th>
                <td>
                    {{ $post->name }}
                </td>
            </tr>
            <tr>
                <th>
                    Category_id
                </th>
                <td>
                    {{ $post->category_id }}
                </td>
            </tr>

            <tr>
                <th>
                    Slug
                </th>
                <td>
                    {{ $post->slug }}
                </td>
            </tr>

            <tr>
                <th>
                    Nội dung
                </th>
                <td>
                    {{ $post->content }}
                </td>
            </tr>
            <tr>
                <th>
                    Tóm tắt
                </th>
                <td>
                    {{ $post->description }}
                </td>
            </tr>
            <tr>
                <th>
                    Trạng thái
                </th>
                <td>
                    {{ $post->status }}
                </td>
            </tr>
            <tr>
                <th>Ảnh</th>
                <td><img style="width :100px; height:50px;" src="{{ asset('media/post/' . $post->image) }}" alt="">
            </tr>
            <tr>
                <th>
                    Thời gian thêm mới
                </th>
                <td>
                    {{ $post->created_at }}
                </td>
            </tr>

            <tr>
                <th>
                    Thời gian cập nhật
                </th>
                <td>
                    {{ $post->updated_at }}
                </td>
            </tr>
            <tr>
                <th>Hành động</th>
                <td>
                    <form action="{{ route('blog.post.destoy', ['id' => $post->id]) }}" method="POST">
                        @csrf
                        {{ Form::hidden('_method', 'DELETE') }}
                        {{ Form::hidden('id', $post->id) }}
                        <a href="/admin/blog/post/edit/{{ $post->id }}" class="btn btn-primary">Sửa</a>
                        <button data-id="{{ $post->id }}" class="btn btn-danger btn-remove" type="button">
                            Xóa</button>
                    </form>
                </td>
            </tr>

        </table>
    </div>
@stop

@section('js')
    <script>
        $(document).ready(function() {
            $('.btn-remove').on('click', function() {
                const id = parseInt($(this).attr('data-id'));
                const that = this;
                $(that).addClass('disabled');
                const row = $('#row-' + id);
                $.confirm({
                    title: "Xoá bài viết",
                    content: 'Bạn có chắc chắn muốn xoá hay không ?',
                    buttons: {
                        yes: {
                            action: function() {
                                $.ajax({
                                    url: '/admin/blog/post/delete/' + id,
                                    method: 'DELETE',
                                    success: function(response) {
                                        if (response.status === true) {
                                            $.alert(response.message);
                                            row.remove();
                                            return location.href =
                                                "http://127.0.0.1:8000/admin/blog/post/";
                                        } else {
                                            $.alert('Có lỗi hệ thống xảy ra');
                                        }
                                    },
                                    complete: function() {
                                        $(that).removeClass('disabled');
                                    }
                                });
                            }
                        },
                        no: {
                            action: function() {
                                $(that).removeClass('disabled');
                            }
                        },
                    }
                });
            });
        });
    </script>
@stop
