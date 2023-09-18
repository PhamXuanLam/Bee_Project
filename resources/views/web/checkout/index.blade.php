@extends('web.layouts.master')
@section('title', 'Checkout Page')
@section('content')
    <div class="cart-checkout container my-5">
        <div class="row">
            <div class="left col-sm-8">
                @if(isset($products))
                    <table class="table text-center">
                    <thead>
                    <tr class="header">
                        <th class="product">Sản phẩm</th>
                        <th class="price">Giá</th>
                        <th class="qty">Số lượng</th>
                        <th class="total">tổng tiền</th>
                    </tr>
                    </thead>
                        <tbody id="data-count" data-count="{{ count($products) }}">
                            @foreach($products as $product)
                                <tr class="row-1 my-3 number-{{ $loop->index }}">
                                    <td class="product-name">
                                        <img
                                            src="{{ asset($product->image) }}"
                                            alt="{{ $product->slug }}"
                                            title="{{ $product->name }}"
                                        >
                                        {{ $product->name }}
                                    </td>
                                    <td class="price" id="price-{{ $loop->index }}" data-price="{{ $product->price }}">
                                        <span>{{ number_format($product->price,0,",",".") }}VND</span>
                                    </td>
                                    <td class="qty-body">
                                        <span class="qty" id="qty-{{ $loop->index }}">{{ $product->qty }}</span>
                                    </td>
                                    <td class="total"><span id="total-item-{{ $loop->index }}">{{ number_format($product->total,0,",",".") }}VND</span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                </table>
                @else
                    <h1 class="text-warning text-center">Bạn chưa có sản phẩm nào trong giỏ hàng</h1>
                    <div class="d-flex justify-content-center align-items-center">
                        <a href="/" class="btn-sm btn btn-primary d-flex justify-content-center align-items-center" style="width: 20%">Quay lại trang chủ</a>
                    </div>
                @endif
            </div>
            <!-- RIGHT -->
            <div class="right col-sm-4">
                <div class="right-content">
                    <div class="header">
                        <h5 class="title"> TÓM TẮT GIỎ HÀNG
                        </h5>
                    </div>
                    <div class="cart-summary">
                        <div class="sub-total">
                            <span>Tổng tiền</span>
                            @if(!empty($total))
                                <span id="total" data-total="{{ $total }}">{{ number_format($total,0,",",".") }}VND</span>
                            @else
                                <span id="total">0VND</span>
                            @endif
                        </div>
                        <div class="shipping mt-3">
                            <span>Thuế</span>
                            @if(!empty($tax))
                                <span id="tax">{{ number_format($tax,0,",",".") }}VND</span>
                            @else
                                <span id="tax">0VND</span>
                            @endif
                        </div>
                        <hr>
                        <div class="total">
                            <span>Phải thanh toán</span>
                            @if(!empty($subTotal))
                                <span id="sub-total">{{ number_format($subTotal,0,",",".") }}VND</span>
                            @else
                                <span id="sub-total">0VND</span>
                            @endif
                        </div>
                        <form action="/checkout" method="post">
                            @csrf
                            @if(isset($products))
                                <button class="btn my-5 btn-checkout" type="submit">Tạo đơn hàng</button>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
