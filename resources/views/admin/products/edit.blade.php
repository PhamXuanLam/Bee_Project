@extends('adminlte::page')

@section('title', 'Product-Edit')

@section('content_header')
    <h1>Products-Edit</h1>
@stop

@section('content')
    <div class="container">
        <div class="card col-6 offset-3">
            <div class="card-body">
                {!! Form::open(["url" =>url("/admin/products"), "id" => "form", "class" => "form", 'enctype' => 'multipart/form-data']) !!}
                {!! Form::hidden("_method", "PUT") !!}
                {!! Form::hidden("id", $product->id) !!}
                @if(!empty($errors->all()))
                    <div class="alert alert-danger" role="alert">
                        @foreach($errors->all() as $message)
                            <li>{{$message}}</li>
                        @endforeach
                    </div>
                @endif
                <div class="mb-3">
                    {!! Form::label("name", "Tên sản phẩm", ["class" => "form-label"]) !!}
                    {!! Form::text("name", $product->name, ['id' => 'name',
                                                  "class" => "form-control" . ($errors->has("name") ? " is-invalid" : null)]) !!}
                    @if($errors->has("name"))
                        <p class="text-danger">{{ $errors->first("name") }}</p>
                    @endif
                </div>
                <div class="mb-3">
                    {!! Form::label("is_hot", "Là sản phẩm nổi bật: ", ["class" => "form-label form-check-label", 'for' => "is_hot"]) !!}
                    {!! Form::checkbox('is_hot', 1, ['class' => 'form-check-input', 'id' => 'is_hot']) !!}
                    @if($errors->has("is_hot"))
                        <p class="text-danger">{{ $errors->first("is_hot") }}</p>
                    @endif
                </div>
                <div class="mb-3">
                    {!! Form::label("status", "Trạng thái", ["class" => "form-label"]) !!}
                    {!! Form::select('status', ['1' => 'Active', '2' => 'Inactive'], null, ['placeholder' => '--- Trạng thái ---',
                                                 "class" => "form-control text-center" . ($errors->has("status") ? " is-invalid" : null)]) !!}
                    @if($errors->has("status"))
                        <p class="text-danger">{{ $errors->first("status") }}</p>
                    @endif
                </div>
                <div class="mb-3">
                    {!! Form::label("category_id", "Danh mục", ["class" => "form-label"]) !!}
                    {!! Form::select('category_id', $categories, null, ['placeholder' => '--- Tên danh mục ---',
                                                 "class" => "form-control text-center" . ($errors->has("category_id") ? " is-invalid" : null)]) !!}
                    @if($errors->has("category_id"))
                        <p class="text-danger">{{ $errors->first("category_id") }}</p>
                    @endif
                </div>
                <div class="mb-3">
                    {!! Form::label("supplier_id", "Nhà cung cấp", ["class" => "form-label"]) !!}
                    {!! Form::select('supplier_id', $suppliers, null, ['placeholder' => '--- Tên nhà cung cấp ---',
                                                 "class" => "form-control text-center" . ($errors->has("supplier_id") ? " is-invalid" : null)]) !!}
                    @if($errors->has("supplier_id"))
                        <p class="text-danger">{{ $errors->first("supplier_id") }}</p>
                    @endif
                </div>
                <div class="mb-3">
                    {!! Form::label("price", "Giá sản phẩm", ["class" => "form-label"]) !!}
                    {!! Form::text("price", $product->price, ['id' => 'price',
                                                  "class" => "form-control" . ($errors->has("price") ? " is-invalid" : null)]) !!}
                    @if($errors->has("price"))
                        <p class="text-danger">{{ $errors->first("price") }}</p>
                    @endif
                </div>
                <div class="mb-3">
                    {!! Form::label("image", "Tệp hình ảnh", ["class" => "form-label"]) !!}
                    {{ Form::file('image', ["class" => "form-control"]) }}
                    @if($errors->has("image"))
                        <p class="text-danger">{{ $errors->first("image") }}</p>
                    @endif
                </div>
                <div class="mb-3">
                    {!! Form::label("description", "Mô tả", ["class" => "form-label"]) !!}
                    {!! Form::text("description", $product->description, ['id' => 'description',
                                                  "class" => "form-control" . ($errors->has("description") ? " is-invalid" : null)]) !!}
                    @if($errors->has("description"))
                        <p class="text-danger">{{ $errors->first("description") }}</p>
                    @endif
                </div>
                <div class="mb-3">
                    {!! Form::label("content", "Nội dung", ["class" => "form-label"]) !!}
                    {!! Form::textarea("content", $product->content, ['id' => 'content',
                                                  "class" => "form-control" . ($errors->has("content") ? " is-invalid" : null)]) !!}
                    @if($errors->has("content"))
                        <p class="text-danger">{{ $errors->first("content") }}</p>
                    @endif
                </div>
                <div class="text-center">
                    {!! Form::submit('Submit', ['class' => 'btn btn-sm btn-primary']); !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop

@section('js')
    <script>CKEDITOR.replace('content');</script>
@stop
