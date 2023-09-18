@extends('adminlte::page')

@section('title', 'Orders')

@section('content_header')
    <h1>Orders</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">

        </div>

        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <th>ID</th>
                    <th>Tên Khách Hàng</th>
                    <th>Trạng Thái</th>
                    <th>Tổng Thanh Toán</th>
                    <th>Thuế</th>
                    <th>Giảm giá</th>
                    <th>Thời gian mua hàng</th>
                    <th>Action</th>

                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td> {{ $order->users->name }}</td>
                            <td> {{ $order->getStatusLabel() }}</td>
                            <td> {{ $order->total }}</td>
                            <td> {{ $order->tax }}</td>
                            <td> {{ $order->discount }}</td>
                            <td> {{ $order->created_at->format('d-m-Y H:i') }}</td>
                            <td>
                                <a class="btn btn-primary" href="{{ url('admin/orders/' . $order->id) }}">Xem Thông tin</a>

                                <a class="btn btn-info" href="">Chỉnh sửa trạng thái</a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>

            <div class="d-flex justify-content-end py-3">
                {{ $orders->links() }}
            </div>
        </div>
    </div>
@stop

@section('js')

@stop
