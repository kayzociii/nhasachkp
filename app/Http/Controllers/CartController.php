<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sach;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = Session::get('cart', []);
        $totalAmount = 0;
        $totalQuantity = 0;

        foreach ($cartItems as $item) {
            $totalAmount += $item['giasach'] * $item['soluong'];
            $totalQuantity += $item['soluong'];
        }

        return view('interface.cart', compact('cartItems', 'totalAmount', 'totalQuantity'));
    }

    public function addToCart(Request $request)
    {
        $masach = $request->input('masach');
        $quantity = $request->input('quantity');

        $book = Sach::findOrFail($masach);
        $maxQuantity = $book->soluongton;

        $cart = Session::get('cart', []);

        if (isset($cart[$masach])) {
            // Kiểm tra nếu số lượng yêu cầu cộng thêm vào giỏ hàng vượt quá số lượng tồn kho
            if ($cart[$masach]['soluong'] + $quantity > $maxQuantity) {
                // Nếu vượt quá, chỉ cập nhật đến số lượng tồn kho
                $cart[$masach]['soluong'] = $maxQuantity;
            } else {
                // Nếu không vượt quá, cộng thêm số lượng vào giỏ hàng
                $cart[$masach]['soluong'] += $quantity;
            }
        } else {
            // Nếu không có sách trong giỏ, thêm sách mới vào giỏ hàng
            if ($quantity > $maxQuantity) {
                $quantity = $maxQuantity; // Giới hạn số lượng không vượt quá tồn kho
            }
    
            $cart[$masach] = [
                'tensach' => $book->tensach,
                'giasach' => $book->giasach,
                'soluong' => $quantity,
                'anhbia' => $book->anhbia,
            ];
        }

        Session::put('cart', $cart);

        return redirect()->route('cart.index')->with('success', 'Sản phẩm đã được thêm vào giỏ hàng!');
    }

    public function updateCart(Request $request)
    {
        $masach = $request->input('masach');
        $quantity = $request->input('quantity');

        $book = Sach::findOrFail($masach);
        $maxQuantity = $book->soluongton;

        if ($quantity > $maxQuantity) {
            return redirect()->back()->withErrors(['error' => 'Số lượng yêu cầu vượt quá số lượng tồn kho!']);
        }

        $cart = Session::get('cart', []);

        if ($quantity <= 0) {
            unset($cart[$masach]);
        } else {
            $cart[$masach]['soluong'] = $quantity;
            $cart[$masach]['total'] = $book->giasach * $quantity;
        }

        Session::put('cart', $cart);

        return redirect()->route('cart.index');
    }

    public function clearCart()
    {
        Session::forget('cart');
        return redirect()->route('cart.index');
    }

    public function removeFromCart($masach)
    {
        $cart = Session::get('cart', []);
        if (isset($cart[$masach])) {
            unset($cart[$masach]);
        }

        Session::put('cart', $cart);

        return redirect()->route('cart.index');
    }
}
