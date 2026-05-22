<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    // Fillables
    protected $fillable = [
        'name',
        'type',
        'bio',
        'promoter_id',
        'venue_id',
        'starts_at',
        'duration',
        'expected_attendance',
        'actual_attendance',
        'base_ticket_price',
        'vip_ticket_price',
        'production_cost',
        'marketing_cost',
        'staffing_cost',
        'misc_cost',
        'revenue',
        'profit',
        'status',
        'prestige',
        'fan_satisfaction',
        'is_recurring',
        'is_active',
    ];

    // Casts
    protected $casts = [
        'starts_at' => 'date',
        'duration' => 'integer',
        'expected_attendance' => 'integer',
        'actual_attendance' => 'integer',
        'base_ticket_price' => 'decimal:2',
        'vip_ticket_price' => 'decimal:2',
        'production_cost' => 'decimal:2',
        'marketing_cost' => 'decimal:2',
        'staffing_cost' => 'decimal:2',
        'misc_cost' => 'decimal:2',
        'revenue' => 'decimal:2',
        'profit' => 'decimal:2',
        'prestige' => 'integer',
        'fan_satisfaction' => 'integer',
        'is_recurring' => 'boolean',
        'is_active' => 'boolean',
    ];

    /**
     * Relationships
     */
    // Promoter
    public function promoter()
    {
        return $this->belongsTo(Promoter::class);
    }

    // Venue
    public function venue()
    {
        return $this->belongsTo(Venue::class);
    }
}
