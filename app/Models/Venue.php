<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venue extends Model
{
    // Fillables
    protected $fillable = [
        'name',
        'city',
        'state',
        'country',
        'type',
        'tier',
        'capacity',
        'rental_cost',
        'maintenance_cost',
        'weather_exposure',
        'prestige',
        'parking_rating',
        'max_stages',
        'curfew_hour',
        'noise_restriction',
        'is_active',
        'bio',
    ];

    // Casts
    protected $casts = [
        'capacity' => 'integer',
        'rental_cost' => 'decimal:2',
        'maintenance_cost' => 'decimal:2',
        'weather_exposure' => 'integer',
        'prestige' => 'integer',
        'parking_rating' => 'integer',
        'max_stages' => 'integer',
        'curfew_hour' => 'integer',
        'noise_restriction' => 'boolean',
        'is_active' => 'boolean',
    ];

    /**
     * Relationships
     */
    // Events
    public function events()
    {
        return $this->hasMany(Event::class);
    }
}
