@extends('adminlte::page')

@section('title', 'Products')

@section('content_header')
    <h1>Products</h1>
@stop

@section('content')
    <div class="card d-flex">
        <form action="{{ route('products.search') }}" method="get">
            <select class="form-select" name="category_id" id="" style="height : 42px; width : 160px">
                <option value="">Danh mục sản phẩm</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @if (request()->get('category_id') == $category->id) {{ 'selected' }} @endif>
                        {{ $category->name }}</option>
                @endforeach
            </select>
            <select class="form-select mx-1" name="supplier_id" id="" style="height : 42px; width : 160px"
                class="mx-5">
                <option value="">Nhà cung cấp</option>
                @foreach ($suppliers as $supplier)
                    <option value="{{ $supplier->id }}" @if (request()->get('supplier_id') == $supplier->id) {{ 'selected' }} @endif>
                        {{ $supplier->name }}</option>
                @endforeach
            </select>
            <select class="form-select mx-1" name="status" id="" style="height : 42px; width : 160px">
                <option value="">Trạng thái</option>
                <option value="1" @if (request()->get('status') == 1) {{ 'selected' }} @endif> Active</option>
                <option value="2" @if (request()->get('status') == 2) {{ 'selected' }} @endif>InActive</option>
            </select>
            <input class="mx-1" type="text" name="keyword" value="{{ request()->get('keyword') }}"
                placeholder="Nhập tìm kiếm của bạn ..." style="height : 42px; width : 160px">
            <button class="btn btn-primary mx-3" type="submit" style="height : 42px; width :100px;"> Tìm kiếm</button>

        </form>

    </div>
    <div class="card">
        <div class="card-header row">
            <div class="col-6">
                Danh sách sản phẩm
            </div>
            <div class="col-6 d-flex justify-content-end">
                <a href="/admin/products/create" class="btn btn-sm btn-primary">Tạo mới</a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Ảnh</th>
                        <th>Tên Sản Phẩm</th>
                        <th>Slug</th>
                        <th>Trạng thái</th>
                        <th>Tên danh mục</th>
                        <th>Tên nhà cung cấp</th>
                        <th>Giá</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr id="row-{{ $product->id }}">
                            <td>{{ $product->id }}</td>
                            <td><img style="width: 80px; height: 50px" title="{{ $product->name }}"
                                    alt="{{ $product->slug }}" src="{{ asset($product->image) }}"></td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->slug }}</td>
                            <td>{{ $product->getStatusLabel() }}</td>
                            <td>{{ $product->category->name }}</td>
                            <td>{{ $product->supplier->name }}</td>
                            <td>{{ number_format($product->price, 0, ',', '.') }} VND</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic mixed styles">
                                    <a class="btn btn-sm btn-success" href="/admin/products/{{ $product->id }}">View</a>
                                    <a class="btn btn-sm btn-primary"
                                        href="/admin/products/{{ $product->id }}/reviews">Review</a>
                                    <a class="btn btn-sm btn-secondary"
                                        href="/admin/products/{{ $product->id }}/image">Hình Ảnh</a>
                                    <a class="btn btn-sm btn-warning"
                                        href="/admin/products/{{ $product->id }}/edit">Sửa</a>
                                    <button type="button" class="btn btn-sm btn-danger btn-remove"
                                        data-id="{{ $product->id }}">
                                        Xóa
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center">
            {{ $products->appends(\Illuminate\Support\Facades\Request::all())->links() }}
        </div>
    </div>
@stop
@section('js')
    <script>
        $(document).ready(function() {
            $('.btn-remove').on('click', function() {
                const id = parseInt($(this).attr('data-id'));
                console.log(id);
                const that = this;
                $(that).addClass('disabled');
                const row = $('#row-' + id);
                $.confirm({
                    title: 'Xóa sản phẩm!',
                    content: 'Bạn có chắc muốn xóa sản phẩm này không?',
                    buttons: {
                        Yes: function() {
                            $.ajax({
                                url: '/admin/products',
                                method: 'DELETE',
                                data: {
                                    id: id,
                                },
                                success: function(response) {
                                    if (response.status === true) {
                                        row.remove();
                                    }
                                    $.alert(response.msg);
                                },
                                complete: function() {
                                    $(that).removeClass('disabled');
                                }
                            });
                        },
                        No: function() {
                            $(that).removeClass('disabled');
                            return;
                        },
                    }
                });
            });
        });
    </script>
@stop
