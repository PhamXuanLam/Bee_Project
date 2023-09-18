@extends("web.layouts.master")
@section("title", "Chi tiết đơn hàng")
@section("content")
    <div class="container">
        <div class="row">
            @include('web.account.sidebar')
            <div class="col-sm-9">
                <div class="card">
                    <div class="card-header text-warning text-center">
                        Chi tiết đơn hàng
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered text-center align-middle">
                            <thead>
                                <tr>
                                    <th>ID đơn hàng</th>
                                    <th>ID sản phẩm</th>
                                    <th>Sản phẩm</th>
                                    <th>Giá</th>
                                    <th>Số lượng</th>
                                    <th>Tổng tiền</th>
                                    <th>Thuế</th>
                                    <th>Thời gian mua hàng</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orderItems as $item)
                                    <tr>
                                        <td>{{ $item->order->id }}</td>
                                        <td>{{ $item->product->id }}</td>
                                        <td>
                                            <img src="{{ asset($item->product->image) }}" style="width: 50px; height: 30px">
                                            {{$item->product->name}}
                                        </td>
                                        <td>{{ number_format($item->price,0,",",".") }}VNĐ</td>
                                        <td>{{ $item->qty }}</td>
                                        <td>{{ number_format($item->total,0,",",".") }}VNĐ</td>
                                        <td>{{ number_format($item->order->tax,0,",",".") }}VNĐ</td>
                                        <td>{{ $item->created_at->format('Y-m-d H:m') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="text-center my-3">
                    <a href="/account/orders" class="btn btn-sm btn-success">Quay lại</a>
                </div>
            </div>
        </div>
    </div>
@endsection
