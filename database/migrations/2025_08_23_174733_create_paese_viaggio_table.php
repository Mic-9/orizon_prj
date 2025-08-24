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
        Schema::create('paese_viaggio', function (Blueprint $table) {
            $table->id();
            $table->foreignId('paese_id')->constrained('paesi');
            $table->foreignId('viaggio_id')->constrained('viaggi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paese_viaggio');
    }
};
