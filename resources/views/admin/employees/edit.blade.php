@extends('layouts.admin')

@section('content')

<div class="col-12">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Sửa thông tin nhân viên</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.employees.update', $employee->manhanvien) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label fw-semibold">Mã nhân viên</label>
                    <input type="text" name="manhanvien" class="form-control" value="{{ $employee->manhanvien }}" readonly required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Tên nhân viên</label>
                    <input type="text" name="hotennv" class="form-control" value="{{ $employee->hotennv }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Địa chỉ</label>
                    <input type="text" name="diachinv" class="form-control" value="{{ $employee->diachinv }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Số điện thoại</label>
                    <input type="text" name="sodienthoainv" class="form-control" value="{{ $employee->sodienthoainv }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Chức vụ</label>
                    <input type="text" name="chucvunv" class="form-control" value="{{ $employee->chucvunv }}" required>
                </div>
                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('admin.employees.index') }}" class="btn btn-light rounded-pill px-4">Hủy</a>
                    <button type="submit" class="btn btn-info text-white rounded-pill px-4">Lưu thay đổi</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
