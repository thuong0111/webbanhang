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
        Schema::create('quan_huyens', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tenqh');
            $table->bigInteger('TT');
            $table->unsignedBigInteger('tinh_tp_id');
            $table->foreign('tinh_tp_id')->references('id')->on('tinh_tps')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quan_huyens');
    }
};
