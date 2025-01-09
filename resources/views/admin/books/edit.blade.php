@extends('layouts.admin')

@section('content')
<!-- Sửa sách -->
<div class="col-12">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Sửa sách</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.books.update', $book->masach) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label fw-semibold">Bìa sách</label>
                    <div class="d-flex align-items-center gap-3">
                        <img src="{{ asset('../images/books/' . $book->anhbia) }}" class="rounded" width="100" height="130" alt="Bìa sách">
                        <div class="flex-grow-1">
                            <input type="file" name="anhbia" class="form-control" accept="images/*">
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Mã sách</label>
                    <input type="text" name="masach" class="form-control" value="{{ $book->masach }}" readonly required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Tên sách</label>
                    <input type="text" name="tensach" class="form-control" value="{{ $book->tensach }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Tác giả</label>
                    <select name="matacgia" class="form-select">
                            @foreach ($tacgias as $tacgia)
                                <option value="{{ $tacgia->matacgia }}" {{ $book->matacgia == $tacgia->matacgia ? 'selected' : '' }}>
                                    {{ $tacgia->tentacgia }}
                                </option>
                            @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Nhà xuất bản</label>
                    <select name="manhaxuatban" class="form-select">
                            @foreach ($nhaxuatbans as $nhaxuatban)
                                <option value="{{ $nhaxuatban->manhaxuatban }}" {{ $book->manhaxuatban == $nhaxuatban->manhaxuatban ? 'selected' : '' }}>
                                    {{ $nhaxuatban->tennhaxuatban }}
                                </option>
                            @endforeach
                    </select>   
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Thể loại</label>
                        <select name="machude" class="form-select">
                            @foreach ($chudes as $chude)
                                <option value="{{ $chude->machude }}" {{ $book->machude == $chude->machude ? 'selected' : '' }}>
                                    {{ $chude->tenchude }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Giá sách</label>
                        <div class="input-group">
                            <input type="number" name="giasach" class="form-control" value="{{ $book->giasach }}" required>
                            <span class="input-group-text">₫</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Ngày cập nhật</label>
                        <input type="date" name="ngaycapnhat" class="form-control" 
                            value="{{ $book->ngaycapnhat ? $book->ngaycapnhat->toDateString() : '' }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Barcode</label>
                        <input type="text" name="barcode" class="form-control" value="{{ $book->barcode }}" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Mô tả</label>
                    <textarea name="mota" class="form-control" rows="3" required>{{ $book->mota }}</textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Số lượng tồn</label>
                    <input type="number" name="soluongton" class="form-control" value="{{ $book->soluongton }}" required>
                </div>
                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('admin.books.index') }}" class="btn btn-light rounded-pill px-4">Hủy</a>
                    <button type="submit" class="btn btn-info text-white rounded-pill px-4">Lưu thay đổi</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
