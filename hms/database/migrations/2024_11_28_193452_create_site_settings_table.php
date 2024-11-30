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
        Schema::create('site_settings', function (Blueprint $table) {
            $table->id();
            $table->string('site_name')->default('AR Web Academy');
            $table->string('site_email')->default('ahsanulalam.500@gmail');
            $table->string('site_phone')->default('01773766658');
            $table->string('site_address')->nullable();
            $table->string('site_logo');
            $table->string('site_favicon');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('site_settings');
    }
};
