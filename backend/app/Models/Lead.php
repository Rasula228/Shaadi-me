<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;

    protected $fillable = [
        'p1name',
        'p2name',
        'email',
        'phone',
        'community',
        'city',
        'wedding_date',
        'guests',
        'venue_type',
        'budget',
        'styles',
        'services',
        'events',
        'notes',
        'referral',
    ];

    protected $casts = [
        'styles' => 'array',
        'services' => 'array',
        'events' => 'array',
    ];
}
