@extends('layouts.app')  

@section('title', 'Đăng ký')  

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/account.css') }}">
@endpush

@section('content')
<div class="container my-5 d-flex justify-content-center">
    <div class="card-body">
        <h4 class="text-center mb-4">Tạo tài khoản</h4>
        <p class="text-muted text-center">Hãy là thành viên của nhà sách ngay hôm nay!</p>
        <?php
            if (!empty($error_message)) {
                echo "<div class='alert alert-danger'>$error_message</div>";
            }
            if (!empty($success_message)) {
                echo "<div class='alert alert-success'>$success_message</div>";
            }
        ?>
        <form action="{{ route('dang-ky') }}" method="POST">
            @csrf
            <div class="form-outline mb-4">
                <input type="text" id="registerUsername" name="username" value="{{ old('username') }}" class="form-control" required style="border: 1px solid black; border-radius: 5px;" />
                <label class="form-label" for="registerUsername">Tên tài khoản</label>
                @error('username')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-outline mb-4">
                <input type="text" id="registerName" name="name" value="{{ old('name') }}" class="form-control" required required style="border: 1px solid black; border-radius: 5px;" />
                <label class="form-label" for="registerName">Họ và tên</label>
            </div>
            <div class="form-outline mb-4">
                <input type="email" id="registerEmail" name="email" value="{{ old('email') }}" class="form-control" required required style="border: 1px solid black; border-radius: 5px;" />
                <label class="form-label" for="registerEmail">Email</label>
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-outline mb-4">
                <input type="tel" id="registerPhone" name="phone" value="{{ old('phone') }}" class="form-control" required required style="border: 1px solid black; border-radius: 5px;" />
                <label class="form-label" for="registerPhone">Số điện thoại</label>
                @error('phone')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-outline mb-4">
                <input type="text" id="registerAddress" name="address" value="{{ old('address') }}" class="form-control" required required style="border: 1px solid black; border-radius: 5px;" />
                <label class="form-label" for="registerAddress">Địa chỉ</label>
                @error('address')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-outline mb-4">
                <select class="form-select" name="province" id="province" class="form-control" required required style="border: 1px solid black; border-radius: 5px;">
                    <option value="">Chọn Tỉnh/Thành phố</option>
                    @foreach($provinces as $province)
                        <option value="{{ $province->province_id }}" {{ old('province') == $province->province_id ? 'selected' : '' }}>
                            {{ $province->name }}
                        </option>
                    @endforeach
                </select>
                @error('province')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-outline mb-4">
                <select class="form-select" name="district" id="district" class="form-control" required required style="border: 1px solid black; border-radius: 5px;">
                    <option value="">Chọn Quận/Huyện</option>
                </select>
                @error('district')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-outline mb-4">
                <select class="form-select" name="wards" id="wards" class="form-control" required required style="border: 1px solid black; border-radius: 5px;">
                    <option value="">Chọn Phường/Xã</option>
                </select>
                @error('wards')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-outline mb-4">
                <input type="password" id="registerPassword" name="password" class="form-control" required required style="border: 1px solid black; border-radius: 5px;" />
                <label class="form-label" for="registerPassword">Mật khẩu</label>
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-outline mb-4">
                <input type="password" id="registerRepeatPassword" name="password_confirmation" class="form-control" required required style="border: 1px solid black; border-radius: 5px;" />
                <label class="form-label" for="registerRepeatPassword">Nhập lại mật khẩu</label>
                @error('repeat_password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        <div class="row mt-4">
            <div class="form-group col">
                <a href="{{ route('dang-nhap') }}" class="text-decoration-none">Đã có tài khoản rồi?</a>
            </div>
            <div class="form-group col text-end">
                <a href="{{ route('welcome') }}" class="text-decoration-none">Trang chủ</a>
            </div>
        </div>
            <button type="submit" name="register" class="btn btn-primary btn-block">Đăng ký</button>
        </form>
    </div>
</div>
@endsection
