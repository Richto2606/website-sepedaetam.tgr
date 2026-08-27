<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bike_id')->constrained()->cascadeOnDelete();
            $table->string('renter_name');
            $table->string('phone');
            $table->string('duration');
            $table->string('status_payment')->default('DP');
            $table->dateTime('start_at')->nullable();
            $table->unsignedInteger('total')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
