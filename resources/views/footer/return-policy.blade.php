@extends('layouts.app')  

@section('title', 'Chính sách đổi trả hàng')  

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/footer-link.css') }}">
@endpush

@section('content')
<div class="container">
<header>
    <h1>Chính Sách Đổi Trả Hàng</h1>
</header>

<section>
    <p>Để nâng cao chất lượng dịch vụ và trải nghiệm mua sắm của khách hàng, Nhà Sách Phương Nam chúng tôi có những chính sách phù hợp khi khách hàng có nhu cầu đổi/ trả/ hoàn tiền sản phẩm. Chúng tôi luôn coi trọng và bảo vệ quyền lợi của người tiêu dùng với mong muốn mang đến cho quý khách chất lượng phục vụ tốt nhất.</p>
</section>

<section>
    <h3>Đối Với Khách Hàng Mua Online</h3>
    <h4>Hướng dẫn các bước đổi/ trả hàng</h4>
    <div class="step">
        <strong>Bước 1:</strong> Vui lòng liên hệ hotline <span class="highlight-phone">1900 6656</span> hay gửi email về địa chỉ <strong>hotro@nhasachphuongnam.com</strong> để thông báo việc yêu cầu đổi/ trả hàng.
    </div>
    <div class="step">
        <strong>Bước 2:</strong> Nhân viên chăm sóc khách hàng sẽ liên hệ với bạn để xác nhận, kiểm tra & tiếp nhận hàng được yêu cầu đổi/ trả hàng (chỉ áp dụng đối với các trường hợp đổi/ trả hàng do lỗi xuất phát từ chúng tôi).
        <br><i>(Trường hợp đổi hàng theo nhu cầu (màu sắc, kích thước...) bạn vui lòng liên hệ <span class="highlight-phone">1900 6656</span> để được hướng dẫn cụ thể)</i>
    </div>
    <div class="step">
        <strong>Bước 3:</strong> Khi yêu cầu đổi trả được giải quyết, quý khách vui lòng gửi sản phẩm như hiện trạng khi nhận hàng ban đầu về địa chỉ văn phòng công ty Nhà Sách Phương Nam, bao gồm sản phẩm và đầy đủ phụ kiện, giấy tờ chứng từ kèm theo (nếu có).
    </div>
    <p>Nhasachphuongnam.com sẽ giao sản phẩm thay thế hoặc tiến hành hoàn tiền (trường hợp trả hàng) trong vòng 5-7 ngày tùy khu vực kể từ ngày xác nhận việc đổi/ trả hàng.</p>
</section>

<section>
    <h3>Đối Với Khách Hàng Mua Tại Nhà Sách</h3>
    <ul>
        <li>Đổi trả trong vòng 7 ngày kể từ ngày mua.</li>
        <li>Chỉ áp dụng đối với sản phẩm bị lỗi kỹ thuật.</li>
        <li>Sản phẩm đổi/trả phải kèm hóa đơn tính tiền hoặc hóa đơn VAT.</li>
        <li>Giá trị sản phẩm đổi phải bằng hoặc cao hơn giá trị sản phẩm đã mua.</li>
        <li>Sản phẩm phải còn mới, nguyên vẹn, không trầy xước, dơ, nứt, gãy và đầy đủ phụ kiện bao bì, quà tặng khuyến mãi (nếu có).</li>
    </ul>
</section>

<section>
    <h3>Các trường hợp được đổi/ trả hàng/ hoàn tiền</h3>
    <h4>5 Trường hợp mua online</h4>
    <ul>
        <li>Giao nhầm sản phẩm: tựa sách, hình thức bìa, giá bìa, v.v…</li>
        <li>Hàng hóa không đúng như mô tả trên website (màu sắc, kiểu dáng, chức năng) hoặc hàng hóa bị hư hỏng trong quá trình giao hàng.</li>
        <li>Đơn hàng đã thanh toán trước nhưng sản phẩm của đơn hàng đã hết trên toàn bộ hệ thống Nhà Sách Phương Nam.</li>
    </ul>

    <h4>5 Trường hợp mua tại nhà sách</h4>
    <ul>
        <li>Sản phẩm bị lỗi do in ấn, kỹ thuật.</li>
        <li>Phát hiện hàng giả, hàng nhái.</li>
    </ul>
</section>
</div>
@endsection
