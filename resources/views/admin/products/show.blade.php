@extends('adminlte::page')

@section('title', 'Product-Show')

@section('content_header')
    <h1>Product-Show</h1>
@stop

@section('content')
    <div class="card-header">
        Chi tiết sản phẩm
    </div>
    <div class="card-body">
        <table class="table table-bordered text-center">
            <tr class=row>
                <th class="col-4">ID</th>
                <td class="col-8">{{ $product->id }}</td>
            </tr>
            <tr class=row>
                <th class="col-4">Tên sản phẩm</th>
                <td class="col-8">{{ $product->name }}</td>
            </tr>
            <tr class=row>
                <th class="col-4">Slug</th>
                <td class="col-8">{{ $product->slug }}</td>
            </tr>
            <tr class=row>
                <th class="col-4">Trạng thái</th>
                <td class="col-8">{{ $product->getStatusLabel() }}</td>
            </tr>
            <tr class=row>
                <th class="col-4"> Danh mục sản phẩm</th>
                <td class="col-8">{{ $product->category_id }}</td>
            </tr>
            <tr class=row>
                <th class="col-4">Nhà cung cấp</th>
                <td class="col-8">{{ $product->supplier_id }}</td>
            </tr>
            <tr class=row>
                <th class="col-4">Ảnh hiển thị</th>
                <td class="col-8"><img style="width: 100px; height: 50px" src="{{ asset($product->image) }}"></td>
            </tr>
            <tr class=row>
                <th class="col-4">Giá</th>
                <td class="col-8">{{ $product->price }}</td>
            </tr>
            <tr class=row>
                <th class="col-4">Mô tả</th>
                <td class="col-8">{{ $product->description }}</td>
            </tr>
            <tr class=row>
                <th class="col-4">Nội dung</th>
                <td class="col-8">{{ $product->content }}</td>
            </tr>
            <tr class=row>
                <th class="col-4">Thời gian tạo</th>
                <td class="col-8">{{ $product->created_at }}</td>
            </tr>
            <tr class=row>
                <th class="col-4">Thời gian cập nhật</th>
                <td class="col-8">{{ $product->updated_at }}</td>
            </tr>
            <tr class=row>
                <th class="col-4">Hành động</th>
                <td class="col-8 d-flex align-items-center justify-content-center">
                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                        <button type="button" class="btn btn-warning">
                            <a href="/admin/products/{{ $product->id }}/edit">Edit</a>
                        </button>
                        <button type="button" class="btn btn-sm btn-danger btn-remove" data-id="{{ $product->id }}">
                            Remove
                        </button>
                    </div>
                </td>
            </tr>
        </table>
    </div>
@stop

@section('js')
    <script>
        $(document).ready(function () {
            $('.btn-remove').on('click', function () {
                const id = parseInt($(this).attr('data-id'));
                const that = this;
                $(that).addClass('disabled');
                $.confirm({
                    title: 'Xóa sản phẩm!',
                    content: 'Bạn có chắc muốn xóa sản phẩm này không?',
                    buttons: {
                        Yes: function () {
                            $.ajax({
                                url: '/admin/products',
                                method: 'DELETE',
                                data: {
                                    id: id,
                                },
                                success: function (response) {
                                    if (response.status === true) {
                                        $.alert(response.msg);
                                        location.href = "http://127.0.0.1:8000/admin/products";
                                        return location.href;
                                    }
                                    else {
                                        $.alert(response.msg);
                                        return;
                                    }
                                },
                                complete: function () {
                                    $(that).removeClass('disabled');
                                }
                            });
                        },
                        No: function () {
                            $(that).removeClass('disabled');
                            return;
                        },
                    }
                });
            });
        });
    </script>
@stop
