@extends('layouts.app')  

@section('title', 'Lịch sử mua hàng')  

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/orders.css') }}">
@endpush

@section('content')
<nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('welcome') }}">Trang chủ</a></li>
        <li class="breadcrumb-item active">Thông tin đơn hàng</li>
    </ol>
</nav>

<div class="container">
    <h2>Thông tin đơn hàng</h2>
    @if ($orders->count() > 0)
    <table>
        <thead>
            <tr>
                <th>ID Đơn Hàng</th>
                <th>Tên Khách Hàng</th>
                <th>Ngày Đặt</th>
                <th>Tổng Tiền</th>
                <th>Thao Tác</th>
                <th>Trạng Thái Đơn Hàng</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
            <tr>
                <td>{{ $order->mahoadon }}</td>
                <td>{{ $order->hoten }}</td>
                <td>{{ \Carbon\Carbon::parse($order->ngaydathang)->format('d/m/Y') }}</td>
                <td>{{ number_format($order->tongtien, 0, ',', '.') }}đ</td>
                <td><a href="{{ route('orderdetails.show', $order->mahoadon) }}">Xem chi tiết</a></td>
                <td>{{ \App\Models\HoaDon::getStatusText($order->trangthaidonhang) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p>Hiện tại bạn chưa có đơn hàng nào.</p>
    @endif
</div>
@endsection