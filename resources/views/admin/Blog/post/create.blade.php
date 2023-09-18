@extends('adminlte::page')

@section('title', 'Thêm Mới')

@section('content_header')
    <h1>Thêm mới</h1>
@stop

@section('content')
    <div class="container d-flex justify-content-center">
        <div class="card" style="width : 800px">
            <div class="card-header">

            </div>
            <div class="card-body">
                {!! Form::open([
                    'route' => 'blog.post.store',
                    'method' => 'POST',
                    'enctype' => 'multipart/form-data',
                ]) !!}
                <div class="form-group">
                    {{ Form::label('name', 'Tên bài biết') }}
                    {{ Form::text('name', null, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : null), 'placeholder' => 'Nhập Post Name']) }}
                </div>
                @error('name')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror

                <div class="form-group">
                    {!! Form::label('category_id', 'Category ID', ['class' => 'form-label']) !!}
                    {!! Form::select('category_id', $categories, null, [
                        'placeholder' => 'Category-Name',
                        'class' => 'form-control' . ($errors->has('category_id') ? ' is-invalid' : null),
                    ]) !!}
                </div>
                @error('category_id')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror

                <div class="form-group">
                    {{ Form::file('image') }}
                </div>
                @error('image')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
                <div class="form-group">
                    {{ Form::label('content', 'Nội dung bài viết') }}

                    {{ Form::textarea('content', null, [
                        'class' => 'form-control' . ($errors->has('content') ? ' is-invalid' : null),
                        'rows' => 3,
                        'name' => 'content',
                        'id' => 'content',
                    ]) }}
                    @error('content')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    {{ Form::label('description', 'Tóm tắt bài viết') }}

                    {{ Form::textarea('description', null, [
                        'class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : null),
                        'rows' => 3,
                        'name' => 'description',
                        'id' => 'description',
                    ]) }}
                    @error('description')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    {{ Form::label('status', 'Trạng thái') }}

                    {{ Form::select('status', ['1' => 'Active', '2' => 'InActive'], 'Status', ['placeholder' => 'Pick a status...']) }}
                </div>
                @error('status')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
                {{ Form::submit('Thêm mới', ['class' => ' btn btn-primary']) }}
                {!! Form::close() !!}
            </div>
        </div>
    </div>


@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
