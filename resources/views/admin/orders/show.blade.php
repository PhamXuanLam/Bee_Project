@extends('adminlte::page')

@section('title', 'Chi tiết đơn hàng : ' . $order->id)

@section('content_header')
    <h1>
        Chi tiết đơn hàng</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">

        </div>

        <div class="card-body">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th>OrderId</th>
                        <td>{{ $order->id }}</td>
                    </tr>

                    <tr>
                        <th>Khách Hàng</th>
                        <td>
                            Họ Tên : {{ $order->users->name }}
                            <br>
                            SDt: {{  $order->users->phone_number }}
                        </td>
                    </tr>

                    <tr>
                        <th>Sản phẩm</th>
                        <td>
                            @foreach ($orderItems as $item)
                                Tên sản phẩm: {{ $item->product->name }}
                                <br>
                                Giá: {{ $item->price }}
                                <br>
                                Số lượng: {{ $item->qty }}
                                <br>
                                Thành tiền: {{ $item->total }}
                                <br>
                            @endforeach
                            Tổng thanh toán : {{ $order->total }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('js')

@stop
