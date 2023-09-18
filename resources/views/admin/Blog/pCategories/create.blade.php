@extends('adminlte::page')

@section('title', 'Thêm Mới')

@section('content_header')
    <h1>Thêm mới</h1>
@stop

@section('content')
    {!! Form::open(['route' => 'blog.categories.store', 'method' => 'POST']) !!}
    <div class="form-group">
        {{ Form::label('name', 'PCategories Name') }}
        {{ Form::text('name', null, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : null), 'placeholder' => 'Nhập PCategories Name']) }}
    </div>
    @error('name')
        <div class="text-danger">
            {{ $message }}
        </div>
    @enderror
    <div class="form-group">
        {{ Form::label('content', 'PCategories Content') }}

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
        {{ Form::label('status', 'Status') }}

        {{ Form::select('status', ['1' => 'Active', '2' => 'InActive'], 'Status', ['placeholder' => 'Pick a status...']) }}
    </div>
    @error('status')
        <div class="text-danger">
            {{ $message }}
        </div>
    @enderror
    {{ Form::submit('Thêm mới', ['class' => ' btn btn-primary']) }}
    {!! Form::close() !!}
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
