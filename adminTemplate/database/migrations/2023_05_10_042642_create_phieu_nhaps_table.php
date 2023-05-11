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
        Schema::create('phieu_nhaps', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nguoilap');
            $table->dateTime('ngaylap');
            $table->bigInteger('tongtien');
            $table->foreignID('nha_cung_cap_id')->constrained();
            $table->nullableTimestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phieu_nhaps');
    }
};
