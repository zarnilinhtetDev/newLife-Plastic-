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
        Schema::create('car_expenses', function (Blueprint $table) {

            $table->id();
            $table->foreignId('car_id')->nullable();
            $table->string('description')->nullable();
            $table->string('car_vouncher')->nullable();
            $table->string('amount');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('car_expenses');
    }
};
