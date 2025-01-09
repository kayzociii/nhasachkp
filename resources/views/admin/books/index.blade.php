@extends('layouts.admin')

@section('content')
<div class="col-12">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Quản lý sách</h5>
            <div class="d-flex gap-2">
            <form action="{{ route('admin.books.index') }}" method="GET" class="d-flex gap-2 w-100">
                <input type="search" name="search" class="form-control" placeholder="Tìm kiếm..." value="{{ request('search') }}">
                <button type="submit" class="btn btn-primary"><i class="bi bi-search"></i></button>
            </form>
                
            </div>
            <a href="{{ route('admin.books.create') }}" class="btn btn-success"><i class="bi bi-plus-lg"></i>Thêm sách mới</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Tên sách</th>
                            <th>Tác giả</th>
                            <th>Thể loại</th>
                            <th>Giá tiền</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($books as $book)
                            <tr>
                                <td>{{ $book->tensach }}</td>
                                <td>{{ $book->tacgia->tentacgia }}</td>
                                <td>{{ $book->chude->tenchude }}</td>
                                <td>{{ $book->giasach }} VND</td>
                                <td>
                                    <a href="{{ route('admin.books.edit', $book->masach) }}" class="btn btn-sm btn-primary">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('admin.books.delete', $book->masach) }}" method="POST" class="d-inline">
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
                @if (!$books->onFirstPage())
                    <li class="page-item">
                        <a class="page-link" href="{{ $books->appends(['search' => request('search')])->url(1) }}">Đầu</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="{{ $books->appends(['search' => request('search')])->previousPageUrl() }}">Trước</a>
                    </li>
                @endif

                @foreach (range(1, $books->lastPage()) as $page)
                    @if ($page == 1 || $page == 2 || ($page >= $books->currentPage() - 1 && $page <= $books->currentPage() + 1) || $page == $books->lastPage() || $page == $books->lastPage() - 1)
                        <li class="page-item {{ $page == $books->currentPage() ? 'active' : '' }}">
                            <a class="page-link" href="{{ $books->appends(['search' => request('search')])->url($page) }}">{{ $page }}</a>
                        </li>
                    @elseif ($page == $books->currentPage() - 2 || $page == $books->currentPage() + 2)
                        <li class="page-item disabled"><span class="page-link">...</span></li>
                    @endif
                @endforeach

                @if ($books->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $books->appends(['search' => request('search')])->nextPageUrl() }}">Sau</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="{{ $books->appends(['search' => request('search')])->url($books->lastPage()) }}">Cuối</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</div>
@endsection
