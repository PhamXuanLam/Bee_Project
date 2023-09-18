@extends('adminlte::page')

@section('title', 'Categories')

@section('content_header')
    <h1>Danh mục</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="text-right">
                <a href="/admin/categories/create" class="btn btn-sm btn-primary">Tạo mới</a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên</th>
                        <th>Trạng thái</th>
                        <th>Hình ảnh</th>
                        <th>Thời gian tạo</th>
                        <th>Thời gian cập nhật</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($categories->isNotEmpty())
                        @foreach ($categories as $category)
                            <tr id="row-{{ $category->id }}">
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->getStatusLabel() }}</td>
                                <td><img src=" {{ asset($category->image) }}"
                                         alt="{{ $category->slug }}"
                                         title="{{ $category->name }}"
                                         style="width:100px; height :70px;"></td>
                                <td>{{ $category->created_at->format("Y-m-d H:s") }}</td>
                                <td>{{ $category->updated_at->format("Y-m-d H:s") }}</td>
                                <td>
                                    {!! Form::open(['url' => url("admin/categories/{$category->id}"), 'id' => 'form', 'class' => 'form']) !!}
                                    {!! Form::hidden('_method', 'DELETE') !!}
                                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                        <a class="btn btn-sm btn-success" href="/admin/categories/{{ $category->id }}">Chi tiết</a>
                                        <a class="btn btn-sm btn-warning" href="/admin/categories/{{ $category->id }}/edit">Chỉnh sửa</a>
                                        {!! Form::button('Xóa', ['class' => 'btn btn-sm btn-danger btn-remove', 'data-id' => $category->id]) !!}
                                    </div>
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="8">
                                Dữ liệu không tồn tại
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
            <div class="d-flex justify-content-end py-3">
                {{ $categories->links() }}
            </div>
        </div>
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
                    title: "Xoá danh mục sản phẩm",
                    content: 'Bạn có chắc chắn muốn xoá hay không ?',
                    buttons: {
                        yes: {
                            action: function() {
                                $.ajax({
                                    url: '/admin/categories/' + id,
                                    method: 'DELETE',
                                    success: function(response) {
                                        if (response.status === true) {
                                            $.alert(response.message);
                                            row.remove();
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
