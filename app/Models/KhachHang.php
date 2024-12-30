<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KhachHang extends Model
{
    protected $table = 'khachhang';
    protected $primaryKey = 'makhachhang';
    public $timestamps = false;

    protected $fillable = ['hoten'];

    public function user()
    {
        return $this->hasOne(User::class, 'makhachhang'); 
    }
}

