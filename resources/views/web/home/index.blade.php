@extends('web.layouts.master')
@section('title', 'Bee-Trang chủ')
@section('content')
    @include('web.home.__block_banner')
    @include('web.home.__block_support')
    @include('web.home.__block_categories', ['categories' => $categories])
    @include('web.home.__block_productFeatures', ['productFeatures' => $productFeatures])
    <!-- SaleOff -->
   @include('web.home.__block_saleoff')
    <!-- RECENT PRODUCT -->
    @include('web.home.__block_recentproducts')
    <!-- Partner -->
    @include('web.home.__block_partner')

@endsection
