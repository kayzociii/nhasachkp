<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $table = 'district';

    protected $primaryKey = 'district_id';

    protected $fillable = ['district_id', 'province_id', 'name'];

    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id'); 
    }

    public function wards()
    {
        return $this->hasMany(Wards::class, 'district_id'); 
    }

}
