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
        Schema::create('phuong_xas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tenpx');
            $table->foreignID('quan_huyen_id')->constrained();
            $table->bigInteger('TT');
            $table->nullableTimestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phuong_xas');
    }
};
