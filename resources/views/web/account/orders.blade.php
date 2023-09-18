@extends("web.layouts.master")
@section("title", "Đơn hàng của bạn")
@section("content")
    <div class="container">
        <div class="row">
            @include('web.account.sidebar')
            <div class="col-sm-9">
                <div class="card">
                    <div class="card-header text-warning text-center">
                        Danh sách đơn hàng
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered text-center align-middle">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Sản phẩm</th>
                                    <th>Thuế</th>
                                    <th>Tổng tiền</th>
                                    <th>Thời gian mua hàng</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $order)
                                    <tr>
                                        <td>
                                            <a href="/account/orders/{{$order->id}}">#{{ $order->id }}</a>
                                        </td>
                                        <td>
                                            <ul class="list-group list-group-flush">
                                                @foreach($order->products as $product)
                                                    <li class="list-group-item">
                                                        <img src="{{ asset($product->image) }}" style="width: 50px; height: 30px">
                                                        {{ $product->name }}
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </td>
                                        <td>{{ number_format($order->tax,0,",",".") }}VNĐ</td>
                                        <td>{{ number_format($order->total,0,",",".") }}VNĐ</td>
                                        <td>{{ $order->created_at->format('Y-m-d H:m') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
