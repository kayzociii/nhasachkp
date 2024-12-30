<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nhà Sách PKT</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
</head>
<body>
    <div class="header">
        <div class="container">
            <div class="logo">
                <img src="images/logo.png">
                <a href="{{ route('welcome') }}">
                    <span class="logo-text">Nhà Sách KP</span>
                </a>
            </div>
            <div class="user-options">
                <a href="#"><i class="fas fa-phone-alt"></i> Dịch Vụ Khách Hàng: 1900 9100</a>
            </div>
        </div>
    </div>
</body>
</html>