@extends('layouts.admin')

@section('content')
<!-- Thêm sách -->
<div class="col-12">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Thêm sách mới</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.books.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label fw-semibold">Bìa sách</label>
                    <div class="d-flex align-items-center gap-3">
                        <img src="https://images.unsplash.com/photo-1543002588-bfa74002ed7e" class="rounded" width="100" height="130" alt="Bìa sách">
                        <div class="flex-grow-1">
                            <input type="file" name="anhbia" class="form-control" accept="image/*">
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Tên sách</label>
                    <input type="text" name="tensach" class="form-control" placeholder="Nhập tên sách" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Tác giả</label>
                    <select name="matacgia" class="form-select" required>
                        <option value="">Chọn Tác giả</option>
                        @foreach ($tacgias as $tacgia)
                            <option value="{{ $tacgia->matacgia }}">
                                {{ $tacgia->tentacgia }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Nhà xuất bản</label>
                    <select name="manhaxuatban" class="form-select" required>
                        <option value="">Chọn Nhà xuất bản</option>
                        @foreach ($nhaxuatbans as $nhaxuatban)
                            <option value="{{ $nhaxuatban->manhaxuatban }}">
                                {{ $nhaxuatban->tennhaxuatban }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Thể loại</label>
                        <select name="machude" class="form-select" required>
                            <option value="">Chọn Thể loại</option>
                            @foreach ($chudes as $chude)
                                <option value="{{ $chude->machude }}">
                                    {{ $chude->tenchude }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Giá sách</label>
                        <div class="input-group">
                            <input type="number" name="giasach" class="form-control" placeholder="0" required>
                            <span class="input-group-text">₫</span>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Mô tả</label>
                    <textarea name="mota" class="form-control" rows="3" placeholder="Nhập mô tả sách" required></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Số lượng tồn</label>
                    <input type="number" name="soluongton" class="form-control" placeholder="Nhập số lượng tồn" required>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Ngày cập nhật</label>
                        <input type="date" name="ngaycapnhat" class="form-control" required>
                    </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Barcode</label>
                            <input type="text" name="barcode" class="form-control" placeholder="Nhập barcode" required>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('admin.books.index') }}" class="btn btn-light rounded-pill px-4">Hủy</a>
                    <button type="submit" class="btn btn-primary rounded-pill px-4">Thêm sách</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
