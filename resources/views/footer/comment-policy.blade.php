@extends('layouts.app')  

@section('title', 'Giới thiệu Nhà Sách KP')  

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/footer-link.css') }}">
@endpush

@section('content')
<div class="container">
    <header>
        <h1>Quy Định Viết Bình Luận</h1>
    </header>

    <section>
        <p>Phần bình luận của độc giả trên trang web nhasachkp.com cho phép bạn chia sẻ những ý kiến, cảm nhận của mình về tựa sách bạn thích hay không thích với những độc giả khác. Vui lòng tham khảo những quy định dưới đây để bảo đảm rằng bình luận của bạn có thể được đăng tải.</p>
    </section>

    <section>
        <h3><i class="fas fa-exclamation-triangle warning-icon"></i>Bình luận sẽ không được đăng khi có những thông tin sau</h3>
        <ul>
            <li>Các đường liên kết ở bất kì trang web nào khác ngoại trừ website của nhasachkp.com.</li>
            <li>Những lời xúc phạm, từ ngữ tục tĩu hay những bình luận xúc phạm bất cứ cá nhân nào.</li>
            <li>Những bình luận quá ngắn, ít hơn 50 kí tự.</li>
            <li>Tiết lộ quá nhiều tình tiết của tác phẩm ảnh hưởng đến việc thưởng thức của độc giả khác.</li>
        </ul>
    </section>

    <section>
        <h3><i class="fas fa-exclamation-triangle warning-icon"></i>Lưu ý</h3>
        <div class="note">
            <p>Bằng việc gửi bài bình luận của mình, bạn đã đóng góp ý kiến cho Nhà Sách KP và việc này hoàn toàn tự nguyện nên bạn không thể hủy bỏ bình luận của mình.</p>
            <p>Nhà Sách KP có quyền không đăng tải bình luận, đặc biệt là những bình luận không tuân thủ theo những yêu cầu được đăng tải của Nhà Sách KP. Chúng tôi cũng giữ quyền xóa bất cứ bài bình luận nào vào bất kì thời điểm nào mà không cần thông báo trước.</p>
        </div>
    </section>
</div>
@endsection
