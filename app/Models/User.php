<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    protected $table = 'user';

    protected $primaryKey = 'mauser';

    protected $fillable = ['tendangnhap', 'password', 'quyen', 'makhachhang', 'email', 'email_verification_token', 'email_verified_at', 'remember_token', 'password_reset_tokens'];

    public $timestamps = false;

    public function khachHang()
    {
        return $this->belongsTo(KhachHang::class, 'makhachhang');
    }

    public function hoadons() 
    { 
        return $this->hasMany(HoaDon::class, 'makhachhang');
    }
}
