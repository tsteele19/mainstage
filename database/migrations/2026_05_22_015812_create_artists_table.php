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
        Schema::create('artists', function (Blueprint $table) {
            $table->id();

            // Identity
            $table->string('name');
            $table->string('genre'); // Rock, EDM, Country, Pop
            $table->text('bio')->nullable();

            // Booking/Costs
            $table->decimal('booking_cost', 12, 2)->default(0);
            $table->decimal('guarantee_fee', 12, 2)->default(0);

            // Artist Stats
            $table->unsignedTinyInteger('popularity')->default(0);
            $table->unsignedTinyInteger('draw_power')->default(0);
            $table->unsignedTinyInteger('reliability')->default(0);
            $table->unsignedTinyInteger('production_value')->default(0);
            $table->unsignedTinyInteger('fan_loyalty')->default(0);

            // Booking Constraints
            $table->boolean('requires_full_band')->default(false);
            $table->boolean('requires_large_stage')->default(false);
            $table->string('based_in')->nullable();

            // Misc.
            $table->boolean('is_active')->default(true);
            $table->date('career_start_at')->nullable();
            $table->date('retired_at')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('artists');
    }
};
