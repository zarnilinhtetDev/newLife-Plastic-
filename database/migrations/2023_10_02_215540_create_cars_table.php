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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('driver_id')->nullable();
            $table->string('car_brand_name');
            $table->string('car_type')->nullable();
            $table->string('car_model')->nullable();
            $table->string('car_model_year')->nullable();
            $table->string('plate_number');
            $table->string('car_color');
            $table->string('mileage');
            $table->string('car_image');
            $table->string('owner_name');
            $table->string('phone_number');
            $table->string('owner_id_front');
            $table->string('owner_id_back');
            $table->string('engine_power');
            $table->string('nrc_number');
            $table->string('address');
            $table->string('owner_pay');
            $table->string('message')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
