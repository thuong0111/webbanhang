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
        Schema::create('san_phams', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tenSP');
            $table->string('hinh');
            $table->string('mota');
            $table->bigInteger('SL');
            $table->bigInteger('gia');
            $table->foreignID('loai_san_pham_id')->constrained();
            $table->foreignID('bien_the_id')->constrained();
            $table->bigInteger('TT');
            $table->nullableTimestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('san_phams');
    }
};
