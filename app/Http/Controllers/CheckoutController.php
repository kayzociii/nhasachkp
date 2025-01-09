<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\HoaDon;
use App\Models\ChiTietHoaDon;
use App\Models\Sach;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\KhachHang;
use App\Models\Province;
use App\Models\District;
use App\Models\Wards;

class CheckoutController extends Controller
{
    public function showCheckoutForm()
    {
        $user = Auth::user();

        if (!$user || !$user->makhachhang) {
            return redirect()->route('dang-nhap')->with('error', 'Vui lòng đăng nhập để tiến hành thanh toán.');
        }

        $khachHang = KhachHang::find($user->makhachhang);
        $provinces = Province::all();

        $cart = session('cart', []);

        $totalAmount = 0;
        $totalQuantity = 0;

        foreach ($cart as $item) {
            $totalAmount += $item['giasach'] * $item['soluong'];
            $totalQuantity += $item['soluong'];
        }

        if (empty($cart)) {
            return redirect()->back()->with('error', 'Giỏ hàng trống. Không thể thanh toán.');
        }

        return view('interface.checkout', [
            'khachHang' => $khachHang,
            'email' => $user->email,
            'cart' => $cart,
            'totalAmount' => $totalAmount,
            'totalQuantity' => $totalQuantity,
            'provinces' => $provinces
        ]);
        
    }
    public function checkout(Request $request)
    {
        $user = Auth::user();
        $cart = session('cart', []);
        $tongTien = $request->input('tongtien');

        $provinceName = Province::find($request->province)->name;
        $districtName = District::find($request->district)->name;
        $wardsName = Wards::find($request->wards)->name;
        $fullAddress = $request->address . ', ' . $wardsName . ', ' . $districtName . ', ' . $provinceName;

        if (empty($cart)) {
            return redirect()->back()->with('error', 'Giỏ hàng trống. Không thể thanh toán.');
        }

        $hoadon = HoaDon::create([
            'hoten' => $request->input('hoten'),
            'diachi' => $fullAddress,
            'sodienthoai' => $request->input('sodienthoai'),
            'ngaydathang' => now(),
            'tongtien' => $tongTien,
            'makhachhang' => $user->makhachhang,
            'maphuongthuc' => $request->input('maphuongthuc'),
        ]);

        foreach ($cart as $masach => $item) {
            ChiTietHoaDon::create([
                'mahoadon' => $hoadon->mahoadon,
                'masach' => $masach,
                'soluong' => $item['soluong'],
                'dongia' => $item['giasach'],
            ]);

            Sach::where('masach', $masach)
                ->where('soluongton', '>=', $item['soluong'])
                ->decrement('soluongton', $item['soluong']);
        }

        session()->forget('cart');

        return redirect()->route('welcome')->with('success', 'Thanh toán thành công!');
    }

    public function fetchDistricts(Request $request)
    {
        $province_id = $request->province_id;
        $districts = District::where('province_id', $province_id)->get();

        foreach ($districts as $district) {
            $data[] = [
                'id' => $district->district_id,
                'name' => $district->name
            ];
        }

        return response()->json($data);
    }

    public function fetchWards(Request $request)
    {
        $district_id = $request->district_id;
        $wards = Wards::where('district_id', $district_id)->get();

        foreach ($wards as $ward) {
            $data[] = [
                'id' => $ward->wards_id,
                'name' => $ward->name
            ];
        }

        return response()->json($data);
    }

    public function showOrders()
    {
        if (!Auth::check()) {
            return redirect()->route('dang-nhap')->with('error', 'Vui lòng đăng nhập để tiếp tục.');
        }

        $user = Auth::user();  

        $orders = HoaDon::where('makhachhang', $user->makhachhang)
            ->select('mahoadon', 'hoten', 'ngaydathang', 'tongtien', 'trangthaidonhang')
            ->get();

        return view('interface.orders', compact('orders'));
    }

    public function showOrderDetails($mahoadon)
    {

        $orderDetails = ChiTietHoaDon::with('sach')
            ->where('mahoadon', $mahoadon)
            ->get();

        if ($orderDetails->isEmpty()) {
            return redirect()->route('interface.orders')->with('error', 'Không tìm thấy chi tiết đơn hàng.');
        }

        return view('interface.orderdetails', compact('orderDetails'));
    }
}

