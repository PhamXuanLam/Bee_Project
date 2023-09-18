    @extends('adminlte::page')

    @section('title', 'Blog - Post')

    @section('content_header')
        <h1>Post</h1>
    @stop
    @section('content')

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <a href="/admin/blog/post/create" class="btn btn-primary my-3"> Thêm mới</a>
        <table class="table table-bordered text-center">
            <thead>
                <th>Id</th>
                <th>CategoriesId</th>
                <th>Tên bài viết</th>
                <th>Slug</th>
                <th>Ảnh</th>
                <th>Nội dung</th>
                <th>Tóm tắt</th>
                <th>Trạng thái</th>
                <th>Thời gian tạo</th>
                <th>Thời gian thêm mới</th>
                <th>Hành động</th>
            </thead>

            <tbody>

                @foreach ($posts as $post)
                    <tr id="row-{{ $post->id }}">
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->category_id }}</td>
                        <td>{{ $post->name }}</td>
                        <td>{{ $post->slug }}</td>
                        <td><img style="width :100px; height:50px;" src="{{ asset('media/post/' . $post->image) }}"
                                alt="">

                        <td>{{ $post->content }}</td>
                        <td>{{ $post->description }}</td>
                        <td>
                            {{$post->getStatusLabel()}}

                        </td>
                        <td>{{ $post->created_at }}</td>
                        <td>{{ $post->updated_at }}</td>
                        <td>
                            <a href="/admin/blog/post/show/{{ $post->id }}" class="btn btn-info">Xem</a>
                            <a href="/admin/blog/post/edit/{{ $post->id }}" class="btn btn-primary">Sửa</a>
                            <button data-id="{{ $post->id }}" class="btn btn-danger btn-remove" type="button">
                                Xóa</button>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
        <div class="pagination">
            {{ $posts->links() }}
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
                    const token = $('meta[name="csrf-token"]').attr('content');
                    $.confirm({
                        title: 'Confirm!',
                        content: 'Simple confirm!',
                        buttons: {
                            yes: function() {
                                $.ajax({
                                    url: '/admin/blog/post/delete/' + id,
                                    method: 'DELETE',
                                    data: {
                                        id: id,
                                    },
                                    success: function(response) {
                                        if (response.status === true) {
                                            $.alert('Dữ liệu đã xóa');
                                            row.remove();
                                        } else {
                                            $.alert('False!');
                                        }
                                    },
                                    complete: function() {
                                        $(that).removeClass('disabled');
                                    }
                                });
                            },
                            no: function() {
                                return;
                            },
                        }
                    });
                });
            });
        </script>
    @stop
