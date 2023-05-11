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
        Schema::create('giam_gias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tenGiamGia');
            $table->float('chietkhau');
            $table->dateTime('ngayBD');
            $table->dateTime('ngayKT');
            $table->bigInteger('soTienToiDa');
            $table->foreignID('san_pham_id')->constrained();
            $table->bigInteger('TT');
            $table->nullableTimestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('giam_gias');
    }
};
