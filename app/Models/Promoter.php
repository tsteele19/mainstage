<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Promoter extends Model
{
    // Fillables
    protected $fillable = [
        'name',
        'type',
        'bio',
        'starting_cash',
        'current_cash',
        'reputation',
        'experience',
        'is_player_controlled',
        'founded_at',
        'status',
    ];

    // Casts
    protected $casts = [
        'starting_cash' => 'decimal:2',
        'current_cash' => 'decimal:2',
        'reputation' => 'integer',
        'experience' => 'integer',
        'is_player_controlled' => 'boolean',
        'founded_at' => 'date',
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
