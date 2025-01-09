@extends('layouts.app')  

@section('title', 'Thanh toán')  

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/checkout.css') }}">
@endpush

@section('content')

<div class="container">
    <form method="POST" action="{{ route('checkout') }}">   
        @csrf
            <div class="row">
                <div class="col-md-8 checkout-form"> 
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('welcome') }}">Trang chủ</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('cart.index') }}">Giỏ hàng</a></li>
                            <li class="breadcrumb-item active">Thanh toán</li>
                        </ol>
                    </nav>
                    <div class="card">
                        <div class="card-header"><span class="circle-number">1</span>Thông tin khách hàng</div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="hoten" class="form-label">Họ và tên</label>
                                <input type="text" id="hoten" name="hoten" class="form-control" value="{{ old('hoten', $khachHang->hoten ?? '') }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="sodienthoai" class="form-label">Số điện thoại</label>
                                <input type="text" id="sodienthoai" name="sodienthoai" class="form-control" value="{{ old('sodienthoai', $khachHang->sodienthoai ?? '') }}" required>
                            </div>
                        </div>
                    </div>

        
                    <div class="card">
                        <div class="card-header"><span class="circle-number">2</span>Sản phẩm đã chọn</div>
                        <div class="card-body cart-summary">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Sản phẩm</th>
                                        <th>Giá</th>
                                        <th>Số lượng</th>
                                        <th class="text-end">Tổng cộng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $totalAmount = 0; @endphp
                                    @foreach ($cart as $item)
                                        @php
                                            $tongsanpham = $item['giasach'] * $item['soluong'];
                                            $totalAmount += $tongsanpham;
                                        @endphp
                                        <tr>
                                            <td>
                                                <img src="{{ asset('images/books/' . $item['anhbia']) }}" alt="{{ $item['tensach'] }}" style="width: 100px; height: 150px;">
                                                {{ $item['tensach'] }}
                                            </td>
                                            <td>{{ number_format($item['giasach'], 0, ',', '.') }} VND</td>
                                            <td>{{ $item['soluong'] }}</td>
                                            <td class="text-end">{{ number_format($tongsanpham, 0, ',', '.') }} VND</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <p class="total">Tổng tiền: {{ number_format($totalAmount, 0, ',', '.') }} VND</p>
                        </div>
                    </div>


                    <div class="card">
                        <div class="card-header"><span class="circle-number">3</span>Địa chỉ giao hàng</div>
                        <div class="card-body">
                            <div class="form-outline mb-4">
                                <input type="text" id="registerAddress" name="address" value="{{ old('address') }}" class="form-control" required />
                                <label class="form-label" for="registerAddress">Địa chỉ</label>
                                @error('address')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <!-- Địa chỉ -->
                            <div class="form-outline mb-4">
                                <select class="form-select" name="province" id="province" class="form-control" required >
                                    <option value="">Chọn Tỉnh/Thành phố</option>
                                    @foreach($provinces as $province)
                                        <option value="{{ $province->province_id }}" {{ old('province') == $province->province_id ? 'selected' : '' }}>
                                            {{ $province->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('province')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-outline mb-4">
                                <select class="form-select" name="district" id="district" class="form-control" required >
                                    <option value="">Chọn Quận/Huyện</option>
                                </select>
                                @error('district')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-outline mb-4">
                                <select class="form-select" name="wards" id="wards" class="form-control" required >
                                    <option value="">Chọn Phường/Xã</option>
                                </select>
                                @error('wards')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="shipping-container">
                        <p class="shipping-title">
                            <strong>Giao tiết kiệm — 29,000 đ</strong>
                            <input type="radio" id="shipping_free" name="shipping_method" value="free" checked>
                        </p>
                        <p>Thời gian vận chuyển: Từ thứ 2 đến thứ 6 trong tuần, khung giờ hành chính từ 8h - 17h</p>

                        <p><strong>Đơn hàng vận chuyển trong khu vực tỉnh Khánh Hòa</strong></p>
                        <ul>
                            <li>Thời gian: Từ 1 - 2 ngày làm việc (không tính T7, CN)</li>
                            <li>Phí vận chuyển: 29.000đ</li>
                        </ul>

                        <p><strong>Đơn hàng vận chuyển ở các tỉnh thành khác</strong></p>
                        <ul>
                            <li>Thời gian: Từ 2 - 5 ngày làm việc (không tính T7, CN)</li>
                            <li>Phí vận chuyển: 29.000đ</li>
                        </ul>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <span class="circle-number">4</span>
                            Phương thức thanh toán
                        </div>
                        <div class="card-body">
                            <!-- Thanh toán khi nhận hàng -->
                            <div class="payment-method">
                                <label for="method_1" class="d-flex align-items-center">
                                    <img src="images/checkout/thanhtoantienmat.png" alt="Thanh toán khi nhận hàng" class="payment-icon">
                                    <div class="payment-details">
                                        <span class="payment-name">Thanh toán khi nhận hàng</span>
                                        <p class="payment-description">Thanh toán bằng tiền mặt khi nhận hàng.</p>
                                    </div>
                                    <input type="radio" id="method_1" name="maphuongthuc" value="1" required>
                                </label>
                            </div>

                            <!-- Thanh toán bằng ZaloPay -->
                            <div class="payment-method">
                                <label for="method_2" class="d-flex align-items-center">
                                    <img src="images/checkout/thanhtoanmomo.png" alt="Thẻ ngân hàng / Ví ZaloPay" class="payment-icon">
                                    <div class="payment-details">
                                        <span class="payment-name">Ví điện tử MoMo</span>
                                        <p class="payment-description">Thanh toán qua ví điện tử MoMo.</p>
                                    </div>
                                    <input type="radio" id="method_2" name="maphuongthuc" value="2" required>
                                </label>
                            </div>

                            <!-- Thanh toán bằng MoMo -->
                            <div class="payment-method">
                                <label for="method_3" class="d-flex align-items-center">
                                    <img src="images/checkout/thanhtoanzalo.png" alt="Ví MoMo" class="payment-icon">
                                    <div class="payment-details">
                                        <span class="payment-name">Ví điện tử ZaloPay</span>
                                        <p class="payment-description">Thanh toán qua ví điện tử ZaloPay.</p>
                                    </div>
                                    <input type="radio" id="method_3" name="maphuongthuc" value="3" required>
                                </label>
                            </div>

                            <!-- Hiển thị QR Code -->
                            <div id="qrCodeContainer">
                                <p><strong>Quét mã QR để thanh toán:</strong></p>
                                <img id="qrCodeImage" src="" alt="QR Code thanh toán">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 sticky-form">
                    <div class="sticky-form sticky-card">
                        <div class="card">
                            <div class="card-header" style="color: black !important;">Đơn hàng</div>
                            <div class="card-body">
                                <p><span class="label">Số lượng sản phẩm:</span> <span class="value">{{ $totalQuantity }}</span></p>
                                <p><span class="label">Giá tiền:</span> <span class="value">{{ number_format($totalAmount, 0, ',', '.') }} VND</span></p>
                                <p><span class="label">Phí vận chuyển:</span><span class="value">{{ number_format(29000, 0, ',', '.') }} VND</span></p> 
                                <input type="hidden" name="tongtien" value="{{ $totalAmount + 29000 }}">
                                <p class="total">Tổng cộng: <span>{{ number_format($totalAmount + 29000, 0, ',', '.') }} VND</span></p>
                                <button type="submit" class="checkout-btn">Xác nhận và đặt hàng</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </form>
</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Lấy danh sách các phương thức thanh toán
        const paymentMethods = document.querySelectorAll('.payment-method');
        const qrCodeContainer = document.getElementById('qrCodeContainer');
        const qrCodeImage = document.getElementById('qrCodeImage');
        const momoRadio = document.getElementById('method_3'); // Radio button của MoMo
        const zaloRadio = document.getElementById('method_2'); // Radio button của ZaloPay

        // Duyệt qua từng phương thức
        paymentMethods.forEach(method => {
            const radioInput = method.querySelector('input[type="radio"]');

            // Lắng nghe sự kiện 'change' trên mỗi radio button
            radioInput.addEventListener('change', function() {
                // Xóa lớp 'selected' khỏi tất cả các phương thức
                paymentMethods.forEach(item => item.classList.remove('selected'));

                // Thêm lớp 'selected' vào phương thức hiện tại
                method.classList.add('selected');

                // Hiển thị QR Code nếu chọn ZaloPay hoặc MoMo
                if (radioInput === zaloRadio) {
                    qrCodeContainer.style.display = 'block';
                    qrCodeImage.src = 'images/checkout/momoqr.png'; // Hình ảnh QR của MoMo
                } else if (radioInput === momoRadio) {
                    qrCodeContainer.style.display = 'block';
                    qrCodeImage.src = 'images/checkout/zaloqr.png'; // Hình ảnh QR của ZaloPay
                } else {
                    qrCodeContainer.style.display = 'none';
                }
            });
        });
    </script>
@endsection



