@extends('layouts.admin')

@section('content')

<div class="col-12">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Thêm khách hàng mới</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.customers.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label fw-semibold">Tên khách hàng</label>
                    <input type="text" name="hoten" class="form-control" placeholder="Nhập tên khách hầng" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Địa chỉ</label>
                    <input type="text" name="diachi" class="form-control" placeholder="Nhập địa chỉ" required>
                </div><div class="mb-3">
                    <label class="form-label fw-semibold">Số điện thoại</label>
                    <input type="text" name="sodienthoai" class="form-control" placeholder="Nhập số điện thoại" required>
                </div>
                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('admin.customers.index') }}" class="btn btn-light rounded-pill px-4">Hủy</a>
                    <button type="submit" class="btn btn-primary rounded-pill px-4">Thêm khách hàng</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
