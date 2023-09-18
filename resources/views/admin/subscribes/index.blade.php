@extends('adminlte::page')

@section('title', 'Subscribes')

@section('content_header')
    <h1>Subscribes</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            Danh sách người đăng ký
        </div>
        <div class="card-body">
            <table class="table table-bordered text-center">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Created_at</th>
                    <th>Updated_at</th>
                </tr>
                </thead>
                <tbody>
                @foreach($items as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->getStatusLabel() }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>{{ $item->updated_at }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center">
            {{ $items->links() }}
        </div>
    </div>
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
