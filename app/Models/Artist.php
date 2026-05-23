<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    //  Fillables
    protected $fillable = [
        'name',
        'genre',
        'bio',
        'booking_cost',
        'guarantee_fee',
        'popularity',
        'draw_power',
        'reliability',
        'production_value',
        'fan_loyalty',
        'requires_full_band',
        'requires_large_stage',
        'based_in',
        'is_active',
        'career_start_at',
        'retired_at',
    ];

    // Casts
    protected $casts = [
        'booking_cost' => 'decimal:2',
        'guarantee_fee' => 'decimal:2',
        'popularity' => 'integer',
        'draw_power' => 'integer',
        'reliability' => 'integer',
        'production_value' => 'integer',
        'fan_loyalty' => 'integer',
        'requires_full_band' => 'boolean',
        'requires_large_stage' => 'boolean',
        'is_active' => 'boolean',
        'career_start_at' => 'date',
        'retired_at' => 'date',
    ];

    /**
     * Relationships
     */
    // Bookings
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
