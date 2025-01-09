<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChiTietHoaDon extends Model
{
    protected $table = 'chitiethoadon';

    protected $primaryKey = 'machitiethoadon';

    public $timestamps = false;

    protected $fillable = [ 'mahoadon', 'masach', 'soluong', 'dongia',];
    public function sach()
    {
        return $this->belongsTo(Sach::class, 'masach');
    }
}
