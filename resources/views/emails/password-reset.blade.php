@push('styles')
    <link rel="stylesheet" href="{{ asset('css/footer-link.css') }}">
@endpush

<div class="container">
    <p>Bạn đã yêu cầu đặt lại mật khẩu. Vui lòng nhấn vào liên kết dưới đây để đặt lại mật khẩu:</p>
    <a href="{{ $resetLink }}">{{ $resetLink }}</a>
    <p>Nếu bạn không yêu cầu đặt lại mật khẩu, vui lòng bỏ qua email này.</p>
</div>
