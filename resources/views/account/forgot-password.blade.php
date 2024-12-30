@extends('layouts.app')  

@section('title', 'Quên mật khẩu')  

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/account.css') }}">
@endpush

@section('content')
<div class="container my-5 d-flex justify-content-center">
    <div class="card-body">
        <div class="container">
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="text-center mb-4">
                    <h4>Quên mật khẩu</h4>
                </div>
                <div class="form-outline mb-4">
                    <input type="email" id="registerEmail" name="email" value="{{ old('email') }}" class="form-control" required required style="border: 1px solid black; border-radius: 5px;" />
                    <label class="form-label" for="registerEmail">Email</label>
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    @if(session('status'))
                        <span class="text-success">
                            {{ session('status') }}
                        </span>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary btn-block">Gửi yêu cầu đặt lại mật khẩu</button>
            </form>
            
        </div>
    </div>
</div>
@endsection
