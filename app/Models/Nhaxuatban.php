<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nhaxuatban extends Model
{
    protected $table = 'nhaxuatban';

    protected $primaryKey = 'manhaxuatban';

    public function sach()
    {
        return $this->hasMany(Sach::class, 'manhaxuatban');
    }

}
