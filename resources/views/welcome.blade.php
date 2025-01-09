@extends('layouts.app')

@section('title', 'Nhà sách KP')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
@endpush

@section('content')
<body onscroll="handleScroll()">
    <div class="nav">
        <div class="dropdown">
            <button class="dropbtn"><i class="fas fa-bars"></i> Danh Mục <i class="fas fa-caret-down"></i></button>
            <div class="dropdown-content">
                @foreach($topics as $topic)
                    <a href="?machude={{ $topic->machude }}">{{ $topic->tenchude }}</a>
                @endforeach
            </div>
        </div>   
        <div class="search-bar">
            <form method="GET" action="" id="searchForm">
                <input type="text" name="search" placeholder="Tìm kiếm sách..." value="{{ $search_term }}">
                <i class="fas fa-search" onclick="document.getElementById('searchForm').submit();"></i>
            </form>
        </div>
        <div class="user-options">
        @if(Auth::check())
        <div class="dropdown">
            <span class="dropbtn">Xin chào, {{ Auth::user()->khachHang->hoten }}<i class="fas fa-caret-down"></i></span>
            <div class="dropdown-content">
            <a href="{{ route('account.edit') }}">Tài khoản của tôi</a>
            <a href="{{ route('orders.show') }}">Đơn hàng của tôi</a>
            <a href="{{ route('dang-xuat') }}" 
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Đăng xuất</a>
                <form id="logout-form" method="POST" action="{{ route('dang-xuat') }}" style="display: none;">
                @csrf
                </form>
            </div>
        </div>
        @else
            <a href="{{ route('dang-nhap') }}", class="loginbtn"><i class="fa-regular fa-user"></i> Đăng nhập</a>
        @endif
        <a href="{{ route('cart.index') }}">
            <i class="fas fa-shopping-cart"></i> Giỏ Hàng 
        </a>  
        </div>
    </div>
    
    <div class="breadcrumb-container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                @if ($current_topic)
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Trang chủ</a></li>
                    <li class="breadcrumb-item active">
                        <a href="{{ route('welcome', ['machude' => $current_topic->machude]) }}">
                            {{ $current_topic->tenchude }}
                        </a>
                    </li>
                @endif
                @if ($current_publisher)
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Trang chủ</a></li>
                    <li class="breadcrumb-item active">
                        <a href="{{ route('welcome', ['manhaxuatban' => $current_publisher->manhaxuatban]) }}">
                            Nhà xuất bản {{ $current_publisher->tennhaxuatban }}
                        </a>
                    </li>
                @endif
            </ol>
        </nav>
    </div>

    @if ($current_topic)
    <div class="book-genre-name">
        <h3>{{ $current_topic->tenchude }}</h3>
    </div>
    @endif

    @if ($current_publisher)
    <div class="book-genre-name">
        <h3>Nhà xuất bản {{ $current_publisher->tennhaxuatban }}</h3>
    </div>
    @endif
    
    @if (!$is_hidden)
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="images/banners/poster1.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="images/banners/poster2.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="images/banners/poster3.jpg" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="container my-4">
        <div class="row">
            <div class="col-12 col-md-6">
                <img src="images/banners/banner4.png" class="banner-image" alt="Banner 4">
            </div>
            <div class="col-12 col-md-3">
                <img src="images/banners/banner5.png" class="banner-image" alt="Banner 5">
            </div>
            <div class="col-12 col-md-3">
                <img src="images/banners/banner6.png" class="banner-image" alt="Banner 6">
            </div>
        </div>
    </div>

    <div class="container my-4">
        <div class="row">
            <div class="col-12 col-md-6">
                <img src="images/banners/banner7.png" class="banner-image banner7" alt="Banner 7">
            </div>
            <div class="col-12 col-md-6">
                <img src="images/banners/banner8.png" class="banner-image" alt="Banner 8">
            </div>
        </div>
    </div>
    @endif

    <div class="container my-4">
    <div class="row">
        <!-- Bộ lọc (cột bên trái) -->
        <div class="col-12 col-md-2">
            <form method="GET" action="" class="row g-3">
                <!-- Lọc theo giá tiền -->
                <div class="col-md-12">
                    <label for="priceRange" class="form-label">Lọc theo giá:</label>
                    <div class="d-flex align-items-center">
                        <span class="me-2">0 VND</span>
                        <input type="range" class="form-range" id="priceRange" min="0" max="5000000" step="10000" 
                                value="{{ request('max_price', 5000000) }}" 
                                oninput="updatePriceLabel(this.value)" 
                                name="max_price">
                        <span class="ms-2" id="priceLabel">{{ number_format(request('max_price', 5000000), 0, ',', '.') }} VND</span>
                    </div>
                </div>

                <!-- Lọc theo tác giả -->
                <div class="col-md-12">
                    <label for="author_id" class="form-label">Tác giả:</label>
                    <select class="form-select" name="author_id" id="author_id">
                        <option value="">Chọn tác giả</option>
                        @foreach($authors as $author)
                            <option value="{{ $author->matacgia }}" {{ request('author_id') == $author->matacgia ? 'selected' : '' }}>
                                {{ $author->tentacgia }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Lọc theo nhà xuất bản -->
                <div class="col-md-12">
                    <label for="publisher_id" class="form-label">Nhà xuất bản:</label>
                    <select class="form-select" name="publisher_id" id="publisher_id">
                        <option value="">Chọn nhà xuất bản</option>
                        @foreach($publishers as $publisher)
                            <option value="{{ $publisher->manhaxuatban }}" {{ request('publisher_id') == $publisher->manhaxuatban ? 'selected' : '' }}>
                                {{ $publisher->tennhaxuatban }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-12">
                    <label for="sort_by" class="form-label">Sắp xếp theo:</label>
                    <select class="form-select" name="sort_by" id="sort_by">
                        <option value="">Chọn sắp xếp</option>
                        <option value="az" {{ request('sort_by') == 'az' ? 'selected' : '' }}>A -> Z</option>
                        <option value="za" {{ request('sort_by') == 'za' ? 'selected' : '' }}>Z -> A</option>
                        <option value="price_asc" {{ request('sort_by') == 'price_asc' ? 'selected' : '' }}>Giá thấp -> cao</option>
                        <option value="price_desc" {{ request('sort_by') == 'price_desc' ? 'selected' : '' }}>Giá cao -> thấp</option>
                    </select>
                </div>

                <!-- Nút lọc -->
                <div class="col-md-12 text-end">
                    <button type="submit" class="btn btn-primary">Lọc</button>
                </div>
            </form>
        </div>

        <!-- Danh sách sách (cột bên phải) -->
        <div class="col-12 col-md-10">
            <div class="details">
                <div class="categories">
                    <div class="image-gallery">
                        @foreach($books as $book)
                            <div class="image-item">
                                <a href="{{ route('sach.show', $book->masach) }}">
                                    <img src="{{ asset('images/books/' . $book->anhbia) }}" alt="{{ $book->tensach }}" class="img-fluid">
                                </a>
                                <div class="book-details">
                                    <h5 class="book-title">{{ $book->tensach }}</h5>
                                    <p class="book-price">{{ number_format($book->giasach, 0, ',', '.') }}đ</p>
                                    <form method="POST" action="{{ route('cart.add') }}" onsubmit="console.log('Form is being submitted');">
                                        @csrf
                                        <input type="hidden" name="masach" value="{{ $book->masach }}">
                                        <input type="hidden" name="quantity" value="1">

                                        <!-- Kiểm tra nếu soluongton = 0 -->
                                        <button type="submit" 
                                            class="select-button @if($book->soluongton == 0) btn-disabled @endif" 
                                            @if($book->soluongton == 0) disabled @endif>
                                            @if($book->soluongton == 0)
                                                <i class="fas fa-shopping-cart"></i> HẾT HÀNG
                                            @else
                                                <i class="fas fa-shopping-cart"></i> CHỌN MUA
                                            @endif
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>  
            </div>
        </div>
    </div>
    </div>

    <div class="pagi">
    <!-- Liên kết Trang trước -->
    @if ($books->currentPage() > 1)
        <a href="{{ $books->previousPageUrl() }}&search={{ urlencode($search_term) }}&machude={{ $machude }}&max_price={{ request('max_price') }}&author_id={{ request('author_id') }}&publisher_id={{ request('publisher_id') }}&sort_by={{ request('sort_by') }}" class="page-item">&#171;</a>
    @else
        <a href="#" class="page-item disabled">&#171;</a>
    @endif

    <!-- Các số trang -->
    @foreach ($books->getUrlRange(1, $books->lastPage()) as $page => $url)
        <a href="{{ $url }}&search={{ urlencode($search_term) }}&machude={{ $machude }}&max_price={{ request('max_price') }}&author_id={{ request('author_id') }}&publisher_id={{ request('publisher_id') }}&sort_by={{ request('sort_by') }}" class="page-item {{ $page == $books->currentPage() ? 'active' : '' }}">
            {{ $page }}
        </a>
    @endforeach

    <!-- Liên kết Trang sau -->
    @if ($books->hasMorePages())
        <a href="{{ $books->nextPageUrl() }}&search={{ urlencode($search_term) }}&machude={{ $machude }}&max_price={{ request('max_price') }}&author_id={{ request('author_id') }}&publisher_id={{ request('publisher_id') }}&sort_by={{ request('sort_by') }}" class="page-item">&#187;</a>
    @else
        <a href="#" class="page-item disabled">&#187;</a>
    @endif
    </div>


    <div class="container my-4">
    <!-- Mục Sách Gợi Ý Đọc -->
    <div class="suggested-books">
        <div class="d-flex justify-content-between align-items-center">
            <h2>BẠN NÊN ĐỌC THỬ</h2>
            <div>
                <button class="btn btn-secondary btn-sm me-1 btn-prev" data-slider="slider1">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <button class="btn btn-secondary btn-sm btn-next" data-slider="slider1">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>
        </div>

        <!-- Slider -->
        <div id="slider1" class="slider-container position-relative overflow-hidden">
            <div class="slider-track d-flex transition" data-current-slide="0">
                @foreach($suggested_books as $book)
                <div class="book-item text-center">
                    <div class="image-item">
                        <a href="{{ route('sach.show', $book->masach) }}">
                            <img src="{{ asset('images/books/' . $book->anhbia) }}" alt="{{ $book->tensach }}" class="img-fluid">
                        </a>
                        <div class="book-details">
                            <h5 class="book-title">{{ $book->tensach }}</h5>
                            <p class="book-price">{{ number_format($book->giasach, 0, ',', '.') }}đ</p>
                            <form method="POST" action="{{ route('cart.add') }}" onsubmit="console.log('Form is being submitted');">
                                @csrf
                                <input type="hidden" name="masach" value="{{ $book->masach }}">
                                <input type="hidden" name="quantity" value="1">

                                <!-- Kiểm tra nếu soluongton = 0 -->
                                <button type="submit" 
                                    class="select-button @if($book->soluongton == 0) btn-disabled @endif" 
                                    @if($book->soluongton == 0) disabled @endif>
                                    @if($book->soluongton == 0)
                                        <i class="fas fa-shopping-cart"></i> HẾT HÀNG
                                    @else
                                        <i class="fas fa-shopping-cart"></i> CHỌN MUA
                                    @endif
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        </div>
    </div>

    @if (!$is_hidden)
    <div class="container my-4">
    <!-- Mục Logo Nhà Xuất Bản -->
    <div class="publisher-logos mt-4">
        <div class="d-flex justify-content-between flex-wrap">
            @foreach($logo8 as $publisher)
            <div class="publisher-logo text-center m-2" onclick="filterByPublisher({{ $publisher->manhaxuatban }})" style="cursor: pointer;">
                <div class="logo-wrapper">
                    <img src="{{ asset('images/publishers/' . $publisher->logonhaxuatban) }}" alt="{{ $publisher->tennhaxuatban }}" class="img-fluid rounded-circle">
                </div>
                <p class="publisher-name mt-2">{{ $publisher->tennhaxuatban }}</p>
            </div>
            @endforeach
            </div>
        </div>
    </div>

    <div class="container my-4">
    <!-- Mục Sách Văn Học -->
    <div class="suggested-books">
    <div class="d-flex justify-content-between align-items-center">
        <h2>SÁCH VĂN HỌC</h2>
        <div>
            <button class="btn btn-secondary btn-sm me-1 btn-prev" data-slider="slider2">
                <i class="fas fa-chevron-left"></i>
            </button>
            <button class="btn btn-secondary btn-sm btn-next" data-slider="slider2">
                <i class="fas fa-chevron-right"></i>
            </button>
        </div>
    </div>

    <!-- Slider -->
    <div id="slider2" class="slider-container position-relative overflow-hidden">
        <div class="slider-track d-flex transition" data-current-slide="0">
            @foreach($suggested_sachvanhoc as $book)
                <div class="book-item text-center">
                    <div class="image-item">
                        <a href="{{ route('sach.show', $book->masach) }}">
                            <img src="{{ asset('images/books/' . $book->anhbia) }}" alt="{{ $book->tensach }}" class="img-fluid">
                        </a>
                        <div class="book-details">
                            <h5 class="book-title">{{ $book->tensach }}</h5>
                            <p class="book-price">{{ number_format($book->giasach, 0, ',', '.') }}đ</p>
                            <form method="POST" action="{{ route('cart.add') }}" onsubmit="console.log('Form is being submitted');">
                                @csrf
                                <input type="hidden" name="masach" value="{{ $book->masach }}">
                                <input type="hidden" name="quantity" value="1">

                                <!-- Kiểm tra nếu soluongton = 0 -->
                                <button type="submit" 
                                    class="select-button @if($book->soluongton == 0) btn-disabled @endif" 
                                    @if($book->soluongton == 0) disabled @endif>
                                    @if($book->soluongton == 0)
                                        <i class="fas fa-shopping-cart"></i> HẾT HÀNG
                                    @else
                                        <i class="fas fa-shopping-cart"></i> CHỌN MUA
                                    @endif
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </div>
    </div>

    <div class="container my-4">
    <!-- Mục Sách kỹ năng sống -->
    <div class="suggested-books">
    <div class="d-flex justify-content-between align-items-center">
        <h2>SÁCH KĨ NĂNG SỐNG</h2>
        <div>
            <button class="btn btn-secondary btn-sm me-1 btn-prev" data-slider="slider3">
                <i class="fas fa-chevron-left"></i>
            </button>
            <button class="btn btn-secondary btn-sm btn-next" data-slider="slider3">
                <i class="fas fa-chevron-right"></i>
            </button>
        </div>
    </div>

    <!-- Slider -->
    <div id="slider3" class="slider-container position-relative overflow-hidden">
        <div class="slider-track d-flex transition" data-current-slide="0">
            @foreach($suggested_sachkinangsong as $book)
                <div class="book-item text-center">
                    <div class="image-item">
                        <a href="{{ route('sach.show', $book->masach) }}">
                            <img src="{{ asset('images/books/' . $book->anhbia) }}" alt="{{ $book->tensach }}" class="img-fluid">
                        </a>
                        <div class="book-details">
                            <h5 class="book-title">{{ $book->tensach }}</h5>
                            <p class="book-price">{{ number_format($book->giasach, 0, ',', '.') }}đ</p>
                            <form method="POST" action="{{ route('cart.add') }}" onsubmit="console.log('Form is being submitted');">
                                @csrf
                                <input type="hidden" name="masach" value="{{ $book->masach }}">
                                <input type="hidden" name="quantity" value="1">

                                <!-- Kiểm tra nếu soluongton = 0 -->
                                <button type="submit" 
                                    class="select-button @if($book->soluongton == 0) btn-disabled @endif" 
                                    @if($book->soluongton == 0) disabled @endif>
                                    @if($book->soluongton == 0)
                                        <i class="fas fa-shopping-cart"></i> HẾT HÀNG
                                    @else
                                        <i class="fas fa-shopping-cart"></i> CHỌN MUA
                                    @endif
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </div>
    </div>
    @endif
    <!-- nút backtotop -->
    <button class="backToTop" onclick="scrollToTop()">
        <i class="fa-solid fa-angles-up"></i>
    </button>
</body>
@endsection

