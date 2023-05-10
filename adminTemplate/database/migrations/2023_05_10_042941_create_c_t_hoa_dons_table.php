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
        Schema::create('c_t_hoa_dons', function (Blueprint $table) {
            $table->foreignID('san_pham_id');
            $table->foreignID('hoa_don_id');
            $table->bigInteger('SL');
            $table->bigInteger('gia');
            $table->bigInteger('thanhtien');
            $table->nullableTimestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('c_t_hoa_dons');
    }
};
