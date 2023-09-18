@extends('adminlte::page')

@section('title', 'Product-Reviews')

@section('content_header')
    <h1>Product Reviews</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <strong>Danh Sách Nhận Xét</strong>
        </div>
        <div class="card-body">
            <table class="table table-bordered text-center">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nội Dung</th>
                    <th>Số sao</th>
                    <th>Trạng thái</th>
                    <th>Tên người dùng</th>
                    <th>Email người dùng</th>
                    <th>Chỉnh sửa</th>
                </tr>
                </thead>
                <tbody>
                @foreach($reviews as $review)
                    <tr>
                        <td>{{ $review->id }}</td>
                        <td>{{ $review->content }}</td>
                        <td>{{ $review->rate }}</td>
                        <td>{{ $review->getStatusLabel() }}</td>
                        <td>{{ $review->user->name }}</td>
                        <td>{{ $review->user->email }}</td>
                        <td>
                            <form action="{{ \Illuminate\Support\Facades\Request::url() }}" method="post">
                                @csrf
                                @method("PUT")
                                <input type="hidden" name="productId" value="{{ $review->product_id }}">
                                <input type="hidden" name="star" value="{{ $review->rate }}">
                                <input type="hidden" name="reviewId" value="{{ $review->id }}">
                                <select name="status" class="form-select pb-1 text-center" style="width: 200px">
                                    <option selected>---status---</option>
                                    <option value={{ \App\Models\ProductReviews::STATUS_ACTIVE }}>{{ \App\Models\ProductReviews::STATUS_ACTIVE_LABEL }}</option>
                                    <option value={{ \App\Models\ProductReviews::STATUS_INACTIVE }}>{{ \App\Models\ProductReviews::STATUS_INACTIVE_LABEL }}</option>
                                </select>
                                <button type="submit" class="btn btn-sm btn-primary">Chỉnh sửa</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center">
            {{ $reviews->links() }}
        </div>
    </div>
@stop
@section('js')
@stop
