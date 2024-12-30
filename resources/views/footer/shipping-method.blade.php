@extends('layouts.app')  

@section('title', 'Phương thức vận chuyển')  

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/footer-link.css') }}">
@endpush

@section('content')
<div class="container">
    <header>
        <h1>Phương Thức Vận Chuyển</h1>
    </header>
    
    <section>
        <div class="icon">
            <i class="fas fa-truck"></i>
            <h3>Chi Phí Vận Chuyển Khi Mua Hàng Online Trên Website</h3>
        </div>
        <ul>
            <li>Phí vận chuyển mọi giá trị đơn hàng tại TP.Hồ Chí Minh (các quận nội thành, ngoại thành và các huyện): <span class="highlight">19.000đ</span>.</li>
            <li>Phí vận chuyển mọi giá trị đơn hàng có tại các tỉnh/thành phố khác (ngoài TP.Hồ Chí Minh): <span class="highlight">29.000đ</span>.</li>
        </ul>
    </section>
</div>
@endsection
