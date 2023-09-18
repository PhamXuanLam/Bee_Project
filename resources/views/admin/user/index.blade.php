@extends('adminlte::page')

@section('title', 'User')

@section('content')
    <div class="card my-5">
        <div class="card-header row justify-content-center align-items-center">
            <div class="col-5">Danh sách người dùng</div>
            {!! Form::open(['url' => '/admin/user', 'class' => 'col-7 row g-3 border p-3 justify-content-center align-items-center']) !!}
                @method("GET")
                <div class="col-4">
                    {!! Form::text('keyword', request()->get('keyword'),['class' => 'form-control form-control-sm', 'placeholder' => 'Từ khóa']) !!}
                </div>
                <div class="col-3">
                    {!! Form::select('sex',
                        [
                            \App\Models\User::SEX_MALE => \App\Models\User::SEX_MALE_LABEL,
                            \App\Models\User::SEX_FEMALE => \App\Models\User::SEX_FEMALE_LABEL,
                        ],
                         request()->get('sex'),
                        [
                            'class' => 'form-select form-control form-control-sm',
                            'placeholder' => 'Giới tính'
                        ]);
                    !!}
                </div>
                <div class="col-3">
                    {!! Form::date('time', request()->get('time'), ['class' => 'form-control form-control-sm']) !!}
                </div>
                <div class="col-2">
                    {!! Form::submit('Tìm kiếm', ['class' => 'btn btn-sm btn-primary']) !!}
                </div>
            {!! Form::close() !!}
        </div>
        <div class="card-body">
            <table class="table table-bordered text-center">
                <thead>
                    <th>Id</th>
                    <th>Tên người dùng</th>
                    <th>Số điện thoại</th>
                    <th>Email</th>
                    <th>Địa chỉ</th>
                    <th>Giới tính</th>
                    <th>Thời gian thêm mới</th>
                    <th>#</th>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td> {{ $user->username }}</td>
                            <td>{{ $user->phone_number }}</td>
                            <td> {{ $user->email }}</td>
                            <td> {{ $user->address }}</td>
                            <td> {{ $user->getSexLabel() }}</td>
                            <td>{{ $user->created_at->format('Y-m-d H:m') }}</td>
                            <td> <a href="{{ url('admin/user/show/' . $user->id) }}" class="btn btn-sm btn-primary">Xem chi tiết</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                {{ $users->appends(\Illuminate\Support\Facades\Request::all())->links() }}
            </div>
        </div>
    </div>

@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
