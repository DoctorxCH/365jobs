<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomFieldDefinition extends Model
{
    protected $fillable = [
        'target',        // job, company, etc.
        'key',           // internal key (e.g. languages)
        'label_en',
        'label_sk',
        'type',          // text, textarea, select, checkbox, number
        'options',       // json for select options
        'enabled',
        'required',
        'sort',
    ];

    protected $casts = [
        'options'  => 'array',
        'enabled'  => 'boolean',
        'required' => 'boolean',
        'sort'     => 'integer',
    ];
}
