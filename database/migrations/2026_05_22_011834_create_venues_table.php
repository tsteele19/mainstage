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
        Schema::create('venues', function (Blueprint $table) {
            $table->id();

            // Location info
            $table->string('name');
            $table->string('city');
            $table->string('state');
            $table->string('country')->default('USA');

            // Type/Tier
            $table->string('type'); // physical venue/site type (club, theater, hall, arena, stadium, park, fairgrounds, pavilion, festival_grounds)
            $table->string('tier'); // gameplay event scale (club, hall, arena, stadium, festival)
            $table->unsignedInteger('capacity');

            // Costs
            $table->decimal('rental_cost', 12, 2)->default(0);
            $table->decimal('maintenance_cost', 12, 2)->default(0);

            // Venue information
            $table->unsignedTinyInteger('weather_exposure')->default(0);
            $table->unsignedTinyInteger('prestige')->default(0);
            $table->unsignedTinyInteger('parking_rating')->default(0);
            $table->unsignedTinyInteger('max_stages')->default(1);
            $table->unsignedTinyInteger('curfew_hour')->default(23);
            $table->boolean('noise_restriction')->default(false);

            // Misc.
            $table->boolean('is_active')->default(true);
            $table->text('bio')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('venues');
    }
};
