<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomFieldValue extends Model
{
    protected $fillable = [
        'custom_field_definition_id',
        'entity_type',   // 'job' oder 'company'
        'entity_id',     // ID vom Job/Company
        'value',         // json
    ];

    protected $casts = [
        'value' => 'array',
    ];
}
