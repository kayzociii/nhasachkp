@extends('layouts.admin')

@section('content')
<div class="col-12">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Quản lý đơn hàng</h5>
            <div class="d-flex gap-2 mb-3">
                <form method="GET" action="{{ route('admin.orders.index') }}" class="d-flex gap-2">
                    <input type="search" name="search" class="form-control" placeholder="Tìm kiếm..."
                        value="{{ request('search') }}">
                    <button type="submit" class="btn btn-primary"><i class="bi bi-search"></i></button>
                </form>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Họ tên KH</th>
                            <th>Địa chỉ</th>
                            <th>SĐT</th>
                            <th>Ngày đặt hàng</th>
                            <th>Tổng tiền</th>
                            <th>Trạng thái</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{ $order->hoten }}</td>
                                <td>{{ $order->diachi }}</td>
                                <td>{{ $order->sodienthoai }}</td>
                                <td>{{ $order->ngaydathang }}</td>
                                <td>{{ $order->tongtien }}</td>
                                <td>{{ \App\Models\HoaDon::getStatusText($order->trangthaidonhang) }}</td>
                                <td>
                                    <a href="{{ route('admin.orders.edit', $order->mahoadon) }}" class="btn btn-sm btn-primary">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('admin.orders.delete', $order->mahoadon) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <ul class="pagination">
                @if (!$orders->onFirstPage())
                    <li class="page-item">
                        <a class="page-link" href="{{ $orders->appends(['search' => request('search')])->url(1) }}">Đầu</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="{{ $orders->appends(['search' => request('search')])->previousPageUrl() }}">Trước</a>
                    </li>
                @endif

                @foreach (range(1, $orders->lastPage()) as $page)
                    @if ($page == 1 || $page == $orders->lastPage() || abs($page - $orders->currentPage()) <= 1)
                        <li class="page-item {{ $page == $orders->currentPage() ? 'active' : '' }}">
                            <a class="page-link" href="{{ $orders->appends(['search' => request('search')])->url($page) }}">
                                {{ $page }}
                            </a>
                        </li>
                    @elseif ($page == $orders->currentPage() - 2 || $page == $orders->currentPage() + 2)
                        <li class="page-item disabled"><span class="page-link">...</span></li>
                    @endif
                @endforeach

                @if ($orders->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $orders->appends(['search' => request('search')])->nextPageUrl() }}">Sau</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="{{ $orders->appends(['search' => request('search')])->url($orders->lastPage()) }}">Cuối</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</div>
@endsection
