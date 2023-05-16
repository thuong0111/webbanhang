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
        Schema::create('tinh_tps', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ten');
            $table->bigInteger('TT');
            $table->nullableTimestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tinh_t_p_s');
    }
};
