<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Company extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'category',
        'description',
        'logo_path',
        'ico',
        'dic',
        'ic_dph',
        'contact_name',
        'contact_email',
        'contact_phone',
        'contact_address',
        'company_address',
        'website',
        'phone',
        'employees_count',
        'country',
        'city',
        'verified_at',
        'active',
        'team_seat_limit',
    ];

    protected $casts = [
        'employees_count' => 'integer',
        'verified_at' => 'datetime',
        'active' => 'boolean',
        'team_seat_limit' => 'integer',
    ];

    /* -----------------
     | Relations
     |-----------------*/

    public function jobs(): HasMany
    {
        return $this->hasMany(Job::class);
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class)
            ->withTimestamps();
    }
}
