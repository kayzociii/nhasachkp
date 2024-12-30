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
        Schema::create('sach', function (Blueprint $table) {
            $table->id('masach');
            $table->string('tensach');
            $table->string('mota');
            $table->decimal('giasach');
            $table->string('anhbia');
            $table->integer('soluongton');
            $table->dateTime('ngaycapnhat');
            $table->foreignId('machude')->constrained('chude');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sach');
    }
};
