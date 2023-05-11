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
        Schema::create('gio_hangs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('gia');
            $table->bigInteger('SL');
            $table->bigInteger('thanhtien');
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
        Schema::dropIfExists('gio_hangs');
    }
};
