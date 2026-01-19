<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Package extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'price',
        'currency',
        'job_credits',
        'team_member_limit',
        'duration_days',
        'is_active',
        'sort',
        'description',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'job_credits' => 'integer',
        'team_member_limit' => 'integer',
        'duration_days' => 'integer',
        'is_active' => 'boolean',
        'sort' => 'integer',
    ];

    public function purchases(): HasMany
    {
        return $this->hasMany(Purchase::class);
    }
}
