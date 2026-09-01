<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bikes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('category')->nullable();
            $table->string('description')->nullable();
            $table->string('status')->default('Tersedia');
            $table->unsignedInteger('price_1h')->default(10000);
            $table->unsignedInteger('price_2h')->default(25000);
            $table->unsignedInteger('price_1day')->default(55000);
            $table->string('photo_path')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bikes');
    }
};
