@extends('layouts.app')  

@section('title', 'Giỏ hàng')  

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/cart.css') }}">
@endpush

@section('content')

<div class="container">
    <div class="breadcrumb-container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('welcome') }}">Trang chủ</a></li>
                <li class="breadcrumb-item active">Giỏ hàng</li>
            </ol>
        </nav>
    </div>

    @if ($totalQuantity > 0)
        <div class="cart-header">
            <h2>Giỏ hàng của bạn ({{ $totalQuantity }} sản phẩm)</h2>
        </div>
        <div class="cart-item">
            <table style="width: 100%; border-spacing: 0;">
                <thead>
                    <tr>
                        <th>Ảnh sách</th>
                        <th>Sản phẩm</th>
                        <th>Đơn giá</th>
                        <th>Số lượng</th>
                        <th>Thành tiền</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cartItems as $masach => $item)
                        <tr>
                            <td>
                                <img src="{{ asset('images/books/' . $item['anhbia']) }}" alt="{{ $item['tensach'] }}" class="img-thumbnail" style="width: 100px; height: 150px;">                              
                            </td>
                            <td>
                                <span class="ml-3">{{ $item['tensach'] }}</span>
                            </td>
                            <td>{{ number_format($item['giasach'], 0, ',', '.') }}đ</td>
                            <td>
                                <form method="POST" action="{{ route('cart.update') }}" id="form_{{ $masach }}">
                                    @csrf
                                    <input type="hidden" name="masach" value="{{ $masach }}">
                                    <div class="input-group" style="display: flex; align-items: center;">
                                        <button type="button" onclick="updateQuantity('quantity_{{ $masach }}', -1, {{ $masach }})">−</button>
                                        <input type="number" name="quantity" id="quantity_{{ $masach }}" value="{{ $item['soluong'] }}" min="1" class="quantity-input" readonly>
                                        <button type="button" onclick="updateQuantity('quantity_{{ $masach }}', 1, {{ $masach }})">+</button>
                                    </div>
                                </form>
                            </td>
                            <td>{{ number_format($item['soluong'] * $item['giasach'], 0, ',', '.') }}đ</td>
                            <td><a href="{{ route('cart.remove', $masach) }}" class="cart-item-remove">Xóa</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="cart-summary">
            <div class="summary-details">
                <div class="summary-row">
                    <span class="label">Tạm tính:</span>
                    <span class="value">{{ number_format($totalAmount, 0, ',', '.') }}đ</span>
                </div>
                <div class="summary-row">
                    <span class="label">Giao tiết kiệm:</span>
                    <span class="value">{{ number_format(30000, 0, ',', '.') }}đ</span>
                </div>
                <div class="summary-row">
                    <span class="label">Tổng cộng:</span>
                    <span class="value">{{ number_format($totalAmount + 30000, 0, ',', '.') }}đ</span>
                </div>
            </div>
        </div>

        <div class="checkout-buttons-container">
            <div class="checkout-buttons">
                <a href="{{ route('welcome') }}" class="checkout-button">Tiếp tục mua hàng</a>
                <a href="{{ route('cart.clear') }}" class="checkout-button clear-cart-button">Xóa giỏ hàng</a>
                <a href="{{ route('welcome') }}" class="checkout-button">Thanh toán</a>
            </div>
        </div>
    @else
        <div class="empty-cart">
            <h3>Giỏ hàng của bạn chưa có sản phẩm</h3>
            <a href="{{ route('welcome') }}" class="btn btn-primary">Tiếp tục mua hàng</a>
        </div>
    @endif
</div>

<script>
    function updateQuantity(quantityId, change, masach) {
        let quantityField = document.getElementById(quantityId);
        let currentQuantity = parseInt(quantityField.value);
        let newQuantity = currentQuantity + change;

        if (newQuantity > 0) {
            quantityField.value = newQuantity;
            document.getElementById('form_' + masach).submit();
        } else {
            alert("Số lượng phải lớn hơn 0!");
        }
    }
</script>

@endsection



