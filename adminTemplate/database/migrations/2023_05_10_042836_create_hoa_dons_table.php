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
            $table->datetimes('tgDatHang');
            $table->datetimes('tgThanhToan');
            $table->datetimes('tgVanChuyen');
            $table->datetimes('tgHoanThanh');
            $table->datetimes('tgHuy');
            $table->bigInteger('tongtien');
            $table->bigInteger('phiShip');
            $table->string('tenShipper');
            $table->string('sdtShipper');
            $table->foreignID('khach_hang_id');
            $table->foreignID('ds_trang_thai_id');
            $table->foreignID('pt_thanh_toan_id');
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
