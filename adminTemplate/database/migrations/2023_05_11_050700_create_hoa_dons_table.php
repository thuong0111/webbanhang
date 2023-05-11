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
        Schema::create('hoa_dons', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->dateTime('tgDatHang');
            $table->dateTime('tgThanhToan');
            $table->dateTime('tgVanChuyen');
            $table->dateTime('tgHoanThanh');
            $table->dateTime('tgHuy');
            $table->bigInteger('tongtien');
            $table->bigInteger('phiShip');
            $table->string('tenShipper');
            $table->string('sdtShipper');
            $table->foreignID('khach_hang_id')->constrained();
            $table->foreignID('ds_trang_thai_id')->constrained();
            $table->foreignID('pt_thanh_toan_id')->constrained();
            $table->nullableTimestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hoa_dons');
    }
};
