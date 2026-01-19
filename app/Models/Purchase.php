<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Purchase extends Model
{
    protected $fillable = [
        'company_id',
        'package_id',
        'job_credits_total',
        'job_credits_remaining',
        'provider',
        'provider_ref',
        'purchased_at',
    ];

    protected $casts = [
        'job_credits_total' => 'integer',
        'job_credits_remaining' => 'integer',
        'purchased_at' => 'datetime',
    ];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function package(): BelongsTo
    {
        return $this->belongsTo(Package::class);
    }
}
