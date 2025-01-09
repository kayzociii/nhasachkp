@extends('layouts.admin')

@section('content')
<div class="col-12">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Quản lý khách hàng</h5>
            <div class="d-flex gap-2">
                <form method="GET" action="{{ route('admin.customers.index') }}" class="d-flex gap-2">
                    <input type="search" name="search" class="form-control" placeholder="Tìm kiếm..."
                        value="{{ request('search') }}">
                    <button type="submit" class="btn btn-primary"><i class="bi bi-search"></i></button>
                </form>
            </div>
            <a href="{{ route('admin.customers.create') }}" class="btn btn-success"><i class="bi bi-plus-lg"></i>Thêm khách hàng mới</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Tên khách hàng</th>
                            <th>Địa chỉ</th>
                            <th>Số điện thoại</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($customers as $customer)
                            <tr>
                                <td>{{ $customer->hoten }}</td>
                                <td>{{ $customer->diachi }}</td>
                                <td>{{ $customer->sodienthoai }}</td>
                                <td>
                                    <a href="{{ route('admin.customers.edit', $customer->makhachhang) }}" class="btn btn-sm btn-primary">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('admin.customers.delete', $customer->makhachhang) }}" method="POST" class="d-inline">
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
                @if (!$customers->onFirstPage())
                    <li class="page-item">
                        <a class="page-link" href="{{ $customers->appends(['search' => request('search')])->url(1) }}">Đầu</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="{{ $customers->appends(['search' => request('search')])->previousPageUrl() }}">Trước</a>
                    </li>
                @endif

                @foreach (range(1, $customers->lastPage()) as $page)
                    @if ($page == 1 || $page == $customers->lastPage() || abs($page - $customers->currentPage()) <= 1)
                        <li class="page-item {{ $page == $customers->currentPage() ? 'active' : '' }}">
                            <a class="page-link" href="{{ $customers->appends(['search' => request('search')])->url($page) }}">
                                {{ $page }}
                            </a>
                        </li>
                    @elseif ($page == $customers->currentPage() - 2 || $page == $customers->currentPage() + 2)
                        <li class="page-item disabled"><span class="page-link">...</span></li>
                    @endif
                @endforeach

                @if ($customers->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $customers->appends(['search' => request('search')])->nextPageUrl() }}">Sau</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="{{ $customers->appends(['search' => request('search')])->url($customers->lastPage()) }}">Cuối</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</div>
@endsection
