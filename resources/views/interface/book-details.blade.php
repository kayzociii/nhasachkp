@extends('layouts.app')  

@section('title', 'Chi tiết sách')  

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/book-details.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
@endpush

@section('content')
<div class="container book-detail-container">
    <div class="breadcrumb-container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Trang chủ</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $book->tensach }}</li>
            </ol>
        </nav>
    </div>
    <h1 class="book-titleru">{{ $book->tensach }}</h1>
    <h6 style="text-align: right; margin-right: 20%;">Barcode:</h6>

    <div class="book-info-container">
        <!-- Hình ảnh sách -->
        <div class="book-image-container">
            <img src="{{ asset('images/books/' . $book->anhbia) }}" alt="{{ $book->tensach }}">
        </div>
        <!-- Thông tin sách -->
        <div class="book-details-container">
        <form method="POST" action="{{ route('cart.add') }}" id="form_{{ $book->masach }}">
            @csrf
            <input type="hidden" name="masach" value="{{ $book->masach }}">
            <p class="book-price">{{ number_format($book->giasach, 0, ',', '.') }}đ</p>
            <p class="in-stock @if($book->soluongton > 0) in-stock-available @else in-stock-unavailable @endif">
                @if ($book->soluongton > 0)
                    Còn hàng
                @else
                    Hết hàng
                @endif
            </p>

            <div class="quantity-add-cart-container d-flex align-items-center justify-content-between">
                <div class="quantity-container d-flex align-items-center">
                    <!-- Giữ lại class và id để không ảnh hưởng đến CSS -->
                    <button type="button" class="btn-quantity" onclick="updateQuantity('quantity_{{ $book->masach }}', -1, {{ $book->masach }}, {{ $book->soluongton }})" @if($book->soluongton == 0) disabled @endif>-</button>
                    <input type="number" name="quantity" id="quantity_{{ $book->masach }}" value="1" min="1" max="{{ $book->soluongton }}" class="quantity-input" readonly>
                    <button type="button" class="btn-quantity" onclick="updateQuantity('quantity_{{ $book->masach }}', 1, {{ $book->masach }}, {{ $book->soluongton }})" @if($book->soluongton == 0) disabled @endif>+</button>
                </div>
                <button type="submit" class="btn btn-custom btn-add-cart" @if($book->soluongton == 0) disabled @endif>
                    <i class="fas fa-shopping-cart"></i> Thêm vào giỏ hàng
                </button>
            </div>
        </form>
        </div>

        <!-- Thông tin nhà sách -->
        <div class="bookstore-info-container">
            <div class="bookstore-logo">
                <img src="{{ asset('images/logo.png') }}" alt="Nhà Sách KP">
            </div>
            <div class="bookstore-details">
                <h2 class="bookstore-name">Nhà Sách KP</h2>
                <p class="bookstore-intro">
                    Chào mừng bạn đến với Nhà Sách KP - nơi cung cấp đa dạng các loại sách phục vụ học tập, giải trí và khám phá tri thức.
                </p>
            </div>
        </div>
    </div>

    <div class="tabs-container">
        <button id="btnDescription" class="tab-btn active" onclick="focusTab('description')">Mô tả sản phẩm</button>
        <button id="btnDetails" class="tab-btn" onclick="focusTab('details')">Thông tin chi tiết</button>
        <div class="underline"></div>
    </div>

    <div id="description" class="content">
        <p class="book-description">{{ $book->mota }}</p>
    </div>

    <div id="details" class="content" style="display: none;">
        <p class="book-genre"><strong>Chủ đề:</strong> {{ $book->chude->tenchude }}</p>
        <p class="book-author"><strong>Tác giả:</strong> {{ $book->tacgia->tentacgia }}</p>
        <p class="book-publisher"><strong>Nhà xuất bản:</strong> {{ $book->nhaxuatban->tennhaxuatban }}</p>
    </div>

    <div class="suggested-books">
    <div class="d-flex justify-content-between align-items-center" style="padding-top: 40px;">
        <h2>SÁCH CÙNG THỂ LOẠI</h2>
        <div>
            <button class="btn btn-secondary btn-sm me-1 btn-prev" data-slider="slider2">
                <i class="fas fa-chevron-left"></i>
            </button>
            <button class="btn btn-secondary btn-sm btn-next" data-slider="slider2">
                <i class="fas fa-chevron-right"></i>
            </button>
        </div>
    </div>

    <!-- Slider -->
    <div id="slider2" class="slider-container position-relative overflow-hidden">
        <div class="slider-track d-flex transition" data-current-slide="0">
            @foreach($suggested_books as $book)
                <div class="book-item text-center">
                    <div class="image-item">
                        <a href="{{ route('sach.show', $book->masach) }}">
                            <img src="{{ asset('images/books/' . $book->anhbia) }}" alt="{{ $book->tensach }}" class="img-fluid">
                        </a>
                        <div class="book-details">
                            <h5 class="book-title">{{ $book->tensach }}</h5>
                            <p class="book-price">{{ number_format($book->giasach, 0, ',', '.') }}đ</p>
                            <form method="POST" action="{{ route('cart.add') }}" onsubmit="console.log('Form is being submitted');">
                                @csrf
                                <input type="hidden" name="masach" value="{{ $book->masach }}">
                                <input type="hidden" name="quantity" value="1">

                                <!-- Kiểm tra nếu soluongton = 0 -->
                                <button type="submit" 
                                    class="select-button @if($book->soluongton == 0) btn-disabled @endif" 
                                    @if($book->soluongton == 0) disabled @endif>
                                    @if($book->soluongton == 0)
                                        <i class="fas fa-shopping-cart"></i> HẾT HÀNG
                                    @else
                                        <i class="fas fa-shopping-cart"></i> CHỌN MUA
                                    @endif
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </div>
    </div>
</div>

<script>
    function updateQuantity(quantityId, change, masach, maxQuantity) {
    let quantityField = document.getElementById(quantityId);
    let currentQuantity = parseInt(quantityField.value);
    let newQuantity = currentQuantity + change;

    if (newQuantity >= 1 && newQuantity <= maxQuantity) {
        quantityField.value = newQuantity;
    } else if (newQuantity > maxQuantity) {
        alert("Không thể thêm nhiều hơn số lượng tồn kho!");
    } else {
        alert("Số lượng phải lớn hơn 0!");
    }
}
</script>
@endsection

