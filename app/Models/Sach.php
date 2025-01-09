<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sach extends Model
{
    protected $table = 'sach';

    protected $primaryKey = 'masach';

    public $timestamps = false;

    protected $fillable = [
        'tensach',
        'giasach',
        'mota',
        'soluongton',
        'anhbia', 
        'ngaycapnhat',
        'barcode',
        'machude',
        'matacgia',
        'manhaxuatban',
    ];

    protected $casts = [
        'ngaycapnhat' => 'date',
    ];

    public function chude()
    {
        return $this->belongsTo(Chude::class, 'machude');
    }
    public function tacgia()
    {
        return $this->belongsTo(Tacgia::class, 'matacgia');
    }
    public function nhaxuatban()
    {
        return $this->belongsTo(Nhaxuatban::class, 'manhaxuatban');
    }   
}
