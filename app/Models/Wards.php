<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wards extends Model
{
    protected $table = 'wards';

    protected $primaryKey = 'wards_id';

    protected $fillable = ['wards_id', 'district_id', 'name'];

    public function districts()
    {
        return $this->hasMany(District::class, 'province_id');
    }

}
