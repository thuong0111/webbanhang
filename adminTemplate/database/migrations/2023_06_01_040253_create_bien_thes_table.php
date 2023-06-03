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
        Schema::create('bien_thes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('san_pham_id');
            $table->foreign('san_pham_id')->references('id')->on('productts')->onDelete('cascade');
            $table->unsignedBigInteger('mau_id');
            $table->foreign('mau_id')->references('id')->on('maus')->onDelete('cascade');
            $table->unsignedBigInteger('size_id');
            $table->foreign('size_id')->references('id')->on('sizes')->onDelete('cascade');
            $table->bigInteger('SL');
            $table->nullableTimestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bien_thes');
    }
};
