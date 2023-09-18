@extends('adminlte::page')

@section('title', 'Products')

@section('content_header')
    <h1>Quản lí hình ảnh</h1>
@stop

@section('content')


    <div class="card">
        <div class="card-header row">
            <div class="col-8">
                Danh Sách hình ảnh
                <table class="table table-bordered">
                    <thead>
                        <th>NameImg</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Created_At</th>
                        <th>Updated_At</th>
                    </thead>
                    <tbody>
                        @foreach ($productImage as $item)
                            <tr>
                                <td><span style="width :300px; display:block;">{{ $item->name }}</span></td>
                                <td> <img src="{{ asset($item->path) }}" alt=""
                                        style="
                                        width: 150px;
                                        height: 70px; ">
                                </td>
                                <td>{{ $item->getStatusLabel() }}</td>
                                <td>{{ $item->created_at->format('Y-m-d H:i') }}</td>
                                <td>{{ $item->updated_at->format('Y-m-d H:i') }}</td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            <div class="col-4 d-flex ">
                {!! Form::open([
                    'url' => 'admin/products/' . $product->id . '/image',
                    'method' => 'POST',
                    'enctype' => 'multipart/form-data',
                    'class' => ' d-flex flex-column j justify-content-sm-around',
                ]) !!}
                {{ Form::label('path', 'Mời bạn chọn ảnh') }}
                {{ Form::file('path') }}
                @error('path')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror

                {{ Form::submit('Click Me!') }}
                {!! Form::close() !!}
            </div>
        </div>
        <div class="pagination my-3 mx-5 d-flex justify-content-end">
            {{ $productImage->links() }}

        </div>

    </div>
@stop
