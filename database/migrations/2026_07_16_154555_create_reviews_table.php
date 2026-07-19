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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();

            $table->foreignId('business_id')->constrained()->cascadeOnDelete();

            $table->foreignId('user_id')->constrained()->cascadeOnDelete();

            // Rating (1 - 5)
            $table->unsignedTinyInteger('rating');

            // Review title
            $table->string('title')->nullable();
            //Review content
            $table->text('comment')->nullable();
            $table->timestamps();

            // Admin moderation
            $table->enum('status', ['pending','approved','rejected'])->default('approved');




        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
