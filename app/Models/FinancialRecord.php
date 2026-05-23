<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FinancialRecord extends Model
{
    // Fillables
    protected $fillable = [
        'promoter_id',
        'event_id',
        'category',
        'amount',
        'balance_after',
        'interest_rate',
        'due_at',
        'notes',
        'recorded_at',
    ];

    // Casts
    protected $casts = [
        'amount' => 'decimal:2',
        'balance_after' => 'decimal:2',
        'interest_rate' => 'decimal:2',
        'due_at' => 'date',
        'recorded_at' => 'date',
    ];

    /**
     * Relationships
     */
    // Promoter
    public function promoter()
    {
        return $this->belongsTo(Promoter::class);
    }

    // Event
    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
