@php
    $codeConfirm = \Illuminate\Support\Facades\Session::get('confirmToken');
@endphp

<h1>Mã xác nhận: {{ $codeConfirm }}</h1>
