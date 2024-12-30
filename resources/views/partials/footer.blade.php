<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nhà Sách PKT</title> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
</head>
<body>
    <!-- Footer -->
    <div class="footer-section">
        <div class="container">
            <div class="row">
                <!-- Cột 1: Về Chúng Tôi -->
                <div class="col-md-3 footer-column">
                    <h5>Về Chúng Tôi</h5>
                    <a href="{{ route('gioi-thieu') }}">Giới Thiệu Về Nhà Sách</a>
                    <a href="{{ route('dieu-khoan-su-dung') }}">Điều Khoản Sử Dụng</a>
                    <a href="{{ route('chinh-sach-bao-mat') }}">Chính Sách Bảo Mật</a>
                    <a href="{{ route('chinh-sach-ban-hang') }}">Chính Sách Bán Hàng</a>
                    <a href="{{ route('phuong-thuc-van-chuyen') }}">Phương Thức Vận Chuyển</a>
                </div>

                <!-- Cột 2: Tài Khoản Của Tôi -->
                <div class="col-md-3 footer-column">
                    <h5>Tài Khoản Của Tôi</h5>
                    <a href="{{ route('dang-nhap') }}">Đăng nhập</a>
                    <a href="{{ route('dang-ky') }}">Tạo tài khoản</a>
                </div>

                <!-- Cột 3: Hỗ Trợ Khách Hàng -->
                <div class="col-md-3 footer-column">
                    <h5>Hỗ Trợ Khách Hàng</h5>
                    <a href="{{ route('cac-cau-hoi-thuong-gap') }}">Các Câu Hỏi Thường Gặp</a>
                    <a href="{{ route('chinh-sach-doi-tra-hang') }}">Chính Sách Đổi/Trả Hàng</a>
                    <a href="{{ route('quy-dinh-viet-binh-luan') }}">Quy Định Viết Bình Luận</a>
                </div>

                <!-- Cột 4: Liên Hệ Với Chúng Tôi -->
                <div class="col-md-3 footer-column">
                    <h5>Liên Hệ Với Chúng Tôi</h5>
                    <p>Hotline: <strong>1900 9100</strong></p>
                    <p>Email: <strong>nhasachkp@gmail.com</strong></p>
                    <div class="social-icons">
                        <a href="https://www.facebook.com/profile.php?id=61570487152689" class="fab fa-facebook" target="_blank"></a>
                        <a href="https://www.tiktok.com/@nhasachpk?lang=en" class="fa-brands fa-tiktok" target="_blank"></a>
                        <a href="https://www.instagram.com/nhasachpk/" class="fab fa-instagram" target="_blank"></a>
                        <a href="https://www.youtube.com/channel/UCCs1_1oPpUOR3vTw5XuW6Ew" class="fab fa-youtube" target="_blank"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>