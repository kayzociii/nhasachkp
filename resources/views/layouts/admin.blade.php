<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-md-3 col-lg-2 d-md-block bg-dark sidebar collapse">
                <div class="position-sticky pt-3">
                    <div class="text-center mb-4">
                        <!-- <img src="../images/logo.png" alt="Admin" class="rounded-circle" width="80" height="80"> -->
                        <h5 class="text-white mt-2">Admin Panel</h5>
                    </div>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link text-white {{ Request::is('admin/books*') ? 'active' : '' }}" href="{{ route('admin.books.index') }}">
                                <i class="bi bi-book me-2"></i> Quản lý sách
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white {{ Request::is('admin/orders*') ? 'active' : '' }}" href="{{ route('admin.orders.index') }}">
                                <i class="bi bi-cart me-2"></i> Quản lý đơn hàng
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white {{ Request::is('admin/customers*') ? 'active' : '' }}" href="{{ route('admin.customers.index') }}">
                                <i class="bi bi-people me-2"></i> Quản lý khách hàng
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white {{ Request::is('admin/employees*') ? 'active' : '' }}" href="{{ route('admin.employees.index') }}">
                                <i class="bi bi-person-badge me-2"></i> Quản lý nhân viên
                            </a>
                        </li>
                        <li class="nav-item">
                            <form action="{{ route('dang-xuat') }}" method="POST">
                                @csrf
                                <button type="submit" class="nav-link text-white btn btn-link">
                                    <i class="bi bi-box-arrow-right me-2"></i> Đăng xuất
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                @yield('content') 
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
