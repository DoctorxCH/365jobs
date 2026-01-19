<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Purchase extends Model
{
    protected $fillable = [
        'company_id',
        'package_id',
        'starts_at',
        'ends_at',
        'job_credits_granted',
        'team_member_limit',
        'price',
        'currency',
        'status',
        'payment_provider',
        'provider_ref',
    ];

    protected $casts = [
        'starts_at' => 'datetime',
        'ends_at' => 'datetime',
        'job_credits_granted' => 'integer',
        'team_member_limit' => 'integer',
        'price' => 'decimal:2',
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
