@extends('layouts.app')  

@section('title', 'Đăng nhập')  

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/account.css') }}">
@endpush

@section('content')
<div class="container my-5 d-flex justify-content-center">
    <div class="card-body">
        <div class="tab-content">
            <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
                <form method="POST" action="{{ route('dang-nhap') }}">
                @csrf
                    <div class="text-center mb-4">
                        <h4>Đăng nhập</h4>
                        <p class="text-muted">Truy cập tài khoản của bạn</p>
                    </div>
                    <div class="form-outline mb-4">
                        <input type="text" id="username" name="username" class="form-control" required style="border: 1px solid black; border-radius: 5px;" />
                        <label class="form-label" for="username">Tên người dùng</label>
                        @error('usernameerror')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-outline mb-4">
                        <input type="password" id="password" name="password" class="form-control" required style="border: 1px solid black; border-radius: 5px;" />
                        <label class="form-label" for="password">Mật khẩu</label>
                        @error('passworderror')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        @error('verifiedemail')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div>
                            <input class="form-check-input me-2" type="checkbox" id="loginCheck" name="remember"/>
                            <label class="form-check-label" for="loginCheck">Ghi nhớ tôi</label>
                        </div>
                        <a href="{{ route('password.request') }}">Quên mật khẩu?</a>
                    </div>
                    <button type="submit" name="login" class="btn btn-primary btn-block">Đăng nhập</button>
                    <div class="text-center mt-3">
                        <p class="mb-0">Chưa có tài khoản? <a href="{{ route('dang-ky') }}" class="text-decoration-none">Đăng ký tại đây</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
