<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FieldVisibility extends Model
{
    protected $fillable = [
        'target',
        'field_key',
        'enabled',
        'required',
        'sort',
    ];

    protected $casts = [
        'enabled' => 'boolean',
        'required' => 'boolean',
        'sort' => 'integer',
    ];
}
