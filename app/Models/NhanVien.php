<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NhanVien extends Model
{
    protected $table = 'nhanvien';
    protected $primaryKey = 'manhanvien';
    public $timestamps = false;

    protected $fillable = ['hotennv', 'diachinv', 'sodienthoainv', 'chucvunv'];

    public function user()
    {
        return $this->hasOne(User::class, 'manhanvien'); 
    }
}
