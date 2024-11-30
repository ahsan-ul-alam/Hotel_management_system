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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('room_number');
            $table->enum('room_type', ['single', 'double', 'suite', 'deluxe', 'penthouse'])->default('single');
            $table->string('room_price');
            $table->enum('room_status', ['available', 'booked'])->default('available');
            $table->string('room_image')->nullable();
            $table->string('room_description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
