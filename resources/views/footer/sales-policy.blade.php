@extends('layouts.app')  

@section('title', 'Chính sách bán hàng')  

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/footer-link.css') }}">
@endpush

@section('content')
<div class="container">
    <header>
        <h1>Chính Sách Bán Hàng</h1>
    </header>
    
    <section class="section">
        <div class="icon">
            <i class="fas fa-shield-alt"></i>
            <h3>Sản Phẩm Đảm Bảo Chất Lượng</h3>
        </div>
        <ul>
            <li>Chúng tôi cam kết 100% các mặt hàng được bán trên KP đều có bản quyền và được ký kết hợp đồng mua bán rõ ràng.</li>
            <li>Chúng tôi cam kết 100% các sản phẩm đều có xuất xứ từ các nhà phát hành/ nhà cung cấp uy tín, chính hãng và được đảm bảo về chất lượng và an toàn sức khỏe.</li>
        </ul>
    </section>

    <section class="section">
        <div class="icon">
            <i class="fas fa-truck"></i>
            <h3>Thông Báo Về Việc Thay Đổi Chi Phí Vận Chuyển</h3>
        </div>
        <ul>
            <li>Phí vận chuyển mọi giá trị đơn hàng tại Tỉnh Khánh Hòa: <span class="highlight">19.000đ</span>.</li>
            <li>Phí vận chuyển mọi giá trị đơn hàng có tại các tỉnh/thành phố khác (ngoài Tỉnh Khánh Hòa): <span class="highlight">29.000đ</span>.</li>
        </ul>
    </section>

    <section class="section">
        <div class="icon">
            <i class="fas fa-exchange-alt"></i>
            <h3>Khiếu Nại/Hoàn Tiền</h3>
        </div>
        <ul>
            <li>Trong trường hợp hàng bị hư hỏng trong quá trình vận chuyển/giao hàng, chúng tôi cam kết sẽ giao lại hàng mới cho khách hàng.</li>
            <li>Trong một số trường hợp vì các lý do ngoài ý muốn (nguyên nhân đến từ KP), chúng tôi sẽ hoàn tiền cho bạn trong vòng 5 - 7 ngày làm việc kể từ ngày thông báo hoàn tiền.</li>
        </ul>
        <p>Mọi thắc mắc, khiếu nại, không hài lòng của bạn trong quá trình sử dụng sản phẩm, dịch vụ tại nhasachkp.com, bạn vui lòng liên hệ ngay với chúng tôi thông qua các kênh liên lạc sau:</p>
        <ul>
            <li>Hotline: <strong>1900 9100</strong> (bộ phận chăm sóc khách hàng)</li>
            <li>Email: <strong>nhasachkp@gmail.com</strong></li>
        </ul>
    </section>

    <section class="section">
        <div class="icon">
            <i class="fas fa-clock"></i>
            <h3>Thời Gian Làm Việc</h3>
        </div>
        <ul>
            <li>Thứ 2 - Thứ 6: từ 8h - 17h.</li>
            <li>Thứ 7: từ 8h - 12h.</li>
        </ul>
        <p>Chúng tôi cam kết sẽ liên hệ và hỗ trợ mọi thắc mắc, khiếu nại của bạn trong thời gian sớm nhất.</p>
    </section>
</div>
@endsection
