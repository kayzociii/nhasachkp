@extends('layouts.admin')

@section('content')
<!-- Sửa sách -->
<div class="col-12">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Sửa thông tin đơn hàng</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.orders.update', $order->mahoadon) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label fw-semibold">Mã hóa đơn</label>
                    <input type="text" name="mahoadon" class="form-control" value="{{ $order->mahoadon }}" readonly required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Tên khách hàng</label>
                    <input type="text" name="hoten" class="form-control" value="{{ $order->hoten }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Địa chỉ</label>
                    <input type="text" name="diachi" class="form-control" value="{{ $order->diachi }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Số điện thoại</label>
                    <input type="text" name="sodienthoai" class="form-control" value="{{ $order->sodienthoai }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Tổng tiền</label>
                    <input type="text" name="tongtien" class="form-control" value="{{ $order->tongtien }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Ngày đặt hàng</label>
                    <input type="datetime-local" name="ngaydathang" class="form-control" 
                        value="{{ $order->ngaydathang ? $order->ngaydathang->format('Y-m-d\TH:i') : '' }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Trạng thái đơn hàng</label>
                    <select name="trangthaidonhang" class="form-select" required>
                        <option value="0" {{ $order->trangthaidonhang == 0 ? 'selected' : '' }}>Đã đặt hàng</option>
                        <option value="1" {{ $order->trangthaidonhang == 1 ? 'selected' : '' }}>Đã xác nhận</option>
                        <option value="2" {{ $order->trangthaidonhang == 2 ? 'selected' : '' }}>Đang chuẩn bị sách</option>
                        <option value="3" {{ $order->trangthaidonhang == 3 ? 'selected' : '' }}>Đang vận chuyển</option>
                        <option value="4" {{ $order->trangthaidonhang == 4 ? 'selected' : '' }}>Đã giao hàng</option>
                        <option value="5" {{ $order->trangthaidonhang == 5 ? 'selected' : '' }}>Đã hủy</option>
                    </select>
                </div>
                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('admin.orders.index') }}" class="btn btn-light rounded-pill px-4">Hủy</a>
                    <button type="submit" class="btn btn-info text-white rounded-pill px-4">Lưu thay đổi</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
