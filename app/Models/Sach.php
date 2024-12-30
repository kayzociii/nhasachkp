<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sach extends Model
{
    protected $table = 'sach';

    protected $primaryKey = 'masach';

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
