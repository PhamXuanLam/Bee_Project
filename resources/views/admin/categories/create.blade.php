@extends('adminlte::page')

@section('title', 'Category-Create')

@section('content_header')
    <h1>Categories-Create</h1>
@stop

@section('content')
    <div class="container">
        <div class="card col-6 offset-3">
            <div class="card-body">

                {!! Form::open([
                    'url' => url('/admin/categories'),
                    'id' => 'form',
                    'class' => 'form',
                    'enctype' => 'multipart/form-data',
                ]) !!}
                @if (!empty($errors->all()))
                    <div class="alert alert-danger" role="alert">
                        @foreach ($errors->all() as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                    </div>
                @endif
                <div class="mb-3">
                    {!! Form::label('name', 'Tên danh mục', ['class' => 'form-label']) !!}
                    {!! Form::text('name', null, [
                        'id' => 'name',
                        'class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : null),
                        'placeholder' => 'Nhập tên danh mục sản phẩm',
                    ]) !!}
                    @if ($errors->has('name'))
                        <p class="text-danger">{{ $errors->first('name') }}</p>
                    @endif
                </div>
                <div class="mb-3">
                    {!! Form::label('status', 'Trạng thái', ['class' => 'form-label']) !!}
                    {!! Form::select('status', ['1' => 'Active', '2' => 'Inactive'], null, [
                        'placeholder' => 'Trạng thái',
                        'class' => 'form-control' . ($errors->has('status') ? ' is-invalid' : null),
                    ]) !!}

                    @if ($errors->has('status'))
                        <p class="text-danger">{{ $errors->first('status') }}</p>
                    @endif
                </div>
                <div class="mb-3">
                    {!! Form::label('seq', 'Seq', ['class' => 'form-label']) !!}
                    {!! Form::text('seq', null, [
                        'id' => 'seq',
                        'class' => 'form-control' . ($errors->has('seq') ? ' is-invalid' : null),
                        'placeholder' => 'seq',
                    ]) !!}
                    @if ($errors->has('seq'))
                        <p class="text-danger">{{ $errors->first('seq') }}</p>
                    @endif
                </div>


                <div class="mb-3">
                    {{ Form::file('image') }}
                </div>
                @error('image')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
                <div class="text-center">
                    {!! Form::submit('Thêm mới', ['class' => 'btn btn-sm btn-primary']) !!}
                </div>
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
