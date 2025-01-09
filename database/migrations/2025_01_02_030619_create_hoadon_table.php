<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('hoadon', function (Blueprint $table) {
            $table->id('mahoadon');
            $table->string('hoten');
            $table->string('diachi');
            $table->string('sodienthoai');
            $table->dateTime('ngaydathang');
            $table->decimal('tongtien');
            $table->foreignId('makhachhang')->constrained('khachhang');
            $table->foreignId('maphuongthuc')->constrained('phuongthucthanhtoan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hoadon');
    }
};
