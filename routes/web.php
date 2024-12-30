<?php

use App\Http\Controllers\SachController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;

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
Route::get('/verify/{token}', [AuthController::class, 'verify'])->name('verify');
Route::get('quen-mat-khau', [AuthController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('quen-mat-khau', [AuthController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('dat-lai-mat-khau/{token}', [AuthController::class, 'showResetForm'])->name('password.reset');
Route::post('dat-lai-mat-khau', [AuthController::class, 'reset'])->name('password.update');
Route::get('/fetch-districts', [AuthController::class, 'fetchDistricts']);
Route::get('/fetch-wards', [AuthController::class, 'fetchWards']);
Route::get('sach/{masach}', [SachController::class, 'show'])->name('sach.show'); 
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
Route::post('/cart/update', [CartController::class, 'updateCart'])->name('cart.update');
Route::get('/cart/clear', [CartController::class, 'clearCart'])->name('cart.clear');
Route::get('/cart/remove/{masach}', [CartController::class, 'removeFromCart'])->name('cart.remove');

?>