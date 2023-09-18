@extends('adminlte::page')

@section('title', 'Nhà cung cấp')

@section('content_header')
    <h1>Sửa thông tin nhà cung cấp</h1>
@stop

@section('content')
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        {!! Form::open(['url' => '/admin/supplier/store', 'method' => 'post']) !!}
        @if ($errors->any())
            <div class="alert alert-danger">
                Có lỗi dữ liệu
            </div>
        @endif
        {{ Form::hidden('_method', 'put') }}
        {{ Form::hidden('id', $supplier->id) }}
        <div class="form-group">
            {!! Form::label('name', 'Tên nhà cung cấp', ['class' => 'formLabel']) !!}
            {!! Form::text('name', $supplier->name, [
                'class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : null),
                'name' => 'name',
                'id' => 'name',
            ]) !!}
            @error('name')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>



        <div class="form-group">
            {!! Form::label('phone_number', 'Số điện thoại', ['class' => 'form-label']) !!}
            {!! Form::number('phone_number', $supplier->phone_number, [
                'id' => 'phone_number',
                'placeholder' => 'Enter ...',
                'class' => 'form-control' . ($errors->has('phone_number') ? ' is-invalid' : null),
            ]) !!}
            @error('phone_number')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-group">
            {!! Form::label('addres', 'Địa chỉ', ['class' => 'formLabel']) !!}
            {!! Form::text('addres', $supplier->addres, [
                'class' => 'form-control' . ($errors->has('addres') ? ' is-invalid' : null),
                'name' => 'addres',
                'id' => 'addres',
            ]) !!}
            @error('addres')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-group">
            {!! Form::label('email', 'Email', ['class' => 'formLabel']) !!}
            {!! Form::text('email', $supplier->email, [
                'class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : null),
                'name' => 'email',
                'id' => 'email',
            ]) !!}
            @error('email')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>


        {!! Form::submit('Sửa', ['class' => 'btn btn-primary my-3']) !!}
        {{-- @csrf --}}
        {!! Form::close() !!}



    </div>
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
