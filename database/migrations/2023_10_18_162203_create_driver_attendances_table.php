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
        Schema::create('driver_attendances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('driver_id');

            $table->string('start_image')->nullable();
            $table->string('start_time')->nullable();
            $table->string('end_image')->nullable();
            $table->string('end_time')->nullable();
            $table->string('amount')->nullable();



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('driver_attendances');
    }
};
