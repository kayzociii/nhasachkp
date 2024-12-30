@extends('layouts.app')  

@section('title', 'Đổi mật khẩu')  

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/account.css') }}">
@endpush

@section('content')
<div class="container my-5 d-flex justify-content-center">
    <div class="card-body">
        <div class="container">
            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">
                <div class="text-center mb-4">
                    <h4>Đặt lại mật khẩu</h4>
                </div>
                <div class="form-outline mb-4">
                    <input type="email" id="registerEmail" name="email" value="{{ old('email') }}" class="form-control" required required style="border: 1px solid black; border-radius: 5px;" />
                    <label class="form-label" for="registerEmail">Email</label>
                    @error('checkemail')
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
                <button type="submit" class="btn btn-primary btn-block">Cập nhật mật khẩu</button>
            </form>
        </div>
    </div>
</div>
@endsection