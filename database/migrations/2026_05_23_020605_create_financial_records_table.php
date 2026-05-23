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
        Schema::create('financial_records', function (Blueprint $table) {
            $table->id();

            // Ownership
            $table->foreignId('promoter_id')->constrained()->cascadeOnDelete();
            $table->foreignId('event_id')->nullable()->constrained()->nullOnDelete();

            // Finance
            $table->string('category'); // Ticket Sale, Artist Fee(s), Staaff cost, Venue Cost, Merch Sales, Sponsorship, Loan, Debt Payment, Refunds, Penallty
            $table->decimal('amount', 12, 2)->default(0);
            $table->decimal('balance_after', 12, 2)->default(0);

            // Loan / debt support
            $table->decimal('interest_rate', 5, 2)->nullable();
            $table->date('due_at')->nullable();

            // Metadata
            $table->text('notes')->nullable();  // Financial detail ie. 'Weather event'
            $table->date('recorded_at');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('financial_records');
    }
};
