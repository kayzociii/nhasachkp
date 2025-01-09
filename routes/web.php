<?php

use App\Http\Controllers\SachController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\AdminController;


Route::get('/', [SachController::class, 'index'])->name('welcome');
Route::get('/gioi-thieu', [PageController::class, 'about'])->name('gioi-thieu');
Route::get('/dieu-khoan-su-dung', [PageController::class, 'terms'])->name('dieu-khoan-su-dung');
Route::get('/chinh-sach-bao-mat', [PageController::class, 'privacy'])->name('chinh-sach-bao-mat');
Route::get('/chinh-sach-ban-hang', [PageController::class, 'sales'])->name('chinh-sach-ban-hang');
Route::get('/phuong-thuc-van-chuyen', [PageController::class, 'shipping'])->name('phuong-thuc-van-chuyen');
Route::get('/dang-nhap', [PageController::class, 'login'])->name('dang-nhap');
Route::get('/dang-ky', [PageController::class, 'register'])->name('dang-ky');
Route::get('/cac-cau-hoi-thuong-gap', [PageController::class, 'faq'])->name('cac-cau-hoi-thuong-gap');
Route::get('/chinh-sach-doi-tra-hang', [PageController::class, 'returnPolicy'])->name('chinh-sach-doi-tra-hang');
Route::get('/quy-dinh-viet-binh-luan', [PageController::class, 'commentPolicy'])->name('quy-dinh-viet-binh-luan');
Route::get('/dang-nhap', [AuthController::class, 'loginForm'])->name('dang-nhap');
Route::post('/dang-nhap', [AuthController::class, 'login']);
Route::post('/dang-xuat', [AuthController::class, 'logout'])->name('dang-xuat');
Route::get('/dang-ky', [AuthController::class, 'showRegisterForm'])->name('dang-ky');
Route::post('/dang-ky', [AuthController::class, 'register']);
Route::get('account', [AuthController::class, 'edit'])->name('account.edit');
Route::post('account', [AuthController::class, 'update'])->name('account.update');
Route::get('/verify/{token}', [AuthController::class, 'verify'])->name('verify');
Route::get('quen-mat-khau', [AuthController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('quen-mat-khau', [AuthController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('dat-lai-mat-khau/{token}', [AuthController::class, 'showResetForm'])->name('password.reset');
Route::post('dat-lai-mat-khau', [AuthController::class, 'reset'])->name('password.update');
Route::prefix('auth')->group(function () {
    Route::get('/fetch-districts', [AuthController::class, 'fetchDistricts'])->name('auth.fetchDistricts');
    Route::get('/fetch-wards', [AuthController::class, 'fetchWards'])->name('auth.fetchWards');
});

Route::prefix('checkout')->group(function () {
    Route::get('/fetch-districts', [CheckoutController::class, 'fetchDistricts'])->name('checkout.fetchDistricts');
    Route::get('/fetch-wards', [CheckoutController::class, 'fetchWards'])->name('checkout.fetchWards');
});
Route::get('sach/{masach}', [SachController::class, 'show'])->name('sach.show'); 
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
Route::post('/cart/update', [CartController::class, 'updateCart'])->name('cart.update');
Route::get('/cart/clear', [CartController::class, 'clearCart'])->name('cart.clear');
Route::get('/cart/remove/{masach}', [CartController::class, 'removeFromCart'])->name('cart.remove');
Route::get('/checkout', [CheckoutController::class, 'showCheckoutForm'])->name('checkout.form');
Route::post('/checkout', [CheckoutController::class, 'checkout'])->name('checkout');
Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
});

Route::get('/orders', [CheckoutController::class, 'showOrders'])->name('orders.show');
Route::get('order/{mahoadon}', [CheckoutController::class, 'showorderDetails'])->name('orderdetails.show');

//ADMIN
Route::prefix('admin')->name('admin.')->group(function () {
    // Route sách
    Route::get('/books', [AdminController::class, 'indexBooks'])->name('books.index');
    Route::get('/books/create', [AdminController::class, 'createBook'])->name('books.create');
    Route::post('/books', [AdminController::class, 'storeBook'])->name('books.store');
    Route::get('/books/{id}/edit', [AdminController::class, 'editBook'])->name('books.edit');
    Route::put('/books/{id}', [AdminController::class, 'updateBook'])->name('books.update');
    Route::delete('/books/{id}', [AdminController::class, 'deleteBook'])->name('books.delete');

    // Route hóa đơn
    Route::get('/orders', [AdminController::class, 'indexOrders'])->name('orders.index');
    Route::get('/orders/create', [AdminController::class, 'createOrder'])->name('orders.create');
    Route::post('/orders', [AdminController::class, 'storeOrder'])->name('orders.store');
    Route::get('/orders/{id}/edit', [AdminController::class, 'editOrder'])->name('orders.edit');
    Route::put('/orders/{id}', [AdminController::class, 'updateOrder'])->name('orders.update');
    Route::delete('/orders/{id}', [AdminController::class, 'deleteOrder'])->name('orders.delete');

    // Route khách hàng
    Route::get('/customers', [AdminController::class, 'indexCustomers'])->name('customers.index');
    Route::get('/customers/create', [AdminController::class, 'createCustomer'])->name('customers.create');
    Route::post('/customers', [AdminController::class, 'storeCustomer'])->name('customers.store');
    Route::get('/customers/{id}/edit', [AdminController::class, 'editCustomer'])->name('customers.edit');
    Route::put('/customers/{id}', [AdminController::class, 'updateCustomer'])->name('customers.update');
    Route::delete('/customers/{id}', [AdminController::class, 'deleteCustomer'])->name('customers.delete');

    // Route nhân viên
    Route::get('/employees', [AdminController::class, 'indexEmployees'])->name('employees.index');
    Route::get('/employees/create', [AdminController::class, 'createEmployee'])->name('employees.create');
    Route::post('/employees', [AdminController::class, 'storeEmployee'])->name('employees.store');
    Route::get('/employees/{id}/edit', [AdminController::class, 'editEmployee'])->name('employees.edit');
    Route::put('/employees/{id}', [AdminController::class, 'updateEmployee'])->name('employees.update');
    Route::delete('/employees/{id}', [AdminController::class, 'deleteEmployee'])->name('employees.delete');
});


?>