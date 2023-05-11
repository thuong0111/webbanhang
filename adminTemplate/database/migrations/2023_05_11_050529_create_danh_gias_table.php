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
        Schema::create('danh_gias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('hinh');
            $table->string('noidung');
            $table->float('sosao');
            $table->dateTime('thoigian');
            $table->foreignID('khach_hang_id')->constrained();
            $table->foreignID('san_pham_id')->constrained();
            $table->nullableTimestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('danh_gias');
    }
};
