<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Company extends Model
{
    protected $fillable = [
        'name',
        'contact_person',
        'contact_email',
        'contact_phone',
        'contact_address',
        'company_address',
        'homepage',
        'phone',
        'employees_count',
        'category_term_id',
        'description',
    ];

    protected $casts = [
        'employees_count' => 'integer',
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
