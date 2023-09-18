@extends('web.layouts.master')
@section('title', 'Tìm kiếm : ' . request()->get('q'))
@section('content')
    <div class="product container my-5 ">
        @if (!empty($products->items()))
            <h3>Từ khóa : {{ request()->get('q') }}</h3>
            <div class="row mt-3">
                @foreach ($products as $item)
                    @include('web.components.products.items', ['item' => $item])
                @endforeach
            </div>
            <div class="d-flex justify-content-center m-5">
                {{ $products->appends(\Illuminate\Support\Facades\Request::all())->links() }}
            </div>
        @else
            <h1>Không tìm thấy sản phẩm</h1>
        @endif
    </div>

    <!-- Partner -->
    @include('web.home.__block_partner')
@endsection
