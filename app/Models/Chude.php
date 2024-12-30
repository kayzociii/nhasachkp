<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chude extends Model
{
    protected $table = 'chude';

    protected $primaryKey = 'machude';

    public function sach()
    {
        return $this->hasMany(Sach::class, 'machude');
    }
}
