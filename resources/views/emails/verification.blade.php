@push('styles')
    <link rel="stylesheet" href="{{ asset('css/footer-link.css') }}">
@endpush

<div class="container">
    <h2>Xin chào {{ $user->khachhang->hoten }},</h2>
    <p>Cám ơn bạn đã sử dụng dịch vụ nhà sách của chúng tôi!</p>
    <p>Vui lòng nhấp vào liên kết dưới đây để tiến hành xác thực tài khoản của bạn:</p>
    <a href="{{ $verificationUrl }}">Xác thực tài khoản</a>
</div>
