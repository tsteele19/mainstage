<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    // Fillables
    protected $fillable = [
        'event_id',
        'artist_id',
        'agreed_fee',
        'guarantee_fee',
        'performance_day',
        'slot_order',
        'set_length_minutes',
        'is_headliner',
        'status',
    ];

    // Casts
    protected $casts = [
        'agreed_fee' => 'decimal:2',
        'guarantee_fee' => 'decimal:2',
        'performance_day' => 'integer',
        'slot_order' => 'integer',
        'set_length_minutes' => 'integer',
        'is_headliner' => 'boolean',
    ];

    /**
     * Relationships
     */
    // Event
    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    // Artist
    public function artist()
    {
        return $this->belongsTo(Artist::class);
    }
}
