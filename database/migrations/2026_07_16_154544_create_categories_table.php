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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();

            // Basic Information
            $table->string('name')->unique();
            $table->text('description')->nullable();

            // Display
            $table->string('icon')->nullable();      // e.g. bi-shop, bi-hospital
            $table->string('image')->nullable();     // Category image

            // Status
            $table->boolean('is_active')->default(true);
            $table->boolean('is_featured')->default(false);

  
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};