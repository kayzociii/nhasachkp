<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Province;
use App\Models\District;
use App\Models\Wards;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerificationMail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;


class AuthController extends Controller
{
    public function loginForm()
    {
        return view('account.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');
        $remember = $request->has('remember');

        $user = User::where('tendangnhap', $credentials['username'])->first();

        if (!$user) {
            return back()->withErrors(['usernameerror' => 'Tên đăng nhập không tồn tại.']);
        }

        if (!Hash::check($credentials['password'], $user->password)) {
            return back()->withErrors(['passworderror' => 'Mật khẩu không đúng.']);
        }

        if (is_null($user->email_verified_at)) {
            return back()->withErrors(['verifiedemail' => 'Vui lòng xác thực email của bạn trước khi đăng nhập.']);
        }
    
        if (Auth::attempt(['tendangnhap' => $credentials['username'], 'password' => $credentials['password']], $remember)) {
            if ($user->quyen == 'khachhang') {
                return redirect()->route('welcome')->with('success', 'Xin chào, ' . $user->khachhang->hoten);
            } elseif ($user->quyen == 'admin') {
                return redirect()->route('admin.dashboard');
            } else {
                Auth::logout();
                return back()->with('roleerror', 'Bạn không có quyền truy cập.');
            }
        }
    
        return back()->withErrors(['loginerror' => 'Đăng nhập không thành công.']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('dang-nhap');
    }

    public function showRegisterForm()
    {
        $provinces = Province::all();
        return view('account.register', compact('provinces'));
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

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|unique:user,tendangnhap',
            'email' => 'required|email|unique:user,email',
            'phone' => ['required','regex:/^(03|05|07|08|09)\d{8}$/',],
            'address' => 'required',
            'province' => 'required', 
            'district' => 'required', 
            'wards' => 'required',    
            'password' => 'required|confirmed|min:6',   
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $provinceName = Province::find($request->province)->name;
        $districtName = District::find($request->district)->name;
        $wardsName = Wards::find($request->wards)->name;
        $fullAddress = $request->address . ', ' . $wardsName . ', ' . $districtName . ', ' . $provinceName;
        
        $khachhangId = DB::table('khachhang')->insertGetId([
            'hoten' => $request->name,   
            'sodienthoai' => $request->phone,
            'diachi' => $fullAddress,           
        ]);

        // Thêm thông tin vào bảng `user` với khóa ngoại `makhachhang`
        $user = User::create([
            'tendangnhap' => $request->username,
            'password' => Hash::make($request->password), // Mã hóa mật khẩu
            'quyen' => 'khachhang',
            'makhachhang' => $khachhangId, // Liên kết với bảng khachhang
            'email' => $request->email,
            'email_verification_token' => Str::random(60),
        ]);

        // Gửi mail xác thực
        Mail::to($user->email)->send(new VerificationMail($user));

        return redirect()->route('dang-nhap')->with('success', 'Đăng ký thành công! Hãy kiểm tra email để xác thực tài khoản.');
    }

    public function verify($token)
    {
        $user = User::where('email_verification_token', $token)->first();

        if ($user) {
            // Update user's email verified status
            $user->email_verified_at = now();
            $user->email_verification_token = null;  // Clear the verification token
            $user->save();

            return redirect()->route('dang-nhap')->with('success', 'Tài khoản đã được xác thực thành công.');
        } else {
            return redirect()->route('dang-nhap')->with('error', 'Token xác thực không hợp lệ.');
        }
    }

    public function showLinkRequestForm()
    {
        return view('account.forgot-password'); // Trang nhập email
    }

    public function sendResetLinkEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:user,email',
        ], [
            'email.exists' => 'Tài khoản không tồn tại!',
        ]);
    
        $user = DB::table('user')->where('email', $request->email)->first();
    
        if (!$user) {
            return back()->withErrors(['email' => 'Tài khoản không tồn tại!']);
        }
    
        // Tạo token và lưu vào cột `password_reset_tokens`
        $token = Str::random(60);
        DB::table('user')
            ->where('email', $user->email)
            ->update(['password_reset_tokens' => $token]);
    
        // Gửi email đặt lại mật khẩu
        Mail::to($user->email)->send(new \App\Mail\PasswordResetMail($user, $token));
    
        return back()->with('status', 'Yêu cầu đặt lại mật khẩu đã được gửi đến email của bạn!');
    }

    public function showResetForm($token)
    {
        return view('account.reset-password', ['token' => $token]); // Trang đặt lại mật khẩu
    }

    public function reset(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:user,email',
            'password' => 'required|min:6|confirmed',
            'token' => 'required',
        ], [
            'email.exists' => 'Email không tồn tại trong hệ thống!',
        ]);
    
        $user = DB::table('user')
            ->where('email', $request->email)
            ->where('password_reset_tokens', $request->token)
            ->first();
    
        if (!$user) {
            return back()->withErrors(['email' => 'Token không hợp lệ hoặc đã hết hạn.']);
        }
    
        DB::table('user')
            ->where('email', $request->email)
            ->update([
                'password' => Hash::make($request->password),
                'password_reset_tokens' => null,
            ]);
    
        return redirect()->route('dang-nhap')->with('success', 'Mật khẩu đã được cập nhật thành công!');
    }
}
