@extends('adminlte::page')

@section('title', 'Sửa')

@section('content_header')
    <h1>Edit-PCategories</h1>
@stop

@section('content')
    {!! Form::open(['route' => 'blog.categories.update', 'method' => 'POST']) !!}

    {{ Form::hidden('_method', 'PUT') }}
    {{ Form::hidden('id', $category->id) }}

    <div class="form-group">
        {{ Form::label('name', 'Tên bài viết') }}
        {{ Form::text('name', $category->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : null), 'placeholder' => 'Nhập PCategories Name']) }}
    </div>
    @error('name')
        <div class="text-danger">
            {{ $message }}
        </div>
    @enderror
    <div class="form-group">
        {{ Form::label('content', 'Nội dung bài viết') }}

        {{ Form::textarea('content', $category->content, [
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
        {{ Form::label('status', 'Trạng thái') }}

        {{ Form::select('status', ['1' => 'Active', '2' => 'InActive'], $category->status, ['placeholder' => 'Pick a status...']) }}
    </div>
    @error('status')
        <div class="text-danger">
            {{ $message }}
        </div>
    @enderror
    {{ Form::submit('Sửa', ['class' => ' btn btn-primary']) }}
    {!! Form::close() !!}
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
