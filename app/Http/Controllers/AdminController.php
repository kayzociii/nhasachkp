<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sach;
use App\Models\Chude;
use App\Models\Tacgia;
use App\Models\Nhaxuatban;
use App\Models\HoaDon;
use App\Models\KhachHang;
use App\Models\NhanVien;

class AdminController extends Controller
{
    // Hiển thị danh sách sách
    public function indexBooks(Request $request)
    {
        // Lấy từ khóa tìm kiếm từ input
        $keyword = $request->input('search');

        // Truy vấn danh sách sách với tìm kiếm
        $books = Sach::with(['tacgia', 'chude'])
            ->when($keyword, function ($query, $keyword) {
                $query->where('tensach', 'like', "%{$keyword}%")
                    ->orWhereHas('tacgia', function ($query) use ($keyword) {
                        $query->where('tentacgia', 'like', "%{$keyword}%");
                    })
                    ->orWhereHas('chude', function ($query) use ($keyword) {
                        $query->where('tenchude', 'like', "%{$keyword}%");
                    });
            })
            ->paginate(5);

        // Trả về view với kết quả tìm kiếm
        return view('admin.books.index', compact('books', 'keyword'));
    }


    // Thêm sách
    public function createBook()
    {
        $chudes = Chude::all();
        $tacgias = Tacgia::all();
        $nhaxuatbans = Nhaxuatban::all();
        return view('admin.books.create', compact('chudes', 'tacgias', 'nhaxuatbans'));
    }

    public function storeBook(Request $request)
    {
        $request->validate([
            'tensach' => 'required',
            'mota' => 'required',
            'giasach' => 'required|numeric',
            'anhbia' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'soluongton' => 'required|numeric',
            'ngaycapnhat' => 'required|date',
            'barcode' => 'nullable|string|max:13',
            'machude' => 'required|integer|exists:chude,machude', 
            'matacgia' => 'required|integer|exists:tacgia,matacgia', 
            'manhaxuatban' => 'required|integer|exists:nhaxuatban,manhaxuatban'
        ]);

        $book = new Sach();
        $book->fill($request->all());

        if ($request->hasFile('anhbia')) {
            // Lấy tệp ảnh từ request
            $image = $request->file('anhbia');
            
            // Đặt tên file, bạn có thể thay đổi tùy ý
            $imageName = 'sach'. time() . '.' . $image->getClientOriginalExtension();
            
            // Di chuyển tệp đến thư mục public/images/books
            $image->move(public_path('images/books'), $imageName);
            
            // Lưu tên ảnh vào cơ sở dữ liệu
            $book->anhbia = $imageName;
        }

        $book->save();
        return redirect()->route('admin.books.index')->with('success', 'Book added successfully.');
    }

    // Sửa sách
    public function editBook($id)
    {
        $book = Sach::findOrFail($id);
        $chudes = Chude::all();
        $tacgias = Tacgia::all();
        $nhaxuatbans = Nhaxuatban::all();
        return view('admin.books.edit', compact('book', 'chudes', 'tacgias', 'nhaxuatbans'));
    }

    public function updateBook(Request $request, $id)
    {
        $request->validate([
            'tensach' => 'required',
            'mota' => 'required',
            'giasach' => 'required|numeric',
            'anhbia' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'soluongton' => 'required|numeric',
            'ngaycapnhat' => 'required|date',
            'barcode' => 'nullable|string|max:13',
            'machude' => 'required|integer|exists:chude,machude', 
            'matacgia' => 'required|integer|exists:tacgia,matacgia', 
            'manhaxuatban' => 'required|integer|exists:nhaxuatban,manhaxuatban'
        ]);

        $book = Sach::findOrFail($id);
        $book->fill($request->all());

        if ($request->hasFile('anhbia')) {
            // Lấy tệp ảnh từ request
            $image = $request->file('anhbia');
            
            // Đặt tên file, bạn có thể thay đổi tùy ý
            $imageName = 'sach'. time() . '.' . $image->getClientOriginalExtension();
            
            // Di chuyển tệp đến thư mục public/images/books
            $image->move(public_path('images/books'), $imageName);
            
            // Lưu tên ảnh vào cơ sở dữ liệu
            $book->anhbia = $imageName;
        }

        $book->save();
        return redirect()->route('admin.books.index')->with('success', 'Book updated successfully.');
    }

    // Xóa sách
    public function deleteBook($id)
    {
        $book = Sach::findOrFail($id);
        $book->delete();
        return redirect()->route('admin.books.index')->with('success', 'Book deleted successfully.');
    }

    // Hiển thị danh sách hóa đơn
    public function indexOrders(Request $request)
    {
        $query = HoaDon::query();

        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where('mahoadon', 'like', "%{$search}%")
                ->orWhere('hoten', 'like', "%{$search}%")
                ->orWhere('diachi', 'like', "%{$search}%")
                ->orWhere('sodienthoai', 'like', "%{$search}%");
        }

        $orders = $query->paginate(5);

