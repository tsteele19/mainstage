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
        Schema::create('events', function (Blueprint $table) {
            $table->id();

            // Identity
            $table->string('name');
            $table->string('type'); // Festival, Concert, Tour Stop, Special
            $table->text('bio')->nullable();

            // Ownership
            $table->foreignId('promoter_id')->constrained()->cascadeOnDelete();
            $table->foreignId('venue_id')->constrained()->cascadeOnDelete();

            // Scheduling
            $table->date('starts_at');
            $table->unsignedTinyInteger('duration')->default(1);

            // Attendance
            $table->unsignedInteger('expected_attendance')->default(0);
            $table->unsignedInteger('actual_attendance')->default(0);

            // Ticketing
            $table->decimal('base_ticket_price', 10, 2)->default(0);
            $table->decimal('vip_ticket_price', 10, 2)->default(0);

            // Financials
            $table->decimal('production_cost', 12, 2)->default(0);
            $table->decimal('marketing_cost', 12, 2)->default(0);
            $table->decimal('staffing_cost', 12, 2)->default(0);
            $table->decimal('misc_cost', 12, 2)->default(0);
            $table->decimal('revenue', 12, 2)->default(0);
            $table->decimal('profit', 12, 2)->default(0);

            // Lifecycle
            $table->string('status')->default('planning'); // planning, announced, on_sale, sold_out, live, completed, canceled

            // Gameplay
            $table->unsignedTinyInteger('prestige')->default(0);
            $table->unsignedTinyInteger('fan_satisfaction')->default(0);

            // Recurrence
            $table->boolean('is_recurring')->default(false);

            // Misc.
            $table->boolean('is_active')->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
