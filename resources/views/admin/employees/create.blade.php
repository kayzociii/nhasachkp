@extends('layouts.admin')

@section('content')

<div class="col-12">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Thêm nhân viên mới</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.employees.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label fw-semibold">Tên nhân viên</label>
                    <input type="text" name="hotennv" class="form-control" placeholder="Nhập tên nhân viên" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Địa chỉ</label>
                    <input type="text" name="diachinv" class="form-control" placeholder="Nhập địa chỉ" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Số điện thoại</label>
                    <input type="text" name="sodienthoainv" class="form-control" placeholder="Nhập số điện thoại" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Chức vụ</label>
                    <input type="text" name="chucvunv" class="form-control" placeholder="Nhập chức vụ" required>
                </div>
                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('admin.employees.index') }}" class="btn btn-light rounded-pill px-4">Hủy</a>
                    <button type="submit" class="btn btn-primary rounded-pill px-4">Thêm nhân viên</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
