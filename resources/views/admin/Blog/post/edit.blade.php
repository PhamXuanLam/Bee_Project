@extends('adminlte::page')

@section('title', 'Sửa')

@section('content_header')
    <h1>Sửa dữ liệu</h1>
@stop

@section('content')
    <div class="container d-flex justify-content-center">
        <div class="card" style="width : 800px">
            <div class="card-body">
                {!! Form::open(['route' => 'blog.post.update', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                {{ Form::hidden('_method', 'PUT') }}
                {{ Form::hidden('id', $post->id) }}
                <div class="form-group">
                    {{ Form::label('name', 'Tên bài viết') }}
                    {{ Form::text('name', $post->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : null), 'placeholder' => 'Nhập Post Name']) }}
                </div>
                @error('name')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror

                <div class="form-group">
                    {!! Form::label('category_id', 'Category ID', ['class' => 'form-label']) !!}
                    {!! Form::select('category_id', $categories, $post->category_id, [
                        'placeholder' => 'Category-Name',
                        'class' => 'form-control' . ($errors->has('category_id') ? ' is-invalid' : null),
                    ]) !!}
                </div>
                @error('category_id')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror <div class="form-group">
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

                        {{ Form::textarea('content', $post->content, [
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

                        {{ Form::textarea('description', $post->description, [
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

                        {{ Form::select('status', ['1' => 'Active', '2' => 'InActive'], $post->status, ['placeholder' => 'Pick a status...']) }}
                    </div>
                    @error('status')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                    {{ Form::submit('Sửa', ['class' => ' btn btn-primary']) }}
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