        return view('admin.orders.index', compact('orders'));
    }


    // Thêm hóa đơn
    public function createOrder()
    {
        return view('admin.orders.create');
    }

    public function storeOrder(Request $request)
    {
        $request->validate([
            'hoten' => 'required',
            'diachi' => 'required',
            'sodienthoai' => 'required|numeric',
            'ngaydathang' => 'required|datetime',
            'tongtien' => 'required|numeric',
            'trangthaidonhang'=> 'required',
        ]);

        HoaDon::create($request->all());
        return redirect()->route('admin.orders.index')->with('success', 'Order added successfully.');
    }

    // Sửa hóa đơn
    public function editOrder($id)
    {
        $order = HoaDon::findOrFail($id);
        return view('admin.orders.edit', compact('order'));
    }

    public function updateOrder(Request $request, $id)
    {
        $request->validate([
            'hoten' => 'required',
            'diachi' => 'required',
            'sodienthoai' => 'required|numeric',
            'ngaydathang' => 'required|date',
            'tongtien' => 'required',
            'trangthaidonhang'=> 'required',
        ]);

        $order = HoaDon::findOrFail($id);
        $order->update($request->all());
        return redirect()->route('admin.orders.index')->with('success', 'Order updated successfully.');
    }

    // Xóa hóa đơn
    public function deleteOrder($id)
    {
        $order = HoaDon::findOrFail($id);
        $order->chitiethoadons()->delete(); 
        $order->delete();

        return redirect()->route('admin.orders.index')->with('success', 'Order deleted successfully.');
    }

    // Hiển thị danh sách khách hàng
    public function indexCustomers(Request $request)
    {
        $query = KhachHang::query();

        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where('makhachhang', 'like', "%{$search}%")
                ->orWhere('hoten', 'like', "%{$search}%")
                ->orWhere('diachi', 'like', "%{$search}%")
                ->orWhere('sodienthoai', 'like', "%{$search}%");
        }

        $customers = $query->paginate(5);

        return view('admin.customers.index', compact('customers'));
    }

    // Thêm khách hàng
    public function createCustomer()
    {
        return view('admin.customers.create');
    }

    public function storeCustomer(Request $request)
    {
        $request->validate([
            'hoten' => 'required',
            'diachi' => 'required',
            'sodienthoai' => 'required|numeric',
        ]);

        KhachHang::create($request->all());
        return redirect()->route('admin.customers.index')->with('success', 'Customer added successfully.');
    }

    // Sửa khách hàng
    public function editCustomer($id)
    {
        $customer = KhachHang::findOrFail($id);
        return view('admin.customers.edit', compact('customer'));
    }

    public function updateCustomer(Request $request, $id)
    {
        $request->validate([
            'hoten' => 'required',
            'diachi' => 'required',
            'sodienthoai' => 'required|numeric',
        ]);

        $customer = KhachHang::findOrFail($id);
        $customer->update($request->all());
        return redirect()->route('admin.customers.index')->with('success', 'Customer updated successfully.');
    }

    // Xóa khách hàng
    public function deleteCustomer($id)
    {
        $customer = KhachHang::findOrFail($id);
        $customer->delete();
        return redirect()->route('admin.customers.index')->with('success', 'Customer deleted successfully.');
    }

    // Hiển thị danh sách nhân viên
    public function indexEmployees(Request $request)
    {
        $query = NhanVien::query();

        // Kiểm tra nếu có từ khóa tìm kiếm
        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where('manhanvien', 'like', "%{$search}%")
                ->orWhere('hotennv', 'like', "%{$search}%")
                ->orWhere('diachinv', 'like', "%{$search}%")
                ->orWhere('sodienthoainv', 'like', "%{$search}%")
                ->orWhere('chucvunv', 'like', "%{$search}%");
        }

        // Lấy danh sách nhân viên với phân trang
        $employees = $query->paginate(10);

        // Trả về view với dữ liệu nhân viên
        return view('admin.employees.index', compact('employees'));
    }

    // Thêm nhân viên
    public function createEmployee()
    {
        return view('admin.employees.create');
    }

    public function storeEmployee(Request $request)
    {
        $request->validate([
            'hotennv' => 'required',
            'diachinv' => 'required',
            'sodienthoainv' => 'required|numeric',
            'chucvunv' => 'required',
        ]);

        NhanVien::create($request->all());
        return redirect()->route('admin.employees.index')->with('success', 'Employee added successfully.');
    }

    // Sửa nhân viên
    public function editEmployee($id)
    {
        $employee = NhanVien::findOrFail($id);
        return view('admin.employees.edit', compact('employee'));
    }

    public function updateEmployee(Request $request, $id)
    {
        $request->validate([
            'hotennv' => 'required',
            'diachinv' => 'required',
            'sodienthoainv' => 'required|numeric',
            'chucvunv' => 'required',
        ]);

        $employee = NhanVien::findOrFail($id);
        $employee->update($request->all());
        return redirect()->route('admin.employees.index')->with('success', 'Employee updated successfully.');
    }

    // Xóa nhân viên
    public function deleteEmployee($id)
    {
        $employee = NhanVien::findOrFail($id);
        $employee->delete();
        return redirect()->route('admin.employees.index')->with('success', 'Employee deleted successfully.');
    }

}

