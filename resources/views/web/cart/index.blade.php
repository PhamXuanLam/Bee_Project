@extends('web.layouts.master')
@section('title', 'Cart Page')
@section('content')
    <div class="cart-checkout container my-5">
        <div class="row">
            <div class="left col-sm-8">
                @if(!empty($products))
                <table class="table text-center">
                    <thead>
                    <tr class="header">
                        <th class="product">Sản phẩm</th>
                        <th class="price">Giá</th>
                        <th class="qty">Số lượng</th>
                        <th class="total">Tổng tiền</th>
                        <th class="remove">Xóa</th>
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
                                    <button class="less" id="less-{{ $loop->index }}" data-id="{{ $product->id }}">-
                                    </button>
                                    <span class="qty" id="qty-{{ $loop->index }}">{{ $product->qty }}</span>
                                    <button class="add" id="add-{{ $loop->index }}" data-id="{{ $product->id }}">+
                                    </button>
                                </td>
                                <td class="total"><span id="total-item-{{ $loop->index }}">{{ number_format($product->total,0,",",".") }}VND</span>
                                </td>
                                <td class="remove" id="remove-{{ $loop->index }}" data-id="{{ $product->id }}">
                                    <button class="btn"><i class="fa-solid fa-x"></i></button>
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
                <div class="right-content my-5">
                    <div class="header">
                        <h5 class="title"> TÓM TẮT GIỎ HÀNG</h5>
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
                        <form action="/checkout" method="get" class="checkout">
                            @csrf
                            @if(!empty($subTotal))
                                <button class="btn my-5 checkout" type="submit">Thủ tục thanh toán</button>
                            @endif

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function () {

            function update(productId, qty) { // cập nhật lại cart sau mỗi lần tăng giảm số lượng sản phẩm
                $.ajax({
                    url: '/cart',
                    method: 'PUT',
                    data: {
                        productId: productId,
                        qty: qty
                    }
                });
            }

            function formatNumber(number) { // quy chuẩn về VND
                number = number + "";
                let count = 0;
                let res = "";
                for (let i = number.length; i > 0; i--) {
                    if (count === 3) {
                        count = 0;
                        res = "." + res;
                    }
                    res = number[i - 1] + res;
                    count = count + 1;
                }
                return res + "VND";
            }

            function display(total) {
                let tax = total / 10;
                let subTotal = total + tax;
                $('#total').html(formatNumber(total));
                $('#tax').html(formatNumber(tax));
                $('#sub-total').html(formatNumber(subTotal));
                if (total === 0) {
                    $('.checkout').hide();
                }
            }

            let count = parseInt($('#data-count').attr('data-count')); // lấy ra số lượng thẻ <tr> hiển thị sản phẩm
            let total = parseInt($('#total').attr('data-total'));
            if (total === 0) {
                $('.checkout').hide();
            } else {
                $('.checkout').show();
            }

            for (let i = 0; i < count; i++) { // dùng for để truy cập vào các thẻ <tr> riêng biệt
                let price = parseInt($('#price-' + i).attr('data-price'));
                let qty = parseInt($('#qty-' + i).html());

                $('#less-' + i).on('click', function () {
                    if (qty > 1) {
                        $('#qty-' + i).html(qty - 1);
                        qty = qty - 1;
                        total = total - price;
                    }
                    $('#total-item-' + i).html(formatNumber(qty * price));
                    display(total);
                    let productId = $(this).attr('data-id');
                    update(productId, qty);
                });

                $('#add-' + i).on('click', function () {
                    $('#qty-' + i).html(qty + 1);
                    qty = qty + 1;
                    total = total + price;
                    $('#total-item-' + i).html(formatNumber(qty * price));
                    display(total);
                    let productId = $(this).attr('data-id');
                    update(productId, qty);
                });

                $('#remove-' + i).on('click', function () {
                    $.ajax({
                        url: '/cart',
                        method: 'DELETE',
                        data: {
                            productId: $(this).attr('data-id')
                        }
                    });
                    total = total - price * qty;
                    $('#total-item-' + i).html(formatNumber(qty * price));
                    display(total);
                    $('.number-' + i).remove();
                });
            }
        });
    </script>
@endsection
