<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Job extends Model
{
    protected $fillable = [
        'company_id',

        'category_term_id',
        'profession_term_id',
        'experience_term_id',
        'education_term_id',
        'job_type_term_id',
        'salary_type_term_id',

        'title',
        'slug',
        'reference_number',
        'seniority',
        'short_description',
        'description',

        'driving_licenses',
        'requires_own_vehicle',
        'company_car_policy',
        'is_graduate_friendly',
        'is_disability_friendly',
        'requires_travel',

        'is_remote',
        'workplace_type',
        'home_office_percent',

        'min_salary',
        'max_salary',
        'job_start',

        'apply_on',
        'apply_email',
        'apply_url',

        'address',
        'lat',
        'lng',

        'featured',
        'featured_until',
        'highlight',
        'highlight_until',

        'status',
        'total_views',
    ];

    protected $casts = [
        'driving_licenses' => 'array',

        'requires_own_vehicle' => 'boolean',
        'is_graduate_friendly' => 'boolean',
        'is_disability_friendly' => 'boolean',
        'requires_travel' => 'boolean',
        'is_remote' => 'boolean',

        'featured' => 'boolean',
        'highlight' => 'boolean',

        'home_office_percent' => 'integer',
        'min_salary' => 'integer',
        'max_salary' => 'integer',
        'total_views' => 'integer',

        'job_start' => 'date',
        'featured_until' => 'datetime',
        'highlight_until' => 'datetime',
    ];

    /* -----------------
     | Relations
     |-----------------*/

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(TaxonomyTerm::class, 'category_term_id');
    }

    public function profession(): BelongsTo
    {
        return $this->belongsTo(TaxonomyTerm::class, 'profession_term_id');
    }

    public function experience(): BelongsTo
    {
        return $this->belongsTo(TaxonomyTerm::class, 'experience_term_id');
    }

    public function education(): BelongsTo
    {
        return $this->belongsTo(TaxonomyTerm::class, 'education_term_id');
    }

    public function jobType(): BelongsTo
    {
        return $this->belongsTo(TaxonomyTerm::class, 'job_type_term_id');
    }

    public function salaryType(): BelongsTo
    {
        return $this->belongsTo(TaxonomyTerm::class, 'salary_type_term_id');
    }
}
