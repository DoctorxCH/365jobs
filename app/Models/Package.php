<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Package extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'job_credits',
        'duration_days',
        'price',
        'currency',
        'active',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'job_credits' => 'integer',
        'duration_days' => 'integer',
        'active' => 'boolean',
    ];

    public function purchases(): HasMany
    {
        return $this->hasMany(Purchase::class);
    }
}
