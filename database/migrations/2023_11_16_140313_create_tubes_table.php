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
        Schema::create('tubes', function (Blueprint $table) {
            $table->id();
            $table->string('date');
            $table->string('kaw1')->nullable();
            $table->string('kaw2')->nullable();
            $table->string('khote1')->nullable();
            $table->string('khote2')->nullable();
            $table->string('size1')->nullable();
            $table->string('size2')->nullable();
            $table->string('white24')->nullable();
            $table->string('blue24')->nullable();
            $table->string('white16')->nullable();
            $table->string('blue16')->nullable();
            $table->string('white25')->nullable();
            $table->string('blue25')->nullable();
            $table->string('white3')->nullable();
            $table->string('blue3')->nullable();
            $table->string('lightblue')->nullable();
            $table->string('darkblue')->nullable();
            $table->string('green')->nullable();
            $table->string('yellow')->nullable();
            $table->string('red')->nullable();
            $table->string('pink')->nullable();
            $table->string('black')->nullable();
            $table->string('white')->nullable();
            $table->string('remark')->nullable()->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tubes');
    }
};
