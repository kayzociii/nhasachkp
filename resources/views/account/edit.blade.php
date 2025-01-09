@extends('layouts.app')

@section('title', 'Sửa tài khoản')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/editaccount.css') }}">
@endpush

@section('content')
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('welcome') }}">Trang chủ</a></li>
            <li class="breadcrumb-item active">Tài khoản của tôi</li>
        </ol>
    </nav>

    <div class="form-wrapper">
        <h2>Chỉnh sửa thông tin tài khoản</h2>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        <form action="{{ route('account.update') }}" method="POST">
            @csrf
            <div class="form-group">
                <input type="text" name="hoten" value="{{ old('hoten', $user->hoten) }}" required>
                <label for="hoten">Họ và tên</label>
            </div>
            <div class="form-group">
                <input type="text" name="diachi" value="{{ old('diachi', $user->diachi) }}" required>
                <label for="diachi">Địa chỉ</label>
            </div>
            <div class="form-group">
                <input type="text" name="sodienthoai" value="{{ old('sodienthoai', $user->sodienthoai) }}" required>
                <label for="sodienthoai">Số điện thoại</label>
            </div>
            <div class="form-group">
                <input type="password" name="new_password" id="new_password">
                <label for="new_password">Mật khẩu mới</label>
            </div>
            <div class="form-group">
                <input type="password" name="confirm_password" id="confirm_password">
                <label for="confirm_password">Xác nhận mật khẩu</label>
            </div>
            <div class="form-group">
                <input style="margin-top: 20px;" type="submit" value="Cập nhật thông tin">
            </div>     
        </form>
    </div>

@endsection
