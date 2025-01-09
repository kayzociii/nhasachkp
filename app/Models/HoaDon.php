<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HoaDon extends Model
{
    protected $table = 'hoadon';

    protected $primaryKey = 'mahoadon';
    public $timestamps = false;

    protected $fillable = [
        'hoten',
        'diachi',            
        'sodienthoai',       
        'ngaydathang',      
        'tongtien',   
        'trangthaidonhang',       
        'makhachhang',      
        'maphuongthuc',      
    ];

    protected $casts = [
        'ngaydathang' => 'datetime',
    ];

    const STATUS_PENDING = 0;
    const STATUS_CONFIRMED = 1;
    const STATUS_PREPARING = 2;
    const STATUS_SHIPPED = 3;
    const STATUS_DELIVERY = 4;
    const STATUS_DELIVERED = 5;
    const STATUS_CANCELLED = 6;
    public function chitiethoadons()
    {
        return $this->hasMany(ChiTietHoaDon::class, 'mahoadon');
    }

    public static function getStatusText($status)
    {
        $statuses = [
            self::STATUS_PENDING => 'Đã đặt hàng',
            self::STATUS_CONFIRMED => 'Đã xác nhận',
            self::STATUS_PREPARING => 'Đang chuẩn bị sách',
            self::STATUS_SHIPPED => 'Đang vận chuyển',
            self::STATUS_DELIVERY => 'Đang giao hàng',
            self::STATUS_DELIVERED => 'Đã giao hàng',
            self::STATUS_CANCELLED => 'Đã hủy',
        ];
        return $statuses[$status] ?? 'Không xác định';
    }

}

