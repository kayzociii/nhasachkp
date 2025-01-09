@extends('layouts.admin')

@section('content')
<div class="col-12">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Quản lý nhân viên</h5>
            <div class="d-flex gap-2">
                <form method="GET" action="{{ route('admin.employees.index') }}" class="d-flex gap-2">
                    <input type="search" name="search" class="form-control" placeholder="Tìm kiếm..."
                        value="{{ request('search') }}">
                    <button type="submit" class="btn btn-primary"><i class="bi bi-search"></i></button>
                </form>
            </div>
            <a href="{{ route('admin.employees.create') }}" class="btn btn-success"><i class="bi bi-plus-lg"></i>Thêm nhân viên mới</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Tên nhân viên</th>
                            <th>Địa chỉ</th>
                            <th>Số điện thoại</th>
                            <th>Chức vụ</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($employees as $employee)
                            <tr>
                                <td>{{ $employee->hotennv }}</td>
                                <td>{{ $employee->diachinv }}</td>
                                <td>{{ $employee->sodienthoainv }}</td>
                                <td>{{ $employee->chucvunv }}</td>
                                <td>
                                    <a href="{{ route('admin.employees.edit', $employee->manhanvien) }}" class="btn btn-sm btn-primary">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('admin.employees.delete', $employee->manhanvien) }}" method="POST" class="d-inline">
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
                <!-- Nút Đầu và Trước -->
                @if (!$employees->onFirstPage())
                    <li class="page-item"><a class="page-link" href="{{ $employees->url(1) }}">Đầu</a></li>
                    <li class="page-item"><a class="page-link" href="{{ $employees->previousPageUrl() }}">Trước</a></li>
                @endif

                <!-- Hiển thị số trang -->
                @foreach (range(1, $employees->lastPage()) as $page)
                    @if ($page == 1 || $page == 2 || ($page >= $employees->currentPage() - 1 && $page <= $employees->currentPage() + 1) || $page == $employees->lastPage() || $page == $employees->lastPage() - 1)
                        <li class="page-item {{ $page == $employees->currentPage() ? 'active' : '' }}">
                            <a class="page-link" href="{{ $employees->url($page) }}">{{ $page }}</a>
                        </li>
                    @elseif ($page == $employees->currentPage() - 2 || $page == $employees->currentPage() + 2)
                        <li class="page-item disabled"><span class="page-link">...</span></li>
                    @endif
                @endforeach

                <!-- Nút Sau và Cuối -->
                @if ($employees->hasMorePages())
                    <li class="page-item"><a class="page-link" href="{{ $employees->nextPageUrl() }}">Sau</a></li>
                    <li class="page-item"><a class="page-link" href="{{ $employees->url($employees->lastPage()) }}">Cuối</a></li>
                @endif
            </ul>
        </div>
    </div>
</div>
@endsection
