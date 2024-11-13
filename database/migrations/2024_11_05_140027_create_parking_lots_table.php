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
        Schema::create('parking_lots', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('faculty_id')->constrained()->onDelete('cascade');
            $table->string('location');
            $table->string('image')->nullable();
            $table->integer('capacity');
            $table->integer('current_capacity')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parking_lots');
    }
};
