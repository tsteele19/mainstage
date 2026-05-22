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
        Schema::create('promoters', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type')->default('indie');
            $table->text('bio')->nullable();
            $table->decimal('starting_cash', 12, 2)->default(0);
            $table->decimal('current_cash', 12, 2)->default(0);
            $table->unsignedTinyInteger('reputation')->default(0);
            $table->unsignedTinyInteger('experience')->default(0);
            $table->boolean('is_player_controlled')->default(false);
            $table->date('founded_at')->nullable();
            $table->string('status')->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('promoters');
    }
};
