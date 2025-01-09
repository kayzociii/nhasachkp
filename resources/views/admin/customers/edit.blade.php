@extends('layouts.admin')

@section('content')

<div class="col-12">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Sửa thông tin khách hàng</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.customers.update', $customer->makhachhang) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label fw-semibold">Mã khách hàng</label>
                    <input type="text" name="makhachhang" class="form-control" value="{{ $customer->makhachhang }}" readonly required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Tên khách hàng</label>
                    <input type="text" name="hoten" class="form-control" value="{{ $customer->hoten }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Địa chỉ</label>
                    <input type="text" name="diachi" class="form-control" value="{{ $customer->diachi }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Số điện thoại</label>
                    <input type="text" name="sodienthoai" class="form-control" value="{{ $customer->sodienthoai }}" required>
                </div>
                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('admin.customers.index') }}" class="btn btn-light rounded-pill px-4">Hủy</a>
                    <button type="submit" class="btn btn-info text-white rounded-pill px-4">Lưu thay đổi</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
