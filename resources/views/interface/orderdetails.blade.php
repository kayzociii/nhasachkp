@extends('layouts.app')  

@section('title', 'Lịch sử mua hàng')  

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/orderdetails.css') }}">
@endpush

@section('content')
<nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('welcome') }}">Trang chủ</a></li>
        <li class="breadcrumb-item"><a href="{{ route('orders.show') }}">Thông tin đơn hàng</a></li>
        <li class="breadcrumb-item active">Chi tiết đơn hàng</li>
    </ol>
</nav>

<div class="container">
    <h2>Chi tiết đơn hàng</h2>
    <table class="table">
        <thead>
            <tr style="text-align:center;">
                <th>Ảnh sách</th>
                <th>Tên sách</th>
                <th>Số lượng</th>
                <th>Đơn giá</th>
                <th>Tổng tiền</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orderDetails as $item)
                <tr>
                    <td><img src="{{ asset('images/books/' . $item->sach->anhbia) }}" class="product-image" alt="{{ $item->sach->tensach }}"></td>
                    <td>{{ $item->sach->tensach }}</td>
                    <td>{{ $item->soluong }}</td>
                    <td>{{ number_format($item->sach->giasach, 0, ',', '.') }}đ</td>
                    <td>{{ number_format($item->sach->giasach * $item->soluong, 0, ',', '.') }}đ</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div style="text-align: center;">
        <a href="{{ route('orders.show') }}" class="back-button">Quay lại danh sách đơn hàng</a>
    </div>
</div>
@endsection