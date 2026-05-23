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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();

            // Ownership
            $table->foreignId('event_id')->constrained()->cascadeOnDelete();
            $table->foreignId('artist_id')->constrained()->cascadeOnDelete();

            // Financials
            $table->decimal('agreed_fee', 12, 2)->default(0);
            $table->decimal('guarantee_fee', 12, 2)->default(0);

            // Scheduling
            $table->unsignedTinyInteger('performance_day')->default(1);
            $table->unsignedTinyInteger('slot_order')->default(1);
            $table->unsignedSmallInteger('set_length_minutes')->default(30);

            // Gameplay
            $table->boolean('is_headliner')->default(false);

            // Lifecycle
            $table->string('status')->default('booked'); // pending, booked, declined, canceled, completed

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
