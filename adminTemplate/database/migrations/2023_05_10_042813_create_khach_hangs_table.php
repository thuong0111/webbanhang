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
        Schema::create('khach_hangs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tenDangNhap');
            $table->string('holot');
            $table->string('ten');
            $table->string('hinh');
            $table->string('sdt');
            $table->string('password');
            $table->string('phuongxa');
            $table->string('quanhuyen');
            $table->string('tinhtp');
            $table->nullableTimestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('khach_hangs');
    }
};
